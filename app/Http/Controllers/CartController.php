<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOTools;

class CartController extends Controller
{
    private function getCart()
    {
        return session()->get('cart', []);
    }

    private function saveCart($cart)
    {
        session()->put('cart', $cart);
    }

    private function calculateTotalItems($cart)
    {
        return array_sum(array_map(function ($item) {
            return $item['quantity'];
        }, $cart));
    }

    public function createBankPayment(Request $request)
    {
        $data = $request->all();

        $contactData = [
            'name' => $data['first-name'].' '.$data['last-name'],
            'email' => $data['email-address'],
            'phone' => $data['phone'],
        ];
        $orderData = [
            'uuid' => (string) \Illuminate\Support\Str::uuid(),
            'amount' => $data['amount'] ?? 0, // Assuming amount is part of the data
            'time' => now(),
            'status' => 'pending', // Default status
            'invoice' => $data['invoice'] ?? null, // Assuming invoice is part of the data
            'payment_method' => $data['payment_type'],
            'payment_status' => 'unpaid', // Default payment status

        ];

        return response()->json(['data' => $request->all()]);
    }

    public function createPaymentForm()
    {
        $instanceName = env('PAYMENT_INSTANCE_NAME');
        $secret = env('PAYMENT_SECRET');

        $cartItems = $this->getCartItems();

        try {
            $payrexx = new \Payrexx\Payrexx($instanceName, $secret, '', 'zahls.ch');

            $gateway = new \Payrexx\Models\Request\Gateway();
            $gateway->setAmount(($cartItems['subtotal'] * 100));
            $gateway->setCurrency('CHF');
            $gateway->setSuccessRedirectUrl(url('/cart'));
            $gateway->setCancelRedirectUrl(url('/cart'));
            $gateway->setFailedRedirectUrl(url('/cart'));
            $response = $payrexx->create($gateway);

            if ($response && ! empty($response->getLink())) {
                $paymentUrl = $response->getLink();

                return response()->json(['paymentUrl' => $paymentUrl]);
            } else {
                throw new Exception('No link found in the response');
            }
        } catch (\Payrexx\PayrexxException $e) {
            error_log('PayrexxException: '.$e->getMessage());

            return response()->json(['error' => $e->getMessage()], 500);
        } catch (Exception $e) {
            error_log('Exception: '.$e->getMessage());

            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    private function calculateProductTotal($product_id, $selects, $checkboxes)
    {
        $product = \App\Models\Product::find($product_id);
        if (! $product) {
            return 0;
        }

        $basePrice = $product->price;
        $customAttributes = $product->custom_attributes;
        $optionPrice = 0;

        foreach ($selects as $title => $selectedOption) {
            foreach ($customAttributes as $attribute) {
                if (str_replace(' ', '_', $attribute['title']) === str_replace(' ', '_', $title) && isset($attribute['options'])) {
                    foreach ($attribute['options'] as $option) {
                        if (str_replace(' ', '_', $option['label']) === str_replace(' ', '_', $selectedOption) && isset($option['price'])) {
                            $optionPrice += $option['price'];
                        }
                    }
                }
            }
        }

        foreach ($checkboxes as $key => $checkboxSet) {
            $key = str_replace('_', ' ', $key);
            foreach ($customAttributes as $attribute) {
                if ($attribute['title'] === $key) {
                    foreach ($attribute['options'] as $option) {

                        $optionLabelKey = $option['label'];
                        if (! isset($option['price']) || $option['price'] == 0) {
                            continue;
                        }

                        if (isset($checkboxSet[$optionLabelKey])) {
                            if ($checkboxSet[$optionLabelKey] === true) {
                                $optionPrice += $option['price'];
                            }
                        }
                    }
                }
            }
        }

        $totalPrice = $basePrice + $optionPrice;

        return $totalPrice;
    }

    public function countDistinctProducts()
    {
        $cart = $this->getCart();

        return response()->json(['status' => 'success', 'totalItems' => count($cart)]);
    }

    public function getCartItems()
    {
        $cart = $this->getCart();
        $productDetails = [];

        foreach ($cart as $index => $details) {
            $product = \App\Models\Product::find($details['product_id']);
            if ($product) {
                $productDetails[] = $this->formatProductDetails($index, $product, $details);
            }
        }

        $subtotal = array_sum(array_column($productDetails, 'subtotal'));

        return ['items' => $productDetails, 'subtotal' => $subtotal];
    }

    private function formatProductDetails($index, $product, $details)
    {
        return [
            'index' => $index,
            'product_id' => $details['product_id'],
            'product' => $product,
            'quantity' => $details['quantity'],
            'selects' => $details['selects'] ?? [],
            'files' => $details['files'] ?? [],
            'checkbox' => $details['checkbox'] ?? [],
            'totalPrice' => $details['totalPrice'],
            'subtotal' => $details['totalPrice'] * $details['quantity'],
        ];
    }

    public function addToCart(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $cart = $this->getCart();
        $product_id = $validated['product_id'];
        $quantity = $validated['quantity'];

        // Extracting options
        $allInputs = $request->except(['_token', 'product_id', 'quantity']);
        $selects = [];
        $files = [];
        $checkbox = [];

        foreach ($allInputs as $key => $value) {
            if (strpos($key, 'fileInput-') === 0) {
                $photoId = str_replace('fileInput-', '', $key);
                $photo = \App\Models\StudentPhoto::find($value);
                if ($photo) {
                    $files[$photoId] = [
                        'id' => $value,
                        'href' => $photo->photo_path,
                    ];
                }
            } elseif (is_array($value)) {
                $checkbox[$key] = array_map(function ($val) {
                    return $val === 'true' ? true : false;
                }, $value);
            } else {
                $selects[$key] = $value;
            }
        }

        $nextIndex = count($cart);
        $totalPrice = $this->calculateProductTotal($product_id, $selects, $checkbox);
        $cart[$nextIndex] = [
            'product_id' => $product_id,
            'quantity' => $quantity,
            'selects' => $selects,
            'files' => $files,
            'checkbox' => $checkbox,
            'totalPrice' => $totalPrice,
        ];

        $this->saveCart($cart);

        return response()->json([
            'success' => 'Product added to cart successfully!',
            'totalItems' => $this->calculateTotalItems($cart),
        ]);
    }

    public function removeFromCart(Request $request, $index)
    {
        $cart = $this->getCart();
        if (isset($cart[$index])) {
            unset($cart[$index]);
            $this->saveCart($cart);
        } else {
            return response()->json(['error' => 'Product not found in cart'], 404);
        }

        return response()->json([
            'success' => 'Product removed from cart successfully!',
            'totalItems' => $this->calculateTotalItems($cart),
            'cartItems' => $this->getCartItems(),
        ]);
    }

    public function updateQuantity(Request $request, $index)
    {
        $validated = $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $cart = $this->getCart();
        if (isset($cart[$index])) {
            $cart[$index]['quantity'] = $validated['quantity'];
            $this->saveCart($cart);
        } else {
            return response()->json(['error' => 'Product not found in cart'], 404);
        }

        return response()->json([
            'success' => 'Quantity updated successfully!',
            'cartItems' => $this->getCartItems(),
        ]);
    }

    public function index()
    {
        $cartItems = $this->getCartItems();

        // Set SEO tags
        SEOTools::setTitle('Your Cart');
        SEOTools::setDescription('View and manage the items in your cart.');

        return view('cart', ['cartItems' => $cartItems]);
    }

    public function paymentSuccess()
    {
        // Set SEO tags
        SEOTools::setTitle('Payment Success');
        SEOTools::setDescription('Your payment was successful.');

        return view('payment-success');
    }

    public function paymentFailed()
    {
        // Set SEO tags
        SEOTools::setTitle('Payment Failed');
        SEOTools::setDescription('Your payment failed. Please try again.');

        return view('payment-failed');
    }
}

<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;

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

    public function createPaymentForm()
    {
        $instanceName = env('PAYMENT_INSTANCE_NAME');
        $secret = env('PAYMENT_SECRET');

        $cartItems = $this->getCartItems();
        // dd($cartItems);

        try {
            $payrexx = new \Payrexx\Payrexx($instanceName, $secret, '', 'zahls.ch');

            $gateway = new \Payrexx\Models\Request\Gateway();
            $gateway->setAmount(($cartItems['subtotal'] * 100));
            $gateway->setCurrency('CHF');

            $response = $payrexx->create($gateway);

            if ($response && ! empty($response->getLink())) {
                $paymentUrl = $response->getLink();

                return $paymentUrl;
            } else {
                throw new Exception('No link found in the response');
            }
        } catch (\Payrexx\PayrexxException $e) {
            error_log('PayrexxException: '.$e->getMessage());

            return redirect()->back()->with('error', $e->getMessage());
        } catch (Exception $e) {
            error_log('Exception: '.$e->getMessage());

            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    private function calculateProductTotal($product_id, $selects, $checkboxes)
    {
        $product = \App\Models\Product::find($product_id);
        if (! $product) {
            return 0; // Product not found, return 0 as total
        }

        $basePrice = $product->price;
        $customAttributes = $product->custom_attributes;
        $optionPrice = 0;

        // Calculate price from selects
        foreach ($selects as $title => $selectedOption) {
            // Find the custom attribute based on the title
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

        // Calculate price from checkboxes
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

        $totalPrice = $basePrice + $optionPrice; // Calculate total price including all options and checkboxes

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
                $files[str_replace('fileInput-', '', $key)] = $value;
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
        $paymentUrl = $this->createPaymentForm();

        return view('cart', ['cartItems' => $cartItems, 'paymentUrl' => $paymentUrl]);
    }
}

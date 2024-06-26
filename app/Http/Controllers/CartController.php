<?php

namespace App\Http\Controllers;

use App\Constants\Constants;
use App\Mail\OrderCreated;
use App\Models\Contact;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Artesaos\SEOTools\Facades\SEOTools;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

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

    private function newOrderSendMail($order, $contact, $emailTo, $studentName)
    {
        // Queue mail to the client
        Mail::to($emailTo)->queue(new OrderCreated($order, $contact, 'user', $studentName));

        // Fetch all admin users
        $admins = User::where('role', 'admin')->get();

        // Queue an email to each admin
        foreach ($admins as $admin) {
            Mail::to($admin->email)->queue(new OrderCreated($order, $contact, 'admin', $studentName));
        }
    }

    public function createBankPayment(Request $request)
    {
        $data = $request->all();
        $cart = $this->getCartItems();
        $shippingCost = 0;
        $totalPrice = $cart['subtotal'];
        $pickup = isset($data['delivery-option']) ? $data['delivery-option'] === 'pickup' : false;

        if ($totalPrice < Constants::SHIPPING_THRESHOLD && ! $pickup) {
            $shippingCost = Constants::SHIPPING_COST;
        }

        $totalPrice += $shippingCost;

        $contactData = [
            'name' => $data['first-name'].' '.$data['last-name'],
            'email' => $data['email-address'],
            'phone' => $data['phone'],
        ];

        $billingAddress = [
            'address' => $data['address'] ?? '',
            'city' => $data['city'] ?? '',
            'zip' => $data['postal-code'] ?? '',
            'country' => $data['country'] ?? '',
            'region' => $data['region'] ?? '',
        ];

        $shippingAddress = [
            'address' => $data['shipping-address'] ?? '',
            'city' => $data['shipping-city'] ?? '',
            'zip' => $data['shipping-postal-code'] ?? '',
            'country' => $data['shipping-country'] ?? '',
            'region' => $data['shipping-region'] ?? '',
        ];

        $orderData = [
            'amount' => $totalPrice,
            'shipping_cost' => $shippingCost,
            'status' => 'pending',
            'invoice' => '',
            'payment_method' => $data['payment_type'],
            'payment_status' => 'unpaid',
            'address_same_as_billing' => filter_var($data['address-same-as-billing'], FILTER_VALIDATE_BOOLEAN),
            'billing_address' => json_encode($billingAddress),
            'shipping_address' => json_encode($shippingAddress),
            'comment' => $data['comment'] ?? '',
            'pickup' => $pickup,
        ];

        try {
            $contact = Contact::firstOrCreate($contactData);
            $orderData['contact_id'] = $contact->id;

            $order = Order::create($orderData);
            $cartItems = $cart['items'];

            foreach ($cartItems as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['totalPrice'],
                    'options' => json_encode([
                        'files' => $item['files'],
                        'selects' => $item['selects'],
                        'checkbox' => $item['checkbox'],
                    ]),
                ]);
            }

            $this->newOrderSendMail($order, $contact, $contactData['email'], Auth::user()->name);

            if ($data['payment_type'] === 'bank_transfer') {
                return response()->json([
                    'success' => 'Order created successfully!',
                    'totalItems' => $this->calculateTotalItems($this->getCart()),
                    'cartItems' => $this->getCartItems(),
                ]);
            } else {
                return $this->createPaymentForm($totalPrice, $order->id, $contact);
            }
        } catch (Exception $e) {
            return response()->json(['error' => 'Failed to create order: '.$e->getMessage()], 500);
        }
    }

    public function createPaymentForm(float $totalPrice, string $order_id, Contact $contact)
    {
        $instanceName = env('PAYMENT_INSTANCE_NAME');
        $secret = env('PAYMENT_SECRET');

        try {
            $payrexx = new \Payrexx\Payrexx($instanceName, $secret, '', 'zahls.ch');

            $gateway = new \Payrexx\Models\Request\Gateway();
            $gateway->setAmount(($totalPrice * 100));
            $gateway->setCurrency('CHF');
            $gateway->setSuccessRedirectUrl(url('/payment-success'));
            $gateway->setCancelRedirectUrl(url('/cart'));
            $gateway->setFailedRedirectUrl(url('/payment-failed'));

            $gateway->setReferenceId($order_id);

            $gateway->addField('forename', $contact->name);
            $gateway->addField('email', $contact->email);
            $gateway->addField('phone', $contact->phone);

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

        $totalPrice = $this->calculateProductTotal($product_id, $selects, $checkbox);
        $cart[] = [
            'product_id' => $product_id,
            'quantity' => $quantity,
            'selects' => $selects,
            'files' => $files,
            'checkbox' => $checkbox,
            'totalPrice' => $totalPrice,
        ];

        $this->saveCart($cart);

        return response()->json([
            'success' => 'Produkt erfolgreich zum Warenkorb hinzugefgt!',
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
            return response()->json(['error' => 'Produkt nicht im Warenkorb gefunden'], 404);
        }

        return response()->json([
            'success' => 'Produkt erfolgreich aus dem Warenkorb entfernt!',
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
            return response()->json(['error' => 'Produkt nicht im Warenkorb gefunden'], 404);
        }

        return response()->json([
            'success' => 'Menge erfolgreich aktualisiert!',
            'cartItems' => $this->getCartItems(),
        ]);
    }

    public function index()
    {
        $cartItems = $this->getCartItems();

        // Set SEO tags
        SEOTools::setTitle('Ihr Warenkorb');
        SEOTools::setDescription('Hier sehen Sie und verwalten Sie die Artikel im Ihrem Warenkorb.');

        return view('cart', ['cartItems' => $cartItems]);
    }

    public function paymentSuccess()
    {
        // Set SEO tags
        SEOTools::setTitle('Zahlung erfolgreich');
        SEOTools::setDescription('Ihre Zahlung war erfolgreich.');

        session()->forget('cart');

        return view('payment-success');
    }

    public function paymentFailed()
    {
        // Set SEO tags
        SEOTools::setTitle('Zahlung fehlgeschlagen');
        SEOTools::setDescription('Ihre Zahlung ist fehlgeschlagen. Bitte versuchen Sie es mit einer anderen Zahlungsmethode.');

        return view('payment-failed');
    }

    public function forgetCart()
    {
        session()->forget('cart');

        return response()->json([
            'success' => 'Warenkorb erfolgreich leert!',
            'totalItems' => 0,
            'cartItems' => [],
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function getCartItems()
    {
        $cart = session()->get('cart', []);
        $productDetails = [];

        foreach ($cart as $productId => $details) {
            $product = \App\Models\Product::find($productId);
            if ($product) {
                $productDetails[] = [
                    'product' => $product,
                    'quantity' => $details['quantity'],
                    'options' => $details['options'] ?? [],
                    'subtotal' => $product->price * $details['quantity'],
                ];
            }
        }

        return response()->json(['items' => $productDetails, 'subtotal' => array_sum(array_column($productDetails, 'subtotal'))]);
    }

    public function addToCart(Request $request)
    {
        $cart = session()->get('cart', []);
        $product_id = $request->product_id;
        $quantity = $request->quantity;
        $options = $request->except(['_token', 'product_id', 'quantity']); // Capture other form data as options

        if (isset($cart[$product_id])) {
            $cart[$product_id]['quantity'] += $quantity;
            if (! isset($cart[$product_id]['options'])) {
                $cart[$product_id]['options'] = [];
            }
            $cart[$product_id]['options'] = array_merge($cart[$product_id]['options'], $options);
        } else {
            $cart[$product_id] = ['quantity' => $quantity, 'options' => $options];
        }

        session()->put('cart', $cart);

        // Calculate the total number of items in the cart for the response
        $totalItems = array_sum(array_column($cart, 'quantity'));

        return response()->json([
            'success' => 'Product added to cart successfully!',
            'totalItems' => $totalItems,
            'cart' => $cart, // Optionally include cart data or remove this line if not needed
        ]);
    }

    public function countItems()
    {
        $cart = session()->get('cart', []);
        $count = array_sum(array_column($cart, 'quantity'));

        return response()->json($count);
    }

    public function index()
    {
        return view('cart', ['cartItems' => session()->get('cart', [])]);
    }
}

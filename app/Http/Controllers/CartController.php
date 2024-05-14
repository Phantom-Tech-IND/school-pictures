<?php

namespace App\Http\Controllers;

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

    public function countDistinctProducts()
    {
        $cart = $this->getCart();
        $distinctProducts = count($cart);
        return response()->json(['status' => 'success', 'totalItems' => $distinctProducts]);
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
            'options' => $details['options'] ?? [],
            'subtotal' => $product->price * $details['quantity'],
        ];
    }

    public function addToCart(Request $request) // looks fine
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $cart = $this->getCart();
        $product_id = $validated['product_id'];
        $quantity = $validated['quantity'];
        $options = $request->except(['_token', 'product_id', 'quantity']);

        $nextIndex = count($cart);
        $cart[$nextIndex] = [
            'product_id' => $product_id,
            'quantity' => $quantity,
            'options' => $options
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
        return view('cart', ['cartItems' => $cartItems]);
    }
}

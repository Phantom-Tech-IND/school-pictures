<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $cart = session()->get('cart', []);
        $product_id = $request->product_id;
        $quantity = $request->quantity;

        if (isset($cart[$product_id])) {
            $cart[$product_id]['quantity'] += $quantity;
        } else {
            $cart[$product_id] = ['quantity' => $quantity];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function countItems()
    {
        $cart = session()->get('cart', []);

        return array_sum(array_column($cart, 'quantity'));
    }

    public function index()
    {
        return view('cart', ['cartItems' => session()->get('cart', [])]);
    }
}
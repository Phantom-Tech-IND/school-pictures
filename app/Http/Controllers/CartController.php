<?php

namespace App\Http\Controllers;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = \App\Models\Product::all();
        $total = $cartItems->sum('price');
        $cartItems = $cartItems->toArray();
        $total = array_sum(array_column($cartItems, 'price'));

        return view('cart', compact('cartItems', 'total'));
    }
}

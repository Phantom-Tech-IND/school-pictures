<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Cart extends Component
{
    protected $cartItems;

    protected $total;

    public function __construct($cartItems, $total)
    {
        $this->cartItems = $cartItems;
        $this->total = $total;
    }

    public function render()
    {
        return view('components.cart', [
            'cartItems' => $this->cartItems,
            'total' => $this->total,
        ]);
    }
}

<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Navbar extends Component
{
    protected $cartItems;
    /**
     * Create a new component instance.
     */
    public function __construct(Cart $cart)
    {
        $this->cartItems = $cart->cartItems();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navbar', [
            'cartItems' => $this->cartItems,
        ]);
    }
}

<ul class="cart-items">
    @foreach($cartItems as $item)
        <li>{{ $item['description'] }} - {{ $item['price'] }} CHF</li>
    @endforeach
</ul>
<div class="total">
    Total: <span class="total-amount">{{ $total }}</span> CHF
</div>
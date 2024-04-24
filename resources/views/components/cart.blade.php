<ul class="cart-items">
    @foreach($cartItems as $item)
        <li>{{ $item['description'] }} - ${{ $item['price'] }}</li>
    @endforeach
</ul>
<div class="total">
    Total: $<span class="total-amount">{{ $total }}</span>
</div>
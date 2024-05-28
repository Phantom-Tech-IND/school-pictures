@component('mail::message')
# Order Confirmation

Hello **{{ $contact->name }}**,<br>
<br>
Thank you for your order! Here are the details:<br>
Your order number is **{{ $order->id }}**<br>
Subtotal {{ $order->amount }} CHF<br>
Taxes {{ $order->amount }} CHF<br>
Total {{ $order->amount }} CHF<br>
<br>
## Items Ordered:
<hr>

@foreach ($items as $item)

**{{ $item->product->name }}**<br>
Quantity: {{ $item->quantity }}<br>
Price: {{ $item->price }} CHF<br>

@if(isset($item->product->images[0]))
{{-- <a href="{{ url('/product?id=' . $item->product->id) }}"></a> --}}
<img src="{{ $message->embed(storage_path('app/public/') . $item->product->images[0]) }}" alt="Product Image" style="width: 60px; height: 60px; object-fit: cover;"><br>
@endif
<div class="options">
@foreach ($item->options['files'] as $fileKey => $file)
{{ $fileKey }}:<br>
<img src="{{ $message->embed(storage_path('app/public/') . $file['href']) }}" alt="{{ $fileKey }}" style="width: 60px; height: 60px; object-fit: cover;"><br>
@endforeach
@foreach ($item->options['selects'] as $selectKey => $selectValue)
{{ $selectKey }}: {{ $selectValue }}<br>
@endforeach

@foreach ($item->options['checkbox'] as $checkboxGroupKey => $checkboxGroup)
{{ $checkboxGroupKey }}<br>
@foreach ($checkboxGroup as $checkboxKey => $checkboxValue)
<input type="checkbox" {{ $checkboxValue ? 'checked' : '' }}> {{ $checkboxKey }}<br>
@endforeach
@endforeach
<hr>

@endforeach
</div>

# Thanks, {{ config('app.name') }}
@endcomponent

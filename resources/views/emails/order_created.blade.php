@component('mail::message')
@if ($emailRole == 'user')
# Order Confirmation

Hello **{{ $contact->name }}**,<br>
<br>
Thank you for your order! Here are the details:<br>
Your order number is **{{ $order->id }}**<br>
Total {{ $order->amount }} CHF<br>
<br>
City: {{ $country }}/{{ $city }}<br>
Address: {{ $address }}<br>
ZIP: {{ $zip }}<br>
@endif
@if ($comment)
Comment:<br>
{{ $comment }}
<br>
@endif

@if ($order->payment_method === 'bank_transfer' && $emailRole == 'user')
Please transfer the amount to the following account:<br>
IBAN: <strong>{{ env('BANK_IBAN') }}</strong><br>
Please use the reference number of the order as the reference for the transfer: <strong>{{ $order->id }}</strong><br>
@endif
@if ($emailRole == 'admin')
# New order from {{ $contact->name }}<br>
@endif

@if ($emailRole == 'admin')
@component('mail::button', ['url' => url('admin/orders')])
View Orders
@endcomponent
@endif
<br>

## Items Ordered:
<hr>

@foreach ($items as $item)
@component('mail::product', [
	'message' => $message,
	'imageUrl' => isset($item->product->images[0]) ? storage_path('app/public/') . $item->product->images[0] : '',
	'name' => $item->product->name,
	'price' => $item->price,
	'quantity' => $item->quantity,
	'checkboxes' => $item->options['checkbox'] ?? [],
	'selects' => $item->options['selects'] ?? [],
	'files' => $item->options['files'] ?? [],
])
@endcomponent
<hr>
@endforeach

@if ($emailRole == 'user')
# Thanks, {{ config('app.name') }}
If you have any questions, please contact us on our [contact page]({{ route('contact') }}).
@endif
@endcomponent

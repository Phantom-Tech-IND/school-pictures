@component('mail::message')
@if ($emailRole == 'user')
# Bestellbestätigung

Hallo **{{ $contact->name }}**,<br>
<br>
Vielen Dank für Ihre Bestellung! Hier sind die Details:<br>
Ihre Bestellnummer ist **{{ $order->id }}**<br>
Versandkosten: {{ $order->shipping_cost }} CHF<br>
Gesamtbetrag: {{ $order->amount }} CHF<br>
<br>
Stadt: {{ $country }}/{{ $city }}<br>
Adresse: {{ $address }}<br>
PLZ: {{ $zip }}<br>
@endif


@if ($order->payment_method === 'bank_transfer' && $emailRole == 'user')
Bitte überweisen Sie den Betrag auf folgendes Konto:<br>
Bank: <strong>{{ env('BANK_NAME') }}</strong><br>
IBAN: <strong>{{ env('BANK_IBAN') }}</strong><br>
BIC: <strong>{{ env('BANK_BIC') }}</strong><br>
Kontonummer: <strong>{{ env('BANK_ACCOUNT_NUMBER') }}</strong><br>
Bitte verwenden Sie die Bestellnummer als Verwendungszweck: <strong>{{ $order->id }}</strong><br>
@endif
@if ($emailRole == 'admin')
# Neue Bestellung von {{ $contact->name }}<br>
Bestellnummer: **{{ $order->id }}**<br>
Versandkosten: {{ $order->shipping_cost }} CHF<br>
Gesamtbetrag: {{ $order->amount }} CHF<br>
<br>
Stadt: {{ $country }}/{{ $city }}<br>
Adresse: {{ $address }}<br>
PLZ: {{ $zip }}<br>
Abholung im Geschäft: {{ $order->pickup === 1 ? 'ja' : 'nein' }}<br>
Zahlungsmethode: {{ $order->payment_method === 'card' ? 'Zahls Payment' : ($order->payment_method === 'bank_transfer' ? 'Bank Transfer' : $order->payment_method) }}<br>
@endif
@if ($comment)
Kommentar:<br>
{{ $comment }}
<br>
@endif

@if ($emailRole == 'admin')
@component('mail::button', ['url' => url('admin/orders')])
Bestellungen ansehen
@endcomponent
@endif
<br>

## Bestellte Artikel:
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
# Danke, {{ config('app.name') }}
Wenn Sie Fragen haben, kontaktieren Sie uns bitte über unsere [Kontaktseite]({{ route('contact') }}).
@endif
@endcomponent

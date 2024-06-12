@props([
	'imageUrl',
	'name',
	'price',
	'quantity',
	'checkboxes' => [],
	'selects' => [],
	'files' => [],
])

**{{ $name }}**
Menge: {{ $quantity }}
Preis: {{ $price }} CHF

@if(!empty($checkboxes))
Kontrollkästchen:
@foreach($checkboxes as $checkboxGroupKey => $checkboxGroup)
{{ $checkboxGroupKey }}:
@foreach($checkboxGroup as $checkboxKey => $checkboxValue)
- {{ $checkboxKey }}: {{ $checkboxValue ? 'Yes' : 'No' }}
@endforeach
@endforeach
@endif

@if(!empty($selects))
Auswahlen:
@foreach($selects as $selectKey => $selectValue)
- {{ $selectKey }}: {{ $selectValue }}
@endforeach
@endif

@if(!empty($files))
Dateien:
@foreach($files as $fileKey => $file)
- {{ $fileKey }}: {{ $file['href'] }}
@endforeach
@endif


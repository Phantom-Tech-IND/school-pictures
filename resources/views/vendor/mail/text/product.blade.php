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
@php
$shouldDisplayGroup = false;
foreach($checkboxGroup as $checkboxValue) {
    if($checkboxValue) {
        $shouldDisplayGroup = true;
        break;
    }
}
@endphp

@if($shouldDisplayGroup)
{{ $checkboxGroupKey }}:
@foreach($checkboxGroup as $checkboxKey => $checkboxValue)
@if($checkboxValue)
- {{ $checkboxKey }}: Yes
@endif
@endforeach
@endif
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
- {{ $fileKey }}: {{ basename($file['href']) }}
@endforeach
@endif
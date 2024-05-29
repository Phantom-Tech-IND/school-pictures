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
Quantity: {{ $quantity }}
Price: {{ $price }} CHF

@if(!empty($checkboxes))
Checkboxes:
@foreach($checkboxes as $checkboxGroupKey => $checkboxGroup)
	{{ $checkboxGroupKey }}:
	@foreach($checkboxGroup as $checkboxKey => $checkboxValue)
		- {{ $checkboxKey }}: {{ $checkboxValue ? 'Yes' : 'No' }}
	@endforeach
@endforeach
@endif

@if(!empty($selects))
Selects:
@foreach($selects as $selectKey => $selectValue)
	- {{ $selectKey }}: {{ $selectValue }}
@endforeach
@endif

@if(!empty($files))
Files:
@foreach($files as $fileKey => $file)
	- {{ $fileKey }}: {{ $file['href'] }}
@endforeach
@endif


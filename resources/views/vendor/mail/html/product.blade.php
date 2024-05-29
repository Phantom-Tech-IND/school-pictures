@props(['message', 'imageUrl', 'name', 'price', 'quantity', 'checkboxes' => [], 'selects' => [], 'files' => []])

<div class="product">
<div class="product-name-and-price">
<h2 class="product-name">{{ $name }}</h2> - <p class="product-price">{{ $price }} CHF</p>
</div>
<div class="product-first-row">
@if (isset($imageUrl))
<img src="{{ $message->embed($imageUrl) }}" alt="{{ $name }}" class="product-image">
@endif
<div class="product-info">
<p class="product-quantity">Quantity: {{ $quantity }}</p>

@if (!empty($checkboxes))
<div class="product-checkboxes">
@foreach ($checkboxes as $checkboxGroupKey => $checkboxGroup)
<strong>{{ $checkboxGroupKey }}</strong><br>
@foreach ($checkboxGroup as $checkboxKey => $checkboxValue)
<label>
<input type="checkbox" {{ $checkboxValue ? 'checked' : '' }}> {{ $checkboxKey }}
</label><br>
@endforeach
@endforeach
</div>
@endif

@if (!empty($selects))
<div class="product-selects">
@foreach ($selects as $selectKey => $selectValue)
<p>{{ $selectKey }}: {{ $selectValue }}</p>
@endforeach
</div>
@endif
</div>
</div>

@if (!empty($files))
<div class="product-files">
@foreach ($files as $fileKey => $file)
<div class="product-file-content">
<p>{{ $fileKey }}:</p>
<img src="{{ $message->embed(storage_path('app/public/') . $file['href']) }}" alt="{{ $fileKey }}">
</div>
@endforeach
</div>
@endif

</div>


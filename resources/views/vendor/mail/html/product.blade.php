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
            <p class="product-quantity">Menge: {{ $quantity }}</p>

            @if (!empty($checkboxes))
                <div class="product-checkboxes">
                    @foreach ($checkboxes as $checkboxGroupKey => $checkboxGroup)
                        @php
                            $shouldDisplayGroup = false;
                            foreach ($checkboxGroup as $checkboxValue) {
                                if ($checkboxValue) {
                                    $shouldDisplayGroup = true;
                                    break;
                                }
                            }
                        @endphp

                        @if ($shouldDisplayGroup)
                            <strong>{{ $checkboxGroupKey }}</strong><br>
                            @foreach ($checkboxGroup as $checkboxKey => $checkboxValue)
                                @if ($checkboxValue)
                                    <label>
                                        <input type="checkbox" checked> {{ $checkboxKey }}
                                    </label><br>
                                @endif
                            @endforeach
                        @endif
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
        <ul class="product-files--name-list">
            @foreach ($files as $fileKey => $file)
                <li>{{ $fileKey }}: {{ basename($file['href']) }}</li>
            @endforeach
        </ul>

        <div class="product-files">
            @foreach ($files as $fileKey => $file)
                <div class="product-file-content">
                    <img src="{{ $message->embed(storage_path('app/public/') . $file['href']) }}"
                        alt="{{ $fileKey }}">
                </div>
            @endforeach
        </div>
    @endif

</div>

@extends('layouts.app')
@section('content')
    @include('components.secondary-banner', [
        'title' => $product->name,
        'image' => $product->images[0],
    ])

    <form id="myForm">
        <div class="px-4 mx-auto max-w-7xl">
            <div class="flex flex-wrap">
                <!-- Image Gallery -->
                <div class="w-full p-4 md:w-1/2" x-data="{ selectedImage: '{{ $product->images[0] }}' }">
                    <img :src="selectedImage" alt="{{ $product->name }}"
                        class="object-contain w-full bg-gray-300 rounded-lg shadow-md h-80 xs:h-96 lg:h-[500px]">
                    <div class="flex h-40 mt-4 overflow-x-auto">
                        @foreach ($product->images as $image)
                            <div class="relative p-2 w-36 shrink-0 group">
                                <img src="{{ $image }}" alt="{{ $product->name }}"
                                    class="object-cover w-full h-full rounded-lg shadow-md cursor-pointer"
                                    @click="selectedImage = '{{ $image }}'"
                                    :class="{ 'ring-2 ring-offset-2 ring-accent-500': selectedImage === '{{ $image }}' }">
                                <div
                                    class="absolute inset-0 m-2 bg-black rounded-lg opacity-0 pointer-events-none group-hover:opacity-20">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Product Details -->
                <div class="w-full p-4 md:w-1/2">
                    <h2 class="text-2xl font-bold">{{ $product->name }}</h2>
                    <p class="text-xl text-gray-500">{{ $product->price }} CHF</p>
                    <div class="mt-4">
                        <div class="text-sm text-gray-600">{{ $product->description }}</div>
                    </div>

                    {{-- <pre>{{ json_encode($product, JSON_PRETTY_PRINT) }}</pre> --}}

                    @foreach ($product->custom_attributes as $attribute)
                        @if ($attribute['type'] == 'select')
                            <div x-data="{ open: false, selected: { label: 'Select an option', price: 0 } }">
                                <label id="listbox-label"
                                    class="block text-sm font-medium leading-6 text-gray-900">{{ $attribute['title'] }}</label>
                                <div class="relative mt-2">
                                    <button @click="open = !open" type="button"
                                        class="relative w-full cursor-default rounded-md bg-white py-1.5 pl-3 pr-10 text-left text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                        :aria-expanded="open" aria-haspopup="listbox" aria-labelledby="listbox-label">
                                        <span class="block truncate"
                                            x-text="selected.label + (selected.price ? ' - ' + selected.price + ' CHF' : '')"></span>
                                        <span class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                                            <svg class="w-5 h-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                                                aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M10 3a.75.75 0 01.55.24l3.25 3.5a.75.75 0 11-1.1 1.02L10 4.852 7.3 7.76a.75.75 0 01-1.1-1.02l3.25-3.5A.75.75 0 0110 3zm-3.76 9.2a.75.75 0 011.06.04l2.7 2.908 2.7-2.908a.75.75 0 111.1 1.02l-3.25 3.5a.75.75 0 01-1.1 0l-3.25-3.5a.75.75 0 01.04-1.06z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                    </button>

                                    <ul x-show="open" x-transition:enter="transition ease-out duration-100"
                                        x-transition:enter-start="transform opacity-0 scale-95"
                                        x-transition:enter-end="transform opacity-100 scale-100"
                                        x-transition:leave="transition ease-in duration-75"
                                        x-transition:leave-start="transform opacity-100 scale-100"
                                        x-transition:leave-end="transform opacity-0 scale-95"
                                        class="absolute z-10 w-full py-1 mt-1 overflow-auto text-base bg-white rounded-md shadow-lg max-h-60 ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm"
                                        tabindex="-1" role="listbox" aria-labelledby="listbox-label"
                                        @click.away="open = false">
                                        @foreach ($attribute['options'] as $option)
                                            <li @click="selected = { label: '{{ $option['label'] }}', price: {{ $option['price'] ?? 0 }} }; open = false"
                                                :class="{'option-selected': selected.label === '{{ $option['label'] }}'}"
                                                class="relative py-2 pl-3 text-gray-900 cursor-default select-none pr-9 hover:bg-gray-100"
                                                id="listbox-option-{{ $loop->index }}" role="option"
                                                data-price="{{ $option['price'] ?? 0 }}">
                                                <div class="flex justify-between">
                                                    <span class="block font-normal truncate">{{ $option['label'] }}</span>
                                                    @if (isset($option['price']))
                                                        <span
                                                            class="block font-normal text-right text-gray-500 truncate">{{ $option['price'] }}
                                                            CHF</span>
                                                    @endif
                                                </div>
                                                <span
                                                    class="absolute inset-y-0 right-0 flex items-center pr-4 text-indigo-600"
                                                    x-show="selected.label === '{{ $option['label'] }}'">
                                                    <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor"
                                                        aria-hidden="true">
                                                        <path fill-rule="evenodd"
                                                            d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif
                        @if ($attribute['type'] == 'checkbox')
                            <div class="mt-4">
                                <label class="block text-sm font-medium text-gray-700">{{ $attribute['title'] }}</label>
                                @foreach ($attribute['options'] as $option)
                                    <div class="mt-2">
                                        <label class="inline-flex items-center">
                                            <input type="checkbox" class="form-checkbox" name="{{ $attribute['title'] }}[]"
                                                value="{{ $option['label'] }}"
                                                @if ($option['is_required']) required @endif>
                                            <span class="ml-2">{{ $option['label'] }}</span>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    @endforeach

                    <div class="flex items-center mt-4" x-data="{ quantity: 1 }">
                        <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity:</label>
                        <div class="flex items-center gap-1 ml-3">
                            <button type="button" class="w-8 h-8 text-gray-500 bg-gray-200 rounded-full hover:bg-gray-300"
                                @click="quantity > 1 ? quantity-- : null">
                                -
                            </button>
                            <input type="text" id="quantity" name="quantity" x-bind:value="quantity" min="1"
                                class="block w-12 text-center border-gray-300 rounded-md shadow-sm focus:border-accent-500 focus:ring focus:ring-accent-500 focus:ring-opacity-50"
                                readonly>
                            <button type="button" class="w-8 h-8 text-gray-500 bg-gray-200 rounded-full hover:bg-gray-300"
                                @click="quantity++">
                                +
                            </button>
                        </div>
                    </div>


                    <div class="float-right p-4 mt-2 bg-gray-200 rounded-lg">
                        <span class="float-right text-sm">{{$product->price}} CHF</span><br/>
                        <span class="float-right text-sm" id="optionsPrice">0.00 CHF</span><br/>
                        <span class="float-right text-sm" id="priceWithOptions">1 x {{ number_format($product->price, 2) }} CHF</span><br/>
                        <span class="float-right font-semibold" id="totalPrice">{{ number_format($product->price, 2) }} CHF</span><br/>

                        <button type="submit"
                            class="px-4 py-2 mt-4 font-bold text-white rounded bg-accent-500 hover:bg-accent-700">
                            Add to bag
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </form>

    <script>
        document.getElementById('myForm').addEventListener('submit', function(e) {
            e.preventDefault();

            // Get the form data
            var formData = new FormData(this);

            alert(JSON.stringify(Object.fromEntries(formData)));
        });

        function updateTotalPrice() {
            var basePrice = parseFloat('{{ $product->price }}'); // Get the base price from Blade into JS
            var quantity = parseInt(document.querySelector('[x-bind\\:value="quantity"]').value);
            var optionsPrice = 0;

            // Assuming each selected option has a class or attribute you can select on
            document.querySelectorAll('.option-selected').forEach(option => {
                optionsPrice += parseFloat(option.dataset.price); // Use dataset to access data attributes
            });

            var priceWithOptions = basePrice + optionsPrice;
            var totalPrice = (basePrice + optionsPrice) * quantity;

            document.getElementById('optionsPrice').innerText = optionsPrice.toFixed(2) + ' CHF';
            document.getElementById('priceWithOptions').innerText = quantity + ' x ' + priceWithOptions.toFixed(2) + ' CHF';
            document.getElementById('totalPrice').innerText = totalPrice.toFixed(2) + ' CHF';
        }

        // Add event listeners to update price on changes
        document.querySelectorAll('[x-data]').forEach(element => {
            element.addEventListener('click', updateTotalPrice);
        });

        document.getElementById('quantity').addEventListener('change', updateTotalPrice);
    </script>
@endsection

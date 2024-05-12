@extends('layouts.app')
@section('content')
    <form onsubmit="handleAsyncSubmit(event)" method="POST" action="{{ route('add.to.cart') }}" id="myForm">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <input type="hidden" name="quantity" x-model="quantity">
        <div class="px-4 mx-auto max-w-7xl">
            <div class="flex flex-wrap">
                <!-- Image Gallery -->
                <div class="w-full p-4 md:w-2/3" x-data="{ selectedImage: '{{ asset('storage/' . $product->images[0]) }}' }">
                    <img :src="selectedImage" alt="{{ $product->name }}"
                        class="object-contain w-full bg-gray-300 rounded-lg shadow-md h-80 xs:h-96 lg:h-[500px]">
                    <div class="flex h-40 mt-4 overflow-x-auto">
                        @foreach ($product->images as $image)
                            <div class="relative p-2 w-36 shrink-0 group">
                                <img src="{{ asset('storage/' . $image) }}" alt="{{ $product->name }}"
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
                <div class="w-full p-4 md:w-1/3">
                    <h2 class="text-2xl font-bold">{{ $product->name }}</h2>
                    <p class="text-xl text-gray-500">{{ $product->price }} CHF</p>
                    <div class="mt-4">
                        <div class="text-sm text-gray-600">{{ $product->description }}</div>
                    </div>

                    {{-- <pre>{{ json_encode($product, JSON_PRETTY_PRINT) }}</pre> --}}

                    @foreach ($product->custom_attributes as $index => $attribute)
                        {{-- selector --}}
                        @if ($attribute['type'] == 'select')
                            <div x-data="{ open: false, selected: { label: 'Select an option', price: 0 } }">
                                <label id="listbox-label"
                                    class="block pt-4 font-medium leading-6 text-gray-900">{{ $attribute['title'] }}</label>
                                <p class="text-sm text-gray-600">{{ $attribute['additional_info'] }}</p>
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

                                    <!-- Hidden input to store the selected value for form submission -->
                                    <input type="hidden" name="{{ $attribute['title'] }}" x-model="selected.label">

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
                                                :class="{ 'option-selected': selected.label === '{{ $option['label'] }}' }"
                                                class="relative py-2 pl-3 text-gray-900 cursor-default select-none pr-9 hover:bg-gray-100"
                                                id="listbox-option-{{ $loop->index }}" role="option"
                                                data-price="{{ $option['price'] ?? 0 }}">
                                                <div class="flex justify-between">
                                                    <span class="block font-normal">{{ $option['label'] }}</span>
                                                    @if (isset($option['price']))
                                                        <span
                                                            class="block font-normal text-right text-gray-500 whitespace-nowrap">{{ $option['price'] }}
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

                        {{-- checkbox --}}
                        @if ($attribute['type'] == 'checkbox')
                            <div class="mt-4">
                                <label class="block text-sm font-medium text-gray-700">{{ $attribute['title'] }}</label>
                                @foreach ($attribute['options'] as $option)
                                    <div class="mt-2">
                                        <label class="inline-flex items-center">
                                            <input type="checkbox"
                                                class="form-checkbox checked:bg-accent-600 checked:hover:bg-accent-700 focus:ring-accent-500"
                                                name="{{ $attribute['title'] . '[' . $option['label'] . ']' }}" value="true"
                                                data-price="{{ $option['price'] ?? 0 }}"
                                                @if ($option['is_required']) required @endif>
                                            <span class="ml-2">{{ $option['label'] }}</span>
                                            @if (isset($option['price']))
                                                <span class="ml-2 text-sm text-gray-500">(+{{ $option['price'] }}
                                                    CHF)</span>
                                            @endif
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        {{-- Existing file input section to be replaced --}}
                        @if ($attribute['type'] == 'fileInput')
                            <div class="my-4">
                                <label class="block text-sm font-medium text-gray-700">{{ $attribute['title'] }}</label>
                                <div class="flex items-center gap-2">
                                    @if (isset($attribute['fileInputImage']))
                                        <img src="{{ $attribute['fileInputImage'] }}"
                                            class="object-contain w-20 h-20 p-0.5 bg-gray-300 border-2 border-gray-300 rounded-lg" />
                                    @endif
                                    <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7"></path>
                                    </svg>
                                    <input type="hidden" id="{{ 'fileInput-' . $index }}" name="{{ 'fileInput-' . $attribute['title'] }}" value="" readonly required>
                                    <button type="button" onclick="openImageModal({{ $index }})"
                                        class="w-20 h-20 text-white bg-center bg-no-repeat bg-contain rounded bg-accent-500 hover:bg-accent-700"
                                        data-attribute-index="{{ $index }}">
                                        Choose Image
                                    </button>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    {{-- Modal structure using <dialog> --}}
                    <dialog id="attributeProductImageModal" class="relative bg-transparent p-2 xs:p-4 h-[fill-available]"
                        data-fileInputSelected="">

                        <div class="relative h-full p-4 bg-white rounded-lg max-w-7xl">

                            <button type="button" onclick="document.getElementById('attributeProductImageModal').close()"
                                class="absolute top-0 right-0 p-2 m-4 text-white bg-gray-500 rounded-full hover:bg-gray-700 focus:outline-accent-600 focus-within:outline-accent-600">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                    <path
                                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                </svg>
                            </button>

                            <h2 class="mt-4 text-2xl font-semibold">Select an Image</h2>
                            <div class="h-[calc(100%-28px)] w-full overflow-y-scroll">
                                <div class="grid grid-cols-3 gap-4 pt-2 xs:grid-cols-4 lg:grid-cols-5">
                                    @foreach ($student->photos as $photo)
                                        <button
                                            onclick="selectImageForProduct('{{ $photo->id }}', '{{ $photo->photo_path }}')"
                                            class="p-0.5 relative">
                                            <img src="{{ asset('storage/' . $photo->photo_path) }}" alt="Student Image"
                                                class="block object-contain bg-gray-300 border-2 border-gray-300 rounded shadow-md cursor-pointer aspect-square">
                                            <div
                                                class="absolute inset-0 bg-black bg-opacity-0 rounded hover:bg-opacity-25">
                                            </div>
                                        </button>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </dialog>



                    <div class="flex flex-col justify-center my-4" x-data="{ quantity: 1 }">
                        <div class="flex items-center gap-2">
                            <button type="button"
                                class="w-8 h-8 text-gray-500 rounded-full bg-accent-200 hover:bg-accent-300"
                                @click="quantity > 1 ? quantity-- : null">
                                -
                            </button>
                            <input type="text" id="quantity" name="quantity" x-bind:value="quantity"
                                min="1"
                                class="block w-12 text-center rounded-md shadow-sm border-accent-300 focus:border-accent-500 focus:ring focus:ring-accent-500 focus:ring-opacity-50"
                                readonly>
                            <button type="button"
                                class="w-8 h-8 text-gray-500 rounded-full bg-accent-200 hover:bg-accent-300"
                                @click="quantity++">
                                +
                            </button>
                        </div>
                    </div>
                    <div class="p-4 mt-2 bg-gray-100 rounded-lg">
                        <div class="flex justify-between px-2 gap-x-4 gap-y-4">
                            <div class="flex flex-col gap-2">
                                <span class="text-sm">Product price</span>
                                <span class="text-sm">Options</span>
                                <span class="text-sm">Quantity</span>
                                <span class="font-semibold">Total</span>
                            </div>

                            <div class="flex flex-col gap-2 items-end flex-grow-[1000]">
                                <span class="text-sm">{{ $product->price }} CHF</span>
                                <span class="text-sm" id="optionsPrice">0.00 CHF</span>
                                <span class="text-sm" id="priceWithOptions">1 x {{ number_format($product->price, 2) }}
                                    CHF</span>
                                <span class="font-semibold" id="totalPrice">{{ number_format($product->price, 2) }}
                                    CHF</span>
                            </div>
                        </div>

                        <button type="submit"
                            class="w-full px-4 py-2 mt-4 font-bold text-white rounded bg-accent-500 hover:bg-accent-700">
                            Add to bag
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </form>

    <script>
        function validateForm() {
            let isValid = true;

            // Validate product ID
            const productId = document.querySelector('input[name="product_id"]').value;
            if (!productId) {
                console.error('Product ID is required');
                isValid = false;
            }

            // Validate quantity
            const quantity = parseInt(document.querySelector('[x-bind\\:value="quantity"]').value, 10);
            if (isNaN(quantity) || quantity < 1) {
                console.error('Quantity must be at least 1');
                isValid = false;
            }

            // Add more validations as needed

            return isValid;
        }

        function handleAsyncSubmit(event) {
            event.preventDefault(); // Prevent normal form submission
            if (!validateForm()) {
                alert('Please correct the errors in the form.');
                return;
            }

            const form = event.target;
            const url = form.action;
            const formData = new FormData(form);

            fetch(url, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                    }
                })
                .then(response => response.json())
                .then(data => {
                    console.log('Success:', data);
                    window.updateCartCount();
                    window.toggleSlideOverCart();
                    updateTotalPrice();
                })
                .catch((error) => {
                    console.error('Error:', error);
                });
        }

        function updateTotalPrice() {
            var basePrice = parseFloat('{{ $product->price }}'); // Get the base price from Blade into JS
            var quantity = parseInt(document.querySelector('[x-bind\\:value="quantity"]').value);
            var optionsPrice = 0;

            // Assuming each selected option has a class or attribute you can select on
            document.querySelectorAll('.option-selected').forEach(option => {
                optionsPrice += parseFloat(option.dataset.price); // Use dataset to access data attributes
            });

            // Update to include checkbox options with prices
            document.querySelectorAll('input[type="checkbox"]:checked').forEach(checkbox => {
                var price = parseFloat(checkbox.getAttribute('data-price') || 0);
                optionsPrice += price;
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
        document.querySelectorAll('input[type="checkbox"]').forEach(checkbox => {
            checkbox.addEventListener('change', updateTotalPrice);
        });

        function selectImageForProduct(imageId, imageUrl) {
            event.preventDefault();
            // prevent default este pentru ca sa nu adauge produsul in cos.
            // sincer, nu stiu cum ai reusit
            // decomenteaz-o daca vrei sa razi :))))

            const modal = document.getElementById('attributeProductImageModal');
            const fileInputSelected = modal.getAttribute('data-fileInputSelected');

            const buttons = document.querySelectorAll(`button[data-attribute-index="${fileInputSelected}"]`);
            const hiddenInput = document.getElementById('fileInput-' + fileInputSelected);
            hiddenInput.value = imageId;

            buttons.forEach(button => {
                button.style.backgroundImage = `url('${imageUrl}')`;
                button.style.backgroundColor = '#d1d5db';
                button.textContent = '';
            });

            modal.close();
        }

        function openImageModal(fileInputSelected) {
            document.getElementById('attributeProductImageModal').setAttribute('data-fileInputSelected', fileInputSelected);
            document.getElementById('attributeProductImageModal').showModal();
        }
    </script>
@endsection

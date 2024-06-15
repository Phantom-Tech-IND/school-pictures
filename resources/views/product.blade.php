@extends('layouts.app')
@section('content')
    <form onsubmit="handleAsyncSubmit(event)" method="POST" action="{{ route('add.to.cart') }}" id="productForm">
        @csrf

        <!-- Toast Notification for displaying validation messages -->
        <div id="toastNotification"
            class="fixed z-50 hidden max-w-sm p-4 text-red-700 transition-transform duration-500 bg-red-100 border-l-4 border-red-500 rounded shadow-lg bottom-10 right-10">
            <p id="toastMessage">Some message here</p>
        </div>
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <div class="px-4 mx-auto max-w-7xl">
            <div class="flex flex-wrap-reverse">
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
                    @if ($product->description)
                        <div class="m-4 mt-8 prose">
                            {!! Str::markdown($product->description) !!}
                        </div>
                    @endif
                    @if ($product->additional_information)
                        <div class="m-4 mt-8 prose">
                            {!! Str::markdown($product->additional_information) !!}
                        </div>
                    @endif
                </div>

                <!-- Product Details -->
                <div class="w-full p-4 md:w-1/3">
                    <h2 class="text-2xl font-bold">{{ $product->name }}</h2>

                    {{-- <pre>{{ json_encode($product, JSON_PRETTY_PRINT) }}</pre> --}}

                    @foreach ($product->custom_attributes as $index => $attribute)
                        {{-- selector --}}
                        @if ($attribute['type'] == 'select')
                            <div x-data="{ open: false, selected: { label: 'Option auswählen', price: 0 } }">
                                <label id="listbox-label-{{ $attribute['title'] }}"
                                    class="block pt-4 font-medium leading-6 text-gray-900">
                                    {{ $attribute['title'] }}
                                    @if ($attribute['is_required'])
                                        <span class="text-red-500">*</span>
                                    @endif
                                </label>
                                <p class="text-sm text-gray-600">{{ $attribute['additional_info'] }}</p>
                                <div class="relative mt-2">
                                    <button @click="open = !open" type="button"
                                        class="relative w-full cursor-default rounded-md bg-white py-1.5 pl-3 pr-10 text-left text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                        :aria-expanded="open" aria-haspopup="listbox"
                                        aria-labelledby="listbox-label-{{ $attribute['title'] }}">
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
                                    <input type="hidden" name="{{ $attribute['title'] }}" x-model="selected.label"
                                        {{ $attribute['is_required'] ? 'required' : '' }}>


                                    <ul x-show="open" x-transition:enter="transition ease-out duration-100"
                                        x-transition:enter-start="transform opacity-0 scale-95"
                                        x-transition:enter-end="transform opacity-100 scale-100"
                                        x-transition:leave="transition ease-in duration-75"
                                        x-transition:leave-start="transform opacity-100 scale-100"
                                        x-transition:leave-end="transform opacity-0 scale-95"
                                        class="absolute z-10 w-full py-1 mt-1 text-base bg-white rounded-md shadow-lg max-h-60 ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm"
                                        tabindex="-1" role="listbox"
                                        aria-labelledby="listbox-label-{{ $attribute['title'] }}"
                                        @click.away="open = false">
                                        @foreach ($attribute['options'] as $option)
                                            <li @click="selected = { label: '{{ $option['label'] }}', price: {{ $option['price'] ?? 0 }} }; open = false"
                                                :class="{ 'bg-blue-100': selected.label === '{{ $option['label'] }}' }"
                                                class="relative py-2 pl-3 pr-3 text-gray-900 cursor-default select-none hover:bg-gray-100"
                                                id="listbox-option-{{ $loop->index }}" role="option"
                                                data-price="{{ $option['price'] ?? 0 }}">
                                                <div class="flex justify-between">
                                                    <span class="block font-normal">{{ $option['label'] }}</span>
                                                    <span class="flex items-center">
                                                        @if (isset($option['price']))
                                                            <span
                                                                class="block font-normal text-right text-gray-500 whitespace-nowrap
                                                                {{ isset($option['custom_info']) ? '' : 'mr-8' }}
                                                                ">{{ $option['price'] }}
                                                                CHF</span>
                                                        @endif
                                                        @if (isset($option['custom_info']))
                                                            <div class="relative group">
                                                                <x-heroicon-s-exclamation-circle
                                                                    class="ml-2 transition duration-300 ease-in-out cursor-pointer size-6 text-accent-500 hover:text-accent-700" />
                                                                <div
                                                                    class="
                                                        absolute pointer-events-none max-w-[25rem] w-max left-0 -top-6 translate-x-[-50%] translate-y-[-100%] p-3 m-4 text-sm text-gray-700 bg-white border rounded shadow-lg
                                                        transition-opacity duration-300 ease-in-out delay-150 opacity-0
                                                        group-hover:block group-hover:opacity-100 group-hover:delay-300 group-hover:pointer-events-auto
                                                        ">
                                                                    {{ $option['custom_info'] }}
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </span>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif

                        {{-- checkbox --}}
                        @if ($attribute['type'] == 'checkbox')
                            <div class="mt-4">
                                <label class="block text-sm font-medium text-gray-700">
                                    {{ $attribute['title'] }}
                                    @if ($attribute['is_required'])
                                        <span class="text-red-500">*</span>
                                    @endif
                                </label>
                                @if ($attribute['additional_info'])
                                    <p class="my-1 text-sm text-gray-500">
                                        {{ $attribute['additional_info'] }}
                                    </p>
                                @endif
                                @foreach ($attribute['options'] as $option)
                                    <div class="mt-2">
                                        <!-- Hidden input for false value -->
                                        <input type="hidden"
                                            name="{{ $attribute['title'] . '[' . $option['label'] . ']' }}" value="false">
                                        <label class="inline-flex items-center">
                                            <input type="checkbox"
                                                class="form-checkbox checked:bg-accent-600 checked:hover:bg-accent-700 focus:ring-accent-500"
                                                name="{{ $attribute['title'] . '[' . $option['label'] . ']' }}"
                                                value="true" data-price="{{ $option['price'] ?? 0 }}"
                                                @if ($option['is_required']) required @endif>
                                            <span class="ml-2">{{ $option['label'] }}</span>
                                            @if (isset($option['price']))
                                                <span class="ml-2 text-sm text-gray-500">(+{{ $option['price'] }}
                                                    CHF)</span>
                                            @endif
                                            @if (isset($option['custom_info']))
                                                <div class="relative group">
                                                    <x-heroicon-s-exclamation-circle
                                                        class="ml-2 transition duration-300 ease-in-out cursor-pointer size-6 text-accent-500 hover:text-accent-700" />
                                                    <div
                                                        class="
                                                        absolute pointer-events-none max-w-[25rem] w-max left-0 -top-6 translate-x-[-50%] translate-y-[-100%] p-3 m-4 text-sm text-gray-700 bg-white border rounded shadow-lg
                                                        transition-opacity duration-300 ease-in-out delay-150 opacity-0
                                                        group-hover:block group-hover:opacity-100 group-hover:delay-300 group-hover:pointer-events-auto
                                                        ">
                                                        {{ $option['custom_info'] }}
                                                    </div>
                                                </div>
                                            @endif
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        {{-- Existing file input section to be replaced --}}
                        @if ($attribute['type'] == 'fileInput')
                            <div class="my-4">
                                <label class="block text-sm font-medium text-gray-700">
                                    {{ $attribute['title'] }}
                                    <span class="text-red-500">*</span>
                                </label>
                                <div class="flex items-center gap-2 isolate">
                                    @if (isset($attribute['fileInputImage']))
                                        <img src="{{ asset('storage/' . $attribute['fileInputImage']) }}"
                                            class="object-contain w-20 h-20 p-0.5 bg-gray-300 border-2 border-gray-300 rounded-lg" />
                                    @endif
                                    <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7"></path>
                                    </svg>
                                    <input type="hidden" id="{{ 'fileInput-' . $index }}"
                                        name="{{ 'fileInput-' . $attribute['title'] }}" value="" readonly required>

                                    <div class="relative">
                                        <button type="button" onclick="openImageModal(event, {{ $index }})"
                                            class="w-20 h-20 text-white bg-center bg-no-repeat bg-contain rounded bg-accent-500 hover:bg-accent-700"
                                            data-attribute-index="{{ $index }}">
                                            <p>Wählen Sie ein Bild</p>
                                        </button>
                                        <a data-fslightbox='{{ 'zoomImageButton-' . $index }}'
                                            href="{{ asset('storage/' . $index) }}"
                                            id="{{ 'zoomImageButton-' . $index }}" type="button"
                                            class="absolute z-10 hidden p-2 ml-2 text-white rounded -top-5 -right-5 customHoverEffect">
                                            <svg fill="#000000" class="w-8 h-8" version="1.1" id="Layer_1"
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 299.998 299.998"
                                                xml:space="preserve">
                                                <g>
                                                    <g>
                                                        <g>
                                                            <path
                                                                d="M139.414,96.193c-22.673,0-41.056,18.389-41.056,41.062c0,22.678,18.383,41.062,41.056,41.062
                                                                                                                                        c22.678,0,41.059-18.383,41.059-41.062C180.474,114.582,162.094,96.193,139.414,96.193z M159.255,146.971h-12.06v12.06
                                                                                                                                        c0,4.298-3.483,7.781-7.781,7.781c-4.298,0-7.781-3.483-7.781-7.781v-12.06h-12.06c-4.298,0-7.781-3.483-7.781-7.781
                                                                                                                                        c0-4.298,3.483-7.781,7.781-7.781h12.06v-12.063c0-4.298,3.483-7.781,7.781-7.781c4.298,0,7.781,3.483,7.781,7.781v12.063h12.06
                                                                                                                                        c4.298,0,7.781,3.483,7.781,7.781C167.036,143.488,163.555,146.971,159.255,146.971z" />
                                                            <path
                                                                d="M149.997,0C67.157,0,0.001,67.158,0.001,149.995s67.156,150.003,149.995,150.003s150-67.163,150-150.003
                                                                                                                                        S232.836,0,149.997,0z M225.438,221.254c-2.371,2.376-5.48,3.561-8.59,3.561s-6.217-1.185-8.593-3.561l-34.145-34.147
                                                                                                                                        c-9.837,6.863-21.794,10.896-34.697,10.896c-33.548,0-60.742-27.196-60.742-60.744c0-33.548,27.194-60.742,60.742-60.742
                                                                                                                                        c33.548,0,60.744,27.194,60.744,60.739c0,11.855-3.408,22.909-9.28,32.256l34.56,34.562
                                                                                                                                        C230.185,208.817,230.185,216.512,225.438,221.254z" />

                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>
                                        </a>
                                    </div>


                                </div>
                            </div>
                        @endif
                    @endforeach

                    <dialog id="attributeProductImageModal" class="fixed bg-transparent p-2 xs:p-4 h-[stretch]"
                        data-fileInputSelected="">
                        <div class="relative h-full p-4 bg-white rounded-lg max-w-7xl">

                            <button type="button" onclick="closeModal()"
                                class="absolute top-0 right-0 p-2 m-4 text-white bg-gray-500 rounded-full hover:bg-gray-700 focus:outline-accent-600 focus-within:outline-accent-600">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                    <path
                                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                </svg>
                            </button>

                            <h2 class="mt-4 text-2xl font-semibold">Bild auswählen</h2>
                            <div class="h-[calc(100%-48px)] w-full overflow-y-scroll">
                                <div class="grid grid-cols-3 gap-4 pt-2 xs:grid-cols-4 lg:grid-cols-5">
                                    @foreach ($student->photos as $photo)
                                        <div>
                                            <button type="button"
                                                onclick="selectImageForProduct('{{ $photo->id }}', '{{ asset('storage/' . $photo->photo_path) }}')"
                                                class="p-0.5 relative">
                                                <img src="{{ asset('storage/' . $photo->photo_path) }}" alt="Schülerbild"
                                                    class="block object-contain bg-gray-300 border-2 border-gray-300 rounded shadow-md cursor-pointer aspect-square">
                                                <div
                                                    class="absolute inset-0 bg-black bg-opacity-0 rounded hover:bg-opacity-25">
                                                </div>
                                            </button>
                                            <p class="text-sm text-center">{{ basename($photo->photo_path, '.jpg') }}</p>
                                        </div>
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
                                <span class="text-sm">Produktpreis</span>
                                <span class="text-sm">Optionen</span>
                                <span class="text-sm">Menge</span>
                                <span class="font-semibold">Gesamt</span>
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
                            In den Warenkorb hinzufügen
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </form>

    <script>
        function displayToast(message) {
            const toast = document.getElementById('toastNotification');
            const toastMessage = document.getElementById('toastMessage');
            toastMessage.innerText = message;
            toast.classList.remove('hidden');
            toast.classList.add('block');

            // Automatically hide the toast after 5 seconds
            setTimeout(() => {
                toast.classList.remove('block');
                toast.classList.add('hidden');
            }, 3000);
        }

        function validateForm(formData) {
            let isValid = true;
            let errors = [];

            // Example validation for product_id to ensure it is not empty
            if (!formData.get('product_id')) {
                errors.push('Die Produkt ID ist erforderlich.');
                isValid = false;
            }

            // Example validation for quantity to ensure it is a number and greater than 0
            const quantity = formData.get('quantity');
            if (!quantity || isNaN(quantity) || parseInt(quantity) <= 0) {
                errors.push('Die Menge muss eine positive Zahl sein. Menge: ' + quantity);
                isValid = false;
            }

            // Validate select inputs and file inputs if they are required
            document.querySelectorAll('#productForm input[type="hidden"][required]').forEach(input => {
                const selectValue = formData.get(input.name);
                let selectElement;
                const isFileInput = input.id.startsWith(
                    'fileInput-'); // Check if it's a file input based on ID convention

                if (isFileInput) {
                    // Target the button for file inputs using data-attribute-index
                    const index = input.id.split('-')[1]; // Assuming the format is 'fileInput-INDEX'
                    selectElement = document.querySelector(`button[data-attribute-index="${index}"]`);
                } else {
                    // Target the button for select inputs
                    selectElement = document.querySelector(`button[aria-labelledby="listbox-label-${input.name}"]`);
                }

                if (!selectValue || selectValue === 'Option auswählen' || (isFileInput && selectValue === '')) {
                    const attributeName = isFileInput ? input.name.replace('fileInput-', '') : input.name;
                    errors.push(`${attributeName}`);
                    isValid = false;
                    if (selectElement) {
                        selectElement.classList.add('ring-red-500', 'ring-2');
                    }
                } else {
                    if (selectElement) {
                        selectElement.classList.remove('ring-red-500', 'ring-2');
                    }
                }
            });

            // Display errors if any
            if (!isValid) {
                displayToast('Alle mit * markierten Felder sind erforderlich:\n' + errors.join('\n'));
            }

            return isValid;
        }

        function handleAsyncSubmit(event) {
            event.preventDefault(); // Prevent normal form submission

            const form = event.target;
            const url = form.action;
            const formData = new FormData(form);

            if (!validateForm(formData)) {
                return;
            }

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


            const modal = document.getElementById('attributeProductImageModal');
            const fileInputSelected = modal.getAttribute('data-fileInputSelected');

            const buttons = document.querySelectorAll(`button[data-attribute-index="${fileInputSelected}"]`);
            const hiddenInput = document.getElementById('fileInput-' + fileInputSelected);
            hiddenInput.value = imageId;

            const zoomImageButton = document.getElementById('zoomImageButton-' + fileInputSelected);
            zoomImageButton.classList.remove('hidden');
            zoomImageButton.href = imageUrl;
            refreshFsLightbox();

            buttons.forEach(button => {
                button.style.backgroundImage = `url('${imageUrl}')`;
                button.style.backgroundColor = '#d1d5db';
                button.querySelector('p').textContent = '';
            });

            closeModal();
        }

        function openImageModal(event, fileInputSelected) {
            event.preventDefault(); // Prevent default if it's attached to a link or button
            document.getElementById('attributeProductImageModal').setAttribute('data-fileInputSelected', fileInputSelected);
            document.getElementById('attributeProductImageModal').showModal();
            // Save the element that opened the modal to return focus later
            document.getElementById('attributeProductImageModal').setAttribute('data-invoker', event.target.id);
        }

        function closeModal(event) {
            if (event) {
                event.preventDefault();
                event.stopPropagation();
            }

            const modal = document.getElementById('attributeProductImageModal');

            const scrollPosition = window.scrollY;

            modal.close();

            window.scrollTo(0, scrollPosition);
        }

        document.addEventListener('click', function(event) {
            const modal = document.getElementById('attributeProductImageModal');
            if (event.target === modal) {
                closeModal(event);
            }
        });
    </script>

    <style>
        .customHoverEffect>svg {
            fill: rgba(30, 30, 30, 0.8);
            transition: fill 0.2s ease-in-out;
        }

        .customHoverEffect:hover>svg {
            fill: black;
        }

        dialog {
            overflow: initial;
        }
    </style>
@endsection

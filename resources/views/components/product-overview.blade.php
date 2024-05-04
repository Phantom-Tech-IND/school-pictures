@php
    $products = json_decode($products, true);
    $selectedProductKey = array_search($selectedProductId, array_column($products, 'id'));
    $selectedProduct = $selectedProductKey !== false ? $products[$selectedProductKey] : null;
@endphp


<image-gallery-container {{-- data-min="{{ $selectedProduct['min'] }}" --}} {{-- data-max="{{ $selectedProduct['max'] }}" --}} data-min="{{ 1 }}"
    data-max="{{ 5 }}" data-selected-product-id="{{ $selectedProductId }}" id="{{ $galleryName }}">
    <div class="bg-white">
        <div class="pt-6">
            <div
                class="max-w-2xl grid-rows-1 mx-auto mt-6 sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-4 lg:gap-x-8 lg:px-8 lg:h-[80lvh]">
                <div
                    class="bg-gray-100 border-2 border-gray-300 shadow-lg lg:col-span-2 lg:flex lg:flex-col lg:h-full lg:justify-stretch">
                    <img src="{{ $selectedProduct['images'][0] ?? '' }}" id="productImage"
                        alt="Two each of gray, white, and black shirts laying flat."
                        class="flex-shrink object-contain object-center w-full max-w-full min-h-0 p-4 rounded-lg lg:grow lg:h-auto h-72">
                    <image-display container-id="{{ $galleryName }}"
                        class="flex flex-row flex-shrink-0 overflow-x-auto"></image-display>
                </div>

                <div
                    class="relative grid grid-cols-3 gap-4 p-4 mt-8 overflow-y-scroll border-2 border-gray-300 shadow-lg lg:mt-0 max-h-72 lg:max-h-max lg:h-auto auto-rows-min place-items-center lg:col-span-2 lg:grid-cols-4 xs:grid-cols-4">
                    @foreach ($student['photos'] as $key => $photo)
                        <image-selector container-id="{{ $galleryName }}" alt="Image {{ $key + 1 }}"
                            key="{{ $photo['id'] }}" src="{{ $photo['photo_path'] }}"
                            class="w-24 h-24"></image-selector>
                    @endforeach
                </div>

            </div>

            <div
                class="mx-auto max-w-2xl px-4 pb-16 pt-10 sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-4 lg:grid-rows-[auto,auto,1fr] lg:gap-x-8 lg:px-8 lg:pb-24 lg:pt-16">

                <div class="lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
                    <h1 id="productName" x-text="selectedProductName"
                        class="inline text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl">
                        {{ $selectedProduct['name'] }}
                    </h1>
                    <span id="productPrice" class="text-lg text-gray-500">{{ $selectedProduct['price'] }} CHF</span>
                </div>

                <div class="mt-4 lg:row-span-3 lg:mt-0 lg:col-span-2">
                    <h2 class="sr-only">Product information</h2>


                    <div class="mt-10">
                        <div x-data="{
                            selectedProductId: '{{ $selectedProductId }}',
                            selectedProductName: '{{ $selectedProduct['name'] }}',
                            selectedProductDescription: '{{ str_replace(PHP_EOL, ' ', $selectedProduct['description']) }}',
                            updateProducts() {
                                var productImage = document.getElementById('productImage');
                                var selectedProductId = document.getElementById('y-selected-product-' + this.selectedProductId);
                                var productDescription = document.getElementById('productDescription');
                                var productName = document.getElementById('productName');
                                var productPrice = document.getElementById('productPrice');
                        
                                if (productImage && selectedProductId) {
                                    productImage.src = selectedProductId.src;
                                    this.selectedProductName = selectedProductId.getAttribute('data-name');
                                    productName.textContent = this.selectedProductName;
                        
                                    productDescription.textContent = selectedProductId.getAttribute('data-description');
                                    productPrice.textContent = selectedProductId.getAttribute('data-price') + ' CHF';
                                }
                                var gallery = document.getElementById('{{ $galleryName }}');
                                gallery.setAttribute('data-min', selectedProductId.getAttribute('data-min'));
                                gallery.setAttribute('data-max', selectedProductId.getAttribute('data-max'));
                                gallery.setAttribute('data-selected-product-id', this.selectedProductId);
                            }
                        }" class="mt-10">
                            <div class="flex items-center justify-between">
                                <h3 class="text-sm font-medium text-gray-900">Products</h3>
                                <a href="#" class="text-sm font-medium text-accent-600 hover:text-accent-500">Info
                                    about products</a>
                            </div>

                            <fieldset class="mt-4">
                                <legend class="sr-only">Choose a product</legend>
                                <div class="grid grid-cols-2 gap-4 sm:grid-cols-6 lg:grid-cols-4 xs:grid-cols-3">
                                    @foreach ($products as $product)
                                        <label
                                            :class="{
                                                'ring-2 ring-accent-500': selectedProductId ==
                                                    '{{ $product['id'] }}',
                                                'text-gray-900 bg-white': selectedProductId !=
                                                    '{{ $product['id'] }}'
                                            }"
                                            class="relative flex items-center justify-center h-32 overflow-hidden text-sm font-medium uppercase border rounded-md shadow-sm cursor-pointer group hover:bg-gray-50 focus:outline-none sm:flex-1">
                                            <input type="radio" name="product-choice" value="{{ $product['id'] }}"
                                                class="sr-only" x-model="selectedProductId" @change="updateProducts()"
                                                aria-labelledby="product-choice-{{ $product['id'] }}-label">
                                            <span id="product-choice-{{ $product['id'] }}-label"
                                                class="sr-only">{{ $product['id'] }}</span>
                                            <img src="{{ $product['images'][0] ?? '' }}" alt=""
                                                id="y-selected-product-{{ $product['id'] }}"
                                                data-min="{{ 1 }}" data-max="{{ 5 }}"
                                                data-name="{{ $product['name'] }}"
                                                data-description="{{ $product['description'] }}"
                                                data-price="{{ $product['price'] }}"
                                                class="object-cover w-full h-full transition-opacity duration-300 ease-in-out rounded-md">
                                            <div
                                                class="absolute inset-0 transition-all duration-300 ease-in-out bg-black bg-opacity-0 group-hover:bg-opacity-50">
                                            </div>
                                        </label>
                                    @endforeach
                                </div>
                            </fieldset>
                        </div>

                        <button type="submit"
                            class="flex items-center justify-center w-full px-8 py-3 mt-10 text-base font-medium text-white border border-transparent rounded-md bg-accent-600 hover:bg-accent-700 focus:outline-none focus:ring-2 focus:ring-accent-500 focus:ring-offset-2">Add
                            to bag</button>
                    </div>
                </div>

                <div class="py-10 lg:col-span-2 lg:col-start-1 lg:border-r lg:border-gray-200 lg:pb-16 lg:pr-8 lg:pt-6">

                    <div>
                        <h3 class="sr-only">Description</h3>

                        <div class="space-y-6">
                            <p id="productDescription" x-text="selectedProductDescription"
                                class="text-base text-gray-900">{{ $selectedProduct['description'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</image-gallery-container>


<style>
    /* Custom pseudo-elements adjusted for vertical scrolling */

    .scrollable-grid::before,
    .scrollable-grid::after {
        content: '';
        position: absolute;
        left: 0;
        right: 0;
        height: 20px;
        /* Adjust height as needed */
        z-index: 10;
    }

    .scrollable-grid::before {
        top: 0;
        background: linear-gradient(to bottom, white, transparent);
    }

    .scrollable-grid::after {
        bottom: 0;
        background: linear-gradient(to top, white, transparent);
    }
</style>

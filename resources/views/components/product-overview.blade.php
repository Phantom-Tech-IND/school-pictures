<div class="bg-white">
    <div class="pt-6">
        </nav>

        <div class="max-w-2xl mx-auto mt-6 sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-3 lg:gap-x-8 lg:px-8">
            <div class="hidden overflow-hidden rounded-lg aspect-h-4 aspect-w-3 lg:block">
                <img src="https://tailwindui.com/img/ecommerce-images/product-page-02-secondary-product-shot.jpg"
                    alt="Two each of gray, white, and black shirts laying flat."
                    class="object-cover object-center w-full h-full">
            </div>
        </div>

        <div
            class="mx-auto max-w-2xl px-4 pb-16 pt-10 sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-4 lg:grid-rows-[auto,auto,1fr] lg:gap-x-8 lg:px-8 lg:pb-24 lg:pt-16">

            <div class="lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
                <h1 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl">{{ $student->name }}</h1>
            </div>

            <div class="mt-4 lg:row-span-3 lg:mt-0 lg:col-span-2">
                <h2 class="sr-only">Product information</h2>
                <p class="text-3xl tracking-tight text-gray-900">$192</p>

                <div class="mt-6" x-data="{ rating: 4, maxRating: 5, tempRating: null }">
                    <h3 class="sr-only">Reviews</h3>
                    <div class="flex items-center">
                        <div class="flex items-center gap-2">
                            <template x-for="(star, index) in Array.from({ length: maxRating }, (_, i) => i + 1)"
                                :key="index">
                                <svg @click="rating = index + 1; tempRating = null" @mouseover="tempRating = index + 1"
                                    @mouseleave="tempRating = null"
                                    :class="{ 'w-6 h-6': tempRating === index + 1, 'w-5 h-5': tempRating !== index + 1 }"
                                    class="flex-shrink-0 text-yellow-400 transition-transform duration-150 ease-in-out cursor-pointer"
                                    style="margin: -0.125rem" <!-- Adjust margin to compensate for size change -->
                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path
                                        :fill="tempRating !== null ? (tempRating >= index + 1 ? 'currentColor' : 'none') : (
                                            rating >= index + 1 ? 'currentColor' : 'none')"
                                        stroke="currentColor" stroke-width="1" fill-rule="evenodd"
                                        d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z"
                                        clip-rule="evenodd" />
                                </svg>
                            </template>
                        </div>
                        <p class="sr-only"
                            x-text="(tempRating !== null ? tempRating : rating) + ' out of ' + maxRating + ' stars'">
                        </p>
                        <a href="#" class="ml-3 text-sm font-medium text-accent-600 hover:text-accent-500">117
                            reviews</a>
                    </div>
                </div>

                <form class="mt-10">
                    <!-- Colors -->
                    <div>
                        <h3 class="text-sm font-medium text-gray-900">Color</h3>

                        <fieldset class="mt-4">
                            <legend class="sr-only">Other clickable options</legend>
                            <div class="flex items-center space-x-3">
                                @php
                                    $colors = [
                                        ['value' => 'White', 'bg' => 'bg-white', 'border' => 'border-opacity-10'],
                                        ['value' => 'Gray', 'bg' => 'bg-gray-200', 'border' => 'border-opacity-10'],
                                        ['value' => 'Black', 'bg' => 'bg-gray-900', 'border' => 'border-opacity-10'],
                                    ];
                                @endphp
                                @foreach ($colors as $index => $color)
                                    <label
                                        class="relative -m-0.5 flex cursor-pointer items-center justify-center rounded-full p-0.5 focus:outline-none ring-gray-400">
                                        <input type="radio" name="color-choice" value="{{ $color['value'] }}"
                                            class="sr-only" aria-labelledby="color-choice-{{ $index }}-label">
                                        <span id="color-choice-{{ $index }}-label"
                                            class="sr-only">{{ $color['value'] }}</span>
                                        <span aria-hidden="true"
                                            class="{{ $color['bg'] }} border border-black rounded-full {{ $color['border'] }} w-8 h-8"></span>
                                    </label>
                                @endforeach
                            </div>
                        </fieldset>
                    </div>

                    <div x-data="{ selectedProductId: '{{ $selectedProductId }}' }" class="mt-10">
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
                                        :class="{ 'ring-2 ring-accent-500': selectedProductId ==
                                            '{{ $product['id'] }}', 'text-gray-900 bg-white': selectedProductId !=
                                                '{{ $product['id'] }}' }"
                                        class="relative flex items-center justify-center h-32 overflow-hidden text-sm font-medium uppercase border rounded-md shadow-sm cursor-pointer group hover:bg-gray-50 focus:outline-none sm:flex-1">
                                        <input type="radio" name="product-choice" value="{{ $product['id'] }}"
                                            class="sr-only" x-model="selectedProductId"
                                            aria-labelledby="product-choice-{{ $product['id'] }}-label">
                                        <span id="product-choice-{{ $product['id'] }}-label"
                                            class="sr-only">{{ $product['id'] }}</span>
                                        <img src="{{ $product['image'] }}" alt=""
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
                </form>
            </div>

            <div class="py-10 lg:col-span-2 lg:col-start-1 lg:border-r lg:border-gray-200 lg:pb-16 lg:pr-8 lg:pt-6">

                <div>
                    <h3 class="sr-only">Description</h3>

                    <div class="space-y-6">
                        <p class="text-base text-gray-900">A basic description here Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia, perferendis! Cupiditate aperiam, minus facere quasi quos delectus quidem repellat porro voluptatem odit minima autem, enim dolorem! Porro assumenda voluptatem unde?</p>
                    </div>
                </div>

                <div class="mt-10">
                    <h3 class="text-sm font-medium text-gray-900">Package Contents</h3>

                    <div class="mt-4">
                        <ul role="list" class="pl-4 space-y-2 text-sm list-disc">
                            <li class="text-gray-600">2 x Black Basic Tees</li>
                            <li class="text-gray-600">2 x White Basic Tees</li>
                            <li class="text-gray-600">2 x Heather Gray Basic Tees</li>
                        </ul>
                    </div>
                </div>

                <div class="mt-10">
                    <h2 class="text-sm font-medium text-gray-900">Details</h2>

                    <div class="mt-4 space-y-6">
                        <p class="text-sm text-gray-600">Some details about the product</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

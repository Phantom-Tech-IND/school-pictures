@extends('layouts.app')
@section('content')
    @include('components.secondary-banner', [
        'title' => $product->name,
        'image' => $product->images[0],
    ])

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
                <p class="text-xl text-gray-500">${{ $product->price }}</p>
                <div class="mt-4">
                    <div class="text-sm text-gray-600">{{ $product->description }}</div>
                </div>

                <pre>{{ json_encode($product, JSON_PRETTY_PRINT) }}</pre>
                @foreach($product->custom_attributes as $attribute)
                    @if($attribute['type'] == 'select')
                        <div class="mt-4">
                            <label class="block text-gray-700">{{ $attribute['title'] }}</label>
                            <select class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-accent-500 focus:ring focus:ring-accent-500 focus:ring-opacity-50">
                                @foreach($attribute['options'] as $option)
                                    <option value="{{ $option['label'] }}">{{ $option['label'] }}</option>
                                @endforeach
                            </select>
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
                <button class="px-4 py-2 mt-4 font-bold text-white rounded bg-accent-500 hover:bg-accent-700">
                    Add to bag
                </button>
            </div>
        </div>
    </div>
@endsection

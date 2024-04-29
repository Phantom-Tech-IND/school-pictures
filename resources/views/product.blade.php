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
                            <div class="absolute inset-0 m-2 bg-black rounded-lg opacity-0 pointer-events-none group-hover:opacity-20"></div>
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
                <div class="mt-4">
                    <label class="block text-gray-700">Custom Attributes</label>
                    <ul>
                        {{ json_encode($product->custom_attributes) }}
                    </ul>
                </div>
                <div class="mt-4">
                    <label class="block text-gray-700">Color</label>
                    <div class="flex">
                        <!-- Assuming colors are predefined -->
                        <div class="w-6 h-6 mr-2 bg-black rounded-full"></div>
                        <div class="w-6 h-6 bg-gray-500 rounded-full"></div>
                    </div>
                </div>
                <button class="px-4 py-2 mt-4 font-bold text-white rounded bg-accent-500 hover:bg-accent-700">
                    Add to bag
                </button>
            </div>
        </div>
    </div>
@endsection

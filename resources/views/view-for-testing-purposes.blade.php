@php
    use App\Constants\Constants;
@endphp

@extends('layouts.app')
@include('components.image-selector')

@section('content')
    <image-gallery-container id="myGallery" class="p-4 mt-20 bg-red-300">
        <!-- Responsive grid with minmax and clamp -->
        <div class="grid gap-4 bg-blue-400 auto-rows-fr"
            style="grid-template-columns: repeat(auto-fill, minmax(clamp(5rem, 2.5455rem + 10.9091vw, 20rem), 1fr));">
            <!-- Image selectors for individual images -->
            @foreach ($images as $key => $image)
                <!-- Ensure images are square -->
                <image-selector container-id="myGallery" alt="Image {{ $key + 1 }}" key="key{{ $key + 1 }}"
                    src="{{ $image }}" class="aspect-square"></image-selector>
            @endforeach
        </div>

        <!-- Display for selected images -->
        <image-display container-id="myGallery" class="bg-green-600"></image-display>
    </image-gallery-container>

    {{-- Example of how to get the selected images --}}
    <button class="px-4 py-2 mt-4 text-white bg-blue-500 rounded hover:bg-blue-700" onclick="showSelectedImages(event)">
        Show Selected Images
    </button>

    <script>
        function showSelectedImages(event) {
            const btn = event.target;
            const galleryContainer = document.querySelector('image-gallery-container');
            const selectedImages = galleryContainer.getAttribute('data-selected-images');
            btn.textContent = selectedImages ? `Selected Images: ${selectedImages}` : 'No Images Selected';
        }
    </script>
@endsection

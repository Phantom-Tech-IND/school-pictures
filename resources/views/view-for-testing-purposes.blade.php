@php
    use App\Constants\Constants;
@endphp

@extends('layouts.app')
@include('components.image-selector')

@section('content')
    <image-gallery-container data-min="3" data-max="5" id="myGallery" class="p-4 mt-20 bg-red-300">
        <!-- Responsive grid with minmax and clamp. Deja imi lipseste css-ul si se vede 😅 -->
        <div class="grid gap-4 bg-blue-400 auto-rows-fr"
            style="grid-template-columns: repeat(auto-fill, minmax(clamp(5rem, 2.5455rem + 10.9091vw, 20rem), 1fr));">
            <!-- Image selectors for individual images -->
            @foreach ($images as $key => $image)
                <!-- Ensure images are square -->
                <image-selector container-id="myGallery" alt="Image {{ $key + 1 }}" key="key{{ $key + 1 }}"
                    src="{{ $image }}" class="aspect-square"></image-selector>
            @endforeach
        </div>

        <h5 class="mt-10 mb-0">i added two <code class="bg-gray-300">image-display components</code> to check if the behaviour is consistent</h5>
        <image-display container-id="myGallery" class="bg-green-600"></image-display>
        <image-display container-id="myGallery" class="bg-green-300"></image-display>
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

@include('components.img-selector.image-gallery-container')
@include('components.img-selector.image-selector')
@include('components.img-selector.image-display')

<template id="image-selector-template">
    <div class="border cursor-pointer hover:border-blue-500 focus:border-blue-700 focus:outline-none">
        <!-- Adjusted class to ensure images are square and of the same size -->
        <img id="image"
            class="object-cover w-full h-full transition duration-300 ease-in-out transform">
    </div>
</template>

<template id="image-display-template">
    <div id="selectedImagesList"
        class="flex justify-start gap-4 mt-8 overflow-x-auto whitespace-nowrap scroll-smooth scrollbar-hide">
    </div>
</template>


@once
    <script>
        customElements.define('image-gallery-container', ImageGalleryContainer);
        customElements.define('image-selector', ImageSelector);
        customElements.define('image-display', ImageDisplay);
    </script>
@endonce

@include('components.img-selector.image-gallery-container')
@include('components.img-selector.image-selector')
@include('components.img-selector.image-display')

<template id="image-selector-template">
    <div class="border cursor-pointer hover:border-blue-500 focus:border-blue-700 focus:outline-none">
        <img id="image"
            class="object-cover w-full h-48 transition duration-300 ease-in-out transform rounded-lg hover:scale-105">
    </div>
</template>

<template id="image-display-template">
    <div id="selectedImagesList" class="flex flex-row flex-wrap justify-start gap-4 mt-8"></div>
</template>


@once
    <script>
        customElements.define('image-gallery-container', ImageGalleryContainer);
        customElements.define('image-selector', ImageSelector);
        customElements.define('image-display', ImageDisplay);
    </script>
@endonce


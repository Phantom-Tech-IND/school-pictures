@vite(['resources/js/image-selector/index.js'])

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
        <!-- Styles for images within this container are defined in CSS -->
    </div>
</template>

<template id="image-template">
    <img class="object-cover w-32 h-32">
</template>

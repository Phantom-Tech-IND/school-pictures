@vite(['resources/js/image-selector/index.js'])

<template id="image-selector-template">
    <label class="relative block border cursor-pointer hover:cursor-pointer hover:border-blue-500 focus:border-blue-700 focus:outline-none">
        <!-- Hidden checkbox -->
        <input type="checkbox" class="absolute opacity-0" style="width: 0; height: 0;">
        <!-- Image displayed as before -->
        <img class="object-cover w-full h-full transition duration-300 ease-in-out transform">
    </label>
</template>

<template id="image-display-template">
    <div id="selectedImagesList"
        class="flex justify-start gap-4 py-4 mt-8 overflow-x-auto">
        <!-- Styles for images within this container are defined in CSS -->
    </div>
</template>

<template id="image-template">
    <div class="relative w-32 h-32">
        <!-- Adjusted button styles for round shape and centering in the top right corner -->
        <button class="absolute top-0 right-0 p-1 text-white transform translate-x-1/2 -translate-y-1/2 bg-red-500 rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/>
            </svg>
        </button>
        <img class="object-cover w-full h-full min-w-32">
    </div>
</template>

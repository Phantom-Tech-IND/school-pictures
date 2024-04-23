@vite(['resources/js/image-selector/index.js'])

<template id="image-selector-template">
    <label
        class="relative block border cursor-pointer hover:cursor-pointer hover:border-blue-500 focus:border-blue-700 focus:outline-none">
        <!-- Hidden checkbox -->
        <input type="checkbox" class="absolute opacity-0" style="width: 0; height: 0;">
        <!-- Adjusted image display -->
        <img class="object-cover w-full h-full max-w-xs transition duration-300 ease-in-out transform max-h-xs">
    </label>
</template>

<template id="image-display-template">
    <div id="selectedImagesList" class="flex justify-start gap-4 p-4">
        <!-- Styles for images within this container are defined in CSS -->
    </div>
</template>

<template id="image-placeholder-template">
    <div class="relative flex items-center justify-center w-24 h-24 bg-gray-200 placeholder min-w-24 min-h-24">
        <!-- Placeholder content goes here -->
        <span class="placeholder-text">Add Image</span>
    </div>
</template>

<template id="image-template">
    <div class="relative w-24 h-24 min-w-24 min-h-24">
        <!-- Draggable indicator (2x3 bullets), now with a shadow instead of background -->
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden pointer-events-none">
            <div
                class="absolute top-0 left-0 p-1 rounded-br-xl before:content-[''] before:absolute before:w-full before:h-full before:top-[-10px] before:left-[-10px] before:bg-black before:bg-opacity-80 before:blur-[10px] before:z-[-1] isolate">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="white"
                    class="z-1">
                    <!-- Row 1 -->
                    <circle cx="6" cy="6" r="2"></circle>
                    <circle cx="14" cy="6" r="2"></circle>
                    <!-- Row 2 -->
                    <circle cx="6" cy="12" r="2"></circle>
                    <circle cx="14" cy="12" r="2"></circle>
                    <!-- Row 3 -->
                    <circle cx="6" cy="18" r="2"></circle>
                    <circle cx="14" cy="18" r="2"></circle>
                </svg>
            </div>
        </div>
        <!-- Adjusted button styles for round shape and centering in the top right corner -->
        <button
            class="absolute top-0 right-0 p-1 text-white transform translate-x-1/2 -translate-y-1/2 bg-red-500 rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                viewBox="0 0 24 24">
                <path
                    d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z" />
            </svg>
        </button>
        <img class="object-cover w-full h-full">
    </div>
</template>

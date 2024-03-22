/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/ralphjsmit/laravel-filament-media-library/resources/**/*.blade.php'
    ],
    theme: {
        extend: {},
    },
    purge: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],

    plugins: [],
};

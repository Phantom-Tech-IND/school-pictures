/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/ralphjsmit/laravel-filament-media-library/resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.blade",
    ],
    darkMode: "class",
    theme: {
        extend: {
            colors: {
                primary: "#041F1E",
                secondary: "#041F1E",
                text: "#041F1E",
                accent: "#94C11C",
                white: "#FFFFFF",
                darkgrey: "#595959",
                transparentblack: "#00000000",
                black: "#000000",
                offwhite: "#FCF9F6",
                darkblue: "#2E4057",
            },
            fontFamily: {
                sans: ["Montserrat", "sans-serif"],
                raleway: ["Raleway", "sans-serif"],
            },
            fontWeight: {
                normal: 400,
                medium: 500,
                semibold: 600,
                bold: 700,
            },
            textTransform: {
                uppercase: "uppercase",
            },
            fontSize: {
                customLarge: ["50px", "1.2"],
            },
            fontStyle: {
                italic: "italic",
            },
        },
    },
    purge: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],

    plugins: [],
};

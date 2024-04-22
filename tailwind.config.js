/** @type {import('tailwindcss').Config} */
export default {
    content: ["./resources/**/*.js", "./resources/**/*.blade"],
    darkMode: "class",
    theme: {
        extend: {
            colors: {
                primary: "#041F1E",
                secondary: "#041F1E",
                text: "#041F1E",
                accent: {
                    DEFAULT: "#94C11C", // Original color
                    50: "#f7f9e8", // Lightest shade
                    100: "#e8f2bf",
                    200: "#d9eb96",
                    300: "#cae46d",
                    400: "#bbdd44",
                    500: "#acD61B", // Slightly lighter than the original
                    600: "#8cb416",
                    700: "#6d8f11",
                    800: "#4e6a0c",
                    900: "#2f4507", // Darkest shade
                },
                white: "#FFFFFF",
                darkgrey: "#595959",
                transparentblack: "#00000000",
                black: "#000000",
                backgroundgray: "#333",
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
            screens: {
                'xs': '475px',
            },
        },
    },
    purge: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],

    plugins: [require("@tailwindcss/forms")],
};

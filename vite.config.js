import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    server: {
        port: 3000,
        host: "localhost",
    },
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/js/image-selector/index.js",
                "resources/js/app.js",
                "resources/css/filament/admin/theme.css",
            ],
            server: {
                hmr: {
                    host: "localhost",
                },
            },
            refresh: [
                "app/**/*.php",
                "resources/**/*.blade.php",
                "resources/**/*.js",
                "resources/**/*.vue",
            ],
        }),
    ],
});

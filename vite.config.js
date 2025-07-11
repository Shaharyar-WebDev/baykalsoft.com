import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import tailwindcss from "@tailwindcss/vite";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/js/app.js",
                "resources/css/themes/red/index.css",
                "resources/css/themes/green/index.css",
                "resources/css/themes/blue/index.css",
                "resources/css/themes/orange/index.css",
                "resources/css/themes/violet/index.css",
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
});

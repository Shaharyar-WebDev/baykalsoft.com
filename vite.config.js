import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/shop/app.css",
                "resources/js/shop/app.js",
                "resources/css/shop/themes/red/index.css",
                "resources/css/shop/themes/green/index.css",
                "resources/css/shop/themes/blue/index.css",
                "resources/css/shop/themes/orange/index.css",
                "resources/css/shop/themes/violet/index.css",
            ],
            refresh: true,
        }),
    ],
});

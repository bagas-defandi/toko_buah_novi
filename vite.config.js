import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/css/bootstrap.css",
                "resources/css/style.css",
                "resources/css/responsive.css",
                "resources/js/jquery.js",
                "resources/js/app.js",
                "resources/js/bootstrap.js",
                "resources/js/custom.js",
            ],
            refresh: true,
        }),
    ],
});

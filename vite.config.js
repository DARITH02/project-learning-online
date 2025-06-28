import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import tailwindcss from "@tailwindcss/vite";
import React from "react";
import react from "@vitejs/plugin-react";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/js/app.js",
                "front-end/src/main.jsx",
            ],
            refresh: true,
        }),
        tailwindcss(),
        react(),
    ],
    alias: {
        "@": path.resolve(__dirname, "resources/front-end/src"),
    },
});

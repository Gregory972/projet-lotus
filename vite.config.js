import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js', 'resources/css/edit.css', 'resources/css/style.css', 'resources/css/password.css'],
            refresh: true,
        }),
        tailwindcss(),
    ],
});

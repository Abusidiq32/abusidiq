import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/frontend/styles.css',
                'resources/css/frontend/vendor.css',
                'resources/js/app.js',
                'resources/js/frontend/main.js',
                'resources/js/frontend/plugins.js',

            ],
            refresh: true,
        }),
    ],
});

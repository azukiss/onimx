import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                // CSS
                'resources/css/global.css',
                'resources/css/ripple.css',
                'resources/css/tippy.css',
                'resources/css/fa.css',

                // JS
                'resources/js/global.js',
            ],
            refresh: true,
        }),
    ],
});

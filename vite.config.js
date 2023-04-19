import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/_summernote.scss',
                'resources/css/_c3-chart.scss',
                'resources/js/app.js'
            ],
            refresh: [
                'resources/routes/**',
                'routes/**',
                'resources/views/**',
                'resources/js/**',
                'resources/css/**'
            ],
        }),
    ],
});

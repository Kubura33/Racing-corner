import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import path from 'path'

export default defineConfig({
    resolve: {
        alias : {
            'ziggy-js' : path.resolve('vendor/tightenco/ziggy/dist/vue.es.js'),
        }
    },
    base : 'https://racing-corner.com/',
    plugins: [
        laravel({
            input: ['resources/js/app.js',
                'resources/css/ads.css',
                'resources/css/style.css',
                'resources/css/bootstrap/bootstrap.css',
                'resources/css/flash.css',
                'resources/css/admin.css',
                'resources/js/bootstrap/bootstrap.js',
                'resources/js/bootstrap/bootstrap.esm.js',
                'resources/js/bootstrap/bootstrap.bundle.js',
            ],
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    css: {
        extract: [
            'resources/css/ads.css',
            'resources/css/style.css',
            'resources/css/bootstrap/bootstrap.css',
            'resources/css/flash.css',
            'resources/css/admin.css',
        ],
    },
});

import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/custom.css',
                'resources/js/app.js',
                // 'resources/js/password_toggle_visibility.js',
                'resources/js/nav-user.js'
            ],
            refresh: true,
        }),
    ],
});

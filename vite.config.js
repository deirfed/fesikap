import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/js/dashboardCekKunjungan.js',
                'resources/js/dashboardCekSuaraFromSVG.js',
                'resources/js/dashboardJumlahAspirasi.js',
                'resources/js/dashboardTotalKunjungan.js',
                'resources/js/dashboardShowSuara.js',
                'resources/js/formInputIsu.js',
                'resources/js/helper.js',
            ],
            refresh: true,
        }),
    ],
});

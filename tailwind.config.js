import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                brand: {
                    50: '#effcfb',
                    100: '#d2f5f2',
                    200: '#a5ebe6',
                    300: '#6edbd4',
                    400: '#3dbdb5',
                    500: '#14919b',
                    600: '#0d7377',
                    700: '#0a5c60',
                    800: '#08494c',
                    900: '#053b3e',
                },
                accent: {
                    50: '#fffbeb',
                    100: '#fef3c7',
                    200: '#fde68a',
                    300: '#fcd34d',
                    400: '#fbbf24',
                    500: '#f59e0b',
                    600: '#d97706',
                    700: '#b45309',
                    800: '#92400e',
                    900: '#78350f',
                },
                navy: '#0B1F3A',
            },
        },
    },

    plugins: [forms],
};

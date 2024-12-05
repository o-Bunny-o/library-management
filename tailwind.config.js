
import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
        './node_modules/swiper/**/*.js',
    ],

    theme: {
        extend: {
            colors: {
                'bg-color': '#f9f9f9',
                'text-color': '#333333',
                'accent-color': '#CE5B61',
                'input-bg': '#ffffff',
                'button-bg': '#fa6f76',
                'button-hover-bg': '#CE5B61',
                'border-color': '#d3d3d3',
                'highlight': '#ffe5e0',
            },
            fontFamily: {
                sans: ['Gill Sans', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};

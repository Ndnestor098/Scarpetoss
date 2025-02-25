import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        "./resources/**/*.blade.php",
    ],

    theme: {
        colors: {
            'verde': '#435334',
            'verdeClaro' : '#CEDEBD'
        }
    },

    plugins: [forms],
};

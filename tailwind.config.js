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
                sans: ['Bricolage Grotesque', 'Figtree', ...defaultTheme.fontFamily.sans],
            },
            fontSize: {
                sm: ['14px', '20px'],
                base: ['16px', '24px'],
                lg: ['20px', '28px'],
                xl: ['24px', '32px'],
            },
            colors: {
                primary: '#0960A8',
                secondayr: '#39B0FF',
                tertiary: '#DFF3FF',
                accent: '#008CFF',
            }
        },
    },

    plugins: [forms],
};

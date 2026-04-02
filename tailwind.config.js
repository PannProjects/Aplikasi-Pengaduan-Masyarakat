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
                sans: ['Inter', '-apple-system', 'BlinkMacSystemFont', '"Segoe UI"', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                titanium: {
                    50: '#f6f6f7',
                    100: '#efeff1',
                    200: '#dedfe3',
                    300: '#c3c5cb',
                    400: '#a3a6b0',
                    500: '#8b8e9a',
                    600: '#727581',
                    700: '#5c5e68',
                    800: '#4e5058',
                    900: '#43444a',
                    950: '#26272b',
                },
            },
        },
    },

    plugins: [forms],
};

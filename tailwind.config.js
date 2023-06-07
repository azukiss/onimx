/** @type {import('tailwindcss').Config} */
const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
    darkMode: 'class',
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
    ],
    theme: {
        extend: {
            fontFamily: {
                poppins: ['Poppins', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'transparent': 'transparent',
                'current': 'currentColor',

                // 'primary': '#912323',
                'oni': {
                    '50': '#fdf3f3',
                    '100': '#fce4e4',
                    '200': '#fbcdcd',
                    '300': '#f6abab',
                    '400': '#ef7a7a',
                    '500': '#e44f4f',
                    '600': '#d03232',
                    '700': '#af2626',
                    '800': '#912323', //primary
                    '900': '#792323',
                    '950': '#410e0e',
                },

                // 'secondary': '#dd5454',
                'roman': {
                    '50': '#fdf3f3',
                    '100': '#fbe5e5',
                    '200': '#f9cfcf',
                    '300': '#f3aeae',
                    '400': '#ea7f7f',
                    '500': '#dd5454', //secondary
                    '600': '#c93939',
                    '700': '#a92c2c',
                    '800': '#8c2828',
                    '900': '#752727',
                    '950': '#3f1010',
                },

                // 'tertiary': '#ff7676',
                'salmon': {
                    '50': '#fff1f1',
                    '100': '#ffe1e1',
                    '200': '#ffc7c7',
                    '300': '#ffa0a0',
                    '400': '#ff7676', //tertiary
                    '500': '#f83b3b',
                    '600': '#e51d1d',
                    '700': '#c11414',
                    '800': '#a01414',
                    '900': '#841818',
                    '950': '#480707',
                },

                'scooter': {
                    '50': '#effcfc',
                    '100': '#d6f7f7',
                    '200': '#b3eeee',
                    '300': '#7ee0e2',
                    '400': '#42c9ce',
                    '500': '#27adb3',
                    '600': '#238c97',
                    '700': '#23717b',
                    '800': '#245d66',
                    '900': '#224d57',
                    '950': '#12333a',
                },

                'polar': {
                    '1': '#2E3440',
                    '2': '#3B4252',
                    '3': '#434C5E',
                    '4': '#4C566A',
                },

                'storm': {
                    '1': '#D8DEE9',
                    '2': '#E5E9F0',
                    '3': '#ECEFF4',
                },

                'frost': {
                    '1': '#8FBCBB',
                    '2': '#88C0D0',
                    '3': '#81A1C1',
                    '4': '#5E81AC',
                },

                'error': '#BF616A',
                'danger': '#D08770',
                'warning': '#EBCB8B',
                'success': '#A3BE8C',
                'visited': '#B48EAD',
                'info': '#6AADDC',
            },
        },
    },
    plugins: [
        require('@tailwindcss/forms')({
            // strategy: 'base',
            strategy: 'class',
        }),
        require('@tailwindcss/typography'),
    ],
}


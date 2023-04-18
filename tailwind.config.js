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
        colors: {
            'transparent': 'transparent',
            'current': 'currentColor',
            'palette-1': '#2bc0c7',
            'palette-2': '#71C9CE',
            'palette-3': '#A6E3E9',
            'palette-4': '#CBF1F5',
            'palette-5': '#E3FDFD',
            'polar-1': '#2E3440',
            'polar-2': '#3B4252',
            'polar-3': '#434C5E',
            'polar-4': '#4C566A',
            'storm-1': '#D8DEE9',
            'storm-2': '#E5E9F0',
            'storm-3': '#ECEFF4',
            'frost-1': '#8FBCBB',
            'frost-2': '#88C0D0',
            'frost-3': '#81A1C1',
            'frost-4': '#5E81AC',
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
          strategy: 'class',
      }),
      require('@tailwindcss/forms'),
  ],
}


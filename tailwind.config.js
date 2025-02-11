import defaultTheme from 'tailwindcss/defaultTheme';

const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors');
/** @type {import('tailwindcss').Config} */
export default {
  content: [
      './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
      './storage/framework/views/*.php',
      './resources/**/*.blade.php',
      './resources/**/*.js',
      './resources/**/*.vue',
  ],
  theme: {
      colors: {
          transparent: 'transparent',
          current: 'currentColor',
          //amber: colors.amber,
          black: colors.black,
          blue: colors.blue,
          cyan: colors.cyan,
          emerald: colors.emerald,
          fuchsia: colors.fuchsia,
          gray: colors.trueGray,
          blueGray: colors.blueGray,
          coolGray: colors.coolGray,
          //trueGray: colors.trueGray,
          warmGray: colors.warmGray,
          green: colors.green,
          indigo: colors.indigo,
          lime: colors.lime,
          orange: colors.orange,
          pink: colors.pink,
          purple: colors.purple,
          red: colors.red,
          rose: colors.rose,
          sky: colors.sky,//warn - As of Tailwind CSS v2.2, `lightBlue` has been renamed to `sky`.
          teal: colors.teal,
          violet: colors.violet,
          yellow: colors.amber,
          white: colors.white,
      },
    extend: {
        fontFamily: {
            sans: ['Figtree', ...defaultTheme.fontFamily.sans],
        },
    },
  },
  plugins: [],
}


/** @type {import('tailwindcss').Config} */
const path = require('path');

module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./node_modules/tw-elements/css/**/*.css",
    "./node_modules/tw-elements/js/**/*.js"
  ],
  theme: {
      extend: {
        fontSize: {
          es: '12px',
      },
    },
  },
  mode: 'jit',
  plugins: [
    require(path.resolve('node_modules', 'tw-elements', 'plugin.cjs'))
  ],
  darkMode: "class"
};
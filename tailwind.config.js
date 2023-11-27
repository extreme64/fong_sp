/** @type {import('tailwindcss').Config} */
module.exports = {
  theme: {
      extend: {
        fontSize: {
          es: '12px',
      },
    },
  },
  purge: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  content: [
    "./src/**/*.{html,js}",
    "./node_modules/tw-elements/dist/js/**/*.js"
  ],
  plugins: [require("tw-elements/dist/plugin.cjs")],
  darkMode: "class"
};


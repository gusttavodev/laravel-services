// module.exports = {
//     purge: ["./resources/views/**/*.blade.php", "./resources/js/**/*.vue"],
//     darkMode: false, // or 'media' or 'class'
//     theme: {
//         extend: {}
//     },
//     variants: {
//         extend: {}
//     },
//     plugins: []
// };
const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
  purge: ['./resources/views/**/*.blade.php', './resources/js/**/*.vue'],
  theme: {
    extend: {
      fontFamily: {
        sans: ['Inter var', ...defaultTheme.fontFamily.sans],
      },
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}

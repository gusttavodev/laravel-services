const defaultTheme = require('tailwindcss/defaultTheme')
const colors = require('tailwindcss/colors')

module.exports = {
  purge: ['./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php', './storage/framework/views/*.php', './resources/views/**/*.blade.php', './resources/js/**/*.vue'],

  theme: {
    screens: {
        'lt': '360px',
        'sm': '640px',
        'md': '768px',
        'lg': '1024px',
        'xl': '1280px',
    },
    extend: {
      textColor: {
        'content-color': "var(--text-color)",
        'title-color': "var(--title-text-color)",
        'title-hover-color': "var(--title-text-hover-color)",
        'button-text': "var(--button-text-color)",
        'card-text': "var(--card-text-color)",
        'price-text': "var(--card-price-color)",

        'info-card': {
            'title': "var(--primary-color)",
            'subtitle': "var(--secondary-color)",
            'text': "var(--background-color)",

            'hours-text': "var(--button-background-color)"
        },
      },
      colors: {
        sys_primary: colors.indigo,
        sys_secondary: colors.violet,
        sys_success: colors.emerald,
        sys_error: colors.red,
        sys_alert: colors.amber,

        'personal-colors': {
            'primary': "var(--primary-color)",
            'secondary': "var(--secondary-color)",
            'background': "var(--background-color)",

            'button-background': "var(--button-background-color)",
            'button-hover': "var(--button-hover-color)",
            'button-count': "var(--button-count-color)",
            'card-background': "var(--card-background-color)",
        },

        'info-card': {
            'background': "var(--info-card-background)",
            'separators': "var(--info-card-separators)",
            'icon':       "var(--info-card-icon)",

            'hours-background': "var(--info-card-hours-background)"
        },

      },
      fontFamily: {
        sans: ['Nunito', ...defaultTheme.fontFamily.sans],
      },
    },
  },

  variants: {
    extend: {
      opacity: ['disabled'],
    },
  },

  plugins: [require('@tailwindcss/forms'), require("@tailwindcss/ui"), require('@tailwindcss/aspect-ratio')],
}

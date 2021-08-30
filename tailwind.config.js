const defaultTheme = require('tailwindcss/defaultTheme')
const colors = require('tailwindcss/colors')

module.exports = {
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php', './resources/views/**/*.blade.php',
        './resources/js/**/*.vue'
    ],
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
            'general': {
                'title':        "var(--general-title)",
                'txt':          "var(--general-txt)",
                'icon':         "var(--general-icon)",
            },
            'header': {
                'title':        "var(--header-title)",
                'txt':          "var(--header-txt)",
                'icon':         "var(--header-icon)",
            },
            'info': {
                'title':        "var(--info-title)",
                'txt':          "var(--info-txt)",
                'icon':         "var(--info-icon)",
            },
            'product': {
                'title':        "var(--product-title)",
                'txt':          "var(--product-txt)",
                'icon':         "var(--product-icon)",
            },

            'time': {
                'txt':          "var(--time-txt)",
            },
            'price': {
                'txt':          "var(--price-txt)",
            },

            'button': {
                'txt':          "var(--button-txt)"
            },
            'counter': {
                'txt':          "var(--counter-txt)"
            }
        },
        colors: {
            sys_primary: colors.indigo,
            sys_secondary: colors.violet,
            sys_success: colors.emerald,
            sys_error: colors.red,
            sys_alert: colors.amber,
            'general': {
                'bg':           "var(--general-bg)",
            },
            'header': {
                'bg':           "var(--header-bg)",
            },
            'info': {
                'bg':           "var(--info-bg)",
                'separator':    "var(--info-separator)",
            },
            'product': {
                'bg':           "var(--product-bg)",
                'separator':    "var(--product-separator)",
                'bg-button':    "var(--product-bg-button)"
            },

            'time': {
                'bg':           "var(--time-bg)"
            },
            'price': {
                'bg':           "var(--price-bg)"
            },
            'button': {
                'bg':           "var(--button-bg)",
                'hover':           "var(--button-hover)"
            },
            'counter': {
                'bg':           "var(--counter-bg)"
            }
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

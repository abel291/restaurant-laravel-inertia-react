const defaultTheme = require("tailwindcss/defaultTheme");
const { colors: defaultColors } = require("tailwindcss/defaultTheme")
module.exports = {
    mode: "jit",
    purge: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.js",
    ],

    theme: {
        container: {
            center: true,
            padding: {
                DEFAULT: "1rem",
                sm: "2rem",
                lg: "4rem",
                xl: "5rem",
                "2xl": "6.5rem",
            },
        },

        colors: {
            ...defaultColors,
            red: {
                ...defaultColors.red,
                500: "#e3000e",
            },
        },
        fontFamily: {
            primary: ["Oswald"],
            sans: ['"Roboto"', 'sans-serif'],
        },
        extend: {},
    },

    variants: {
        extend: {
            opacity: ["disabled"],
        },
    },

    plugins: [require("@tailwindcss/forms"), require("@tailwindcss/line-clamp")],
};

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
    ],
    theme: {
        fontFamily: {
            poppins: ["Poppins", "sans-serif"],
            inter: ["Inter", "sans-serif"],
        },
        extend: {
            colors: {
                pallete: {
                    100: "#f8f5f2",
                    200: "#abd1c6",
                    300: "#004643",
                    400: "#f9bc60",
                    500: "#001e1d",
                    600: "#e8e4e6",
                    700: "#16161a",
                    800: "#2cb67d",
                },
            },
        },
    },
    plugins: [require("flowbite/plugin")],
};

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                primary: "#6963ff",
                primaryHover: "#5a54f8",
                secondary: "#ff2b88",
                logoColor: "#67729D",
            },
            screens: {
                navbar: "884px",
                lg: "950px",
                // 'lg': {'min': '980px', 'max': '1279px'},
                sm: "320px",
                mobile: "582px",
            },
        },
    },
    purge: ["./resources/**/*.blade.php"],
    variants: {},
    plugins: [],
};

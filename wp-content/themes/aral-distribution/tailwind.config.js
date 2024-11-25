/** @type {import('tailwindcss').Config} */
module.exports = {
    purge: {
        content: [
            "*.php",
            "./inc/**/*.php",
            "./templates/**/*.php",
            "./template-parts/**/*.php",
            "./template-parts/blocks/**/*.php",
            "./src/**/*.{js,ts,jsx,tsx,scss}",
            "./node_modules/tw-elements/js/**/*.js"
        ],
    },
    darkMode: ['class'],
    theme: {
        container: {
            center: true,
            padding: '2rem',
            screens: {
                '2xl': '1400px'
            }
        },
        fontFamily: {
            body: [ 'var(--font-inter)', 'sans-serif' ],
            heading: [ 'var(--font-belleza)', 'sans-serif' ],
        },
        extend: {
            colors: {
                background: 'var(--background)',
                primary: {
                    DEFAULT: 'var(--primary)',
                    foreground: 'var(--primary-foreground)',
                },
            }
        },
    },
    variants: {
        extend: {},
    },
    plugins: [
        require("tw-elements/plugin.cjs")
    ],
}

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
    darkMode: [ 'class' ],
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
                    DEFAULT: 'hsl(var(--primary))',
                    80: 'var(--primary-80)',
                    70: 'var(--primary-70)',
                    60: 'var(--primary-60)',
                    50: 'var(--primary-50)',
                    40: 'var(--primary-40)',
                    30: 'var(--primary-30)',
                    20: 'var(--primary-20)',
                    10: 'var(--primary-10)',
                    5: 'var(--primary-5)',
                    foreground: 'var(--primary-foreground)',
                },
            }
        },
    },
    variants: {
        extend: {},
    },
    plugins: [
        require( "tw-elements/plugin.cjs" )
    ],
}

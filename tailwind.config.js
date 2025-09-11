/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    'node_modules/preline/dist/*.js',
    './vendor/wireui/wireui/resources/**/*.blade.php',
    './vendor/wireui/wireui/ts/**/*.ts',
    './vendor/wireui/wireui/src/View/**/*.php'
  ],
  theme: {
    extend: {
      keyframes: {
        'move-forever': {
          '0%': { transform: 'translate(-90px, 0%)' },
          '100%': { transform: 'translate(85px, 0%)' },
        },
        fall: {
          '0%': { top: '-20px', opacity: '0', transform: 'translateX(0)' },
          '10%': { opacity: '1' },
          '100%': { top: '100%', opacity: '0', transform: 'translateX(5px)' },
        },
      },
      animation: {
        'move-forever': 'move-forever 2s linear infinite',
        'move-slow': 'move-forever 6s linear infinite',
        'move-fast': 'move-forever 3s linear infinite',
        fall: 'fall 3s linear infinite',
      },
      listStyleType: {
        square: 'square', // 👈 custom utility
      },
    },
  },
  presets: [
    require('./vendor/wireui/wireui/tailwind.config.js')
  ],
  plugins: [
    require('@tailwindcss/forms'),
    require('preline/plugin'),
  ],
}


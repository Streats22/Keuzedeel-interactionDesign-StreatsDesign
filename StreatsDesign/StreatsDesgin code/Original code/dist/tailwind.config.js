module.exports = {
  theme: {
    extend: {},
  },
  variants: {},
  plugins: [  require('tailwindcss')('./tailwindcss-config.js'), 
              require('@tailwindcss/custom-forms'),],
}

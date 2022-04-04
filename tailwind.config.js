module.exports = {
  future: {
    // removeDeprecatedGapUtilities: true,
    // purgeLayersByDefault: true,
  },
  purge: [],
  theme: {
    extend: {},
  },
  variants: {},
  plugins: [
      require('tailwindcss-plugins/pagination')({
          color: colors['pink-dark'],
      }),
  ],
}

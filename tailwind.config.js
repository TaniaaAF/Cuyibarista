module.exports = {
  purge: [],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      colors:{
        primary: '#74B4BC',
        secondary:{
          100: '#E2E2D5',
          200: '#888883',
        },
        terciary: '#F6F6F6',
        cuaternary: '#D1A77D',
        cinco: '#331A1E',
        milk: '#A37E58'
      },

      fontFamily:{
        body: ['Gaegu'],
        spinnaker: ['Palanquin'],
        nunito: ['Nunito'],
        pangolin: ['Fjalla One'],
        serifpro: ['Source Serif Pro']
      }
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}

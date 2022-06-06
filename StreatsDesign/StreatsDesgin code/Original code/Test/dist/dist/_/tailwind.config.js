module.exports = {
  theme: {
    container:{
      center: true,
      padding: '2rem'
    }
  },
  variants: {},
  plugins: []
};

@responsive {
  .bg-gradient-blue-to-purple {
    background-image: linear-gradient(to right, config('colors.blue'), config('colors.purple'));
  }
}
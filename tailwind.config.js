module.exports = {
  content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
  ],
  theme: {
    extend: {
        fontFamily: {
            'bubble': ['Sniglet', 'cursive'],
        },
    },
  },
  plugins: [
      require('@tailwindcss/forms'),
  ],
}

const purgecss = require('@fullhuman/postcss-purgecss');

module.exports = {
  plugins: [
    
    require('tailwindcss'),
   //purgecss({
   //  content: ['./**/*.html']
   //}),
    require('autoprefixer'),
    require('cssnano')({
      preset: [
        'default', {
          discardComments: {
            removeAll: true
          }
        }
      ]
    })
  ]
}

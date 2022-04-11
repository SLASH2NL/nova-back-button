let mix = require('laravel-mix')

require('./mix')

mix
  .setPublicPath('dist')
  .js('resources/js/card.js', 'js')
  .vue({ version: 3 })
  .nova('slash2nl/nova-back-button')

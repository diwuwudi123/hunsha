let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/assets/js/app.js', 'public/js')
   .js('resources/assets/js/countUp.js', 'public/js')
   .js('resources/assets/js/jquery.js', 'public/js')
   .js('resources/assets/js/custom.js', 'public/js')
   .js('resources/assets/js/swiper.js', 'public/js')
   .js('resources/assets/js/bootstrap.js', 'public/js')
   .js('resources/assets/js/jquery.barrager.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css')
   .combine(['resources/assets/css/barrager.css',], 'public/css/barrager.css')
   .combine(['resources/assets/css/swiper.css',], 'public/css/swiper.css')
   .combine(['resources/assets/css/component.css','resources/assets/css/normalize.css',], 'public/css/component.css')
   .combine(['resources/assets/css/style.css','resources/assets/css/bootstrap.css', 'resources/assets/css/font-aswsome.css'], 'public/css/common.css');

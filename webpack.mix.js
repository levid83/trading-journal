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

mix.js('resources/assets/js/admin/main.js', 'public/js/admin/main.js')
   .sass('resources/assets/sass/app.scss', 'public/css')
    .copy('node_modules/font-awesome/fonts/', 'public/fonts')
    .sass('node_modules/font-awesome/scss/font-awesome.scss', 'public/css')
    .version();

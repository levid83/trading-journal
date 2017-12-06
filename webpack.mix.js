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

//needed for VueJS Laravel Admin Template
mix.webpackConfig({
  resolve: {
    alias: {
      'masonry': 'masonry-layout',
      'isotope': 'isotope-layout'
    }
  },
  // https://github.com/JeffreyWay/laravel-mix/issues/936#issuecomment-331418769

 output: {
	 chunkFilename: mix.inProduction() ? 'vendor/vuejs-laravel-admin/js/[name].[chunkhash].js' : 'vendor/vuejs-laravel-admin/js/[name].js',
	 publicPath: "/"
  }
});
//mix.js('resources/vendor/vuejs-laravel-admin/main.js', 'public/vendor/vuejs-laravel-admin/js/main.js');
mix.js('resources/assets/admin/main.js', 'public/js/admin/main.js');
/*
mix.js('resources/assets/vuejs-admin/main.js', 'public/vuejs-admin/js')
   .sass('resources/assets/sass/app.scss', 'public/css')
    .copy('node_modules/font-awesome/fonts/', 'public/fonts')
    .sass('node_modules/font-awesome/scss/font-awesome.scss', 'public/css')
    .version();*/


//needed for VueJS Laravel Admin Template
// set path for production link
mix.setResourceRoot('//localhost:8000/');
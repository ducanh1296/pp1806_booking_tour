const mix = require('laravel-mix');

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

mix.js('resources/js/app.js', 'public/js')
   .js('resources/js/index/index_user.js', 'public/js/index_user.js')
   .js('resources/js/index/index_order.js', 'public/js/index_order.js')
   .js('resources/js/delete_category.js', 'public/js/delete_category.js')
   .sass('resources/sass/app.scss', 'public/css');
mix.autoload({
    jquery: ['$', 'global.jQuery',"jQuery","global.$","jquery","global.jquery"]
});

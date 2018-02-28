let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |*/


mix.js('resources/assets/js/bootstrap_app.js', 'public/js')
   .sass('resources/assets/sass/bootstrap_app.scss', 'public/css');

mix.sass('resources/assets/sass/app.scss', 'public/css');
mix.combine([
    'node_modules/jquery/dist/jquery.min.js',
    'node_modules/foundation-sites/dist/js/foundation.min.js'
], 'public/js/app.js');
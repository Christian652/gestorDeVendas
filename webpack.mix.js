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
.styles('resources/views/layouts/css/dashboard.css', 'public/css/dashboard.css')
.styles('resources/views/layouts/css/style.css', 'public/css/style.css')
.sass('resources/views/layouts/scss/bootstrap.scss', 'public/css/bootstrap.css')
.scripts('resources/views/layouts/js/dashboard.js', 'public/js/dashboard.js')
.scripts('node_modules/bootstrap/dist/js/bootstrap.js', 'public/js/bootstrap.js')
.scripts('node_modules/jquery/dist/jquery.js', 'public/js/jquery.js')

   .sass('resources/sass/app.scss', 'public/css');

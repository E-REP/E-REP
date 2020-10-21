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

mix.babel([
    'resources/js/scripts.js',
], 'public/js/scripts.js');
mix.react('resources/js/app/index.js', 'public/app/js/index.js')
mix.sass('resources/sass/styles.scss', 'public/css');

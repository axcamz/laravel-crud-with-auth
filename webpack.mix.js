const mix = require('laravel-mix');
const AOS = require('aos');


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
// mix.browserSync('127.0.0.1:8000/login')

// mix.sass('resources/sass/app.scss', 'public/css');

AOS.init();
mix.js("resources/js/app.js", "public/js")
    .postCss("resources/css/app.css", "public/css", [
    require("tailwindcss"),
]);

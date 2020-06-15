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

//mix.js('resources/js/app.js', 'public/js')
//    .sass('resources/sass/app.scss', 'public/css');

//处理浏览器缓存  增加version().使得修改模板时，模板可以动态的加载样式代码
mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css').version();

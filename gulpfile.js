var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */
var paths = {
    'jquery': 'resources/assets/jquery/',
    'bootstrap': 'resources/assets/bootstrap-sass-official/assets/',
    'dropzone': 'resources/assets/dropzone/dist/'
}

elixir(function(mix) {
    mix.sass("styles.scss", 'resources/css/', {includePaths: [ paths.bootstrap + 'stylesheets/']})
        .copy(paths.bootstrap + 'fonts/bootstrap/**', 'public/fonts')
        .copy(paths.dropzone + 'dropzone.css', 'resources/css/libs')
        .copy(paths.dropzone + "dropzone.js",'resources/js/libs')
        .copy(paths.bootstrap + "javascripts/bootstrap.js",'resources/js/libs')
        .copy(paths.jquery + "dist/jquery.js",'resources/js/libs');

    mix.styles([
        'libs/select2.min.css',
        'styles.css',
        'libs/googlefonts.css',
        'libs/dropzone.css'
    ],'public/css/styles.css');

    mix.version('public/css/styles.css');

    mix.scripts([
        'libs/jquery.js',
        'libs/bootstrap.js',
        'libs/dropzone.js',
        'libs/select2.min.js',
        'app.js'
    ],'public/js/app.js');

});


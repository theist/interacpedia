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
    'jquery': '../assets/jquery/',
    'bootstrap': '../assets/bootstrap-sass-official/assets/'
}

elixir(function(mix) {
    mix.sass("styles.scss", 'resources/css/', {includePaths: [ paths.bootstrap + 'stylesheets/']})
        .copy(paths.bootstrap + 'fonts/bootstrap/**', 'public/fonts');

    mix.styles([
        'styles.css',
        'libs/googlefonts.css'
    ],'public/css/styles.css');

    mix.version('public/css/styles.css');

    mix.scripts([
        paths.jquery + "dist/jquery.js",
        paths.bootstrap + "javascripts/bootstrap.js",
        'libs/select2.min.js',
        'app.js'
    ],'public/js/app.js');

});


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
    'dropzone': 'resources/assets/dropzone/dist/',
    'bootstraphover': 'resources/assets/bootstrap-hover-dropdown/',
    'selectize':'resources/assets/selectize/dist/'
}

//gulp.src("vendor/bower_dl/selectize/dist/css/**")
//    .pipe(gulp.dest("public/assets/selectize/css"));
//
//gulp.src("vendor/bower_dl/selectize/dist/js/standalone/selectize.min.js")
//    .pipe(gulp.dest("public/assets/selectize/"));

elixir(function(mix) {
    mix.sass("styles.scss", 'resources/assets/css/', {includePaths: [ paths.bootstrap + 'stylesheets/']})
        .copy(paths.bootstrap + 'fonts/bootstrap/**', 'public/fonts')
        .copy(paths.dropzone + 'dropzone.css', 'resources/css/libs')
        .copy(paths.bootstraphover + "bootstrap-hover-dropdown.min.js",'resources/js/libs')
        .copy(paths.bootstrap + "javascripts/bootstrap.js",'resources/js/libs')
        .copy(paths.jquery + "dist/jquery.js",'resources/js/libs')
        .copy(paths.selectize + "js/standalone/selectize.js",'public/js/')
        .copy(paths.selectize + "js/selectize.min.js",'public/js/')
        .copy(paths.selectize + "css/selectize.css",'public/css/')
        .copy(paths.selectize + "css/selectize.default.css",'public/css/')
        .copy(paths.selectize + "css/selectize.bootstrap3.css",'public/css/');
    mix.styles([
        'libs/select2.min.css',
        'styles.css',
        'libs/googlefonts.css',
        'libs/dropzone.css',
        'libs/ekko-lightbox-built.css',
        'libs/dark.css'
    ],'public/css/styles.css');

    mix.version('public/css/styles.css');

    mix.scripts([
        'libs/jquery.js',
        'libs/bootstrap.js',
        'libs/dropzone.js',
        'libs/select2.min.js',
        'libs/bootstrap-maxlength.min.js',
        'libs/bootstrap-hover-dropdown.min.js',
        'libs/ekko-lightbox-built.js',
        'app.js'
    ],'public/js/app.js');

});


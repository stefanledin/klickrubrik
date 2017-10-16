var elixir = require('laravel-elixir');
var gulp = require('gulp');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.copy('node_modules/vue/dist/vue.min.js', 'resources/assets/js/vue.min.js');
    mix.copy('node_modules/jquery/dist/jquery.min.js', 'resources/assets/js/jquery.min.js');
    mix.copy('node_modules/bootstrap-sass/assets/javascripts/bootstrap.min.js', 'resources/assets/js/bootstrap.min.js');
    mix.sass('app.scss')
    	.scripts([
            'vue.min.js',
            'jquery.min.js',
            'jquery.ui.widget.js',
            'jquery.iframe-transport.js',
            'jquery.fileupload.js',
            'bootstrap.min.js',
        	'app.js'
    	])
		.version([
			'css/app.css', 'js/all.js'
		])
});

gulp.task('generate-service-worker', function(callback) {
    var swPrecache = require('sw-precache');
    var rootDir = 'public';

    swPrecache.write(`${rootDir}/service-worker.js`, {
        //staticFileGlobs: [rootDir + '/**/*.{js,html,css,png,jpg,gif,svg,eot,ttf,woff}'],
        staticFileGlobs: [
            rootDir + '/build/**/*.{js,css}',
            rootDir + '/img/**/*.{jpg,png,svg}'
        ],
        stripPrefix: rootDir
    }, callback);
});
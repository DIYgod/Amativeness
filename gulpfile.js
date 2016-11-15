var gulp        = require('gulp');
var sass        = require('gulp-sass');
var prefix      = require('gulp-autoprefixer');
var cssNano     = require('gulp-cssnano');
var rename      = require('gulp-rename');
var concat      = require('gulp-concat');
var header      = require('gulp-header');
var browserSync = require('browser-sync').create();
var webpack = require('webpack');

// Launch the server
gulp.task('browser-sync', function() {
    browserSync.init({
        server: {
            baseDir: './'
        }
    });
});

// Copy lib dist
gulp.task('lib', function() {
    gulp.src(['node_modules/typed.js/**'])
        .pipe(gulp.dest('lib/typed.js'));
    gulp.src(['node_modules/jquery-lazyload/**'])
        .pipe(gulp.dest('lib/jquery-lazyload'));
    gulp.src(['node_modules/snapsvg/**'])
        .pipe(gulp.dest('lib/snapsvg'));
});

var webpackConfig = require("./webpack.config.js");
gulp.task("webpack", function(callback) {
    var myConfig = Object.create(webpackConfig);
    // run webpack
    webpack(
        // configuration
        myConfig
        , function(err, stats) {
            // if(err) throw new gutil.PluginError("webpack", err);
            // gutil.log("[webpack]", stats.toString({
            //     // output options
            // }));
            callback();
        });
});

var banner = ['/*',
    'Theme Name: Amativeness',
    'Theme URI: https://github.com/DIYgod/Amativeness',
    'Author: DIYgod',
    'Author URI: https://www.anotherhome.net/',
    'Description: Wow, such a beautiful WordPress theme',
    'Version: 3.1',
    'License: MIT',
    'License URI: https://github.com/DIYgod/Amativeness',
    'Tags: light, gray, white, one-column, two-columns, right-sidebar, fluid-layout, responsive-layout, custom-background, custom-header, custom-menu, editor-style, featured-images, flexible-header, full-width-template, microformats, post-formats, rtl-language-support, sticky-post, theme-options, translation-ready',
    'Text Domain: Amativeness',
    '*/',
    ''].join('\n');

// Build css files
gulp.task('compressCSS', function() {
    gulp.src(['lib/nprogress/nprogress.css'])
        .pipe(cssNano())
        .pipe(rename({
            suffix: ".min"
        }))
        .pipe(gulp.dest('lib/nprogress'));
    gulp.src('src/css/*.css')
        .pipe(prefix(['last 15 versions', '> 1%', 'ie 8', 'ie 7'], { cascade: true }))
        .pipe(cssNano())
        .pipe(concat('style.css'))
        .pipe(header(banner))
        .pipe(gulp.dest('.'));
});

// Watch files for changes & recompile
gulp.task('watch', function () {
    gulp.watch(['src/*.js'], ['webpack']);
    gulp.watch(['src/*.scss'], ['compressCSS']);
    gulp.watch('*.html').on('change', browserSync.reload);
    gulp.watch('dist/*.js').on('change', browserSync.reload);
});

// compile the project, including move font, compress js and scss, also be used to test
gulp.task('release', ['webpack', 'compressCSS', 'lib']);

// Default task, running just `gulp` will move font, compress js and scss, launch server, watch files.
gulp.task('default', ['release', 'browser-sync', 'watch']);
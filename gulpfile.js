var gulp        = require('gulp');
var prefix      = require('gulp-autoprefixer');
var uglify      = require('gulp-uglify');
var concat      = require('gulp-concat');
var minifyCSS   = require('gulp-minify-css');
var rename      = require('gulp-rename');
var header      = require('gulp-header');

// Copy lib dist
gulp.task('lib', function() {
    gulp.src(['node_modules/aplayer/**'])
        .pipe(gulp.dest('lib/aplayer'));
    gulp.src(['node_modules/nprogress/**'])
        .pipe(gulp.dest('lib/nprogress'));
    gulp.src(['node_modules/headroom.js/**'])
        .pipe(gulp.dest('lib/headroom.js'));
    gulp.src(['node_modules/aspace/**'])
        .pipe(gulp.dest('lib/aspace'));
    gulp.src(['node_modules/font-awesome/**'])
        .pipe(gulp.dest('lib/font-awesome'));
    gulp.src(['node_modules/balloon-css/**'])
        .pipe(gulp.dest('lib/balloon-css'));
    gulp.src(['node_modules/owo/**'])
        .pipe(gulp.dest('lib/owo'));
    gulp.src(['node_modules/typed.js/**'])
        .pipe(gulp.dest('lib/typed.js'));
    gulp.src(['node_modules/socket.io-client/**'])
        .pipe(gulp.dest('lib/socket.io-client'));
});

// Build js files
gulp.task('compressJS', function() {
    gulp.src(['lib/nprogress/nprogress.js'])
        .pipe(uglify({
            mangle: false
        }))
        .pipe(rename({
            suffix: ".min"
        }))
        .pipe(gulp.dest('lib/nprogress'));
    gulp.src(['src/js/*.js'])
        .pipe(uglify({
            mangle: false
        }))
        .pipe(concat('main.js'))
        .pipe(gulp.dest('.'));
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
        .pipe(minifyCSS())
        .pipe(rename({
            suffix: ".min"
        }))
        .pipe(gulp.dest('lib/nprogress'));
    gulp.src('src/css/*.css')
        .pipe(prefix(['last 15 versions', '> 1%', 'ie 8', 'ie 7'], { cascade: true }))
        .pipe(minifyCSS())
        .pipe(concat('style.css'))
        .pipe(header(banner))
        .pipe(gulp.dest('.'));
});

// Default task, running just `gulp` will move font, compress js and scss, start server, watch files.
gulp.task('default', ['lib', 'compressJS', 'compressCSS']);
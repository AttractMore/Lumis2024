var gulp = require('gulp'),
  sass = require('gulp-sass'),
  autoprefixer = require('gulp-autoprefixer'),
  rename = require('gulp-rename'),
  cssmin = require('gulp-cssmin'),
  concat = require('gulp-concat'),
  uglify = require('gulp-uglify'),
  livereload = require('gulp-livereload'),
  jshint = require('gulp-jshint'),
  plumber = require('gulp-plumber'),
  eyeglass = require('eyeglass');

var source = 'assets/';
var dest = 'dist/';

var boostrapSassSrc = './node_modules/bootstrap/';


/**
 * Style :
 * Sass compilation including bootstrap-sass
 *
 */
gulp.task('sass', gulp.series(function () {
    return gulp.src(source + '/scss/style.scss')
      .pipe(plumber())
      .pipe(sass(eyeglass()))
      .pipe(autoprefixer())
      .pipe(cssmin())
      .pipe(rename('app.css'))
      .pipe(gulp.dest(dest + 'css'))
      .pipe(livereload());
}));

/**
 * Js lint of main.js
 * stop gulp task on error
 *
 */
gulp.task('lint', function () {
    return gulp.src(source + '/js/app.js')
      .pipe(jshint())
      .pipe(jshint.reporter('jshint-stylish'));
});

/**
 * Javascript
 *
 */

gulp.task('js', gulp.series('lint', function () {
    // Js librairies used on current theme
    gulp.src(source + '/js/libs/**/*.js')
      .pipe(plumber())
      .pipe(concat('libs.js'))
      .pipe(gulp.dest(dest + 'js/'))
      .pipe(livereload());

    // Theme main js file
    return gulp.src(source + '/js/app.js')
      .pipe(plumber())
      .pipe(uglify())
      .pipe(gulp.dest(dest + 'js/'));
}));


/**
 * Watch task
 *
 */
gulp.task('watch', function () {
    //gulp.watch( 'assets/scss/**/*.scss', ['sass'] );
    //gulp.watch( 'assets/js/**/*.js', ['js'] );
    //gulp.watch( 'assets/img//*.{png,jpg,gif}', ['img'] );
    //
    gulp.watch('assets/scss/**/*.scss').on('all', gulp.series('sass'));
    gulp.watch('assets/js/**/*.js').on('all', gulp.series('js'));
});

/**
 * Default
 * Should be launch at the beginning of every coding session
 *
 */
gulp.task('run', gulp.series(gulp.parallel('sass', 'watch'), function () {
    return livereload.listen();
}));

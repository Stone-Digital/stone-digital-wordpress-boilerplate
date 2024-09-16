const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass')); // Use dart-sass
const cleanCSS = require('gulp-clean-css'); // Minify CSS
const imagemin = require('gulp-imagemin'); // Minify images
const concat = require('gulp-concat'); // Concat JS
const uglify = require('gulp-uglify'); // Compress JS
const watch = require('gulp-watch'); // Watch all files

// Compile Sass and Minify CSS
gulp.task('sass', function(){
  return gulp.src('src/scss/style.scss')
    .pipe(sass().on('error', sass.logError)) // Using dart-sass
    .pipe(cleanCSS({compatibility: 'ie8'}))
    .pipe(gulp.dest('dist/css'));
});

// Concat and Compress JavaScript
gulp.task('scripts', function() {
  return gulp.src(['src/js/vendor/*.js','src/js/scripts/*.js'])
    .pipe(uglify())
    .pipe(concat('main.js'))
    .pipe(gulp.dest('dist/js'));
});

// Minify Images
gulp.task('imagemin', function() {
  return gulp.src('src/images/*')
    .pipe(imagemin())
    .pipe(gulp.dest('dist/images'));
});

// Watch for Changes
gulp.task('watch', function() {
  gulp.watch('src/scss/**/*.scss', gulp.series('sass'));
  gulp.watch(['src/js/vendor/*.js','src/js/scripts/*.js'], gulp.series('scripts'));
  gulp.watch('src/images/*', gulp.series('imagemin'));
});

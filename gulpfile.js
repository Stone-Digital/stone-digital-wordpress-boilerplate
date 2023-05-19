const gulp = require('gulp');
const sass = require('gulp-sass'); // enable SASS
const cleanCSS = require('gulp-clean-css'); // minify css
const imagemin = require('gulp-imagemin'); // minify images
const concat = require('gulp-concat'); // concat js
const uglify = require('gulp-uglify'); // compress js
const watch = require('gulp-watch'); // watch all files

gulp.task('sass', function(){
  return gulp.src('src/scss/style.scss')
	.pipe(sass())
	.pipe(cleanCSS({compatibility: 'ie8'}))
    .pipe(gulp.dest('dist/css'))
});

gulp.task('scripts', function() {
  return gulp.src(['src/js/vendor/*.js','src/js/scripts/*.js'])
    .pipe(uglify())
	.pipe(concat('main.js'))
	.pipe(gulp.dest('dist/js'))
});

gulp.task('imagemin', function() {
	gulp.src('src/images/*')
	.pipe(imagemin())
	.pipe(gulp.dest('dist/images'))
});

gulp.task('watch', function() {
	
	gulp.watch('src/scss/**/*.scss', gulp.series('sass'));
	gulp.watch(['src/js/vendor/*.js','src/js/scripts/*.js'], gulp.series('scripts'));
	gulp.watch('src/images/*', gulp.series('imagemin'));
	
});
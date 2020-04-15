// Define dependencies
var gulp = require('gulp');
var sass = require('gulp-sass');
var sassGlob = require('gulp-sass-glob');
var autoprefixer = require('gulp-autoprefixer');
var nano = require('gulp-cssnano');
var sourcemaps = require('gulp-sourcemaps');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');

// Compile sass to compressed css andd add vendor prefixes
gulp.task('styles', function() {
  gulp.src('src/sass/style.scss')
  	.pipe(sassGlob())
  	.pipe(sourcemaps.init())
    .pipe(sass())
    .on('error', function(error) {
      console.log('\n ✖ ✖ ✖ ✖ ✖ ERROR ✖ ✖ ✖ ✖ ✖ \n \n' + error.message + '\n \n');
    })
    .pipe(autoprefixer({
      browsers: ['> 1%', 'last 2 versions', 'Firefox >= 20']
    }))
    .pipe(nano())
	.pipe(rename('theme.min.css'))
	.pipe(sourcemaps.write('.'))
    .pipe(gulp.dest('dist/css'))
});

// Concatenate files and minify to output to scripts.min.js
gulp.task('scripts', function() {
  gulp.src( ['src/js/vendor/*.js', 'src/js/*.js'])
    .pipe(concat('scripts.min.js'))
    .pipe(uglify())
    .on('error', function(error) {
      console.log('\n ✖ ✖ ✖ ✖ ✖ ERROR ✖ ✖ ✖ ✖ ✖ \n \n' + error.message + '\n \n');
    })
	.pipe(rename('theme.min.js'))
    .pipe(gulp.dest('dist/js'))
});


// Static server + watching scss, js, html files
gulp.task('serve', ['styles', 'scripts'], function() {
  gulp.watch('src/sass/**/*.scss', ['styles']);
  gulp.watch('src/js/*.js', ['scripts']);
});

// Default task
gulp.task('default', ['serve']);

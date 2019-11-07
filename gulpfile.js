const gulp = require('gulp');
const concat = require('gulp-concat');
const uglify = require('gulp-uglify');
const sourcemaps = require('gulp-sourcemaps');
const uglifycss = require('gulp-uglifycss');
const uncss = require('gulp-uncss');
const minify = require('gulp-minify-css');
const connect = require('gulp-connect');

var outputDir = 'build/development';

gulp.task('scripts', async function(){
  gulp.src('jsconcat/**/*.js')
      .pipe(concat('web.js'))
      .pipe(sourcemaps.write())
      .pipe(gulp.dest('dist/js'));
});

gulp.task('scripts-dist', async function(){
  gulp.src('jsconcat/**/*.js')
      .pipe(concat('all.js'))
      .pipe(uglify())
      .pipe(gulp.dest('dist/js'));
});


gulp.task('css', async function(){
   gulp.src('assets/css/style.css')
   .pipe(concat('product.css'))
   .pipe(minify())
   .pipe(gulp.dest('dist/css'));
});

gulp.task('uncss', async function () {
    return gulp.src('dist/css/product.css')
        .pipe(uncss({
            html: ['Products.html', 'posts/**/*.html', 'http://example.com']
        }))
        .pipe(gulp.dest('./dist/css'));
});

gulp.task('htmlminify', async () => {
  return gulp.src('index.html')
    .pipe(htmlmin({ collapseWhitespace: true }))
    .pipe(gulp.dest('dist/html'));
});
 
gulp.task('connect', async function() {
  connect.server({
    root: 'app',
    livereload: true
  });
});

gulp.task('html', async function () {
  gulp.src('./*.html')
    .pipe(gulp.dest('./app'))
    .pipe(connect.reload());
});

gulp.task('watch', async function () {
  gulp.watch('/*.html', gulp.series('html'));
});

gulp.task('jenkins-tests',async function() {
  connect.server({
    port: 8888
  });
  // run some headless tests with phantomjs
  // when process exits:
  connect.serverClose();
});

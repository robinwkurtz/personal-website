// gulp modules
var gulp = require('gulp')
var plumber = require('gulp-plumber')
var sass = require('gulp-sass')
var notify = require("gulp-notify")
var livereload = require('gulp-livereload')
var minifyCSS = require('gulp-minify-css')
var watch = require('gulp-watch')
var sourcemaps = require('gulp-sourcemaps')
var rename = require('gulp-rename')

// styles
gulp.task('styles', function () {
    gulp.src(['./assets/scss/style.scss'])
        .pipe(plumber({
            errorHandler: onError
        }))
        .pipe(sass())
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest('./assets/css/'))
        .pipe(minifyCSS({compatibility: 'ie8'}))
        .pipe(rename(function (path) {
            path.basename = path.basename + ".min";
        }))
        .pipe(gulp.dest('./assets/css/'))
        .pipe(livereload());
});

// watch
gulp.task('watch', function () {
    livereload.listen();
    // Watch for changes
    gulp.watch(['./assets/scripts/**/**.js', './assets/scripts/*.js']);
    gulp.watch(['./assets/scss/**/*.scss', './assets/scss/*.scss'], ['styles']);
});

// running tasks
gulp.task('default', ['styles', 'watch']);

// helper
function onError(err) {
    console.log(err);
}

const gulp = require('gulp');
const sass = require('gulp-sass');
const browserSync = require('browser-sync').create();

// compile scss to css
function style() {
    // where is my scss file
    return gulp.src('./scss/styles.scss')
    // pass that file through sass compile
        .pipe(sass().on('error', sass.logError))
    // where do i save the compiled scss file
        .pipe(gulp.dest('./css'))
    // stream changes into your browser
        .pipe(browserSync.stream());
}

function watch() {
    browserSync.init({
       server: {
           baseDir: './'
       }
    });

    gulp.watch('./scss/**/*.scss', style);
    gulp.watch('./*.html').on('change', browserSync.reload);
    gulp.watch('./js/**/*.js').on('change', browserSync.reload)
}

exports.build = style;
exports.watch = watch;
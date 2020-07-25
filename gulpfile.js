'use strict';

var gulp = require('gulp');
var concat = require('gulp-concat');
var sass = require('gulp-sass');

gulp.task('scripts', function() {
    return gulp.src([
        './node_modules/jquery/dist/jquery.min.js',
        './node_modules/popper.js/dist/umd/popper.min.js',
        './node_modules/bootstrap/dist/js/bootstrap.min.js',
        './resources/js/site.js',
    ])
        .pipe(concat('site.js'))
        .pipe(gulp.dest('./public/js/'));
});

gulp.task('sass', function () {
    return gulp.src(['./resources/scss/site.scss'])
        .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(gulp.dest('./public/css/'));
});

gulp.task('scripts:watch', function () {
    gulp.watch('./resources/js/**/*.js', ['scripts']);
});

gulp.task('sass:watch', function () {
    gulp.watch('./resources/scss/**/*.scss', ['sass']);
});

gulp.task('default', [ 'scripts', 'scripts:watch', 'sass', 'sass:watch' ]);

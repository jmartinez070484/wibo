const gulp = require('gulp');
const sass = require('gulp-sass');
const concat = require('gulp-concat');
const uglify = require('gulp-uglify');

function css(cb) {
	gulp.src('src/scss/style.scss').pipe(sass({outputStyle:'compressed'})).pipe(gulp.dest('css'));
	cb();
}

function javascript(cb) {
	gulp.src('src/js/scripts.js').pipe(uglify()).pipe(gulp.dest('js'));
	cb();
}

exports.css = css;
exports.javascript = javascript;
exports.default = function() {
	gulp.watch('src/scss/**/*.scss',css);
	gulp.watch('src/js/*.js',javascript);
};
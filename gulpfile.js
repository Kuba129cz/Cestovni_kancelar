const { src, dest, watch, series } = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const postcss = require('gulp-postcss');
const autoprefixer = require('autoprefixer');
const cssnano = require('cssnano');
const terser = require('gulp-terser');
const browsersync = require('browser-sync').create();

// Image Task
function imageTask() {
  return src('app/image/**/*')
    .pipe(dest('dist/image'));
}

// Sass Task
function scssTask() {
  return src('app/scss/style.scss', { sourcemaps: true })
    .pipe(sass())
    .pipe(postcss([autoprefixer(), cssnano()]))
    .pipe(dest('dist', { sourcemaps: '.' }));
}

// JavaScript Task
function jsTask() {
  return src('app/js/script.js', { sourcemaps: true })
    .pipe(terser())
    .pipe(dest('dist', { sourcemaps: '.' }));
}

// Browsersync Tasks
function browsersyncServe(cb) {
  browsersync.init({
    proxy: 'localhost/tour', // Upraveno na použití portu 80
    port: 80, // Nastavení portu 80
    sourcemaps: true,
  });
  cb();
}

// BrowserSync Reload
function browsersyncReload(cb) {
  browsersync.reload();
  cb();
}

// Watch Task
function watchTask() {
  watch(
    ['app/scss/**/*.scss', 'app/js/**/*.js'],
    series(
      imageTask,
      scssTask,
      jsTask,
      browsersyncReload,
    ),
  );
}

// Default Gulp Task
exports.default = series(
  imageTask,
  scssTask,
  jsTask,
  browsersyncServe,
  watchTask,
);

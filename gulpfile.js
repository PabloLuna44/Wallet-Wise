const { src, dest, watch , series, parallel } = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const autoprefixer = require('autoprefixer');
const postcss    = require('gulp-postcss')
const sourcemaps = require('gulp-sourcemaps')
const cssnano = require('cssnano');
const concat = require('gulp-concat');
const terser = require('gulp-terser-js');
const rename = require('gulp-rename');
const imagemin = require('gulp-imagemin'); // Minificar imagenes 
const notify = require('gulp-notify');
const cache = require('gulp-cache');
const clean = require('gulp-clean');
const webp = require('gulp-webp');

const paths = {
    scss: 'resources/scss/*.scss',
    css: 'resources/css/*.css',
    js: 'resources/js/**/*.js',
    imagenes: 'resources/img/**/*',
    lib:'resources/lib/**/*'
}

// css es una función que se puede llamar automaticamente
function css() {
    return src(paths.scss,paths.css)
        .pipe(sourcemaps.init())
        .pipe(sass())
        .pipe(postcss([autoprefixer(), cssnano()]))
        // .pipe(postcss([autoprefixer()]))
        .pipe(sourcemaps.write('.'))
        .pipe( dest('public/build/assets/css') );
}


function javascript() {
    return src(paths.js)
      .pipe(terser())
      .pipe(sourcemaps.write('.'))
      .pipe(dest('public/build/assets/js'));
}

function imagenes() {
    return src(paths.imagenes)
        .pipe(cache(imagemin({ optimizationLevel: 3})))
        .pipe(dest('public/build/assets/img'))
        .pipe(notify({ message: 'Imagen Completada'}));
}

function versionWebp() {
    return src(paths.imagenes)
        .pipe( webp() )
        .pipe(dest('public/build/assets/img'))
        .pipe(notify({ message: 'Imagen Completada'}));
}


function copyLibFiles() {
    return src(paths.lib)
        .pipe(dest('public/build/assets/lib'));
}


function watchArchivos() {
    watch( paths.scss, css );
    watch( paths.js, javascript );
    watch( paths.imagenes, imagenes );
    watch( paths.imagenes, versionWebp );
    watch( paths.lib, copyLibFiles );
}

  

exports.watchArchivos = watchArchivos;
// exports.dev = parallel(css,watchArchivos); 
exports.dev = parallel(css, javascript,  imagenes, versionWebp,copyLibFiles,watchArchivos); 
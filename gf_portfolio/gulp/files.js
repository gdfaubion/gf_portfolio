var paths = {
  components: {
    babelpolyfill: './node_modules/babel-polyfill/dist/'
  },
  css: {
    src: './css/src/',
    dist: './css/dist/'
  },
  js: {
    src: './js/src/',
    vendor: './js/vendor/',
    dist: './js/dist/',
    jshint: './'
  },
  images: {
    src: './images/src/',
    dist: './images/dist/'
  },
  sprites: {
    src: './images/dist/icons/',
    dist: './images/icons/'
  },
  sprite: {
    dist: './images/'
  }
}

var globs = {
  js: {
    src: [
      paths.js.vendor + 'modernizr-build.js',
      paths.js.src + 'main.js',
      paths.js.src + 'menu.js',
    ],
    dist: {
      original: 'app.js',
      minified: 'app.min.js'
    },
    jshint: '.jshintrc'
  },
  css: {
    raw: [
      paths.css.src + '*.css'
    ],
    src: [
      paths.css.src + 'style.css'
    ],
    dist: {
      original: 'style.css',
      minified: 'style.min.css',
      temp: 'style.temp.css'
    },
    maps: [
      'config.yml',
      'colors.yml',
      'fonts.yml'
    ]
  },
  images: {
    src: paths.images.src + '**',
    dist: paths.images.dist + '*.*'
  },
  sprites: {
    src: paths.sprites.src + '*.svg',
    dist: paths.sprites.dist
  },
  sprite: {
    src: paths.sprites.dist + 'svg-symbols.svg',
    dist: 'icons.svg'
  }
};

module.exports = {
  paths: paths,
  globs: globs
};
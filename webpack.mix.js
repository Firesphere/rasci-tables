let mix = require("laravel-mix");

mix.webpackConfig({
  externals: {
    '$': 'jQuery',
    'jquery': 'jQuery'
  }
});

mix.js("client/src/js/main.js", "dist/js/main.js");
mix.sass("client/src/scss/main.scss", "dist/css/main.css");

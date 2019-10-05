let mix = require("laravel-mix").mix;
let path = require('path');

mix.webpackConfig({
  externals: {
    '$': 'jQuery',
    'jquery': 'jQuery'
  }
});

//this fixes an API change introduced at //https://github.com/webpack/webpack/issues/4549
mix.setPublicPath(
  path.resolve(__dirname, 'dist')
);

mix.js("client/src/js/main.js", "js/main.js");
mix
  .sass("client/src/scss/main.scss", "css/main.css");

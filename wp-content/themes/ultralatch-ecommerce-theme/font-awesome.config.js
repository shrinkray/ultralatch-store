//https://www.npmjs.com/package/font-awesome-webpack-4
require('font-awesome-webpack');

module.exports = {
  //styleLoader: require('extract-text-webpack-plugin').extract('style-loader'),
  styles: {
    "mixins": true,

    "core": true,
    "icons": true,

    "larger": true,
    "path": true,
  }
};
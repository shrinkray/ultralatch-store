const path = require('path');

// for webfonts loader
// https://www.npmjs.com/package/webfonts-loader

// updated code with bootstrap 4.3.1
// https://stevenwestmoreland.com/2018/01/how-to-include-bootstrap-in-your-project-with-webpack.html

// needed for webpack.ProvidePlugin
const webpack = require("webpack");

// include the js minification plugin
const UglifyJSPlugin = require('uglifyjs-webpack-plugin');

// include the css extraction and minification plugins
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const OptimizeCSSAssetsPlugin = require("optimize-css-assets-webpack-plugin");

// Clear ./dist folder
const  { CleanWebpackPlugin }  = require('clean-webpack-plugin');

//

// image compression
const ImageminPlugin = require('imagemin-webpack-plugin').default;

module.exports = {
  entry: [

     './assets/scripts/slick.min.js',
     './assets/scripts/bootstrap.min.js',
    './assets/scripts/main.js',
    './assets/styles/main.scss'
  ],
  output: {
    filename: './js/index.min.[hash].js',
    path: path.resolve(__dirname, 'dist')
  },
  devtool: 'source-map',
  target: 'node',

  module: {
    rules: [
      { // perform babel
        test: /\.js$/,
        exclude: /node_modules/,
        use: {
          loader: "babel-loader",
          options: {
            presets: ['@babel/preset-env']
          }
        }
      },
      // compile all .scss files to plain old css
      {
        test: /\.css$/,
        use: [
          MiniCssExtractPlugin.loader,
          {
            loader: 'css-loader',
            options: {sourceMap: true},
          },
        ]
      },

      {
        test: /\.scss$/,
        use: [
          MiniCssExtractPlugin.loader,
          {
            loader: 'css-loader',
            options: {
              sourceMap: true,
              importLoaders: 1
            },
          },
          {
            loader: 'postcss-loader',
            options: {sourceMap: true}
          },

          {
            loader: 'sass-loader',
            options: {sourceMap: true}
          }
        ]
      },

      // fonts
      {
        test: /\.(woff(2)?|ttf|eot|svg)(\?v=\d+\.\d+\.\d+)?$/,
        use: [{
          loader: 'file-loader',
          options: {
            name: '[name].[ext]',
            outputPath: './fonts/'
          }
        }]
      },
      { // works with url-loader
        test: /\.(png|jpg|gif)$/i,
        use: [
          {
            loader: 'url-loader',
            options: {
              fallback: 'responsive-loader',
              quality: 85,
            },
          },
        ],
      },
    ]
  },
  plugins: [
    // clean out build directories on each build
    new CleanWebpackPlugin(),
    new webpack.ProvidePlugin({
      $: "jquery",
      jQuery: "jquery",
      "window.jQuery": "jquery",
      Popper: ['popper.js', 'default'],
      "Tether": 'tether'
    }),
    // extract css into dedicated file
    new MiniCssExtractPlugin({
      filename: './css/main.min.[hash].css'
    }),
    // copy files
    new CopyWebpackPlugin({
      patterns: [
        // { from: 'assets/fonts', to: './fonts/' },
        { from: 'assets/images/', to: './images/' }
      ]
    }),
    new ImageminPlugin({
      test: /\.(jpe?g|png|gif|svg)$/i
    })
   ],
  optimization: {
    minimizer: [
      // enable the js minification plugin
      new UglifyJSPlugin({
        cache: true,
        parallel: true
      }),
      // enable the css minification plugin
      new OptimizeCSSAssetsPlugin({})
    ]
  }
};

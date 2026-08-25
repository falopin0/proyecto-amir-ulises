const { merge } = require('webpack-merge');
const common = require('./webpack.common.js');
const HtmlWebpackPlugin = require('html-webpack-plugin');
const CopyPlugin = require('copy-webpack-plugin');

module.exports = merge(common, {
  mode: 'production',
  plugins: [
    new HtmlWebpackPlugin({
      template: './index.html',
    }),
    new CopyPlugin({
      patterns: [
        { from: 'img', to: 'img', noErrorOnMissing: true },
        { from: 'css', to: 'css', noErrorOnMissing: true },
        { from: 'js/vendor', to: 'js/vendor', noErrorOnMissing: true },
        { from: 'icon.svg', to: 'icon.svg', noErrorOnMissing: true },
        { from: 'favicon.ico', to: 'favicon.ico', noErrorOnMissing: true },
        { from: 'robots.txt', to: 'robots.txt', noErrorOnMissing: true },
        { from: 'icon.png', to: 'icon.png', noErrorOnMissing: true },
        { from: 'login.html', to: 'login.html', noErrorOnMissing: true },
        { from: 'ulises.html', to: 'ulises.html', noErrorOnMissing: true },
        { from: 'amir.html', to: 'amir.html', noErrorOnMissing: true },
        { from: 'blue-spiral.html', to: 'blue-spiral.html', noErrorOnMissing: true },
        { from: 'eyes-doom.html', to: 'eyes-doom.html', noErrorOnMissing: true },
        { from: 'gun2.0.html', to: 'gun2.0.html', noErrorOnMissing: true },
        { from: 'island-dead.html', to: 'island-dead.html', noErrorOnMissing: true },
        { from: 'minecraft3.html', to: 'minecraft3.html', noErrorOnMissing: true },
        { from: 'skate2.html', to: 'skate2.html', noErrorOnMissing: true },
        { from: 'skateboard.html', to: 'skateboard.html', noErrorOnMissing: true },
        { from: 'site.webmanifest', to: 'site.webmanifest', noErrorOnMissing: true },
      ],
    }),
  ],
});

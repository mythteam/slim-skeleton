const {
  resolve
} = require('path')
const webpack = require('webpack')
const HtmlWebpackPlugin = require('html-webpack-plugin')
const ExtractTextPlugin = require("extract-text-webpack-plugin")
const url = require('url')
const publicPath = '/assets'

module.exports = (options = {}) => ({
  entry: {
    vendor: './resources/assets/vendor',
    index: './resources/assets/main.js'
  },
  output: {
    path: resolve(__dirname, 'public/assets'),
    filename: options.dev ? '[name].js' : '[name].js?[chunkhash]',
    chunkFilename: '[id].js?[chunkhash]',
    publicPath: publicPath
  },
  module: {
    rules: [{
      test: /\.vue$/,
      loader: 'vue-loader',
      // options: {
      //   loaders: {
      //     css: ExtractTextPlugin.extract({
      //       use: 'css-loader',
      //       fallback: 'vue-style-loader'
      //     })
      //   }
      // }
    },
      {
        test: /\.js$/,
        use: ['babel-loader'],
        exclude: /node_modules/
      },
      {
        test: /\.html$/,
        use: [{
          loader: 'html-loader',
          options: {
            root: resolve(__dirname, 'resources/assets'),
            attrs: ['img:src', 'link:href']
          }
        }]
      },
      {
        test: /\.css$/,
        use: ['style-loader', 'css-loader', 'postcss-loader']
        // loader: ExtractTextPlugin.extract({
        //   fallback: 'style-loader',
        //   use: ['style-loader', 'css-loader'],//, 'postcss-loader'
        // })
      },
      {
        test: /favicon\.png$/,
        use: [{
          loader: 'file-loader',
          options: {
            name: '[name].[ext]?[hash]'
          }
        }]
      },
      {
        test: /\.(png|jpg|jpeg|gif|eot|ttf|woff|woff2|svg|svgz)(\?.+)?$/,
        exclude: /favicon\.png$/,
        use: [{
          loader: 'url-loader',
          options: {
            limit: 10000
          }
        }]
      }
    ]
  },
  plugins: [
    new webpack.optimize.CommonsChunkPlugin({
      names: ['vendor', 'manifest']
    }),
    // new ExtractTextPlugin({
    //   filename: '[name].css',
    //   allChunks: true
    // }),
    new HtmlWebpackPlugin({
      hash: true,
      // inject: false,
      template: './resources/assets/index.html',
      filename: resolve(__dirname, './resources/views/index.php')
    })
  ],
  resolve: {
    alias: {
      '~': resolve(__dirname, 'resources/assets')
    }
  },
  // devServer: {
  //   host: '127.0.0.1',
  //   port: 8010,
  //   proxy: {
  //     '/api/': {
  //       target: 'http://127.0.0.1:8080',
  //       changeOrigin: true,
  //       pathRewrite: {
  //         '^/api': ''
  //       }
  //     }
  //   },
  //   historyApiFallback: {
  //     index: url.parse(options.dev ? '/assets/' : publicPath).pathname
  //   }
  // },
  devtool: options.dev ? '#eval-source-map' : '#source-map'
})

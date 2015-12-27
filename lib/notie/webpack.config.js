var webpack = require('webpack')
var path = require('path')

module.exports = {
  entry: ['./src/notie.js'],
  output: {
    path: path.join(__dirname, 'browser'),
    filename: 'notie.js',
    libraryTarget: 'var',
    library: 'notie'
  },
  module: {
    loaders: [
      { test: /\.js$/, loader: 'babel' },
      {
        test: /\.css$/, loader: 'style!css!postcss'
      },
      {
        test: /\.svg$/,
        loader: 'svg-inline'
      }
    ],
  },
  postcss () {
    return [
      require('postcss-mixins'),
      require('postcss-nested'),
      require('cssnext')()
    ]
  },
  plugins: [
    new webpack.optimize.OccurenceOrderPlugin(),
    new webpack.DefinePlugin({
      'process.env': {
        'NODE_ENV': JSON.stringify('production')
      }
    }),
    new webpack.optimize.UglifyJsPlugin({
      compressor: {
        warnings: false
      }
    })
  ]
}

import gulp from 'gulp'
import serve from 'gulp-serve'
import webpack from 'webpack'
import gutil from 'gulp-util'
import path from 'path'
import webpackConfig from './webpack.config'

gulp.task('serve', serve({
  port: 3746,
  root: '.'
}))


gulp.task('webpack', (cb) => {
  let config = Object.create(webpackConfig)
  config.output.libraryTarget = 'commonjs2'
  config.output.library = true
  config.output.path = path.resolve('./')
  config.target = 'node'
  let compiler = webpack(config)
  compiler.run((err, stats) => {
    if(err) throw new gutil.PluginError("webpack", err)
    gutil.log("[webpack-webpack]", stats.toString({
      colors: true
    }))
    cb()
  })
})


gulp.task('browser', (cb) => {
  let config = Object.create(webpackConfig)
  let compiler = webpack(config)
  compiler.run((err, stats) => {
    if(err) throw new gutil.PluginError("webpack", err)
    gutil.log("[webpack-browser]", stats.toString({
      colors: true
    }))
    cb()
  })
})

gulp.task('watch', () => {
  gulp.watch('./src/notie.js', ['browser'])
})

gulp.task('build', ['browser'])

gulp.task('default', ['build', 'serve', 'watch'])

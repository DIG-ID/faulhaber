// webpack.mix.js
const mix = require('laravel-mix');

mix
  .setResourceRoot('./')
  .setPublicPath('dist')
  .sass('style.sass', 'dist')
  .styles(['style.css', 'dist/style.css'], 'dist/style.css')
  .options({
    processCssUrls: false
  })
  .browserSync({
    proxy: "faulhaber.local",
    files: ["./**/*.php", "./dist/css/*.css"]
  })
  .disableNotifications();

if (!mix.inProduction()) {
  mix
    .webpackConfig({
      devtool: "source-map"
    })
    .sourceMaps();
}

if (mix.inProduction()) {
  mix.version();
}
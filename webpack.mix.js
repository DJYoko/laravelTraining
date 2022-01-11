const mix = require('laravel-mix');
const path = require('path');

mix.webpackConfig({
  resolve: {
    extensions: ['.jsx', '.scss', '.ts'],
    alias: {
      '@resources': path.join(__dirname, 'resources/'),
    },
  },
  module: {
    rules: [
      {
        test: /\.tsx?$/,
        loader: 'ts-loader',
        options: {
          appendTsSuffixTo: [/\.jsx$/],
        },
        exclude: /node_modules/,
      },
    ],
  },
});

mix.sass('resources/css/app.scss', 'public/css').version();
mix
  .js(
    'resources/js/page/auth/login/index.js',
    'public/js/page/auth/login/index.js'
  )
  .js(
    'resources/js/page/auth/register/index.js',
    'public/js/page/auth/register/index.js'
  )
  .version();

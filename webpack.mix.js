const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/esc_asis_lab.js', 'public/js')
    .js('resources/js/esc_dentista.js', 'public/js')
    .js('resources/js/esc_paciente.js', 'public/js')
    .js('node_modules/react/umd/react.production.min.js', 'public/js')
    .js('node_modules/react-dom/umd/react-dom.production.min.js', 'public/js')
    .js('node_modules/redux/dist/redux.min.js', 'public/js')
    .js('node_modules/redux-thunk/dist/redux-thunk.min.js', 'public/js')
    .js('node_modules/lodash/lodash.min.js', 'public/js')

    .vue()
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
    ]);

if (mix.inProduction()) {
    mix.version();
}

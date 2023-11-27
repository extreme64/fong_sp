const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        require('tailwindcss'),
    ])
    .copy('node_modules/tw-elements/dist/js/tw-elements.umd.min.js', 'public/js');
    // .copy('node_modules/tw-elements/dist/js/tw-elements.umd.min.js.map', 'public/js');

// Minify both JS and CSS files for production build 
if (mix.inProduction()) {
    mix.minify();
}

mix.options({
    terser: {
        extractComments: true,
    },
    cssNano: {
        discardComments: {
            removeAll: true,
        },
    },
});

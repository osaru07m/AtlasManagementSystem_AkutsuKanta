const mix = require('laravel-mix');
const purgecss = require('laravel-mix-purgecss');

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .postCss('resources/css/app.css', 'public/css', [
        require('tailwindcss'),
    ])
    .then(() => {
        if (mix.inProduction()) {
            mix.purgeCss({
                content: [
                    'resources/**/*.blade.php',
                    'resources/**/*.js',
                ],
                safelist: [], // 必要に応じて、使用するクラスを指定します
                defaultExtractor: (content) => content.match(/[\w-/:]+(?<!:)/g) || [],
            });
        }
    });

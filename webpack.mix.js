const mix = require('laravel-mix');


mix.sass('resources/css/app.scss', 'public/css')
   .js('resources/js/messages_pt_BR.js', 'public/js/localization/')

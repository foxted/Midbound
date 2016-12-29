var elixir = require('laravel-elixir');
var path = require('path');

require('laravel-elixir-vue-2');

elixir(function(mix) {
    mix.sass('app.scss')
        .webpack('app.js', null, null, {
            resolve: {
                modules: [
                    path.resolve(__dirname, 'vendor/laravel/spark/resources/assets/js'),
                    'node_modules'
                ]
            }
        })
       .scripts(['scripts.js'])
       .copy('node_modules/sweetalert/dist/sweetalert.min.js', 'public/js/sweetalert.min.js')
       .copy('node_modules/sweetalert/dist/sweetalert.css', 'public/css/sweetalert.css');
});

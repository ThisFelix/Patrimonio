let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix
    .js('resources/assets/js/app.js', 'public/js')
    .js('resources/assets/js/script.js', 'public/js')
    .js('resources/assets/js/datatable/jquery-1.12.4.js', 'public/js')
    .js('resources/assets/js/datatable/jquery.dataTables.min.js', 'public/js')
    .js('resources/assets/js/datatable/dataTables.buttons.min.js', 'public/js')
    .js('node_modules/datatables.net-editor/js/dataTables.editor.min.js', 'public/js')
    .js('node_modules/datatables.net-responsive/js/dataTables.responsive.js', 'public/js')
    .js('resources/assets/js/datatable/buttons.html5.min.js', 'public/js')
    .js('resources/assets/js/datatable/buttons.print.min.js', 'public/js')
    .js('resources/assets/js/datatable/jszip.min.js', 'public/js')
    .js('resources/assets/js/datatable/pdfmake.min.js', 'public/js')
    .js('resources/assets/js/datatable/vfs_fonts.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css')

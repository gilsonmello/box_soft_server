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


mix.js('resources/assets/mobile/js/app.js', 'public/applications/mobile/js')
   .sass('resources/assets/mobile/sass/app.scss', 'public/applications/mobile/css');

mix.scripts([
    'node_modules/select2/dist/js/select2.js',
    //'node_modules/adminbsb-materialdesign/plugins/bootstrap-select/js/bootstrap-select.js',
    'node_modules/adminbsb-materialdesign/plugins/jquery-slimscroll/jquery.slimscroll.js',
    'node_modules/adminbsb-materialdesign/plugins/node-waves/waves.js',
    'node_modules/adminbsb-materialdesign/plugins/jquery-countto/jquery.countTo.js',
    'node_modules/adminbsb-materialdesign/plugins/morrisjs/morris.js',
    'node_modules/adminbsb-materialdesign/plugins/raphael/raphael.js',
    'node_modules/adminbsb-materialdesign/plugins/chartjs/Chart.bundle.js',
    'node_modules/adminbsb-materialdesign/plugins/flot-charts/jquery.flot.js',
    'node_modules/adminbsb-materialdesign/plugins/flot-charts/jquery.flot.resize.js',
    'node_modules/adminbsb-materialdesign/plugins/flot-charts/jquery.flot.pie.js',
    'node_modules/adminbsb-materialdesign/plugins/flot-charts/jquery.flot.categories.js',
    'node_modules/adminbsb-materialdesign/plugins/flot-charts/jquery.flot.time.js',
    'node_modules/adminbsb-materialdesign/plugins/jquery-sparkline/jquery.sparkline.js',
    'node_modules/adminbsb-materialdesign/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js',
    'node_modules/vanilla-masker/build/vanilla-masker.min.js',
    'node_modules/bootstrap-datepicker/dist/js/bootstrap-datepicker.js',
    'node_modules/adminbsb-materialdesign/js/admin.js',
    'node_modules/adminbsb-materialdesign/js/pages/index.js',
    'node_modules/adminbsb-materialdesign/js/demo.js',
    'resources/assets/mobile/js/main.js',
], 'public/applications/mobile/js/plugins.js');

mix.styles([
    'node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css',
    'node_modules/adminbsb-materialdesign/plugins/node-waves/waves.css',
    'node_modules/adminbsb-materialdesign/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css',
    'node_modules/adminbsb-materialdesign/plugins/dropzone/dropzone.css',
    'node_modules/adminbsb-materialdesign/plugins/multi-select/css/multi-select.css',
    'node_modules/adminbsb-materialdesign/plugins/jquery-spinner/css/bootstrap-spinner.css',
    'node_modules/adminbsb-materialdesign/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css',
    'node_modules/adminbsb-materialdesign/plugins/animate-css/animate.css',
    'node_modules/adminbsb-materialdesign/plugins/morrisjs/morris.css',
    //'node_modules/adminbsb-materialdesign/plugins/bootstrap-select/css/bootstrap-select.css',
    'node_modules/adminbsb-materialdesign/plugins/nouislider/nouislider.min.css',
    'node_modules/adminbsb-materialdesign/plugins/waitme/waitMe.css',
    'node_modules/adminbsb-materialdesign/css/materialize.css',
    'node_modules/adminbsb-materialdesign/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css',
    'node_modules/select2/dist/css/select2.css',
    'node_modules/adminbsb-materialdesign/css/style.css',
], 'public/applications/mobile/css/plugins.css');


mix.scripts([
    'node_modules/adminbsb-materialdesign/plugins/node-waves/waves.js',
    'node_modules/adminbsb-materialdesign/js/admin.js',
], 'public/applications/mobile/js/auth.js');
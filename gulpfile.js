var elixir = require("laravel-elixir");

elixir(function (mix) {

    var path = {
        node_modules: "../../../node_modules/",
        bower_components: "../../../vendor/bower_components/",
        bower_components_root: "./vendor/bower_components/",
        backend_plugin: "backend/plugins/"
    };

    mix
        .sass([
            "frontend.scss"
        ], "public/css/frontend.css")

        .sass("backend.scss", "public/css/backend.css")

        .scripts([
            "frontend.js"
        ], "public/js/frontend.js")


        .scripts(
        [
            path.bower_components + "jquery/dist/jquery.js",
            path.node_modules + "bootstrap-sass/assets/javascripts/bootstrap.min.js",
            path.bower_components + "sweetalert/dist/sweetalert.min.js",

            path.backend_plugin + "datatable/jquery.dataTables.min.js",
            path.backend_plugin + "datatable/dataTables.bootstrap.min.js",
            path.backend_plugin + "datatable/datatable.js",

            path.backend_plugin + "validate/jquery.validate.js",
            path.backend_plugin + "validate/validate.js",

            path.bower_components + "jquery-ui/jquery-ui.min.js",

            path.backend_plugin + "datepicker/datepicker.js",
            path.backend_plugin + "datetimepicker/datetimepicker.js",
            path.backend_plugin + "timepicker/timepicker.js",

            path.backend_plugin + "select2/select2.full.min.js",
            path.backend_plugin + "maxlength/maxlength.js",
            path.backend_plugin + "tags/tags.js",
            path.backend_plugin + "dropzone/dropzone.js",
            path.backend_plugin + "maskedinput/jquery.maskedinput.js",
            path.backend_plugin + "maskmoney/jquery.maskMoney.min.js",

            path.backend_plugin + "ckeditor/ckeditor.js",

            "backend/app.js",
            "backend.js"
        ], "public/js/backend.js")


        .copy("./resources/assets/images", "./public/images")
        .copy("./resources/assets/fonts", "./public/fonts")
        .copy("./resources/assets/files", "./public/files")
        .copy(path.node_modules + "bootstrap-sass/assets/fonts/*", "./public/fonts")

        .copy("./resources/assets/js/backend/plugins/ckeditor", "./public/js/plugins/ckeditor")
        .copy("./resources/assets/js/backend/plugins/elFinder2", "./public/js/plugins/elFinder2")

        .copy(path.bower_components_root + "font-awesome/fonts", "./public/fonts")


        .version([
            "public/css/frontend.css",
            "public/css/backend.css",
            "public/js/frontend.js",
            "public/js/backend.js"
        ])
    ;

});
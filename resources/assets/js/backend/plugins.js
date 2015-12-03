var Plugins = function (){

    return {
        init: function(){
            this.data();
            this.hora();
            this.datahora();
            this.select();
            this.maxlength();
            this.tag();
            this.mascara();
            this.editor();
            this.dropzone();
        },

        data: function(){
            $(".data").datepicker({
                format: "dd/mm/yyyy",
                autoclose: true,
                todayBtn: true,
                language: 'pt-BR'
            });
        },

        hora: function(){
            $('.hora').timepicker({
                autoclose: true,
                minuteStep: 5,
                showSeconds: false,
                showMeridian: false
            });
        },

        datahora: function(){
            $(".datahora").datetimepicker({
                format: "dd/mm/yyyy HH:ii",
                autoclose: true,
                todayBtn: true,
                language: 'pt-BR'
            });
        },

        select: function(){
            $('.select, select[name="dataTable_length"]').select2();
        },

        maxlength: function(){
            $('input[maxlength], textarea[maxlength]').maxlength({
                limitReachedClass: 'label label-danger',
                alwaysShow: true,
                threshold: 5
            });
        },

        tag: function(){
            $(".tags").each(function(){
                $(this).tagsInput({
                    width: 'auto'
                });
            });
        },

        mascara: function(){
            $('.maskFone').inputmask("(99) 9999[9]-9999", { greedy: true});
            $('.maskData').inputmask("99/99/9999");
            $('.maskCep').inputmask("99.999-999");
            $('.maskCpf').inputmask("999.999.999-99");
            $(".maskPreco").maskMoney({symbol:'R$ ', showSymbol:true, thousands:'.', decimal:',', symbolStay: true});
        },

        editor: function () {
            CKEDITOR.basePath = $('meta[name=base]').attr('content') + "/js/plugins/ckeditor/";
            CKEDITOR.config.contentsCss = CKEDITOR.basePath+"contents.css";

            var editors = $('textarea.editor');

            if(editors.length > 0 && typeof CKEDITOR !== "undefined") {
                $.each(editors, function(){
                    var $this    = $(this),
                        $toolbar = [];

                    if(!$this.attr('id')) { $this.attr('id', 'txtRand_' + $.guid++); }

                    if($this.hasClass('simple')){

                        CKEDITOR.replace($this.attr('id'), {
                            toolbar: [
                                { name: "clipboard", items: [ "Paste", "PasteText", "PasteFromWord", "-", "Undo", "Redo" ] }
                                ,{ name: "basicstyles", items: [ "Bold", "Italic", "Underline", "Strike", "RemoveFormat" ] }
                                ,{ name: "paragraph", items: [ "NumberedList", "BulletedList", "JustifyLeft", "JustifyCenter", "JustifyRight", "JustifyBlock" ] }
                                ,{ name: "links", items: [ "Link", "Unlink" ]  }
                            ]
                        });

                    }else{

                        CKEDITOR.replace($this.attr('id'), {
                            toolbar: [
                                { name: "document", items: [ "Source" ] }
                                ,{ name: "clipboard", items: [ "Paste", "PasteText", "PasteFromWord", "-", "Undo", "Redo" ] }
                                ,{ name: "basicstyles", items: [ "Bold", "Italic", "Underline", "Strike", "RemoveFormat" ] }
                                ,{ name: "paragraph", items: [ "NumberedList", "BulletedList", "Blockquote", "JustifyLeft", "JustifyCenter", "JustifyRight", "JustifyBlock" ] }
                                ,{ name: "links", items: [ "Link", "Unlink" ]  }
                                ,{ name: "insert", items: [ "Image", "Table" ]}
                                ,{ name: "style", items: [ "FontSize", "TextColor", "BGColor" ] }
                            ]
                        });

                    }

                });
            }


        },

        dropzone: function () {

            if($().dropzone) {
                var lstDropZone = $('.dropzone');
                lstDropZone.each(function (){
                    var $this = $(this);
                    if(!$this.attr('id')) { $this.attr('id', 'dzRand_' + $.guid++); }
                    var name = !$this.data('name') ? 'arquivo_upload' : $this.data('name');
                    var size = !$this.data('size') ? 10 : parseInt($this.data('size'));
                    var url = $this.data('url');
                    var placeholdinput = $this.data('placeholdinput');
                    var nameinput = $this.data('nameinput');

                    $this.dropzone({
                        paramName: name,
                        maxFilesize: size,
                        addRemoveLinks: true,
                        url: url,
                        maxFiles: 20,
                        parallelUploads: 20,
                        dictCancelUpload: '',
                        dictRemoveFile: '<i class="fa fa-times"></i>',
                        uploadMultiple: true,
                        autoProcessQueue : false,
                        thumbnailWidth: 165,
                        thumbnailHeight: 165,
                        init: function() {

                            var myDropzone = this; // closure

                            $(document).on("click", '#submit-dropzone', function (e) {
                                e.preventDefault();
                                e.stopPropagation();
                                myDropzone.processQueue();
                            });

                            this.on("addedfile", function (file) {
                                var mini_form = '<div class="dz-mini-form"><input type="text" name="legenda" placeholder="Legenda" class="form-control col-xs-12" /><br><input type="number" name="ordem" placeholder="Ordem" class="form-control col-xs-12" /></div>';

                                $(file.previewElement).append(mini_form);
                                $(file.previewElement).find('.dz-remove').attr('tabindex', '-1');
                                $(file.previewElement).closest('.dropzone').find('.dz-preview').find('input').first().focus();
                            });
                            this.on("sendingmultiple", function (file, xhr, formData) {
                                jQuery(file).each(function(i, f){

                                    $.each( $(f.previewElement).find('input') ,function(){
                                        formData.append( $(this).attr('name')+'[]', $(f.previewElement).find('input[name="'+$(this).attr('name')+'"]').val() );
                                    });
                                });
                            });
                            this.on("successmultiple", function (files, response) {
                                var remove = $('.dz-remove');
                                remove.html(remove.first().text());

                                if(!response.url) {
                                    var redirect = $('#redirect').val();
                                    window.location.href = redirect;
                                }
                            });
                            this.on("errormultiple", function (files, response) {
                                var remove = $('.dz-remove');
                                remove.html(remove.first().text());
                            });
                        }
                    });
                });
            }

        }
    }


}();


// Plugin para criar os dropdown das a��es
(function($) {
    $.fn.dropdownAcao = function(obj){

        var defaults = {
            config: { multi: false },
            ativar:{
                name: "Ativar",
                bg: "green;black",
                bgActive: "green",
                status: "ativar;desativar",
                desc: "ativado",
                icon: "<i class=\"fa fa-check\"></i>",
                visible: true,
            },
            desativar: {
                name: "Desativar",
                bg: "green;black",
                bgActive: "black",
                status: "ativar;desativar",
                desc: "desativado",
                icon: "<i class=\"fa fa-close\"></i>",
                visible: true,
            },
            excluir: {
                name: "Deletar",
                icon: "<i class=\"fa fa-trash-o\"></i>",
                visible: true
            },
            ver: {
                name: "Visualizar",
                icon: "<i class=\"fa fa-eye\"></i>",
                visible: false,
            },
            editar: {
                name: "Editar",
                icon: "<i class=\"fa fa-pencil\"></i>",
                visible: true,
            },


            config: {
                multi: false,
                codigo: 0
            }

        };

        var settings = $.extend(true, defaults, obj);

        var cont = $("<ul class=\"dropdown-menu\" role=\"menu\"></ul>");

        $.guid = 1;

        function gera_id() {
            var size = 5;//Gera o prompt que pergunta o tamanho do ID e armazena na vari�vel
            var randomized = Math.ceil(Math.random() * Math.pow(10, size));//Cria um n�mero aleat�rio do tamanho definido em size.
            var digito = Math.ceil(Math.log(randomized));//Cria o d�gito verificador inicial
            while (digito > 10) {//Pega o digito inicial e vai refinando at� ele ficar menor que dez
                digito = Math.ceil(Math.log(digito));
            }
            return randomized + '-' + digito;
        };

        function insert(a, b){
            var acao     = a,
                name     = b.name       ? b.name        : "",
                bg       = b.bg         ? b.bg          : "",
                bgActive = b.bgActive   ? b.bgActive    : "",
                status   = b.status     ? b.status      : "",
                icon     = b.icon       ? b.icon        : "",
                classs   = b.class      ? b.class       : "",
                desc     = b.desc       ? b.desc        : "",
                id       = 'btn_drop_'+acao+'_' + gera_id();

            if(defaults.config.multi){
                name += " selecionados";
            }


            var el = $('<li role="presentation"><a id="'+id+'" role="menuitem" href="#" class="'+classs+'" data-id="" data-status="'+status+'" data-bg="'+bg+'" data-bg-active="'+bgActive+'" data-text="'+desc+'" data-action="'+acao+'">'+icon+' '+ name+'</a></li>');

            cont.append(el);

            if( "fnclick" in b ){
                el.find('#'+id).on("click", function(e){
                    e.preventDefault();
                    b.fnclick( $('#'+id) );
                });
            }
        }


        if(settings){
            $.each(settings, function(action, config){
                if (config.visible) insert(action, config);
            });
        }

        return this.each(function() {
            $(this).append(cont);
        });

    }
}(jQuery));
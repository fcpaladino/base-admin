/* javascript - backend */

$(document).ready(function() {
    $.ajaxSetup({ headers: { 'X-CSRF-Token' : jQuery('meta[name=_token]').attr('content') } });

    $(document).on('click', '#acao input[type="radio"]', function(){
        var el      = $(this),
            action  = el.closest('#acao').data('action'),
            div     = $("#file."+action);

        if(!div.hasClass('mostrar')) {
            if (el.val() == "M") {
                div.slideDown();
            } else {
                div.slideUp();
            }
        }
    });

    $(document).on('change', 'input[type="file"]', function(){
        var el   = $(this),
            file = this.files[0],
            name = file.name,
            size = file.size,
            type = file.type,
            extValid = el.attr('data-ext-valid');

        if(extValid){
            extValid = extValid.split(';');
        }

        var validarExt = function(arquivo, extensoes){
            var  ext, valido;
            ext = arquivo.substring(arquivo.lastIndexOf(".")).toLowerCase().replace('.','');
            valido = false;
            for(var i = 0; i <= extensoes.length; i++){
                if(extensoes[i] == ext){
                    valido = true;
                    break;
                }
            }
            if(valido){
                return true;
            }
            return false;
        };

        if(extValid){
            if( !validarExt(name, extValid) ){
                swal({
                    title: "Atenção!",
                    text: "Apenas arquivos ." + extValid.join(', .'),
                    type: "info"
                });

                return false;
            }
        }

        el.closest('#file').find('.filename').val(name);

    });

    // Inicia a classe de tradução
    Trans.init();

    Plugins.init();

    Datatable();


    $(document).on('click', '.print-button', function(){
        $('.DTTT_PrintMessage').css({display: 'none'});
        window.print();
        return false;
    });

    // Altera o icone no sidebar
    $(document).on('click', '.treeview a:first-child', function(){
        var e               = $(this),
            classe          = e.children('i:first-child').attr('class').split(' '),
            classe_active   = e.attr('data-icon-active'),
            icon_first      = e.children('i:first-child'),
            icon_last       = e.children('i:last-child');

        classe = classe[1],

        e.attr('data-icon-active', classe);

        icon_first.toggleClass(classe).toggleClass(classe_active);
        icon_last.toggleClass('fa-angle-left').toggleClass('fa-angle-down');
    });


    // Cria o botão submit do formulario
    $(document).on('click', '#submit-form', function(e){
        e.preventDefault();
        var form = '#'+$(this).data('submit-form-id');
        $(form).submit();
    });


    // Ação dos botões dropdown da linha
    $(document).on('click', '.btn_drop_row_grid', function(e){
        e.preventDefault();

        var el      = $(this);
        var acao    = el.text();

        if(!el.attr('data-action')){
            window.location.href = el.attr('href');
            return false;
        }

        swal({
            title: acao + " o registro?",
            type: "info",
            showCancelButton: true,
            closeOnConfirm: false,

        }, function () {

            ddlAcaoAjax({
                metodo: "GET",
                elemento: el,
                success: function(el, action){

                    if(action == "excluir"){

                        deleteRowGrid(el);
                        swal.close();

                        //swal("Sucesso!","Registro deletado com sucesso.","success");

                    } else {
                        alterStatusRowsGrid(el);
                        swal({title: "Sucesso!", text: "Registro alterado com sucesso.", type: "success"});
                    }

                },
                error: function(){
                    swal({title: "Oops...", text: "Ocorreu um erro ao tentar modificar o registro, tente novamente!", type: "error"});
                }

            });



        });


    });


    // Ação dos botões dropdown massa
    $(document).on('click', '.btn_drop_massa_grid', function(e){
        e.preventDefault();

        var btn      = $(this),
            acao     = btn.attr('data-action'),
            metodo   = acao == "excluir" ? "DELETE" : "GET",
            checkbox = $('table').find('.chkItem:checked'),
            str1        = acao.substring(0,1),
            acao_nome   = acao.replace(str1, str1.toUpperCase()),
            registroCount = 0;


        swal({
            title: acao + " o registro?",
            type: "info",
            text: "Deseja " + acao_nome + " ("+checkbox.length+") registros selecionados.",
            showCancelButton: true,
            closeOnConfirm: false,

        }, function () {

            checkbox.each(function(){
                var row = $(this),
                    retorno = ddlAcaoAjax({
                    elemento: btn,
                    id: row.val(),
                    acao: acao,
                    metodo: metodo
                });

                if(retorno){
                    registroCount++;

                    if(acao == "excluir"){
                        deleteRowGrid(row);
                    } else {
                        alterStatusRowsGrid(btn, row.closest('tr') );
                    }

                }

            });

            if(registroCount == checkbox.length){
                changeCheckboxGrid($('.dataTable'));
                swal("Sucesso!","Registro "+acao_nome+" com sucesso.","success");
            }

        });

    });


});


function ddlAcaoAjax(settings){

    if(typeof settings == "object"){

        var e       = settings.elemento,
            metodo  = !settings.metodo ? "GET" : settings.metodo,
            id      = !settings.id ? e.closest('tr').find('.chkItem').val() : settings.id,
            path    = window.location.pathname.split('/'),
            acao    = settings.acao ? settings.acao : e.attr('data-action'),
            url     = $('meta[name="base"]').attr('content') + '/admin/';


        // Valida a url
        if(path.length < 1) { return false; }

        $.each(path, function(i, v) {
            if(v){ url += v + "/"; }
        });
        url = url.replace('admin/', '');


        // se for excluir o metodo tem que ser PUTH
        if(acao == "excluir"){
            metodo   = "DELETE";
            url     += id;
        } else {
            url += acao +'/'+ id;
        }



        var response = $.ajax({
            type: metodo,
            url: url,
            async: true
        });

        return response.always(function(data){
            if (data > 0) {
                if(typeof settings.success == "function"){
                    return settings.success(e, acao);
                }

            } else {
                if(typeof settings.error == "function"){
                    return settings.error(e, acao);
                }
            }

            return data > 0;
        });

    }

}
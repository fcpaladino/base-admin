/**
 * Gera a tabela usando o dataTable dinamicamente configurando por classes
 */

function Datatable(){
    var dt = $('.dataTable');

    var _actions_massa = "";

    if($().dataTable && dt.length > 0) {

        dt.each(function () {
            var load_msg = swal({title: Trans.get('processando'), type: "info", showConfirmButton: false});
            var button_acao_massa = "";


            _actions_massa = $("#_action_massa");

            if(_actions_massa.length > 0 && _actions_massa.val() != '') {
                var acoes = _actions_massa.val();
                acoes = acoes.split(';');

                if(acoes.length > 0) {
                    button_acao_massa = "<div id='dropdown_acao_massa' class='dropdown pull-left' style='opacity: 0'><button class='btn-animate gray dropdown-toggle' type='button' data-toggle='dropdown' aria-expanded='false'><i class='fa fa-cog'></i>&numsp;Ações&numsp;<span class='caret'></span></button><ul class='dropdown-menu' role='menu'>";
                    for (var i = 0; i < acoes.length; i++) {
                        str1 = acoes[i].substring(0,1);
                        acao_nome = acoes[i].replace(str1, str1.toUpperCase());

                        switch(acoes[i]){
                            case "ativar":
                                button_acao_massa += "<li role='presentation'><a data-status='ativar;desativar' data-bg='green;black' data-bg-active='green' data-text='ativado' role='menuitem' href='' data-action='"+acoes[i]+"' class='btn_drop_massa_grid'>"+acao_nome+" selecionados</a></li>";
                                break;

                            case "desativar":
                                button_acao_massa += "<li role='presentation'><a data-status='ativar;desativar' data-bg='green;black' data-bg-active='black' data-text='desativado' role='menuitem' href='' data-action='"+acoes[i]+"' class='btn_drop_massa_grid'>"+acao_nome+" selecionados</a></li>";
                                break;

                            case "destacar":
                                button_acao_massa += "<li role='presentation'><a data-status='destacar;naodestacar' data-bg='green;black' data-bg-active='green' data-text='destacado' role='menuitem' href='' data-action='"+acoes[i]+"' class='btn_drop_massa_grid'>"+acao_nome+" selecionados</a></li>";
                                break;

                            case "naodestacar":
                                button_acao_massa += "<li role='presentation'><a data-status='destacar;naodestacar' data-bg='green;black' data-bg-active='black' data-text='sem destaque' role='menuitem' href='' data-action='"+acoes[i]+"' class='btn_drop_massa_grid'>Remover destaque selecionados</a></li>";
                                break;

                            case "excluir":
                                button_acao_massa += "<li role='presentation'><a role='menuitem' href='' data-action='"+acoes[i]+"' class='btn_drop_massa_grid'>"+acao_nome+" selecionados</a></li>";
                                break;

                        }


                    }
                    button_acao_massa += '</ul></div>';
                }
            }








            var e = {
                sPaginationType: "full_numbers",
                fnServerParams: function(aoData){
                    // If has external filters
                    if(!!$(this).data("searchbox")) {
                        var search_box = $($(this).data("searchbox"));

                        var additional_filters = [];
                        $.each(search_box.find('input,select'), function(i, v){
                            if(!!$(v).attr('name') && $(v).val() != '') {
                                additional_filters.push({
                                    name: $(v).attr('name'),
                                    value: $(v).val()
                                });
                            }
                        });

                        if (additional_filters.length > 0) {
                            for (var i=0; i < additional_filters.length; i++) {
                                var filter = additional_filters[i];
                                aoData.push( { "name": filter.name, "value": filter.value } );
                            }
                        }
                    }
                },
                fnServerData: function ( sSource, aoData, fnCallback, oSettings ) {
                    oSettings.jqXHR = $.ajax( {
                        dataType: 'json',
                        type: "GET",
                        url: sSource,
                        data: aoData,
                        success: fnCallback,
                        beforeSend: function (xhr){
                            xhr.setRequestHeader('X-CSRF-Token', $('meta[name=_token]').attr('content'));
                        },
                        error: function(){
                            swal({title: "Erro", type: "error", text:"Houve um erro na listagem", showConfirmButton: false});
                        }
                    } );
                },
                fnDrawCallback: function(oSettings) {
                    swal.close();


                    var listagem_tfoot  = $('.listagem_tfoot');
                    var has_Search      = $.trim($('.dataTables_filter').find('input[type=text]').val()).length;
                    var tblWrapper      = $(oSettings.nTableWrapper);

                    var amount_per_page = tblWrapper.find('.dataTables_length');
                    var pagination      = tblWrapper.find('.dataTables_paginate');
                    var global_search   = tblWrapper.find('.dataTables_filter');
                    var info            = tblWrapper.find('.dataTables_info');
                    var tblId           = oSettings.sTableId;
                    var btnAcoesMassa   = $('#dropdown_acao_massa');

                    // TEMP
                    //amount_per_page.hide(); // Hide amount per page

                    amount_per_page.show(); // amount per page
                    pagination.show(); // pagination
                    global_search.show(); // global search
                    info.show(); // info
                    if(listagem_tfoot.length) { listagem_tfoot.show(); } // footer info (specific tables only)

                    // Se não há itens para serem exibidos
                    if (oSettings.fnRecordsDisplay() == 0) {
                        pagination.hide(); // Hide pagination
                        //amount_per_page.hide(); // Hide amount per page
                        //if(!has_Search) { global_search.hide(); } // Hide global search
                        info.hide(); // Hide info
                        if(listagem_tfoot.length) { listagem_tfoot.hide(); } // Hide custom footer
                    }
                    else if(oSettings._iDisplayLength >= oSettings.fnRecordsDisplay()) {
                        // Se a quantidade de itens exibidos é menor ou igual ao total por página
                        pagination.hide(); // Hide pagination
                    }
                    if(listagem_tfoot.length) { info.hide(); } // Hide info

                    //LoadLabelMask();

                    if (typeof(lstDrawCallBack) == typeof(Function)) {
                        lstDrawCallBack(oSettings);
                    } // Se há função especifica para o callback no js da página.
                    else {
                        // Oculta ou exibe o botão de status correto na combo de opções
                        habilitaButtonDropdownGrid(oSettings);
                    }

                    //DesbloquearTela();
                },
                oLanguage: {
                    "sSearch": '<div class="datatable_actions"></div>',
                    "sInfo": Trans.get('sInfo'),
                    "sLengthMenu": Trans.get('sLengthMenu'),
                    "oPaginate": {
                        "sFirst": "<i class='fa fa-angle-double-left'></i>",
                        "sPrevious": "",
                        "sNext": "",
                        "sLast": "<i class='fa fa-angle-double-right'></i>"
                    },
                    "sEmptyTable": Trans.get('sEmptyTable'),
                    "sZeroRecords": Trans.get('sZeroRecords'),
                    "sLoadingRecords": Trans.get('sLoadingRecords'),
                    "sInfoEmpty": Trans.get('sInfoEmpty'),
                    "sProcessing": load_msg,
                    "sInfoFiltered": Trans.get('sInfoFiltered'),
                }
            };


            // Se foi definido a quantidade por pagina
            if( typeof $(this).data("porpagina") !== 'undefined' ) {
                e.iDisplayLength = $(this).data("porpagina").toFixed();
            }
            // Se foi definido a ordem padrao
            if( typeof $(this).data("default-sort") !== 'undefined' ) {
                var ordemCol	= $(this).data("default-sort").toFixed();
                var ordemDir	= ( $(this).data("default-sort-dir") === 'desc' ) ? 'desc' : 'asc';
                e.aaSorting = [[ ordemCol, ordemDir ]];
            }
            // Inicia o array de config das colunas
            e.aoColumnDefs = [];
            var t = '';
            var n = '';
            // Se terá colunas ocultas
            if( typeof $(this).data("noshow") !== 'undefined' ) {
                t = $(this).data("noshow").toString().split(",");
                for (n = 0; n < t.length; n++) t[n] = parseInt(t[n]);
                e.aoColumnDefs.push({
                    bVisible: !1,
                    aTargets: t
                });
            }
            // Se terá colunas que não poderam ser ordenadas
            if( typeof $(this).data("nosort") !== 'undefined' ) {
                var a = $(this).data("nosort").toString().split(","),
                    b = $(this).data("nosort").toString().split(":"),
                    r = [];

                if(b.length == 2){
                    for (n = 0; n < b[b.length]; n++) r[n] = parseInt(b[n]);
                }else{
                    for (n = 0; n < a.length; n++) r[n] = parseInt(a[n]);
                }

                console.log(r);

                e.aoColumnDefs.push({
                    bSortable: !1,
                    aTargets: r
                });
            }

            if( typeof $(this).data("ajax") !== 'undefined' ) {
                e.bProcessing = true; e.bServerSide = true; e.sAjaxSource = $(this).data("ajax");
            }
            if ($(this).hasClass("dataTable-noheader")) {
                e.bLengthChange = !1;
            }
            if ($(this).hasClass("dataTable-nosearch")) {
                e.bFilter = !1;
            }
            if ($(this).hasClass("dataTable-nofooter")) {
                e.bInfo = !1; e.bPaginate = !1;
            }
            if ($(this).hasClass("dataTable-scroll-x")) {
                e.sScrollX = "100%"; e.bScrollCollapse = !0;
            }
            if ($(this).hasClass("dataTable-scroll-y")) {
                e.sScrollY = "300px"; e.bPaginate = !1; e.bScrollCollapse = !0;
            }




            if (jQuery(this).hasClass("dataTable-tools")) {
                e.sDom = 'T<"clear">lfrtip';
                if(!!jQuery(this).data("exported")) {
                    t = jQuery(this).data("exported").toString().split(",");
                    for (var n = 0; n < t.length; n++) {
                        t[n] = parseInt(t[n]);
                    }

                    e.tableTools = {
                        sSwfPath: "../files/copy_csv_xls_pdf.swf",

                        "aButtons": [
                            {
                                sButtonText: '<i class="fa fa-file-excel-o"></i>&numsp;XLS',
                                "sButtonClass": "btn-animate gray btn-xls hidden pull-right mr-r-5",
                                "sExtends": "xls",
                                "mColumns": t
                            },
                            {
                                sButtonText: '<i class="fa fa-file-pdf-o"></i>&numsp;PDF',
                                "sButtonClass": "btn-animate gray btn-pdf hidden pull-right mr-r-5",
                                "sExtends": "pdf",
                                "mColumns": t
                            },
                            {
                                sButtonText: '<i class="fa fa-files-o"></i>&numsp;Copiar',
                                "sButtonClass": "btn-animate gray btn-copy hidden pull-right mr-r-5",
                                "sExtends": "copy",
                                "mColumns": t,
                            },
                            {
                                sButtonText: '<i class="fa fa-print"></i>&numsp;Imprimir',
                                "sButtonClass": "btn-animate gray btn-print hidden pull-right mr-r-5",
                                "sExtends": "print",
                                "mColumns": t,
                                "sMessage": 'Click print or cancel <button class="print-button">Print</button>'
                            }
                        ]

                    }




                }
                else {
                    e.oTableTools = {
                        sSwfPath: "../files/copy_csv_xls_pdf.swf"
                    };
                }
            }





            $(this).dataTable(e);

            $('.datatable_actions').html(button_acao_massa);

            $(".dataTables_filter input").attr("placeholder", Trans.get('digiteSuaBusca'));
            $('.buttonTools').append($('.DTTT_container'));

            var be = $(this).data('button-export').toString().split(',');
            for (var n = 0; n < be.length; n++) {
                $('.btn-'+be[n]).removeClass('hidden');
            }
        });
    }




}

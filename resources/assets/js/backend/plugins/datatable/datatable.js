$(document).ready(function(){

    if($('.dataTable').length) {


        var table = $('.dataTable'),
            settings = {
                "processing": true,
                "sAjaxSource": "http://admin.dev/admin/listUsuario",

                fnServerData: function (sSource, aoData, fnCallback, oSettings) {
                    oSettings.jqXHR = $.ajax({
                        dataType: 'json',
                        type: "GET",
                        url: sSource,
                        data: aoData,
                        success: fnCallback,
                        beforeSend: function (xhr) {

                        },
                        error: function () {

                        }
                    });
                },

                fnDrawCallback: function (oSettings) {
                    swal.close();
                },

                oLanguage: {
                    "sSearch": '<div class="datatable_actions"></div>',
                    "sInfo": "Mostrando <span>_START_</span> a <span>_END_</span> de <span>_TOTAL_</span> itens",
                    "sLengthMenu": "_MENU_ <span>por página</span>",
                    "oPaginate": {
                        "sFirst": "",
                        "sPrevious": "<i class='fa fa-angle-double-left'></i>",
                        "sNext": "<i class='fa fa-angle-double-right'></i>",
                        "sLast": ""
                    },
                    "sEmptyTable": "Não há dados disponíveis na tabela",
                    "sZeroRecords": "Não há dados disponíveis na tabela",
                    "sLoadingRecords": "Carregando...",
                    "sInfoEmpty": "Nenhum item para mostrar",
                    "sProcessing": swal({
                        title: "Aguarde",
                        text: "Processando as informações ...",
                        type: "info",
                        showConfirmButton: false
                    }),
                    "sInfoFiltered": " - filtrando de _MAX_ itens",
                },


                /*
                 * ------------------------------------
                 * Add ações na ultima coluna da linha
                 * ------------------------------------
                 */
                "columnDefs": [{
                    "targets": -1,
                    "data": null,
                    "defaultContent": '<div class="dropdown_acao_grid dropdown pull-right"><button class="btn-animate gray dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog"></i> <span class="caret"></span></button><ul class="dropdown-menu" role="menu"><li role="presentation"><a role="menuitem" class="btn_drop_row_grid" href="http://admin.dev/admin/usuario/1/edit"><i class="fa fa-pencil"></i> Editar</a></li><li role="presentation"><a role="menuitem" href="#" data-id="1" class="btn_drop_row_grid" data-status="excluir" data-bg="" data-bg-active="" data-text="" data-action="excluir"><i class="fa fa-trash-o"></i> Deletar</a></li><li role="presentation"><a role="menuitem" href="#" data-id="1" class="btn_drop_row_grid" data-status="ativar;desativar" data-bg="green;black" data-bg-active="green" data-text="ativado" data-action="ativar"><i class="fa fa-check"></i> Ativar</a></li><li role="presentation"><a role="menuitem" href="#" data-id="1" class="btn_drop_row_grid" data-status="ativar;desativar" data-bg="green;black" data-bg-active="black" data-text="desativado" data-action="desativar"><i class="fa fa-close"></i> Desativar</a></li></ul></div>'
                }],


                //initComplete: function () {
                //    this.api().columns().every( function () {
                //        var column = this;
                //        var select = $('<select><option value=""></option></select>')
                //            .appendTo( $(column.header()).empty() )
                //            .on( 'change', function () {
                //                var val = $.fn.dataTable.util.escapeRegex(
                //                    $(this).val()
                //                );
                //
                //                column
                //                    .search( val ? '^'+val+'$' : '', true, false )
                //                    .draw();
                //            } );
                //
                //        column.data().unique().sort().each( function ( d, j ) {
                //            select.append( '<option value="'+d+'">'+d+'</option>' )
                //        } );
                //    } );
                //},

            },

            datatable = table.DataTable(settings);


        table.find('tbody').on('click', '.btn_drop_row_grid', function (e) {
            e.preventDefault();
            var data = datatable.row($(this).parents('tr')).data(),
                id = $(data[0]).find('.chkItem').val();

            console.log(id);
        });


        /*
         * ------------------------------------
         * Formulario de busca
         * ------------------------------------
         */
        $(document).on('keyup click', '#form-filtro .filtro', function () {
            var e       = $(this),
                column  = e.data('column');

            datatable.column(column).search(
                $('#form-filtro input.filtro[data-column="' + column + '"]').val()
            ).draw();

        });



        /*
         * ------------------------------------
         * Campo de busca em cada coluna
         * ------------------------------------
         */
        var colunas = table.find("thead tr:first th"),
            filtro = table.find("thead .filtro-colunas"),
            filtroColunas = null;

        table.find("thead tr:first").after("<tr class=\"filtro-colunas\"></tr>");

        filtroColunas = $('.filtro-colunas');

        colunas.each(function (i) {
            var e = $(this);
            filtroColunas.append("<th></th>");
            if (i > 0) {
                if (e.hasClass('filtrar')) {
                    filtroColunas.find('th:last').html('<input type="text" data-column="'+i+'" class="filtro form-control input-sm" placeholder="' + e.data('titulo') + '" />');
                }
            }
        });

        $(document).on('keyup click', '.table .filtro', function () {
            var e       = $(this),
                column  = e.data('column');

            datatable.column(column).search(
                $('.table input.filtro[data-column="' + column + '"]').val()
            ).draw();

        });


    }
});

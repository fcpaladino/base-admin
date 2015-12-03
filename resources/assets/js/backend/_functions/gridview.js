function mostrarDropdownAcaoMassa(checkboxs){
    var cont = 0;
    var el = $(checkboxs);

    el.each(function(){
        if($(this).is(':checked')){ cont++; }
    });

    var table = el.closest('.dataTables_wrapper');

    var disabledDropdown = function(el){
        el.each(function(){
            if($(this).is(':checked')){
                $(this).closest('tr').find('.dropdown button').addClass('disabled').animate({ opacity: '0'});
            }
        });
    }

    var enabledDropdown = function(el){
        el.each(function(){
            $(this).closest('tr').find('.dropdown button').removeClass('disabled').animate({ opacity: '1'});
        });
    }

    if( cont > 1 ){
        disabledDropdown(el);
        table.find('#dropdown_acao_massa').animate({ opacity: '1'});
    } else {
        enabledDropdown(el);
        table.find('#dropdown_acao_massa').animate({ opacity: '0'});
    }

}

function changeCheckboxGrid(el){
    var tb = "#"+el.closest('.dataTables_wrapper').find('table').attr('id');
    $(tb+' .chkTodos').prop('checked', false);
    $(tb+' .chkItem').each(function(){
        $(this).prop('checked', false);
        $(this).closest('tr').removeClass('active');
    });
    mostrarDropdownAcaoMassa(tb+' .chkItem');
}

function alterStatusMassa(el){
    $('#dataTable .chkItem').each(function(){
        if( $(this).is(':checked') ){
            alterStatusRowsGrid(el, $(this).closest('tr'));
        }
    });
}

function alterStatusRowsGrid(el, tr){

    var row      = tr ? tr : el.closest('tr');
    var action   = el.data('action');
    var text     = el.data('text');
    var bgActive = el.data('bg-active');
    var bg       = el.data('bg').split(';');
    var status   = el.data('status');

    var listStatus  = status.split(';');

    var enableButtons = function(row, action){
        row.find('.dropdown_acao_grid a[data-action="'+action+'"]').show();
    };

    var disabledButtons = function(row, action){
        row.find('.dropdown_acao_grid a[data-action="'+action+'"]').hide();
    };

    $.each(listStatus, function(i,v){
        disabledButtons(row, v);
    });

    listStatus.splice( listStatus.indexOf(action), 1);

    console.log(el);

    $.each(listStatus, function(i, v){
        var label = row.find('.lst-tb-status[data-action="'+v+'"]');
        label.text(text);
        label.attr('data-action', action);


        $.each(bg, function(x, c){
            label.removeClass(c);
        });

        label.addClass(bgActive);


        enableButtons(row, v);
    });

    return true;
}

function habilitaButtonDropdownGrid(oSettings) {

    var table       = $('#' + oSettings.sTableId);

    if(oSettings.aoData.length) {
        $.each(oSettings.aoData, function () {
            var row         = this.nTr._DT_RowIndex;
            var dpw         = $(table.find('.dropdown')[row]);
            var tr          =  table.find('tbody tr')[row];

            $(tr).find('.lst-tb-status').each(function(){
                var lblAction   = $.trim($(this).data('action'));
                $(this).attr('data-action', lblAction);
                dpw.find('[data-action="'+ lblAction+'"]').toggle();
            });

        });
    }

}


function deleteRowGrid(e){
    var tr = e.closest('tr');

    tr.animate({ opacity: '0'}, function(){
        tr.remove();
    });

}



// Deixa a linha da grid selecionado quando marca o checkbox
$(document).on('change', '.chkItem', function(){
    var tr      = $(this).closest('tr'),
        table   = "#" + $(this).closest('table').attr('id');
    tr.toggleClass('active');
    mostrarDropdownAcaoMassa(table + ' .chkItem');
});

// Marca todos os checkbox da grid
$(document).on('change', '.chkTodos', function(){
    var el      = $(this);
    var checked = el.is(":checked");
    var table   = "#" + el.closest('table').attr('id');

    $(table + ' .chkItem').each(function(){
        if(checked){
            $(this).prop('checked', true);
            $(this).closest('tr').addClass('active');
        } else {
            $(this).prop('checked', false);
            $(this).closest('tr').removeClass('active');
        }
    });

    mostrarDropdownAcaoMassa(table + ' .chkItem');
});

// Habilita a opção para poder ordenar quando arrastar
$("table tbody").sortable({
    helper: function(e, tr) {
        var $originals = tr.children();
        var $helper = tr.clone();
        $helper.children().each(function(index) {
            $(this).width($originals.eq(index).width())
        });
        return $helper;
    },
    handle : ".orderList",
    cursor: "move",
    opacity: 0.8,
    update: function(event, ui){

        var ordem = [];
        var paginate        = $('#dataTable_paginate ul'),
            paginaActive    = paginate.find('li.active').index(),
            itensPorPagina  = parseInt($(".dataTables_length select option:selected" ).val()),
            path            = window.location.pathname.split('/'),
            url             = $('meta[name="base"]').attr('content') + '/admin/',
            table           = $(this);

        if(paginaActive < 0){
            paginaActive = 1;
        }

        table.find('tr').each(function(i){
            ordem.push({ id: $(this).find('.chkItem').val(), order: ((paginaActive * itensPorPagina - (itensPorPagina - 1) ) + i) });
        });


        $.each(path, function(i, v) {
            if(v){ url += v + "/"; }
        });
        url = url.replace('admin/', '');

        url += "ordenar";


        $.ajax({
            type: "POST",
            url: url,
            data: {ordenar: ordem},
            dataType: 'json',
            success: function(result){
                if(result.success && result.success == true) {
                    table.find('tr').each(function (i){
                        $(this).find('.numOrdem').html(((paginaActive * itensPorPagina - (itensPorPagina - 1)) + i));
                    });
                }
            }

        });
    }

}).disableSelection();

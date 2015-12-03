/* javascript - backend */
$(document).ready(function() {

    /*
     * ------------------------------------------------------
     *  Seta o token nas chamadas AJAX
     * ------------------------------------------------------
     */

    $.ajaxSetup({ headers: { 'X-CSRF-Token' : jQuery('meta[name=_token]').attr('content') } });





    /*
     * ------------------------------------------------------
     *  Ao digitar no campo de pesquisa
     * ------------------------------------------------------
     */
    $(".sidebar-form input").on("keyup", function(e)
    {

        var teclas_ignorar = [17, 9, 16, 20, 27, 18, 13, 91, 37, 38, 39, 40];

        // Se apertou alguma tecla ignorável
        if( $.inArray(e.keyCode, teclas_ignorar) >= 0 )
        {
            return;
        }

        var obj = $(this);
        var buscar_por = $.trim(obj.val().toLowerCase());

        // Se estiver vazio
        if( buscar_por == '' )
        {
            // Mostra todas as opções
            $(".sidebar-menu li a").removeClass("hide");

            // Fecha todos os submenus exceto o que está ativo
            //$(".sidebar-form li.tem-submenu").not(".ativo").removeClass("open").find("ul").slideUp(0);

            return;
        }

        // Primeiro faz nos itens raiz
        $(".sidebar-menu > li > a").each(function(i)
        {
            var menu_opcao = $(this);
            var menu_opcao_texto = $(this).text().toLowerCase();

            (menu_opcao_texto.indexOf(buscar_por) >= 0) ? menu_opcao.removeClass("hide") : menu_opcao.addClass("hide");
        });

        // Agora faz nos itens de submenu
        $(".sidebar-menu > li > ul > li > a").each(function(i)
        {
            var menu_opcao = $(this);
            var menu_opcao_texto = $(this).text().toLowerCase();
            var pai = menu_opcao.closest(".treeview");
            var pai_aberto = pai.hasClass('active');

            if( menu_opcao_texto.indexOf(buscar_por) >= 0 )
            {

                menu_opcao.removeClass("hide");

                if( pai_aberto == false )
                {
                    // Adiciona a classe da li pai
                    pai.addClass('active');

                    // Abre/fecha o próximo ul
                    pai.children('ul').slideToggle(100);
                }

                pai.children("a").removeClass("hide")
            }
            else
            {
                menu_opcao.addClass("hide");
            }
        });

    });

    // Ao clicar no botao buscar
    $(".sidebar-form #search-btn").on("click", function(e){
        e.preventDefault();
    });





    /*
     * ------------------------------------------------------
     *  Validação do Formulario
     * ------------------------------------------------------
     */
    formValidate();

    $("#form-padrao").validate({
        submitHandler: function(form){
            $(form).submit();
        }
    });




    /*
     * ------------------------------------------------------
     *  Data e hora
     * ------------------------------------------------------
     */
    $(".data").datepicker({
        format: "dd/mm/yyyy",
        autoclose: true,
        todayBtn: true,
        language: 'pt-BR'
    });

    $('.hora').timepicker({
        autoclose: true,
        minuteStep: 5,
        showSeconds: false,
        showMeridian: false
    });

    $(".datahora").datetimepicker({
        format: "dd/mm/yyyy HH:ii",
        autoclose: true,
        todayBtn: true,
        language: 'pt-BR'
    });

});

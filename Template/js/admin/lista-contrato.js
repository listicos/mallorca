var LAST_LOAD_CONTRATO = 20;
var IS_GETTING_CONTRATO = false;

$(document).ready(function(){

    getContratosByArgs();
    
    $('.selectpicker').selectpicker();
    
    $('#ordena_contratos, #ordena_tipo').change(function(){
        getContratosByArgs();
    });
    
    $('#contratosListForm').submit(function(ev){
        ev.preventDefault();
        getContratosByArgs();
        return false;
    });
    
    $(document).scroll(function(e) {

        if(IS_GETTING_CONTRATO)
            return false;
        
        if(!IS_GETTING_CONTRATO){
            if ($(window).scrollTop() >= ($(document).height() - $(window).height()) * 0.8) {
                LAST_LOAD_CONTRATO = LAST_LOAD_CONTRATO + 5;
                $('#limitSearch').val(LAST_LOAD_CONTRATO);
                IS_GETTING_CONTRATO = true;
                getContratosByPagination();
            }
        }
    });

});

function getContratosByPagination(){
    $('#contratos_table_list').find('tbody').append(AJAX_MAIN);
    $.ajax({
        dataType: 'json',
        url: BASE_URL + '/admin-ajax-contrato-filtros',
        type: 'POST',
        data: $('#contratosListForm').serialize(),
        success: function(response){
            if(response.msg == 'ok'){
                $('#contratos_table_list').find('tbody').html(response.html)
            }
            IS_GETTING_CONTRATO = false;
        }
    });
}

function getContratosByArgs(){
    LAST_LOAD_CONTRATO = 20;
    $('#limitSearch').val(LAST_LOAD_CONTRATO);
    $('#contratos_table_list').find('tbody').html(AJAX_MAIN);
    $.ajax({
        dataType: 'json',
        url: BASE_URL + '/admin-ajax-contrato-filtros',
        type: 'POST',
        data: $('#contratosListForm').serialize(),
        success: function(response){
            if(response.msg == 'ok'){
                $('#contratos_table_list').find('tbody').html(response.html)
            }
            IS_GETTING_CONTRATO = false;
        }
    });
}
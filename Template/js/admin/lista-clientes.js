var LAST_LOAD_EMP = 20;
var IS_GETTING_EMP = false;

$(document).ready(function(){

    getClientesByArgs();
    
    $('.selectpicker').selectpicker();
    
    $('#ordena_empresas, #ordena_tipo').change(function(){
        getClientesByArgs();
    });
    
    $('#empresasListForm').submit(function(ev){
        ev.preventDefault();
        getClientesByArgs();
        return false;
    });
    
    $(document).scroll(function(e) {
            
        if(IS_GETTING_EMP)
            return false;
        
        if(!IS_GETTING_EMP){
            if ($(window).scrollTop() >= ($(document).height() - $(window).height()) * 0.9) {
                LAST_LOAD_EMP = LAST_LOAD_EMP + 5;
                $('#limitSearch').val(LAST_LOAD_EMP);
                IS_GETTING_EMP = true;
                getClientesByPagination();
            }
        }
    });

});

function getClientesByPagination(){
    $('#empresas_table_list').find('tbody').append(AJAX_MAIN);
    $.ajax({
        dataType: 'json',
        url: BASE_URL + '/admin-ajax-cliente-filtros',
        type: 'POST',
        data: $('#empresasListForm').serialize(),
        success: function(response){
            if(response.msg == 'ok'){
                $('#empresas_table_list').find('tbody').html(response.html)
                reservasOverlay();
            }
            IS_GETTING_EMP = false;
        }
    });
}

function getClientesByArgs(){
    LAST_LOAD_EMP = 20;
    $('#limitSearch').val(LAST_LOAD_EMP);
    $('#empresas_table_list').find('tbody').append(AJAX_MAIN);
    $.ajax({
        dataType: 'json',
        url: BASE_URL + '/admin-ajax-cliente-filtros',
        type: 'POST',
        data: $('#empresasListForm').serialize(),
        success: function(response){
            if(response.msg == 'ok'){
                $('#empresas_table_list').find('tbody').html(response.html)
                reservasOverlay();
            }
            IS_GETTING_EMP = false;
        }
    });
}

function reservasOverlay(){
    $('.verReservas').click(function(){
        var usuarioId = $(this).attr('user-id');
        $('#reservas_overlay').find('.modal-body').html(AJAX_MAIN);
        $.ajax({
            type: 'POST',
            dataType : 'json',
            url: BASE_URL + '/admin-ajax-cliente-filtros',
            data: { action: 'verReservas', usuarioId:usuarioId},
            success: function(response){
                $('#reservas_overlay').find('.modal-body').html(response.html);
                $('#reservas_overlay').find('.modal-body').append('<script src="' + BASE_URL + '/Template/js/' + response.js + '" ></script>');
                reservasInit();
                
            }
        });
    });
}
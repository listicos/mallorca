var LAST_LOAD_EMP = 20;
var IS_GETTING_EMP = false;

$(document).ready(function(){

    getComplejosByArgs();
    
    $('.selectpicker').selectpicker();
    
    $('#ordena_complejos, #ordena_tipo').change(function(){
        getComplejosByArgs();
    });
    
    $('#complejosListForm').submit(function(ev){
        ev.preventDefault();
        getComplejosByArgs();
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
                getComplejosByPagination();
            }
        }
    });
    
    $('#btn_eliminar_complejo').click(function(){
        var empresaId = $('#complejoId').val();
        $.ajax({
           url: BASE_URL + '/admin-ajax-complejo-filtros',
           type: 'post',
           dataType: 'json',
           data: {action:'deleteComplejo', complejoId: empresaId},
           success : function(response) {
               if(response.msg == 'ok') {
                    noty({
                        'type' : 'success',
                        'text' : response.data,
                        'layout' : 'top'
                    });
                    getComplejosByArgs();
               }
           }
        });
    });

});

function getComplejosByPagination(){
    $('#complejos_table_list').find('tbody').append(AJAX_MAIN);
    $.ajax({
        dataType: 'json',
        url: BASE_URL + '/admin-ajax-complejo-filtros',
        type: 'POST',
        data: $('#complejosListForm').serialize(),
        success: function(response){
            if(response.msg == 'ok'){
                $('#complejos_table_list').find('tbody').html(response.html);
                $('#complejos_table_list a.borrarComplejo').click(function(e){
                   var empresa = $(this).attr('complejo-id');
                   $('#complejoId').val(empresa);
                });
                apartamentosOverlay();
                reservasOverlay();
            }
            IS_GETTING_EMP = false;
        }
    });
}

function getComplejosByArgs(){
    LAST_LOAD_EMP = 20;
    $('#limitSearch').val(LAST_LOAD_EMP);
    $('#complejos_table_list').find('tbody').append(AJAX_MAIN);
    $.ajax({
        dataType: 'json',
        url: BASE_URL + '/admin-ajax-complejo-filtros',
        type: 'POST',
        data: $('#complejosListForm').serialize(),
        success: function(response){
            if(response.msg == 'ok'){
                $('#complejos_table_list').find('tbody').html(response.html);
                $('#complejos_table_list a.borrarComplejo').click(function(e){
                   var empresa = $(this).attr('complejo-id');
                   $('#complejoId').val(empresa);
                });
                apartamentosOverlay();
                reservasOverlay();
            }
            IS_GETTING_EMP = false;
        }
    });
}

function apartamentosOverlay(){
    $('.verAptos').click(function(){
        var empresaId = $(this).attr('empresa-id');
        $('#apartamentos_overlay').find('.modal-body').html(AJAX_MAIN);
        $.ajax({
            type: 'POST',
            dataType : 'json',
            url: BASE_URL + '/admin-ajax-empresa-filtros',
            data: { action: 'verAptos', empresaId:empresaId},
            success: function(response){
                $('#apartamentos_overlay').find('.modal-body').html(response.html);
                $('#apartamentos_overlay').find('.modal-body').append('<script src="' + BASE_URL + '/Template/js/' + response.js + '" ></script>');
                apartamentosInit();
                
            }
        });
    });
}

function reservasOverlay(){
    $('.verReservas').click(function(){
        var empresaId = $(this).attr('empresa-id');
        $('#reservas_overlay').find('.modal-body').html(AJAX_MAIN);
        $.ajax({
            type: 'POST',
            dataType : 'json',
            url: BASE_URL + '/admin-ajax-empresa-filtros',
            data: { action: 'verReservas', empresaId:empresaId},
            success: function(response){
                $('#reservas_overlay').find('.modal-body').html(response.html);
                $('#reservas_overlay').find('.modal-body').append('<script src="' + BASE_URL + '/Template/js/' + response.js + '" ></script>');
                reservasInit();
                
            }
        });
    });
}
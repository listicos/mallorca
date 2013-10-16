var LAST_LOAD_EMP = 20;
var IS_GETTING_EMP = false;

$(document).ready(function(){

    getPoliticasByArgs();
    
    $('.selectpicker').selectpicker();
    
    $('#ordena_politicas, #ordena_politicas_orden').change(function(){
        getPoliticasByArgs();
    });
    
    $('#politicasListForm').submit(function(ev){
        ev.preventDefault();
        getPoliticasByArgs();
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
                getPoliticasByPagination();
                
            }
        }
    });
    
    $('#btn_eliminar_politica').click(function(){
        var politicaId = $('#politicaId').val();
        $.ajax({
           url: BASE_URL + '/admin-ajax-politica-filtros',
           type: 'post',
           dataType: 'json',
           data: {action:'deletePolitica', politicaId: politicaId},
           success : function(response) {
               if(response.msg == 'ok') {
                    noty({
                        'type' : 'success',
                        'text' : response.data,
                        'layout' : 'top'
                    });
                    getPoliticasByArgs();
               }
           }
        });
    });

});

function getPoliticasByPagination(){
    $('#politicas_table_list').find('tbody').append(AJAX_MAIN);
    $.ajax({
        dataType: 'json',
        url: BASE_URL + '/admin-ajax-politica-filtros',
        type: 'POST',
        data: $('#politicasListForm').serialize(),
        success: function(response){
            if(response.msg == 'ok'){
                $('#politicas_table_list').find('tbody').html(response.html);
                $('#politicas_table_list a.borrarPolitica').click(function(e){
                   var p = $(this).attr('politica-id');
                   $('#politica').val(p);
                });
            }
            IS_GETTING_EMP = false;
        }
    });
}

function getPoliticasByArgs(){
    LAST_LOAD_EMP = 20;
    $('#limitSearch').val(LAST_LOAD_EMP);
    $('#politicas_table_list').find('tbody').append(AJAX_MAIN);
    $.ajax({
        dataType: 'json',
        url: BASE_URL + '/admin-ajax-politica-filtros',
        type: 'POST',
        data: $('#politicasListForm').serialize(),
        success: function(response){
            if(response.msg == 'ok'){
                $('#politicas_table_list').find('tbody').html(response.html);
                $('#politicas_table_list a.borrarPolitica').click(function(e){
                   var p = $(this).attr('politica-id');
                   $('#politicaId').val(p);
                });
            }
            IS_GETTING_EMP = false;
        }
    });
}
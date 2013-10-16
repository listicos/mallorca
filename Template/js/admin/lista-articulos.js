var LAST_LOAD_EMP = 20;
var IS_GETTING_EMP = false;

$(document).ready(function(){

    getArticulosByArgs();
    
    $('.selectpicker').selectpicker();
    
    $('#ordena_empresas, #ordena_tipo').change(function(){
        getArticulosByArgs();
    });
    
    $('#empresasListForm').submit(function(ev){
        ev.preventDefault();
        getArticulosByArgs();
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
                getArticulosByPagination();
            }
        }
    });
    
    $('#btn_eliminar_articulo').click(function(){
        var articuloId = $('#articuloId').val();
        $.ajax({
           url: BASE_URL + '/admin-ajax-articulos-filtros',
           type: 'post',
           dataType: 'json',
           data: {action:'deleteArticulo', articuloId: articuloId},
           success : function(response) {
               if(response.msg == 'ok') {
                    noty({
                        'type' : 'success',
                        'text' : response.data,
                        'layout' : 'top'
                    });
                    getArticulosByArgs();
               }
           }
        });
    });

});

function getArticulosByPagination(){
    $('#empresas_table_list').find('tbody').append(AJAX_MAIN);
    $.ajax({
        dataType: 'json',
        url: BASE_URL + '/admin-ajax-articulos-filtros',
        type: 'POST',
        data: $('#empresasListForm').serialize(),
        success: function(response){
            if(response.msg == 'ok'){
                $('#empresas_table_list').find('tbody').html(response.html);
                $('#empresas_table_list a.borrarArticulo').click(function(e){
                   var a = $(this).attr('articulo-id');
                   $('#articuloId').val(a);
                });
            }
            IS_GETTING_EMP = false;
        }
    });
}

function getArticulosByArgs(){
    LAST_LOAD_EMP = 20;
    $('#limitSearch').val(LAST_LOAD_EMP);
    $('#empresas_table_list').find('tbody').append(AJAX_MAIN);
    $.ajax({
        dataType: 'json',
        url: BASE_URL + '/admin-ajax-articulos-filtros',
        type: 'POST',
        data: $('#empresasListForm').serialize(),
        success: function(response){
            if(response.msg == 'ok'){
                $('#empresas_table_list').find('tbody').html(response.html);
                $('#empresas_table_list a.borrarArticulo').click(function(e){
                   var a = $(this).attr('articulo-id');
                   $('#articuloId').val(a);
                });
            }
            IS_GETTING_EMP = false;
        }
    });
}
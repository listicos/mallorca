var LAST_LOAD_EMP = 20;
var IS_GETTING_EMP = false;

$(document).ready(function(){

    getCanalesByArgs();
    
    $('.selectpicker').selectpicker();
    
    $('#ordena_canales, #ordena_tipo_canales').change(function(){
        getCanalesByArgs();
    });
    
    $('#canalesListForm').submit(function(ev){
        ev.preventDefault();
        getCanalesByArgs();
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
                getCanalesByPagination();
            }
        }
    });
    
    $('#btn_eliminar_canal').click(function(){
        var canalId = $('#borrar_canal_overlay .canalId').val();
        $.ajax({
            url: BASE_URL + '/admin-ajax-canales-filtros',
            type: 'post',
            dataType: 'json',
            data: {
                action:'deleteCanal', 
                canalId: canalId
            },
            success : function(response) {
                if(response.msg == 'ok') {
                    noty({
                        'type' : 'success',
                        'text' : response.data,
                        'layout' : 'top'
                    });
                    getCanalesByArgs();
                }
            }
        });
    });
   

});

function getCanalesByPagination(){
    $('#canales_table_list').find('tbody').append(AJAX_MAIN);
    $.ajax({
        dataType: 'json',
        url: BASE_URL + '/admin-ajax-canales-filtros',
        type: 'POST',
        data: $('#canalesListForm').serialize(),
        success: function(response){
            if(response.msg == 'ok'){
                $('#canales_table_list').find('tbody').html(response.html);
                $('#canales_table_list a.borrarCanal').click(function(e){
                    var a = $(this).attr('canal-id');
                    $('.canalId').val(a);
                });
            }
            IS_GETTING_EMP = false;
        }
    });
}

function getCanalesByArgs(){
    LAST_LOAD_EMP = 20;
    $('#limitSearch').val(LAST_LOAD_EMP);
    $('#canales_table_list').find('tbody').append(AJAX_MAIN);
    $.ajax({
        dataType: 'json',
        url: BASE_URL + '/admin-ajax-canales-filtros',
        type: 'POST',
        data: $('#canalesListForm').serialize(),
        success: function(response){
            if(response.msg == 'ok'){
                $('#canales_table_list').find('tbody').html(response.html);
                $('#canales_table_list a.borrarCanal').click(function(e){
                    var a = $(this).attr('canal-id');
                    $('.canalId').val(a);
                });
            }
            IS_GETTING_EMP = false;
        }
    });
}
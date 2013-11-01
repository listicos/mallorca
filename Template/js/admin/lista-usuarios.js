var LAST_LOAD_EMP = 20;
var IS_GETTING_EMP = false;

$(document).ready(function(){

    getUsuariosByArgs();
    
    $('.selectpicker').selectpicker();
    
    $('#ordena_usuarios, #ordena_tipo').change(function(){
        getUsuariosByArgs();
    });
    
    $('#usuariosListForm').submit(function(ev){
        ev.preventDefault();
        getUsuariosByArgs();
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
                getUsuariosByPagination();
            }
        }
    });
    
    $('#btn_eliminar_usuario').click(function(){
        var usuarioId = $('#usuarioId').val();
        $.ajax({
           url: BASE_URL + '/admin-ajax-usuario',
           type: 'post',
           dataType: 'json',
           data: {action:'deleteUsuario', idUsuario: usuarioId},
           success : function(response) {
               if(response.msg == 'ok') {
                    noty({
                        'type' : 'success',
                        'text' : response.data,
                        'layout' : 'top'
                    });
                    getUsuariosByArgs();
               }
           }
        });
    });

});

function getUsuariosByPagination(){
    $('#usuarios_table_list').find('tbody').append(AJAX_MAIN);
    $.ajax({
        dataType: 'json',
        url: BASE_URL + '/admin-ajax-usuario-filtros',
        type: 'POST',
        data: $('#usuariosListForm').serialize(),
        success: function(response){
            if(response.msg == 'ok'){
                $('#usuarios_table_list').find('tbody').html(response.html)
                $('#usuarios_table_list a.borrarUsuario').click(function(e){
                   var user = $(this).attr('usuario-id');
                   $('#usuarioId').val(user);
                });
            }
            IS_GETTING_EMP = false;
        }
    });
}

function getUsuariosByArgs(){
    LAST_LOAD_EMP = 20;
    $('#limitSearch').val(LAST_LOAD_EMP);
    $('#usuarios_table_list').find('tbody').append(AJAX_MAIN);
    $.ajax({
        dataType: 'json',
        url: BASE_URL + '/admin-ajax-usuario-filtros',
        type: 'POST',
        data: $('#usuariosListForm').serialize(),
        success: function(response){
            if(response.msg == 'ok'){
                $('#usuarios_table_list').find('tbody').html(response.html)
                $('#usuarios_table_list a.borrarUsuario').click(function(e){
                   var user = $(this).attr('usuario-id');
                   $('#usuarioId').val(user);
                });
            }
            IS_GETTING_EMP = false;
        }
    });
}




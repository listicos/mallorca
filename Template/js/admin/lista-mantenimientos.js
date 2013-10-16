var LAST_LOAD_EMP = 20;
var IS_GETTING_EMP = false;

$(document).ready(function(){

    getMantenimientosByArgs();
    
    $('.selectpicker').selectpicker();
    
    $('#ordena_mantenimientos, #ordena_tipo').change(function(){
        getMantenimientosByArgs();
    });
    
    $('#mantenimientosListForm').submit(function(ev){
        ev.preventDefault();
        getMantenimientosByArgs();
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
                getMantenimientosByPagination();
            }
        }
    });
    
    $('#btn_eliminar_mantenimiento').click(function(){
        var mantenimientoId = $('#borrar_mantenimiento_overlay .mantenimientoId').val();
        $.ajax({
            url: BASE_URL + '/admin-ajax-mantenimiento-filtros',
            type: 'post',
            dataType: 'json',
            data: {
                action:'deleteMantenimiento', 
                mantenimientoId: mantenimientoId
            },
            success : function(response) {
                if(response.msg == 'ok') {
                    noty({
                        'type' : 'success',
                        'text' : response.data,
                        'layout' : 'top'
                    });
                    getMantenimientosByArgs();
                }
            }
        });
    });
   

});

function changeStatusMantenimientos() {
    $('#mantenimientos_table_list select.estadoMantenimiento').off('change').on('change', function(e){
       
       var mantenimientoId = $(this).attr('mantenimiento-id');
       
       $.ajax({
           url: BASE_URL + '/admin-ajax-mantenimiento-filtros',
           type: 'post',
           dataType: 'json',
           data: {action:'cambiarEstatus', mantenimientoId: mantenimientoId, estatus:$(this).val()},
           success : function(response) {
               if(response.msg == 'ok') {
                    noty({
                        'type' : 'success',
                        'text' : response.data,
                        'layout' : 'top'
                    });
                    getMantenimientosByArgs();
               }
           }
        });
    });
}
function printMantenimientoOverlay(){
    $('.printMantenimiento').click(function(){
        $('#print_mantenimiento_overlay .mantenimientoId').val($(this).attr("mantenimiento-id"));
        var mantenimientoId = $('#print_mantenimiento_overlay .mantenimientoId').val();
        $('#print_mantenimiento_overlay .modal-body').html(AJAX_MAIN)
        $.ajax({
            url: BASE_URL + '/admin-ajax-mantenimiento-filtros',
            type: 'POST',
            dataType: 'json',
            data: {
                action:'printMantenimiento', 
                mantenimientoId: mantenimientoId
            },
            success : function(response) {
                if(response.msg == 'ok') {
                    $('#print_mantenimiento_overlay').find('.modal-body').html(response.html);
                }
            }
        });
    });
}
function getMantenimientosByPagination(){
    $('#mantenimientos_table_list').find('tbody').append(AJAX_MAIN);
    $.ajax({
        dataType: 'json',
        url: BASE_URL + '/admin-ajax-mantenimiento-filtros',
        type: 'POST',
        data: $('#mantenimientosListForm').serialize(),
        success: function(response){
            if(response.msg == 'ok'){
                $('#mantenimientos_table_list').find('tbody').html(response.html);
                $('#mantenimientos_table_list a.borrarMantenimiento').click(function(e){
                    var a = $(this).attr('mantenimiento-id');
                    $('.mantenimientoId').val(a);
                });
                printMantenimientoOverlay();
                changeStatusMantenimientos();
            }
            IS_GETTING_EMP = false;
        }
    });
}

function getMantenimientosByArgs(){
    LAST_LOAD_EMP = 20;
    $('#limitSearch').val(LAST_LOAD_EMP);
    $('#mantenimientos_table_list').find('tbody').append(AJAX_MAIN);
    $.ajax({
        dataType: 'json',
        url: BASE_URL + '/admin-ajax-mantenimiento-filtros',
        type: 'POST',
        data: $('#mantenimientosListForm').serialize(),
        success: function(response){
            if(response.msg == 'ok'){
                $('#mantenimientos_table_list').find('tbody').html(response.html);
                $('#mantenimientos_table_list a.borrarMantenimiento').click(function(e){
                    var a = $(this).attr('mantenimiento-id');
                    $('.mantenimientoId').val(a);
                });
                printMantenimientoOverlay();
                changeStatusMantenimientos();
            }
            IS_GETTING_EMP = false;
        }
    });
}
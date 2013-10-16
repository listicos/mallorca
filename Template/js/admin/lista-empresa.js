var LAST_LOAD_EMP = 20;
var IS_GETTING_EMP = false;

$(document).ready(function(){

    getEmpresasByArgs();
    
    $('.selectpicker').selectpicker();
    
    $('#ordena_empresas, #ordena_tipo').change(function(){
        getEmpresasByArgs();
    });
    
    $('#empresasListForm').submit(function(ev){
        ev.preventDefault();
        getEmpresasByArgs();
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
                getEmpresasByPagination();
            }
        }
    });
    
    $('#btn_eliminar_empresa').click(function(){
        var empresaId = $('#empresaId').val();
        $.ajax({
           url: BASE_URL + '/admin-ajax-empresa-filtros',
           type: 'post',
           dataType: 'json',
           data: {action:'deleteEmpresa', empresaId: empresaId},
           success : function(response) {
               if(response.msg == 'ok') {
                    noty({
                        'type' : 'success',
                        'text' : response.data,
                        'layout' : 'top'
                    });
                    getEmpresasByArgs();
               }
           }
        });
    });

});

function getEmpresasByPagination(){
    $('#empresas_table_list').find('tbody').append(AJAX_MAIN);
    $.ajax({
        dataType: 'json',
        url: BASE_URL + '/admin-ajax-empresa-filtros',
        type: 'POST',
        data: $('#empresasListForm').serialize(),
        success: function(response){
            if(response.msg == 'ok'){
                $('#empresas_table_list').find('tbody').html(response.html);
                $('#empresas_table_list a.borrarEmpresa').click(function(e){
                   var empresa = $(this).attr('empresa-id');
                   $('#empresaId').val(empresa);
                });
                apartamentosOverlay();
                reservasOverlay();
            }
            IS_GETTING_EMP = false;
        }
    });
}

function getEmpresasByArgs(){
    LAST_LOAD_EMP = 20;
    $('#limitSearch').val(LAST_LOAD_EMP);
    $('#empresas_table_list').find('tbody').append(AJAX_MAIN);
    $.ajax({
        dataType: 'json',
        url: BASE_URL + '/admin-ajax-empresa-filtros',
        type: 'POST',
        data: $('#empresasListForm').serialize(),
        success: function(response){
            if(response.msg == 'ok'){
                $('#empresas_table_list').find('tbody').html(response.html);
                $('#empresas_table_list a.borrarEmpresa').click(function(e){
                   var empresa = $(this).attr('empresa-id');
                   $('#empresaId').val(empresa);
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
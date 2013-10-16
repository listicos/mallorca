var LAST_LOAD_APART = 20;
var IS_GETTING_APART = false;

$(document).ready(function(){

    apartamentosInit();

});

function apartamentosInit() {
    getApartamentosByArgs();
    
    $('.selectpicker').selectpicker();
    
    $('#ordena_apartamentos, #ordena_tipo').change(function(){
        getApartamentosByArgs();
    });
    
    $('#apartamentosListForm').submit(function(ev){
        ev.preventDefault();
        getApartamentosByArgs();
        return false;
    });
    
    $(document).scroll(function(e) {
            
        if(IS_GETTING_APART)
            return false;
        
        if(!IS_GETTING_APART){
            if ($(window).scrollTop() >= ($(document).height() - $(window).height()) * 0.9) {
                LAST_LOAD_APART = LAST_LOAD_APART + 5;
                $('#limitSearch').val(LAST_LOAD_APART);
                IS_GETTING_APART = true;
                getApartamentosByPagination();
            }
        }
    });
    
    $('#btn_eliminar_apto').click(function(){
        var apartamentoId = $('#apartamentoId').val();
        $.ajax({
           url: BASE_URL + '/admin-ajax-apartamento-filtros',
           type: 'post',
           dataType: 'json',
           data: {action:'deleteApartamento', apartamentoId: apartamentoId},
           success : function(response) {
               if(response.msg == 'ok') {
                    noty({
                        'type' : 'success',
                        'text' : response.data,
                        'layout' : 'top'
                    });
                    getApartamentosByArgs();
               }
           }
        });
    });
};

function getApartamentosByPagination(){
    $('#apartamentos_table_list').find('tbody').append(AJAX_MAIN);
    $.ajax({
        dataType: 'json',
        url: BASE_URL + '/admin-ajax-apartamento-filtros',
        type: 'POST',
        data: $('#apartamentosListForm').serialize(),
        success: function(response){
            if(response.msg == 'ok'){
                $('#apartamentos_table_list').find('tbody').html(response.html);
                $('#apartamentos_table_list a.borrarApto').click(function(e){
                   var apto = $(this).attr('apartamento-id');
                   $('#apartamentoId').val(apto);
                });
                changeStatusApto();
                reservarOverlay();
            }
            IS_GETTING_APART = false;
        }
    });
}

function getApartamentosByArgs(){
    LAST_LOAD_APART = 20;
    $('#limitSearch').val(LAST_LOAD_APART);
    $('#apartamentos_table_list').find('tbody').append(AJAX_MAIN);
    $.ajax({
        dataType: 'json',
        url: BASE_URL + '/admin-ajax-apartamento-filtros',
        type: 'POST',
        data: $('#apartamentosListForm').serialize(),
        success: function(response){
            if(response.msg == 'ok'){
                $('#apartamentos_table_list').find('tbody').html(response.html);
                $('#apartamentos_table_list a.borrarApto').click(function(e){
                   var apto = $(this).attr('apartamento-id');
                   $('#apartamentoId').val(apto);
                });
                changeStatusApto();
                reservarOverlay();
            }
            IS_GETTING_APART = false;
        }
    });
}

function changeStatusApto() {
    $('#apartamentos_table_list a.changeStatusApto').on('click', function(e){
       e.preventDefault();
       var apartamentoId = $(this).attr('apartamento-id');
       
       $.ajax({
           url: BASE_URL + '/admin-ajax-apartamento-filtros',
           type: 'post',
           dataType: 'json',
           data: {action:'cambiarEstatus', apartamentoId: apartamentoId},
           success : function(response) {
               if(response.msg == 'ok') {
                    noty({
                        'type' : 'success',
                        'text' : response.data,
                        'layout' : 'top'
                    });
                    getApartamentosByArgs();
               }
           }
        });
    });
}

function reservarOverlay(){
    $('.reservar').click(function(){
        var aptoId = $(this).attr('apto-id');
        $('#reservar_overlay').find('.modal-body').html(AJAX_MAIN);
        $.ajax({
            type: 'POST',
            dataType : 'json',
            url: BASE_URL + '/admin-ajax-apartamento-filtros',
            data: { action: 'reservar', aptoId:aptoId},
            success: function(response){
                $('#reservar_overlay').find('.modal-body').html(response.html);
                $('#reservar_overlay').find('.modal-body').append('<script src="' + BASE_URL + '/Template/js/' + response.js + '" ></script>');
                initReservaVer();               
            }
        });
    });
}
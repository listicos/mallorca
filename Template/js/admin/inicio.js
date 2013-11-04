var LAST_LOAD_RES = 20;
var IS_GETTING_RES = false;

$(document).ready(function(){
    
    inicioInit();
});

function inicioInit() {
    getReservasCheckInByArgs();
    getReservasCheckOutByArgs();
    getReservasRecientesByArgs();
}

function getReservasCheckInByArgs(){
    LAST_LOAD_RES = 20;
    
    
    $('#checkIn_table_list').find('tbody').append(AJAX_MAIN);
    $.ajax({
        dataType: 'json',
        url: BASE_URL + '/admin-ajax-inicio-filtros',
        type: 'POST',
        data: {action:'checkIn', limit: LAST_LOAD_RES},
        success: function(response){
            if(response.msg == 'ok'){
                $('#checkIn_table_list').find('tbody').html(response.html)
                reservaDetallesOverlay();
                enviarCorreoFromList();
                changeStatusReserva();
            }
            IS_GETTING_RES = false;
        }
    });
}

function getReservasCheckOutByArgs(){
    LAST_LOAD_RES = 20;
    
    
    $('#checkOut_table_list').find('tbody').append(AJAX_MAIN);
    $.ajax({
        dataType: 'json',
        url: BASE_URL + '/admin-ajax-inicio-filtros',
        type: 'POST',
        data: {action:'checkOut', limit: LAST_LOAD_RES},
        success: function(response){
            if(response.msg == 'ok'){
                $('#checkOut_table_list').find('tbody').html(response.html)
                reservaDetallesOverlay();
                enviarCorreoFromList();
                changeStatusReserva();
            }
            IS_GETTING_RES = false;
        }
    });
}

function getReservasRecientesByArgs(){
    LAST_LOAD_RES = 20;
    
    
    $('#reservasRecientes_table_list').find('tbody').append(AJAX_MAIN);
    $.ajax({
        dataType: 'json',
        url: BASE_URL + '/admin-ajax-inicio-filtros',
        type: 'POST',
        data: {action:'reservasRecientes', limit: LAST_LOAD_RES},
        success: function(response){
            if(response.msg == 'ok'){
                $('#reservasRecientes_table_list').find('tbody').html(response.html)
                reservaDetallesOverlay();
                enviarCorreoFromList();
                changeStatusReserva();
            }
            IS_GETTING_RES = false;
        }
    });
}

function enviarCorreoFromList(){
    $('.openModalCorreo').off('click').click(function(){
        var idReservacion = $(this).attr('reserva-id');
        $('#correo_reserva_overlay').find('.modal-body').html(AJAX_MAIN);
        $.ajax({
            dataType: 'json',
            url: BASE_URL + '/admin-ajax-reserva-detalles',
            type: 'POST',
            data: {
                idReservacion: idReservacion,
                action: 'getEmailToOverlay'
            },
            success: function(response){
                if(response.msg == 'ok'){
                    $('#correo_reserva_overlay').find('.modal-body').html(response.html);
                    sendEmail();
                }
            }
        });
    });
}
function sendEmail() {

    $('#correo_reserva_form').off('submit').submit(function(ev){
        ev.preventDefault();
        console.log(EMAIL_EDITOR.getData())
        
        $.ajax({
            dataType: 'json',
            url: BASE_URL + '/admin-ajax-reserva-detalles',
            type: 'POST',
            data: {
                from: $(this).find('#from').val(),
                to: $(this).find('#to').val(),
                subject: $(this).find('#subject').val(),
                body: EMAIL_EDITOR.getData(),
                action: 'sendEmailFromOverlay'
            },
            success: function(response){
                if(response.msg == 'ok'){

                }
            }
        });
        return false;
    });
}
function reservaDetallesOverlay(){
    $('.verRerva').off('click').click(function(){
        var idReservacion = $(this).attr('reserva-id');
        $('#ver_reserva_overlay').find('.modal-body').html(AJAX_MAIN);
        $.ajax({
            dataType: 'json',
            url: BASE_URL + '/admin-ajax-reserva-detalles',
            type: 'POST',
            data: {
                idReservacion: idReservacion,
                action: 'getDetailsToOverlay'
            },
            success: function(response){
                if(response.msg == 'ok'){
                    $('#ver_reserva_overlay').find('.modal-body').html(response.html);
                    $('#ver_reserva_overlay').find('.modificar_reserva_btn').attr('href', BASE_URL + '/admin-reserva-ver/id:' + idReservacion);
                    $('#ver_reserva_overlay').find('.imprimir_reserva_btn').attr('href', BASE_URL + '/admin-ajax-reserva-detalles/id:' + idReservacion).attr('target', '_blank');
                }
            }
        });
    });
}


function changeStatusReserva() {
    $('select.estadoReserva').off('change').on('change', function(e){
       
       var reservaId = $(this).attr('reserva-id');
       
       $.ajax({
           url: BASE_URL + '/admin-ajax-reserva-filtros',
           type: 'post',
           dataType: 'json',
           data: {action:'cambiarEstatus', reservaId: reservaId, estatus:$(this).val()},
           success : function(response) {
               if(response.msg == 'ok') {
                    noty({
                        'type' : 'success',
                        'text' : response.data,
                        'layout' : 'top'
                    });
                    getReservasByArgs();
               }
           }
        });
    });
}
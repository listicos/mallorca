var LAST_LOAD_RES = 20;
var IS_GETTING_RES = false;
var DATE_START_FROM = false
var DATE_END_FROM = false;

$(document).ready(function(){
    
    reservasInit();
});

function reservasInit() {
    getReservasByArgs();
    initStartDates();
    initEndDates();
    
    $('.selectpicker').selectpicker('show');
    
    $('#ordena_reservas, #ordena_tipo, #ordena_apartamentos').change(function(){
        getReservasByArgs();
    });
    
    $('#reservasListForm').submit(function(ev){
        ev.preventDefault();
        var valid_form = $(this).validationEngine('validate');
        
        if(valid_form)
            getReservasByArgs();
        
    });
}

function deleteReservas() {
    $('a.deleteReserva').off('click').on('click', function(e) {
        e.preventDefault();
        idReserva = $(this).attr('reserva-id');
        $.ajax({
            url: BASE_URL + '/admin-ajax-reserva',
            data: {action:'deleteReserva', idReserva: idReserva},
            type: 'post',
            dataType: 'json',
            success: function(response) {
                if(response.msg == 'ok') {
                    noty({
                        'type' : 'success',
                        'text' : response.data,
                        'layout' : 'top'
                    });
                    getReservasByArgs();
                } else {
                    noty({
                        'type' : 'error',
                        'text' : response.data,
                        'layout' : 'top'
                    });
                }
            }
        });
    })
}

function getReservasByArgs(){
    LAST_LOAD_RES = 20;
    //$("#empresa_filtro_id").val($("#ordena_apartamentos").val());
    $('#limitSearch').val(LAST_LOAD_RES);
    $('#reservas_table_list').find('tbody').append(AJAX_MAIN);
    $.ajax({
        dataType: 'json',
        url: BASE_URL + '/admin-ajax-reserva-filtros',
        type: 'POST',
        data: $('#reservasListForm').serialize(),
        success: function(response){
            if(response.msg == 'ok'){
                $('#reservas_table_list').find('tbody').html(response.html)
                reservaDetallesOverlay();
                enviarCorreoFromList();
                changeStatusReserva();
                deleteReservas();
            }
            IS_GETTING_RES = false;
        }
    });
}
function enviarCorreoFromList(){
    $('.openModalCorreo').click(function(){
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

    $('#correo_reserva_form').submit(function(ev){
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
    $('.verRerva').click(function(){
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
function initStartDates(){
    $('.date-start-from').datepicker({
        autoclose: true
    }).on('changeDate', function(ev) {
        var dateEnd = $(this).parents('.box-date').find('.date-start-to');
        DATE_START_FROM = ev.date;
        
        $('.date-end-from').datepicker('setStartDate', DATE_START_FROM);
        
        dateEnd.datepicker('setStartDate', DATE_START_FROM);
        dateEnd.datepicker('show');
    });


    //$('.date-start-from').datepicker('setStartDate', new Date());
    //$('.date-start-to').datepicker('setStartDate', new Date());

    
    $('.date-start-to').datepicker({
        autoclose: true
    }).on('changeDate', function(ev) {
        $(this).datepicker('hide');
    });

}
function initEndDates(){
    $('.date-end-from').datepicker({
        autoclose: true
    }).on('changeDate', function(ev) {
        var dateEnd = $(this).parents('.box-date').find('.date-end-to');
        DATE_END_FROM = ev.date;
        
        $('.date-start-from').datepicker('setEndDate', DATE_END_FROM);
        
        dateEnd.datepicker('setStartDate', DATE_END_FROM);
        dateEnd.datepicker('show');
    });

    //$('.date-end-from').datepicker('setStartDate', new Date());
    //$('.date-end-to').datepicker('setStartDate', new Date());

    $('.date-end-to').datepicker({
        autoclose: true
    }).on('changeDate', function(ev) {
        $(this).datepicker('hide');
    });

}

function changeStatusReserva() {
    $('#reservas_table_list select.estadoReserva').off('change').on('change', function(e){
       
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
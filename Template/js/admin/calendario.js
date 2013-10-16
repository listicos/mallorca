var LAST_LOAD_APART = 20;
var IS_GETTING_APART = false;

$(document).ready(function(){

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
    /*
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
*/

    $('#date-start').datepicker({
        autoclose: true
    }).on('changeDate', function(ev) {
        $('#date-end').datepicker('setStartDate', ev.date);
        $('#date-end').datepicker('show');
    });
    var date_now = new Date(new Date().setDate(new Date().getDate()-2));
    $('#date-start').datepicker('setStartDate', date_now);

    $('#date-end').datepicker({
        autoclose: true
    }).on('changeDate', function(ev) {

        });

    $('#date-end').datepicker('setStartDate', date_now);


    agregarTarifa();
});

function check_all(){
        $('#check_all').click(function(){
            var e = $(this).is(':checked');
            $('#lista_disponibilidades input[type="checkbox"]').each(function(){
                $(this).attr('checked',e);
            });
    });
}

function agregarTarifa(){
    $('#tarifas_modal_form').submit(function(ev){
        ev.preventDefault();
        var form = $(this);
        var serialize = form.serialize();
        serialize+='&'+$('#listado_calendario').serialize();
        var valid_form;
        valid_form = form.validationEngine('validate');
        if(valid_form){
            $.ajax({
                dataType: "json",
                url: BASE_URL + "/admin-ajax-calendario",
                type: "POST",
                data: serialize,
                success: function(response) {    
                    
                    if(response.msg == 'ok'){
                        $('#disponibilidad_overlay').modal('hide');
                        getApartamentosByArgs();
                    }else{
                        noty({
                            'type' : 'error',
                            'text' : response.data,
                            'layout' : 'top'
                        });
                    }
                }
            }); 
        }else{
            
        }
    });
}


function getApartamentosByPagination(){
    $('.contenedor-calendario').append(AJAX_MAIN);
    $.ajax({
        dataType: 'json',
        url: BASE_URL + '/admin-ajax-apartamento-calendario',
        type: 'POST',
        data: $('#apartamentosListForm').serialize(),
        success: function(response){
            if(response.msg == 'ok'){
                $('.contenedor-calendario').html(response.html);
                check_all();
            }
            IS_GETTING_APART = false;
        }
    });
}

function getApartamentosByArgs(){
    LAST_LOAD_APART = 20;
    $('#limitSearch').val(LAST_LOAD_APART);
    $('.contenedor-calendario').append(AJAX_MAIN);
    $.ajax({
        dataType: 'json',
        url: BASE_URL + '/admin-ajax-apartamento-calendario',
        type: 'POST',
        data: $('#apartamentosListForm').serialize(),
        success: function(response){
            if(response.msg == 'ok'){
                $('.contenedor-calendario').html(response.html);
                check_all();
            }
            IS_GETTING_APART = false;
        }
    });
}
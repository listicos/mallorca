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
    
    $('#disponibilidad_overlay select[name=estatus]').off('change').on('change', function(){
        if ($(this).val() == 'disponible') {
            $('input[name=precio]').removeClass('validate[custom[number]]');
            $('input[name=precio]').addClass('validate[required, custom[number]]');
            
        } else {
            $('input[name=precio]').removeClass('validate[required, custom[number]]');
            $('input[name=precio]').addClass('validate[custom[number]]');
        }
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
    
    $('#generar-cupon-btn').on('click', function(e){
        e.preventDefault();
        
        $.ajax({
            url: BASE_URL + '/admin-ajax-calendario',
            data: {action: 'generarCodigo'},
            type: 'post',
            dataType: 'json',
            success: function(response) {
                if(response.codigo) {
                    $('input[name=cuponPromocional]').val(response.codigo);
                }
            }
        })
    });
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
    
    $('#tarifas_modal_form input[name=precio], #tarifas_modal_form input[name=descuento]').off('change').on('change', function(e){
        calcularPrecioTarifa();
    })
    
    calcularPrecioTarifa();
    
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
                editarDia();
            }
            IS_GETTING_APART = false;
        }
    });
}

function calcularPrecioTarifa() {
    var precio = parseFloat($('#tarifas_modal_form input[name=precio]').val());
    var descuento = parseFloat($('#tarifas_modal_form input[name=descuento]').val());
    
    if(precio > 0 && descuento > 0) {
        $('#tarifas_modal_form input[name=precioFinal]').val(precio - (precio * descuento / 100));
    } else {
        $('#tarifas_modal_form input[name=precioFinal]').val($('#tarifas_modal_form input[name=precio]').val());
    }
    
    
}

function editarDia() {
    $('td.sin_registro, td.disponible', '#lista_disponibilidades tbody').off('click')
    .on('click', function(e){

        $('#disponibilidad_overlay').modal();
        
        if($(this).hasClass('sin_registro')) {
            $('#tarifas_modal_form select[name=estatus]').val('no disponible');
            
            $('input[name=precio]').removeClass('validate[required, custom[number]]');
            $('input[name=precio]').addClass('validate[custom[number]]');
            
        } else {
            $('#tarifas_modal_form select[name=estatus]').val('disponible');
            
            $('input[name=precio]').removeClass('validate[custom[number]]');
            $('input[name=precio]').addClass('validate[required, custom[number]]');            
        
            
            var precio = $(this).find('span.precio').html();
            
            while(precio[0] < "0" || precio[0] > "9") {
                precio = precio.replace(precio[0], "");
            }
            precio = parseFloat(precio);
            $('#disponibilidad_overlay input[name=precio]').val(precio);
            descuento = $(this).find('span.desc').html().replace("<br>Desc:", "").replace("%", "");
            
            descuento = parseFloat(descuento);
            $('#disponibilidad_overlay input[name=descuento]').val(descuento);
            
            $('#disponibilidad_overlay input[name=precioFinal]').val(precio - (precio * descuento / 100));
            
            $('#disponibilidad_overlay select[name=minimoNoches]').val($(this).attr('minimoNoches'));
            $('#disponibilidad_overlay input[name=precioPorConsumo]').val($(this).attr('precioPorConsumo'));
            $('#disponibilidad_overlay input[name=descuentoPorConsumo]').val($(this).attr('descuentoPorConsumo'));
            
            $('#disponibilidad_overlay input[name=cuponPromocional]').val($(this).attr('cuponPromocional'));
            $('#disponibilidad_overlay input[name=descuentoPorCupon]').val($(this).attr('descuentoPorCupon'));
        }
        
        var M = $('select[name=month]').val();
        var Y = $('select[name=year]').val();
        var D = parseInt($(this).attr('day')) + 1;
        if(D < 10) D = "0" + D;
        
        $('#date-start, #date-end').datepicker("setDate", new Date(Y + "-" + M + "-" + D));
        
        $('#tarifas_modal_form input[name=idApartamento]').val($(this).attr('apartamento-id'));
        
        
        
    })
}
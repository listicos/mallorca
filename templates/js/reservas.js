var MONTHS = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

$(document).ready(function() {

    $('.datepicker').datepicker({
        startDate: "today",
        autoclose: true
    });
     $('.flexslider').flexslider({
        animation: "fade"
      });

    $(".when-you-go-date").each(function(){
        
        fechas = eval($(this).find('input[name=fechasTarifas]').val());
        
        enables = [];
        tarifas = [];
        minDate = [Math.min(),''];
        for(f=0;f<fechas.length;f++) {
            if(!fechas[f] || fechas[f].length == 0)
                continue;
            fecha = fechas[f].split('->');
            tarifaId = fecha[1];
            fecha = fecha[0];
            fecha = fecha.split('/');
            fecha = fecha[2] + '-' + fecha[1] + '-' + fecha[0];
            fecha = new Date(fecha);
            fecha.setDate(new Date(fecha).getDate() + 1);
            fecha.setHours(0);
            
            time = fecha.getTime();
            enables.push(time);
            if(minDate[0] >= time) {
                minDate[0] = time;
                minDate[1] = fecha;
            }
            if(!tarifas[tarifaId])
                tarifas[tarifaId] = [];
            
            tarifas[tarifaId].push(time);
        }
        tarifasFechas = [];
        tarifasFechas['tarifas'] = tarifas;
        tarifasFechas['enableDates'] = enables;
        $(this).data(tarifasFechas);
        $(this).datepicker({
            beforeShowDay: function (date){
                
                enables = this.data['enableDates'];
                return enables.indexOf(date.getTime()) !== -1 ;
            },
            show: function(date){
                console.log(date)
            },
            data: tarifasFechas,
            startDate: minDate[1]
        }).on('changeDate', function(ev){
            console.log('changeDate'); 
           var y = ev.date.getFullYear(),
                _m = ev.date.getMonth() + 1,
                m = (_m > 9 ? _m : '0'+_m),
                _d = ev.date.getDate(),
                d = (_d);
            var when_you_go = d + " de " + MONTHS[_m - 1] + ", " + y;
            tarifas = $(this).data()['tarifas'];
            tarifa = null;
            for(var tarifaId in tarifas) {
                fechas = tarifas[tarifaId];
                if(fechas.indexOf(ev.date.getTime()) !== -1) {
                    tarifa = tarifaId;
                    break;
                }
            }
            $(this).find('input[name=fecha]').val(d + "/" + m + "/" + y);
            $(this).find('input[name=tarifaId]').val(tarifa);
            $(this).parent().parent().find(".set-when-you-go").html(when_you_go);
            $(this).parent().parent().find('.a-que-hora').show();
            $(this).parent().parent().find(".a-que-hora option[data-tarifa='" + tarifa + "']").show();
            $(this).parent().parent().find(".a-que-hora option:not([data-tarifa='" + tarifa + "'])").hide();
            
            if($(this).parent().parent().find(".a-que-hora option[data-tarifa='" + tarifa + "']").length == 0) {                
                $(this).parent().parent().find('.a-que-hora').hide();
            }
            
            $(this).parent().parent().find('.completa-datos').show();
            $(this).parent().parent().find(".que_hora").val($(this).parent().parent().find(".que_hora option[data-tarifa='" + tarifa + "']").val());
            
            _this = $(this).parent();
            while(!_this.hasClass('frmExcursion'))_this = _this.parent();
            _this.find('.tarifa_container').addClass('hidden').find('select').prop('disabled', true);
            _this.find('.tarifa_container[tarifa-id="' + tarifa + '"]').removeClass('hidden');
            if(_this.find('.tarifa_container[tarifa-id=' + tarifa + '] select:not(:disabled)').length == 0) {
                _this.find('.tarifa_container[tarifa-id=' + tarifa + '] input').first().click();
                selectTicket();
                if(_this.find('.tarifa_container[tarifa-id=' + tarifa + '] select:not(:disabled)').length == 0) {
                    _this.find('.tarifa_container[tarifa-id=' + tarifa + '] select').first().prop('disabled', false);
                    
                }
            }
            calcularTotal(_this);
            _this.find('.cupon-total-content').removeClass('hidden');
            
        });
        
        $(this).find('td.day:not(.disabled)').first().click();
    });
    
    setCurrentDate();

    $('.timepicker').timepicker();

    //$('#reservation_tabs').tab();
    $('#reservation_tabs a').click(function(e) {
        e.preventDefault()
        $(this).tab('show');
        
        if(!$('#data_step').is(':visible')){
            $('.continuar_container').show();
            
        }else{
            $('.continuar_container').hide();
            
        }
        console.log(this);
        if($(this).attr('href') == "#reservation_step") {
            $('.reservacion-list-content-main .alert.alert-success').show();
        } else {
            $('.reservacion-list-content-main .alert.alert-success').hide();
        }
    })

    $(".show-more-cars").click(function() {
        var table_content = $(".autos-table");
        var new_car = $(".extra-car").html();
        table_content.find("tbody.autos-tbody").append("<tr><td>" + new_car + "</td></tr>");
        select_a_car();
        return false;
    });

    $(".show-more-tours").click(function() {
        var table_content = $(".tours-table");
        var new_tour = $(".extra-tour").html();
        table_content.find("tbody.tours-tbody").append("<tr><td>" + new_tour + "</td></tr>");
        select_a_tour();
        return false;
    });

    $(".show_tour_details").click(function() {
        $(this).find(".caret").toggleClass("caret-inverse");
        $(this).parents(".table-tours-details").find(".tours-details-tr").toggleClass("hidden");
        return false;
    });

    $(".set-special-data").click(function() {
        $(this).toggleClass("closed");
        $(this).parents(".special-data-parent").find(".caret").toggleClass("caret-inverse");
        if ($(this).hasClass("closed"))
            $(this).parents(".special-data-parent").find(".special-data-content").slideUp('fast');
        else
            $(this).parents(".special-data-parent").find(".special-data-content").slideDown('fast');
        return false;
    });

    $(".add-other-tel").click(function() {
        $(this).toggleClass("closed");
        $(this).parents(".other-tel-parent").find(".caret").toggleClass("caret-inverse");
        if ($(this).hasClass("closed"))
            $(this).parents(".other-tel-parent").find(".other-tel-content").slideUp('fast');
        else
            $(this).parents(".other-tel-parent").find(".other-tel-content").slideDown('fast');
        return false;
    });

    $(".go-step-2").click(function() {
        $("#reservation_tabs .data_step a").trigger("click");
        $("body").scrollTop(0);
        $(this).hide();
        return false;
    });

    $(".go-step-3").click(function() {
        $("#reservation_tabs .pay_step a").trigger("click");
        $("body").scrollTop(0);
        return false;
    });

    $("input[name=un_pago_tipo]").change(function() {
        $(this).parents(".table.un-pago-table").find(".total-pago").hide();
        $(this).parents("tr").find(".total-pago").show();
    });

    $("input[name=forma_pago_btn]").change(function() {
        $(".for-2-pays").toggleClass("hidden");
    });
    
    $(".i_wanna_it").click(function(){
        $(".i_wanna_it").show();
        $(this).hide();
        $(".opinions-list, .tarifas-table-main").hide();
        _this = $(this).parent().parent().parent();
        _this.find(".tarifas-table-main").slideDown('fast');
        _this.find("td.day.active").click();
        
        _this.find('.cancel_this_booking').off('click').click(function(e){
            e.preventDefault();
            _this = $(this).parent();
            while(!_this.hasClass('panel-body'))_this = _this.parent();
            _this.find(".ver-opiniones").click();
        })
        
        return false;
    });
    
    $(".ver-opiniones").click(function(e){
        e.preventDefault();
        $(".i_wanna_it").show();
        $(".tarifas-table-main").hide();
        $('.opinions-list').slideDown('fast');
        return false;
    });

    $('#book_conditions, #privacy_policies').off('click').on('click', function(e){
        e.preventDefault();
        var id = $(this).attr('id');
        $('#' + id + '_modal').modal();
    });

    select_a_car();
    select_a_tour();
    follow_me_reservation();
    selectTicketsFunctions();
    calcularTotalExcursiones();
    
    reservarExcursion();
    eliminarExcursiones();
    
    validarCupon();
});
function selectTicketsFunctions() {
    if($('div.select-tickets').length > 0) {
        selectTicket();
        $('div.select-tickets input[type=radio]').change(selectTicket);
    }
}
function selectTicket() {
    /*if($('div.select-tickets input[type=radio]:checked').length == 0)
            $($('div.select-tickets input[type=radio]')[0]).prop('checked', true);*/
    $('.tarifa_container:not(.hidden) div.select-tickets input[type=radio]').each(function(){
        $(this).parent().parent().find('select').prop('disabled', !$(this).prop('checked'));
        if($(this).prop('checked')) {
            $(this).parent().parent().addClass('entrada-selected');
            precio = $(this).parent().parent().find('select').attr('precio');
            $(this).parent().parent().find('label.totalEntradas strong').html(moneyConverter(precio));
        } else {
            $(this).parent().parent().removeClass('entrada-selected');
        }
        $('select[name^="entradas"]:disabled').val(0);
        $('.tarifa_container:not(.entrada-selected) label.totalEntradas strong').html('')
        $('select[name^="entradas"]:not(:disabled)').val(1);
    });
}
function setCurrentDate(){
    var d = $("#when-you-go-date").datepicker('getDay'),
        m = $("#when-you-go-date").datepicker('getMonth'),
        y = $("#when-you-go-date").datepicker('getFullYear');
    var when_you_go = d + " de " + MONTHS[m - 1] + ", " + y;
    $("#set-when-you-go").html(when_you_go);
}
function follow_me_reservation() {

    var documentHeight = 0;
    var paddingTop = 60;
    var element = ".reservacion-list-content-main:visible";
    var offset = $(element).offset();
    var containerHeight = $(".main_content").height();

    $(window).scroll(function() {
        if ($(document).width() > 974) {
            containerHeight = $(".main_content").height();
            follow(containerHeight, paddingTop, element, offset);
        } else {
            $(element).stop().animate({
                marginTop: 0
            });
        }

    });

    $(window).resize(function() {
        if ($(document).width() > 974) {
            offset.top = 74;
        }
    });

    follow(containerHeight, paddingTop, element, offset);
}

function follow(containerHeight, paddingTop, element, offset) {

    documentHeight = $(document).height();
    var elementHeight = $(element).height();
    if ($(window).scrollTop() > offset.top) {
        var newPosition = ($(window).scrollTop() - offset.top) + paddingTop; //460
        var maxPosition = containerHeight - (elementHeight + 20); //878
        if (newPosition > maxPosition) {
            newPosition = maxPosition;
        }
        $(element).stop().animate({
            marginTop: newPosition
        });
    } else {
        $(element).stop().animate({
            marginTop: 0
        });
    }
    ;
}
function select_a_tour() {
    $(".select_tour_dates").click(function() {
        $(this).toggleClass("closed");
        $(this).parents("tr").find(".details-tour").toggleClass("hidden");
        toggleBtns($(this), "Seleccionar Fechas", "Cerrar");
        return false;
    });
}
function select_a_car() {
    $(".select_car").off().on("click", function() {
        $(this).toggleClass("closed");
        $(this).parents("tr").find(".selecting-car").toggleClass("hidden");
        toggleBtns($(this), "Seleccionar Auto", "Cerrar");
        return false;
    });
}
function toggleBtns(obj, openName, closeName) {
    if (obj.hasClass("closed")) {
        obj.removeClass("btn-warning");
        obj.addClass("btn-primary");
        obj.html(openName);
    } else {
        obj.removeClass("btn-primary");
        obj.addClass("btn-warning");
        obj.html(closeName);
    }
}

function calcularTotalExcursiones() {
    $('select[name^="entradas"], input[type=radio][name=ticket]').on('change', function(){
        _this = $(this);
        while(!_this.hasClass('tarifas-table')) _this = _this.parent();
        precio = 0;
        _this.find('select[name^="entradas"]:not(:disabled)').each(function(){
            precio += (parseFloat($(this).attr('precio')) * parseFloat($(this).val()));
        });
        
        if(parseFloat(_this.find('[name=xdec]').val()) > 0) {
            desc = parseFloat(_this.find('[name=xdec]').val());
            precio -= (precio * desc / 100);
        }
        
        _this.find('.subtotal-cell label.precio_total').html(moneyConverter(precio));
        _this.find('.subtotal-cell input[name=total]').val(precio);
        _this.find('.subtotal-cell input[name=total_format]').val(moneyConverter(precio));
    })
}

function calcularTotal(_this) {
    
        precio = 0;
        _this.find('select[name^="entradas"]:not(:disabled)').each(function(){
            precio += (parseFloat($(this).attr('precio')) * parseFloat($(this).val()));
        });
        
        if(parseFloat(_this.find('[name=xdec]').val()) > 0) {
            desc = parseFloat(_this.find('[name=xdec]').val());
            precio -= (precio * desc / 100);
        }
        
        _this.find('.subtotal-cell label.precio_total').html(moneyConverter(precio));
        _this.find('.subtotal-cell input[name=total]').val(precio);
        _this.find('.subtotal-cell input[name=total_format]').val(moneyConverter(precio));
}

function moneyConverter(cant) {
    var c = parseFloat(cant).toFixed(2);
    c = "€ " + ("" + c).replace(".", ",");
    return c;
}

function reservarExcursion() {
    $('form.frmExcursion').on('submit', function(e){
        e.preventDefault();
        data = $(this).serialize();
        $.ajax({
            url: BASE_URL + '/ajax-excursion',
            data: data,
            type: 'post',
            dataType: 'json',
            success: function(response) {
                if(response.msg == 'ok') {
                    newExc = $('#resumen-reserva-otros .hidden').clone();
                    newExc.find('.excursion-nombre').html(response.data.evento);
                    newExc.find('.excursion-fecha').html("Fecha: " + response.data.fecha + " " + ((response.data.hora && response.data.hora.length > 0)? response.data.hora : ""));
                    if(response.data.entradas.length > 0) {
                        for(i=0;i<response.data.entradas.length;i++) {
                            p = newExc.find('.entradas p').first().clone();
                            p.find('strong').html(response.data.entradas[i].descripcion);
                            newExc.find('.entradas').append(p);
                        }
                    }
                    newExc.find('.excursion-precio strong').html(response.data.total_format);
                    newExc.removeClass("hidden");
                    newExc.attr('id', response.data.id);
                    newExc.find('.eliminar-excursion a').on('click', function(ev) {
                        ev.preventDefault();
                        $.ajax({
                            url: BASE_URL + '/ajax-excursion',
                            data: {action:'eliminar', id:response.data.id, precio_apartamento: $('input[name="precio_apartamento"]').val()},
                            type: 'post',
                            dataType: 'json',
                            success: function(resp) {
                                if(resp.msg == 'ok') {
                                    $('#' + response.data.id).remove();
                                    $('#precio-total-label').html(resp.data);
                                }
                            }
                        })
                    })
                    $('#resumen-reserva-otros').append(newExc);
                    $('#precio-total-label').html(response.data.precioTotal);
                    
                    
                    
                }
            }
        });
    })
}

function validarCupon() {
    $('a.validar_cupon').click(function(e) {
        
        e.preventDefault();
        _this = $(this);
        while(!_this.hasClass('frmExcursion'))_this = _this.parent();
        var cupon = _this.find('input[name=cupon]').val();
        var tarifaId = _this.find('[name=tarifaId]').val();
        var sesion = _this.find('[name=sesion]').val();
        var fecha = _this.find('input[name=fecha]').val();
        if(cupon.trim().length > 0 && tarifaId.trim().length > 0 && fecha.trim().length > 0) {
            var data = { 
                codigo: cupon,
                tarifaId: tarifaId,
                sesion: sesion,
                fecha: fecha,
                action: 'validarCupon'
            };
            $.ajax({
                type: 'post',
                dataType: 'json',
                data: data,
                url : BASE_URL + '/ajax-excursion',
                success: function(response) {
                    if(response.result == 'ok') {
                        toastr.success('El código es válido');
                        _this.find('[name=xdec]').val(parseFloat(response.data.descuento));
                        calcularTotal(_this);
                    } else {
                        toastr.error('El código no es válido');
                        _this.find('[name=xdec]').val('');
                        calcularTotal(_this);
                    }
                }
            })
        }
    });
    $('[name=cupon]').change(function(){
        _this = $(this);
        while(!_this.hasClass('frmExcursion'))_this = _this.parent();
        _this.find('[name=xdec]').val('');
        calcularTotal(_this);
    })
}

function eliminarExcursiones() {
    $('.eliminar-excursion a').on('click', function(ev) {
            ev.preventDefault();
            excursionId = $(this).parent().parent().attr('id');
            $.ajax({
                url: BASE_URL + '/ajax-excursion',
                data: {action:'eliminar', id:excursionId, precio_apartamento: $('input[name="precio_apartamento"]').val()},
                type: 'post',
                dataType: 'json',
                success: function(resp) {
                    if(resp.msg == 'ok') {
                        $('#' + excursionId).remove();
                        $('#precio-total-label').html(resp.data);
                    }
                }
            });
        });
}

function cardValidation() {
    
    var cards = new Array();
    $('ul.cards li').each(function(){
        
        cards.push($(this).attr('card'));
    });
    
    if($('input[name=CardNumber]').length > 0) {
        $('input[name=CardNumber]').attr('valid-card', false);
        $('input[name=CardNumber]').validateCreditCard(function(ev){
                $(".cards li").addClass("off");
                $('input[name=CardNumber]').removeClass('validCreditCard');
                if(ev.card_type==null){
                        $('input[name=CardNumber]').attr('valid-card', false);
                        $('input[name=CardType]').val('');
                        return
                }
                $(".cards ." + ev.card_type.name).removeClass("off");
                $('input[name=CardType]').val($(".cards ." + ev.card_type.name).attr('title'));
                if(ev.length_valid && ev.luhn_valid) {                
                     $('input[name=CardNumber]').attr('valid-card', true).addClass('validCreditCard');
                     
                     return true;
                }
                return false;
        },
        {accept:cards}
        );
    }
    
}
$(initApartamento);

function initApartamento() {

    //tabs
    $('#tabs1 ul.nav.nav-tabs a').on('click', function(e) {
        e.preventDefault();
        if (!$(this).parent().hasClass('active')) {
            ant = $('ul.nav.nav-tabs li.active a').attr('href');
            $('ul.nav.nav-tabs li.active').removeClass('active');
            $(ant).hide();
            $(this).parent().addClass('active');
            $($(this).attr('href')).show();
            if ($(this).attr('href').replace('#', "") == 'mapaContainer' && !mapa) {
                initialize();
                mapa = true;
            }
            if ($(this).attr('href').replace('#', "") == 'calendarioContainer' && !calendar) {
                initCalendar();
                calendar = true;
            }
        }
    });

    FechasReserva();

    $('#reservaForm').on('submit', function(e) {
        e.preventDefault();
        _valid = $(this).validationEngine('validate');
        if (_valid) {
            data = $(this).serialize();
            $.ajax({
                url: BASE_URL + '/ajax-apartamento',
                data: data + '&action=reservar',
                type: 'post',
                dataType: 'json',
                success: function(response) {
                    if (response.msg == 'ok') {
                        window.location = BASE_URL + '/reservas/id:' + $('input[name=idApartamento]').val();
                    }
                }
            })
        }
    });

    $('.flexslider').flexslider({
        animation: "fade",
        controlNav: "thumbnails",
        start: function(slider) {

        }
    });

    $('#make_a_question').off('click').on('click', function(e){
        $('#make_question_modal').modal();
        e.preventDefault();
    });

    $('#make-question-form').submit(function(e) {
        e.preventDefault();
        valid = $(this).validationEngine('validate');
        if(valid) {
            data = $(this).serialize();
            $.ajax({
                url: BASE_URL + '/ajax-pregunta',
                data: data,
                type: 'post',
                dataType: 'json',
                success: function(response) {
                    if(response.msg == 'ok') {
                        toastr.success(response.data);
                        $('#make_question_modal').modal('hide');
                        $('#make-question-form')[0].reset();
                    } else {
                        toastr.error(response.data);
                    }
                }
            })
        }
    });
}

var mapa, calendar;

function initialize() {
    var myLatlng = new google.maps.LatLng($('input[name=lat]').val(), $('input[name=lon]').val());
    var mapOptions = {
        zoom: 15,
        'scrollwheel': false,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        center: myLatlng
    }
    map = new google.maps.Map(document.getElementById('mapa'), mapOptions);
    var marker = new google.maps.Marker({
        position: myLatlng,
        map: map
    });

    google.maps.event.trigger(map, 'resize');
    map.setCenter(myLatlng);
}

function initCalendar() {
    $('#calendar').fullCalendar( 'destroy');
    $('#calendar').fullCalendar({
        header: {
            left: 'title',
            right: 'prev,next,month'
        },
        firstDay: 1,
        slotMinutes: 15,
        editable: false,
        droppable: false,

        events: {
            dataType: "json",
             url: BASE_URL + "/ajax-calendario",
             type: "POST",
             cache: true,
             data: {
                 idApartamento: $('input[name=idApartamento]').val(),
                 action: 'getTarifas'
             },
             beforeSend: function(){
                
            },
            complete: function(){
              
            }
        }
    });

    setTimeout(function(){
        $('#calendar').fullCalendar('render');    
    },800);
    /*$.ajax({
        dataType: "json",
        url: BASE_URL + "/ajax-calendario",
        type: "POST",
        data: {
            idApartamento: $('input[name=idApartamento]').val(),
            action: 'getTarifas'
        },
        success: function(response) {
            if (response.msg == 'ok') {
                var _tarifas = response.tarifas
                if (_tarifas.length > 0) {
                    var tarifas_array = [];
                    for (var i = 0; i < _tarifas.length; i++) {
                        var tarifa_temp;
                        var price = _tarifas[i].precio ? _tarifas[i].precio + "€" : " 0,00€";
                        bckcolor = App.getLayoutColorCode('green');
                        if (_tarifas[i].estatus == 'no disponible')
                            bckcolor = App.getLayoutColorCode('red');
                        tarifa_temp = {'title': price, 'start': _tarifas[i].fechaInicio, 'end': _tarifas[i].fechaFinal, 'backgroundColor': bckcolor};
                        

                        tarifas_array.push(tarifa_temp)
                    }
                    setTarifasToCalendar(tarifas_array);
                } else {
                    setTarifasToCalendar();
                }
            } else {
                setTarifasToCalendar();
            }
        }
    });*/
}


function setTarifasToCalendar(tarifas) {
    h = {
        left: 'title',
        center: '',
        right: 'prev,next,month'
    }
    $('#calendar').removeClass("mobile");
    $('#calendar').fullCalendar('destroy');
    if (tarifas) {
        console.log('tarifas');
        $('#calendar').fullCalendar({
            header: h,
            firstDay: 1,
            slotMinutes: 15,
            editable: false,
            droppable: false,
            events: tarifas
        });
    } else {
        console.log('no tarifas');
        $('#calendar').fullCalendar({
            header: h,
            slotMinutes: 15,
            editable: false,
            droppable: false,
            events: []
        });
    }
}

function FechasReserva() {
    /*
    for (i = 0; i < FECHAS_DISPONIBLES.length; i++)
        FECHAS_DISPONIBLES[i] = new Date(FECHAS_DISPONIBLES[i]).getTime();
    */
    var date_now = new Date(new Date().setDate(new Date().getDate() - 1));
    $('#fechaInicio').datepicker({
        format: "dd-mm-yyyy",
        autoclose: true
    }).on('changeDate', function(ev) {
        f = $('#fechaInicio').val().split('-');
        f = f[2] + '-' + f[1] + '-' + f[0];
        minDays = 1;
        for(i=0;i<FECHAS_DISPONIBLES.length;i++) {
            if(FECHAS_DISPONIBLES[i].fechaInicio.replace(' 00:00:00', '') == f) {
                if(FECHAS_DISPONIBLES[i].minimoNoches) minDays = parseInt(FECHAS_DISPONIBLES[i].minimoNoches);
                break;
            }
        }
        d = new Date(new Date(ev.date).setDate(new Date(ev.date).getDate() + minDays));
        console.log(minDays, d);
        $('#fechaFinal').datepicker('setStartDate', d);
        $('#fechaFinal').datepicker('show');
    });

    $('#fechaInicio').datepicker('setStartDate', date_now);


    $('#fechaFinal').datepicker({
        format: "dd-mm-yyyy",
        autoclose: true
    }).on('changeDate', function(ev) {
        //$('#fechaInicio').datepicker('setEndDate', new Date(new Date().setDate(new Date(ev.date).getDate())));

    });
    $('#fechaFinal').datepicker('setStartDate', new Date(new Date().setDate(new Date().getDate())));

    if ($('#fechaInicio').val() != "") {
        fecha = $('#fechaInicio').val().split("-");
        date = new Date();
        date.setFullYear(fecha[2]);
        date.setMonth(fecha[1]);
        date.setDate(fecha[0]);
        $('#fechaFinal').datepicker('setStartDate', new Date(new Date().setDate(new Date(date).getDate())));
    }
    if ($('#fechaFinal').val() != "") {
        fecha = $('#fechaFinal').val().split("-");
        date = new Date();
        date.setFullYear(fecha[2]);
        date.setMonth(fecha[1]);
        date.setDate(fecha[0]);
        //$('#fechaInicio').datepicker('setEndDate', new Date(new Date().setDate(new Date(date).getDate() - 1)));
    }

    $('#fechaInicio, #fechaFinal, select[name=huespedes]').on('change', function() {
        calcularTotal();
        checkForTotaltext();
    });

    checkForTotaltext();
}

function calcularTotal() {
    data = $('#reservaForm').serialize();
    $.ajax({
        url: BASE_URL + '/ajax-apartamento',
        data: data + "&action=getPrecio",
        type: 'post',
        dataType: 'json',
        success: function(response) {
            $('#reservaForm .precio span').html(response.total_text);
            if(!response.disponible) {
                $('.button-reservalo').addClass('hidden');
                $('.button-solicitalo').removeClass('hidden');
            } else {
                $('.button-reservalo').removeClass('hidden');
                $('.button-solicitalo').addClass('hidden');
            }
        }
    });
}
function checkForTotaltext(){
    if ($('#fechaInicio').val() != "" || $('#fechaFinal').val() != ""){
        $('.desde-precio-reserva').hide();
        $('.total-precio-reserva').show();
    }else{
        $('.total-precio-reserva').hide();
        $('.desde-precio-reserva').show();
    }
}

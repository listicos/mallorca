$(initApartamento);

function initApartamento() {
    
    //tabs
    $('#tabs1 ul.nav.nav-tabs a').on('click', function(e){
        e.preventDefault();
        if(!$(this).parent().hasClass('active')) {
            ant = $('ul.nav.nav-tabs li.active a').attr('href');
            console.log(ant);
            $('ul.nav.nav-tabs li.active').removeClass('active');
            $(ant).hide();
            $(this).parent().addClass('active');
            $($(this).attr('href')).show();
            if($(this).attr('href').replace('#', "") == 'mapaContainer' && !mapa) {
                initialize();
                mapa = true;
            }
            if($(this).attr('href').replace('#', "") == 'calendarioContainer' && !calendar) {
                initCalendar();
                calendar = true;
            }
        }
    });
    
    FechasReserva();
    
    $('#reservaForm').on('submit', function(e){
        e.preventDefault();
        _valid = $(this).validationEngine('validate');
        if(_valid) {
            data = $(this).serialize();
            $.ajax({
                url: BASE_URL + '/ajax-apartamento',
                data: data + '&action=reservar',
                type: 'post',
                dataType: 'json',
                success: function(response) {
                    if(response.msg == 'ok') {
                        window.location = BASE_URL + '/reservas/id:' + $('input[name=idApartamento]').val();
                    }
                }
            })
        }
    })
    
    
}

var mapa, calendar;

function initialize() {
    var myLatlng = new google.maps.LatLng($('input[name=lat]').val(), $('input[name=lon]').val());
    var mapOptions = {
        zoom: 15,
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
    $.ajax({
       dataType: "json",
        url: BASE_URL + "/ajax-calendario",
        type: "POST",
        data: {
            idApartamento: $('input[name=idApartamento]').val(),
            action: 'getTarifas'
        },
        success: function(response) {
            if(response.msg == 'ok'){
                var _tarifas = response.tarifas
                if(_tarifas.length > 0){
                    var tarifas_array = [];
                    for(var i=0;i < _tarifas.length;i++){
                        var tarifa_temp;
                        var price = _tarifas[i].precio ? _tarifas[i].precio+"€" : " 0,00€";

                        if(_tarifas[i].estatus == 'disponible')
                            tarifa_temp = {'title': price, 'start': _tarifas[i].fechaInicio, 'end': _tarifas[i].fechaFinal, 'backgroundColor': App.getLayoutColorCode('green')};
                        else
                            tarifa_temp = {'title': price, 'start': _tarifas[i].fechaInicio, 'end': _tarifas[i].fechaFinal, 'backgroundColor': App.getLayoutColorCode('red')};

                        tarifas_array.push(tarifa_temp)
                    }
                    setTarifasToCalendar(tarifas_array);
                }else{
                    setTarifasToCalendar();
                }
            }else{
                setTarifasToCalendar();
            }
        }
    })
}


function setTarifasToCalendar(tarifas){
    h = {
        left: 'title',
        center: '',
        right: 'prev,next,month'
    }
    $('#calendar').removeClass("mobile");
    $('#calendar').fullCalendar('destroy');
    if(tarifas){
        console.log('tarifas');
        $('#calendar').fullCalendar({
            header: h,
            firstDay: 1,
            slotMinutes: 15,
            editable: false,
            droppable: false,
            events: tarifas
        });
    }else{
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
    
    for(i=0;i<FECHAS_DISPONIBLES.length;i++)
        FECHAS_DISPONIBLES[i] = new Date(FECHAS_DISPONIBLES[i]).getTime();
    
    var date_now = new Date(new Date().setDate(new Date().getDate()-2));
    $('#fechaInicio').datepicker({
        format: "dd-mm-yyyy",     
        autoclose: true,
        beforeShowDay: function (date){
            return FECHAS_DISPONIBLES.indexOf(date.getTime()) !== -1 ;
        },
        enableDates: FECHAS_DISPONIBLES
    }).on('changeDate', function(ev) {
        $('#fechaFinal').datepicker('setStartDate', ev.date);
        $('#fechaFinal').datepicker('show');
    });

    $('#fechaInicio').datepicker('setStartDate', date_now);

    $('#fechaFinal').datepicker({
        format: "dd-mm-yyyy",
        autoclose: true,
        beforeShowDay: function (date){
            return FECHAS_DISPONIBLES.indexOf(date.getTime()) !== -1 ;
        },
        enableDates: FECHAS_DISPONIBLES
    });

    $('#fechaInicio, #fechaFinal, select[name=huespedes]').on('change',function(){
      calcularTotal();  
    });

    $('#fechaFinal').datepicker('setStartDate', date_now);
}

function calcularTotal() {
    data = $('#reservaForm').serialize();
    $.ajax({
        url: BASE_URL + '/ajax-apartamento',
        data: data + "&action=getPrecio",
        type: 'post',
        dataType: 'json',
        success: function(response) {
            $('#reservaForm .precio h1').html(response.total_text);
        }
    });
}


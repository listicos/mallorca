$(initComplejo);

function initComplejo() {
    $('.flexslider').flexslider({
        animation: "fade",
        controlNav: "thumbnails",
        start: function(slider) {

        }
    });
    
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
}

var mapa, calendar = false;

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

mes = new Date().getMonth() + 1;
function initCalendar() {
    
    if(!calendar) {
        calendar = true;
        $.ajax({
            url: BASE_URL + '/ajax-calendario',
            data: {action:'tarifasByComplejo', idComplejo:$('input[name=idComplejo]').val(), mes:mes},
            type:'post',
            dataType:'json',
            success:function(response){
                $('#calendar').html(response.data);
                verTarifas();
            }
        })
    }
}

function verTarifas() {
    $('#tarifaMes, #tarifaAnio').off().on('change', function(){
        idComplejo = $('#tarifaComplejoId').val();
        mes = $('#tarifaMes').val();
        anio = $('#tarifaAnio').val();
        
        $('#blocker').fadeIn();
        $.ajax({
            url: BASE_URL + '/ajax-calendario',
            data: {action:'tarifasByComplejo', idComplejo:idComplejo, mes:mes, anio: anio},
            type:'post',
            dataType:'json',
            success:function(response){
                $('#blocker').fadeOut();
                $('#calendar').html(response.data);
                verTarifas();
            }
        });
    });
}


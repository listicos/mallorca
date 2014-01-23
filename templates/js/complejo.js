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


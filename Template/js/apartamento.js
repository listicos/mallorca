$(initApartamento);

function initApartamento() {
    
    //tabs
    $('ul.nav.nav-tabs a').on('click', function(e){
        e.preventDefault();
        if(!$(this).parent().hasClass('active')) {
            ant = $('ul.nav.nav-tabs li.active a').attr('href');
            console.log(ant);
            $('ul.nav.nav-tabs li.active').removeClass('active');
            $(ant).hide();
            $(this).parent().addClass('active');
            $($(this).attr('href')).show();
        }
    });
    
    initialize();
}

function initialize() {
    myLatlng = new google.maps.LatLng($('input[name=lat]').val(), $('input[name=lon]').val());
    var mapOptions = {
        zoom: 15,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        center: myLatlng
    }
    map = new google.maps.Map(document.getElementById('mapa'), mapOptions);
    google.maps.event.trigger(map, 'resize');
}
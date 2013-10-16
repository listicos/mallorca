var map;
var myLatlng = new google.maps.LatLng(RESERVA_LAT,RESERVA_LON);

function initialize() {
  
    var mapOptions = {
        zoom: 16,
        center: myLatlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    map = new google.maps.Map(document.getElementById('reservacion_mapa'), mapOptions);

    var marker = new google.maps.Marker({
        position: myLatlng,
        map: map
    });
}

$(document).ready(function(){
    
    initialize();
    google.maps.event.trigger(map, 'resize');
    map.setCenter(myLatlng);
    
});


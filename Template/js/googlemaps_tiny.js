var lat = 40.4113554;
var lon = -3.7028359;
var map, MAPO;

function initialize() {
    var mapOptions_big = {
        zoom: 14,
        center: new google.maps.LatLng(lat, lon),
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        mapTypeControl: true,
        mapTypeControlOptions: {
            style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
            position: google.maps.ControlPosition.BOTTOM_CENTER
        },
        panControl: true,
        panControlOptions: {
            position: google.maps.ControlPosition.TOP_RIGHT
        },
        scaleControl: true,
        scaleControlOptions: {
            position: google.maps.ControlPosition.TOP_LEFT
        },
        streetViewControl: true,
        streetViewControlOptions: {
            position: google.maps.ControlPosition.LEFT_TOP
        }
    };
    var mapOptions_small = {
        zoom: 16,
        center: new google.maps.LatLng(lat, lon),
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        mapTypeControl: false,
        panControl: false,
        scaleControl: false,
        streetViewControl: false,
        zoomControl: false,
        draggable: false
    };

    map = new google.maps.Map(document.getElementById('map_canvas'),
        mapOptions_small);
    MAPO = new google.maps.Map(document.getElementById('google_map_overlay'),
        mapOptions_big);

}

google.maps.event.addDomListener(window, 'load', initialize);
$(document).ready(function(){
    
    if(LATITUDE && LONGITUDE){
        lat = LATITUDE
        lon = LONGITUDE
    }
    
    //VIEW_APARTAMENT_MAP.setCenter(new google.maps.LatLng(lat, lon));
    
    $('.mapa_trigger').colorbox({
        inline: true,
        onComplete: function() {
            google.maps.event.trigger(MAPO, "resize");
            MAPO.setCenter(new google.maps.LatLng(lat, lon));
        }
    });


      
});
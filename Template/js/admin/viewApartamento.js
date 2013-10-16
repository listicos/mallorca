//var lat = 40.4113554;
//var lon = -3.7028359;
var lat = LATITUDE;
var lon = LONGITUDE;
var VIEW_APARTAMENT_MAP;

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

$(document).ready(function(){
    
    $('#view-apartamento-tabs a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    });
    
    $('#view-apartamento-gallery').carousel({
        interval: 10000
    });

    VIEW_APARTAMENT_MAP = new google.maps.Map(document.getElementById('view_apartament_map'),
        mapOptions_big);
    //google.maps.event.trigger(VIEW_APARTAMENT_MAP, "resize");    
    VIEW_APARTAMENT_MAP.setCenter(new google.maps.LatLng(lat, lon));


});



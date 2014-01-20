var map;
var marcadores = [];
function initialize() {
    var mapOptions = {
        zoom: 15,
        'scrollwheel': false,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    map = new google.maps.Map(document.getElementById('details-map-location'), mapOptions);
}
$(document).ready(function (argument) {
	initialize();
	var latlngbounds = new google.maps.LatLngBounds();
	$('.complejos_list .complejo_item').each(function() {
		var lat = $(this).find('input[name=lat]').val();
        var lon = $(this).find('input[name=lon]').val();
        var nombre = $(this).find('input[name=nombre]').val();
        
        var icon = '/templates/img/map_icons/condominium.png';
       
        var parliament = new google.maps.LatLng(lat, lon);
        latlngbounds.extend(parliament);

        var marker = new google.maps.Marker({
            title: nombre,
            position: parliament,
            map: map,
            icon: BASE_URL + icon
        });

        marcadores.push(marker);

        map.setCenter(latlngbounds.getCenter());
	    map.fitBounds(latlngbounds);

	});
	$('.flexslider').flexslider({
        animation: "fade",
        controlNav: "thumbnails"
    });
});
var lat = 40.4113554;
var lon = -3.7028359;
var map;
function initialize() {
    var mapOptions_small = {
        zoom: 10,
        center: new google.maps.LatLng(lat, lon),
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        mapTypeControl: false,
        panControl: false,
        scaleControl: false,
        streetViewControl: false,
        zoomControl: true,
        draggable: true
    };

    map = new google.maps.Map(document.getElementById('map_canvas'),
            mapOptions_small);

    var coords_array = eval(coords);

	if(coords_array){
		var latlngbounds = new google.maps.LatLngBounds();
		$(coords_array).each(function(){
			var parliament = new google.maps.LatLng(this.lat, this.lon);
			latlngbounds.extend(parliament);

			var marker = new google.maps.Marker({
			    map:map,
			    animation: google.maps.Animation.DROP,
			    position: parliament
			  });
			var apartamento_id = this.id;
			google.maps.event.addListener(marker, 'click', function () { 
        		window.location.href = BASE_URL+'/apartamento/id:'+apartamento_id;
    		});

    
		});

		map.setCenter(latlngbounds.getCenter());
		map.fitBounds(latlngbounds); 
	}

}

google.maps.event.addDomListener(window, 'load', initialize);

$(document).ready(function(){
    $('#submit_location').click(function(){
        $(this).parents('form').submit();
    });
    $('#buscar_form input,#buscar_form select').change(function(){
        $(this).parents('form').submit();
    });
    /*$('.mapa_trigger').colorbox({
        inline: true,
        onComplete: function() {
            google.maps.event.trigger(map, "resize");
            
        }
    });*/   
});
$(initConfig);

function initConfig() {
    
    $('#configuracion_form').submit(function(e){
        e.preventDefault();
        data = $(this).serialize();
        $.ajax({
            url: BASE_URL + '/admin-ajax-configuracion',
            data: data,
            type: 'post',
            dataType: 'json',
            success: function(response) {
                if(response.msg == 'ok') {
                    noty({
                        'type': 'success',
                        "text":response.data,
                        "layout":"top",
                      });
                } else {
                    noty({
                        'type': 'error',
                        "text":response.data,
                        "layout":"top",
                      });
                }
            }
        });
    });
    
    initMap();
}

function initMap() {
    $("#geocomplete").geocomplete({
        map: ".map_canvas",
        details: ".formulario_localizacion ",
        markerOptions: {
            draggable: true
        }
    });
    lat = $("input[name=lat]").val().trim();
    lon = $("input[name=lon]").val().trim();
    
    if(lat.length == 0 || lon.length == 0) {
        lat = 40.4113554;
        lon = -3.7028359;
    }
    var map = $("#geocomplete").geocomplete("map");
    google.maps.event.trigger(map, "resize");
    window.setTimeout(function() {
        map.setCenter(new google.maps.LatLng(lat, lon));
        $("#geocomplete").geocomplete('find', lat + ', ' + lon);
    }, 20);
    
    $("#geocomplete").on("geocode:dragged", function(event, latLng) {
        $("input[name=lat]").val(latLng.lat());
        $("input[name=lon]").val(latLng.lng());
    });
}



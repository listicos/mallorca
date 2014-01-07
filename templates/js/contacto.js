$(initContacto);

function initContacto() {
    
    $('#contactoForm').submit(function(e) {
        e.preventDefault();
        valid = $(this).validationEngine('validate');
        if(valid) {
            data = $(this).serialize();
            $.ajax({
                url: BASE_URL + '/ajax-contacto',
                data: data,
                type: 'post',
                dataType: 'json',
                success: function(response) {
                    if(response.msg == 'ok') {
                        toastr.success(response.data);
                        $('#contactoForm')[0].reset();
                    } else {
                        toastr.error(response.data);
                    }
                }
            })
        }
    });
    
    $('#suscripcionForm').submit(function(e) {
        e.preventDefault();
        valid = $(this).validationEngine('validate');
        if(valid) {
            data = $(this).serialize();
            $.ajax({
                url: BASE_URL + '/ajax-suscribir',
                data: data,
                type: 'post',
                dataType: 'json',
                success: function(response) {
                    if(response.msg == 'ok') {
                        toastr.success(response.data);
                        $('#suscripcionForm')[0].reset();
                    } else {
                        toastr.error(response.data);
                    }
                }
            })
        }
    });
    
    initMapa();
}

function initMapa() {
    
    
    if(lat.trim().length == 0) {
        lat = 40.4152686092685;
    }
    
    if(lon.trim().length == 0) {
        lon = -3.690415421612556;
    }
    pos = new google.maps.LatLng(lat, lon);
    var mapOptions = {
        zoom: 15,
        'scrollwheel': false,
        mapTypeId: google.maps.MapTypeId.ROADMAP
        
    }
    map = new google.maps.Map(document.getElementById('container-mapa'), mapOptions);
    google.maps.event.trigger(map, 'resize');
    var marker = new google.maps.Marker({
        position: pos,
        map: map
    });
    map.setCenter(pos);
}



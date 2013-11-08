var map;
//var myLatlng = new google.maps.LatLng("40.4216737855101","-3.7001175433777");
var marcadores = [];
function initialize() {
    var mapOptions = {
        zoom: 15,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    map = new google.maps.Map(document.getElementById('details-map-location'), mapOptions);
    
    
    google.maps.event.addListener(map, 'bounds_changed', function() {
        
        filtrarPorMapaAndPrecio();
        
    });
}

$(document).ready(function(){
    
    $('.selectpicker').selectpicker();
    
    $('.carousel').carousel({
        interval: 5000
    });
    
    ordenar();
    actualizarMapa();
    
    $('.date-start').datepicker({
        autoclose: true
    }).on('changeDate', function(ev) {
        $('.date-end').datepicker('setStartDate', ev.date);
    });

    $('.date-start').datepicker('setStartDate', new Date());

    $('.date-end').datepicker({
        autoclose: true
    }).on('changeDate', function(ev) {

        });

    $('.date-end').datepicker('setStartDate', new Date());
    
    $( "#slider-range" ).slider({
        range: true,
        min: minPrice,
        max: maxPrice,
        values: [ minPrice, maxPrice ],
        slide: function( event, ui ) {
            $( "#amount-min" ).html( "$" + ui.values[ 0 ] );
            $( "#amount-max" ).html( " $" + ui.values[ 1 ] );
        },
        change: function(event, ui) {
            
            filtrarPorMapaAndPrecio();
            
            contarAnuncios();
        }
    });
    $( "#amount-min" ).html( "$" + $( "#slider-range" ).slider( "values", 0 ));
    $( "#amount-max" ).html("  $" + $( "#slider-range" ).slider( "values", 1 ) );
    
    $(".add-to-wishlist").click(function(){
        $(this).toggleClass("active");
        return false;
    });
    
    filtrar();
    
    contarAnuncios();
    
    
    
});

function filtrarPorMapaAndPrecio() {
    
    bounds = map.getBounds();
    prices = $( "#slider-range" ).slider('values');
    i=0;
    $('.result-list-container .result-item').each(function(){
        var precio = $(this).find('input[name=precio]').val();
        if(precio < prices[0] || precio > prices[1]) {
            $(this).parent().hide();
            if(marcadores[i])
            marcadores[i].setMap(null);
        } else {
            var nombre = $(this).find('input[name=nombre]').val();
            var lat = $(this).find('input[name=lat]').val();
            var lon = $(this).find('input[name=lon]').val();
            if(marcadores[i])
            marcadores[i].setMap(map);
            position = new google.maps.LatLng(lat, lon);
            
            if (bounds.contains(position)) {
                $(this).parent().show();
            } else {
                $(this).parent().hide();
            }
            
        }

        i++;
    })
    
    
}

function filtrar() {
    $('input[name=dateStart], input[name=dateEnd], select[name=huespedes]').on('change', function(e){
        
        //var valid = $(this).validationEngine('validate');
        if(true) {
            var form = $('#aptosForm').serialize();
            $.ajax({
                url : BASE_URL + '/ajax-filtros',
                data : form,
                type: 'post',
                dataType : 'json',
                success: function(response) {
                    $('.result-list-container').html(response.html);
                    $('.result-list-container').find('.carousel').carousel({
                        interval: 5000
                    });
                    
                    var prices = [9999999999, max = -9999999999];
                    
                    $('.result-list-container').find('input[name=precio]').each(function(){
                        var value = parseFloat($(this).val());
                        console.log(value);
                        if(prices[0] > value) prices[0] = value;
                        if(prices[1] < value) prices[1] = value;
                        console.log(prices);
                    });
                    
                    
                    
                    $( "#slider-range" ).slider( "option", "values", prices );
                    $( "#amount-min" ).html( "$" + $( "#slider-range" ).slider( "values", 0 ));
                    $( "#amount-max" ).html("  $" + $( "#slider-range" ).slider( "values", 1 ) );
                    
                    ordenar();
                    
                    contarAnuncios();
                    
                    actualizarMapa();
                    
                    
                    
                }
            });
        }
    });
}

function contarAnuncios() {
    $('.more-filters span.badge').html($('.result-list-container .result-item:not(:hidden)').length + " anuncios");
}

function actualizarMapa() {
    
    var myLatlng;
    
    
    
    if(!map) {
        initialize();
        google.maps.event.trigger(map, 'resize');
        
    } else {
        console.log(marcadores);
        for(i=0;i<marcadores.length; i++) {
            console.log(i);
            if(marcadores[i])
            marcadores[i].setMap(null);
        }
        marcadores = [];
    }
    
    var latlngbounds = new google.maps.LatLngBounds();
    $('.result-list-container .result-item:not(:hidden)').each(function(){
        var nombre = $(this).find('input[name=nombre]').val();
        var lat = $(this).find('input[name=lat]').val();
        var lon = $(this).find('input[name=lon]').val();
        var parliament = new google.maps.LatLng(lat, lon);
	latlngbounds.extend(parliament);
        var marker = new google.maps.Marker({
            title: nombre,
            position: parliament,
            map: map
        });
        
        marcadores.push(marker);
        
        
    });
    
    map.setCenter(latlngbounds.getCenter());
    map.fitBounds(latlngbounds);
}

function ordenar() {
    $('#resultados').mixitup();
    
    $('#sorter').on('change', function(){
        filter = eval($(this).val());
        console.log(filter);
        $('#resultados').mixitup('sort',filter);
    })
    
    filter = eval($('#sorter').val());    
    $('#resultados').mixitup('sort',filter);
}




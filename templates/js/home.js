var map;
//var myLatlng = new google.maps.LatLng("40.4216737855101","-3.7001175433777");
var marcadores = new Array();/*
function initialize() {
    var mapOptions = {
        zoom: 15,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    map = new google.maps.Map(document.getElementById('details-map-location'), mapOptions);
    
    
    google.maps.event.addListener(map, 'bounds_changed', function() {
        
        filtrarPorMapaAndPrecio();
        
    });
}*/

$(document).ready(function(){
    
    $('.selectpicker').selectpicker();
    
    $('.carousel').carousel({
        interval: 5000
    });
    
    
    //actualizarMapa();
    
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
    /*
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
    });*/
    
    filtrar();
    
    //contarAnuncios();
    
    carruselVisitados();
});
/*
function filtrarPorMapaAndPrecio() {
    
    bounds = map.getBounds();
    prices = $( "#slider-range" ).slider('values');
    i=0;
    $('.result-list-container .result-item').each(function(){
        var precio = $(this).find('input[name=precio]').val();
        if(precio < prices[0] || precio > prices[1]) {
            $(this).hide();
            marcadores[i].setMap(null);
        } else {
            var nombre = $(this).find('input[name=nombre]').val();
            var lat = $(this).find('input[name=lat]').val();
            var lon = $(this).find('input[name=lon]').val();
            marcadores[i].setMap(map);
            position = new google.maps.LatLng(lat, lon);
            
            if (bounds.contains(position)) {
                $(this).show();
            } else {
                $(this).hide();
            }
            
        }

        i++;
    })
    
    
}*/

function filtrar() {
    $('#main_filters_container form').on('submit', function(e){
        e.preventDefault();
        //var valid = $(this).validationEngine('validate');
        if(true) {
            var form = $(this).serialize();
            $.ajax({
                url : BASE_URL + '/ajax-filtros',
                data : form,
                type: 'post',
                dataType : 'json',
                success: function(response) {
                    /*$('.result-list-container').html(response.html);
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
                    
                    
                    contarAnuncios();
                    
                    actualizarMapa();*/
                    
                    if(response.msg == 'ok')
                        window.location = BASE_URL + '/buscar'
                    
                }
            });
        }
    });
}
/*
function contarAnuncios() {
    $('.more-filters span.badge').html($('.result-list-container .result-item:not(:hidden)').length + " anuncios");
}

function actualizarMapa() {
    
    var myLatlng;
    
    
    
    if(!map) {
        initialize();
        google.maps.event.trigger(map, 'resize');
        
    } else {
        for(i=0;i<marcadores.length; i++)
            marcadores[i].setMap(null);
        marcadores = new Array();
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
}*/

function carruselVisitados(){
    $('#visitados').movingBoxes({
		startPanel   : 2,      // start with this panel
		/*width        : 1024,*/    // overall width of movingBoxes (not including navigation arrows)
		panelWidth   : .45,     // current panel width adjusted to 70% of overall width
		buildNav     : false
	});
}


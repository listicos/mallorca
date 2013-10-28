var map;
//var myLatlng = new google.maps.LatLng("40.4216737855101","-3.7001175433777");
var marcadores = new Array();
function initialize() {
    var mapOptions = {
        zoom: 15,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    map = new google.maps.Map(document.getElementById('details-map-location'), mapOptions);
    /*
    var marker = new google.maps.Marker({
        position: myLatlng,
        map: map
    });*/
}

$(document).ready(function(){
    
    $('.selectpicker').selectpicker();
    
    $('.carousel').carousel({
        interval: 5000
    });
    
    
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
        min: 0,
        max: 500,
        values: [ 75, 300 ],
        slide: function( event, ui ) {
            $( "#amount-min" ).html( "$" + ui.values[ 0 ] );
            $( "#amount-max" ).html( " $" + ui.values[ 1 ] );
        },
        change: function(event, ui) {
            
            console.log(ui.values);
            $('.result-list-container .result-item').each(function(){
                var precio = $(this).find('input[name=precio]').val() ;
                if(precio >= ui.values[0] && precio <= ui.values[1])
                    $(this).show()
                else $(this).hide();
                
                
            })
            
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
        for(i=0;i<marcadores.length; i++)
            marcadores[i].setMap(null);
        marcadores = new Array();
    }
    
    $('.result-list-container .result-item:not(:hidden)').each(function(){
        var nombre = $(this).find('input[name=nombre]').val();
        var lat = $(this).find('input[name=lat]').val();
        var lon = $(this).find('input[name=lon]').val();
        
        var marker = new google.maps.Marker({
            title: nombre,
            position: new google.maps.LatLng(lat, lon),
            map: map
        });
        
        marcadores.push(marker);
        
        if(!myLatlng) {
            myLatlon = new google.maps.LatLng(lat, lon);
        }
    });
    
    map.setCenter(myLatlon);
}



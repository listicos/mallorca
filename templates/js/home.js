var map;

//var myLatlng = new google.maps.LatLng("40.4216737855101","-3.7001175433777");
var marcadores = [];
function initialize() {
    var mapOptions = {
        zoom: 15,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    map = new google.maps.Map(document.getElementById('details-map-location'), mapOptions);


    /*google.maps.event.addListener(map, 'bounds_changed', function() {

        filtrarPorMapaAndPrecio();

    });
    var marker = new google.maps.Marker({
        position: myLatlng,
        map: map
    });*/
}

$(document).ready(function() {

    $('.selectpicker').selectpicker();

    $('.carousel').carousel({
        interval: 5000
    });
    
    ordenar();

    actualizarMapa();
    calendarios();
    ENABLE_DATES = [];
    for(i = 0; i < disponibles.length; i++) {
        ENABLE_DATES.push(new Date(disponibles[i]).getTime());
    }
    $('.date-start').datepicker({
        autoclose: true,
        enableDates: ENABLE_DATES,
        format: "dd-mm-yyyy"
    }).on('changeDate', function(ev) {
        $('.date-end').datepicker('setStartDate', ev.date);
    });

    $('.date-start').datepicker('setStartDate', new Date());

    $('.date-end').datepicker({
        autoclose: true,
        enableDates: ENABLE_DATES,
        format: "dd-mm-yyyy"
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
    
    pagination();

    //contarAnuncios();

    /*carruselVisitados();*/
});
function ordenar() {
    /*$('#resultados').mixitup();
    
    $('#sorter').on('change', function(){
        filter = eval($(this).val());
        console.log(filter);
        $('#resultados').mixitup('sort',filter);
    })
    
    filter = eval($('#sorter').val());   
    $('#resultados').mixitup('sort', 'data-price');
    $('#resultados').mixitup('sort',filter);*/
}
function actualizarMapa() {

    //var myLatlng;

    if (!map) {
        initialize();
        google.maps.event.trigger(map, 'resize');
        
    } else {
        
        for (i = 0; i < marcadores.length; i++) {
            
            if (marcadores[i])
                marcadores[i].setMap(null);
        }
        marcadores = [];
    }

    var latlngbounds = new google.maps.LatLngBounds();
    $('.result-list-container .result-item:not(:hidden)').each(function() {
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
    $('input, select', '#filtrosFrm').on('change', function(e) {
        e.preventDefault();
        //var valid = $(this).validationEngine('validate');
        if (true) {
            var form = $('#filtrosFrm').serialize();
            $.ajax({
                url: BASE_URL + '/ajax-filtros',
                data: form,
                type: 'post',
                dataType: 'json',
                success: function(response) {
                    $('#resultados').html(response.html);
                     $('#resultados').find('.carousel').carousel({
                        interval: 5000
                     });
                     
                     actualizarMapa();

                    calendarios();

                }
            });
        }
    });
}


function carruselVisitados() {
    /*$('#visitados').movingBoxes({
        startPanel: 2,
        panelWidth: .45,
        buildNav: false
    });*/
}

function calendarios() {
    $('.result-item').each(function(){
        enables = eval($(this).find('input[name=disponibilidades]').val());
        dates = [];
        for(i=0;i<enables.length;i++)
            dates.push(new Date(enables[i]).getTime());
        
        $(this).find('.calendario').datepicker({
            startDate: new Date(),
            enableDates: dates
        });
        
        
        
        $(this).find('a.ver-disponibilidad').off('click').on('click', function(e){
            e.preventDefault();
            _this = $(this).parent().parent().parent();
            _this.find('.apartamento-descripcion').fadeToggle();
            _this.find('.apartamento-calendario').fadeToggle();
        })
    });
    
    
}
var IS_GETTING_EMP = false;
function pagination() {
    $(document).scroll(function(e) {
            
        if(IS_GETTING_EMP)
            return false;
        
        if(!IS_GETTING_EMP){
            if ($(window).scrollTop() > $('.result-item').last().offset().top) {
                
                IS_GETTING_EMP = true;
                
                var form = $('#filtrosFrm').serialize();
                form += "&start=" + $('.result-item').length;
                $.ajax({
                    url: BASE_URL + '/ajax-filtros',
                    data: form,
                    type: 'post',
                    dataType: 'json',
                    success: function(response) {
                        $('#resultados').append(response.html);
                         $('#resultados').find('.carousel').carousel({
                            interval: 5000
                         });

                         actualizarMapa();

                        calendarios();
                        
                        IS_GETTING_EMP = false;

                    }
                });
                
            }
        }
    });
}


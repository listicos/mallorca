var map;
var myLatlng = new google.maps.LatLng("40.4216737855101","-3.7001175433777");

function initialize() {
    /* if($('input[name=lat]').val() != "") {
        var lat = $('input[name=lat]').val();
        var lon = $('input[name=lon]').val()
        myLatlng = new google.maps.LatLng(lat,lon);
    }*/
    var mapOptions = {
        zoom: 15,
        center: myLatlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    map = new google.maps.Map(document.getElementById('details-map-location'), mapOptions);

    var marker = new google.maps.Marker({
        position: myLatlng,
        map: map
    });
}

$(document).ready(function(){
    
    $('.selectpicker').selectpicker();
    
    $('.carousel').carousel({
        interval: 5000
    });
    
    initialize();
    google.maps.event.trigger(map, 'resize');
    map.setCenter(myLatlng);
    
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
        }
    });
    $( "#amount-min" ).html( "$" + $( "#slider-range" ).slider( "values", 0 ));
    $( "#amount-max" ).html("  $" + $( "#slider-range" ).slider( "values", 1 ) );
    
    $(".add-to-wishlist").click(function(){
        $(this).toggleClass("active");
        return false;
    });
});



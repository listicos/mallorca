var map;
var myLatlng = new google.maps.LatLng(lat,lon);
function initialize() {
  
  var mapOptions = {
    zoom: 18,
    center: myLatlng,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  }
 map = new google.maps.Map(document.getElementById('mapa_apartamento'), mapOptions);

  var marker = new google.maps.Marker({
      position: myLatlng,
      map: map
  });
}

google.maps.event.addDomListener(window, 'load', initialize);


$(document).ready(function(){

  $('#reservar_apartamento').click(function(){
    if($('#is_valid_reservacion').val()==0){
      return false;
    }
  });
    
    $('#reserva_form input, #reserva_form select').on('change',function(){
        $.ajax({
            type: "POST",
            url: BASE_URL+'/ajax-apartamento',
            data: $(this).parents('form').serialize(),
            dataType: "json",
            success: function(data) {
                if(data.total>0){
                  $('#is_valid_reservacion').val(1);
                }else{
                  $('#is_valid_reservacion').val(0);
                }
                $('.apartamento_cotizacion_precio h2').html(data.total_text);

            }
        });  
    });

    $('#menu_apartamento_fisrt a').click(function (e) {
        e.preventDefault();
        showTab($(this));
        google.maps.event.trigger(map, 'resize');
        map.setCenter(myLatlng);
    });
    
    $('#menu_apartamento_second a').click(function (e) {
        e.preventDefault();
        showTab($(this));
    });

    $('#layerslider').layerSlider({
        skinsPath : TEMPLATE_URL+'/css/layerslider/skins/',
        skin : 'lightskin',
        thumbnailNavigation : 'hover'
    });
      
    calculaRatingByOpinion();
    calculaRatingGlobal();
});

function calculaRatingGlobal(){
    var global_rating = $('.titulo_evaluacion').find('.opiniones_rating');
    var global_total = parseInt(global_rating.attr('data-rating'))/2;
    var promedio_rating = Math.round(global_total);
    for(var i=1;i<=promedio_rating;i++){
           global_rating.find('.star-'+i).removeClass('empty');
           global_rating.find('.star-'+i).addClass('full');
       }
}

function calculaRatingByOpinion(){
    $('.satisfaccion_opiniones').find('.opiniones_rating').each(function(){
       var content = $(this);
       var puntos = parseInt(content.attr('data-rating'))/2;
       var puntuacion = Math.round(puntos);
       for(var i=1;i<=puntuacion;i++){
           content.find('.star-'+i).removeClass('empty');
           content.find('.star-'+i).addClass('full');
       }
    });
}

function showTab(anchor){
    var container = anchor.attr('data-content');
    anchor.parents('.tab-main').find('ul li').each(function(){
        $(this).removeClass('active');
    });
    anchor.parents('li').addClass('active');
    anchor.parents('.tab-main').find('.tab-pane').each(function(){
        $(this).removeClass('active');
    });
    anchor.parents('.tab-main').find('#'+container).addClass('active');

}

$(document).ready(function(){
    
    $('html, body').animate({scrollTop: $('#desplegar_informacion').offset().top-10}, 1000);  
    
    $('.overlay_ampliar').fadeOut();
    
    $('.tab_lista li').click(function(){
        $('.opSelecionada').removeClass('opSelecionada');
        $(this).addClass('opSelecionada');
        $('.tab_container').slideUp();
        $('#tab_'+$(this).attr('id')).slideDown();
    });
    

    
    
    $('.ubicacion').mouseenter(function(){
        $('.overlay_ampliar').fadeIn();
    });
    
    $('.ubicacion').mouseenter(function(){
        $('.overlay_ampliar').fadeIn(400);
    });
    
     $('.ubicacion').mouseleave(function(){
        $('.overlay_ampliar').fadeOut(400);
    });
    
    $('.overlay_ampliar a').click(function() {
        $(this).parent().hide();
    });
    
   $(".go_fotos").click(function(){ 
   
        $(".grupo_fotos_TPV").click();    
   
    });    
    
   $(".grupo_fotos_TPV").click(function(){ 
   
        $(".grupo_fotos_TPV").colorbox({
             rel: 'grupo_fotos_TPV',
             width: 600,
             height: 400              
         });    
   
    });
        $(".grupo_fotos_TPV").colorbox({
             rel: 'grupo_fotos_TPV'
         });     
    
    /*$("#ver_google_maps").click(function(){
           $("#ver_google_maps").colorbox({width:"80%",height:"80%",iframe:true});
      });*/  
      
     $(".opiniones_colorbox").colorbox({
            inline: true,
            innerWidth: 700,
            innerHeight: 300
        });       
      
    $('#desplegar_informacion').click(function() {
        $('.overlay_ampliar').hide();
        $('.mostrarinfo').slideToggle(function() {
            google.maps.event.trigger(map, 'resize');
            $('#desplegar_informacion span').html(
                    $(this).is(':visible') ? "- Menos Información" : "+ Más Información"
                    );
        });

    });       
      
});
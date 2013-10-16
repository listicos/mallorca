var VALIDATE_REGISTER = false;

$(document).ready(function(){
    $('#layerslider').layerSlider({
        skinsPath : TEMPLATE_URL+'/css/layerslider/skins/',
        skin : 'lightskin',
        thumbnailNavigation : 'hover'
    });
    
    $('#reservas_form').validationEngine('attach',{
        onValidationComplete: function(form, status){

            if(status){
                if(!VALIDATE_REGISTER){
                    VALIDATE_REGISTER = true;
                    crearReservacion();
                }
            }
        }  
    });
      
    $('.show-details').click(function(){
        $('.precio').toggleClass('bordeBtm');
        if($(this).hasClass('close-d')){
            $(this).html('Ocultar detalles');
            $('.lista-detalles').show();
        }else{
            $(this).html('Mostrar detalles');
            $('.lista-detalles').hide();
        }
        $(this).toggleClass('close-d');
        return false;
    });
    
    $('.addItem').click(function(){
        var anchor = $(this);
        $.ajax({
            dataType: "json",
            url: BASE_URL + "/ajax-reserva",
            type: "POST",
            data: {
                idArticulo: $('#idArticulo').val(),
                cantidad: $('#cantidadArticulo').val(),
                total:  $('#total_reserva').val(),
                idApartamento: anchor.attr('apartamento-id'),
                action: 'addItem'
            },
            success: function(response) {
                if (response.msg === 'ok') {
                    var cantidad_new = parseInt(response.cantidad);
                    var new_article = $('.render_articulo_extra');
                    new_article.find('span.articulo_extra_nombre').html(response.articulo.nombre);
                    new_article.find('a.remove_extra').attr('articulo-id',response.articulo.idArticulo);
                    new_article.find('p.articulo_extra_descripcion').html(response.articulo.descripcion);
                    new_article.find('span.articulo_extra_cantidad').html(cantidad_new);
                    new_article.find('span.extra-lista-precio b').html(response.articulo.precioBase);
                    $('.precio_total_reserva_text').html(response.total_format);
                    $('#total_reserva').val(response.total);
                    $('.contenedor-extras').show();
                    $('.articulos_extras_lista').append(new_article.html());
                    removeExtraArticle();
                    toastr.success(response.data, 'Click & Booking dice:');
                }
                else {

                }
            }
        }); 
        return false;
    });
    

});
function removeExtraArticle(){
    $('.remove_extra').off().on('click',function(){
        var anchor = $(this);
        var article = anchor.parents('.contenedor-extras-lista');
        $.ajax({
            dataType: "json",
            url: BASE_URL + "/ajax-reserva",
            type: "POST",
            data: {
                idArticulo: anchor.attr('articulo-id'),
                cantidad: article.find('.articulo_extra_cantidad').html(),
                total:  $('#total_reserva').val(),
                idApartamento: anchor.attr('apartamento-id'),
                action: 'removeItem'
            },
            success: function(response) {
                if (response.msg === 'ok') {
                    $('.precio_total_reserva_text').html(response.total_format);
                    $('#total_reserva').val(response.total);
                    article.remove();
                    toastr.success(response.data, 'Click & Booking dice:');
                }
                else {

                }
            }
        }); 
        return false;
    });
}
function crearReservacion(){

    $.ajax({
        dataType: "json",
        url: BASE_URL + "/ajax-reserva",
        type: "POST",
        data: $('#reservas_form').serialize(),
        success: function(response) {
            if (response.msg === 'ok') {
                toastr.success(response.data, 'Click & Booking dice:');
                window.setTimeout(function(){
                    window.location = BASE_URL + '/confirmaReserva/id:'+response.idReservacion;
                }, 1000);
            }else {
                toastr.error(response.data, 'Click & Booking dice:');
            }
        }
    }); 

}

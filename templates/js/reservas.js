var MONTHS = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

$(document).ready(function() {

    
     $('.flexslider').flexslider({
        animation: "fade"
      });

    
    follow_me_reservation();
    
    cardValidation();
    
    reservar();
});

function follow_me_reservation() {

    var documentHeight = 0;
    var paddingTop = 60;
    var element = ".reservacion-list-content-main:visible";
    var offset = $(element).offset();
    var containerHeight = $(".main_content").height();

    $(window).scroll(function() {
        if ($(document).width() > 974) {
            containerHeight = $(".main_content").height();
            follow(containerHeight, paddingTop, element, offset);
        } else {
            $(element).stop().animate({
                marginTop: 0
            });
        }

    });

    $(window).resize(function() {
        if ($(document).width() > 974) {
            offset.top = 74;
        }
    });

    follow(containerHeight, paddingTop, element, offset);
}

function follow(containerHeight, paddingTop, element, offset) {

    documentHeight = $(document).height();
    var elementHeight = $(element).height();
    if ($(window).scrollTop() > offset.top) {
        var newPosition = ($(window).scrollTop() - offset.top) + paddingTop; //460
        var maxPosition = containerHeight - (elementHeight + 20); //878
        if (newPosition > maxPosition) {
            newPosition = maxPosition;
        }
        $(element).stop().animate({
            marginTop: newPosition
        });
    } else {
        $(element).stop().animate({
            marginTop: 0
        });
    }
    ;
}

function cardValidation() {
    
    var cards = new Array();
    $('ul.cards li').each(function(){
        
        cards.push($(this).attr('card'));
    });
    
    if($('input[name=numero]').length > 0) {
        $('input[name=numero]').attr('valid-card', false);
        $('input[name=numero]').validateCreditCard(function(ev){
                $(".cards li").addClass("off");
                $('input[name=numero]').removeClass('validCreditCard');
                if(ev.card_type==null){
                        $('input[name=numero]').attr('valid-card', false);
                        $('input[name=tipoTarjeta]').val('');
                        return
                }
                $(".cards ." + ev.card_type.name).removeClass("off");
                $('input[name=tipoTarjeta]').val($(".cards ." + ev.card_type.name).attr('title'));
                if(ev.length_valid && ev.luhn_valid) {                
                     $('input[name=numero]').attr('valid-card', true).addClass('validCreditCard');
                     
                     return true;
                }
                return false;
        },
        {accept:cards}
        );
    }
    
}

function reservar() {
    $('#reservaFrm').on('submit', function(e){
        e.preventDefault();
        valid = $(this).validationEngine('validate');
        if(valid) {
            data = $(this).serialize();
            $.ajax({
                url: BASE_URL + '/ajax-reserva',
                data: data,
                type: 'post',
                dataType: 'json',
                success: function(response) {
                    if(response.msg == 'ok') {
                        toastr.success(response.data);
                    } else {
                        toastr.error(response.data);
                    }
                }
            })
        }
    })
}
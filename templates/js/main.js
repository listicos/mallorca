$(document).ready(function() {
    $('#blocker').fadeOut('slow');
    $(document).ajaxStart(function(){ 
        $('#blocker').fadeIn(); 
    }).ajaxStop(function(){
        $('#blocker').fadeOut('slow'); 
    });
    $('.to_scroll_top').click(function() {
        $("html, body").animate({scrollTop: $("body").offset().top - 57}, 400);
        return false;
    });
    
    $('#suscribirBtn').on('click', function(e){
        e.preventDefault();
        _valid = $('#suscribirFrm').validationEngine('validate');
        if(_valid) {
            data = $('#suscribirFrm').serialize();
            $.ajax({
                url: BASE_URL + '/ajax-suscribir',
                data: data,
                type: 'post',
                dataType: 'json',
                success: function(response) {
                    if(response.msg == 'ok')
                        toastr.success('Gracias por suscribirte a nuestro boletín');
                    else
                        toastr.error(response.data);
                }
            })
        }
    })
    
});
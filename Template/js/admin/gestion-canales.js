$(function(){
    canalesInit();
});

function canalesInit() {
    $('#gestion_canales_form').on('submit', function(e){
        e.preventDefault();
        var valid = $(this).validationEngine('validate');
        if(valid) {
            var data = $(this).serialize();
            $.ajax({
                url: BASE_URL + '/admin-ajax-canales',
                data: data,
                type: 'post',
                dataType: 'json',
                success: function(response) {
                    if(response.msg == 'ok') {
                        noty({
                            'type': 'success',
                            "text":response.data,
                            "layout":"top",
                          });
                        setTimeout(function(){
                            window.location = BASE_URL + '/admin-canales-lista';
                        }, 2500);
                    } else {
                        noty({
                            'type': 'error',
                            "text":response.data,
                            "layout":"top",
                          });
                    }
                }
            });
        }
    })
}



$(initUsuarioFunction);

function initUsuarioFunction() {
    $('#gestion_usuario_form').submit(function(ev){
        ev.preventDefault();
        var valid = $(this).validationEngine('validate');
        if(valid) {
            var data = $(this).serialize();
            
            $.ajax({
                url: BASE_URL + '/admin-ajax-usuario',
                data: data,
                type: 'post', 
                dataType: 'json',
                success: function(response) {
                    if(response.msg == 'ok'){
                        noty({
                            "text":response.data,
                            "layout":"top",
                            "type":"success"
                        });
                        setTimeout(function(){
                            window.location = BASE_URL + '/admin-usuario-lista';
                        }, 3500);
                        
                    } else {
                        noty({
                            "text":response.data,
                            "layout":"top",
                            "type":"error"
                        });
                    }
                }
            });
        }
    })
}



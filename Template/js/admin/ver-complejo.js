$(function(){
    $('#gestion_complejos_form').submit(function(e){
        e.preventDefault();
        var valid = $(this).validationEngine('validate');
        if(valid) {
            var data = $(this).serialize();
            $.ajax({
                url: BASE_URL + '/admin-ajax-complejo',
                data: data,
                type: 'post',
                dataType: 'json', 
                success: function(response) {
                    if(response.msg == 'ok') {
                        noty({
                            "text":response.data,
                            "layout":"top",
                            "type":"success"
                        });
                        window.setTimeout(function(){
                            window.location = BASE_URL+'/admin-complejo-lista';
                        },2500);
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
    });
})



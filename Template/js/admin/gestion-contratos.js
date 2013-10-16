$(document).ready(function(){
    
    $('#gestion_contratos_form').submit(function(ev){
        ev.preventDefault();
        var form = $(this);
        var valid_form;
        valid_form = form.validationEngine('validate');
        
        if(valid_form){
            $.ajax({
                dataType: "json",
                url: BASE_URL + "/admin-ajax-contrato",
                type: "POST",
                data: form.serialize(),
                success: function(response) {    
                    if(response.msg == 'ok'){
                        noty({
                            "text":response.data,
                            "layout":"top",
                            "type":"success"
                        });
                        window.setTimeout(function(){
                            window.location = BASE_URL+'/admin-contrato-lista';
                        },2500);
                    }
                }
            }); 
        }else{
            console.log('invalid form !')
        }
    });
    
});



$(document).ready(function(){
    
    $('#contenido-apartamento').submit(function(ev){
        ev.preventDefault();
        var form = $(this);
        var valid_form;
        valid_form = form.validationEngine('validate');
        
        if(valid_form){
            $.ajax({
                dataType: "json",
                url: BASE_URL + "admin-ajax-apartamento",
                type: "POST",
                data: form.serialize(),
                success: function(response) {    
                    if(response.msg == 'ok'){
                        //form.find('.searched-info').slideUp()
                        window.location = BASE_URL+'admin-apartamento-view/id:'+response.idApartamento
                    }
                }
            }); 
        }else{
            console.log('invalid form !')
        }
    });
    
});



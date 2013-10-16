var VALIDATE_REGISTER = false;
                                        
$(document).ready(function(){

    /*$('#register_form').submit(function(ev){
        ev.preventDefault();
        $('#register_form').validationEngine('attach',{
            onValidationComplete: function(form, status){

                if(status)
                    registraNuevoUsuario();

            }  
        });
    });*/

    $('#register_form').validationEngine('attach',{
        onValidationComplete: function(form, status){
            
            
            if(status){
                if(!VALIDATE_REGISTER){
                    VALIDATE_REGISTER = true;
                    registraNuevoUsuario();
                }
            }
        }  
    });
      
});

function registraNuevoUsuario() {
    $.ajax({
        dataType: "json",
        url: BASE_URL + "/ajax-registrar",
        type: "POST",
        data: $('#register_form').serialize(),
        success: function(response) {
            if (response.msg === 'ok') {
                window.location = BASE_URL;
            }
            else {

            }
        }
    }); 
}
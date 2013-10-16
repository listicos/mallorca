var VALIDATE_EDIT = false;

$(document).ready(function(){
    
    $('#edita_perfil_form').validationEngine('attach',{
        onAjaxFormComplete: function(status, form, errors, options){},
        onValidationComplete: function(form, status){
            if(status){
                if(!VALIDATE_EDIT){
                    VALIDATE_EDIT = true;
                    editaPerfil();
                }
            }
        },
        onSuccess: function(){}
    });
    
});

function editaPerfil(){
    $.ajax({
        dataType: "json",
        async: false,
        url: BASE_URL + "/ajax-registrar",
        type: "POST",
        data: $('#edita_perfil_form').serialize(),
        success: function(response) {
            if (response.msg === 'ok') {
                toastr.success(response.data, 'Click & Booking dice:');
            }
            else {
                toastr.success(response.data, 'Click & Booking dice:');
            }
            $('#email').validationEngine('hide');
            VALIDATE_EDIT = false;
        }
    }); 
}
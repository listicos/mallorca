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
});
$(document).ready(function(){
    App.init();
    gestionFotosFunctions();
});
function gestionFotosFunctions(){
    
    Dropzone.options.apartamentoDropzone = {
        init: function() {
            this.on("addedfile", function(file) {
                //console.log(file)
                var removeButton = Dropzone.createElement("<a href='#' class='dz-remove'>Borrar foto</a>");
                var _this = this;
                removeButton.addEventListener("click", function(e) {
                    // Make sure the button click doesn't submit the form:
                    e.preventDefault();
                    e.stopPropagation();

                    // Remove the file preview.
                    _this.removeFile(file);
                // If you want to the delete the file on the server as well,
                // you can do the AJAX request here.
                });

                // Add the button to the file preview element.
                file.previewElement.appendChild(removeButton);
            });
            this.on("success", function(file, responseText) {
                console.log(responseText)
                noty({
                    "text":"El archivo fue agregado correctamente.",
                    "layout":"top",
                    "type":"notification"
                });
                getApartamentoFotos();
            });
        }
    }
}



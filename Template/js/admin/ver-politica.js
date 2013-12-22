$(function(){
    verPoliticaInit();
});

var NOMBRE = {};
var DESCRIPCION = {};
var IDIOMA = false;

function verPoliticaInit(){
    $('#gestion_politicas_form').off('submit').on('submit', function(e){
       e.preventDefault();
       $('#idioma').change();
        $('textarea[name=descripcion]').val(JSON.stringify(DESCRIPCION));
        $('textarea[name=nombre]').val(JSON.stringify(NOMBRE));
       var data = $(this).serialize();
       
       $.ajax({
          url : BASE_URL + '/admin-ajax-politica',
          data: data,
          dataType : 'json',
          type: 'post',
          success: function(response) {
              if(response.msg == 'ok') {
                    noty({
                       'type': 'success',
                       "text":response.data,
                       "layout":"top",
                    });
                    
                    setTimeout(function(){
                        window.location = BASE_URL + '/admin-politicas-lista';
                    }, 5000);
                    
              }
          }
       });
       
    });
    
    $( 'textarea.editor' ).ckeditor();
    
    nombre = $('textarea[name=nombre]').val();
    descripcion = $('textarea[name=descripcion]').val();
    $('#idioma').off().change(function(e){
        
        if(IDIOMA) {            
            DESCRIPCION[IDIOMA] = CKEDITOR.instances.descripcion.getData();            
            CKEDITOR.instances.descripcion.setData(DESCRIPCION[$(this).val()]);
            
            NOMBRE[IDIOMA] = $('#nombre').val();
            $('#nombre').val(NOMBRE[IDIOMA])
        }
        IDIOMA = $(this).val();
        $('#descripcion').val(DESCRIPCION[IDIOMA]);
        $('#nombre').val(NOMBRE[IDIOMA])
    });
    
    if(descripcion && descripcion.trim().length > 2) {
        if(descripcion[0] != '{' || descripcion[descripcion.length - 1] != '}')
            descripcion = "";
        else
            DESCRIPCION = JSON.parse(descripcion);
    }
    if(nombre && nombre.trim().length > 2) {
        if(nombre[0] != '{' || nombre[nombre.length - 1] != '}')
            nombre = "";
        else
            NOMBRE = JSON.parse(nombre);
    }
    $('#idioma').val('es');
        
    $('#idioma').change();
}



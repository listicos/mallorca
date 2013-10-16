$(function(){
    verArticuloInit();
});

function verArticuloInit(){
    $('#gestion_articulos_form').off('submit').on('submit', function(e){
       e.preventDefault();
       
       var data = $(this).serialize();
       
       $.ajax({
          url : BASE_URL + '/admin-ajax-articulo',
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
                        window.location = BASE_URL + '/admin-articulos-lista';
                    }, 5000);
                   
              }
          }
       });
       
    });
}



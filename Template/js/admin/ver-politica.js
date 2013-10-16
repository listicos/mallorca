$(function(){
    verPoliticaInit();
});

function verPoliticaInit(){
    $('#gestion_politicas_form').off('submit').on('submit', function(e){
       e.preventDefault();
       
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
}



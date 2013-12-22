$(initOpinion);

function initOpinion() {
    AutoCompleteApto();
    AutoCompleteUsuario();
    
    $('#contenido-opinion').submit(function(e){
        e.preventDefault();
        valid = $(this).validationEngine('validate');
        if(valid) {
            $.ajax({
                url: BASE_URL + '/admin-ajax-opinion',
                data: $(this).serialize() + '&action=update',
                type: 'post',
                dataType: 'json',
                success: function(response) {
                    if(response.msg == 'ok') {
                        noty({
                            'type': 'success',
                            "text":response.data,
                            "layout":"top",
                         });
                    }
                }
            })
        }
    })
}

function AutoCompleteUsuario() {
    $( "#usuario").attr('autocomplete', 'off').typeahead({
        source: function(query, process) {
            $.ajax({
               url: BASE_URL + '/admin-ajax-reserva',
               type: 'post',
               dataType: 'json',
               data: {action:'searchUser', term: query},
               success : function(response) {
                   if(response.lista.length > 0) {
                    var lista = [];
                    for(i=0;i<response.lista.length; i++) {
                        var elemento = response.lista[i];
                        lista.push({
                            label: elemento.nombre + " " + elemento.apellidoPaterno + " " + elemento.apellidoMaterno,
                            id: elemento.idUsuario
                        });
                    }
                    return process(lista);
                   }
                   else
                    return process(['No hay elementos para mostrar'])   
               }
            });
        },
        updater: function(item) {
            $('#huespedId').val(item.id);
            if(item.id) {
                //loadUserDetails(item.id);
                return item.text;
            } else {
                $('[data-type=user]').val('')
            }
        }
    });
}

function AutoCompleteApto() {
    $( "#apartamento").typeahead({
        source: function(query, process) {
            $.ajax({
               url: BASE_URL + '/admin-ajax-reserva',
               type: 'post',
               dataType: 'json',
               data: {action:'getAptos', term: query},
               success : function(response) {
                   if(response.lista.length > 0) {
                    var lista = [];
                    for(i=0;i<response.lista.length; i++) {
                        var elemento = response.lista[i];
                        lista.push({
                            label: elemento.nombre,
                            id: elemento.idApartamento
                        });
                    }
                    return process(lista);
                   }
                   else
                    return process(['No hay elementos para mostrar'])   
               }
            });
        },
        updater: function(item) {
            $('#idApartamento').val(item.id);
            if(item.id) { 
                
                return item.text;
            }
        }
    });
}



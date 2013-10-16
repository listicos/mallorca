$(function(){
   initReservaVer(); 
});

var TARIFA = 1;

function initReservaVer() {
  var date_now = new Date(new Date().setDate(new Date().getDate()-2));
    $('#fechaInicio').datepicker({
        format: "dd-mm-yyyy",     
        autoclose: true
    }).on('changeDate', function(ev) {
        $('#fechaFinal').datepicker('setStartDate', ev.date);
        $('#fechaFinal').datepicker('show');
    });

    $('#fechaInicio').datepicker('setStartDate', date_now);

    $('#fechaFinal').datepicker({
        format: "dd-mm-yyyy",
        autoclose: true
    });

    $('#fechaInicio, #fechaFinal').on('change',function(){
      console.log($('.datos_alojamiento :input').serialize());
        $.ajax({
            type: "POST",
            url: BASE_URL+'/admin-ajax-apartamento-calendario',
            data: $('.datos_alojamiento :input').serialize()+"&action=getPrecio"+"&idApartamento="+$('#idApartamento').val(),
            dataType: "json",
            success: function(data) {
              if(data.msg == 'ok'){
                $('#totalReserva').val(data.total);
                updateTotal();
                  if(data.total==0){
                    noty({
                      'type': 'error',
                      "text":data.total_text,
                      "layout":"top",
                    });
                  }
              }else{
                    noty({
                      'type': 'error',
                      "text":data.data,
                      "layout":"top",
                    });
              }
            }
        });  
    });

    $('#fechaFinal').datepicker('setStartDate', date_now);
    
    AutoCompleteApto();
    
    $('#frmUpdateReserva').off('submit').on('submit', function(e){
        e.preventDefault();
        var valid = $(this).validationEngine('validate');
        if(valid) {
            var data = $(this).serialize();
            $.ajax({
               url : BASE_URL + '/admin-ajax-reserva',
               type: 'post', 
               dataType: 'json',
               data: data,
               success: function(response) {
                    if(response.msg == 'ok') {
                        noty({
                            'type': 'success',
                            "text":response.data,
                            "layout":"top",
                         });
                         if($('#hiddenaptoreservar').length == 0) {
                            setTimeout(function(){
                                window.location = BASE_URL + '/admin-reserva-lista';
                            }, 5000);
                         } else {
                            $('#btnCerrarReservarOverlay').click();
                        }
                    }else {
                        noty({
                            'type': 'error',
                            "text":response.data,
                            "layout":"top",
                         });
                    }
               }
            });
        }
    }).off('reset').on('reset', function(e){
       e.preventDefault();
       $(window).attr('location', BASE_URL + '/admin-reserva-lista');
    });
    
    $('#selectHuesped').off('change').on('change', function(){
        addUserFunctions();
    });
    addUserFunctions();
    AutoCompleteUsuario();

    $('#agregar_cobro').click(function(){
      
      var tipo_cobro = $('#tipo_cobro').val();
      var newRow;
      switch(tipo_cobro)
      {
        case 'tarjeta':
          newRow = $('#cobro_tarjeta').clone();
          break;
        case 'paypal':
          newRow = $('#cobro_paypal').clone();
          break;
        case 'transferencia':
          newRow = $('#cobro_transferencia').clone();
          break;
        default:
      }
      var index = new Date().getTime();
      newRow.removeAttr('id');
      newRow.find('[name*="[XX]"]').each(function(){
          var name = $(this).attr('name').split('[XX]');
          $(this).attr('name', name[0] + '[XX_' + index + ']' + name[1]);
          $(this).prop('disabled', false);
      });
      $('#cobro_todos').append(newRow.show());
      newRow.find('select[name$="[estado]"], input[name$="[validado]"]').change(function(){
          var parent = $(this).parent();
            while(!parent.hasClass('hidden-obj')) parent = parent.parent();

            var confirmada = parent.find('select[name$="[estado]"]').val() == 'confirmada';
            var validado = parent.find('input[name$="[validado]"]').prop('checked');

          if(confirmada && validado)
            $('#resumen-cuenta .pagos div[pago-id="' + index + '"] div').removeClass('red').addClass('blue');
          else
              $('#resumen-cuenta .pagos div[pago-id="' + index + '"] div').removeClass('blue').addClass('red');
          updateTotal();
      })
      newRow.find('input[name$="[importe]"]').change(function(){
          var importe = $(this).val();
          $('#resumen-cuenta .pagos div[pago-id="' + index + '"] div.importe').html(importe);
      })
      newRow.find('i.icon-trash').click(function(){
        $(this).parent().remove();
        $('#resumen-cuenta .pagos div[pago-id="' + index + '"]').remove();
        updateTotal();
      });
      
      $('[rel="tooltip"],[data-rel="tooltip"]').tooltip({"placement":"bottom",});
      var fila = "<div class='row-fluid' pago-id='" + index + "'>";
      fila += "<div class='span6 red'>" + tipo_cobro + "</div>";
      fila += "<div class='span6 red importe'></div>";
      fila += "</div>";
      $('#resumen-cuenta .pagos').append(fila);
    });
    
    $('#agregar_cobro_fianza').click(function(){
      
      var tipo_cobro = $('#tipo_cobro_fianza').val();
      var newRow;
      switch(tipo_cobro)
      {
        case 'tarjeta':
          newRow = $('#cobro_tarjeta').clone();
          newRow.find('select[name="tarjeta[XX][estado]"]').html(
                  "<option value='devuelto'>Devuelto</option><option value='retenido'>Retenido</option>"
            );
          newRow.find('input[name="tarjeta[XX][formaPago]"]').val('fianza');
          break;
        case 'efectivo':
          newRow = $('#cobro_efectivo').clone();
          break;        
        default:
      }
      var index = new Date().getTime();
      newRow.removeAttr('id');
      newRow.find('[name*="[XX]"]').each(function(){
          var name = $(this).attr('name').split('[XX]');
          $(this).attr('name', name[0] + '[XX_' + index + ']' + name[1]);
          $(this).prop('disabled', false);
      });
      $('#cobro_todos_fianza').append(newRow.show());
      newRow.find('i.icon-trash').click(function(){
        $(this).parent().remove();
      });
      $('[rel="tooltip"],[data-rel="tooltip"]').tooltip({"placement":"bottom",});
    });
    
    $('#cobro_todos .hidden-obj i.icon-trash, #cobro_todos_fianza .hidden-obj i.icon-trash').click(function(){
        var index = $(this).parent().find('input[name$="[idReservacionPago]"]').val();
        $('#resumen-cuenta .pagos div[pago-id="' + index + '"]').remove();
        $(this).parent().remove();
        updateTotal();
    });
    
    $('#cobro_todos .hidden-obj select[name$="[estado]"], #cobro_todos .hidden-obj input[name$="[validado]"]').change(function(){
        
        var parent = $(this).parent();
        while(!parent.hasClass('hidden-obj')) parent = parent.parent();
        
        var confirmada = parent.find('select[name$="[estado]"]').val() == 'confirmada';
        var validado = parent.find('input[name$="[validado]"]').prop('checked');
        
        var index = parent.find('input[name$="[idReservacionPago]"]').val(); 
          if(confirmada && validado)
            $('#resumen-cuenta .pagos div[pago-id="' + index + '"] div').removeClass('red').addClass('blue');
          else
              $('#resumen-cuenta .pagos div[pago-id="' + index + '"] div').removeClass('blue').addClass('red');
          updateTotal();
    })
    
    $('#cobro_todos .hidden-obj input[name$="[importe]"]').change(function(){
        var importe = $(this).val();
        var parent = $(this).parent();
        while(!parent.hasClass('hidden-obj')) parent = parent.parent();
        var index = parent.find('input[name$="[idReservacionPago]"]').val(); 
        $('#resumen-cuenta .pagos div[pago-id="' + index + '"] div.importe').html(importe);
          updateTotal();
    })
    
    showHideResumen();
    $('#resumen-cuenta .show-resumen').click(showHideResumen);
    
    $('input[name=totalReserva]').change(function(){
        updateTotal();
    })
}

function showHideResumen() {
    var title = ($('#resumen-cuenta .resumen:hidden').length > 0) ? "Ocultar resumen" : "Mostrar resumen";
    $('#resumen-cuenta').animate({width:($('#resumen-cuenta .resumen:hidden').length > 0) ? '230px' : '30px'}, 500);
    $('#resumen-cuenta .resumen').animate({opacity: 'toggle'}, 500); 
    $('#resumen-cuenta .show-resumen').attr('title', title);
}

function calcularTotal() {
  if($('#fechaInicio').val() == "" || $('#fechaFinal').val() == "") {
      $('#totalReserva').val(TARIFA);
  } else {
      
  }
}

function updateTotal() {
    var total = parseFloat($('input[name=totalReserva]').val());
    $('#resumen-cuenta .total').html(total);
    $('#resumen-cuenta .importe.blue').each(function(){
        total -= parseFloat($(this).html());
    })
    $('#resumen-cuenta .totalPendiente').html(total);
}

function addUserFunctions() {
    //var userselected = $('#selectHuesped').val().trim().length;

   // $('[data-type=user]').prop('disabled', userselected > 0);
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
                loadUserDetails(item.id);
                return item.text;
            } else {
                $('[data-type=user]').val('')
            }
        }
    });
}

function loadUserDetails(userId) {
    $.ajax({
        url: BASE_URL + '/admin-ajax-reserva',
        data: {action:'loadUserDetails', usuarioId: userId},
        type: 'post',
        dataType: 'json',
        success: function(response) {
            var usuario = response.data;
            $('#respondable_nombre').val(usuario.nombre);
            $('#respondable_apellidoP').val(usuario.apellidoPaterno);
            $('#respondable_apellidoM').val(usuario.apellidoMaterno);
            $('#respondable_email').val(usuario.email);
            $('#respondable_telefono').val(usuario.telefono);
            $('#respondable_telefono_alterno').val(usuario.telefonoAlterno);
        }
    })
}




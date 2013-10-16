$(function(){
    initMantenimiento();
});

function initMantenimiento() {
    
    $('input[name=fechaCierre]').datepicker({format: "dd/mm/yyyy"});
    
    AutoCompleteApto();
    
    $('#gestion_mantenimiento_form').off('submit').on('submit', function(e){
        e.preventDefault();
        var v = $(this).validationEngine('validate');
        if(!v) return false;
        var data = $(this).serialize();
        $.ajax({
           url: BASE_URL + '/admin-ajax-mantenimiento',
           type: 'post',
           dataType: 'json',
           data: data,
           success: function(response) {
               if(response.msg == 'ok') {
                   noty({
                       type: 'success',
                       text: response.data,
                       layout: 'top'
                   });
                    setTimeout(function(){
                        $(window).attr('location', BASE_URL + '/admin-mantenimientos-lista');
                    }, 5000);
               } else {
                   noty({
                       type: 'error',
                       text: response.data,
                       layout: 'top'
                   });
               }
           }
        });
    });
    
    materialesFunctions();
    
    personalFunctions();
    printMantenimientoOverlay();
}

function printMantenimientoOverlay(){
    $('.printOverlay').click(function(){
        var mantenimientoId = $(this).attr("mantenimiento-id")
        $('#print_mantenimiento_overlay .modal-body').html(AJAX_MAIN)
        $.ajax({
            url: BASE_URL + '/admin-ajax-mantenimiento-filtros',
            type: 'POST',
            dataType: 'json',
            data: {
                action:'printMantenimiento', 
                mantenimientoId: mantenimientoId
            },
            success : function(response) {
                if(response.msg == 'ok') {
                    $('#print_mantenimiento_overlay').find('.modal-body').html(response.html);
                }
            }
        });
    });
}

function AutoCompleteApto() {
    $( "#apartamento").attr('autocomplete', 'off').typeahead({
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
            $('#apartamentoId').val(item.id);
            if(item.id) {                
                return item.text;
            }
        }
    });
}

function materialesFunctions() {
    $('#add_material').off('click').on('click', function(e){
       e.preventDefault();
       var newMaterial = $('#hiddenMaterial').clone();
       newMaterial.find('input').removeAttr('disabled');
       var r = Math.random();
       newMaterial.find('input[name="materialId[]"]').val(r);
       newMaterial.find('input[name=materialDescripcion]').attr('name', 'materialDescripcion[' + r + ']');
       newMaterial.find('input[name=materialCantidad]').attr('name', 'materialCantidad[' + r + ']');
       newMaterial.removeAttr('id');
       newMaterial.find('a.delete_material').off('click').on('click', function(ev){
          ev.preventDefault();
          var d = $(this).parent();
          while(!d.hasClass('row-fluid')) d = d.parent();
          d.remove();
       });
       $('#listaMateriales').append(newMaterial);
    });
    
    $('a.delete_material').off('click').on('click', function(ev){
          ev.preventDefault();
          var d = $(this).parent();
          while(!d.hasClass('row-fluid')) d = d.parent();
          d.remove();
       });
}

function personalFunctions() {
    $('#add_personal').off('click').on('click', function(e){
       e.preventDefault();
       var newP = $('#hiddenPersonal').clone();
       newP.find('input, select').removeAttr('disabled');
       var r = Math.random();
       newP.find('input[name="personalId[]"]').val(r);
       newP.find('input[name=personalNombre]').attr('name', 'personalNombre[' + r + ']');
       newP.find('input[name=personalFecha]').attr('name', 'personalFecha[' + r + ']').datepicker({format:"dd/mm/yyyy"});
       newP.find('select[name=horaInicio]').attr('name', 'horaInicio[' + r + ']');
       newP.find('select[name=horaFinal]').attr('name', 'horaFinal[' + r + ']');
       newP.find('input[name=personalHoras]').attr('name', 'personalHoras[' + r + ']');
       newP.removeAttr('id');
       newP.find('a.delete_personal').off('click').on('click', function(ev){
          ev.preventDefault();
          var d = $(this).parent();
          while(!d.hasClass('personal')) d = d.parent();
          d.remove();
       });
       $('#listaPersonal').append(newP);
    });
    
    $('a.delete_personal').off('click').on('click', function(ev){
          ev.preventDefault();
          var d = $(this).parent();
          while(!d.hasClass('personal')) d = d.parent();
          d.remove();
       });
       
    $('input[name*="Fecha"]').datepicker({format: 'dd/mm/yyyy'});
}



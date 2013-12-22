function bind_ver_contrato(idEmpresa){
    $('.trigger_contrato_view').show().off().click(function(e){
        e.preventDefault();
        $.ajax({
            dataType: "json",
            url: BASE_URL + "/admin-ajax-contrato-gestion",
            type: "POST",
            data: {
                idEmpresa:idEmpresa,
                idContrato:$('.apartamento_contrato').val(),
                action:'get'
            },
            success: function(response) {    
                if(response.msg == 'ok'){
                    console.log( $('#contrato_modal').find('.myModalLabel'));
                    $('#contrato_modal').find('.myModalLabel').html(response.data.contrato.nombre)
                    $('#contrato_modal').find('.fecha_inicio').html(response.data.contratoEmpresa.fechaInicio)
                    $('#contrato_modal').find('.fecha_fin').html(response.data.contratoEmpresa.fechaFin);
                    $('#contrato_modal').find('.descripcion').html(response.data.contrato.descripcion);
                    $('#contrato_modal').find('.precio').html('€ '+response.data.contrato.precio);
                    $('#contrato_modal').find('.porcentaje').html(response.data.contrato.porcentaje+'%');
                }else{
                      
                }
            }
        }); 
        $('#contrato_modal').modal('show');
    });
}
$(document).ready(function(){
    
    App.init();
    Calendar.init();
    
    $( 'textarea.editor' ).ckeditor();

    $('.detalles_apartamento_nav a').click(function (e) {
        e.preventDefault();
        if($(this).parents('li').hasClass('disabled')){
            return false;
        }else{
            $(this).tab('show');
            if($(this).attr('data-ref')=='calendario')
                Calendar.initCalendar();
            if($(this).attr('data-ref')=='fotos')
                getApartamentoFotos();
        }
    });
    $("#geocomplete").geocomplete({
        map: ".map_canvas",
        details: ".formulario_localizacion ",
        markerOptions: {
            draggable: true
        }
    });
    
    var map = $("#geocomplete").geocomplete("map");
    google.maps.event.trigger(map, "resize");
    window.setTimeout(function() {
        map.setCenter(new google.maps.LatLng($("input[name=lat]").val(), $("input[name=lon]").val()));
        $("#geocomplete").geocomplete('find', $("input[name=lat]").val() + ', ' + $("input[name=lon]").val());
    }, 20);

    
    
    $("#geocomplete").on("geocode:dragged", function(event, latLng) {
        $("input[name=lat]").val(latLng.lat());
        $("input[name=lon]").val(latLng.lng());
    }).on("geocode:result", function(event, latLng) {
        $("input[name=lat]").val(latLng.geometry.location.lat());
        $("input[name=lon]").val(latLng.geometry.location.lng());
    });
    
    
    

    $('.date-start').datepicker({
        autoclose: true,
        weekStart: 1,
        format: 'dd/mm/yyyy'
        
    }).on('changeDate', function(ev) {
        $(this).parents('.row-fluid').find('.date-end').datepicker('setStartDate', ev.date);
        $(this).parents('.row-fluid').find('.date-end').datepicker('show');
    });

    var date_now = new Date(new Date().setDate(new Date().getDate()-2));

    $('.date-start').datepicker('setStartDate', date_now);

    $('.date-end').datepicker({
        autoclose: true,
        weekStart: 1,
        format: 'dd/mm/yyyy'
    }).on('changeDate', function(ev) {
            END_DATE = ev.date;
        });

    $('.date-end').datepicker('setStartDate', date_now);

    gestionIdiomas();
    agregarTarifa()
    gestionGeneralFunctions();
    gestionTarifasFunctions();
    gestionFotosFunctions();
    gestionContratosFuntions();
    gestionDocumentosFunctions();
    gestionAvanzadosFunctions();
    handleContratoCalendario();

});

var END_DATE = false;

function handleContratoCalendario(){
    $('.calendario_trigger_tab').click(function(){
        $('.calendario_element').show();
        $('.contrato_element').hide();
        $('#calendar_caption').html('Calendario de disponibilidad');
    });

    $('.contrato_trigger_tab').click(function(){
        $('.calendario_element').hide();
        $('.contrato_element').show();
        $('#calendar_caption').html('Configurar precios del contrato');
    });
}

function gestionContratosFuntions(){
    $('#contrato_apartamento_form').submit(function(ev){
        ev.preventDefault();
        var form = $(this);
        var valid_form;
        valid_form = form.validationEngine('validate');
        if(valid_form){
            $.ajax({
                dataType: "json",
                url: BASE_URL + "/admin-ajax-apartamento",
                type: "POST",
                data: form.serialize(),
                success: function(response) {    
                    if(response.msg == 'ok'){
                        noty({
                            "text":response.data,
                            "layout":"top",
                            "type":"notification"
                        });
                    }else{
                        noty({
                            "text":response.data,
                            "layout":"top",
                            "type":"error"
                        });
                    }
                }
            }); 
        }else{
            console.log('invalid form !')
        }
    //$('#disponibilidad_overlay').modal('hide');
    });
}

function getApartamentoFotos(){
    $.ajax({
        dataType: "json",
        url: BASE_URL + "/admin-ajax-apartamento",
        type: "POST",
        data: {
            idApartamento: $('#global_id_apartamento').val(),
            action: 'getFotos'
        },
        success: function(response) {    
            if(response.msg == 'ok'){
                if(response.html != 'not_found'){
                    $('#apartamentoDropzone').addClass('dz-started');
                    $('#apartamentoDropzone').html(response.html);
                    deleteApartamentoFoto();
                }
            }
        }
    }); 
}

function deleteApartamentoFoto(){
    
    $('.delete_foto').off().on('click', function(){
        var ruta = $(this).attr('data-ruta');
        var idApartamentoAdjunto = $(this).attr('data-deptoadj');
        $.ajax({
            dataType: "json",
            url: BASE_URL + "/admin-ajax-apartamento",
            type: "POST",
            data: {
                idApartamentoAdjunto: idApartamentoAdjunto,
                ruta: ruta,
                action: 'deleteFoto'
            },
            success: function(response) {    
                if(response.msg == 'ok'){
                    getApartamentoFotos();
                    noty({
                        "text":response.data,
                        "layout":"top",
                        "type":"notification"
                    });
                }else{
                    noty({
                        "text":response.data,
                        "layout":"top",
                        "type":"error"
                    });
                }
            }
        }); 
        return false;
    });
}

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

function calcularPrecioTarifa() {
    var precio = parseFloat($('.tarifas_modal_form input[name=precio]').val());
    var descuento = parseFloat($('.tarifas_modal_form input[name=descuento]').val());
    
    if(precio > 0 && descuento > 0) {
        $('.tarifas_modal_form input[name=precioFinal]').val(precio - (precio * descuento / 100));
    } else {
        $('.tarifas_modal_form input[name=precioFinal]').val($('.tarifas_modal_form input[name=precio]').val());
    }
    
    
}

function mostrarAccionTarifa() {
    $('.modal-body-tarifa-gestion .tipo_accion').hide().find('input, select').prop('disabled', true);
    tipo_accion = $('#tipo_accion').val();
    $('.modal-body-tarifa-gestion .' + tipo_accion + '_accion').show().find('input, select').prop('disabled', false);
    
}

function agregarTarifa(){
    
    $('#tipo_accion').on('change', mostrarAccionTarifa);
    
    mostrarAccionTarifa();
    
    $('.tarifas_modal_form').submit(function(ev){
        ev.preventDefault();
        var form = $(this);
        var valid_form;
        valid_form = form.validationEngine('validate');
        if(valid_form){
            $.ajax({
                dataType: "json",
                url: BASE_URL + "/admin-ajax-calendario",
                type: "POST",
                data: form.serialize(),
                success: function(response) {    
                    if(response.msg == 'ok'){
                        $('#disponibilidad_overlay').modal('hide');
                        $('#contrato_precios_overlay').modal('hide');
                        $('#calendar').fullCalendar('destroy');
                        
                        Calendar.createTarifas();
                        
                        //$('.modal-body-tarifa-gestion').fadeOut();
                    }
                }
            }); 
        }else{
            console.log('invalid form !')
        }
    //$('#disponibilidad_overlay').modal('hide');
    });
}
function gestionTarifasFunctions(){
    $('#gestion_tarifas_form').submit(function(ev){
        ev.preventDefault();
        var form = $(this);
        var valid_form;
        valid_form = form.validationEngine('validate');
        
        if(valid_form){
            $.ajax({
                dataType: "json",
                url: BASE_URL + "/admin-ajax-apartamento",
                type: "POST",
                data: form.serialize(),
                success: function(response) {    
                    if(response.msg == 'ok'){
                        
                        noty({
                            "text":response.data,
                            "layout":"top",
                            "type":"information"
                        });
                    }
                }
            }); 
        }else{
            console.log('invalid form !')
        }
        
    });
}
function gestionGeneralFunctions(){
    
    $('#gestion_general_form').submit(function(ev){
        ev.preventDefault();
        var form = $(this);
        var action = form.find('.actionGestionGeneral');
        var valid_form;
        valid_form = form.validationEngine('validate');
        $('#idiomaDescripcionLarga').change();
        $('textarea[name=descripcionLarga]').val(JSON.stringify(DESCRIPCION_LARGA));
        
        $('#idiomaNormas').change();
        $('textarea[name=normas]').val(JSON.stringify(NORMAS));
        
        $('#idiomaInformacionPrivada').change();
        $('textarea[name=referencia]').val(JSON.stringify(REFERENCIA));
        $('textarea[name=manual]').val(JSON.stringify(MANUAL));
        
        $('#idiomaTPV').change();
        $('textarea[name=tpv]').val(JSON.stringify(TPV));
        
        if(valid_form){
            $.ajax({
                dataType: "json",
                url: BASE_URL + "/admin-ajax-apartamento",
                type: "POST",
                data: form.serialize(),
                success: function(response) {    
                    if(response.msg == 'ok'){
                        if(action.val()=='insert')
                            window.location = BASE_URL+'/admin-apartamento-gestion/id:'+response.idApartamento;
                        else
                            noty({
                                "text":response.data,
                                "layout":"top",
                                "type":"information"
                            });
                    }
                }
            }); 
        }else{
            noty({
                "text":'Error: Revise si todos los campos obligatorios fueron llenados correctamente.',
                "layout":"top",
                "type":"error"
            });
        }
        
    });
    
}

function gestionDocumentosFunctions() {
    
    $('#documentos-tab input[type=file]').off('change').on('change', function(e){
       $(this).parent().find('input[type=text]').val($(this).val());
    });
    
    $('#documentos-tab input[type=file] + input[type=text]').off('click').on('click', function(e){
        
        $('#' + $(this).attr('name') + 'File').click();
        
    }).off('keypress').on('keypress', function(e){
        e.preventDefault();
        return false;
    });
    
    eliminarDocumentos();
    
    $('#gestion_documentos_form').off('submit').on('submit', function(e){
        e.preventDefault();
                
        var formData = new FormData(this);
        noty({
            "text":"Procesando documentos:",
            "timeout": false,
            "type":"information"
        });
        $.ajax({
            url:BASE_URL + '/admin-ajax-apartamentoDocumentos', 
            data: formData, 
            type:'POST', 
            contentType: false, 
            processData:false,
            cache: false,
            dataType : 'json',
            success: function(response) {
                $.noty.closeAll();
                if(response.msg = 'ok') {
                    $('#documentos-tab').html(response.htmlDocumentos);
                    gestionDocumentosFunctions();
                    noty({
                        "text":response.data,
                        "layout":"top",
                        "type":"success"
                    });
                }
            },
            error: function(response) {
                
            }
        });
        
    });
    
     
}

function eliminarDocumentos() {
    $('a.eliminarDocumento').click(function(e){
        var tipo = $(this).attr('tipo-documento');
        $('#tipoDocumentoBorrar').val(tipo);
    });
    
    $('#btn_eliminar_documento').off('click').on('click', function(e){
       var tipo = $('#tipoDocumentoBorrar').val();
       var apartamentoId = $('input[name=apartamentoId]').val();
       $.ajax({
          url: BASE_URL + '/admin-ajax-apartamentoDocumentos',
          data: {
              action: 'eliminarDocumento',
              apartamentoId: apartamentoId,
              tipo: tipo
          },
          type: 'post',
          dataType: 'json',
          success: function(response) {
              if(response.msg = 'ok') {
                    $('#documentos-tab').html(response.htmlDocumentos);
                    gestionDocumentosFunctions();
                    noty({
                        "text":response.data,
                        "layout":"top",
                        "type":"success"
                    });
              }
          }
       });
    });
}

function gestionAvanzadosFunctions() {
    $('#tab-avanzado-frm').off('submit').on('submit', function(e){
       e.preventDefault();
       
       var data = $(this).serialize();
       
       $.ajax({
          url: BASE_URL + '/admin-ajax-apartamento',
          data: data,
          dataType: 'json',
          type: 'post',
          success: function(response){
              if(response.msg == 'ok')
                noty({
                      "text":response.data,
                      "layout":"top",
                      "type":"information"
                  });
              else
                  noty({
                      "text":response.data,
                      "layout":"top",
                      "type":"error"
                  });
          }
       });
    });
}

var DESCRIPCION_LARGA = {};
var IDIOMA_DESCRIPCION_LARGA = false;

var NORMAS = {};
var IDIOMA_NORMAS = false;

var IDIOMA_INFO = false;
var REFERENCIA = {};
var MANUAL = {};

var IDIOMA_TPV = false;
var TPV = {};
function gestionIdiomas() {
  
    //descripcion larga
    descripcionLarga = $('textarea[name=descripcionLarga]').val();
    $('#idiomaDescripcionLarga').off().change(function(e){
        
        if(IDIOMA_DESCRIPCION_LARGA) {            
            DESCRIPCION_LARGA[IDIOMA_DESCRIPCION_LARGA] = CKEDITOR.instances.descripcionLarga.getData();            
            CKEDITOR.instances.descripcionLarga.setData(DESCRIPCION_LARGA[$(this).val()]);            
        }
        IDIOMA_DESCRIPCION_LARGA = $(this).val();
        $('#descripcionLarga').val(DESCRIPCION_LARGA[IDIOMA_DESCRIPCION_LARGA]);
    });
    
    if(descripcionLarga && descripcionLarga.trim().length > 2) {
        if(descripcionLarga[0] != '{' || descripcionLarga[descripcionLarga.length - 1] != '}')
            descripcionLarga = "";
        else
            DESCRIPCION_LARGA = JSON.parse(descripcionLarga);
    }
    $('#idiomaDescripcionLarga').val('es');
        
    $('#idiomaDescripcionLarga').change();
    //normas
    normas = $('textarea[name=normas]').val();
    $('#idiomaNormas').off().change(function(e){
        if(IDIOMA_NORMAS){
            if(NORMAS) {            
                NORMAS[IDIOMA_NORMAS] = $('#normas').val();            
                $('#normas').val(NORMAS[$(this).val()]);            
            }
        }
        IDIOMA_NORMAS = $(this).val();
        $('#normas').val(NORMAS[IDIOMA_NORMAS]);
    });
    
    if(normas && normas.trim().length > 2) {
        if(normas[0] != '{' || normas[normas.length - 1] != '}')
            normas = "";
        else
            NORMAS = JSON.parse(normas);
    }
    $('#idiomaNormas').val('es');
        
    $('#idiomaNormas').change();
    
    //informacion privada
    referencia = $('textarea[name=referencia]').val();
    manual = $('textarea[name=manual]').val();
    $('#idiomaInformacionPrivada').off().change(function(e){
        if(IDIOMA_INFO){
            if(REFERENCIA) {            
                REFERENCIA[IDIOMA_INFO] = $('#referencia').val();            
                $('#referencia').val(REFERENCIA[$(this).val()]);            
            }
            if(MANUAL) {            
                MANUAL[IDIOMA_INFO] = $('#manual').val();            
                $('#manual').val(MANUAL[$(this).val()]);            
            }
        }
        IDIOMA_INFO = $(this).val();
        $('#referencia').val(REFERENCIA[IDIOMA_INFO]);
        $('#manual').val(MANUAL[IDIOMA_INFO]);
    });
    
    if(manual && manual.trim().length > 2) {
        if(manual[0] != '{' || manual[manual.length - 1] != '}')
            manual = "";
        else
            MANUAL = JSON.parse(manual);
    }
    
    if(referencia && referencia.trim().length > 2) {
        if(referencia[0] != '{' || referencia[referencia.length - 1] != '}')
            referencia = "";
        else
            REFERENCIA = JSON.parse(referencia);
    }
    
    $('#idiomaInformacionPrivada').val('es');
        
    $('#idiomaInformacionPrivada').change();
    
    
    //TPV
    tpv = $('textarea[name=tpv]').val();
    $('#idiomaTPV').off().change(function(e){
        
        if(IDIOMA_TPV) {            
            TPV[IDIOMA_TPV] = CKEDITOR.instances.tpv.getData();            
            CKEDITOR.instances.tpv.setData(TPV[$(this).val()]);            
        }
        IDIOMA_TPV = $(this).val();
        $('#tpv').val(TPV[IDIOMA_TPV]);
        CKEDITOR.instances.tpv.setData(TPV[IDIOMA_TPV]);
    });
    
    if(tpv && tpv.trim().length > 2) {
        if(tpv[0] != '{' || tpv[tpv.length - 1] != '}')
            tpv = "";
        else
            TPV = JSON.parse(tpv);
    }
    $('#idiomaTPV').val('es');
        
    $('#idiomaTPV').change();
}

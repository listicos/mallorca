$(document).ready(function(){
    
    var arrayNombreEmpresas = [];
    var arrayEmpresas;
      
    $('#funcion_go').val("updateEmpresa"); 
    //console.log(accionRemota);
    muestraContenido(window.accionRemota,window.idRemota);
    //var toUpdate_idEmpresa = 0;
    //S('#select_pais option[selected="selected"]').text()
    $('.noty').click(function(e) {  // esto habilita las notificaciones 
        e.preventDefault();
        var options = $.parseJSON($(this).attr('data-noty-options'));
        noty(options);
    });
   $('#no_info2').click(function(){
       console.log("im alive");
   });
    $('#buscarEmpresa').typeahead({
        matcher: function(item) {
            return true;
        },
        updater: function(item) {
         var dumbvar;
            $('#funcion_go').val("updateEmpresa");
             for (var i = 0; i < arrayEmpresas.length; i++) {
                 if( item === arrayEmpresas[i].nombre_fiscal){
                     //toUpdate_idEmpresa = arrayEmpresas[i].id_empresa;
                     $('#id_empresa_update').val(arrayEmpresas[i].id_empresa);
                      dumbvar = arrayEmpresas[i].id_empresa;
                 };
             };

        $.ajax({
            dataType: "json",
            url: BASE_URL + "/admin-ajax-empresa",
            type: "POST",
            data: {id_empresaUpdate: dumbvar,
                funcion_go: "obtenerInfo"
            },
            success: function(result) {
                
                if (typeof(result['empresa'].nombre)  !== "undefined" ) {
                    $('#respondable_nombre').val(result['empresa'].nombre);
                }
                if (typeof(result['empresa'].apellidoPaterno)  !== "undefined") {
                    $('#respondable_apellidoP').val(result['empresa'].apellidoPaterno);                   
                }
                if (typeof(result['empresa'].apellidoMaterno)  !== "undefined") {
                    $('#respondable_apellidoM').val(result['empresa'].apellidoMaterno);                   
                }
                if (typeof(result['empresa'].cif)  !== "undefined") {
                    $('#cif').val(result['empresa'].cif);                   
                }
                if (typeof(result['empresa'].email)  !== "undefined") {
                    $('#email').val(result['empresa'].email);                   
                }                
                if (typeof(result['empresa'].nombreFiscal)  !== "undefined") {
                    $('#nfiscal').val(result['empresa'].nombreFiscal); 
                }
                if (typeof(result['pais'])  !== "undefined") {
                    $('#select_pais option[value='+result['pais']+']').attr("selected",true);                   
                }
                if (typeof(result['moneda'])  !== "undefined") {
                    $('#idMoneda option[value='+result['moneda']+']').attr("selected",true);                   
                }
                if (typeof(result['direccion'].codigoPostal)  !== "undefined") {
                    $('#cp').val(result['direccion'].codigoPostal);                    
                }
                if (typeof(result['direccion'].calle)  !== "undefined") {
                    $('#nmbcalle').val(result['direccion'].calle);                    
                }
                if (typeof(result['direccion'].numero)  !== "undefined") {
                    $('#ncalle').val(result['direccion'].numero);                   
                }   
                if (typeof(result['direccion'].provincia)  !== "undefined") {
                    $('#provincia').val(result['direccion'].provincia);                   
                }
                if (typeof(result['cuenta'][0].iban)  !== "undefined") {
                    $('#cIBAN').val(result['cuenta'][0].iban);                   
                } 
                if (typeof(result['cuenta'][0].swif)  !== "undefined") {
                    $('#swift').val(result['cuenta'][0].swif);                   
                }
                if (typeof(result['cuenta'][0].idCuenta)  !== "undefined") {
                    $('#id_cuenta_update').val(result['cuenta'][0].idCuenta);                    
                }    
                if (typeof(result['direccion'].idDireccion)  !== "undefined") {
                    $('#id_direccion_update').val(result['direccion'].idDireccion);                    
                }
                

                //$('#id_empresa_update').val(toUpdate_idEmpresa);                
                $('.searched-info').slideDown();                
            }});  




            return item;
        }
    });    
    
    $('#buscarEmpresa').keyup(function(){
        arrayNombreEmpresas = [];  // inicia vacio para que cada query solo llene le data-source con los datos que hacen match
        var autocomplete = $('#buscarEmpresa').typeahead();
        autocomplete.data('typeahead').source = arrayNombreEmpresas;
        
         $.ajax({
            dataType: "json",
            url: BASE_URL + "/admin-ajax-empresa",
            type: "POST",
            data: { funcion_go: "fillingData",
                    data_toSearch : $('#buscarEmpresa').val()
            },
            success: function(result) {
            //arrayEmpresas = result;
                if (typeof(result) === 'object') {
                    arrayEmpresas = result;

                    if (result.length > 0) {
                        for (var i = 0; i < result.length; i++) {
                            if (typeof(result[i].nombre_fiscal) !== "undefined") {
                                arrayNombreEmpresas[i] = result[i].nombre_fiscal;
                            }

                        };
                        autocomplete = $('#buscarEmpresa').typeahead();
                        autocomplete.data('typeahead').source = arrayNombreEmpresas;
                    }

                }
            
            
            /*for (i = 0; i < result.length; i++) {
                arrayNombreEmpresas[i] = result[i].nombre_fiscal;                
            };
             autocomplete = $('#buscarEmpresa').typeahead();
             autocomplete.data('typeahead').source = arrayNombreEmpresas; */
             
             
            }});  

        
    });
    
   $('#buscarEmpresa').change( function(){
       $('#funcion_go').val("updateEmpresa");
        /*for (i = 0; i < arrayEmpresas.length; i++) {
            if($('#buscarEmpresa').val() === arrayEmpresas[i].nombre_fiscal){
                toUpdate_idEmpresa = arrayEmpresas[i].id_empresa;
            };
        };
        $.ajax({
            dataType: "json",
            url: BASE_URL + "/admin-ajax-empresa",
            type: "POST",
            data: {id_empresaUpdate: toUpdate_idEmpresa,
                funcion_go: "obtenerInfo"
            },
            success: function(result) {
                
                // chequeo si no nos dieron varibales vacias 
                if (typeof(result['empresa'].nombre)  !== "undefined" ) {
                    $('#respondable_nombre').val(result['empresa'].nombre);
                }
                if (typeof(result['empresa'].apellidoPaterno)  !== "undefined") {
                    $('#respondable_apellidoP').val(result['empresa'].apellidoPaterno);                   
                }
                if (typeof(result['empresa'].apellidoMaterno)  !== "undefined") {
                    $('#respondable_apellidoM').val(result['empresa'].apellidoMaterno);                   
                }
                if (typeof(result['empresa'].cif)  !== "undefined") {
                    $('#cif').val(result['empresa'].cif);                   
                }
                if (typeof(result['empresa'].nombreFiscal)  !== "undefined") {
                    $('#nfiscal').val(result['empresa'].nombreFiscal); 
                }
                if (typeof(result['pais'])  !== "undefined") {
                    $('#select_pais option[value='+result['pais']+']').attr("selected",true);                   
                }
                if (typeof(result['moneda'])  !== "undefined") {
                    $('#idMoneda option[value='+result['moneda']+']').attr("selected",true);                   
                }
                if (typeof(result['direccion'].codigoPostal)  !== "undefined") {
                    $('#cp').val(result['direccion'].codigoPostal);                    
                }
                if (typeof(result['direccion'].calle)  !== "undefined") {
                    $('#nmbcalle').val(result['direccion'].calle);                    
                }
                if (typeof(result['direccion'].numero)  !== "undefined") {
                    $('#ncalle').val(result['direccion'].numero);                   
                }   
                if (typeof(result['direccion'].provincia)  !== "undefined") {
                    $('#provincia').val(result['direccion'].provincia);                   
                }
                if (typeof(result['cuenta'][0].iban)  !== "undefined") {
                    $('#cIBAN').val(result['cuenta'][0].iban);                   
                } 
                if (typeof(result['cuenta'][0].swif)  !== "undefined") {
                    $('#swift').val(result['cuenta'][0].swif);                   
                }
                if (typeof(result['cuenta'][0].idCuenta)  !== "undefined") {
                    $('#id_cuenta_update').val(result['cuenta'][0].idCuenta);                    
                }    
                if (typeof(result['direccion'].idDireccion)  !== "undefined") {
                    $('#id_direccion_update').val(result['direccion'].idDireccion);                    
                }
                
                
                /*$('#respondable_nombre').val(result['empresa'].nombre);
                $('#respondable_apellidoP').val(result['empresa'].apellidoPaterno);
                $('#respondable_apellidoM').val(result['empresa'].apellidoMaterno);
                $('#cif').val(result['empresa'].cif);
                $('#nfiscal').val(result['empresa'].nombreFiscal); 
                $('#select_pais option[value='+result['pais']+']').attr("selected",true);
                $('#idMoneda option[value='+result['moneda']+']').attr("selected",true); 
                $('#cp').val(result['direccion'].codigoPostal); 
                $('#nmbcalle').val(result['direccion'].calle); 
                $('#ncalle').val(result['direccion'].numero);
                $('#provincia').val(result['direccion'].provincia);
                $('#cIBAN').val(result['cuenta'][0].iban);
                $('#swift').val(result['cuenta'][0].swif);
                toUpdate_idCuenta = result['cuenta'][0].idCuenta;
                toUpdate_idDireccion = result['direccion'].idDireccion;*/
                //$('#id_direccion_update').val(toUpdate_idDireccion);
                //$('#id_cuenta_update').val(toUpdate_idCuenta);
               /* $('#id_empresa_update').val(toUpdate_idEmpresa);                
                $('.searched-info').slideDown();                
            }});      */
        
   });
   
   
   $('#cancelar_operacion').click(function() {
        $('#operacion_cancelada').click();
   });
   
   

   
    $('#boton_nuevaEmpresa').click(function() {
        $('#funcion_go').val("agregarEmpresa");
       /* $.ajax({
            dataType: "json",
            url: BASE_URL + "/admin-ajax-empresa",
            type: "POST",
            data: {id_empresaUpdate: toUpdate_idEmpresa,
                funcion_go: "pruebaProv"
            },
            success: function(result) {
                console.log(result);
            }});  */   
      /*  $.ajax({
            dataType: "json",
            url: BASE_URL + "/admin-ajax-empresa",
            type: "POST",
            data: {id_empresaUpdate: toUpdate_idEmpresa,
                funcion_go: "testVal"
            },
            success: function(result) {
                console.log(typeof(result[0]['campoNoexistente']));
                console.log(result);
            }});   */
        $.ajax({
            dataType: "json",
            url: BASE_URL + "/admin-ajax-empresa",
            type: "POST",
            data: {
                funcion_go: "conseguirEmpresas"
            },
            success: function(result) {
                console.log(result);
            }});           
    });    
    
    
    $('#contenido-empresa').submit(function(ev){
        ev.preventDefault();
        var form = $(this);
        var valid_form;
        valid_form = form.validationEngine('validate');
        
        if(valid_form){
            $.ajax({
            dataType: "json",
            url: BASE_URL + "/admin-ajax-empresa",
            type: "POST",
            data: form.serialize(),
                success: function(response) {
                    if (response.msg === 'ok') {

                        $('.searched-info').slideUp();

                        if ($('#funcion_go').val() === "updateEmpresa") {
                            console.log("Información actualizada exitosamente");
                            $('#info_actualizada').click();
                        }
                        if ($('#funcion_go').val() === "agregarEmpresa") {
                            console.log("información agregada exitosamente");
                            $('#info_agregada').click();
                        }

                    }
                    else {
                       $('#error_info').click(function(e) {
                            e.preventDefault();
                        });
                    }
                    $("#contenido-empresa").reset();
                }
        }); 
        }else{
            console.log('invalid form !');            
        }        
    });

    $('#contenido-opinion').submit(function(ev){
        ev.preventDefault();
        var form = $(this);
       // valid_form = form.validationEngine('validate');
        
            $.ajax({
            dataType: "json",
            url: BASE_URL + "/admin-ajax-empresa",
            type: "POST",
            data: form.serialize(),
                success: function(response) {
                    if (response.msg === 'ok') {

                            console.log("información agregada exitosamente");

                    }
                    else {
                       $('#error_info').click(function(e) {
                            e.preventDefault();
                        });
                    }
                    $("#contenido-empresa").reset();
                }
        }); 
      
    });
    
});

jQuery.fn.reset = function () {
  $(this).each (function() { this.reset(); });
};


function muestraContenido(got,idBusqueda) {
    if (got === "agregar") {

        $('.searched-info').show();
        $('#funcion_go').val("agregarEmpresa");
    };
    if (got === "editar") {
        $('#funcion_go').val("updateEmpresa");
        $.ajax({
            dataType: "json",
            url: BASE_URL + "/admin-ajax-empresa",
            type: "POST",
            data: {id_empresaUpdate: idBusqueda,
                funcion_go: "obtenerInfo"
            },
            success: function(result) {
                
                if (typeof(result['empresa'].nombre)  !== "undefined" ) {
                    $('#respondable_nombre').val(result['empresa'].nombre);
                }
                if (typeof(result['empresa'].apellidoPaterno)  !== "undefined") {
                    $('#respondable_apellidoP').val(result['empresa'].apellidoPaterno);                   
                }
                if (typeof(result['empresa'].apellidoMaterno)  !== "undefined") {
                    $('#respondable_apellidoM').val(result['empresa'].apellidoMaterno);                   
                }
                if (typeof(result['empresa'].cif)  !== "undefined") {
                    $('#cif').val(result['empresa'].cif);                   
                }
                if (typeof(result['empresa'].email)  !== "undefined") {
                    $('#email').val(result['empresa'].email);                   
                }                
                if (typeof(result['empresa'].nombreFiscal)  !== "undefined") {
                    $('#nfiscal').val(result['empresa'].nombreFiscal); 
                }
                if (typeof(result['pais'])  !== "undefined") {
                    $('#select_pais option[value='+result['pais']+']').attr("selected",true);                   
                }
                if (typeof(result['moneda'])  !== "undefined") {
                    $('#idMoneda option[value='+result['moneda']+']').attr("selected",true);                   
                }
                if (typeof(result['direccion'].codigoPostal)  !== "undefined") {
                    $('#cp').val(result['direccion'].codigoPostal);                    
                }
                if (typeof(result['direccion'].calle)  !== "undefined") {
                    $('#nmbcalle').val(result['direccion'].calle);                    
                }
                if (typeof(result['direccion'].numero)  !== "undefined") {
                    $('#ncalle').val(result['direccion'].numero);                   
                }   
                if (typeof(result['direccion'].provincia)  !== "undefined") {
                    $('#provincia').val(result['direccion'].provincia);                   
                }
                if (typeof(result['cuenta'][0].iban)  !== "undefined") {
                    $('#cIBAN').val(result['cuenta'][0].iban);                   
                } 
                if (typeof(result['cuenta'][0].swif)  !== "undefined") {
                    $('#swift').val(result['cuenta'][0].swif);                   
                }
                if (typeof(result['cuenta'][0].idCuenta)  !== "undefined") {
                    $('#id_cuenta_update').val(result['cuenta'][0].idCuenta);                    
                }    
                if (typeof(result['direccion'].idDireccion)  !== "undefined") {
                    $('#id_direccion_update').val(result['direccion'].idDireccion);                    
                }
                            
                $('.searched-info').slideDown();                
            }});  
    };    
    if (got === "borrar") {
        $.ajax({
            dataType: "json",
            url: BASE_URL + "/admin-ajax-empresa",
            type: "POST",
            data: {
                funcion_go: "borrar",
                id_empresaDelete : idBusqueda      
            },
            success: function(result) {
                console.log(result);
            }}); 
    };    

};


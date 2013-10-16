<?php
$tipos_pagos = $this->getAttribute('tipos_pagos');
$paises = $this->getAttribute('paises');
$monedas = $this->getAttribute('monedas');
$idiomas = $this->getAttribute('idiomas');
$instalaciones = $this->getAttribute('instalaciones');
$contratos = $this->getAttribute('contratos');
?>
<div class="sidebar-nav-content">
    <div class="box box_templete">
        <div class="box-header well">
            <h2><i class="icon-th"></i>Datos del apartamento</h2>              
        </div>
        <div class="box-content">
            <form id="contenido-apartamento">
                <fieldset>
                    <div class="row-fluid">
                        <div class="control-group">
                            <div class="span4">
                                <div class="input-prepend center span12 typeahead" title="Buscar apartamento" data-rel="tooltip">
                                    <span class="add-on"><i class="icon-download-alt"></i></span><input autofocus autocomplete="off" class="input span10" name="bedificio" id="typeahead1" type="text" placeholder="Buscar apartamento" data-provide="typeahead" data-items="4" data-source='["Edificio 1","Edificio 2","Edificio 3","Edificio 4","Edificio 5","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'/>
                                </div>
                            </div>

                            <div class="span4">
                                <button class="btn mtop btn-primary noty show-edi" data-noty-options='{"text":"Por favor llena todos los campos","layout":"top","type":"information"}'>Agregar</button>                                        
                            </div>
                            <div class="span4">
                            </div>
                        </div>
                    </div>  

                    <div class="searched-edi hidden-obj">
                        <legend class="legend_custom">Datos básicos</legend>
                        <div class="row-fluid">
                            <div class="span4">
                                <div class="control-group">
                                    <div class="input-prepend center span12" title="Identificador del apartamento" data-rel="tooltip">
                                        <span class="add-on"><i class="icon-user"></i></span><input autofocus class="input-large span10 disabled" name="idEdificio" id="idEdificio" type="text" placeholder="ID edificio" disabled/>                                                
                                    </div>                                      
                                </div>  
                            </div> 
                        </div>    
                        <div class="row-fluid">
                            <div class="span4">
                                <div class="control-group">
                                    <div class="input-prepend center span12" title="Nombre" data-rel="tooltip">
                                        <span class="add-on"><i class="icon-user"></i></span><input autofocus class="input-large span10 validate[required]" name="nombre" id="nombre-ap" type="text" placeholder="Nombre" data-prompt-position="topLeft:2%"/>
                                    </div>                                      
                                </div> 
                            </div>
                            <div class="span4">
                                <div class="control-group">
                                    <div class="input-prepend center span12" title="Tipo del producto" data-rel="tooltip">
                                        <span class="add-on"><i class="icon-home"></i></span><input autofocus class="input-large span10 validate[required]" name="tipoProducto" id="tipo-ap" type="text" placeholder="Tipo del producto" data-prompt-position="topLeft:2%"/>
                                    </div>                                      
                                </div>                                     
                            </div>
                            <div class="span4">
                                <div class="control-group">
                                    <div class="input-prepend center span11" title="País" data-rel="tooltip">
                                        <span class="add-on"><i class="icon-globe"></i></span>
                                        <select class="input_large span10" name="idPais">
                                            <option value="" disabled selected>País</option>                                        
                                            <?php foreach ($paises as $pais) { ?>
                                                <option value="<?php echo $pais->idPais ?>" <?php if ($pais->nombreCompleto == 'España') echo 'selected="selected"' ?>><?php echo $pais->nombreCompleto ?></option>
                                            <?php } ?>   
                                        </select>        
                                    </div>                                          
                                </div>                                
                            </div>  

                        </div>
                        <div class="row-fluid direction_container">
                            <div class="span4">
                                <div class="control-group">
                                    <div class="input-prepend center span12" title="Dirección" data-rel="tooltip">
                                        <span class="add-on"><i class="other-icon-direction"></i></span><input autofocus class="input-large span10" name="provincia" id="geocomplete" type="text" placeholder="Escriba una dirección." value="Madrid, España" />
                                    </div>
                                </div>
                            </div>
                            <div class="span4">
                                <div class="control-group">
                                    <div class="input-prepend  center span12" title="Coódigo postal" data-rel="tooltip">
                                        <span class="add-on"><i class="icon-envelope"></i></span><input autofocus class="input-large span10 validate[required]" name="codigoPostal" id="codigo_postal" type="text" placeholder="Código postal" data-prompt-position="topLeft:2%"/>
                                    </div>
                                </div>                                        
                            </div>
                            <div class="span4">
                                <div class="control-group">
                                    <div class="input-prepend center span10" title="Número" data-rel="tooltip">
                                        <span class="add-on"><i class="icon-pencil"></i></span><input autofocus class="input-large span6" name="numero" id="numero_teatro" type="text" placeholder="Número" />
                                        <input id="buscar_direccion" type="button" value="Aplicar" class="btn span4 btn-primary borde-boton"/>                                               
                                    </div>
                                </div>                                     
                            </div>  
                            <div class="span12 localizacion_container" style="display: none">
                                <h3>Especifique la lozalización <i><small>* Coge el icono y posiciónalo en la localización correcta</small></i></h3>
                                <div class="map_canvas"></div>
                                <fieldset>
                                    <div class="control-group text-center">
                                        <input name="formatted_address" type="hidden" value="">
                                        <input id="guardar_direccion" class="btn btn-primary" type="button" value="Guardar" />
                                    </div>
                                </fieldset>
                                <div class="row-fluid">
                                    <div class="span4">
                                        <div class="control-group">
                                            <div class="input-prepend center span12" title="Latitud" data-rel="tooltip">
                                                <span class="add-on"><i class="icon-map-marker"></i></span><input autofocus class="input-large span10" name="lat" id="username" type="text" placeholder="Latitud" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="span4">
                                        <div class="control-group">
                                            <div class="input-prepend  center span12" title="Longitud" data-rel="tooltip">
                                                <span class="add-on"><i class="icon-map-marker"></i></span><input autofocus class="input-large span10" name="lon" id="username" type="text" placeholder="Longitud" />
                                            </div>
                                        </div>                                        
                                    </div>
                                    <div class="span4">
                                        <!--<div class="control-group">
                                            <button type="submit" class="btn btn-primary span6 custom_button_ubicar">Ubicar</button>
                                        </div>-->  
                                        <div class="control-group">                                    
                                            <div class="input-prepend center span11" title="Moneda base" data-rel="tooltip">
                                                <span class="add-on"><i class="other-icon-money"></i></span>
                                                <select class="input_large span10" name="idMoneda">
                                                    <option value="" disabled selected>Moneda base</option>                                        
                                                    <?php foreach ($monedas as $moneda) { ?>
                                                        <option value="<?php echo $moneda->idMoneda; ?>" <?php if ($pais->nombre == 'Euro') echo 'selected="selected"' ?>><?php echo $moneda->simbolo . ' ' . $moneda->nombre; ?></option>
                                                    <?php } ?>   
                                                </select> 
                                            </div>                                     
                                        </div>                                 
                                    </div>
                                </div>
                            </div>
                        </div>
                        
<!-- FORMAS DE PAGO                        <legend class="legend_custom">Formas de pago</legend> 
                        <div class="row-fluid">
                            <?php foreach ($tipos_pagos as $tpago) { ?>
                                <div class="span2">
                                    <div class="control-group">
                                        <input type="checkbox" name="idPagoTipo[]" class="" value="<?php echo $tpago->idPagoTipo; ?>" data-prompt-position="topLeft:2%"> <?php echo $tpago->nombre; ?>
                                    </div> 
                                </div>    
                            <?php } ?>
                            <div class="span3">
                                <div class="control-group">                                       
                                    <label class="checkbox inline">
                                        <input type="checkbox" id="paypalcheck" class="" value="option1">PayPal
                                    </label>                                            
                                </div> 
                                <div class="control-group">
                                    <div class="hidden-obj ppal">
                                        <div class="input-prepend pleft" title="Cuenta PayPal" data-rel="tooltip">
                                            <span class="add-on"><i class="icon-file"></i></span><input autofocus class="input-large span9" name="PayPal" id="username" type="text" placeholder="Cuenta PayPal" data-prompt-position="topLeft:2%" />
                                        </div>
                                    </div>
                                </div>                                          
                            </div>
                        </div>
-->

<!-- CONTRATO                        
                        <legend class="legend_custom">Contrato</legend>
                        <div class="row-fluid">
                            <div class="input-prepend span3" title="" data-rel="tooltip">
                                <select class="input span10 validate[required]" name="idContrato">
                                    <option value="" disabled selected>Selección</option>    
                                    <?php foreach ($contratos as $contrato) { ?>
                                        <option value="<?php echo $contrato->idContrato; ?>"><?php echo $contrato->nombre; ?></option>
                                    <?php } ?>
                                </select>                                 
                            </div>                          
                            <input class="add_contrato btn btn-primary" type="button" value="Agregar"/>
                        </div>
                        <div class="contrato_list" style="display: none">
                            <div  class="contrato_piece">
                                <div class="row-fluid">
                                    <div class="span3"></div>
                                    <div class="span3">
                                        <div class="control-group">
                                            <label left>Fecha de inicio</label>
                                            <input type="date" name="fechaInicio" placeholder="Type something…">
                                            <label>Fecha de término</label>
                                            <input type="date" name="fechaFinal" placeholder="Type something…">
                                        </div>
                                    </div>
                                    <div class="span3">
                                        <div class="control-group">
                                            <label>Precio</label>
                                            <input type="text" name="precio" placeholder="euro €">
                                            <label>Porcentaje</label>
                                            <input type="text" name="porcentaje" placeholder="%"> 
                                        </div>
                                    </div>
                                    <div class="span1">
                                        <input class=" boton_cancelar_contrato btn btn delete_contrato disabled" type="button" value="Cancelar"/>
                                    </div>
                                </div>
                            </div>
                        </div>
-->

<!-- HORARIOS                        <legend class="legend_custom">Horarios</legend>                            
                        <div class="row-fluid">
                            <div class="span6">
                                <div class="control-group">
                                    <label class="tips_label" for="typeahead">Click para marcar y establecer los horarios indicados</label>
                                </div>
                            </div> 
                        </div>
                        <div class="row-fluid">
                            <div class="span3">
                                <div class="control-group">
                                    <input type="checkbox" id="checkboxHentrada" class="" value="si" data-prompt-position="topLeft:2%"> Horario de entrada
                                </div> 
                            </div>                               
                            <div class="horario-entrada" style="display: none">
                                <div class="span3">
                                    <div class="input-append bootstrap-timepicker">
                                        <div class="control-group">
                                            <input id="horaEntrada" type="text" name="horarioEntrada" class="input-small validate[required]"><span class="add-on"><i class="icon-time focus-time-e"></i></span>
                                        </div>  
                                    </div>
                                </div>                                                
                            </div>
                            <div class="span3">
                                <div class="control-group">
                                    <input type="checkbox" id="checkboxHsalida" class="" name="es_entrada"  value="si" data-prompt-position="topLeft:2%"> Horario de salida
                                </div> 
                            </div>                                      
                            <div class="horario-salida" style="display: none">
                                <div class="span3">
                                    <div class="input-append bootstrap-timepicker">
                                        <div class="control-group">
                                            <input id="horaSalida" type="text" name="horarioSalida" class="input-small validate[required]"><span class="add-on"><i class="icon-time focus-time-s"></i></span>
                                        </div>  
                                    </div>
                                </div>                                        
                            </div>                                    
                        </div>   
-->

<!-- LUGARES CERCANOS                       <legend class="legend_custom">¿Qué hay cerca?</legend> 
                        <div class="row-fluid">
                            <div class="span6">
                                <div class="control-group">
                                    <p class="pleft">Agregar nueva zona
                                        <a href="#" class="btn new-zone"><i class="icon-pencil"></i></a>                                 
                                    </p>  
                                </div>                                     
                            </div>                                                            
                        </div>                                  
                        <div class='ul_child_impuesto' style='display:none'>
                            <li>
                                <div class="row-fluid">
                                    <div class="span6">
                                        <div class="control-group span6">
                                            <div class="input-prepend  center span12" title="Nombre de la zona" data-rel="tooltip">
                                                <span class="add-on"><i class="icon-road"></i></span><input autofocus class="input-large span10 validate[required]" name="nombresZonas[]" id="n-zona" type="text" placeholder="Nombre de la zona" />
                                            </div>
                                        </div> 
                                        <div class="control-group span3">
                                            <div class="input-prepend  center span12" title="Distancia" data-rel="tooltip">
                                                <span class="add-on"><i class="icon-road"></i></span><input autofocus class="input-large span6 validate[required]" name="valorLugares[]" type="text" placeholder="" />
                                            </div>
                                        </div>                                          
                                        <div class="control-group span3">                                    
                                            <div class="input-prepend span11 center" title="Medida" data-rel="tooltip">
                                                <select class="input_large span10 validate[required]" name="medidasZonas[]">                                       
                                                    <option value="km">km</option>
                                                    <option value="m">m</option>
                                                    <option value="min">min</option></select>                                 
                                            </div>                                                                               
                                        </div>      
                                    </div>
                                    <div class="span1">
                                        <div class="control-group center">
                                            <a href="#" class="btn delete_node borde-boton"><i class="icon-trash"></i></a> 
                                        </div>                                             
                                    </div>
                                </div>
                            </li>                                
                        </div>        
--> 
                        
<!-- EJEMPLOS LUGARES CERCA                        <div class="row-fluid">
                            <div class="span6">
                                <div class="control-group span6">
                                    <div class="input-prepend  center span12" title="Playa" data-rel="tooltip">
                                        <span class="add-on"><i class="icon-road"></i></span><input autofocus class="input-large span10" name="username" id="playa-ap" type="text" placeholder="Playa" />
                                    </div>
                                </div>
                                <div class="control-group span3">
                                    <div class="input-prepend  center span12" title="Distancia" data-rel="tooltip">
                                        <span class="add-on"><i class="icon-road"></i></span><input autofocus class="input-large span6" name="username" id="dist-playa-ap" type="text" placeholder="" />
                                    </div>
                                </div>                                          
                                <div class="control-group span3">                                    
                                    <div class="input-prepend span11 center" title="Moneda Base" data-rel="tooltip">
                                        <select class="input_large span10" name="username">
                                                                                    
                                            <option>km</option>
                                            <option>m</option>
                                            <option>min</option></select>                                 
                                    </div>                                                                               
                                </div>                                      
                            </div>
                            <div class="span6">
                                <div class="control-group span6">
                                    <div class="input-prepend  center span12" title="Aeropuerto" data-rel="tooltip">
                                        <span class="add-on"><i class="icon-road"></i></span><input autofocus class="input-large span10" name="username" id="aeropuerto-ap" type="text" placeholder="Aeropuerto" />
                                    </div>
                                </div>
                                <div class="control-group span3">
                                    <div class="input-prepend  center span12" title="Distancia" data-rel="tooltip">
                                        <span class="add-on"><i class="icon-road"></i></span><input autofocus class="input-large span6" name="username" id="dist-aeropuerto-ap" type="text" placeholder="" />
                                    </div>
                                </div>                                          
                                <div class="control-group span3">                                    
                                    <div class="input-prepend span11 center" title="Moneda Base" data-rel="tooltip">
                                        <select class="input_large span10" name="username">
                                                                                    
                                            <option>km</option>
                                            <option>m</option>
                                            <option>min</option></select>                                     
                                    </div>                                                                               
                                </div>                                      
                            </div>                              
                        </div> -->
                        <!--<div class="row-fluid">
                            <div class="span6">
                                <div class="control-group span6">
                                    <div class="input-prepend  center span12" title="Centro" data-rel="tooltip">
                                        <span class="add-on"><i class="icon-road"></i></span><input autofocus class="input-large span10" name="username" id="centro-ap" type="text" placeholder="Centro" />
                                    </div>
                                </div>
                                <div class="control-group span3">
                                    <div class="input-prepend  center span12" title="Distancia" data-rel="tooltip">
                                        <span class="add-on"><i class="icon-road"></i></span><input autofocus class="input-large span6" name="username" id="dist-centro-ap" type="text" placeholder="" />
                                    </div>
                                </div>                                          
                                <div class="control-group span3">                                    
                                    <div class="input-prepend span11 center" title="Moneda Base" data-rel="tooltip">
                                        <select class="input_large span10" name="username">
                                                                                   
                                            <option>km</option>
                                            <option>m</option>
                                            <option>min</option></select>                                     
                                    </div>                                                                               
                                </div>                                    
                            </div>
                            <div class="span6">
                                <div class="control-group span6">
                                    <div class="input-prepend  center span12" title="Transportes publicos" data-rel="tooltip">
                                        <span class="add-on"><i class="icon-road"></i></span><input autofocus class="input-large span10" name="username" id="trans-ap" type="text" placeholder="Transportes publicos" />
                                    </div>
                                </div>
                                <div class="control-group span3">
                                    <div class="input-prepend  center span12" title="Distancia" data-rel="tooltip">
                                        <span class="add-on"><i class="icon-road"></i></span><input autofocus class="input-large span6" name="username" id="dist-trans-ap" type="text" placeholder="" />
                                    </div>
                                </div>                                          
                                <div class="control-group span3">                                    
                                    <div class="input-prepend span11 center" title="Moneda Base" data-rel="tooltip">
                                        <select class="input_large span10" name="username">
                                                                                    
                                            <option>km</option>
                                            <option>m</option>
                                            <option>min</option></select>                                    
                                    </div>                                                                               
                                </div>                                     
                            </div>                              
                        </div>      -->                      
                        <!--<ul class="no_list_dots" id="impuestos_list"></ul>  -->
                        
                        <legend class="legend_custom">Descripciones</legend>                                 
                        <div class="row-fluid">
                            <div class="span3"></div>
                            <div class="span3"></div>
                            <div class="span2"></div>
                            <div class="span4">
                                <div class="control-group">
                                    <div class="input-prepend center span8" title="Idioma" data-rel="tooltip">
                                        <span class="add-on"><i class="icon-globe"></i></span>
                                        <select class="input_large span7 validate[required]" name="idIdioma">
                                            <option value="" disabled selected>Idioma</option>   
                                            <?php foreach ($idiomas as $idioma) { ?>
                                                <option value="<?php echo $idioma->idIdioma; ?>"><?php echo $idioma->nombre; ?></option>
                                            <?php } ?>
                                        </select>     
                                    </div>                                          
                                </div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span3">
                                <div class="control-group pleft">
                                    <label class="label-right" for="typeahead">Descripción del producto</label>
                                </div>                                    
                            </div>
                            <div class="span8">
                                <div class="control-group">
                                    <textarea name="descripcionCorta" rows="1" class="span12 validate[required]" placeholder="(una descripción breve para la publicidad)" id="desc-pub" data-prompt-position="topLeft:2%"></textarea>
                                </div>                                     
                            </div>                                
                        </div>
                        <div class="row-fluid">
                            <div class="span3">
                                <div class="control-group pleft">
                                    <label class="label-right" for="typeahead">Descripción del producto(extendida)</label>
                                </div>                                    
                            </div>
                            <div class="span8">
                                <div class="control-group">
                                    <textarea name="descripcionLarga" rows="3" class="span12 validate[required]" placeholder="escribir aquí..." data-prompt-position="topLeft:2%"></textarea>
                                </div>                                     
                            </div>                                  
                        </div>
                        <div class="row-fluid">
                            <div class="span3">
                                <div class="control-group pleft">
                                    <label class="label-right" for="typeahead">Descripción de los servicios</label>
                                </div>                                    
                            </div>
                            <div class="span8">
                                <div class="control-group">
                                    <textarea name="descripcionServicios" rows="3" class="span12 validate[required]" placeholder="escribir aquí..." data-prompt-position="topLeft:2%"></textarea>
                                </div>                                     
                            </div>  
                        </div>
                        <div class="row-fluid">
                            <div class="span3">
                                <div class="control-group pleft">
                                    <label class="label-right" for="typeahead">Descripción de las condiciones de uso del sitio web y consumo</label>
                                </div>                                    
                            </div>
                            <div class="span8">
                                <div class="control-group">
                                    <textarea name="descripcionCondiciones" rows="3" class="span12 validate[required]" placeholder="escribir aquí..." data-prompt-position="topLeft:2%"></textarea>
                                </div>                                     
                            </div>  
                        </div>
                        
<!-- CONDICIONES DE COMPRA                        <legend class="legend_custom">Condiciones de compra</legend>                            
                        <div class="row-fluid">
                            <div class="span4">
                                <div class="control-group">
                                    <p class="pleft">Agregar condición de compra
                                        <a href="#" class="btn" id="new_compra"><i class="icon-pencil"></i></a>                                 
                                    </p>  
                                </div>                                     
                            </div>                                                            
                        </div>                             
                        <div class='ul_child_compra' style='display:none'>
                            <li>
                                <div class="row-fluid cond_compra" style='display:none'>
                                    <div class="span4">
                                        <div class="control-group pleft">
                                            <div class="input-prepend span12" title="Nombre compra" data-rel="tooltip">
                                                <span class="add-on"><i class="icon-user"></i></span><input autofocus class="input-large span10" name="username" id="username" type="text" placeholder="Nombre de compra" />
                                            </div>                                                   
                                        </div>  
                                    </div>
                                    <div class="span2">
                                        <div class="center">
                                            <a href="#" class="btn right cf_bt"><i class="icon-cog"></i></a>
                                            <a href="#" class="btn delete_node right"><i class="icon-trash"></i></a>                                               
                                        </div>                                        
                                    </div>                                
                                </div>                                
                                <div class="row-fluid config_cond_compra">
                                    <div class="span6">
                                        <div class="control-group pleft">
                                            <div class="input-prepend span8" title="Nombre de compra" data-rel="tooltip">
                                                <span class="add-on"><i class="icon-user"></i></span><input autofocus class="input-large span10" name="username" id="username" type="text" placeholder="Nombre de compra" />
                                            </div>                                                   
                                        </div>                                     
                                    </div> 
                                    <div class="span3"></div>
                                    <div class="span3">
                                        <div class="control-group">
                                            <div class="input-prepend center span12" title="País" data-rel="tooltip">
                                                <span class="add-on"><i class="icon-globe"></i></span>
                                                <select class="input_large span9" name="username">
                                                    <option value="" disabled selected>Idioma</option>                                        
                                                    <option>inglés</option>
                                                    <option>español</option>
                                                    <option>alemán</option>
                                                    <option>huehue</option>
                                                    <option>ruso</option></select>                                    
                                            </div>                                          
                                        </div>
                                    </div>
                                </div>
                                <div class="row-fluid config_cond_compra">
                                    <div class="control-group pleft">
                                        <textarea rows="3" class="span12" placeholder="escribir aquí..."></textarea>
                                    </div>                                  
                                </div>
                                <div class="row-fluid config_cond_compra">
                                    <div class="control-group pleft">
                                        <button class="btn  btn-primary noty save_changes" data-noty-options='{"text":"Descripción agregada","layout":"top","type":"information"}'> Guardar</button>                                    
                                        <button class="btn save_changes">Cancelar</button>                                                         
                                    </div>                                   
                                </div>                                                                   
                            </li>
                        </div>
                        <ul class="no_list_dots" id="compras_list"></ul>   
-->                        
                        
<!-- GALERIA                        <legend class="legend_custom">Galería</legend>
                        <div class="row-fluid">
                            <div class="span6">
                                <div class="control-group">
                                    <label class="tips_label" for="typeahead">Puedes seleccionar multiples archivos</label>
                                </div>
                            </div> 
                        </div>
                        <div class="row-fluid">
                            <div class="span7">

                                <span class="btn btn-success fileinput-button">
                                    <i class="icon-plus icon-white"></i>
                                    <span>Add files...</span>
                                    <input type="file" name="files[]" multiple>
                                </span>
                                <button type="submit" class="btn btn-primary start">
                                    <i class="icon-upload icon-white"></i>
                                    <span>Start upload</span>
                                </button>
                                <button type="reset" class="btn btn-warning cancel">
                                    <i class="icon-ban-circle icon-white"></i>
                                    <span>Cancel upload</span>
                                </button>
                                <button type="button" class="btn btn-danger delete">
                                    <i class="icon-trash icon-white"></i>
                                    <span>Delete</span>
                                </button>
                                <input type="checkbox" class="toggle">

                                <span class="fileupload-loading"></span>
                            </div>

                            <div class="span5 fileupload-progress fade">

                                <div class="progress progress-success progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                                    <div class="bar" style="width:0%;"></div>
                                </div>

                                <div class="progress-extended">&nbsp;</div>
                            </div>
                        </div>

                        <div class="fileupload-loading"></div>                    

                        <table role="presentation" class="table table-striped"><tbody class="files" data-toggle="modal-gallery" data-target="#modal-gallery"></tbody></table>
                        <div class="row-fluid">
                            <div class="control-group">
                                <h3 class="color-negro">Interior</h3>                                
                            </div>                              
                        </div>
                        <ul class="thumbnails gallery">

                        </ul>                         
                        <div class="row-fluid">
                            <div class="control-group">
                                <h3 class="color-negro">Exterior</h3>                                
                            </div>                              
                        </div>
                        <ul class="thumbnails gallery">

                        </ul>
-->                        
                        
<!-- CONF APARTAMENTO                        <legend class="legend_custom">Configurar apartamento</legend>

                        <div class="row-fluid">
                            <div class="span4">
                                <div class="control-group">
                                    <p class="pleft">Agregar alojamiento
                                        <a href="#" class="btn" id="new_alojamiento"><i class="icon-pencil"></i></a>                                 
                                    </p>  
                                </div>                                     
                            </div>                                                            
                        </div>    
                        <div class='ul_child_alojamiento' style='display:none'>
                            <li>
                                <div class="row-fluid">
                                    <div class="span3">
                                        <div class="input-prepend center span11" title="Tipo" data-rel="tooltip">
                                            <span class="add-on"><i class="icon-globe"></i></span>
                                            <select class="input_large span10" name="username">
                                                <option value="" disabled selected>Tipo</option>                                        
                                                <option>Habitación</option>
                                                <option>Estudio</option>
                                                <option>Bungalow</option>
                                                <option>Villa</option>
                                                <option>Casa</option>                                            
                                                <option selected="selected">Apartamento</option></select>                                    
                                        </div>                                         
                                    </div> 
                                    <div class="span3">
                                        <div class="control-group">
                                            <div class="input-prepend center span12" title="Nombre" data-rel="tooltip">
                                                <span class="add-on"><i class="icon-user"></i></span><input autofocus class="input-large span10" name="username" id="ap-name" type="text" placeholder="Nombre" />
                                            </div>                                      
                                        </div> 
                                    </div>
                                    <div class="control-group span2">
                                        <div class="input-prepend  center span12" title="Código" data-rel="tooltip">
                                            <span class="add-on"><i class="icon-road"></i></span><input autofocus class="input-large span6" name="username" id="username" type="text" placeholder="Código" />
                                        </div>
                                    </div>  
                                    <div class="span2">
                                        <div class="center">
                                            <a href="#" class="btn right cf_apart"><i class="icon-cog"></i></a>
                                            <a href="#" class="btn delete_node right"><i class="icon-trash"></i></a>                                               
                                        </div>                                        
                                    </div>                                 
                                </div>
                                <div Class="detalles-aloj" style='display:none'>
                                    <div class="row-fluid">
                                        <div class="span2">
                                            <div class="control-group pleft">
                                                <label class="control-label center">nº mínimo pax</label>
                                            </div>
                                        </div>
                                        <div class="span1">
                                            <div class="control-group">                                    
                                                <div class="input-prepend span12 center" title="Moneda Base" data-rel="tooltip">
                                                    <select class="input_large span10" name="username">                                       
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option></select>                                 
                                                </div>                                                                               
                                            </div>                                          
                                        </div>
                                        <div class="span2">
                                            <div class="control-group pleft">
                                                <label class="control-label center">nº mínimo pax</label>
                                            </div>
                                        </div>
                                        <div class="span1">
                                            <div class="control-group">                                    
                                                <div class="input-prepend span12 center" title="Moneda Base" data-rel="tooltip">
                                                    <select class="input_large span10" name="username">                                       
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option></select>                                 
                                                </div>                                                                               
                                            </div>                                          
                                        </div>
                                        <div class="span2">
                                            <div class="control-group pleft">
                                                <label class="control-label center">nº mínimo pax</label>
                                            </div>
                                        </div>
                                        <div class="span1">
                                            <div class="control-group">                                    
                                                <div class="input-prepend span12 center" title="Moneda Base" data-rel="tooltip">
                                                    <select class="input_large span10" name="username">                                      
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option></select>                                 
                                                </div>                                                                               
                                            </div>                                          
                                        </div>                                    
                                    </div>
                                    <div class="row-fluid">
                                        <div class="span2">
                                            <div class="control-group pleft">
                                                <label class="control-label center">nº máximo pax</label>
                                            </div>
                                        </div>
                                        <div class="control-group span1">
                                            <div class="input-prepend  center span12" title="Nº maximo pax" data-rel="tooltip">
                                                <span class="add-on"><i class="icon-road"></i></span><input autofocus class="input-large span6" name="username" id="username" type="text" placeholder="" />
                                            </div>
                                        </div>      
                                        <div class="span2">
                                            <div class="control-group pleft">
                                                <label class="control-label center">n° máximo de adultos</label>
                                            </div>
                                        </div>
                                        <div class="control-group span1">
                                            <div class="input-prepend  center span12" title="N° máximo de adultos" data-rel="tooltip">
                                                <span class="add-on"><i class="icon-road"></i></span><input autofocus class="input-large span6" name="username" id="username" type="text" placeholder="" />
                                            </div>
                                        </div>      
                                        <div class="span2">
                                            <div class="control-group pleft">
                                                <label class="control-label center">n° máximo de niños</label>
                                            </div>
                                        </div>
                                        <div class="control-group span1">
                                            <div class="input-prepend  center span12" title="N° máximo de niños" data-rel="tooltip">
                                                <span class="add-on"><i class="icon-road"></i></span><input autofocus class="input-large span6" name="username" id="username" type="text" placeholder="" />
                                            </div>
                                        </div>                                        
                                    </div>
                                    <div class="row-fluid">
                                        <div class="span2">
                                            <div class=" kids-num">
                                                <div class="control-group pleft">
                                                    <label class="control-label center">n° máximo de bebés</label>
                                                </div>                                                
                                            </div>
                                        </div>
                                        <div class="control-group span1">
                                            <div class=" kids-num">
                                                <div class="input-prepend  center span12" title="N° máximo de bebés" data-rel="tooltip">
                                                    <span class="add-on"><i class="icon-road"></i></span><input autofocus class="input-large span6" name="username" id="username" type="text" placeholder="" />
                                                </div>                                                
                                            </div>                                            
                                        </div>                                           
                                    </div> 
                                    <div class="row-fluid">
                                        <div class="control-group pleft">
                                            <button class="btn  btn-primary noty save_aloj" data-noty-options='{"text":"Alojamiento agregado","layout":"top","type":"information"}'> Guardar</button>                                    
                                            <button class="btn save_aloj">Cancelar</button>                                                         
                                        </div>                                   
                                    </div>                                        
                                </div>
                            </li>                            
                        </div>
                        <ul class="no_list_dots" id="alojamiento_list">
                            <li>
                                <div class="row-fluid">
                                    <div class="span3">
                                        <div class="input-prepend center span11" title="Tipo" data-rel="tooltip">
                                            <span class="add-on"><i class="icon-globe"></i></span>
                                            <select class="input_large span10" name="username">
                                                <option value="" disabled selected>Tipo</option>                                        
                                                <option>Habitación</option>
                                                <option>Estudio</option>
                                                <option>Bungalow</option>
                                                <option>Villa</option>
                                                <option>Casa</option>                                            
                                                <option selected="selected">Apartamento</option></select>                                    
                                        </div>                                         
                                    </div> 
                                    <div class="span3">
                                        <div class="control-group">
                                            <div class="input-prepend center span12" title="Nombre" data-rel="tooltip">
                                                <span class="add-on"><i class="icon-user"></i></span><input autofocus class="input-large span10" name="username" id="ap-name" type="text" placeholder="Nombre" />
                                            </div>                                      
                                        </div> 
                                    </div>
                                    <div class="control-group span2">
                                        <div class="input-prepend  center span12" title="Código" data-rel="tooltip">
                                            <span class="add-on"><i class="icon-road"></i></span><input autofocus class="input-large span6" name="username" id="username" type="text" placeholder="Código" />
                                        </div>
                                    </div>  
                                    <div class="span2">
                                        <div class="center">
                                            <a href="#" class="btn right cf_apart"><i class="icon-cog"></i></a>
                                            <a href="#" class="btn delete_node right"><i class="icon-trash"></i></a>                                               
                                        </div>                                        
                                    </div>                                 
                                </div>
                                <div Class="detalles-aloj" style='display:none'>
                                    <div class="row-fluid">
                                        <div class="span2">
                                            <div class="control-group pleft">
                                                <label class="control-label center">nº mínimo pax</label>
                                            </div>
                                        </div>
                                        <div class="span1">
                                            <div class="control-group">                                    
                                                <div class="input-prepend span12 center" title="Moneda Base" data-rel="tooltip">
                                                    <select class="input_large span10" name="username">                                      
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option></select>                                 
                                                </div>                                                                               
                                            </div>                                          
                                        </div>
                                        <div class="span2">
                                            <div class="control-group pleft">
                                                <label class="control-label center">nº mínimo pax</label>
                                            </div>
                                        </div>
                                        <div class="span1">
                                            <div class="control-group">                                    
                                                <div class="input-prepend span12 center" title="Moneda Base" data-rel="tooltip">
                                                    <select class="input_large span10" name="username">                                      
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option></select>                                 
                                                </div>                                                                               
                                            </div>                                          
                                        </div>
                                        <div class="span2">
                                            <div class="control-group pleft">
                                                <label class="control-label center">nº mínimo pax</label>
                                            </div>
                                        </div>
                                        <div class="span1">
                                            <div class="control-group">                                    
                                                <div class="input-prepend span12 center" title="Moneda Base" data-rel="tooltip">
                                                    <select class="input_large span10" name="username">                                     
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option></select>                                 
                                                </div>                                                                               
                                            </div>                                          
                                        </div>                                    
                                    </div>
                                    <div class="row-fluid">
                                        <div class="span2">
                                            <div class="control-group pleft">
                                                <label class="control-label center">nº máximo pax</label>
                                            </div>
                                        </div>
                                        <div class="control-group span1">
                                            <div class="input-prepend  center span12" title="Nº maximo pax" data-rel="tooltip">
                                                <span class="add-on"><i class="icon-road"></i></span><input autofocus class="input-large span6" name="username" id="username" type="text" placeholder="" />
                                            </div>
                                        </div>      
                                        <div class="span2">
                                            <div class="control-group pleft">
                                                <label class="control-label center">n° máximo de adultos</label>
                                            </div>
                                        </div>
                                        <div class="control-group span1">
                                            <div class="input-prepend  center span12" title="N° máximo de adultos" data-rel="tooltip">
                                                <span class="add-on"><i class="icon-road"></i></span><input autofocus class="input-large span6" name="username" id="username" type="text" placeholder="" />
                                            </div>
                                        </div>      
                                        <div class="span2">
                                            <div class="control-group pleft">
                                                <label class="control-label center">n° máximo de niños</label>
                                            </div>
                                        </div>
                                        <div class="control-group span1">
                                            <div class="input-prepend  center span12" title="N° máximo de niños" data-rel="tooltip">
                                                <span class="add-on"><i class="icon-road"></i></span><input autofocus class="input-large span6" name="username" id="username" type="text" placeholder="" />
                                            </div>
                                        </div>                                        
                                    </div>
                                    <div class="row-fluid">
                                        <div class="span2">
                                            <div class=" kids-num">
                                                <div class="control-group pleft">
                                                    <label class="control-label center">n° máximo de bebés</label>
                                                </div>                                                
                                            </div>
                                        </div>
                                        <div class="control-group span1">
                                            <div class=" kids-num">
                                                <div class="input-prepend  center span12" title="N° máximo de bebés" data-rel="tooltip">
                                                    <span class="add-on"><i class="icon-road"></i></span><input autofocus class="input-large span6" name="username" id="username" type="text" placeholder="" />
                                                </div>                                                
                                            </div>                                            
                                        </div>                                           
                                    </div> 
                                    <div class="row-fluid">
                                        <div class="control-group pleft">
                                            <button class="btn  btn-primary noty save_aloj" data-noty-options='{"text":"Alojamiento agregado","layout":"top","type":"information"}'> Guardar</button>                                    
                                            <button class="btn save_aloj">Cancelar</button>                                                         
                                        </div>                                   
                                    </div>                                        
                                </div>
                            </li>
                        </ul>
-->                        
                        
<!-- INSTALACIONES                        <legend class="legend_custom">Instalaciones</legend>   
                        <?php
                        foreach ($instalaciones as $instal) {
                            $catego = $instal['categoria'];
                            $instalaciones_obj = $instal['instalacion'];
                            ?>
                            <h3 class="color-negro"><?php echo $catego->nombre; ?></h3>
                            <div class="row-fluid instalaciones_container">
                                <?php foreach ($instalaciones_obj as $instalacion) { ?>
                                    <div class="span3 instalaciones_row">
                                        <div class="control-group">
                                            <label class="checkbox inline">
                                                <input type="checkbox" name="idInstalacion[]"  value="<?php echo $instalacion->idInstalacion ?>"><?php echo $instalacion->nombre; ?>
                                            </label> 
                                        </div>                                        
                                    </div>
                                <?php } ?>
                            </div>
                        <?php } ?>  
-->                           
                            
                        <div class="control-group center">
                            <input type="hidden" name="action" value="insert" />
                            <!--<input class="submit btn  btn-primary" type="submit" value="Guardar">-->                                   
                            <button class="btn  btn-primary save_edi" type="submit" data-noty-options='{"text":"Información agregada exitosamente","layout":"top","type":"information"}'> Guardar</button>
                            <button class="btn abort-edi">Cancelar</button>                                                         
                        </div>   
                    </div> <!-- fin de informacion de busqueda -->
                </fieldset>
            </form>
            <div id="modal-gallery" class="modal modal-gallery hide fade" data-filter=":odd" tabindex="-1">
                <div class="modal-header">
                    <a class="close" data-dismiss="modal">&times;</a>
                    <h3 class="modal-title"></h3>
                </div>
                <div class="modal-body"><div class="modal-image"></div></div>
                <div class="modal-footer">
                    <a class="btn modal-download" target="_blank">
                        <i class="icon-download"></i>
                        <span>Download</span>
                    </a>
                    <a class="btn btn-success modal-play modal-slideshow" data-slideshow="5000">
                        <i class="icon-play icon-white"></i>
                        <span>Slideshow</span>
                    </a>
                    <a class="btn btn-info modal-prev">
                        <i class="icon-arrow-left icon-white"></i>
                        <span>Previous</span>
                    </a>
                    <a class="btn btn-primary modal-next">
                        <span>Next</span>
                        <i class="icon-arrow-right icon-white"></i>
                    </a>
                </div>

            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>

<script id="template-upload" type="text/x-tmpl">
    {% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-upload">
        <td>
            <span class="preview"></span>
        </td>
        <td>
            <p class="name">{%=file.name%}</p>
            {% if (file.error) { %}
            <div><span class="label label-important">Error</span> {%=file.error%}</div>
            {% } %}
        </td>
        <td>
            <p class="size">{%=o.formatFileSize(file.size)%}</p>
            {% if (!o.files.error) { %}
            <div class="progress progress-success progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="bar" style="width:0%;"></div></div>
            {% } %}
        </td>
        <td>
            {% if (!o.files.error && !i && !o.options.autoUpload) { %}
            <button class="btn btn-primary start">
                <i class="icon-upload icon-white"></i>
                <span>Start</span>
            </button>
            {% } %}
            {% if (!i) { %}
            <button class="btn btn-warning cancel">
                <i class="icon-ban-circle icon-white"></i>
                <span>Cancel</span>
            </button>
            {% } %}
        </td>
    </tr>
    {% } %}
</script>

<script id="template-download" type="text/x-tmpl">
    {% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-download">
        <td>
            <span class="preview">
                {% if (file.thumbnail_url) { %}
                <a href="{%=file.url%}" title="{%=file.name%}" data-gallery="gallery" download="{%=file.name%}"><img src="{%=file.thumbnail_url%}"></a>
                {% } %}
            </span>
        </td>
        <td>
            <p class="name">
                <a href="{%=file.url%}" title="{%=file.name%}" data-gallery="{%=file.thumbnail_url&&'gallery'%}" download="{%=file.name%}">{%=file.name%}</a>
            </p>
            {% if (file.error) { %}
            <div><span class="label label-important">Error</span> {%=file.error%}</div>
            {% } %}
        </td>
        <td>
            <span class="size">{%=o.formatFileSize(file.size)%}</span>
        </td>
        <td>
            <button class="btn btn-danger delete" data-type="{%=file.delete_type%}" data-url="{%=file.delete_url%}"{% if (file.delete_with_credentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                    <i class="icon-trash icon-white"></i>
                <span>Delete</span>
            </button>
            <input type="checkbox" name="delete" value="1" class="toggle">
        </td>
    </tr>
    {% } %}
</script>        
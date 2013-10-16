
<noscript>
<div class="alert alert-block span10">
    <h4 class="alert-heading">Warning!</h4>
    <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
</div>
</noscript>
<?php $paises = $this->getAttribute('paises'); ?>
<?php $monedas = $this->getAttribute('monedas'); ?>
<?php $provs = $this->getAttribute('provincias');?>


<div class="sidebar-nav-content">
    <div>
        <div class="box box_templete">
            <div class="box-header well">
                <h2><i class="icon-th"></i>Datos del Propietario</h2>              
            </div>
            <div class="box-content">
                <div>
                    <form id="contenido-empresa">
                        <fieldset>
                            <!-- <legend class="legend_custom">Buscar:</legend>                                                    
                             <div class="row-fluid">
 
                                 <div class="span8">
                                     <div class="control-group pleft">-->
                            <div class="row">
                                <div class="control-group">
                                    <div class="span5">
                                        <div class="input-prepend span5 typeahead" title="Buscar" data-rel="tooltip">
                                            <span class="add-on"><i class="icon-download-alt"></i></span><input autofocus autocomplete="off" class="input span4" name="buscarEmpresa" id="buscarEmpresa" type="text" placeholder="Buscar empresa" data-provide="typeahead" data-items="10" data-source='[]'/>
                                        </div> 
                                    </div>
                                    <div class="span3">     
                                        <button class="btn mtop btn-primary noty show-info" id="boton_nuevaEmpresa" data-noty-options='{"text":"Por favor llena todos los campos","layout":"top","type":"information"}'>Agregar</button>                                        
                                    </div>
                                </div>                         
                            </div>
                            <div class="save-message" style="display: none">
                                <button class="btn btn-primary noty notify-save" data-noty-options='{"text":"Se ha efectuado un respaldo automático de su información","layout":"top","type":"information"}'> Agregar Nueva</button>                                
                            </div>
                            <div class="searched-info hidden-obj">
                                <legend class="legend_custom">Responsable</legend>
                                <div class="row-fluid">
                                    <div class="span4">
                                        <div class="control-group">
                                            <div class="input-prepend center span12" title="Nombre" data-rel="tooltip">
                                                <span class="add-on"><i class="icon-user"></i></span><input autofocus class="input-large span10 validate[required]" name="nombre" id="respondable_nombre" type="text" placeholder="Nombre" data-prompt-position="topLeft:2%"/>
                                            </div>                                      
                                        </div> 
                                    </div>
                                    <div class="span4">
                                        <div class="control-group">
                                            <div class="input-prepend center span12" title="Apellido paterno" data-rel="tooltip">
                                                <span class="add-on"><i class="icon-user"></i></span><input autofocus class="input-large span10 validate[required]" name="apellidoPaterno" id="respondable_apellidoP" type="text" placeholder="Apellido paterno" data-prompt-position="topLeft:2%"/>
                                            </div>                                      
                                        </div>                                     
                                    </div>
                                    <div class="span4">
                                        <div class="control-group">
                                            <div class="input-prepend center span12" title="Apellido materno" data-rel="tooltip">
                                                <span class="add-on"><i class="icon-user"></i></span><input autofocus class="input-large span10 validate[required]" name="apellidoMaterno" id="respondable_apellidoM" type="text" placeholder="Apellido materno" data-prompt-position="topLeft:2%"/>
                                            </div>                                      
                                        </div>                                     
                                    </div>  
                                </div>
                                <div class="row-fluid">
                                    <div class="span4">
                                        <div class="control-group">
                                            <div class="input-prepend center span12" title="Email" data-rel="tooltip">
                                                <span class="add-on"><i class="icon-envelope"></i></span><input autofocus class="input-large span10 validate[required,custom[email]]" name="email" id="email" type="text" placeholder="Email" data-prompt-position="topLeft:2%"/>
                                            </div>                                        
                                        </div>                                     
                                    </div>                                       
                                </div>
                                <legend class="legend_custom">Datos generales</legend>
                                <div class="row-fluid">
                                    <div class="span4">
                                        <div class="control-group">                                   
                                            <div class="input-prepend center span12" title="Nombre del propietario" data-rel="tooltip">
                                                <span class="add-on"><i class="icon-briefcase"></i></span><input autofocus class="input-large span10 validate[required]" name="nombreFiscal" id="nfiscal" type="text" placeholder="Nombre fiscal(empresa)" data-prompt-position="topLeft:2%"/>
                                            </div>
                                        </div> 
                                        <div class="control-group">                                    
                                            <div class="input-prepend center span12" title="CIF" data-rel="tooltip">
                                                <span class="add-on"><i class="icon-file"></i></span><input autofocus class="input-large span10 validate[required]" name="cif" id="cif" type="text" placeholder="CIF" data-prompt-position="topLeft:2%"/>
                                            </div> 
                                        </div>
                                        <div class="control-group">
                                            <div class="input-prepend center span12" title="Nombre de la calle" data-rel="tooltip">
                                                <span class="add-on"><i class="icon-road"></i></span><input autofocus class="input-large span10" name="calle" id="nmbcalle" type="text" placeholder="Nombre de la calle" />
                                            </div>
                                        </div>
                                        <div class="control-group"> 
                                            <div class="input-prepend center span12" title="Número de la calle" data-rel="tooltip">
                                                <span class="add-on"><i class="icon-road"></i></span><input autofocus class="input-large span10" name="numero" id="ncalle" type="text" placeholder="Número" />
                                            </div>                                    
                                        </div>                                        
                                    </div>
                                    <div class="span4">
                                        <div class="control-group">
                                            <div class="input-prepend center span12" title="Provincia o estado" data-rel="tooltip">
                                                <span class="add-on"><i class="icon-globe"></i></span><input autofocus class="input-large span10" name="provincia" id="provincia" type="text" placeholder="Provincia o estado" />
                                            </div>
                                             <!--<div class="input-prepend center span12" title="provincia" data-rel="tooltip">
                                                <span class="add-on"><i class="icon-globe"></i></span>
                                                <select class="input_large span10" name="provincia" id="select_provincia">
                                                    <option  disabled>Provincia</option>                                        
                                                    <?php foreach ($provs as $provin) { ?>
                                                        <option value="<?php echo $provin->idMoneda; ?>"><?php echo $provin->nombre; ?></option>
                                                    <?php } ?>                                                 
                                                </select>                                     
                                            </div> -->                                             
                                        </div>
                                        <div class="control-group">
                                            <div class="input-prepend center span12" title="Código postal" data-rel="tooltip">
                                                <span class="add-on"><i class="icon-envelope"></i></span><input autofocus class="input-large span10" name="codigoPostal" id="cp" type="text" placeholder="Código postal" />
                                            </div>                                            
                                        </div>   
                                        <div class="control-group">                                    
                                            <div class="input-prepend center span12" title="Número de cuenta IBAN" data-rel="tooltip">
                                                <span class="add-on"><i class="icon-lock"></i></span><input autofocus class="input-large span10 validate[required]" name="iban" id="cIBAN" type="text" placeholder="Número de cuenta IBAN" data-prompt-position="topLeft:2%"/>
                                            </div>                                         
                                        </div> 
                                    </div>
                                    <div class="span4 no_right_margin">
                                        <div class="control-group">
                                            <div class="input-prepend center span12" title="Pais" data-rel="tooltip">
                                                <span class="add-on"><i class="icon-globe"></i></span>
                                                <select class="input_large span10 validate[required]" name="idPais" id="select_pais">
                                                    <option  disabled>País</option>                                        
                                                    <?php foreach ($paises as $pais) { ?>
                                                        <option value="<?php echo $pais->idPais ?>" <?php if ($pais->nombreCompleto == 'España') echo 'selected="selected"' ?>><?php echo $pais->nombreCompleto ?></option>
                                                    <?php } ?>                                                
                                                </select>                                    
                                            </div>                                          
                                        </div>
                                        <div class="control-group">                                    
                                            <div class="input-prepend center span12" title="Swif" data-rel="tooltip">
                                                <span class="add-on"><i class="icon-file"></i></span><input autofocus class="input-large span10 validate[required]" name="swif" id="swift" type="text" placeholder="Swift" data-prompt-position="topLeft:2%"/>
                                            </div>                                        
                                        </div>
                                        <div class="control-group">                                    
                                            <div class="input-prepend center span12" title="Moneda base" data-rel="tooltip">
                                                <span class="add-on"><i class="icon-globe"></i></span>
                                                <select class="input_large span10 validate[required]" name="idMoneda" id="idMoneda">
                                                    <option disabled>Moneda Base</option>  
                                                    <?php foreach ($monedas as $moneda) { ?>
                                                        <option value="<?php echo $moneda->idMoneda; ?>" <?php if ($pais->nombre == 'Euro') echo 'selected="selected"' ?>><?php echo $moneda->simbolo . ' ' . $moneda->nombre; ?></option>
                                                    <?php } ?>    
                                                </select>
                                            </div>                                                                               
                                        </div>                                          
                                    </div>
                                </div>           
                                <div class="hidden-obj">                                                                       
                                    <input name="funcion_go" id="funcion_go" value="placeholder" type="hidden"/> 
                                    <input name="id_direccion_update" value="" id="id_direccion_update" type="hidden"/> 
                                    <input name="id_cuenta_update" value="" id="id_cuenta_update" type="hidden"/>
                                    <input name="id_empresa_update" value="" id="id_empresa_update" type="hidden"/>                                     
                                    <input name="action" value="insert" type="hidden"/> 
                                    <input name="lat" value="40.4113554" type="hidden"/>
                                    <input name="lon" value="-3.7028359" type="hidden"/>
                                    <input name="nombre_provincia" value="placeholder" id="nombre_provincia" type="hidden"/>                                     
                                    <button class="btn btn-primary noty" id="info_agregada" data-noty-options='{"text":"Información agregada exitosamente.","layout":"top","type":"information"}'></button>    
                                    <button class="btn btn-primary noty" id="info_actualizada" data-noty-options='{"text":"Información actualizada exitosamente.","layout":"top","type":"information"}'></button>                                    
                                    <button class="btn btn-primary noty" id="operacion_cancelada" data-noty-options='{"text":"Operación cancelada.","layout":"top","type":"information"}'></button>
                                    <button class="btn btn-primary noty" id="error_info" data-noty-options='{"text":"Lo sentimos hubo un error la información no se pudo procesar.","layout":"top","type":"information"}'></button>                                        
                                </div> 
                                <div class="control-group center">
                                    <!--<input class="submit btn  btn-primary" type="submit" value="Guardar">-->
                                    <button class="btn  btn-primary save_c" type="submit">Guardar</button>
                                    <button class="btn abort-act" id="cancelar_operacion">Cancelar</button>
                               
                                </div>                              
                            </div> 
                        </fieldset>
                    </form>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>

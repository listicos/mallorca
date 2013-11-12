
<?php $configuracion = $this->getAttribute('configuracion'); 
    $paises = $this->getAttribute('paises');
?>

<div class="sidebar-nav-content">
    <div class="box box_templete">
        <div class="box-header well">
            <h2><i class="icon-th"></i> Configuraci&oacute;n</h2>              
        </div>
        <div class="box-content">
            <div>
                <form id="configuracion_form">
                    <fieldset>
                        <div class="searched-info">
                            
                        <legend class="legend_custom titulos_legend">Configuración de email</legend>
                        <div class="row-fluid email_container">
                            <div class="row-fluid">
                                <div class="span4">
                                    <div class="control-group">
                                        <div class="input-prepend center span12" title="Email" data-rel="tooltip">
                                            <span class="add-on"><i class="icon-envelope"></i></span><input class="input-large span10" name="email" type="text" placeholder="Email." value="<?php echo $configuracion->email; ?>" />
                                        </div>
                                    </div>
                                </div>
                                <div class="span4">
                                    <div class="control-group">
                                        <div  class="input-prepend  center span12" title="Usuario" data-rel="tooltip">
                                            <span class="add-on"><i class="icon-user"></i></span><input class="input-large span10" name="username" type="text" placeholder="Usuario" data-prompt-position="topLeft:2%"  value="<?php echo $configuracion->username; ?>" />
                                        </div>
                                    </div>                                        
                                </div>
                                <div class="span4">
                                    <div class="control-group">
                                        <div class="input-prepend center span12" title="Contrase&ntilde;a" data-rel="tooltip">
                                            <span class="add-on"><i class="icon-pencil"></i></span><input class="input-large span10" name="password" type="password" placeholder="Contrase&ntilde;a"  value="<?php echo $configuracion->password; ?>" />
                                        </div>
                                    </div>                                     
                                </div>  
                            </div>
                            <div class="row-fluid">
                                <div class="span4">
                                    <div class="control-group">
                                        <div class="input-prepend center span12" title="Servidor Smtp" data-rel="tooltip">
                                            <span class="add-on"><i class="icon-envelope"></i></span><input class="input-large span10" name="servidor" type="text" placeholder="Servidor Smtp." value="<?php echo $configuracion->servidor; ?>" />
                                        </div>
                                    </div>
                                </div>
                                <div class="span4">
                                    <div class="control-group">
                                        <div  class="input-prepend  center span12" title="Puerto" data-rel="tooltip">
                                            <span class="add-on"><i class="icon-pencil"></i></span><input class="input-large span10" name="puerto" type="text" placeholder="Puerto" data-prompt-position="topLeft:2%"  value="<?php echo $configuracion->puerto; ?>" />
                                        </div>
                                    </div>                                        
                                </div>
                                
                            </div>
                        </div>
                        <legend class="legend_custom titulos_legend">Información de la ubicación</legend> 
                        <div class="row-fluid direction_container">
                            <div class="row-fluid">
                                <div class="span4">
                                    <div class="control-group">
                                        <div class="input-prepend center span12" title="Dirección" data-rel="tooltip">
                                            <span class="add-on"><i class="other-icon-direction"></i></span><input class="input-large span10" name="provincia" id="geocomplete" type="text" placeholder="Escriba una dirección." value="<?php echo $configuracion->direccion->provincia; ?>" />
                                        </div>
                                    </div>
                                </div>
                                <div class="span4">
                                    <div class="control-group">
                                        <div  class="input-prepend  center span12" title="Código postal data-rel="tooltip"">
                                            <span class="add-on"><i class="icon-envelope"></i></span><input class="input-large span10" name="codigoPostal" id="codigo_postal" type="text" placeholder="Código postal" data-prompt-position="topLeft:2%"  value="<?php echo $configuracion->direccion->codigoPostal; ?>" />
                                        </div>
                                    </div>                                        
                                </div>
                                <div class="span4">
                                    <div class="control-group">
                                        <div class="input-prepend center span12" title="Número" data-rel="tooltip">
                                            <span class="add-on"><i class="icon-pencil"></i></span><input class="input-large span10" name="numero" id="numero_teatro" type="text" placeholder="Número"  value="<?php echo $configuracion->direccion->numero; ?>"/>
                                        </div>
                                    </div>                                     
                                </div>  
                            </div>
                            <div class="row-fluid">
                                <div class="span4">
                                    <div class="control-group">
                                        <div class="input-prepend center span12" title="Latitud" data-rel="tooltip">
                                            <span class="add-on"><i class="icon-map-marker"></i></span><input class="input-large span10" name="lat" id="username" type="text" placeholder="Latitud" value="<?php echo $configuracion->direccion->lat; ?>" />
                                        </div>
                                    </div>
                                </div>
                                <div class="span4">
                                    <div class="control-group">
                                        <div class="input-prepend  center span12" title="Longitud" data-rel="tooltip">
                                            <span class="add-on"><i class="icon-map-marker"></i></span><input class="input-large span10" name="lon" id="username" type="text" placeholder="Longitud" value="<?php echo $configuracion->direccion->lon; ?>"/>
                                        </div>
                                    </div>                                        
                                </div>
                                <div class="span4">
                                    <div class="control-group">
                                        <div class="input-prepend center span12" title="País" data-rel="tooltip">
                                            <span class="add-on"><i class="icon-globe"></i></span>
                                            <select class="input_large span10" name="idPais">
                                                <?php foreach ($paises as $pais) { ?>
                                                    <option value="<?php echo $pais->idPais ?>" <?php if ($pais->idPais == $configuracion->direccion->idPais) echo 'selected="selected"' ?>><?php echo $pais->nombreCompleto ?></option>
                                                <?php } ?>   
                                            </select>        
                                        </div>                                          
                                    </div>                                
                                </div> 
                            </div>
                            <div class="span12 localizacion_container">
                                <h3>Especifique la localización <i><small>* Coge el icono y posiciónalo en la localización correcta</small></i></h3>
                                <div class="map_canvas"></div>
                            </div>

                            <div class="control-group center">
                                <input type="hidden" name="action" value="updateConfiguracion">
                                
                                <button class="btn  btn-primary" type="submit">Guardar</button>
                            </div>                              
                        </div> 
                    </fieldset>
                </form>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
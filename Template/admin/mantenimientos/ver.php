<?php 
$mantenimiento = $this->getAttribute('mantenimiento');
?>
<div class="sidebar-nav-content">
       <div class="box box_templete">
            <div class="box-header well">
                <h2><i class="icon-wrench"></i>Detalles de Mantenimiento</h2>              
            </div>
            <div class="box-content">
                   <form id="gestion_mantenimiento_form" method="POST">
                       <?php if($mantenimiento) { ?>
                        <input type="hidden" name="mantenimientoId" value="<?php echo $mantenimiento->idMantenimiento; ?>">
                       <?php } ?>
                        <input type="hidden" name="action" value="updateMantenimiento">
                        <fieldset>
                            <legend class="legend_custom titulos_legend">Datos generales</legend>
                            <div class="row-fluid">
                             <?php if(!isset($aptoId)) { ?>
                                
                                    <div class="span4">
                                        <div class="control-group">
                                            <div class="input-prepend center span12" title="Apartamento" data-rel="tooltip">
                                                <span class="add-on"><i class="icon-home"></i></span>
                                                <input autofocus class="input-large span10 validate[required]" value="<?php if($mantenimiento->apartamento) echo $mantenimiento->apartamento->nombre; ?>" name="apartamento" id="apartamento" type="text" placeholder="Apartamento" data-prompt-position="topLeft:2%" data-type="user"/>
                                                <input type="hidden" name="idApartamento" id="apartamentoId" value="<?php echo $mantenimiento->idApartamento; ?>">
                                            </div>                                      
                                        </div>
                                    </div>
                                
                            <?php } else { ?>
                                <input type="hidden" id="hiddenaptoreservar" name="idApartamento" value="<?php echo $aptoId; ?>">
                            <?php } ?>
                                   
                                <div class="span4">
                                    <div class="control-group">
                                        <div class="input-prepend center span12" title="Solicitante" data-rel="tooltip">
                                            <span class="add-on"><i class="icon-user"></i></span><input value="<?php echo $mantenimiento->solicitante?>"  class="input-large span10 validate[required]" name="solicitante" type="text" placeholder="Solicitante" data-prompt-position="topLeft:2%"/>
                                        </div>                                      
                                    </div> 
                                </div>
                                <div class="span4">
                                    <div class="control-group">
                                        <div class="input-prepend center span12" data-rel="tooltip" data-original-title="Ubicaci&oacute;n">
                                            <span class="add-on"><i class="icon-globe"></i></span>
                                            <input value="<?php echo $mantenimiento->ubicacion; ?>"  class="input-large span10 validate[required]" name="ubicacion" type="text" placeholder="Ubicaci&oacute;n" data-prompt-position="topLeft:2%"/>                                    
                                        </div>                                          
                                    </div>
                                </div>
                        </div>
                        <div class="row-fluid">
                        <legend class="legend_custom titulos_legend">Trabajos solicitados</legend>
                        </div>
                        <div class="row-fluid">
                                <div class="span10">
                                    <div class="control-group">

                                        <div class="input-prepend center span12" title="Trabajos solicitados" data-rel="tooltip">
                                            <textarea rows="4"  class="input-large span12 validate[required]" name="trabajosSolicitados" type="text" placeholder="Trabajos solicitados" data-prompt-position="topLeft:2%"><?php echo $mantenimiento->trabajosSolicitados?></textarea>
                                        </div>                                      
                                    </div>
                                </div>
                        </div>
                        <div class="row-fluid">
                        <legend class="legend_custom titulos_legend">Informe t&eacute;cnico</legend>
                        </div>
                        <div class="row-fluid">
                                <div class="span10">
                                    <div class="control-group">

                                        <div class="input-prepend center span12" title="Informe T&eacute;cnico" data-rel="tooltip">
                                            <textarea rows="4"  class="input-large span12 validate[required]" name="informeTecnico" type="text" placeholder="Informe t&eacute;cnico" data-prompt-position="topLeft:2%"><?php echo $mantenimiento->informeTecnico?></textarea>
                                        </div>                                      
                                    </div>
                                </div>
                        </div>
                        <!-- Materiales -->
                        <div class="row-fluid">
                            <legend class="legend_custom">Materiales utilizados</legend>
                        </div>
                        <div class="row-fluid" id="listaMateriales">
                            <?php if($mantenimiento && $mantenimiento->materiales) foreach($mantenimiento->materiales as $material) { ?>
                                <div class="row-fluid" >
                                        <input type="hidden" name="materialId[]" value="<?php echo $material->idMantenimientoMarterial; ?>">
                                        <div class="span4">
                                            <div class="control-group">
                                                <div class="input-prepend center span12" title="Material" data-rel="tooltip">
                                                    <span class="add-on"><i class="icon-user"></i></span>
                                                    <input class="input-large span10 validate[required]" name="materialDescripcion[<?php echo $material->idMantenimientoMarterial; ?>]" value="<?php echo $material->descripcion; ?>" type="text" placeholder="Material" data-prompt-position="topLeft:2%"/>
                                                </div>                                      
                                            </div> 
                                        </div>
                                        <div class="span2">
                                            <div class="control-group">
                                                <div class="input-prepend center span12" data-rel="tooltip" data-original-title="Cantidad">
                                                    <span class="add-on"><i class="icon-globe"></i></span>
                                                    <input class="input-large span10 number validate[required]" name="materialCantidad[<?php echo $material->idMantenimientoMarterial; ?>]" type="text" value="<?php echo $material->cantidad; ?>" placeholder="Cantidad" data-prompt-position="topLeft:2%"/>                                    
                                                </div>                                          
                                            </div>
                                        </div>
                                        <div class="span2">
                                            <a href="#" class="btn delete_material borde-boton" ><i class="icon-trash"></i></a>
                                        </div>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="row-fluid" id="hiddenMaterial">
                                <input type="hidden" disabled name="materialId[]" value="j">
                                <div class="span4">
                                    <div class="control-group">
                                        <div class="input-prepend center span12" title="Material" data-rel="tooltip">
                                            <span class="add-on"><i class="icon-user"></i></span><input class="input-large span10 validate[required]" name="materialDescripcion" disabled type="text" placeholder="Material" data-prompt-position="topLeft:2%"/>
                                        </div>                                      
                                    </div> 
                                </div>
                                <div class="span2">
                                    <div class="control-group">
                                        <div class="input-prepend center span12" data-rel="tooltip" data-original-title="Cantidad">
                                            <span class="add-on"><i class="icon-globe"></i></span>
                                            <input class="input-large span10 number validate[required]" name="materialCantidad" type="text" disabled placeholder="Cantidad" data-prompt-position="topLeft:2%"/>                                    
                                        </div>                                          
                                    </div>
                                </div>
                                <div class="span2">
                                    <a href="#" class="btn delete_material borde-boton" ><i class="icon-trash"></i></a>
                                </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span3"></div>
                            <div class="span3">
                                <a class="btn btn-primary" id="add_material" href="#"><i class="icon icon-white icon-edit"></i> Agregar material</a>
                            </div>
                        </div>
                        
                        <!-- fin de materiales -->
                        
                        <!-- Personal -->
                        <div class="row-fluid">
                            <legend class="legend_custom">Personal</legend>
                        </div>
                        <div class="row-fluid" id="listaPersonal">
                            <?php if($mantenimiento && $mantenimiento->personal) foreach($mantenimiento->personal as $p) { ?>
                                <div class="row-fluid personal" >
                                    <input type="hidden" name="personalId[]" value="<?php echo $p->idMantenimientoPersonal; ?>">
                                    <div class="span10">
                                        <div class="row-fluid">
                                            <div class="span4">
                                                <div class="control-group">
                                                    <div class="input-prepend center span12" title="T&eacute;cnico" data-rel="tooltip">
                                                        <span class="add-on"><i class="icon-user"></i></span><input class="input-large span10 validate[required]" name="personalNombre[<?php echo $p->idMantenimientoPersonal; ?>]" value="<?php echo $p->nombre; ?>" type="text" placeholder="T&eacute;cnico" data-prompt-position="topLeft:2%"/>
                                                    </div>                                      
                                                </div> 
                                            </div>
                                            <div class="span4">
                                                <div class="control-group">
                                                    <div class="input-prepend center span12" data-rel="tooltip" data-original-title="Fecha">
                                                        <span class="add-on"><i class="icon-calendar"></i></span>
                                                        <input class="input-large span10 number validate[required]" name="personalFecha[<?php echo $p->idMantenimientoPersonal; ?>]" type="text" value="<?php if($p->fecha) echo date_format($p->fecha, "d/m/Y"); ?>" placeholder="Fecha" data-prompt-position="topLeft:2%"/>                                    
                                                    </div>                                          
                                                </div>
                                            </div>
                                            <div class="span1"></div>
                                            <div class="span1">
                                                <a href="#" class="btn delete_personal borde-boton" ><i class="icon-trash"></i></a>
                                            </div>
                                        </div>
                                        <div class="row-fluid">
                                            <div class="span4">
                                                <div class="control-group">
                                                    <div class="input-prepend center span12" data-rel="tooltip" data-original-title="Hora de inicio">
                                                        <span class="add-on"><i class="icon-time"></i></span>
                                                        <select class="span10" title="Hora de inicio" name="horaInicio[<?php echo $p->idMantenimientoPersonal; ?>]" >
                                                            <?php
                                                                for($i = 0; $i <= 23; $i++) {
                                                                    $hora = ($i < 10 ? "0". $i : $i) . ":00";
                                                            ?>
                                                                <option value="<?php echo $hora; ?>" <?php if($hora.":00" == $p->inicio) echo "selected='selected'"; ?> ><?php echo $hora; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>                                          
                                                </div>
                                            </div>
                                            <div class="span4">
                                                <div class="control-group">
                                                    <div class="input-prepend center span12" data-rel="tooltip" data-original-title="Hora de Finalizaci&oacute;n">
                                                        <span class="add-on"><i class="icon-time"></i></span>
                                                        <select class="span10" title="Hora final" name="horaFinal[<?php echo $p->idMantenimientoPersonal; ?>]" >
                                                            <?php
                                                                for($i = 0; $i <= 23; $i++) {
                                                                    $hora = ($i < 10 ? "0". $i : $i) . ":00";
                                                            ?>
                                                                <option value="<?php echo $hora; ?>" <?php if($hora.":00" == $p->final) echo "selected='selected'"; ?> ><?php echo $hora; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>                                          
                                                </div>
                                            </div>
                                            <div class="span2">
                                                <div class="control-group">
                                                    <div class="input-prepend center span12" data-rel="tooltip" data-original-title="Horas">
                                                        <span class="add-on"><i class="icon-globe"></i></span>
                                                        <input class="input-large span10 number validate[required]" name="personalHoras[<?php echo $p->idMantenimientoPersonal; ?>]" type="text" value="<?php echo $p->horas; ?>" placeholder="Horas" data-prompt-position="topLeft:2%"/>                                    
                                                    </div>                                          
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                            </div>
                            <?php } ?>
                        </div>
                        <div class="row-fluid personal" id="hiddenPersonal">
                                <input type="hidden" disabled name="personalId[]" value="j">
                                <div class="span10">
                                    <div class="row-fluid">
                                        <div class="span4">
                                            <div class="control-group">
                                                <div class="input-prepend center span12" title="T&eacute;cnico" data-rel="tooltip">
                                                    <span class="add-on"><i class="icon-user"></i></span><input class="input-large span10 validate[required]" name="personalNombre" disabled type="text" placeholder="T&eacute;cnico" data-prompt-position="topLeft:2%"/>
                                                </div>                                      
                                            </div> 
                                        </div>
                                        <div class="span4">
                                            <div class="control-group">
                                                <div class="input-prepend center span12" data-rel="tooltip" data-original-title="Fecha">
                                                    <span class="add-on"><i class="icon-calendar"></i></span>
                                                    <input class="input-large span10 number validate[required]" name="personalFecha" type="text" disabled placeholder="Fecha" data-prompt-position="topLeft:2%"/>                                    
                                                </div>                                          
                                            </div>
                                        </div>
                                        <div class="span1"></div>
                                        <div class="span1">
                                            <a href="#" class="btn delete_personal borde-boton" ><i class="icon-trash"></i></a>
                                        </div>
                                    </div>
                                    <div class="row-fluid">
                                        <div class="span4">
                                            <div class="control-group">
                                                <div class="input-prepend center span12" data-rel="tooltip" data-original-title="Hora de inicio">
                                                    <span class="add-on"><i class="icon-time"></i></span>
                                                    <select class="span10" title="Hora de inicio" name="horaInicio" disabled >
                                                        <?php
                                                            for($i = 0; $i <= 23; $i++) {
                                                                $hora = ($i < 10 ? "0". $i : $i) . ":00";
                                                        ?>
                                                            <option value="<?php echo $hora; ?>"  ><?php echo $hora; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>                                          
                                            </div>
                                        </div>
                                        <div class="span4">
                                            <div class="control-group">
                                                <div class="input-prepend center span12" data-rel="tooltip" data-original-title="Hora de Finalizaci&oacute;n">
                                                    <span class="add-on"><i class="icon-time"></i></span>
                                                    <select class="span10" title="Hora de Finalizaci&oacute;n" name="horaFinal" disabled >
                                                        <?php
                                                            for($i = 0; $i <= 23; $i++) {
                                                                $hora = ($i < 10 ? "0". $i : $i) . ":00";
                                                        ?>
                                                            <option value="<?php echo $hora; ?>"  ><?php echo $hora; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>                                          
                                            </div>
                                        </div>
                                        <div class="span2">
                                            <div class="control-group">
                                                <div class="input-prepend center span12" data-rel="tooltip" data-original-title="Horas">
                                                    <span class="add-on"><i class="icon-globe"></i></span>
                                                    <input class="input-large span10 number validate[required]" name="personalHoras" type="text" disabled placeholder="Horas" data-prompt-position="topLeft:2%"/>                                    
                                                </div>                                          
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                        </div>
                        <div class="row-fluid">
                            <div class="span3"></div>
                            <div class="span3">
                                <a class="btn btn-primary" id="add_personal" href="#"><i class="icon icon-white icon-edit"></i> Agregar personal</a>
                            </div>
                        </div>
                        
                        <!-- fin de personal -->
                        
                        <div class="row-fluid">
                        <legend class="legend_custom titulos_legend">Observaciones</legend>
                        </div>
                        <div class="row-fluid">
                                <div class="span10">
                                    <div class="control-group">

                                        <div class="input-prepend center span12" title="Observaciones" data-rel="tooltip">
                                            <textarea rows="4"  class="input-large span12 validate[required]" name="observaciones" type="text" placeholder="Observaciones" data-prompt-position="topLeft:2%"><?php echo $mantenimiento->observaciones?></textarea>
                                        </div>                                      
                                    </div>
                                </div>
                        </div>
                        
                        
                        <div class="control-group offset4">
                            <button class="btn  btn-primary noty save_c" type="submit" data-noty-options='{"text":"Información agregada exitosamente","layout":"top","type":"information"}'> Guardar</button>
                            <a class="btn btn-primary printOverlay" data-toggle="modal" data-rel="tooltip" href="#print_mantenimiento_overlay" mantenimiento-id="<?php echo $mantenimiento->idMantenimiento; ?>"><i class="icon-white icon-print"></i> Imprimir</a>
                            <a href="<?php echo $this->base_url?>/admin-mantenimientos-lista" class="btn abort-act" id="cancelar_operacion" >Cancelar</a>                               
                        </div>    
                            
                               
                                
                        </fieldset>
                    </form>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
<div id="print_mantenimiento_overlay" class="modal hide fade" 
         tabindex="-1" role="dialog" aria-labelledby="myModalLabel" 
         aria-hidden="true" >
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Ver datos del mantenimiento</h3>
        </div>
        <div class="modal-body">
            
            
        </div>
        <div class="modal-footer">
            <a class="btn btn-primary" href="#"><i class="icon-white icon-print"></i> Imprimir</a>
            <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Cancelar</button>
        </div>
    </div>
<?php $canal = $this->getAttribute('canal'); ?>


<div class="sidebar-nav-content">
    <div class="box box_templete">
        <div class="box-header well">
            <h2><i class="icon-th"></i> Detalles del canal</h2>              
        </div>
        <div class="box-content">
            <div>
                <form id="gestion_canales_form">
                    <fieldset>
                        <div class="searched-info">
                            <legend class="legend_custom">Datos Generales</legend>
                            <div class="row-fluid">
                                <div class="span4">
                                    <div class="control-group">
                                        <div class="input-prepend center span12" title="Nombre" data-rel="tooltip">
                                            <span class="add-on"><i class="icon-user"></i></span><input value="<?php echo $canal->nombre ?>"  class="input-large span10 validate[required]" name="nombre" id="nombre" type="text" placeholder="Nombre" data-prompt-position="topLeft:2%"/>
                                        </div>                                      
                                    </div> 
                                </div>
                                <div class="span4">
                                    <div class="control-group">
                                        <div class="input-prepend center span12" title="Comisión" data-rel="tooltip">
                                            <span class="add-on"><i class="icon-user"></i></span><input value="<?php echo $canal->comision ?>" class="input-large span10 validate[required, custom[number]]" name="comision" id="comision" type="text" placeholder="Comisión" data-prompt-position="topLeft:2%"/>
                                        </div>                                      
                                    </div>                                     
                                </div>
                                <div class="span4">
                                    <div class="control-group">
                                        <div class="input-prepend center span12" title="Se&ntilde;a" data-rel="tooltip">
                                            <span class="add-on"><i class="icon-user"></i></span><input  value="<?php echo $canal->senia ?>" class="input-large span10 validate[required, custom[number]]" name="senia" id="senia" type="text" placeholder="Se&ntilde;a" data-prompt-position="topLeft:2%"/>
                                        </div>                                      
                                    </div>                                     
                                </div>  
                            </div>
                            
                            <legend class="legend_custom">Políticas de cancelación</legend>
                            <div class="row-fluid">
                                <div class="span4">
                                    <div class="control-group">                                   
                                        <div class="input-prepend center span12" title="Días de Tolerancia" data-rel="tooltip">
                                            <span class="add-on"><i class="icon-briefcase"></i></span><input value="<?php echo $canal->diasTolerancia ?>"  class="input-large span10 validate[required, custom[integer]]" name="diasTolerancia" id="dias" type="text" placeholder="Días de Tolerancia" data-prompt-position="topLeft:2%"/>
                                        </div>
                                    </div>                                 
                                </div>
                                
                                <div class="span4">
                                    <div class="control-group">                                    
                                        <div class="input-prepend center span12" title="Porcentaje de Comisión" data-rel="tooltip">
                                            <span class="add-on"><i class="icon-file"></i></span><input value="<?php echo $canal->porcentajeComision ?>"  class="input-large span10 validate[required, custom[number]]" name="porcentajeComision" id="pc" type="text" placeholder="Porcentaje de Comisión" data-prompt-position="topLeft:2%"/>
                                        </div> 
                                    </div>
                                </div>
                                
                               
                            </div>
                            <?php if($canal->idCanal) { ?>
                            <input name="idCanal" type="hidden" value="<?php echo $canal->idCanal ?>"/>                                     
                            <?php } ?>
                            <input name="action" value="updateCanal" type="hidden"/> 
                            

                            <div class="control-group center">
                                <a href="<?php echo $this->base_url ?>/admin-canales-lista" class="btn abort-act" id="cancelar_operacion" >Cancelar</a>
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
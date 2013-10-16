<?php 
$contrato = $this->getAttribute('contrato');
$edit = $this->getAttribute('edit');
?>
<div class="sidebar-nav-content">
       <div class="box box_templete">
            <div class="box-header well">
                <h2><i class="icon-th"></i>Detalle del contrato</h2>              
            </div>
            <div class="box-content">
                   <form id="gestion_contratos_form" method="POST">
                        <fieldset>
                             <div class="row-fluid">
                                    <div class="span4">
                                        <div class="control-group">
                                            <div class="input-prepend center span12" title="Nombre" data-rel="tooltip">
                                                <span class="add-on"><i class="icon-font"></i></span><input value="<?php if($edit) echo $contrato->nombre?>"  class="input-large span10 validate[required]" name="nombre" type="text" placeholder="Nombre" data-prompt-position="topLeft:2%"/>
                                            </div>                                      
                                        </div> 
                                    </div>
                                    <div class="span4">
                                        <div class="control-group">
                                            <div class="input-prepend center span12" title="Precio" data-rel="tooltip">
                                                <span class="add-on"><i class="icon-tag"></i></span><input value="<?php if($edit) echo $contrato->precio?>"  class="input-large span10 validate[required]" name="precio" type="number" step="0.01" placeholder="Precio" data-prompt-position="topLeft:2%"/>
                                            </div>                                      
                                        </div> 
                                    </div>
                                  <div class="span4">
                                        <div class="control-group">
                                            <div class="input-prepend center span12" title="Porcentaje" data-rel="tooltip">
                                                <span class="add-on"><i class="icon-tag"></i></span><input value="<?php if($edit) echo $contrato->porcentaje?>"  class="input-large span10 validate[required]" name="porcentaje" type="number" step="0.01" placeholder="Porcentaje" data-prompt-position="topLeft:2%"/>
                                            </div>                                      
                                        </div> 
                                    </div>
                                  
                                </div>
                                <div class="row-fluid">
                                    <div class="span4">
                                        <div class="control-group">
                                            <div class="input-prepend center span12" title="Opinión" data-rel="tooltip">
                                                <span class="add-on"><i class="icon-comment"></i></span><textarea rows="4" class="input-large span10 validate[required]" name="descripcion" id="descripcion" type="text" placeholder="Descripción" data-prompt-position="topLeft:2%"><?php if($edit) echo $contrato->descripcion?></textarea>
                                            </div>                                      
                                        </div>
                                    </div>  
                                </div>
                                <div class="control-group offset4">
                                    <button class="btn  btn-primary noty save_c" type="submit" data-noty-options='{"text":"Información agregada exitosamente","layout":"top","type":"information"}'> Guardar</button>
                                    <a href="<?php echo $this->base_url?>/admin-opinion-lista" class="btn abort-act" id="cancelar_operacion" >Cancelar</a>                               
                                </div>    
                            
                               <?php if ($edit){?>
                                <input type="hidden" name="idContrato" value="<?php echo $contrato->idContrato; ?>"/>
                                <input type="hidden" name="action" value="update" /> 
                               <?php }else{?>
                                <input type="hidden" name="action" value="insert" /> 
                               <?php }?>
                                
                        </fieldset>
                    </form>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

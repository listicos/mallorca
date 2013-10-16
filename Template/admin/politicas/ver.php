<?php 
$politica = $this->getAttribute('politica');
?>
<div class="sidebar-nav-content">
       <div class="box box_templete">
            <div class="box-header well">
                <h2><i class="icon-th"></i>Detalle </h2>              
            </div>
            <div class="box-content">
                   <form id="gestion_politicas_form" method="POST">
                       <?php if($politica) { ?>
                       <input type="hidden" name="politicaId" value="<?php echo $politica->idPoliticaCancelacion ?>">
                       <?php } ?>
                       <input type="hidden" name="action" value="updatePolitica"
                        <fieldset>
                             
                             <div class="row-fluid">
                                    <div class="span4">
                                    <div class="control-group">
                                      <div class="input-prepend center span12" title="Nombre de la política de la cancelación" data-rel="tooltip">
                                                <span class="add-on"><i class="icon-font"></i></span><input value="<?php echo $politica->nombre?>"  class="input-large span10 validate[required]" name="nombre" type="text" placeholder="Nombre de la política de la cancelación" data-prompt-position="topLeft:2%"/>
                                            </div>     

                                    </div>
                                    <br>

                                        
                                    </div>
                                    <div class="span4">
                                        <div class="control-group">
                                            <div class="input-prepend center span12" title="Dias de la tolerancia" data-rel="tooltip">
                                                <span class="add-on"><i class="icon-tag"></i></span><input value="<?php echo $politica->reembolsoDia?>"  class="input-large span10 validate[required]" name="reembolsoDia" type="text" placeholder=" Dias de la tolerancia" data-prompt-position="topLeft:2%"/>
                                            </div>  

                                        </div> 
                                    </div>

                                  
                                  
                                   
                                   <div class="span4">
                                  <div class="control-group">
                                            <div class="input-prepend center span12" title="Porcentaje de comisión" data-rel="tooltip">
                                                <span class="add-on"><i class="icon-tag"></i></span><input value="<?php echo $politica->reembolsoPorcentaje?>"  class="input-large span10 validate[required]" name="reembolsoPorcentaje" type="text" placeholder="Porcentaje de comisión" data-prompt-position="topLeft:2%"/>
                                            </div>                                      
                                        </div> 
                                    </div>
                                
                                </div>
                                <div class="control-group center">
                                    <button class="btn  btn-primary noty save_c" type="submit" data-noty-options='{"text":"Información agregada exitosamente","layout":"top","type":"information"}'> Guardar</button>
                                    <a href="<?php echo $this->base_url?>/admin-politicas-lista" class="btn abort-act" id="cancelar_operacion" >Cancelar</a>                               
                                </div>    
                            </div>
                               
                                
                        </fieldset>
                    </form>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

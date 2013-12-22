<?php 
$politica = $this->getAttribute('politica');
$idiomas = $this->getAttribute('idiomas');
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
                                <div class="span8">
                                    <div class="control-group">
                                        <div class="input-prepend span12 center" title="Idioma" data-rel="tooltip">
                                            <span class="detalles_apartamento_prepend"><i class="icon-globe"></i></span>
                                            <select id="idioma" class="span10">
                                                <?php foreach($idiomas as $idioma) { ?>
                                                <option value="<?php echo $idioma->codigo; ?>"><?php echo $idioma->nombre; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             <div class="row-fluid">
                                    <div class="span8">
                                    <div class="control-group">
                                      <div class="input-prepend center span12" title="Nombre de la política de la cancelación" data-rel="tooltip">
                                            <span class="add-on"><i class="icon-font"></i></span><input class="input-large span10 validate[required]" id="nombre" type="text" placeholder="Nombre de la política de la cancelación" data-prompt-position="topLeft:2%"/>
                                        </div>     
                                        <textarea name="nombre" style="display:none;"><?php echo $politica->nombre ?></textarea>
                                    </div>
                                    
                                    </div>
                                        
                                </div>
                            <div class="row-fluid">
                                    <div class="span8">
                                        <div class="control-group">
                                            <textarea class="editor span12 validate[required]" id="descripcion" rows="11" placeholder="Descripción"></textarea> 
                                            <textarea name="descripcion" style="display:none;"><?php echo $politica->descripcion ?></textarea>
                                        </div> 
                                    </div>

                                
                                </div>
                            <div class="control-group center " style="margin-top: 10px;">
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

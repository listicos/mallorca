<?php 
$articulo = $this->getAttribute('articulo');
$idiomas = $this->getAttribute('idiomas');
$tipos = $this->getAttribute('tipos');
?>
<div class="sidebar-nav-content">
       <div class="box box_templete">
            <div class="box-header well">
                <h2><i class="icon-th"></i>Detalles del Art&iacute;culo</h2>              
            </div>
            <div class="box-content">
                   <form id="gestion_articulos_form" method="POST">
                       <?php if($articulo) { ?>
                        <input type="hidden" name="articuloId" value="<?php echo $articulo->idArticulo; ?>">
                       <?php } ?>
                        <input type="hidden" name="action" value="updateArticulo">
                        <fieldset>
                             
                             <div class="row-fluid">
                                    <div class="span4">
                                        <div class="control-group">
                                            <div class="input-prepend center span12" title="Nombre" data-rel="tooltip">
                                                <span class="add-on"><i class="icon-font"></i></span><input value="<?php echo $articulo->nombre?>" type="text" class="input-large span10 validate[required]" name="nombre" placeholder="Nombre" data-prompt-position="topLeft:2%"/>
                                            </div> 

                                        </div> 
                                    </div>

                                  <div class="span4">
                                        <div class="control-group">
                                            <div class="input-prepend center span12" title="Codigo" data-rel="tooltip">
                                                <span class="add-on"><i class="icon-tag"></i></span><input value="<?php echo $articulo->codigo?>" type="text" class="input-large span10 validate[required]" name="codigo" placeholder="Código" data-prompt-position="topLeft:2%"/>
                                            </div>                                      
                                        </div> 
                                    </div>
                                    <div class="span4">
                                    <div class="control-group">
                                        <div class="input-prepend center span12" data-rel="tooltip" data-original-title="Tipo">
                                            <span class="add-on"><i class="icon-list"></i></span>
                                            <select class="input_large span10 validate[required]" name="idArticuloTipo" id="select_tipo">
                                                <option disabled="">Seleccione Tipo de Artículo</option>                                        
                                                <?php foreach ($tipos as $tipo) { ?>
                                                <option <?php if($tipo->idArticuloTipo == $articulo->idArticuloTipo) echo 'selected=""' ?> value="<?php echo $tipo->idArticuloTipo ?>"><?php echo $tipo->nombre ?></option>
                                                <?php } ?>
                                            </select>                                    
                                        </div>                                          
                                    </div>
                                    <br>

                                        
                                    </div>
                                   </div>
                                   <div class="row-fluid">
                                   <div class="span4">
                                  <div class="control-group">
                                            <div class="input-prepend center span12" title="Precio base" data-rel="tooltip">
                                                <span class="add-on"><i class="icon-tag"></i></span><input value="<?php echo $articulo->precioBase?>"  class="input-large span10 validate[required]" name="precioBase" type="number" step="0.01" placeholder="Precio base" data-prompt-position="topLeft:2%"/>
                                            </div>                                      
                                        </div> 
                                    </div>
                                   <div class="span4">
                                    <div class="control-group">
                                        <div class="input-prepend center span12" data-rel="tooltip" data-original-title="Idioma">
                                            <span class="add-on"><i class="icon-list"></i></span>
                                            <select class="input_large span10 validate[required]" name="idIdioma" id="select_idioma">
                                                                                      
                                                <option selected="selected" disabled="disabled">Seleccione Idioma</option>
                                                <?php foreach ($idiomas as $idioma) { ?>
                                                <option <?php if($idioma->idIdioma == $articulo->idIdioma) echo 'selected=""' ?> value="<?php echo $idioma->idIdioma ?>"><?php echo $idioma->nombre ?></option>
                                                <?php } ?>
                                                                                                
                                            </select>                                    
                                        </div>                                          
                                    </div>
                                    <br>

                                        
                                    </div>
                                
                                
                                    <div class="span4">
                                        <div class="control-group">
                                        
                                            <div class="input-prepend center span12" title="Descripción" data-rel="tooltip">
                                                <span class="add-on"><i class="icon-comment"></i></span><textarea rows="4" class="input-large span10 validate[required]" name="descripcion" id="descripcion" type="text" placeholder="Descripción" data-prompt-position="topLeft:2%"><?php echo $articulo->descripcion?></textarea>
                                            </div>                                      
                                        </div>
                                    </div>  
                                </div>
                                
                                <div class="control-group center">
                                    <button class="btn  btn-primary noty save_c" type="submit" data-noty-options='{"text":"Información agregada exitosamente","layout":"top","type":"information"}'> Guardar</button>
                                    <a href="<?php echo $this->base_url?>/admin-articulos-lista" class="btn abort-act" id="cancelar_operacion" >Cancelar</a>                               
                                </div>    
                            
                               </div>
                                
                        </fieldset>
                    </form>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

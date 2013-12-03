
<?php $complejo = $this->getAttribute('complejo'); ?>

<div class="sidebar-nav-content">
    <div class="box box_templete">
        <div class="box-header well">
            <h2><i class="icon-th"></i> Detalles del complejo</h2>              
        </div>
        <div class="box-content">
            <div>
                <form id="gestion_complejos_form">
                    <fieldset>
                        <div class="searched-info">
                           <legend class="legend_custom titulos_legend">Nombre</legend>
                            <div class="row-fluid">
                                <div class="span6">
                                    <div class="control-group">
                                        <input value="<?php if ($complejo) echo $complejo->nombre ?>"  class="input-large span10 validate[required]" name="nombre" id="respondable_nombre" type="text" placeholder="Nombre del complejo" data-prompt-position="topLeft:2%"/>                                    
                                    </div> 
                                </div>
                            </div>
                           <legend class="legend_custom titulos_legend">Descripción</legend>
                           <div class="row-fluid">
                                <div class="span6">
                                    <div class="control-group">
                                        <textarea placeholder="Descripción del complejo" class="input-large span10 validate[required]" name="descripcion"><?php if ($complejo) echo $complejo->descripcion ?></textarea>                                     
                                    </div> 
                                </div>
                            </div>
                           
                            <div class="control-group center">
                                <input type="hidden" name="action" value="updateComplejo">
                                <?php if($complejo) {?>
                                <input type="hidden" name="complejoId" value="<?php echo $complejo->idComplejo;?>">
                                <?php } ?>
                                <a href="<?php echo $this->base_url ?>/admin-complejo-lista" class="btn abort-act" id="cancelar_operacion" >Cancelar</a>
                                <button class="btn  btn-primary" type="submit">Guardar</button>
                            </div>                              
                        </div> 
                    </fieldset>
                </form>
                <legend class="legend_custom titulos_legend">Fotos</legend>
                <form action="<?php echo $this->base_url.'/admin-ajax-apartamento-adjunto/id:'.$apartamento['apartamento']->idApartamento;?>" class="dropzone" id="complejoDropzone">
                    <input type="hidden" name="idComplejo" value="<?php echo $complejo->idComplejo; ?>" />
                    <div class="fallback">
                        <input name="file" type="file" multiple />
                    </div>
                </form>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
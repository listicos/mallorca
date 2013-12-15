
<?php 
$complejo = $this->getAttribute('complejo'); 
$template_url = $this->getAttribute('template_url');
?>

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
                <?php if ($complejo->idComplejo) { ?>
                <legend class="legend_custom titulos_legend">Fotos</legend>
                <form action="<?php echo $this->base_url.'/admin-ajax-complejo';?>" class="dropzone" id="complejoDropzone">
                    <input type="hidden" name="idComplejo" value="<?php echo $complejo->idComplejo; ?>" />
                    <div class="fallback">
                        <input name="file" type="file" multiple />
                    </div>
                    
                    <?php foreach($complejo->adjuntos as $adjunto ) { ?>
                    
                        <div class="dz-preview dz-processing dz-image-preview dz-success">
                            <div class="dz-details">
                                <div class="dz-filename"><span data-dz-name=""><?php echo $adjunto->nombre; ?></span></div>
                                <div data-dz-size="" class="dz-size"><strong></strong></div>
                                <img src="<?php echo $template_url . $adjunto->ruta; ?>" alt="<?php echo $adjunto->nombre; ?>" data-dz-thumbnail="" ilo-full-src="http://localhost/mallorca/Template/recursos/apartamentos/1.jpg">
                            </div>
                            <div class="dz-progress"><span style="width: 100%;" data-dz-uploadprogress="" class="dz-upload"></span></div>
                            <div class="dz-success-mark"><span></span></div>
                            <div class="dz-error-mark"><span></span></div>
                            <div class="dz-error-message"><span data-dz-errormessage=""></span></div>
                            <a data-ruta="<?php $adjunto->ruta; ?>" data-deptoadj="1" class="dz-remove delete_foto" href="#">Borrar foto</a>
                        </div>
                    
                    <?php } ?>
                    
                </form>
                <?php } ?>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>

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
                           
                            <div class="row-fluid">
                                <div class="span8">
                                    <div class="control-group">
                                        <div class="input-prepend center span12" title="Nombre" data-rel="tooltip">
                                            <span class="add-on"><i class="icon-user"></i></span><input value="<?php if ($complejo) echo $complejo->nombre ?>"  class="input-large span10 validate[required]" name="nombre" id="respondable_nombre" type="text" placeholder="Nombre del complejo" data-prompt-position="topLeft:2%"/>
                                        </div>                                      
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
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
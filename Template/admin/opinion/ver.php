<?php 
$apartamentos = $this->getAttribute('apartamentos');
$usuarios = $this->getAttribute('usuarios');
$opinion_depa = $this->getAttribute('opinion');
$apartamento_opi = $this->getAttribute('apartamento_opinion');
$usuario_opi = $this->getAttribute('usuario_opinion');
$is_edit = $this->getAttribute('edit');
?>
<div class="sidebar-nav-content">
       <div class="box box_templete">
            <div class="box-header well">
                <h2><i class="icon-th"></i>Detalles de las opiniones</h2>              
            </div>
            <div class="box-content">
                   <form id="contenido-opinion" method="POST">
                        <fieldset>
                            
                            <div class="row-fluid">
                                <div class="span6">
                                    <div class="control-group">
                                        <div class="input-prepend center span12" title="Apartamento" data-rel="tooltip">
                                            <span class="add-on"><i class="icon-home"></i></span>
                                            <input autocomplete="off" autofocus class="input-large span10 validate[required]" name="apartamento" id="apartamento" type="text" placeholder="Apartamento" data-prompt-position="topLeft:2%" data-type="user" value="<?php echo $apto->nombre ?>"/>
                                            <input type="hidden" name="idApartamento" id="idApartamento" value="<?php echo $apto->idApartamento ?>">
                                        </div>                                      
                                    </div>
                                </div>
                            </div>
                            <div id="demo" class="">
                            <div class="row-fluid">
                                <div class="span6">
                                    <div class="control-group">
                                        <div class="input-prepend center span12" title="Usuario" data-rel="tooltip">
                                            <span class="add-on"><i class="icon-user"></i></span>
                                            <input autocomplete="off" class="input-large span10" name="usuario" id="usuario" type="text" placeholder="Usuario" data-prompt-position="topLeft:2%" data-type="user"/>
                                            <input type="hidden" name="idUsuario" id="huespedId" value="<?php echo $user->idUsuario ?>">
                                        </div>                                      
                                    </div>
                                </div>
                            </div>
                    </div>
                             <div class="row-fluid">                                    
                                    <div class="span6">
                                        <div class="control-group">
                                            <div class="input-prepend center span12" title="Puntuación" data-rel="tooltip">
                                                <span class="add-on"><i class="icon-thumbs-up"></i></span><input class="input-large span10 validate[required]" name="puntuacion" id="puntuacion" type="number" min="0" max="10" step=".5" placeholder="Puntuación" value="<?php if($is_edit) echo $opinion_depa->puntuacion?>" data-prompt-position="topLeft:2%"/>
                                            </div>                                      
                                        </div>                                     
                                    </div>                                      
                                </div>
                                <div class="row-fluid">
                                    <div class="span6">
                                        <div class="control-group">
                                            <div class="input-prepend center span12" title="Opinión" data-rel="tooltip">
                                                <span class="add-on"><i class="icon-comment"></i></span><textarea rows="4" class="input-large span10 validate[required]" name="opinion" id="opinion" type="text" placeholder="Opinión" data-prompt-position="topLeft:2%"><?php if($is_edit) echo $opinion_depa->opinion?></textarea>
                                            </div>                                      
                                        </div>
                                    </div>
                                </div>
                                <div class="control-group offset4">
                                    <button class="btn  btn-primary noty save_c" type="submit" data-noty-options='{"text":"Información agregada exitosamente","layout":"top","type":"information"}'> Guardar</button>
                                    <a href="<?php echo $this->base_url?>/admin-opinion-lista" class="btn abort-act" id="cancelar_operacion" >Cancelar</a>                               
                                </div>    
                            
                               <input name="accion" value="<?php if($is_edit) echo 'editar'; else echo 'agregar'?>" type="hidden"/> 
                        </fieldset>
                    </form>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

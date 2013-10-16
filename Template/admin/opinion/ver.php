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
                                    <div class="span4">
                                        <div class="input-prepend center span12" title="Apartamento" data-rel="tooltip">                                           
                                           <select class="chosen" name="idApartamento" id="idApartamento">
                                            <?php foreach ($apartamentos as $p_k => $p_v) {?>
                                                <option value="<?php echo $p_v->idApartamento?>" ><?php echo $p_v->nombre?></option>
                                            <?php }?>
                                           </select>                                     
                                        </div>                                     
                                    </div>   
                                    <div class="span4">
                                         <div class="span4">
                                            <div class="input-prepend center span12" title="Usuario" data-rel="tooltip">                                           
                                               <select class="chosen" name="idUsuario" id="idUsuario">
                                                <?php foreach ($usuarios as $u_v) {?>
                                                    <option value="<?php if($is_edit) echo $usuario_opi->idUsuario?><?php if(!$is_edit) echo $u_v->idUsuario?><?php //echo $u_v->idUsuario?>" ><?php if($is_edit) echo $usuario_opi->nombre?><?php if(!$is_edit)  echo $u_v->nombre?><?php //echo $u_v->nombre?></option>
                                                <?php }?>
                                               </select>                                     
                                            </div>                                     
                                        </div>                                         
                                    </div>
                                    <div class="span4">
                                        <div class="control-group">
                                            <div class="input-prepend center span12" title="Puntuación" data-rel="tooltip">
                                                <span class="add-on"><i class="icon-thumbs-up"></i></span><input class="input-large span10 validate[required]" name="puntuacion" id="puntuacion" type="number" min="0" max="10" step=".5" placeholder="Puntuación" value="<?php if($is_edit) echo $opinion_depa->puntuacion?>" data-prompt-position="topLeft:2%"/>
                                            </div>                                      
                                        </div>                                     
                                    </div>                                      
                                </div>
                                <div class="row-fluid">
                                    <div class="span4">
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

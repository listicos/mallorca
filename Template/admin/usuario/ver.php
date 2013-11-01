<?php $grupos = $this->getAttribute('grupos'); ?>
<?php $usuario = $this->getAttribute('usuario'); ?>
<?php $paises = $this->getAttribute('paises'); ?>
<?php $provincias = $this->getAttribute('provincias'); ?>

<div class="sidebar-nav-content">
    <div class="box box_templete">
        <div class="box-header well">
            <h2><i class="icon-th"></i> Detalles del usuario</h2>              
        </div>
        <div class="box-content">
            <div>
                <form id="gestion_usuario_form">
                    <fieldset>
                        <div class="searched-info">
                            
                            <div class="row-fluid">
                                <div class="span4">
                                    <div class="control-group">
                                        <div class="input-prepend center span12" title="Nombre" data-rel="tooltip">
                                            <span class="add-on"><i class="icon-user"></i></span><input value="<?php echo $usuario->nombre ?>"  class="input-large span10 validate[required]" name="nombre" id="respondable_nombre" type="text" placeholder="Nombre" data-prompt-position="topLeft:2%"/>
                                        </div>                                      
                                    </div> 
                                </div>
                                <div class="span4">
                                    <div class="control-group">
                                        <div class="input-prepend center span12" title="Apellidos" data-rel="tooltip">
                                            <span class="add-on"><i class="icon-user"></i></span><input value="<?php echo $usuario->apellidoPaterno ?>" class="input-large span10 validate[required]" name="apellidoPaterno" id="respondable_apellidoP" type="text" placeholder="Apellidos" data-prompt-position="topLeft:2%"/>
                                        </div>                                      
                                    </div>                                     
                                </div>
                                
                                <div class="span4">
                                    <div class="control-group">
                                        <div class="input-prepend center span12" title="Tipo" data-rel="tooltip">
                                            <span class="add-on"><i class="icon-globe"></i></span>
                                            <select class="input_large span10 validate[required]" name="idUsuarioGrupo" id="select_provincia">
                                                <option  disabled>Tipo</option>                                        
                                                <?php foreach ($grupos as $grupo) { ?>
                                                    <option value="<?php echo $grupo->idUsuarioGrupo; ?>" <?php if ($usuario->idUsuarioGrupo == $grupo->idUsuarioGrupo) echo 'selected="selected"' ?>><?php echo $grupo->nombre; ?></option>
                                                <?php } ?>                                                 
                                            </select>                                    
                                        </div>                                         
                                    </div>
                                </div>
                                 
                            </div>
                            <div class="row-fluid">
                                <div class="span4">
                                    <div class="control-group">
                                        <div class="input-prepend center span12" title="Email" data-rel="tooltip">
                                            <span class="add-on"><i class="icon-envelope"></i></span><input value="<?php echo $usuario->email ?>"  class="input-large span10 validate[required,custom[email]]" name="email" id="email" type="text" placeholder="Email" data-prompt-position="topLeft:2%"/>
                                        </div>                                        
                                    </div>                                     
                                </div>     
                                <div class="span4">
                                    <div class="control-group">
                                        <div class="input-prepend center span12" title="Contraseña" data-rel="tooltip">
                                            <span class="add-on"><i class="icon-asterisk"></i></span><input value=""  class="input-large span10 validate[required]" name="password" id="password" type="password" placeholder="Contraseña" data-prompt-position="topLeft:2%"/>
                                        </div>                                        
                                    </div>                                     
                                </div>
                                <div class="span4">
                                    <div class="control-group">
                                        <div class="input-prepend center span12" title="Confirma Contraseña" data-rel="tooltip">
                                            <span class="add-on"><i class="icon-asterisk"></i></span><input value=""  class="input-large span10 validate[required,equals[password]]" name="conf_password" id="conf_password" type="password" placeholder="Confirma Contraseña" data-prompt-position="topLeft:2%"/>
                                        </div>                                        
                                    </div>                                     
                                </div>
                            </div>
                            
                            <legend>Direcci&oacute;n</legend>
                            <div class="row-fluid">
                                <div class="span4">
                                    
                                    <div class="control-group">
                                        <div class="input-prepend center span12" title="Nombre de la calle" data-rel="tooltip">
                                            <span class="add-on"><i class="icon-road"></i></span><input value="<?php echo $usuario->direccion->calle ?>"  class="input-large span10" name="calle" id="nmbcalle" type="text" placeholder="Nombre de la calle" />
                                        </div>
                                    </div>
                                                                            
                                </div>
                                <div class="span4">
                                    <div class="control-group"> 
                                        <div class="input-prepend center span12" title="Número" data-rel="tooltip">
                                            <span class="add-on"><i class="icon-road"></i></span><input value="<?php echo $usuario->direccion->numero ?>" class="input-large span10" name="numero" id="ncalle" type="text" placeholder="Número" />
                                        </div>                                    
                                    </div>
                                </div>
                                
                                <div class="span4">
                                    <div class="control-group">
                                        <div class="input-prepend center span12" title="Código postal" data-rel="tooltip">
                                            <span class="add-on"><i class="icon-envelope"></i></span><input value="<?php echo $usuario->direccion->codigoPostal ?>"  class="input-large span10" name="codigoPostal" id="cp" type="text" placeholder="Código postal" />
                                        </div>                                            
                                    </div>   
                                </div>
                            </div>
                            <div class="row-fluid">
                                <div class="span4">
                                    <div class="control-group">
                                        <div class="input-prepend center span12" title="provincia" data-rel="tooltip">
                                            <span class="add-on"><i class="icon-globe"></i></span>
                                            <select class="input_large span10 validate[required]" name="idProvincia" id="select_provincia">
                                                <option  disabled>Provincia</option>                                        
                                                <?php foreach ($provincias as $provin) { ?>
                                                    <option value="<?php echo $provin->idProvincia; ?>" <?php if ($provin->idProvincia == $usuario->direccion->idProvincia) echo 'selected="selected"' ?>><?php echo $provin->nombre; ?></option>
                                                <?php } ?>                                                 
                                            </select>                                    
                                        </div>                                         
                                    </div>
                                </div>
                                
                                
                                
                                <div class="span4 no_right_margin">
                                    <div class="control-group">
                                        <div class="input-prepend center span12" title="Pais" data-rel="tooltip">
                                            <span class="add-on"><i class="icon-globe"></i></span>
                                            <select class="input_large span10 validate[required]" name="idPais" id="select_pais">
                                                <option  disabled>País</option>                                        
                                                <?php foreach ($paises as $pais) { ?>
                                                    <option value="<?php echo $pais->idPais ?>" <?php if ($pais->idPais == $usuario->direccion->idPais) echo 'selected="selected"' ?>><?php echo $pais->nombreCompleto ?></option>
                                                <?php } ?>                                                
                                            </select>                                    
                                        </div>                                          
                                    </div>
                                </div>
                            </div>
                            <legend>Datos de Contacto</legend>
                            <div class="row-fluid">
                                <div class="span4">
                                    <div class="control-group">                                    
                                        <div class="input-prepend center span12" title="Teléfono" data-rel="tooltip">
                                            <span class="add-on"><i class="icon-certificate"></i></span><input value="<?php echo $usuario->telefono ?>"   class="input-large span10" name="telefono" id="telefono" type="text" placeholder="Teléfono" data-prompt-position="topLeft:2%"/>
                                        </div>                                        
                                    </div>
                                </div>
                                <div class="span4">
                                       
                                    <div class="control-group">                                    
                                        <div class="input-prepend center span12" title="Móvil" data-rel="tooltip">
                                            <span class="add-on"><i class="icon-certificate"></i></span><input value="<?php echo $usuario->telefonoAlterno ?>"   class="input-large span10" name="telefonoAlterno" id="movil" type="text" placeholder="Móvil" data-prompt-position="topLeft:2%"/>
                                        </div>                                        
                                    </div>
                                </div>
                               
                            </div>
                            
                            <input name="action" value="updateUsuario" type="hidden"/> 
                            <?php if($usuario->idUsuario) { ?>
                                <input type="hidden" name="idUsuario" value="<?php echo $usuario->idUsuario ?>">
                            <?php } ?>

                            <div class="control-group center">
                                <a href="<?php echo $this->base_url ?>/admin-usuario-lista" class="btn abort-act" id="cancelar_operacion" >Cancelar</a>
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
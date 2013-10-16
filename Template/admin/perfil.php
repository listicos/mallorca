<?php $usuario = $this->getAttribute('usuario') ?>
<form id="edita_perfil_form">
    <div class="row-fluid">
        <div class="span3">
            <div class="perfil_formulario_img">
                <img src="<?php echo $this->template_url ?>/imagen/logo.png"/>
            </div>
        </div>
        <div class="span9">
            <div class="row-fluid">
                <div class="span6">
                    <div class="control-group perfil_formulario">
                        <span class="help-inline">Nombre:</span><input name="nombre" class="span8 validate[required]" value="<?php echo $usuario->nombre ?>" type="text" title="Nombre" data-rel="tooltip">
                    </div>
                </div>
                <div class="span6">
                    <div class="control-group perfil_formulario">
                        <span class="help-inline">Apellido paterno:</span><input name="apellidoPaterno" class="span8 validate[required]" value="<?php echo $usuario->apellidoPaterno ?>" type="text" title="Apellido paterno" data-rel="tooltip">
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span6">
                    <div class="control-group perfil_formulario">
                        <span class="help-inline">Apellido materno:</span><input name="apellidoMaterno" class="span8 validate[required]" value="<?php echo $usuario->apellidoMaterno ?>" type="text" title="Apellido materno" data-rel="tooltip">
                    </div>  
                </div> 
                <div class="span6">
                    <div class="control-group perfil_formulario">
                        <span class="help-inline">e-mail:</span><input name="email" class="span8 validate[required, custom[email], ajax[validateEmailPerfilEdit]]" id="email" value="<?php echo $usuario->email ?>" type="email" title="e-mail" data-rel="tooltip">
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span6">
                    <div class="control-group perfil_formulario">
                        <span class="help-inline">Contraseña:</span><input name="password" class="span8 validate[required]" id="password" type="password" value="<?php echo $usuario->password ?>" title="Contraseña" data-rel="tooltip">
                    </div>
                </div>
                <div class="span6">
                    <div class="control-group perfil_formulario">
                        <span class="help-inline">Confirmar contraseña:</span><input name="confpassword" class="span8 validate[required, equals[password]]" value="<?php echo $usuario->password ?>" type="password" title="Confirmar contraseña" data-rel="tooltip">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="control-group offset4">
        <input type="hidden" name="action" value="editarPerfil" />
        <input type="hidden" name="idUsuario" value="<?php echo $usuario->idUsuario ?>" />
        <button class="btn  btn-primary noty save_edi" type="submit"> Guardar</button>
        <button class="btn abort-edi">Cancelar</button>                                                         
    </div>   
</form>

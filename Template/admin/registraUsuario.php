<noscript>
<div class="alert alert-block span10">
    <h4 class="alert-heading">Warning!</h4>
    <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
</div>
</noscript>

<div class="sidebar-nav-content">
    <div>
        <div class="box">
            <div class="box-header well">
                <h2><i class="icon-th"></i> Detalles del usuario</h2>              
                <div class="box-icon">
                    <!--<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>-->
                    <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-down"></i></a>
                    <!--<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>-->
                </div>
            </div>

            <div class="box-content">
                <div>
                    <form id="registra_usuario_form">
                        <fieldset>
                            <legend class="legend_custom">Datos generales:</legend>      
                            <div class="row-fluid">
                                <div class="span4">
                                    <div class="control-group">
                                        <div class="input-prepend center span12" title="Nombre" data-rel="tooltip">
                                            <span class="add-on"><i class="icon-user"></i></span><input autofocus class="input-large span10 validate[required]" name="username" id="username" type="text" placeholder="Nombre" data-prompt-position="topLeft:2%"/>
                                        </div>                                      
                                    </div> 
                                </div>
                                <div class="span4">
                                    <div class="control-group">
                                        <div class="input-prepend center span12" title="Apellidos" data-rel="tooltip">
                                            <span class="add-on"><i class="icon-user"></i></span><input autofocus class="input-large span10 validate[required]" name="apellidos" id="apellidos" type="text" placeholder="Apellidos" data-prompt-position="topLeft:2%"/>
                                        </div>                                      
                                    </div>                                     
                                </div>
                                <div class="span4">
                                    <div class="control-group">
                                        <div class="input-prepend center span12" title="Email" data-rel="tooltip">
                                            <span class="add-on"><i class="icon-envelope"></i></span><input autofocus class="input-large span10 validate[required,custom[email]]" name="email" id="email" type="email" placeholder="Email" data-prompt-position="topLeft:2%"/>
                                        </div>                                        
                                    </div>                                     
                                </div>   
                            </div>

                            <div class="row-fluid">
                                <div class="span4">
                                    <div class="control-group">
                                        <div class="input-prepend center span12" title="Contraseña" data-rel="tooltip">
                                            <span class="add-on"><i class="icon-asterisk"></i></span><input autofocus class="input-large span10 validate[required]" name="pass" id="password" type="password" placeholder="Contraseña" data-prompt-position="topLeft:2%"/>
                                        </div>                                      
                                    </div> 
                                </div>
                                <div class="span4">
                                    <div class="control-group">
                                        <div class="input-prepend center span12" title="Confirma contraseña" data-rel="tooltip">
                                            <span class="add-on"><i class="icon-asterisk"></i></span><input autofocus class="input-large span10 validate[required]" name="conf_pass" id="conf_password" type="password" placeholder="Confirma contraseña" data-prompt-position="topLeft:2%"/>
                                        </div>                                      
                                    </div>                                     
                                </div>
                                <div class="span4">
                                    <div class="control-group">

                                    </div>                                     
                                </div>   
                            </div>

                            <div class="control-group center">
                                <button class="btn  btn-primary noty save_c"  type="submit" data-noty-options='{"text":"Información agregada exitosamente","layout":"top","type":"information"}'> Guardar</button>
                                <button class="btn abort-act">Cancelar</button>                                                         
                            </div>   

                        </fieldset>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

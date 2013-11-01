<?php $paises = $this->getAttribute('paises'); ?>
<?php $monedas = $this->getAttribute('monedas'); ?>
<?php $empresa = $this->getAttribute('empresa'); ?>
<?php $provincias = $this->getAttribute('provincias'); ?>
<?php $direccion = $this->getAttribute('direccion'); ?>
<?php $is_edit = $this->getAttribute('edit'); ?>
<?php $cuenta = $this->getAttribute('cuenta'); ?>
<?php $usuario = $this->getAttribute('usuario'); ?>
<?php $contratos = $this->getAttribute('contratos'); ?>
<?php $contratosEmpresa = $this->getAttribute('contratosEmpresa'); ?>

<div class="sidebar-nav-content">
    <div class="box box_templete">
        <div class="box-header well">
            <h2><i class="icon-th"></i> Detalles de la empresa</h2>              
        </div>
        <div class="box-content">
            <div>
                <form id="gestion_empresas_form">
                    <fieldset>
                        <div class="searched-info">
                            <legend class="legend_custom">Responsable</legend>
                            <div class="row-fluid">
                                <div class="span4">
                                    <div class="control-group">
                                        <div class="input-prepend center span12" title="Nombre" data-rel="tooltip">
                                            <span class="add-on"><i class="icon-user"></i></span><input value="<?php if ($is_edit) echo $usuario->nombre ?>"  class="input-large span10 validate[required]" name="nombre" id="respondable_nombre" type="text" placeholder="Nombre" data-prompt-position="topLeft:2%"/>
                                        </div>                                      
                                    </div> 
                                </div>
                                <div class="span4">
                                    <div class="control-group">
                                        <div class="input-prepend center span12" title="Apellidos" data-rel="tooltip">
                                            <span class="add-on"><i class="icon-user"></i></span><input value="<?php if ($is_edit) echo $usuario->apellidoPaterno ?>" class="input-large span10 validate[required]" name="apellidoPaterno" id="respondable_apellidoP" type="text" placeholder="Apellido paterno" data-prompt-position="topLeft:2%"/>
                                        </div>                                      
                                    </div>                                     
                                </div>
                                  
                            </div>
                            <div class="row-fluid">
                                <div class="span4">
                                    <div class="control-group">
                                        <div class="input-prepend center span12" title="Email" data-rel="tooltip">
                                            <span class="add-on"><i class="icon-envelope"></i></span><input value="<?php if ($is_edit) echo $usuario->email ?>"  class="input-large span10 validate[required,custom[email]]" name="email" id="email" type="text" placeholder="Email" data-prompt-position="topLeft:2%"/>
                                        </div>                                        
                                    </div>                                     
                                </div>     
                                <div class="span4">
                                    <div class="control-group">
                                        <div class="input-prepend center span12" title="Contraseña" data-rel="tooltip">
                                            <span class="add-on"><i class="icon-asterisk"></i></span><input value="<?php if ($is_edit) echo $usuario->password?>"  class="input-large span10 validate[required]" name="password" id="password" type="password" placeholder="Contraseña" data-prompt-position="topLeft:2%"/>
                                        </div>                                        
                                    </div>                                     
                                </div>
                                <div class="span4">
                                    <div class="control-group">
                                        <div class="input-prepend center span12" title="Confirma Contraseña" data-rel="tooltip">
                                            <span class="add-on"><i class="icon-asterisk"></i></span><input value="<?php if ($is_edit) echo $usuario->password?>"  class="input-large span10 validate[required,equals[password]]" name="conf_password" id="conf_password" type="password" placeholder="Confirma Contraseña" data-prompt-position="topLeft:2%"/>
                                        </div>                                        
                                    </div>                                     
                                </div>
                            </div>
                            <legend class="legend_custom">Datos generales</legend>
                            <div class="row-fluid">
                                <div class="span4">
                                    <div class="control-group">                                   
                                        <div class="input-prepend center span12" title="Nombre fiscal(empresa)" data-rel="tooltip">
                                            <span class="add-on"><i class="icon-briefcase"></i></span><input value="<?php if ($is_edit) echo $empresa->nombreFiscal ?>"  class="input-large span10 validate[required]" name="nombreFiscal" id="nfiscal" type="text" placeholder="Nombre fiscal(empresa)" data-prompt-position="topLeft:2%"/>
                                        </div>
                                    </div> 
                                    <div class="control-group">                                    
                                        <div class="input-prepend center span12" title="CIF" data-rel="tooltip">
                                            <span class="add-on"><i class="icon-file"></i></span><input value="<?php if ($is_edit) echo $empresa->cif ?>"  class="input-large span10 validate[required]" name="cif" id="cif" type="text" placeholder="CIF" data-prompt-position="topLeft:2%"/>
                                        </div> 
                                    </div>
                                    <div class="control-group">
                                        <div class="input-prepend center span12" title="Nombre de la calle" data-rel="tooltip">
                                            <span class="add-on"><i class="icon-road"></i></span><input value="<?php if ($is_edit) echo $direccion->calle ?>"  class="input-large span10" name="calle" id="nmbcalle" type="text" placeholder="Nombre de la calle" />
                                        </div>
                                    </div>
                                    <div class="control-group"> 
                                        <div class="input-prepend center span12" title="Número de la calle" data-rel="tooltip">
                                            <span class="add-on"><i class="icon-road"></i></span><input value="<?php if ($is_edit) echo $direccion->numero ?>" class="input-large span10" name="numero" id="ncalle" type="text" placeholder="Número" />
                                        </div>                                    
                                    </div>                                        
                                </div>
                                <div class="span4">
                                    <div class="control-group">
                                        <div class="input-prepend center span12" title="provincia" data-rel="tooltip">
                                            <span class="add-on"><i class="icon-globe"></i></span>
                                            <select class="input_large span10 validate[required]" name="idProvincia" id="select_provincia">
                                                <option  disabled>Provincia</option>                                        
                                                <?php foreach ($provincias as $provin) { ?>
                                                    <option value="<?php echo $provin->idProvincia; ?>" <?php if ($pais->nombre == 'Euro') echo 'selected="selected"' ?>><?php echo $provin->nombre; ?></option>
                                                <?php } ?>                                                 
                                            </select>                                    
                                        </div>                                         
                                    </div>
                                    <div class="control-group">
                                        <div class="input-prepend center span12" title="Código postal" data-rel="tooltip">
                                            <span class="add-on"><i class="icon-envelope"></i></span><input value="<?php if ($is_edit) echo $direccion->codigoPostal ?>"  class="input-large span10" name="codigoPostal" id="cp" type="text" placeholder="Código postal" />
                                        </div>                                            
                                    </div>   
                                    <div class="control-group">                                    
                                        <div class="input-prepend center span12" title="Número de cuenta IBAN" data-rel="tooltip">
                                            <span class="add-on"><i class="icon-lock"></i></span><input value="<?php if ($is_edit) echo $cuenta->iban ?>"  class="input-large span10 validate[required]" name="iban" id="cIBAN" type="text" placeholder="Número de cuenta IBAN" data-prompt-position="topLeft:2%"/>
                                        </div>                                         
                                    </div> 
                                    <div class="control-group">                                    
                                        <div class="input-prepend center span12" title="Teléfono" data-rel="tooltip">
                                            <span class="add-on"><i class="icon-certificate"></i></span><input value="<?php if ($is_edit) echo $empresa->telefono ?>"   class="input-large span10" name="telefono" id="telefono" type="text" placeholder="Teléfono" data-prompt-position="topLeft:2%"/>
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
                                                    <option value="<?php echo $pais->idPais ?>" <?php if ($pais->nombreCompleto == 'España') echo 'selected="selected"' ?>><?php echo $pais->nombreCompleto ?></option>
                                                <?php } ?>                                                
                                            </select>                                    
                                        </div>                                          
                                    </div>
                                    <div class="control-group">                                    
                                        <div class="input-prepend center span12" title="Swif" data-rel="tooltip">
                                            <span class="add-on"><i class="icon-file"></i></span><input value="<?php if ($is_edit) echo $cuenta->swif ?>"   class="input-large span10 validate[required]" name="swif" id="swift" type="text" placeholder="Swift" data-prompt-position="topLeft:2%"/>
                                        </div>                                        
                                    </div>
                                    <div class="control-group">                                    
                                        <div class="input-prepend center span12" title="Moneda Base" data-rel="tooltip">
                                            <span class="add-on"><i class="icon-globe"></i></span>
                                            <select class="input_large span10 validate[required]" name="idMoneda" id="idMoneda">
                                                <option disabled>Moneda Base</option>  
                                                <?php foreach ($monedas as $moneda) { ?>
                                                    <option value="<?php echo $moneda->idMoneda; ?>" <?php if ($pais->nombre == 'Euro') echo 'selected="selected"' ?>><?php echo $moneda->simbolo . ' ' . $moneda->nombre; ?></option>
                                                <?php } ?>    
                                            </select>
                                        </div>                                                                               
                                    </div>   
                                    <div class="control-group">                                    
                                        <div class="input-prepend center span12" title="Móvil" data-rel="tooltip">
                                            <span class="add-on"><i class="icon-certificate"></i></span><input value="<?php if ($is_edit) echo $empresa->telefonoAlterno ?>"   class="input-large span10" name="telefonoAlterno" id="movil" type="text" placeholder="Móvil" data-prompt-position="topLeft:2%"/>
                                        </div>                                        
                                    </div>
                                </div>
                               <!-- <legend class="legend_custom">Contratos</legend>
                                <div class="row-fluid">
                                    <div class="span12 contratos_list_container">
                                        <?php if ($contratosEmpresa && count($contratosEmpresa) > 0) {
                                            foreach ($contratosEmpresa as $contratoEmp) {
                                                ?>
                                                <div class="span6 contrato_child_content">
                                                    <div class="control-group contrato-group">                                    
                                                        <div class="input-prepend span4" title="Contratos" data-rel="tooltip">
                                                            <span class="add-on"><i class="icon-file"></i></span>
                                                            <select class="input_large span10 validate[required]" name="contratosUpdate[<?php echo $contratoEmp->idEmpresaContrato; ?>]">
                                                                <option disabled selected>Contratos...</option>  
                                                                <?php if ($contratos && count($contratos) > 0) {
                                                                    foreach ($contratos as $contrato) {
                                                                        ?>
                                                                        <option value="<?php echo $contrato->idContrato; ?>" <?php if ($contratoEmp->idContrato == $contrato->idContrato) { ?> selected="selected" <?php } ?> > <?php echo $contrato->nombre; ?> </option>  
                                                                    <?php }
                                                                } else {
                                                                    ?>
                                                                    <option disabled>No existen contratos.</option>  
        <?php } ?>
                                                            </select>
                                                        </div>  
                                                        <div class="input-prepend span3" title="Fecha inicial" data-rel="tooltip">
                                                            <div id="" class="input-append span12 date datepicker date-start" data-date-format="dd-mm-yyyy">
                                                                <input  class="span10 validate[required]" value="<?php echo $contratoEmp->fechaInicio; ?>" size="16" name="fechaInicioUpdate[<?php echo $contratoEmp->idEmpresaContrato; ?>]" type="text" readonly><span class="add-on"><i class="icon-th"></i></span>
                                                            </div>
                                                        </div> 
                                                        <div class="input-prepend span3" title="Fecha final" data-rel="tooltip">
                                                            <div id="" class="input-append span12 date datepicker date-end" data-date-format="dd-mm-yyyy">
                                                                <input  class="span10 validate[required]" value="<?php echo $contratoEmp->fechaFin; ?>" size="16" name="fechaFinalUpdate[<?php echo $contratoEmp->idEmpresaContrato; ?>]" type="text" readonly><span class="add-on"><i class="icon-th"></i></span>
                                                            </div>
                                                        </div> 
                                                        <a href="#" class="btn delete_contrato_exist borde-boton" contratoemp-id="<?php echo $contratoEmp->idEmpresaContrato; ?>" ><i class="icon-trash"></i></a>
                                                    </div>
                                                </div>
                                            <?php }
                                        } else {
                                            ?>
                                            <h1 class="title_no_contrato">Empresa aún no cuenta con contratos.</h1>
<?php } ?>
                                    </div>

                                    <div class="span12 new_contratos_list_container">

                                    </div>

                                    <div class="render_contratos_container" style="display: none; ">
                                        <div class="span5 render_row">
                                            <div class="control-group contrato-group">                                    
                                                <div class="input-prepend span4" title="Contratos" data-rel="tooltip">
                                                    <span class="add-on"><i class="icon-file"></i></span>
                                                    <select class="input_large span10 validate[required]" name="contratosInsert[]">
                                                        <option value="" disabled selected>Contratos...</option>  
                                                        <?php if ($contratos && count($contratos) > 0) {
                                                            foreach ($contratos as $contrato) {
                                                                ?>
                                                                <option value="<?php echo $contrato->idContrato; ?>" > <?php echo $contrato->nombre; ?> </option>  
    <?php }
} else {
    ?>
                                                            <option disabled>No existen contratos.</option>  
<?php } ?>
                                                    </select>
                                                </div>  
                                                <div class="input-prepend span3" title="Fecha inicial" data-rel="tooltip">
                                                    <div id="" class="input-append span12 date datepicker date-start" data-date-format="dd-mm-yyyy">
                                                        <input  class="span10 validate[required]" size="16" name="fechaInicioInsert[]" type="text" readonly><span class="add-on"><i class="icon-th"></i></span>
                                                    </div>
                                                </div> 
                                                <div class="input-prepend span3" title="Fecha final" data-rel="tooltip">
                                                    <div id="" class="input-append span12 date datepicker date-end" data-date-format="dd-mm-yyyy">
                                                        <input  class="span10 validate[required]" size="16" name="fechaFinalInsert[]" type="text" readonly><span class="add-on"><i class="icon-th"></i></span>
                                                    </div>
                                                </div> 
                                                <a href="#" class="btn delete_node_contrato borde-boton"><i class="icon-trash"></i></a>
                                            </div>  
                                        </div>
                                    </div>
                                    <div class="btn-group add_contrato_button_container">
                                        <a class="btn btn-primary" id="add_contrato" href="#"><i class="icon icon-white icon-edit"></i> Agregar contrato</a>
                                    </div>
                                </div>-->
                            </div>
                            <input name="id_direccion_update" id="id_direccion_update" type="hidden" value="<?php echo ($direccion->idDireccion) ?>"/> 
                            <input name="id_cuenta_update" id="id_cuenta_update" type="hidden" value="<?php echo $cuenta->idCuenta ?>"/>
                            <input name="id_usuario_update" id="id_usuario_update" type="hidden" value="<?php echo $usuario->idUsuario ?>"/>
                            <input name="id_empresa_update" id="id_empresa_update" type="hidden" value="<?php echo $empresa->idEmpresa ?>"/>                                     
                            <input name="action" value="<?php if ($is_edit) echo 'update'; else echo 'insert' ?>" type="hidden"/> 
                            <input name="lat" value="40.4113554" type="hidden"/>
                            <input name="lon" value="-3.7028359" type="hidden"/>

                            <div class="control-group center">
                                <a href="<?php echo $this->base_url ?>/admin-empresa-lista" class="btn abort-act" id="cancelar_operacion" >Cancelar</a>
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
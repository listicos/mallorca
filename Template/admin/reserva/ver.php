<?php 
$empresas = $this->getAttribute('empresas');
$apartamentos = $this->getAttribute('apartamentos');
$usuarios = $this->getAttribute('usuarios');
$aptoId = $this->getAttribute('apartamentoId');
$canales = $this->getAttribute('canales');
$articulos = $this->getAttribute('articulos');
$articulos_reserva = $this->getAttribute('articulos_reserva');
$precio_desglosado = $this->getAttribute('precio_desglosado');
$canal = $this->getAttribute('canal');

if($this->getAttribute('reserva')) {
    $reserva = $this->getAttribute('reserva');
    $apto = $this->getAttribute('apartamento');
    $user = $this->getAttribute('usuario');
}

?>
<br class="clear"/>
<div class="sidebar-nav-content">
    <div class="box box_templete">
        <div class="box-content">
            <form id="frmUpdateReserva">
                <input type="hidden" name="action" value="updateReserva">
                <?php
                    if($reserva->idReservacion)
                        echo "<input type='hidden' name='idReservacion' value='".$reserva->idReservacion."'>";
                ?>
                <fieldset>
                    
                    <legend class="legend_custom">Estado de la reserva</legend>
                        <div class="row-fluid datos_alojamiento">
                            <div class="span4">
                               <div class="input-prepend center span12" title="Estado" data-rel="tooltip">
                                  <span class="detalles_apartamento_prepend"><i class="icon-user"></i></span>
                                  <select class="reserva_select span10" name="estatus">
                                       <option value="Pendiente" <?php if(strcmp($reserva->estatus, "Pendiente") == 0) echo "selected"; ?> >Pendiente</option>
                                       <option value="Aprobado" <?php if(strcmp($reserva->estatus, "Aprobado") == 0) echo "selected"; ?>>Aprobado</option>
                                       <option value="Rechazado" <?php if(strcmp($reserva->estatus, "Rechazado") == 0) echo "selected"; ?>>Rechazado</option>
                                       <option value="Validado" <?php if(strcmp($reserva->estatus, "Validado") == 0) echo "selected"; ?>>Validado</option>
                                       <option value="Cancelado por el cliente" <?php if(strcmp($reserva->estatus, "Cancelado por el cliente") == 0) echo "selected"; ?>>Cancelado por el cliente</option>

                                  </select>
                               </div> 
                           </div>
                       </div>
                    
                    <?php if(!isset($aptoId)) { ?>
                    <legend>Buscar propiedad <small>(Busca una propiedad y seleccionala de la lista)</small></legend>
                        <div class="row-fluid">
                            <div class="span4">
                                <div class="control-group">
                                    <div class="input-prepend center span12" title="Apartamento" data-rel="tooltip">
                                        <span class="add-on"><i class="icon-home"></i></span>
                                        <input autocomplete="off" autofocus class="input-large span10 validate[required]" name="apartamento" id="apartamento" type="text" placeholder="Apartamento" data-prompt-position="topLeft:2%" data-type="user" value="<?php echo $apto->nombre ?>"/>
                                        <input type="hidden" name="idApartamento" id="idApartamento" value="<?php echo $apto->idApartamento ?>">
                                    </div>                                      
                                </div>
                            </div>
                        </div>
                    <?php } else { ?>
                        <input type="hidden" id="hiddenaptoreservar" name="idApartamento" value="<?php echo $aptoId; ?>">
                    <?php } ?>
                    
                    <div id="demo" class="">
                        <legend class="legend_custom">(Opcional) Buscar hu&eacute;sped <small>(Si ya es un húesped registrado puede buscarlo)</small></legend>
                        <div class="row-fluid">
                            <div class="span4">
                                <div class="control-group">
                                    <div class="input-prepend center span12" title="Usuario" data-rel="tooltip">
                                        <span class="add-on"><i class="icon-user"></i></span>
                                        <input autocomplete="off" class="input-large span10" name="usuario" id="usuario" type="text" placeholder="Usuario" data-prompt-position="topLeft:2%" data-type="user" value="<?php echo $user->nombre.' '.$user->apellidoPaterno.' '.$user->apellidoMaterno ?>"/>
                                        <input type="hidden" name="huespedId" id="huespedId" value="<?php echo $user->idUsuario ?>">
                                    </div>                                      
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                    <legend class="legend_custom">Datos del húesped <small>(Si es un húesped nuevo, tiene que llenar los campos)</small></legend>
                        <div class="row-fluid">

                            <div class="span4">
                            
                                <div class="control-group">
                                    <div class="input-prepend center span12" title="Nombre" data-rel="tooltip">
                                        <span class="add-on"><i class="icon-user"></i></span>
                                        <input autocomplete="off" class="input-large span10 validate[required]" name="nombre" id="respondable_nombre" type="text" placeholder="Nombre" data-prompt-position="topLeft:2%" data-type="user" value="<?php echo $user->nombre ?>"/>
                                    </div>                                      
                                </div> 
                            </div>
                            <div class="span4">
                                <div class="control-group">
                                    <div class="input-prepend center span12" title="Apellido/s" data-rel="tooltip">
                                        <span class="add-on"><i class="icon-user"></i></span><input autocomplete="off" class="input-large span10 validate[required]" name="apellidoPaterno" id="respondable_apellidoP" type="text" placeholder="Apellido/s" data-prompt-position="topLeft:2%" data-type="user" value="<?php echo $user->apellidoPaterno ?>"/>
                                    </div>                                      
                                </div>                                     
                            </div>
                              <div class="span4">
                                <div class="control-group">
                                    <div class="input-prepend center span12" title="Email" data-rel="tooltip">
                                        <span class="add-on"><i class="icon-envelope"></i></span>
                                        <input autocomplete="off" class="input-large span10 validate[required,custom[email]]" name="email" id="respondable_email" type="text" placeholder="Email" data-prompt-position="topLeft:2%" data-type="user" value="<?php echo $user->email ?>"/>
                                    </div>                                        
                                </div>                                     
                            </div>

                        </div>
                        <div class="row-fluid">
                                                                  
                            <div class="span4">
                                <div class="control-group">
                                    <div class="input-prepend center span12" title="Teléfono" data-rel="tooltip">
                                        <span class="add-on"><i class="icon-headphones"></i></span>
                                        <input autocomplete="off" class="input-large span10" name="telefono" id="respondable_telefono" type="text" placeholder="Teléfono" data-prompt-position="topLeft:2%" data-type="user" value="<?php echo $user->telefono ?>"/>
                                    </div>                                        
                                </div>                                     
                            </div>     
                               
                                                        <div class="span4">
                                <div class="control-group">
                                    <div class="input-prepend center span12" title="Teléfono alterno" data-rel="tooltip">
                                        <span class="add-on"><i class="icon-user"></i></span><input autocomplete="off" class="input-large span10" name="telefonoAlterno" id="respondable_telefono_alterno" type="text" placeholder="Teléfono alterno" data-prompt-position="topLeft:2%" data-type="user" value="<?php echo $user->telefonoAlterno ?>"/>
                                    </div>                                      
                                </div>                                     
                            </div>  
                        
                            <div class="span4">
                                <div class="control-group">
                                    <div class="input-prepend center span12" title="Contrase&ntilde;a" data-rel="tooltip">
                                        <span class="add-on"><i class="icon-envelope"></i></span>
                                        <input autocomplete="off" class="input-large span10" name="password" id="respondable_email" type="password" placeholder="Contrase&ntilde;a" data-prompt-position="topLeft:2%" data-type="user"/>
                                    </div>                                       
                                </div>                                     
                            </div>                                       
                        </div>

                            <legend class="legend_custom">Datos de reserva</legend>
                            <div class="row-fluid datos_alojamiento">
                                <div class="span4">
                                    <div class="control-group">
                                        <div class="input-prepend center span12" title="Entrada" data-rel="tooltip">
                                            <span class="add-on"><i class="icon-calendar"></i></span>
                                            <input autocomplete="off" class="input-large span10 validate[required]" name="fechaInicio" id="fechaInicio" type="text" placeholder="Entrada" data-prompt-position="topLeft:" value="<?php if($reserva->fechaEntrada) echo date_format( new DateTime($reserva->fechaEntrada), 'd-m-Y') ?>"/>
                                        </div>                                      
                                    </div>   
                                     <div class="control-group">
                                        <div class="input-prepend center span12" title="Salida" data-rel="tooltip">
                                            <span class="add-on"><i class="icon-calendar"></i></span>
                                            <input autocomplete="off" class="input-large span10 validate[required]" name="fechaFinal" id="fechaFinal" type="text" placeholder="Salida" data-prompt-position="topLeft:2%" value="<?php if($reserva->fechaSalida) echo date_format( new DateTime($reserva->fechaSalida), 'd-m-Y') ?>"/>
                                        </div>                                      
                                    </div> 
                                        <div class="control-group">
                                        <div class="input-prepend center span12" title="Total reserva" data-rel="tooltip">
                                            <span class="add-on"><i class="icon-list"></i></span><input autocomplete="off" class="input-large span10" name="totalReserva" id="totalReserva" type="text" placeholder="Total reserva" data-prompt-position="topLeft:2%" value="<?php echo $reserva->total ?>"/>
                                        </div>                                      
                                    </div>  
                                </div>     
                        
                           <div class="span4">
                                <div class="control-group">
                                    <div class="input-prepend center span12" title="Hora de entrada" data-rel="tooltip">
                                        <span class="detalles_apartamento_prepend"><i class="icon-time"></i></span>
                                        <select class="span10" title="Hora de entrada" name="horaEntrada" id="horaEntrada">
                                            <option value="" disabled selected>Hora de llegada</option>
                                            <?php
                                                for($i = 0; $i <= 23; $i++) {
                                                    $hora = ($i < 10 ? "0". $i : $i) . ":00";
                                            ?>
                                            <option value="<?php echo $hora; ?>" <?php if($reserva->horaEntrada && strcmp($hora, date_format(new DateTime($reserva->horaEntrada), 'H:i')) == 0) echo 'selected' ?> ><?php echo $hora; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>  
                                
                                <div class="control-group">
                                    <div class="input-prepend center span12" title="Hora de salida" data-rel="tooltip">
                                        <span class="detalles_apartamento_prepend"><i class="icon-time"></i></span>
                                        <select class="span10" title="Hora de salida" name="horaSalida" id="horaSalida">
                                            <option value="" disabled selected>Hora de salida</option>
                                            <?php
                                                for($i = 0; $i <= 23; $i++) {
                                                    $hora = ($i < 10 ? "0". $i : $i) . ":00";
                                            ?>
                                                <option value="<?php echo $hora; ?>" <?php if($reserva->horaSalida && strcmp($hora, date_format(new DateTime($reserva->horaSalida), 'H:i')) == 0) echo 'selected' ?> ><?php echo $hora; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>  

                                <div class="input-prepend center span12" title="Canal / Origen" data-rel="tooltip">
                                   <span class="detalles_apartamento_prepend"><i class="icon-user"></i></span>
                                   <select class="reserva_select span10" name="idCanal">
                                        <?php foreach ($canales as $canal) {
                                            echo '<option value="'.$canal->idCanal.'" ';
                                            if($canal->idCanal == $reserva->idCanal) echo 'selected';
                                            echo ' senia="'.$canal->senia.'"';
                                            echo '>'.$canal->nombre;
                                            echo '</option>';
                                        }?>
                                   </select>
                               </div>
                           </div>
                            <div class="span4">
                               <div class="control-group">
                                   <div class="input-prepend center span12" title="Huéspedes adultos" data-rel="tooltip">
                                       <span class="detalles_apartamento_prepend"><i class="icon-user"></i></span>
                                       <select class="reserva_select span10" name="adultos">
                                            <?php for ($i=2; $i < 31; $i++) { 
                                             echo '<option value="'.$i.'"';
                                             if($reserva->adultos == $i) echo 'selected';
                                             echo '>'.$i.'</option>';
                                            }?>
                                       </select>
                                   </div>
                               </div> 
                               <div class="control-group">
                                   <div class="input-prepend center span12" title="Ni&ntilde;os" data-rel="tooltip">
                                       <span class="detalles_apartamento_prepend"><i class="icon-user"></i></span>
                                       <select class="reserva_select span10" name="ninios">
                                           <option value="0" disabled selected>Ni&ntilde;os</option>
                                            <?php for ($i=1; $i < 31; $i++) { 
                                             echo '<option value="'.$i.'"';
                                             if($reserva->ninios == $i) echo 'selected';
                                             echo '>'.$i.'</option>';
                                            }?>
                                       </select>
                                   </div>
                               </div>  
                               <div class="control-group">
                                   <div class="input-prepend center span12" title="Beb&eacute;s" data-rel="tooltip">
                                       <span class="detalles_apartamento_prepend"><i class="icon-user"></i></span>
                                       <select class="reserva_select span10" name="bebes">
                                           <option value="0" disabled selected>Beb&eacute;s</option>
                                            <?php for ($i=1; $i < 31; $i++) { 
                                             echo '<option value="'.$i.'"';
                                             if($reserva->bebes == $i) echo 'selected';
                                             echo '>'.$i.'</option>';
                                            }?>
                                       </select>
                                   </div>
                               </div>                  
                           </div>
                        </div>
                        <legend class="legend_custom">Art&iacute;culos adicionales</legend>
                        <div class="hidden" id="articulohidden">
                            <div class="span4 instalaciones_row">
                                    <div class="control-group ">
                                        <label class="checkbox inline articulo-label">
                                            
                                        </label> 
                                    
                                        <div class="input-prepend center span12" title="Cantidad" data-rel="tooltip">

                                            <span class="detalles_apartamento_prepend"><i class="icon-globe"></i></span>
                                            <select name="idArticulo[]" class="reserva_select span9" >
                                                <?php for($i=0;$i<=200;$i++){?>
                                                <option value="<?php echo $i ?>"  ><?php echo $i ?></option>
                                                <?php } ?>
                                            </select>
                                        </div> 
                                    </div>
                                </div>
                        </div>
                        <div class="row-fluid articulos-adicionales">
                            <?php if($articulos && count($articulos > 0)) foreach ($articulos as $art) { ?>
                                        <div class="span4 instalaciones_row">
                                            <div class="control-group">
                                                <label class="checkbox inline articulo-label">
                                                    <?php echo $art->nombre; ?> (€<?php echo $art->precioBase;?>)
                                                </label> 
                                            
                                                <div class="input-prepend center span12" title="Cantidad" data-rel="tooltip">

                                                    <span class="detalles_apartamento_prepend"><i class="icon-globe"></i></span>
                                                    <select name="idArticulo[<?php echo $art->idArticulo ?>]" class="reserva_select span9">
                                                        <?php for($i=0;$i<=200;$i++){?>
                                                        <option value="<?php echo $i ?>" <?php if ($articulos_reserva && $articulos_reserva[$art->idArticulo] == $i) { ?> selected="" <?php } ?>  ><?php echo $i ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div> 
                                            </div>
                                        </div>
                            <?php } ?>
                        </div>
                        <legend class="legend_custom">Datos de cobro</legend>
                        <div class="row-fluid">
                            <div class="span4">
                                <div class="control-group">

                                    <div class="input-prepend center span12" name="tarjeta" title="Tipo de cobro" data-rel="tooltip">

                                        <span class="detalles_apartamento_prepend"><i class="icon-globe"></i></span>
                                        <select id="tipo_cobro" name="cobro[tipo]" class="reserva_select span7">
                                            <option value="tarjeta" selected>Tarjeta</option>
                                            <option value="paypal">Paypal</option>
                                            <option value="transferencia">Transferencia</option>
                                        </select>
                                        <a id="agregar_cobro" class="btn btn-primary" style="margin-left:20px;">Agregar</a>   
                                    </div>
                                </div> 

                            </div>  
                        </div>
                        <div id="cobro_todos">
                        <?php
                            if($reserva->pagos)
                                foreach($reserva->pagos as $pago) {
                                if(strcmp($pago->tipo, 'transferencia') == 0) {
                        ?>
                         <div class="hidden-obj" style="display:block;">
                             <i class="icon-trash"></i>
                            <div class="row-fluid">   
                            <div class="span4">
                                <div class="control-group">
                                    <div class="input-prepend center span12" data-rel="tooltip" data-original-title="Número de cuenta">
                                        <span class="add-on"><i class="icon-user"></i></span>
                                        <input autocomplete="off" class="input-large span10" name="transferencia[<?php echo $pago->idReservacionPago ?>][iban]"  type="text" placeholder="Número de cuenta" data-prompt-position="topLeft:2%" value="<?php echo $pago->cuenta->iban ?>">
                                        <input type="hidden" name="transferencia[<?php echo $pago->idReservacionPago ?>][idReservacionPago]" value="<?php echo $pago->idReservacionPago ?>">
                                        <input type="hidden" name="transferencia[<?php echo $pago->idReservacionPago ?>][formaPago]" value="pago">
                                    </div>                                      
                                </div> 
                            </div>
                            <div class="span4">
                                <div class="control-group">
                                    <div class="input-prepend center span12" data-rel="tooltip" data-original-title="Importe">
                                        <span class="add-on"><i class="icon-user"></i></span>
                                        <input autocomplete="off" class="input-large span10" name="transferencia[<?php echo $pago->idReservacionPago ?>][importe]" id="respondable_importe" type="text" placeholder="Importe a cobrar" data-prompt-position="topLeft:2%" value="<?php echo $pago->importe ?>">
                                    </div>                                      
                                </div> 
                            </div>
                            <div class="span4">

                                 <div class="control-group">
                                    <div class="input-prepend center span12" data-rel="tooltip" data-original-title="Número de autorización">
                                        <span class="add-on"><i class="icon-user"></i></span>
                                        <input autocomplete="off" class="input-large span10" name="transferencia[<?php echo $pago->idReservacionPago ?>][autorizacion]" id="respondable_autorizacion" type="text" placeholder="Número de autorización" data-prompt-position="topLeft:2%" value="<?php echo $pago->autorizacion ?>">
                                    </div>                                      
                                </div>
                            </div>
                            <div class="row-fluid">
                            <div class="span4">
                                 <div class="control-group">
                                    <div class="input-prepend span12 center" data-rel="tooltip" data-original-title="Estado del cobro">
                                     <span class="detalles_apartamento_prepend"><i class="icon-globe"></i></span>
                                        <select class="reserva_select span10" name="transferencia[<?php echo $pago->idReservacionPago ?>][estado]">
                                            <option value="pendiente" <?php if($pago->estado && strcmp("pendiente", $pago->estado)==0) echo 'selected' ?> >Pendiente</option>
                                            <option value="denegada" <?php if($pago->estado && strcmp("denegada", $pago->estado)==0) echo 'selected' ?> >Denegada</option>
                                            <option value="confirmada" <?php if($pago->estado && strcmp("confirmada", $pago->estado)==0) echo 'selected' ?> >Confirmada</option>
                                        </select>
                                    </div>
                                </div> 
                            </div>
                            
                            <?php if(hasRoles("Administrador")) { ?>
                            <div class="span4">
                                <div class="control-group">
                                    <div class="input-prepend span12 check-container" title="Validado" data-rel="tooltip">
                                        <label><input type="checkbox" value="1" <?php if($pago->validada) echo 'checked'; ?>  name="transferencia[<?php echo $pago->idReservacionPago ?>][validada]">
                                        Validado</label>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            </div>
                             <legend class="list-separator">&nbsp;</legend>
                            </div>
                        </div>
                                <?php } else if (strcmp($pago->tipo, 'paypal') == 0) { ?>
                        <div class="hidden-obj" style="display:block;">
                            <i class="icon-trash"></i>
                            <div class="row-fluid">  
                            <div class="span4">
                                <div class="control-group">
                                    <div class="input-prepend center span12" data-rel="tooltip" data-original-title="Paypal">
                                        <span class="add-on"><i class="icon-user"></i></span>
                                        <input autocomplete="off" class="input-large span10" name="paypal[<?php echo $pago->idReservacionPago ?>][paypal]"  type="text" placeholder="Paypal" data-prompt-position="topLeft:2%" value="<?php echo $pago->cuenta->paypal ?>" >
                                        <input type="hidden" name="paypal[<?php echo $pago->idReservacionPago ?>][idReservacionPago]" value="<?php echo $pago->idReservacionPago ?>">
                                        <input type="hidden" name="paypal[<?php echo $pago->idReservacionPago ?>][formaPago]" value="pago">
                                    </div>                                      
                                </div> 
                            </div>
                            <div class="span4">
                                <div class="control-group">
                                    <div class="input-prepend center span12" data-rel="tooltip" data-original-title="Importe">
                                        <span class="add-on"><i class="icon-user"></i></span>
                                        <input autocomplete="off" class="input-large span10" name="paypal[<?php echo $pago->idReservacionPago ?>][importe]" id="respondable_importe" type="text" placeholder="Importe a cobrar" data-prompt-position="topLeft:2%" value="<?php echo $pago->importe ?>">
                                    </div>                                      
                                </div> 
                            </div>
                            <div class="span4">

                                 <div class="control-group">
                                    <div class="input-prepend center span12" data-rel="tooltip" data-original-title="Número de autorización">
                                        <span class="add-on"><i class="icon-user"></i></span>
                                        <input autocomplete="off" class="input-large span10" name="paypal[<?php echo $pago->idReservacionPago ?>][autorizacion]" id="respondable_autorizacion" type="text" placeholder="Número de autorización" data-prompt-position="topLeft:2%" value="<?php echo $pago->autorizacion ?>">
                                    </div>                                      
                                </div>
                            </div>
                            <div class="row-fluid">
                            <div class="span4">
                                 <div class="control-group">
                                    <div class="input-prepend span12 center" data-rel="tooltip" data-original-title="Estado del cobro">
                                     <span class="detalles_apartamento_prepend"><i class="icon-globe"></i></span>
                                        <select class="reserva_select span10" name="paypal[<?php echo $pago->idReservacionPago ?>][estado]">
                                            <option value="pendiente" <?php if($pago->estado && strcmp("pendiente", $pago->estado)==0) echo 'selected' ?> >Pendiente</option>
                                            <option value="denegada" <?php if($pago->estado && strcmp("denegada", $pago->estado)==0) echo 'selected' ?> >Denegada</option>
                                            <option value="confirmada" <?php if($pago->estado && strcmp("confirmada", $pago->estado)==0) echo 'selected' ?> >Confirmada</option>
                                        </select>
                                    </div>
                                </div> 
                            </div> 
                            <?php if(hasRoles("Administrador")) { ?>
                            <div class="span4">
                                <div class="control-group">
                                    <div class="input-prepend span12 check-container" title="Validado" data-rel="tooltip">
                                        <label><input type="checkbox" value="1" <?php if($pago->validada) echo 'checked'; ?>  name="paypal[<?php echo $pago->idReservacionPago ?>][validada]">
                                        Validado</label>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            </div>
                            <legend class="list-separator">&nbsp;</legend>
                            </div>
                        </div>
                                <?php } else { ?>
                        <div class="hidden-obj" style="display:block;">
                        <i class="icon-trash"></i>
                        <div class="row-fluid " >
                            
                            <div class="span4">
                                <div class="control-group">
                                    <div class="input-prepend center span12" title="Nombre" data-rel="tooltip">
                                        <span class="add-on"><i class="icon-user"></i></span>
                                        <input autocomplete="off" class="input-large span10" name="tarjeta[<?php echo $pago->idReservacionPago ?>][titular]" id="respondable_nombre" type="text" placeholder="Nombre del Titular" data-prompt-position="topLeft:2%" value="<?php echo $pago->cuenta->titular ?>"/>
                                        <input type="hidden" name="tarjeta[<?php echo $pago->idReservacionPago ?>][idReservacionPago]" value="<?php echo $pago->idReservacionPago ?>">
                                        <input type="hidden" name="tarjeta[<?php echo $pago->idReservacionPago ?>][formaPago]" value="pago">
                                    </div>                                      
                                </div> 
                            </div>
                            <div class="span4">
                                <div class="control-group">
                                    <div class="input-prepend center span12" name="tarjeta" title="Tarjeta" data-rel="tooltip">
                                        <span class="detalles_apartamento_prepend"><i class="icon-globe"></i></span>
                                        <select name="tarjeta[<?php echo $pago->idReservacionPago ?>][tipoTarjeta]" class="reserva_select span10">
                                            <option value="" disabled selected>Tipo</option>
                                            <option <?php if(strcmp('Visa crédito',$pago->cuenta->tipoTarjeta)==0) echo 'selected' ?> >Visa crédito</option>
                                            <option <?php if(strcmp('Visa débito',$pago->cuenta->tipoTarjeta)==0) echo 'selected' ?>>Visa débito</option>
                                            <option <?php if(strcmp('Master Card',$pago->cuenta->tipoTarjeta)==0) echo 'selected' ?>>Master Card</option>
                                            <option <?php if(strcmp('American Express',$pago->cuenta->tipoTarjeta)==0) echo 'selected' ?>>American Express</option>
                                            <option <?php if(strcmp('Dinner',$pago->cuenta->tipoTarjeta)==0) echo 'selected' ?>>Dinner</option>
                                            <option <?php if(strcmp('Discover',$pago->cuenta->tipoTarjeta)==0) echo 'selected' ?>>Discover</option>
                                        </select>
                                    </div>
                                </div>                                 
                            </div>  
                            <div class="span4">
                                <div class="control-group">
                                    <div class="input-prepend center span12" title="Número de tarjeta" data-rel="tooltip">
                                        <span class="add-on"><i class="icon-user"></i></span>
                                        <input autocomplete="off" class="input-large span10" name="tarjeta[<?php echo $pago->idReservacionPago ?>][numero]"  type="text" placeholder="Número de tarjeta" data-prompt-position="topLeft:2%" value="<?php echo $pago->cuenta->numero ?>"/>
                                    </div>                                      
                                </div> 
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span2 offset2">
                                <div class="control-group center">
                                    <span class="help-inline">(CVC/CVV)</span><input name="tarjeta[<?php echo $pago->idReservacionPago ?>][cvv]" class="reserva_numero_tarjeta" type="text" maxlength="4" value="<?php echo $pago->cuenta->cvv ?>">
                                </div>  
                            </div>
                            <div class="span4">
                                  <div class="control-group">
                                    <div class="input-prepend span12 center" title="Mes" data-rel="tooltip">
                                     <span class="detalles_apartamento_prepend"><i class="icon-globe"></i></span>
                                        <select class="reserva_select span10" name="tarjeta[<?php echo $pago->idReservacionPago ?>][caducidadMes]">
                                            <option value="" disabled selected>Mes</option>
                                            <option value="1" <?php if($pago->cuenta->caducidadMes==1) echo 'selected' ?>>1 - Enero</option>
                                            <option value="2" <?php if($pago->cuenta->caducidadMes==2) echo 'selected' ?>>2 - Febrero</option>
                                            <option value="3" <?php if($pago->cuenta->caducidadMes==3) echo 'selected' ?>>3 - Marzo</option>
                                            <option value="4" <?php if($pago->cuenta->caducidadMes==4) echo 'selected' ?>>4 - Abril</option>
                                            <option value="5" <?php if($pago->cuenta->caducidadMes==5) echo 'selected' ?>>5 - Mayo</option>
                                            <option value="6" <?php if($pago->cuenta->caducidadMes==6) echo 'selected' ?>>6 - Junio</option>
                                            <option value="7" <?php if($pago->cuenta->caducidadMes==7) echo 'selected' ?>>7 - Julio</option>
                                            <option value="8" <?php if($pago->cuenta->caducidadMes==8) echo 'selected' ?>>8 - Agosto</option>
                                            <option value="9" <?php if($pago->cuenta->caducidadMes==9) echo 'selected' ?>>9 - Septiembre</option>
                                            <option value="10" <?php if($pago->cuenta->caducidadMes==10) echo 'selected' ?>>10 - Octubre</option>
                                            <option value="11" <?php if($pago->cuenta->caducidadMes==11) echo 'selected' ?>>11 - Noviembre</option>
                                            <option value="12" <?php if($pago->cuenta->caducidadMes==12) echo 'selected' ?>>12 - Diciembre</option>
                                        </select>
                                    </div>
                                </div> 
                                <div class="control-group">
                                    <div class="input-prepend span12 center" title="Año" data-rel="tooltip">
                                        <span class="detalles_apartamento_prepend"><i class="icon-globe"></i></span>
                                        <select class="reserva_select span10" name="tarjeta[<?php echo $pago->idReservacionPago ?>][caducidadAnio]">
                                            <option value="" disabled selected>Año</option>
                                            <?php for ($i=date('Y'); $i < date('Y')+40; $i++) { 
                                             echo '<option value="'.$i.'"';
                                             if($pago->cuenta->caducidadAnio == $i) echo 'selected';
                                             echo '>'.$i.'</option>';
                                            }?>
                                        </select>
                                    </div>
                                </div>
                                <?php if(hasRoles("Administrador")) { ?>
                                <div class="control-group">
                                    <div class="input-prepend span12 check-container" title="Validado" data-rel="tooltip">
                                        <label><input type="checkbox" value="1" <?php if($pago->validada) echo 'checked'; ?>  name="tarjeta[<?php echo $pago->idReservacionPago ?>][validada]">
                                        Validado</label>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                            <div class="span4">
                                <div class="control-group">
                                    <div class="input-prepend center span12" title="Importe" data-rel="tooltip">
                                        <span class="add-on"><i class="icon-user"></i></span>
                                        <input autocomplete="off" class="input-large span10" name="tarjeta[<?php echo $pago->idReservacionPago ?>][importe]" id="respondable_importe" type="text" placeholder="Importe a cobrar" data-prompt-position="topLeft:2%" value="<?php echo $pago->importe ?>"/>
                                    </div>                                      
                                </div> 
                                 <div class="control-group">
                                    <div class="input-prepend center span12" title="Número de autorización" data-rel="tooltip">
                                        <span class="add-on"><i class="icon-user"></i></span>
                                        <input autocomplete="off" class="input-large span10" name="tarjeta[<?php echo $pago->idReservacionPago ?>][autorizacion]" id="respondable_autorizacion" type="text" placeholder="Número de autorización" data-prompt-position="topLeft:2%" value="<?php echo $pago->autorizacion ?>"/>
                                    </div>                                      
                                </div>
                                 <div class="control-group">
                                    <div class="input-prepend span12 center" title="Estado del cobro" data-rel="tooltip">
                                     <span class="detalles_apartamento_prepend"><i class="icon-globe"></i></span>
                                        <select class="reserva_select span10" name="tarjeta[<?php echo $pago->idReservacionPago ?>][estado]">
                                            <option value="pendiente" <?php if($pago->estado && strcmp("pendiente", $pago->estado)==0) echo 'selected' ?> >Pendiente</option>
                                            <option value="denegada" <?php if($pago->estado && strcmp("denegada", $pago->estado)==0) echo 'selected' ?> >Denegada</option>
                                            <option value="confirmada" <?php if($pago->estado && strcmp("confirmada", $pago->estado)==0) echo 'selected' ?> >Confirmada</option>
                                        </select>
                                    </div>
                                </div> 
                                
                            </div>
                          </div>
                            <legend class="list-separator">&nbsp;</legend>
                          </div>   
                        <?php
                                }
                            }
                        ?>
                        </div>
                        <div class="hidden-obj" id="cobro_transferencia">
                            <i class="icon-trash"></i>
                            <div class="row-fluid">
                            <div class="span4">
                                <div class="control-group">
                                    <div class="input-prepend center span12" data-rel="tooltip" data-original-title="Número de cuenta">
                                        <span class="add-on"><i class="icon-user"></i></span>
                                        <input autocomplete="off" class="input-large span10" disabled name="transferencia[XX][iban]"  type="text" placeholder="Número de cuenta" data-prompt-position="topLeft:2%">
                                        <input type="hidden" name="transferencia[XX][formaPago]" value="pago" disabled>
                                    </div>                                      
                                </div> 
                            </div>
                            <div class="span4">
                                <div class="control-group">
                                    <div class="input-prepend center span12" data-rel="tooltip" data-original-title="Importe">
                                        <span class="add-on"><i class="icon-user"></i></span>
                                        <input autocomplete="off" class="input-large span10" disabled name="transferencia[XX][importe]" id="respondable_importe" type="text" placeholder="Importe a cobrar" data-prompt-position="topLeft:2%">
                                    </div>                                      
                                </div> 
                            </div>
                            <div class="span4">

                                 <div class="control-group">
                                    <div class="input-prepend center span12" data-rel="tooltip" data-original-title="Número de autorización">
                                        <span class="add-on"><i class="icon-user"></i></span>
                                        <input autocomplete="off" class="input-large span10" disabled name="transferencia[XX][autorizacion]" id="respondable_autorizacion" type="text" placeholder="Número de autorización" data-prompt-position="topLeft:2%">
                                    </div>                                      
                                </div>
                            </div>
                            <div class="row-fluid">
                            <div class="span4">
                                 <div class="control-group">
                                    <div class="input-prepend span12 center" data-rel="tooltip" data-original-title="Estado del cobro">
                                     <span class="detalles_apartamento_prepend"><i class="icon-globe"></i></span>
                                        <select class="reserva_select span10" name="transferencia[XX][estado]" disabled>
                                            <option value="pendiente">Pendiente</option>
                                            <option value="denegada">Denegada</option>
                                            <option value="confirmada">Confirmada</option>
                                        </select>
                                    </div>
                                </div> 
                            </div> 
                            <?php if(hasRoles("Administrador")) { ?>
                            <div class="span4">
                                <div class="control-group">
                                    <div class="input-prepend span12 check-container" title="Validado" data-rel="tooltip">
                                        <label><input type="checkbox" value="1" name="transferencia[XX][validada]">
                                        Validado</label>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            </div>
                            <legend class="list-separator">&nbsp;</legend>
                            </div>
                        </div>
                        <div class="hidden-obj" id="cobro_paypal">
                            <i class="icon-trash"></i>
                            <div class="row-fluid">
                            <div class="span4">
                                <div class="control-group">
                                    <div class="input-prepend center span12" data-rel="tooltip" data-original-title="Paypal">
                                        <span class="add-on"><i class="icon-user"></i></span>
                                        <input autocomplete="off" class="input-large span10" disabled name="paypal[XX][paypal]"  type="text" placeholder="Paypal" data-prompt-position="topLeft:2%">
                                        <input type="hidden" name="paypal[XX][formaPago]" value="pago" disabled>
                                    </div>                                      
                                </div> 
                            </div>
                            <div class="span4">
                                <div class="control-group">
                                    <div class="input-prepend center span12" data-rel="tooltip" data-original-title="Importe">
                                        <span class="add-on"><i class="icon-user"></i></span>
                                        <input autocomplete="off" class="input-large span10" disabled name="paypal[XX][importe]" id="respondable_importe" type="text" placeholder="Importe a cobrar" data-prompt-position="topLeft:2%">
                                    </div>                                      
                                </div> 
                            </div>
                            <div class="span4">

                                 <div class="control-group">
                                    <div class="input-prepend center span12" data-rel="tooltip" data-original-title="Número de autorización">
                                        <span class="add-on"><i class="icon-user"></i></span>
                                        <input autocomplete="off" class="input-large span10" disabled name="paypal[XX][autorizacion]" id="respondable_autorizacion" type="text" placeholder="Número de autorización" data-prompt-position="topLeft:2%">
                                    </div>                                      
                                </div>
                            </div>
                            <div class="row-fluid">
                            <div class="span4">
                                 <div class="control-group">
                                    <div class="input-prepend span12 center" data-rel="tooltip" data-original-title="Estado del cobro">
                                     <span class="detalles_apartamento_prepend"><i class="icon-globe"></i></span>
                                        <select class="reserva_select span10" name="paypal[XX][estado]" disabled>
                                            <option value="pendiente">Pendiente</option>
                                            <option value="denegada">Denegada</option>
                                            <option value="confirmada">Confirmada</option>
                                        </select>
                                    </div>
                                </div> 
                            </div> 
                            <?php if(hasRoles("Administrador")) { ?>
                            <div class="span4">
                                <div class="control-group">
                                    <div class="input-prepend span12 check-container" title="Validado" data-rel="tooltip">
                                        <label><input type="checkbox" value="1" name="paypal[XX][validado]">
                                        Validado</label>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            </div>
                            <legend class="list-separator">&nbsp;</legend>
                            </div>
                        </div>
                        <div class="hidden-obj" id="cobro_tarjeta">
                        <i class="icon-trash"></i>
                        <div class="row-fluid">
                            <div class="span4">
                                <div class="control-group">
                                    <div class="input-prepend center span12" title="Nombre" data-rel="tooltip">
                                        <span class="add-on"><i class="icon-user"></i></span>
                                        <input autocomplete="off" class="input-large span10" disabled name="tarjeta[XX][titular]" id="respondable_nombre" type="text" placeholder="Nombre del Titular" data-prompt-position="topLeft:2%"/>
                                        <input type="hidden" name="tarjeta[XX][formaPago]" value="pago" disabled>
                                    </div>                                      
                                </div> 
                            </div>
                            <div class="span4">
                                <div class="control-group">
                                    <div class="input-prepend center span12" name="tarjeta" title="Tarjeta" data-rel="tooltip">
                                        <span class="detalles_apartamento_prepend"><i class="icon-globe"></i></span>
                                        <select name="tarjeta[XX][tipoTarjeta]" class="reserva_select span10" disabled>
                                            <option value="" disabled selected>Tipo</option>
                                            <option>Visa crédito</option>
                                            <option>Visa débito</option>
                                            <option>Master Card</option>
                                            <option>American Express</option>
                                            <option>Dinner</option>
                                            <option>Discover</option>
                                        </select>
                                    </div>
                                </div>                                 
                            </div>  
                            <div class="span4">
                                <div class="control-group">
                                    <div class="input-prepend center span12" title="Número de tarjeta" data-rel="tooltip">
                                        <span class="add-on"><i class="icon-user"></i></span>
                                        <input autocomplete="off" class="input-large span10" name="tarjeta[XX][numero]" disabled  type="text" placeholder="Número de tarjeta" data-prompt-position="topLeft:2%"/>
                                    </div>                                      
                                </div> 
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span2 offset2">
                                <div class="control-group center">
                                    <span class="help-inline">(CVC/CVV)</span><input name="tarjeta[XX][cvv]" disabled class="reserva_numero_tarjeta" type="text" maxlength="4">
                                </div>  
                            </div>
                            <div class="span4">
                                  <div class="control-group">
                                    <div class="input-prepend span12 center" title="Mes" data-rel="tooltip">
                                     <span class="detalles_apartamento_prepend"><i class="icon-globe"></i></span>
                                        <select class="reserva_select span10" name="tarjeta[XX][caducidadMes]" disabled>
                                            <option value="" disabled selected>Mes</option>
                                            <option value="1">1 - Enero</option>
                                            <option value="2">2 - Febrero</option>
                                            <option value="3">3 - Marzo</option>
                                            <option value="4">4 - Abril</option>
                                            <option value="5">5 - Mayo</option>
                                            <option value="6">6 - Junio</option>
                                            <option value="7">7 - Julio</option>
                                            <option value="8">8 - Agosto</option>
                                            <option value="9">9 - Septiembre</option>
                                            <option value="10">10 - Octubre</option>
                                            <option value="11">11 - Noviembre</option>
                                            <option value="12">12 - Diciembre</option>
                                        </select>
                                    </div>
                                </div> 
                                <div class="control-group">
                                    <div class="input-prepend span12 center" title="Año" data-rel="tooltip">
                                        <span class="detalles_apartamento_prepend"><i class="icon-globe"></i></span>
                                        <select class="reserva_select span10" name="tarjeta[XX][caducidadAnio]" disabled>
                                            <option value="" disabled selected>Año</option>
                                            <?php for ($i=date('Y'); $i < date('Y')+40; $i++) { 
                                             echo '<option value="'.$i.'">'.$i.'</option>';
                                            }?>
                                        </select>
                                    </div>
                                </div>
                                <?php if(hasRoles("Administrador")) { ?>
                                <div class="control-group">
                                    <div class="input-prepend span12 check-container" title="Validado" data-rel="tooltip">
                                        <label><input type="checkbox" value="1" name="tarjeta[XX][validado]">
                                        Validado</label>
                                    </div>
                                </div>
                                <?php } ?>

                            </div>
                            <div class="span4">
                                <div class="control-group">
                                    <div class="input-prepend center span12" title="Importe" data-rel="tooltip">
                                        <span class="add-on"><i class="icon-user"></i></span>
                                        <input autocomplete="off" class="input-large span10" disabled name="tarjeta[XX][importe]" id="respondable_importe" type="text" placeholder="Importe a cobrar" data-prompt-position="topLeft:2%"/>
                                    </div>                                      
                                </div> 
                                 <div class="control-group">
                                    <div class="input-prepend center span12" title="Número de autorización" data-rel="tooltip">
                                        <span class="add-on"><i class="icon-user"></i></span>
                                        <input autocomplete="off" class="input-large span10" disabled name="tarjeta[XX][autorizacion]" id="respondable_autorizacion" type="text" placeholder="Número de autorización" data-prompt-position="topLeft:2%"/>
                                    </div>                                      
                                </div>
                                 <div class="control-group">
                                    <div class="input-prepend span12 center" title="Estado del cobro" data-rel="tooltip">
                                     <span class="detalles_apartamento_prepend"><i class="icon-globe"></i></span>
                                        <select class="reserva_select span10" name="tarjeta[XX][estado]" disabled>
                                            <option value="pendiente" >Pendiente</option>
                                            <option value="denegada">Denegada</option>
                                            <option value="confirmada">Confirmada</option>
                                        </select>
                                    </div>
                                </div> 
                            </div>
                          </div>
                            <legend class="list-separator">&nbsp;</legend>
                          </div>
                          <div class="hidden-obj" id="cobro_efectivo">
                            <i class="icon-trash"></i>
                            <div class="row-fluid">
                            <div class="span4">
                                <div class="control-group">
                                    <div class="input-prepend center span12" data-rel="tooltip" data-original-title="Importe">
                                        <span class="add-on"><i class="icon-user"></i></span>
                                        <input autocomplete="off" class="input-large span10" disabled name="efectivo[XX][importe]" id="respondable_importe" type="text" placeholder="Importe a cobrar" data-prompt-position="topLeft:2%">
                                        <input type="hidden" name="efectivo[XX][formaPago]" value="fianza" disabled>
                                    </div>                                      
                                </div> 
                            </div>
                            <div class="span4">

                                 <div class="control-group">
                                    <div class="input-prepend center span12" data-rel="tooltip" data-original-title="Número de autorización">
                                        <span class="add-on"><i class="icon-user"></i></span>
                                        <input autocomplete="off" class="input-large span10" disabled name="efectivo[XX][autorizacion]" id="respondable_autorizacion" type="text" placeholder="Número de autorización" data-prompt-position="topLeft:2%">
                                    </div>                                      
                                </div>
                            </div>
                            <div class="row-fluid">
                            <div class="span4">
                                 <div class="control-group">
                                    <div class="input-prepend span12 center" data-rel="tooltip" data-original-title="Estado del cobro">
                                     <span class="detalles_apartamento_prepend"><i class="icon-globe"></i></span>
                                        <select class="reserva_select span10" name="efectivo[XX][estado]" disabled>
                                            <option value="devuelto">Devuelto</option>
                                            <option value="retenido">Retenido</option>
                                        </select>
                                    </div>
                                </div> 
                            </div>  
                            <?php if(hasRoles("Administrador")) { ?>
                            <div class="span4">
                                <div class="control-group">
                                    <div class="input-prepend span12 check-container" title="Validado" data-rel="tooltip">
                                        <label><input type="checkbox" value="1" name="efectivo[XX][validado]">
                                        Validado</label>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            </div>
                            <legend class="list-separator">&nbsp;</legend>
                            </div>
                        </div>
                        <legend class="legend_custom">Fianza</legend>
                        <div class="row-fluid">
                            <div class="span4">
                                <div class="control-group">

                                    <div class="input-prepend center span12" name="tipoFianza" title="Tipo de cobro" data-rel="tooltip">

                                        <span class="detalles_apartamento_prepend"><i class="icon-globe"></i></span>
                                        <select id="tipo_cobro_fianza" name="cobro[tipo]" class="reserva_select span7">
                                            <option value="tarjeta" selected>Tarjeta</option>
                                            <option value="efectivo">Efectivo</option>
                                        </select>
                                        <a id="agregar_cobro_fianza" class="btn btn-primary" style="margin-left:20px;">Agregar</a>   
                                    </div>
                                </div> 

                            </div>  
                        </div>
                        <div id="cobro_todos_fianza">
                        <?php
                            if($reserva->pagosFianza)
                                foreach($reserva->pagosFianza as $pago) {
                                if(strcmp($pago->tipo, 'efectivo') == 0) {
                        ?>
                         <div class="hidden-obj" style="display:block;">
                             <i class="icon-trash"></i>
                            <div class="row-fluid">   
                            <div class="span4">
                                <div class="control-group">
                                    <div class="input-prepend center span12" data-rel="tooltip" data-original-title="Importe">
                                        <span class="add-on"><i class="icon-user"></i></span>
                                        <input autocomplete="off" class="input-large span10" name="efectivo[<?php echo $pago->idReservacionPago ?>][importe]" id="respondable_importe" type="text" placeholder="Importe a cobrar" data-prompt-position="topLeft:2%" value="<?php echo $pago->importe ?>">
                                        <input type="hidden" name="efectivo[<?php echo $pago->idReservacionPago ?>][formaPago]" value="fianza">
                                        <input type="hidden" name="efectivo[<?php echo $pago->idReservacionPago ?>][idReservacionPago]" value="<?php echo $pago->idReservacionPago ?>">
                                    </div>                                      
                                </div> 
                            </div>
                            <div class="span4">
                                 <div class="control-group">
                                    <div class="input-prepend center span12" data-rel="tooltip" data-original-title="Número de autorización">
                                        <span class="add-on"><i class="icon-user"></i></span>
                                        <input autocomplete="off" class="input-large span10" name="efectivo[<?php echo $pago->idReservacionPago ?>][autorizacion]" id="respondable_autorizacion" type="text" placeholder="Número de autorización" data-prompt-position="topLeft:2%" value="<?php echo $pago->autorizacion ?>">
                                    </div>                                      
                                </div>
                            </div>
                            <div class="row-fluid">
                            <div class="span4">
                                 <div class="control-group">
                                    <div class="input-prepend span12 center" data-rel="tooltip" data-original-title="Estado del cobro">
                                     <span class="detalles_apartamento_prepend"><i class="icon-globe"></i></span>
                                        <select class="reserva_select span10" name="efectivo[<?php echo $pago->idReservacionPago ?>][estado]">
                                            <option value="retenido" <?php if($pago->estado && strcmp("retenido", $pago->estado)==0) echo 'selected' ?> >Retenido</option>
                                            <option value="devuelto" <?php if($pago->estado && strcmp("devuelto", $pago->estado)==0) echo 'selected' ?> >Devuelto</option>
                                            
                                        </select>
                                    </div>
                                </div> 
                            </div>
                            <?php if(hasRoles("Administrador")) { ?>
                            <div class="span4">
                                <div class="control-group">
                                    <div class="input-prepend span12 check-container" title="Validado" data-rel="tooltip">
                                        <label><input type="checkbox" value="1" <?php if($pago->validado) echo 'checked'; ?>  name="efectivo[<?php echo $pago->idReservacionPago ?>][validado]">
                                        Validado</label>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            </div>
                            
                             <legend class="list-separator">&nbsp;</legend>
                            </div>
                        </div>
                                <?php } else { ?>
                        <div class="hidden-obj" style="display:block;">
                        <i class="icon-trash"></i>
                        <div class="row-fluid " >
                            
                            <div class="span4">
                                <div class="control-group">
                                    <div class="input-prepend center span12" title="Nombre" data-rel="tooltip">
                                        <span class="add-on"><i class="icon-user"></i></span>
                                        <input autocomplete="off" class="input-large span10" name="tarjeta[<?php echo $pago->idReservacionPago ?>][titular]" id="respondable_nombre" type="text" placeholder="Nombre del Titular" data-prompt-position="topLeft:2%" value="<?php echo $pago->cuenta->titular ?>"/>
                                        <input type="hidden" name="tarjeta[<?php echo $pago->idReservacionPago ?>][idReservacionPago]" value="<?php echo $pago->idReservacionPago ?>">
                                        <input type="hidden" name="tarjeta[<?php echo $pago->idReservacionPago ?>][formaPago]" value="fianza"> 
                                    </div>                                      
                                </div> 
                            </div>
                            <div class="span4">
                                <div class="control-group">
                                    <div class="input-prepend center span12" name="tarjeta" title="Tarjeta" data-rel="tooltip">
                                        <span class="detalles_apartamento_prepend"><i class="icon-globe"></i></span>
                                        <select name="tarjeta[<?php echo $pago->idReservacionPago ?>][tipoTarjeta]" class="reserva_select span10">
                                            <option value="" disabled selected>Tipo</option>
                                            <option <?php if(strcmp('Visa crédito',$pago->cuenta->tipoTarjeta)==0) echo 'selected' ?> >Visa crédito</option>
                                            <option <?php if(strcmp('Visa débito',$pago->cuenta->tipoTarjeta)==0) echo 'selected' ?>>Visa débito</option>
                                            <option <?php if(strcmp('Master Card',$pago->cuenta->tipoTarjeta)==0) echo 'selected' ?>>Master Card</option>
                                            <option <?php if(strcmp('American Express',$pago->cuenta->tipoTarjeta)==0) echo 'selected' ?>>American Express</option>
                                            <option <?php if(strcmp('Dinner',$pago->cuenta->tipoTarjeta)==0) echo 'selected' ?>>Dinner</option>
                                            <option <?php if(strcmp('Discover',$pago->cuenta->tipoTarjeta)==0) echo 'selected' ?>>Discover</option>
                                        </select>
                                    </div>
                                </div>                                 
                            </div>  
                            <div class="span4">
                                <div class="control-group">
                                    <div class="input-prepend center span12" title="Número de tarjeta" data-rel="tooltip">
                                        <span class="add-on"><i class="icon-user"></i></span>
                                        <input autocomplete="off" class="input-large span10" name="tarjeta[<?php echo $pago->idReservacionPago ?>][numero]"  type="text" placeholder="Número de tarjeta" data-prompt-position="topLeft:2%" value="<?php echo $pago->cuenta->numero ?>"/>
                                    </div>                                      
                                </div> 
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span2 offset2">
                                <div class="control-group center">
                                    <span class="help-inline">(CVC/CVV)</span><input name="tarjeta[<?php echo $pago->idReservacionPago ?>][cvv]" class="reserva_numero_tarjeta" type="text" maxlength="4" value="<?php echo $pago->cuenta->cvv ?>">
                                </div>  
                            </div>
                            <div class="span4">
                                  <div class="control-group">
                                    <div class="input-prepend span12 center" title="Mes" data-rel="tooltip">
                                     <span class="detalles_apartamento_prepend"><i class="icon-globe"></i></span>
                                        <select class="reserva_select span10" name="tarjeta[<?php echo $pago->idReservacionPago ?>][caducidadMes]">
                                            <option value="" disabled selected>Mes</option>
                                            <option value="1" <?php if($pago->cuenta->caducidadMes==1) echo 'selected' ?>>1 - Enero</option>
                                            <option value="2" <?php if($pago->cuenta->caducidadMes==2) echo 'selected' ?>>2 - Febrero</option>
                                            <option value="3" <?php if($pago->cuenta->caducidadMes==3) echo 'selected' ?>>3 - Marzo</option>
                                            <option value="4" <?php if($pago->cuenta->caducidadMes==4) echo 'selected' ?>>4 - Abril</option>
                                            <option value="5" <?php if($pago->cuenta->caducidadMes==5) echo 'selected' ?>>5 - Mayo</option>
                                            <option value="6" <?php if($pago->cuenta->caducidadMes==6) echo 'selected' ?>>6 - Junio</option>
                                            <option value="7" <?php if($pago->cuenta->caducidadMes==7) echo 'selected' ?>>7 - Julio</option>
                                            <option value="8" <?php if($pago->cuenta->caducidadMes==8) echo 'selected' ?>>8 - Agosto</option>
                                            <option value="9" <?php if($pago->cuenta->caducidadMes==9) echo 'selected' ?>>9 - Septiembre</option>
                                            <option value="10" <?php if($pago->cuenta->caducidadMes==10) echo 'selected' ?>>10 - Octubre</option>
                                            <option value="11" <?php if($pago->cuenta->caducidadMes==11) echo 'selected' ?>>11 - Noviembre</option>
                                            <option value="12" <?php if($pago->cuenta->caducidadMes==12) echo 'selected' ?>>12 - Diciembre</option>
                                        </select>
                                    </div>
                                </div> 
                                <div class="control-group">
                                    <div class="input-prepend span12 center" title="Año" data-rel="tooltip">
                                        <span class="detalles_apartamento_prepend"><i class="icon-globe"></i></span>
                                        <select class="reserva_select span10" name="tarjeta[<?php echo $pago->idReservacionPago ?>][caducidadAnio]">
                                            <option value="" disabled selected>Año</option>
                                            <?php for ($i=date('Y'); $i < date('Y')+40; $i++) { 
                                             echo '<option value="'.$i.'"';
                                             if($pago->cuenta->caducidadAnio == $i) echo 'selected';
                                             echo '>'.$i.'</option>';
                                            }?>
                                        </select>
                                    </div>
                                </div>
                                <?php if(hasRoles("Administrador")) { ?>
                                <div class="control-group">
                                    <div class="input-prepend span12 check-container" title="Validado" data-rel="tooltip">
                                        <label><input type="checkbox" value="1" <?php if($pago->validado) echo 'checked'; ?>  name="tarjeta[<?php echo $pago->idReservacionPago ?>][validado]">
                                        Validado</label>
                                    </div>
                                </div>
                                <?php } ?>

                            </div>
                            <div class="span4">
                                <div class="control-group">
                                    <div class="input-prepend center span12" title="Importe" data-rel="tooltip">
                                        <span class="add-on"><i class="icon-user"></i></span>
                                        <input autocomplete="off" class="input-large span10" name="tarjeta[<?php echo $pago->idReservacionPago ?>][importe]" id="respondable_importe" type="text" placeholder="Importe a cobrar" data-prompt-position="topLeft:2%" value="<?php echo $pago->importe ?>"/>
                                    </div>                                      
                                </div> 
                                 <div class="control-group">
                                    <div class="input-prepend center span12" title="Número de autorización" data-rel="tooltip">
                                        <span class="add-on"><i class="icon-user"></i></span>
                                        <input autocomplete="off" class="input-large span10" name="tarjeta[<?php echo $pago->idReservacionPago ?>][autorizacion]" id="respondable_autorizacion" type="text" placeholder="Número de autorización" data-prompt-position="topLeft:2%" value="<?php echo $pago->autorizacion ?>"/>
                                    </div>                                      
                                </div>
                                 <div class="control-group">
                                    <div class="input-prepend span12 center" title="Estado del cobro" data-rel="tooltip">
                                     <span class="detalles_apartamento_prepend"><i class="icon-globe"></i></span>
                                        <select class="reserva_select span10" name="tarjeta[<?php echo $pago->idReservacionPago ?>][estado]">
                                            <option value="devuelto" <?php if($pago->estado && strcmp("devuelto", $pago->estado)==0) echo 'selected' ?> >Devuelto</option>
                                            <option value="retenido" <?php if($pago->estado && strcmp("retenido", $pago->estado)==0) echo 'selected' ?> >Retenido</option>
                                            
                                        </select>
                                    </div>
                                </div> 
                            </div>
                          </div>
                            <legend class="list-separator">&nbsp;</legend>
                          </div>   
                        <?php
                                }
                            }
                        ?>
                        </div>
                        <legend class="legend_custom">Check-in</legend>
                        <div class="row-fluid datos_alojamiento">
                            <div class="span4">
                                <div class="input-prepend center span12" title="¿Quien hace la entrada?" data-rel="tooltip">
                                   <span class="detalles_apartamento_prepend"><i class="icon-user"></i></span>
                                   <select class="reserva_select span10" name="idResponsableEntrada">
                                        <?php foreach ($usuarios as $usuario) {
                                            echo '<option value="'.$usuario->idUsuario.'"';
                                            if($reserva->idResponsableEntrada == $usuario->idUsuario)
                                                echo 'selected';
                                            echo '>'.$usuario->nombre.' '.$usuario->apellidoPaterno.'</option>';
                                        }?>
                                   </select>
                                </div>                                
                            </div>
                            <div class="span4">
                               <div class="control-group">
                                   <div class="input-prepend center span12" title="Llaves entregadas" data-rel="tooltip">
                                       <span class="detalles_apartamento_prepend"><i class="icon-user"></i></span>
                                       <select class="reserva_select span10" name="llavesEntregadas">
                                           <option value="0" disabled selected>Llaves entregadas</option>
                                            <?php for ($i=1; $i < 11; $i++) { 
                                             echo '<option value="'.$i.'"';
                                             if($reserva->llavesEntregadas == $i)
                                                echo 'selected';
                                             echo '>'.$i.'</option>';
                                            }?>
                                       </select>
                                   </div>
                               </div> 
                            </div>
                            <div class="span4">
                                <div class="control-group">
                                    <div class="input-prepend center span12" title="¿Donde se hace el Check-in?" data-rel="tooltip">
                                        <span class="add-on"><i class="icon-globe"></i></span>
                                        <input autocomplete="off" class="input-large span10" name="lugarEntrada" 
                                               id="lugarEntrada" type="text" placeholder="Lugar de entrada" 
                                               data-prompt-position="topLeft:2%"
                                               value="<?php echo $reserva->lugarEntrada ?>"/>
                                    </div>                                      
                                </div> 
                            </div>
                        </div>
                        <div class="row-fluid datos_alojamiento">
                            <div class="span4">
                                <div class="control-group">
                                    <div class="input-prepend center span12" title="Número de parking" data-rel="tooltip">
                                        <span class="add-on"><i class="icon-globe"></i></span>
                                        <input autocomplete="off" class="input-large span10" name="parkingNumero" 
                                               id="parkingNumero" type="text" placeholder="Nº de parking" 
                                               data-prompt-position="topLeft:2%"
                                               value="<?php echo $reserva->parkingNumero ?>"/>
                                    </div>                                      
                                </div> 
                            </div>
                            <div class="span4">
                               <div class="control-group">
                                   <div class="input-prepend center span12" title="Llaves de parking entregadas" data-rel="tooltip">
                                       <span class="detalles_apartamento_prepend"><i class="icon-user"></i></span>
                                       <select class="reserva_select span10" name="parkingLlavesEntregadas">
                                       <option value="0" disabled selected>Llaves de parking entregadas</option>
                                            <?php for ($i=1; $i < 11; $i++) { 
                                             echo '<option value="'.$i.'"';
                                             if($reserva->parkingLlavesEntregadas == $i)
                                                echo 'selected';
                                             echo '>'.$i.'</option>';
                                            }?>
                                       </select>
                                   </div>
                               </div> 
                            </div>
                            <div class="span4">
                               <div class="control-group">
                                   <div class="input-prepend center span12" title="Mandos entregados" data-rel="tooltip">
                                       <span class="detalles_apartamento_prepend"><i class="icon-user"></i></span>
                                       <select class="reserva_select span10" name="parkingMandosEntregados">
                                       <option value="0" disabled selected>Mandos entregados</option>
                                            <?php for ($i=1; $i < 11; $i++) { 
                                             echo '<option value="'.$i.'"';
                                             if($reserva->parkingMandosEntregados == $i)
                                                echo 'selected';
                                             echo '>'.$i.'</option>';
                                            }?>
                                       </select>
                                   </div>
                               </div> 
                            </div>
                        </div>

                        <legend class="legend_custom">Check-out</legend>
                        <div class="row-fluid datos_alojamiento">
                            <div class="span4">
                                <div class="input-prepend center span12" title="¿Quien hace la salida?" data-rel="tooltip">
                                   <span class="detalles_apartamento_prepend"><i class="icon-user"></i></span>
                                   <select class="reserva_select span10" name="idResponsableSalida">
                                        <?php foreach ($usuarios as $usuario) {
                                            echo '<option value="'.$usuario->idUsuario.'"';
                                            if($reserva->idResponsableSalida == $usuario->idUsuario)
                                                echo 'selected';
                                            echo '>'.$usuario->nombre.' '.$usuario->apellidoPaterno.'</option>';
                                        }?>
                                   </select>
                                </div> 
                            </div>
                            <div class="span4">
                               <div class="control-group">
                                   <div class="input-prepend center span12" title="Llaves devueltas" data-rel="tooltip">
                                       <span class="detalles_apartamento_prepend"><i class="icon-user"></i></span>
                                       <select class="reserva_select span10" name="llavesDevueltas">
                                       <option value="0" disabled selected>Llaves devueltas</option>
                                            <?php for ($i=1; $i < 11; $i++) { 
                                             echo '<option value="'.$i.'"';
                                             if($reserva->llavesDevueltas == $i)
                                                echo 'selected';
                                             echo '>'.$i.'</option>';
                                            }?>
                                       </select>
                                   </div>
                               </div> 
                            </div>
                            <div class="span4">
                                <div class="control-group">
                                    <div class="input-prepend center span12" title="Revisión de salida" data-rel="tooltip">
                                        <span class="add-on"><i class="icon-globe"></i></span>
                                        <input autocomplete="off" class="input-large span10" 
                                               name="revisionSalidaComentarios" id="revisionSalidaComentarios" 
                                               type="text" placeholder="Comentarios de revisión de salida" 
                                               data-prompt-position="topLeft:2%"
                                               value="<?php echo $reserva->revisionSalidaComentarios ?>"/>
                                    </div>                                      
                                </div> 
                            </div>
                            </div>
                            <div class="row-fluid">
                            <div class="span4">
                               <div class="control-group">
                                   <div class="input-prepend center span12" title="Llaves de parking devueltas" data-rel="tooltip">
                                       <span class="detalles_apartamento_prepend"><i class="icon-user"></i></span>
                                       <select class="reserva_select span10" name="parkingLlavesDevueltas">
                                       <option value="0" disabled selected>Llaves de parking devueltas</option>
                                            <?php for ($i=1; $i < 11; $i++) { 
                                             echo '<option value="'.$i.'"';
                                             if($reserva->parkingLlavesDevueltas == $i)
                                                echo 'selected';
                                             echo '>'.$i.'</option>';
                                            }?>
                                       </select>
                                   </div>
                               </div> 
                            </div>
                            <div class="span4">
                               <div class="control-group">
                                   <div class="input-prepend center span12" title="Mandos devueltos" data-rel="tooltip">
                                       <span class="detalles_apartamento_prepend"><i class="icon-user"></i></span>
                                       <select class="reserva_select span10" name="parkingMandosDevueltos">
                                       <option value="0" disabled selected>Mandos devueltos</option>
                                            <?php for ($i=1; $i < 11; $i++) { 
                                             echo '<option value="'.$i.'"';
                                             if($reserva->parkingMandosDevueltos == $i)
                                                echo 'selected';
                                             echo '>'.$i.'</option>';
                                            }?>
                                       </select>
                                   </div>
                               </div> 
                            </div>
                        </div>

                        
                        <legend class="legend_custom">Comentarios</legend>
                         <div class="row-fluid datos_alojamiento">
                           <div class="span12">
                                <div class="control-group" title="Comentarios generales" data-rel="tooltip">
                                    <textarea class="span12" name="observaciones" rows="5" placeholder="Comentarios generales"><?php echo $reserva->observaciones ?></textarea>                                        
                                </div>                                     
                            </div>
                        </div>
                        
                        

                        <div class="row-fluid">
                        <div class="control-group span12 center">
                            <button class="btn  btn-primary noty save_c" type="submit" data-noty-options='{"text":"Información agregada exitosamente","layout":"top","type":"information"}'> Guardar</button>
                            <button type="reset" class="btn abort-act">Cancelar</button>                                 
                        </div>                              
                    </div>
                    </div> 
                </fieldset>
            </form>
            <div class="clearfix"></div>
        </div>
    </div>
 
    <div id="resumen-cuenta">
        <div class="show-resumen" title="Mostrar Resumen">
            <i class="icon-list"></i>
        </div>
        <div class="resumen">
            <div class="row-fluid">
                <div class="span6">
                    Tarifa PVP:
                </div>
                <div class="span5 pvp">
                    <?php if($precio_desglosado) echo money_format ("%i", $precio_desglosado['pvp']); ?>
                </div>
                <div class="span6">
                    Suplementos:
                </div>
                <div class="span5 articulos-subtotal">
                    <?php if($precio_desglosado) echo money_format ("%i", $precio_desglosado['articulos']); ?>
                </div>
                <div class="span6">
                    Subtotal:
                </div>
                <div class="span5 subtotal">
                    <?php if($precio_desglosado) echo money_format ("%i", $precio_desglosado['subtotal']); ?>
                </div>
                <div class="span6">
                    Tasas:
                </div>
                <div class="span5 tasas">
                    <?php if($precio_desglosado) echo money_format ("%i", $precio_desglosado['tasas'] + $precio_desglosado['iva']); ?>
                </div>
                <!--<div class="span6">
                    IVA:
                </div>
                <div class="span5 iva">
                    <?php if($precio_desglosado) echo $precio_desglosado['iva']; ?>
                </div>-->
                <div class="span6">
                    Total:
                </div>
                <div class="span5 total">
                    <?php echo money_format ("%i", $reserva->total); ?>
                </div>
                <div class="span6">
                    Se&ntilde;a:
                </div>
                <div class="span5 senia">
                    
                </div>
            </div>
            <div class="row-fluid pagos">
            <?php
            $total = $reserva->total;
            if($reserva->pagos)
            foreach ($reserva->pagos as $pago) {
            ?>
            <div class="row-fluid" pago-id="<?php echo $pago->idReservacionPago ?>">
                <div class="span6 <?php if(strcmp($pago->estado, "confirmada")!=0 || !$pago->validado) echo "red"; else { echo 'blue';} ?>">
                    <?php echo $pago->tipo ?>:
                </div>
                <div class="span6 importe <?php if(strcmp($pago->estado, "confirmada")!=0 || !$pago->validado) echo "red"; else { $total -= $pago->importe; echo 'blue';} ?>">
                    <?php echo money_format ("%i", $pago->importe) ?>
                </div>
            </div>
            <?php
            }
            ?>
            </div>
            <legend>&nbsp;</legend>
            <div class="row-fluid">                
                <div class="span6 ">
                    Total pendiente:
                </div>
                <div class="span6 totalPendiente">
                    <?php echo money_format ("%i", $total) ?>
                </div>
            </div>
        </div>
    </div>
   

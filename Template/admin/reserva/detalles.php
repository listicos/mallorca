<?php 

$reserva = $this->getAttribute('reserva'); 

if($this->getAttribute('print')) {
?>

<link rel="stylesheet" type="text/css" href="<?php echo $this->template_url; ?>/css/admin/reset.css" media="all" >
        <link rel="stylesheet" type="text/css" href="<?php echo $this->template_url; ?>/css/admin/styles.css" media="all" >

        <link href="<?php echo $this->template_url; ?>/css/admin/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo $this->template_url; ?>/css/admin/bootstrap-cerulean.css" rel="stylesheet">
        
        <script>
            window.print();
        </script>
        
<?php } ?>
<div class="row-fluid detalles_reserva_overlay">
    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped bootstrap-datatable" id="reservas_detalles_table" >
        <thead><tr><th></th></tr></thead>
        <tbody>
            <tr>
                <td style="border: 0; background: transparent;">
                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered bootstrap-datatable" id="reservas_detalles_cliente" >
                        <thead><tr><th colspan="2" style="border-radius: 0;">Detalles del cliente</th></tr></thead>
                        <tbody>
                            <tr>
                                <td style="width: 40%; background: transparent;">Nombre:</td>
                                <td style="background: transparent;"><?php echo $reserva['cliente']->nombre; ?></td>
                            </tr>
                            <tr>
                                <td style="width: 40%; background: transparent;">Apellido:</td>
                                <td style="background: transparent;"><?php echo $reserva['cliente']->apellidoPaterno; ?></td>
                            </tr>
                            <tr>
                                <td style="width: 40%; background: transparent;">Teléfono:</td>
                                <td style="background: transparent;"><?php echo $reserva['cliente']->telefono; ?></td>
                            </tr>
                            <tr>
                                <td style="width: 40%; background: transparent;">Correo electrónico:</td>
                                <td style="background: transparent;"><?php echo $reserva['cliente']->email; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="border: 0; background: transparent;">
                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered bootstrap-datatable" id="reservas_detalles_reserva" >
                        <thead><tr><th colspan="2" style="border-radius: 0;">Detalles de la reserva</th></tr></thead>
                        <tbody>
                            <tr>
                                <td style="width: 40%; background: transparent;">Nombre de la propiedad:</td>
                                <td style="background: transparent;"><?php echo $reserva['apartamento']->nombre; ?></td>
                            </tr>
                            <tr>
                                <td style="width: 40%; background: transparent;">Noches:</td>
                                <td style="background: transparent;"><?php echo $reserva['reserva']->noches; ?></td>
                            </tr>
                            <tr>
                                <td style="width: 40%; background: transparent;">Entrada - Salida:</td>
                                <td style="background: transparent;"><?php echo $reserva['reserva']->fechaEntradaFormat; ?> - <?php echo $reserva['reserva']->fechaSalidaFormat; ?></td>
                            </tr>
                            <tr>
                                <td style="width: 40%; background: transparent;">Pax:</td>
                                <td style="background: transparent;">
                                    <?php if($reserva['reserva']->adultos && $reserva['reserva']->adultos!='') echo $reserva['reserva']->adultos; else echo 0; ?> adulto(s)<br>
                                    <?php if($reserva['reserva']->ninios && $reserva['reserva']->ninios!='') echo $reserva['reserva']->ninios; else echo 0; ?> niño(s) (Hasta 12 años)<br>
                                    <?php if($reserva['reserva']->bebes && $reserva['reserva']->bebes!='') echo $reserva['reserva']->bebes; else echo 0; ?> bebe(s) (hasta 2 años)
                                </td>
                            </tr>
                        <!--<tr>
                                <td style="width: 40%; background: transparent;; background: transparent;">Forma de pago:</td>
                                <td style="background: transparent;">Efectivo</td>
                            </tr>
                            <tr>
                                <td style="width: 40%; background: #F8FF9E;">Tarjeta de crédito:</td>
                                <td style="background: #F8FF9E;">Mastercard</td>
                            </tr>
                            <tr>
                                <td style="width: 40%; background: #F8FF9E;">Nombre y apellido del titular:</td>
                                <td style="background: #F8FF9E;">Denis Orlov</td>
                            </tr>
                            <tr>
                                <td style="width: 40%; background: #F8FF9E;">Número:</td>
                                <td style="background: #F8FF9E;">510069047940****</td>
                            </tr>
                            <tr>
                                <td style="width: 40%; background: #F8FF9E;">Codigo de seguridad:</td>
                                <td style="background: #F8FF9E;">XXX</td>
                            </tr>
                            <tr>
                                <td style="width: 40%; background: #F8FF9E;">Vencimiento:</td>
                                <td style="background: #F8FF9E;">11/2014</td>
                            </tr>-->
                            <tr>
                                <td style="width: 40%; background: transparent;">Total:</td>
                                <td style="background: transparent;"><?php echo $reserva['reserva']->total; ?> &euro;</td>
                            </tr>
                            <tr>
                                <td style="width: 40%; background: #E8FFEE;"><b style="font-weight: bold;">Subtotal:</b></td>
                                <td style="background: #E8FFEE;"><b style="font-weight: bold;"><?php echo $reserva['reserva']->total; ?> &euro;</b></td>
                            </tr>
                        <!--<tr>
                                <td style="width: 40%; background: transparent;">Reserva:</td>
                                <td style="background: transparent;">0 &euro; (0%)</td>
                            </tr>
                            <tr>
                                <td style="width: 40%; background: #E8FFEE;"><b style="font-weight: bold;">Resto:</b></td>
                                <td style="background: #E8FFEE;"><b style="font-weight: bold;">590 &euro;</b></td>
                            </tr>
                            <tr>
                                <td style="width: 40%; background: #E8FFEE;"><b style="font-weight: bold;">Comisión:</b></td>
                                <td style="background: #E8FFEE;"><b style="font-weight: bold;">59 &euro; (10%)</b></td>
                            </tr>-->
                            <tr>
                                <td style="width: 40%; background: transparent;">Observaciones:</td>
                                <td style="background: transparent;"><?php echo $reserva['reserva']->observaciones; ?></td>
                            </tr>
                            <tr>
                                <td style="width: 40%; background: transparent;">Fecha de carga:</td>
                                <td style="background: transparent;">10/03/2013 03:08:05 PM</td>
                            </tr>
                            <tr>
                                <td style="width: 40%; background: transparent;">Estado:</td>
                                <td style="background: transparent;"><?php echo $reserva['reserva']->estatus; ?></td>
                            </tr>
                            <!--<tr>
                                <td style="width: 40%; background: transparent;">Estado de facturación:</td>
                                <td style="background: transparent;">-</td>
                            </tr>-->
                            <tr>
                                <td style="width: 40%; background: transparent;">Código de reserva:</td>
                                <td style="background: transparent;">65413</td>
                            </tr>
                            <!--<tr>
                                <td style="width: 40%; background: transparent;">Condiciones de pago:</td>
                                <td style="background: transparent;">2</td>
                            </tr>-->
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="border: 0; background: transparent;">
                    <table style="border-bottom: 0;" cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered bootstrap-datatable" id="reservas_detalles_importes" >
                        <thead><tr><th style="border-radius: 0;">Pagos</th></tr></thead>
                        <tbody>
                            <tr>
                                <td style="background: transparent;padding: 0; border: 0;">
                                    <table style="border-right: 0;margin-bottom: 0;" cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered bootstrap-datatable" id="reservas_detalles_importes" >
                                        <tbody>
                                            <?php  if($reserva['reserva']->pagos) foreach($reserva['reserva']->pagos as $pago) {?>
                                            <tr>
                                                <td style="width: 40%; background: transparent;; background: transparent;">Forma de pago:</td>
                                                <td style="background: transparent;"><?php echo $pago->tipo ?></td>
                                            </tr>
                                            <?php if($pago->cuenta->paypal) { ?>
                                            <tr>
                                                <td style="width: 40%; background: #F8FF9E;">Paypal:</td>
                                                <td style="background: #F8FF9E;"><?php echo $pago->cuenta->paypal ?></td>
                                            </tr>
                                            <?php } ?>
                                            <?php if($pago->cuenta->iban) { ?>
                                            <tr>
                                                <td style="width: 40%; background: #F8FF9E;">N&uacute;mero de cuenta:</td>
                                                <td style="background: #F8FF9E;"><?php echo $pago->cuenta->iban ?></td>
                                            </tr>
                                            <?php } ?>
                                            <?php if($pago->cuenta->tipoTarjeta) { ?>
                                            <tr>
                                                <td style="width: 40%; background: #F8FF9E;">Tipo de Tarjeta:</td>
                                                <td style="background: #F8FF9E;"><?php echo $pago->cuenta->tipoTarjeta ?></td>
                                            </tr>
                                            <?php } ?>
                                            <?php if($pago->cuenta->titular) { ?>
                                            <tr>
                                                <td style="width: 40%; background: #F8FF9E;">Titular:</td>
                                                <td style="background: #F8FF9E;"><?php echo $pago->cuenta->titular ?></td>
                                            </tr>
                                            <?php } ?>
                                            <?php if($pago->cuenta->numero) { ?>
                                            <tr>
                                                <td style="width: 40%; background: #F8FF9E;">N&uacute;mero:</td>
                                                <td style="background: #F8FF9E;"><?php echo $pago->cuenta->numero ?></td>
                                            </tr>
                                            <?php } ?>
                                            <?php if($pago->cuenta->cvv) { ?>
                                            <tr>
                                                <td style="width: 40%; background: #F8FF9E;">CVV:</td>
                                                <td style="background: #F8FF9E;"><?php echo $pago->cuenta->cvv ?></td>
                                            </tr>
                                            <?php } ?>
                                            <?php if($pago->cuenta->caducidadMes && $pago->cuenta->caducidadAnio) { ?>
                                            <tr>
                                                <td style="width: 40%; background: #F8FF9E;">Caducidad:</td>
                                                <td style="background: #F8FF9E;"><?php echo $pago->cuenta->caducidadMes . '/' . $pago->cuenta->caducidadAnio ?></td>
                                            </tr>
                                            <?php } ?>
                                            <tr>
                                                <td style="width: 40%; background: #F8FF9E;">Importe:</td>
                                                <td style="background: #F8FF9E;"><?php echo $pago->importe ?></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 40%; background: #F8FF9E;">N&uacute;mero de autorizaci&oacute;n:</td>
                                                <td style="background: #F8FF9E;"><?php echo $pago->autorizacion ?></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 40%; background: #F8FF9E;">Estado:</td>
                                                <td style="background: #F8FF9E;"><?php echo $pago->estado ?></td>
                                            </tr>
                                            <?php }?>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <!--<tr>
                <td style="border: 0; background: transparent;">
                    <table style="border-bottom: 0;" cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered bootstrap-datatable" id="reservas_detalles_importes" >
                        <thead><tr><th style="border-radius: 0;">Fianza</th></tr></thead>
                        <tbody>
                            <tr>
                                <td style="background: transparent;padding: 0; border: 0;">
                                    <table style="border-right: 0;margin-bottom: 0;" cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered bootstrap-datatable" id="reservas_detalles_importes" >
                                        <tbody>
                                            <?php if($reserva['reserva']->pagosFianza) foreach($reserva['reserva']->pagosFianza as $pago) {?>
                                            <tr>
                                                <td style="width: 40%; background: transparent;; background: transparent;">Forma de pago:</td>
                                                <td style="background: transparent;"><?php echo $pago->tipo ?></td>
                                            </tr>
                                            <?php if($pago->cuenta->tipoTarjeta) { ?>
                                            <tr>
                                                <td style="width: 40%; background: #F8FF9E;">Tipo de Tarjeta:</td>
                                                <td style="background: #F8FF9E;"><?php echo $pago->cuenta->tipoTarjeta ?></td>
                                            </tr>
                                            <?php } ?>
                                            <?php if($pago->cuenta->titular) { ?>
                                            <tr>
                                                <td style="width: 40%; background: #F8FF9E;">Titular:</td>
                                                <td style="background: #F8FF9E;"><?php echo $pago->cuenta->titular ?></td>
                                            </tr>
                                            <?php } ?>
                                            <?php if($pago->cuenta->numero) { ?>
                                            <tr>
                                                <td style="width: 40%; background: #F8FF9E;">N&uacute;mero:</td>
                                                <td style="background: #F8FF9E;"><?php echo $pago->cuenta->numero ?></td>
                                            </tr>
                                            <?php } ?>
                                            <?php if($pago->cuenta->cvv) { ?>
                                            <tr>
                                                <td style="width: 40%; background: #F8FF9E;">CVV:</td>
                                                <td style="background: #F8FF9E;"><?php echo $pago->cuenta->cvv ?></td>
                                            </tr>
                                            <?php } ?>
                                            <?php if($pago->cuenta->caducidadMes && $pago->cuenta->caducidadAnio) { ?>
                                            <tr>
                                                <td style="width: 40%; background: #F8FF9E;">Caducidad:</td>
                                                <td style="background: #F8FF9E;"><?php echo $pago->cuenta->caducidadMes . '/' . $pago->cuenta->caducidadAnio ?></td>
                                            </tr>
                                            <?php } ?>
                                            <tr>
                                                <td style="width: 40%; background: #F8FF9E;">Importe:</td>
                                                <td style="background: #F8FF9E;"><?php echo $pago->importe ?></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 40%; background: #F8FF9E;">N&uacute;mero de autorizaci&oacute;n:</td>
                                                <td style="background: #F8FF9E;"><?php echo $pago->autorizacion ?></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 40%; background: #F8FF9E;">Estado:</td>
                                                <td style="background: #F8FF9E;"><?php echo $pago->estado ?></td>
                                            </tr>
                                            <?php }?>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>-->
            <tr>
                <td style="border: 0; background: transparent;">
                    <table style="border-bottom: 0;" cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered bootstrap-datatable" id="reservas_detalles_importes" >
                        <thead><tr><th style="border-radius: 0;">Desglose de importes por noche</th></tr></thead>
                        <tbody>
                            <tr>
                                <td style="background: transparent;padding: 0; border: 0;">
                                    <table style="border-right: 0;margin-bottom: 0;" cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered bootstrap-datatable" id="reservas_detalles_importes" >
                                        <thead>
                                            <tr>
                                                <th style="border-radius: 0;">Noche n°</th>
                                                <th style="border-radius: 0;">Fecha</th>
                                                <th style="border-radius: 0;">Precio</th>
                                                <th style="border-radius: 0;">Precio régimen</th>
                                                <th style="border-radius: 0;">Precio habitación</th>
                                                <th style="border-radius: 0;">Habitación</th>
                                                <th style="border-radius: 0;">Cantidad</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php for($res=0;  intval($res<$reserva['reserva']->noches);$res++) {?>
                                            <tr>
                                                <td style="background: transparent;border-radius: 0;"><?php echo $res+1; ?></td>
                                                <td style="background: transparent;border-radius: 0;"><?php echo date('d/m/Y', strtotime($reserva['reserva']->fechaEntrada. '+'.$res.' days')); ?></td>
                                                <td style="background: transparent;border-radius: 0;"><b style="font-weight: bold;"><?php echo (intval($reserva['reserva']->total)/intval($reserva['reserva']->noches))?> &euro;</b></td>
                                                <td style="background: transparent;">0 &euro;</td>
                                                <td style="background: transparent;"><?php echo (intval($reserva['reserva']->total)/intval($reserva['reserva']->noches))?> &euro;</td>
                                                <td style="background: transparent;"><?php echo $reserva['apartamento']->apartamentoTipo; ?></td>
                                                <td style="background: transparent;">1</td>
                                            </tr>
                                            <?php }?>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
</div>

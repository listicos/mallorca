<?php $reservas = $this->getAttribute('reservas'); ?>
<?php foreach ($reservas as $reserva) { ?>
<tr class="gradeX">
    <td align="center"><?php echo $reserva->idReservacion; ?></td>
    <td><?php echo $reserva->idReservacion; ?></td>
    <td><?php echo($reserva->huesped->nombre." ".$reserva->huesped->apellidoPaterno); ?></td>
    <td><?php echo $reserva->total; ?></td>
    <td><?php echo date_format(new DateTime($reserva->tiempoCreacion), "d/m/Y"); ?></td>
    <td>3</td>
    <td>
        <?php if($reserva->adultos) echo $reserva->adultos; else echo 0; ?>A<br>
        <?php if($reserva->ninios) echo $reserva->ninios; else echo 0; ?>N<br>
        <?php if($reserva->bebes) echo $reserva->bebes; else echo 0; ?>B
    </td>
    <td><?php echo $reserva->fechaEntrada; ?></td>
    <td><?php echo $reserva->fechaSalida; ?></td>
    <td>Efectivo</td>
    <td><?php echo $reserva->estatus; ?></td>
    <td class="actions_row"> 
        <a title="Correo" data-rel="tooltip" href="#correo_reserva_overlay" class="openModalCorreo" reserva-id="<?php echo $reserva->idReservacion; ?>" data-toggle="modal"><i class="icon-envelope"></i></a>
        <a title="Buscar" data-rel="tooltip" href="#ver_reserva_overlay" class="verRerva" reserva-id="<?php echo $reserva->idReservacion; ?>" data-toggle="modal"><i class="icon-search"></i></a>
        <a title="<?php echo $reserva->estatus == 'Rechazado' ? 'Aprobar' : 'Rechazar'; ?>" data-rel="tooltip" class="changeStatusReserva" href="#" reserva-id="<?php echo $reserva->idReservacion; ?>"><i class="<?php echo $reserva->estatus == 'Rechazado' ? 'icon-thumbs-up' : 'icon-thumbs-down'; ?>"></i></a>
    </td>
</tr>
<?php }?>
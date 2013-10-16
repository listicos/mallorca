<?php $reservas = $this->getAttribute('reservas'); ?>
<?php foreach ($reservas as $reserva) { ?>
<tr class="gradeX <?php if(strcmp($reserva->estatus, "Pendiente") == 0) echo "orange"; if (strcmp($reserva->estatus, "Aprobado") == 0 && strcmp($reserva->fechaEntrada, date("d/m/Y")) == 0) echo "green"; ?>">
    <td align="center"><?php echo $reserva->idReservacion; ?></td>
    <td><?php echo $reserva->idReservacion; ?></td>
    <td><?php echo($reserva->huesped->nombre." ".$reserva->huesped->apellidoPaterno); ?></td>
    <td><?php echo money_format('%(#1n €', $reserva->total); ?></td>
    <td><?php echo date_format(new DateTime($reserva->tiempoCreacion), "d/m/Y"); ?></td>
    <td><?php echo $reserva->noches ?></td>
    <td>
        <?php if($reserva->adultos) echo $reserva->adultos; else echo 0; ?>A<br>
        <?php if($reserva->ninios) echo $reserva->ninios; else echo 0; ?>N<br>
        <?php if($reserva->bebes) echo $reserva->bebes; else echo 0; ?>B
    </td>
    <td><?php echo $reserva->fechaEntrada; ?></td>
    <td><?php echo $reserva->fechaSalida; ?></td>
    <td>
        <?php
            if($reserva->pagos)
            foreach ($reserva->pagos as $pago) {
                echo $pago->tipo."<br/>";
            }
        ?>
    </td>
    <td>
        <select class="estadoReserva" name="estatusReserva" reserva-id="<?php echo $reserva->idReservacion ?>">
            <option value="Pendiente" <?php if(strcmp($reserva->estatus, "Pendiente") == 0) echo "selected"; ?> >Pendiente</option>
            <option value="Aprobado" <?php if(strcmp($reserva->estatus, "Aprobado") == 0) echo "selected"; ?>>Aprobado</option>
            <option value="Rechazado" <?php if(strcmp($reserva->estatus, "Rechazado") == 0) echo "selected"; ?>>Rechazado</option>
        </select>
        
    </td>
    <td class="actions_row"> 
        <a title="Correo" data-rel="tooltip" href="#correo_reserva_overlay" class="openModalCorreo" reserva-id="<?php echo $reserva->idReservacion; ?>" data-toggle="modal"><i class="icon-envelope"></i></a>
        <a title="Ver Reserva" data-rel="tooltip" href="#ver_reserva_overlay" class="verRerva" reserva-id="<?php echo $reserva->idReservacion; ?>" data-toggle="modal"><i class="icon-search"></i></a>
        <a title="Editar" data-rel="tooltip" href="<?php echo $this->base_url.'/admin-reserva-ver/id:'.$reserva->idReservacion ?>" ><i class="icon-edit"></i></a>
        
    </td>
</tr>
<?php }?>
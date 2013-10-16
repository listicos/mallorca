<?php $mantenimientos = $this->getAttribute('mantenimientos'); ?>
<?php foreach ($mantenimientos as $mantenimiento) { ?>   
    <tr class="gradeX">
        <td align="center"><?php echo $mantenimiento->idMantenimiento; ?></td>
        <td><?php echo $mantenimiento->apartamento->nombre; ?></td>
        <td><?php echo $mantenimiento->solicitante; ?></td>
        <td>
            
            <select class="estadoMantenimiento" name="estatusMantenimiento" mantenimiento-id="<?php echo $mantenimiento->idMantenimiento ?>">
                <option value="Pendiente" <?php if(strcmp($mantenimiento->estatus, "Pendiente") == 0) echo "selected"; ?> >Pendiente</option>
                <option value="En curso" <?php if(strcmp($mantenimiento->estatus, "En curso") == 0) echo "selected"; ?>>En curso</option>
                <option value="Terminado" <?php if(strcmp($mantenimiento->estatus, "Terminado") == 0) echo "selected"; ?>>Terminado</option>
            </select>
            
        </td>
        <td><?php if($mantenimiento->fechaCierre) echo date_format($mantenimiento->fechaCierre, "d/m/Y"); ?></td>
        <td> 
            <a title="Editar" data-rel="tooltip"href="<?php echo $this->base_url?>/admin-mantenimientos-ver/id:<?php echo $mantenimiento->idMantenimiento; ?>" ><i class="icon-edit"></i></a>
            <a title="Borrar" class="borrarMantenimiento" data-toggle="modal" data-rel="tooltip" href="#borrar_mantenimiento_overlay" mantenimiento-id="<?php echo $mantenimiento->idMantenimiento; ?>" ><i class="icon-trash"></i></a>
            <a title="Imprimir" class="printMantenimiento" data-toggle="modal" data-rel="tooltip" href="#print_mantenimiento_overlay" mantenimiento-id="<?php echo $mantenimiento->idMantenimiento; ?>" ><i class="icon-print"></i></a>
            <a title="<?php echo $mantenimiento->estatus == 'Rechazado' ? 'Aprobar' : 'Rechazar'; ?>" data-rel="tooltip" class="changeStatusMtto" href="#" mtto-id="<?php echo $mantenimiento->idMantenimiento; ?>"><i class="<?php echo $mantenimiento->estatus == 'Rechazado' ? 'icon-thumbs-up' : 'icon-thumbs-down'; ?>"></i></a>
        </td>
    </tr>
<?php } ?> 
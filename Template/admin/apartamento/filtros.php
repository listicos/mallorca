<?php $apartamentos = $this->getAttribute('apartamentos'); ?>
<?php foreach ($apartamentos as $apar) { ?>   
    <tr class="gradeX">
        <td align="center"><?php echo $apar['apartamento']->idApartamento ?></td>
        <td><?php echo $apar['apartamento']->nombre; ?></td>
        <!--<td><?php echo $apar['empresa']->nombre.' '.$apar['empresa']->apellidoPaterno; ?></td>-->
        <td><?php echo $apar['direccion']->provincia . ' ' . $apar['direccion']->codigoPostal; ?></td>
        <td></td>
        <td></td>
        <td></td>
        <td><?php echo $apar['apartamento']->estatus ?></td>
        <td> 
            <a title="Reservar" class="reservar" data-toggle="modal" href="#reservar_overlay" data-rel="tooltip" apto-id="<?php echo $apar['apartamento']->idApartamento; ?>" ><i class="icon-shopping-cart"></i></a>
            <a title="Buscar" data-rel="tooltip" href="<?php echo $this->base_url ?>/admin-apartamento-gestion/id:<?php echo $apar['apartamento']->idApartamento ?>"><i class="icon-edit"></i></a>
            <a title="<?php echo $apar['apartamento']->estatus == 'inactivo' ? 'Activar' : 'Desactivar'; ?>" data-rel="tooltip" class="changeStatusApto" href="#" apartamento-id="<?php echo $apar['apartamento']->idApartamento; ?>"><i class="<?php echo $apar['apartamento']->estatus == 'inactivo' ? 'icon-thumbs-up' : 'icon-thumbs-down'; ?>"></i></a>
            <a title="Borrar" data-rel="tooltip" class="borrarApto" href="#borrar_overlay" data-toggle="modal" apartamento-id="<?php echo $apar['apartamento']->idApartamento; ?>"><i class="icon-trash"></i></a>
        </td>
    </tr>
<?php } ?>   
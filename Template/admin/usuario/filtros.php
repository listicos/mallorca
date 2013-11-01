<?php $usuarios = $this->getAttribute('usuarios'); ?>
<?php foreach ($usuarios as $cliente) { ?>   
    <tr class="gradeX">
        <td align="center"><?php echo $cliente->idUsuario ?></td>
        <td><?php echo $cliente->nombre . ' ' . $cliente->apellidoPaterno; ?></td>
        <td><?php echo $cliente->telefono; ?></td>
        <td><?php echo $cliente->email; ?></td>
        <td><?php echo $cliente->grupo->nombre; ?></td>
        <td> 
            <a title="Editar" class="editar" href="<?php echo $this->base_url; ?>/admin-usuario-ver/id:<?php echo $cliente->idUsuario; ?>" data-rel="tooltip" ><i class="icon-edit"></i></a>
            <a title="Eliminar" class="borrarUsuario" data-rel="tooltip" href="#borrar_usuario_overlay" data-toggle="modal" usuario-id="<?php echo $cliente->idUsuario; ?>" ><i class="icon-trash"></i></a>
        </td>
    </tr>
<?php } ?> 
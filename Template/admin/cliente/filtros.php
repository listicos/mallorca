<?php $clientes = $this->getAttribute('clientes'); ?>
<?php foreach ($clientes as $cliente) { ?>   
    <tr class="gradeX">
        <td align="center"><?php echo $cliente->idUsuario ?></td>
        <td><?php echo $cliente->nombre . ' ' . $cliente->apellidoPaterno; ?></td>
        <td><?php echo $cliente->telefono; ?></td>
        <td><?php echo $cliente->email; ?></td>
        <td></td>
        <td> 
            <a title="Reservas" class="verReservas" data-toggle="modal" href="#reservas_overlay" data-rel="tooltip" user-id="<?php echo $cliente->idUsuario ?>"><i class="icon-shopping-cart"></i></a>
            
        </td>
    </tr>
<?php } ?> 


<?php $canales = $this->getAttribute('canales'); ?>
<?php foreach ($canales as $canal) { ?>   
    <tr class="gradeX">
        <td align="center"><?php echo $canal->idCanal; ?></td>
        <td><?php echo $canal->nombre; ?></td>
        <td><?php echo $canal->comision; ?></td>
        <td><?php echo $canal->senia; ?></td>
        <td><?php echo $canal->diasTolerancia; ?></td>
        <td><?php if($canal->porcentajeComision)echo $canal->porcentajeComision . "%"; ?></td>
        <td> 
            <a title="Editar" data-rel="tooltip"href="<?php echo $this->base_url?>/admin-canales-ver/id:<?php echo $canal->idCanal; ?>" ><i class="icon-edit"></i></a>
            <a title="Borrar" class="borrarCanal" data-toggle="modal" data-rel="tooltip" href="#borrar_canal_overlay" canal-id="<?php echo $canal->idCanal; ?>" ><i class="icon-trash"></i></a>
            
            
        </td>
    </tr>
<?php } ?> 


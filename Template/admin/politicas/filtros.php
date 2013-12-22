<?php $politicas = $this->getAttribute('politicas'); ?>
<?php foreach ($politicas as $politica) { ?>   
    <tr class="gradeX">
        <td align="center"><?php echo $politica->idPoliticaCancelacion ?></td>
        <td><?php echo $politica->nombres->es; ?></td>
        <td> 
            <a title="Editar" data-rel="tooltip"href="<?php echo $this->base_url?>/admin-politicas-ver/id:<?php echo $politica->idPoliticaCancelacion; ?>" ><i class="icon-edit"></i></a>
            <a title="Borrar" data-rel="tooltip" class="borrarPolitica" href="#borrar_overlay" data-toggle="modal" politica-id="<?php echo $politica->idPoliticaCancelacion; ?>"><i class="icon-trash"></i></a>
            
        </td>
    </tr>
<?php } ?> 
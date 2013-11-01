<?php $complejos_q = $this->getAttribute('complejos'); ?>
<?php foreach ($complejos_q as $emp) { ?>
    <tr class="gradeX">
        <td align="center">                                    
              <?php if (isset($emp->idComplejo)){
              echo $emp->idComplejo;} ?>
        </td>
        <td><?php if (isset($emp->nombre)){echo $emp->nombre;} ?></td>
        <td> 
            <a title="Editar" data-rel="tooltip"href="<?php echo $this->base_url?>/admin-complejo-ver/id:<?php echo $emp->idComplejo ?>" ><i class="icon-edit"></i></a>
            <a title="Borrar" data-rel="tooltip" class="borrarComplejo" href="#borrar_complejo_overlay" data-toggle="modal" complejo-id="<?php echo $emp->idComplejo?>" ><i class="icon-trash"></i></a>
        </td>
    </tr>                           
<?php }?>  
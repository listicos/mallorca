<?php $opiniones_q = $this->getAttribute('opiniones'); ?>
<?php foreach ($opiniones_q as $opi) { ?>
    <tr class="gradeX">
        <td align="center">
            <?php echo $opi->idOpinion?>
        </td>
        <td><?php echo $opi->opinion ?></td>
        <td><?php echo $opi->apartamento ?></td>
        <td><?php echo $opi->fechaCreacion ?></td>
        <td style="text-align: center;"><?php echo $opi->puntuacion ?></td>
        <td style="text-align: center;"> 
            <div style="min-width:150px;">
                    <a title="Correo" data-rel="tooltip" href="#correo_opinion_overlay" class="openModalCorreoOpinion" opinion-id="<?php echo $opi->idOpinion; ?>" data-toggle="modal"><i class="icon-envelope"></i></a>
                    <a title="Reservas" data-rel="tooltip" href="#" class=""><i class=" icon-shopping-cart"></i></a>
                    <a title="Borrar" data-toggle="modal" data-rel="tooltip" opinion-id="<?php echo $opi->idOpinion; ?>" href="#borrar_overlay" class="borrarOpinion"><i class=" icon-trash"></i></a>
            </div>
            
        </td>
    </tr>
<?php } ?>
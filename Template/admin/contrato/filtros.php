<?php $contratos = $this->getAttribute('contratos'); ?>
<?php foreach ($contratos as $cont) { ?>
    <tr class="gradeX">
        <td align="center">
            <?php echo $cont->idContrato ?>
        </td>
        <td><?php echo $cont->nombre ?></td>
        <td>€ <?php echo $cont->precio ?></td>
        <td><?php echo $cont->porcentaje ?>%</td>
        <td><?php echo $cont->descripcion ?></td>
        <td> 
            <a title="Buscar" data-rel="tooltip" href="<?php echo $this->base_url ?>/admin-contrato-gestion/id:<?php echo $cont->idContrato ?>" class=""><i class="icon-search"></i></a>
        </td>
    </tr>
<?php } ?>  
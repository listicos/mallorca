<?php 
$apartamentos = $this->getAttribute('apartamentos'); 
$number_days = $this->getAttribute('number_days'); 
$current_date = $this->getAttribute('current_date'); 
?>
<table cellpadding="0" cellspacing="0" border="0" class="panel_lista_tabla table table-striped table-bordered bootstrap-datatable" id="lista_disponibilidades" >
    <thead>
        <tr>
            <th><input type="checkbox" id="check_all"></th>
            <th>Nombre</th>
            <th colspan="<?php echo $number_days?>"><?php echo $current_date ?></th>
        </tr>   
        <tr>
            <th></th>
            <th></th>
            <?php for ($i = 1;$i<=$number_days;$i++) {?>
                <th><?php echo $i?></th>
            <?php }?>
        </tr>       
    </thead>
     <tbody>
        <?php foreach ($apartamentos as $apar) { ?>   
            <tr class="gradeX">
                <td><input name="idApartamentos[]" value="<?php echo $apar['apartamento']->idApartamento?>" type="checkbox"></td>
                <td><a href="<?php echo $this->base_url;?>/admin-apartamento-gestion/id:<?php echo $apar['apartamento']->idApartamento;?>"><?php echo $apar['apartamento']->nombre; ?></a></td>
                <?php foreach ($apar['disponibilidades'] as $day => $disponibilidad) {?>
                    <td class="<?php echo $disponibilidad['estatus']?>"><?php echo $disponibilidad['precio']?></td>
                <?php }?>
            </tr>
        <?php } ?>   
    </tbody>
</table>
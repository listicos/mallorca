<?php $empresas_q = $this->getAttribute('empresas'); ?>
<?php foreach ($empresas_q as $emp) { ?>
    <tr class="gradeX">
        <td align="center">                                    
              <?php if (isset($emp->idEmpresa)){
              echo $emp->idEmpresa;} ?>
        </td>
        <td><?php if (isset($emp->nombre)){echo $emp->nombre.' '.$emp->apellidoPaterno;} ?></td>
        <td><?php if (isset($emp->nombreFiscal)){echo $emp->nombreFiscal;} ?></td>
        <td><?php if (isset($emp->email)){echo $emp->email;} ?></td>
        <td><?php if (isset($emp->cif)){echo $emp->cif;} ?></td>
        <td> 
            <a title="Apartamentos" class="verAptos" data-toggle="modal" href="#apartamentos_overlay" data-rel="tooltip" empresa-id="<?php echo $emp->idEmpresa ?>" ><i class="icon-home"></i></a>
            <a title="Reservas" class="verReservas" data-toggle="modal" href="#reservas_overlay" data-rel="tooltip" empresa-id="<?php echo $emp->idEmpresa ?>" ><i class="icon-shopping-cart"></i></a>
            <!--<a title="Gastos" data-rel="tooltip" href="#" ><i class="icon-tag"></i></a>-->
            <a title="Editar" data-rel="tooltip"href="<?php echo $this->base_url?>/admin-empresa-ver/id:<?php echo $emp->idEmpresa ?>" ><i class="icon-edit"></i></a>
            <a title="Borrar" data-rel="tooltip" class="borrarEmpresa" href="#borrar_empresa_overlay" data-toggle="modal" empresa-id="<?php echo $emp->idEmpresa?>" ><i class="icon-trash"></i></a>
        </td>
    </tr>                           
<?php }?>  
<?php $articulos = $this->getAttribute('articulos'); ?>
<?php foreach ($articulos as $articulo) { ?>   
    <tr class="gradeX">
        <td align="center"><?php echo $articulo->idArticulo ?></td>
        <td><?php echo $articulo->nombre; ?></td>
        <td><?php echo $articulo->codigo; ?></td>
        <td><?php echo $articulo->tipo; ?></td>
        <td><?php echo $articulo->precioBase; ?></td>
        <td> 
            <a title="Editar" data-rel="tooltip"href="<?php echo $this->base_url?>/admin-articulos-ver/id:<?php echo $articulo->idArticulo; ?>" ><i class="icon-edit"></i></a>
            <a title="Borrar" class="borrarArticulo" data-toggle="modal" data-rel="tooltip" href="#borrar_articulo_overlay" articulo-id="<?php echo $articulo->idArticulo; ?>" ><i class="icon-trash"></i></a>
            
        </td>
    </tr>
<?php } ?> 
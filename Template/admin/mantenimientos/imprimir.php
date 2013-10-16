<?php $mantenimiento = $this->getAttribute('mantenimiento'); ?>
<div class="row-fluid detalles_mantenimiento_overlay">
    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped bootstrap-datatable" id="mantenimiento_detalles_table" >
        <thead><tr><th></th></tr></thead>
        <tbody>
            <tr>
                <td style="border: 0; background: transparent;">
                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered bootstrap-datatable" id="reservas_detalles_cliente" >
                        <thead><tr><th colspan="2" style="border-radius: 0;">Detalles del mantenimiento</th></tr></thead>
                        <tbody>
                            <tr>
                                <td style="width: 40%; background: transparent;">Folio:</td>
                                <td style="background: transparent;"><?php echo $mantenimiento->idMantenimiento; ?></td>
                            </tr>
                            <tr>
                                <td style="width: 40%; background: transparent;">Apartamento:</td>
                                <td style="background: transparent;"><?php echo $mantenimiento->apartamento->nombre; ?></td>
                            </tr>
                            <tr>
                                <td style="width: 40%; background: transparent;">Ubicacion:</td>
                                <td style="background: transparent;"><?php echo $mantenimiento->ubicacion; ?></td>
                            </tr>
                            <tr>
                                <td style="width: 40%; background: transparent;">Solicitante:</td>
                                <td style="background: transparent;"><?php echo $mantenimiento->solicitante; ?></td>
                            </tr>
                            <tr>
                                <td style="width: 40%; background: transparent;">Trabajos Solicitados:</td>
                                <td style="background: transparent;"><?php echo $mantenimiento->trabajosSolicitados; ?></td>
                            </tr>
                            <tr>
                                <td style="width: 40%; background: transparent;">Informe Técnico:</td>
                                <td style="background: transparent;"><?php echo $mantenimiento->informeTecnico; ?></td>
                            </tr>
                            <tr>
                                <td style="width: 40%; background: transparent;">Observaciones:</td>
                                <td style="background: transparent;"><?php echo $mantenimiento->observaciones; ?></td>
                            </tr>
                            <tr>
                                <td style="width: 40%; background: transparent;">Cierre:</td>
                                <td style="background: transparent;"><?php echo date_format($mantenimiento->fechaCierre, "d/m/Y") ?></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="border: 0; background: transparent;">
                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered bootstrap-datatable" id="reservas_detalles_cliente" >
                        <thead><tr><th colspan="2" style="border-radius: 0;">Detalles de los materiales</th></tr></thead>
                        <tbody>
                            <tr>
                                <td style="width: 40%; background: transparent;"><b style="font-weight: bold;">Descripcion</b></td>
                                <td style="background: transparent;"><b style="font-weight: bold;">Cantidad</b></td>
                            </tr>
                            <?php foreach($mantenimiento->materiales as $material) {?>
                            <tr>
                                <td style="width: 40%; background: transparent;"><?php echo $material->descripcion; ?></td>
                                <td style="background: transparent;"><?php echo $material->cantidad; ?></td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="border: 0; background: transparent;">
                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered bootstrap-datatable" id="reservas_detalles_cliente" >
                        <thead><tr><th colspan="4" style="border-radius: 0;">Detalles del personal</th></tr></thead>
                        <tbody>
                            <tr>
                                <td style="width: 40%; background: transparent;"><b style="font-weight: bold;">Nombre</b></td>
                                <td style="background: transparent;"><b style="font-weight: bold;">Inicio</b></td>
                                <td style="background: transparent;"><b style="font-weight: bold;">Final</b></td>
                                <td style="background: transparent;"><b style="font-weight: bold;">Horas</b></td>
                            </tr>
                            <?php foreach($mantenimiento->personal as $personal) {?>
                            <tr>
                                <td style="width: 40%; background: transparent;"><?php echo $personal->nombre; ?></td>
                                <td style="background: transparent;"><?php echo $personal->inicio; ?></td>
                                <td style="background: transparent;"><?php echo $personal->final; ?></td>
                                <td style="background: transparent;"><?php echo $personal->horas; ?></td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
</div>
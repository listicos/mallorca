<?php
$empresaId = $this->getAttribute('empresaId');
$usuarioId = $this->getAttribute('usuarioId');
$apartamentos = $this->getAttribute('apartamentos');
?>

<link href='<?php echo $this->template_url; ?>/ckeditor/skins/moono/dialog.css' rel='stylesheet'>  
<link href='<?php echo $this->template_url; ?>/ckeditor/skins/moono/dialog_ie.css' rel='stylesheet'>  
<link href='<?php echo $this->template_url; ?>/ckeditor/skins/moono/editor.css' rel='stylesheet'>  
<link href='<?php echo $this->template_url; ?>/ckeditor/skins/moono/editor_ie.css' rel='stylesheet'>  
<link href='<?php echo $this->template_url; ?>/ckeditor/contents.css' rel='stylesheet'>  
<link href='<?php echo $this->template_url; ?>/ckeditor/ckeditor.css' rel='stylesheet'>  

<div class="span11 sidebar-nav-content-custom">
    <div class="contenedor_lista">
        <h1>Check-in</h1>
        <div class="hotel_container_data">
            <div class="column_custom">
                 
                <div class="listado_boostrap">
                    <table cellpadding="0" cellspacing="0" border="0" class="panel_lista_tabla table table-striped table-bordered bootstrap-datatable" id="checkIn_table_list" >
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Código</th>
                                <th>Huésped</th>
                                <th>Total</th>
                                <th>Fecha</th>
                                <th>Noches</th>
                                <th>PAX</th>
                                <th>Check-in</th>
                                <th>Check-out</th>
                                <th>Forma Pago</th>
                                <th>Estado</th>
                                <th style="width: 10%;">Acciones</th>
                            </tr>      
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <div class="contenedor_lista">

        <div class="hotel_container_data">
            <div class="column_custom">
                <h1>Check-out</h1>
                <div class="listado_boostrap">
                    <table cellpadding="0" cellspacing="0" border="0" class="panel_lista_tabla table table-striped table-bordered bootstrap-datatable" id="checkOut_table_list" >
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Código</th>
                                <th>Huésped</th>
                                <th>Total</th>
                                <th>Fecha</th>
                                <th>Noches</th>
                                <th>PAX</th>
                                <th>Check-in</th>
                                <th>Check-out</th>
                                <th>Forma Pago</th>
                                <th>Estado</th>
                                <th style="width: 10%;">Acciones</th>
                            </tr>      
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <div class="contenedor_lista">

        <div class="hotel_container_data">
            <div class="column_custom">
                <h1>Reservas Recientes</h1>
                <div class="listado_boostrap">
                    <table cellpadding="0" cellspacing="0" border="0" class="panel_lista_tabla table table-striped table-bordered bootstrap-datatable" id="reservasRecientes_table_list" >
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Código</th>
                                <th>Huésped</th>
                                <th>Total</th>
                                <th>Fecha</th>
                                <th>Noches</th>
                                <th>PAX</th>
                                <th>Check-in</th>
                                <th>Check-out</th>
                                <th>Forma Pago</th>
                                <th>Estado</th>
                                <th style="width: 10%;">Acciones</th>
                            </tr>      
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="ver_reserva_overlay" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Ver Datos de la Reserva</h3>
    </div>
    <div class="modal-body">
        
    </div>
    <div class="modal-footer">
        <input type="hidden" name="action" value="" />
        <a class="btn btn-primary imprimir_reserva_btn" href="#"><i class="icon-white icon-print"></i> Imprimir</a>
        <a type="submit" class="btn btn-primary modificar_reserva_btn">Modificar reserva</a>
        <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Cerrar</button>
    </div>
</div>

<div id="correo_reserva_overlay" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form id="correo_reserva_form">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Enviar un correo electrónico al cliente</h3>
        </div>
        <div class="modal-body">

        </div>
        <div class="modal-footer">
            <input type="hidden" name="action" value="sendEmailFromOverlay" />
            <!-- <a class="btn btn-primary" href="#"><i class="icon-white icon-print"></i> Imprimir</a> -->
            <button type="submit" class="btn btn-primary sendEmail"><i class="icon-white icon-envelope"></i> Enviar correo</button>
            <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Cerrar</button>
        </div>
    </form>
</div>

<script src="<?php echo $this->template_url; ?>/ckeditor/ckeditor.js"></script>
<script src="<?php echo $this->template_url; ?>/ckeditor/config.js"></script>
<script src="<?php echo $this->template_url; ?>/ckeditor/lang/es.js"></script>
<script src="<?php echo $this->template_url; ?>/ckeditor/styles.js"></script>

<script src="<?php echo $this->template_url; ?>/ckeditor/plugins/a11yhelp/dialogs/a11yhelp.js"></script>
<script src="<?php echo $this->template_url; ?>/ckeditor/plugins/about/dialogs/about.js"></script>
<script src="<?php echo $this->template_url; ?>/ckeditor/plugins/clipboard/dialogs/paste.js"></script>
<script src="<?php echo $this->template_url; ?>/ckeditor/plugins/dialog/dialogDefinition.js"></script>
<script src="<?php echo $this->template_url; ?>/ckeditor/plugins/image/dialogs/image.js"></script>

<script src="<?php echo $this->template_url; ?>/ckeditor/plugins/link/dialogs/link.js"></script>
<script src="<?php echo $this->template_url; ?>/ckeditor/plugins/dialogs/anchor.js"></script>

<script src="<?php echo $this->template_url; ?>/ckeditor/plugins/pastefromword/filter/default.js"></script>
<script src="<?php echo $this->template_url; ?>/ckeditor/plugins/scayt/dialogs/options.js"></script>
<script src="<?php echo $this->template_url; ?>/ckeditor/plugins/specialchar/dialogs/specialchar.js"></script>
<script src="<?php echo $this->template_url; ?>/ckeditor/plugins/table/dialogs/table.js"></script>
<script src="<?php echo $this->template_url; ?>/ckeditor/plugins/tabletools/dialogs/tableCell.js"></script>
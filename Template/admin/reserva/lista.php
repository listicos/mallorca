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

        <div class="hotel_container_data">
            <div class="column_custom">
                <div class="row-fluid">
                    <a class="btn btn-primary add_button" href="<?php echo $this->base_url ?>/admin-reserva-ver"><i class="icon icon-white icon-edit"></i> Agregar</a>
                    <form class="searchListForm" id="reservasListForm">
                        <?php if ($empresaId) { ?>
                            <input type="hidden" name="empresaId" id="empresa_filtro_id" value="<?php echo $empresaId ?>">
                        <?php }else{ ?>
                            <input type="hidden" name="empresaId" id="empresa_filtro_id" value="0">
                        <?php ?>
                        <?php if ($usuarioId) { ?>
                            <input type="hidden" name="usuarioId" value="<?php echo $usuarioId ?>">
                        <?php }} ?>
                        <div class="order_by_container">
                            <input id="limitSearch" type="hidden" name="limit" value="20" />
                            <input type="hidden" name="action" value="searchByArgs" />
                            <button type="submit" class="btn btn-warning add_button" id="initFiltro" name=""><i class="icon icon-white icon-search"></i> Buscar</button>
                            <input type="search" class="filter_search" id="filtro_reservas" name="query" title="Filtro" data-rel="tooltip" placeholder="Buscar por palabras clave..."/>
                            
                            <select class="selectpicker span2 apartamentos_ordena" id="ordena_apartamentos" name="idApartamento" data-style="btn-warning"  title="Ordenar" data-rel="tooltip">
                                <option value="0">Todos los apartamentos</option>
                                <?php foreach($apartamentos as $prop){ ?>
                                    <option value="<?php echo $prop->idApartamento; ?>" <?php if($empresaId && $prop->idApartamento == $empresaId) {?> selected="selected" <?php }?>><?php echo $prop->nombre; ?></option>
                                <?php }?>
                            </select>

                            <select class="selectpicker span2 tipo_ordena" id="ordena_tipo" name="type" data-style="btn-warning"  title="Ordenar" data-rel="tooltip">
                                <option value="ASC">Ascendente</option>
                                <option value="DESC">Descendente</option>
                            </select>

                            <select class="selectpicker span2" id="ordena_reservas" name="filter" data-style="btn-warning"  title="Ordenar" data-rel="tooltip">
                                <option value="id_reservacion">Id</option>
                                <option value="id_huesped">Huesped</option>
                                <option value="a.nombre">Apartamento</option>
                                <option value="fecha_entrada" selected="">Fecha de entrada</option>
                                <option value="fecha_salida">Fecha de salida</option> 
                                <option value="autorizacion">Estado</option>
                            </select>
                            <span class="ordenaPor">Ordenar por:</span>
                        </div>

                        <div class="check_in_out_container">

                            <div class="box box_templete">
                                <div class="box-header well">
                                    <h2><i class="icon-calendar"></i> Salida</h2>              
                                </div>
                                <div class="box-content box-date">
                                    <div class="box-left">
                                        <label>Desde:</label>
                                        <div class="input-prepend span12 box-date-left" title="Fecha inicial" data-rel="tooltip">
                                            <div id="" class="input-append span12 date datepicker date-end-from" data-date-format="dd-mm-yyyy">
                                                <input  class="span10" size="16" name="dateEndFrom" id="dateEndFrom" type="text" readonly><span class="add-on"><i class="icon-th"></i></span>
                                            </div>
                                        </div> 
                                    </div>
                                    <div class="box-right">
                                        <label>Hasta:</label>
                                        <div class="input-prepend span12 box-date-right" title="Fecha inicial" data-rel="tooltip">
                                            <div id="" class="input-append span12 date datepicker date-end-to" data-date-format="dd-mm-yyyy">
                                                <input  class="span10" size="16" name="dateEndTo" type="text" readonly><span class="add-on"><i class="icon-th"></i></span>
                                            </div>
                                        </div> 
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>

                            <div class="box box_templete">
                                <div class="box-header well">
                                    <h2><i class="icon-calendar"></i> Entrada</h2>              
                                </div>
                                <div class="box-content box-date">
                                    <div class="box-left">
                                        <label>Desde:</label>
                                        <div class="input-prepend span12" title="Fecha inicial" data-rel="tooltip">
                                            <div id="" class="input-append span12 date datepicker date-start-from" data-date-format="dd-mm-yyyy">
                                                <input  class="span10" size="16" name="dateStartFrom" id="dateStartFrom" type="text" readonly><span class="add-on"><i class="icon-th"></i></span>
                                            </div>
                                        </div> 
                                    </div>
                                    <div class="box-right">
                                        <label>Hasta:</label>
                                        <div class="input-prepend span12" title="Fecha inicial" data-rel="tooltip">
                                            <div id="" class="input-append span12 date datepicker date-start-to" data-date-format="dd-mm-yyyy">
                                                <input  class="span10" size="16" name="dateStartTo" type="text" readonly><span class="add-on"><i class="icon-th"></i></span>
                                            </div>
                                        </div> 
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>

                        </div>
                    </form>
                </div> 
                <div class="listado_boostrap">
                    <table cellpadding="0" cellspacing="0" border="0" class="panel_lista_tabla table table-striped table-bordered bootstrap-datatable" id="reservas_table_list" >
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Código</th>
                                <th>Huésped</th>
                                <th>Apartamento</th>
                                <th>Total</th>
                                <th>Fecha</th>
                                <th>Noches</th>
                                <th>PAX</th>
                                <th>Entrada</th>
                                <th>Salida</th>
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

<div class="span11 sidebar-nav-content-custom">
    <?php $opiniones_q = $this->getAttribute('opiniones_query'); ?>
    <?php $opiniones_apart = $this->getAttribute('opiniones_apartamento'); ?>  
    <div class="contenedor_lista">

        <div class="hotel_container_data">
            <div class="column_custom">
                <div class="row-fluid">
                    <a class="btn btn-primary add_button" href="<?php echo $this->base_url ?>/admin-opinion-ver"><i class="icon icon-white icon-edit"></i> Agregar</a>
                    <form class="searchListForm" id="opinionesListForm">
                        <input id="limitSearch" type="hidden" name="limit" value="20" />
                        <input type="hidden" name="action" value="searchByArgs" />
                        <button type="submit" class="btn btn-warning add_button" id="initFiltro" name=""><i class="icon icon-white icon-search"></i> Buscar</button>
                        <input type="search" class="filter_search" id="filtro_opiniones" name="query" title="Filtro" data-rel="tooltip" placeholder="Buscar por palabras clave..."/>
                        <select class="selectpicker span2 tipo_ordena" id="ordena_tipo" name="type" data-style="btn-warning"  title="Ordenar" data-rel="tooltip">
                            <option value="ASC">Ascendente</option>
                            <option value="DESC">Descendente</option>
                        </select>
                        <select class="selectpicker span2" id="ordena_opiniones" name="filter" data-style="btn-warning"  title="Ordenar" data-rel="tooltip">
                            <option value="id_opinion" selected>Id</option>
                            <option value="id_apartamento">Apartamento</option>
                            <option value="fecha_creacion">Fecha</option>
                            <option value="puntuacion">Puntuacion</option>
                        </select>
                        <span class="ordenaPor">Ordenar por:</span>
                    </form>
                </div> 
                <div class="listado_boostrap">
                    <table cellpadding="0" cellspacing="0" border="0" class="panel_lista_tabla table table-striped table-bordered bootstrap-datatable" id="opiniones_table_list" >
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th style="width: 30%;">Opinion</th>
                                <th>Apartamento</th>
                                <th style="width: 10%;">Fecha</th>
                                <th style="width: 10%;">Puntuación</th>
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

<div id="borrar_overlay" class="modal hide fade" 
     tabindex="-1" role="dialog" aria-labelledby="myModalLabel" 
     aria-hidden="true" >
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Eliminar</h3>
    </div>
    <div class="modal-body">
        <input type="hidden" id="opinionId" name="opinionId">
        Está seguro que desea borrar la opinión?
    </div>
    <div class="modal-footer">
        <button id="btn_eliminar_opinion" class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Aceptar</button>
        <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Cancelar</button>
    </div>
</div>

<div id="correo_opinion_overlay" class="modal hide fade" tabindex="-1" style="width: 600px;"
     role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form id="correo_opinion_form">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Enviar un correo electrónico al cliente</h3>
        </div>
        <div class="modal-body">

        </div>
        <div class="modal-footer">
            <input type="hidden" name="action" value="sendEmailOpinion" />
            <!-- <a class="btn btn-primary" href="#"><i class="icon-white icon-print"></i> Imprimir</a> -->
            <button type="submit" class="btn btn-primary sendEmail" ><i class="icon-white icon-envelope"></i> Enviar correo</button>
            <button class="btn btn-primary" id="cerrarCorreoOpinion" data-dismiss="modal" aria-hidden="true">Cerrar</button>
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


<div class="span11 sidebar-nav-content-custom">

    <div class="contenedor_lista">
        <div class="hotel_container_data">
            <div class="column_custom">
                <div class="row-fluid">
                    <a class="btn btn-primary add_button" href="<?php echo $this->base_url ?>/admin-mantenimientos-ver">Agregar</a>
                    <form class="searchListForm" id="mantenimientosListForm">
                        <input id="limitSearch" type="hidden" name="limit" value="20" />
                        <input type="hidden" name="action" value="searchByArgs" />
                        <button type="submit" class="btn btn-warning add_button" id="initFiltro" name=""><i class="icon icon-white icon-search"></i> Buscar</button>
                        <input type="search" class="filter_search" id="filtro_mantenimientos" name="query" title="Filtro" data-rel="tooltip" placeholder="Buscar por palabras clave..."/>
                        <select class="selectpicker span2 tipo_ordena" id="ordena_tipo_mantenimiento" name="type" data-style="btn-warning"  title="Ordenar" data-rel="tooltip">
                            <option value="ASC">Ascendente</option>
                            <option value="DESC">Descendente</option>
                        </select>
                        <select class="selectpicker span2" id="ordena_mantenimientos" name="filter" data-style="btn-warning"  title="Ordenar" data-rel="tooltip">
                            <option value="m.id_mantenimiento" selected>Id</option>
                            <option value="a.nombre">Apartamento</option>
                            <option value="m.solicitante">Solicitante</option>
                            <option value="m.estatus">Estatus</option>
                            <option value="m.fecha_cierre">Fecha de cierre</option>
                        </select>
                        <span class="ordenaPor">Ordenar por:</span>
                    </form>
                </div> 
                <div class="listado_boostrap">
                    <table cellpadding="0" cellspacing="0" border="0" class="panel_lista_tabla table table-striped table-bordered bootstrap-datatable" id="mantenimientos_table_list" >
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Apartamento</th>
                                <th>Solicitante</th>
                                <th>Estatus</th>
                                <th>Fecha de cierre</th>                            
                                <th>Acciones</th>
                            </tr>      
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div id="borrar_mantenimiento_overlay" class="modal hide fade" 
         tabindex="-1" role="dialog" aria-labelledby="myModalLabel" 
         aria-hidden="true" >
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Eliminar</h3>
        </div>
        <div class="modal-body">
            <input type="hidden" class="mantenimientoId" name="mantenimientoId">
            Está seguro que desea borrar el mantenimiento?
        </div>
        <div class="modal-footer">
            <button id="btn_eliminar_mantenimiento" class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Aceptar</button>
            <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Cancelar</button>
        </div>
    </div>
    <div id="print_mantenimiento_overlay" class="modal hide fade" 
         tabindex="-1" role="dialog" aria-labelledby="myModalLabel" 
         aria-hidden="true" >
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Ver datos del mantenimiento</h3>
        </div>
        <div class="modal-body">
            
            
        </div>
        <div class="modal-footer">
            <input type="hidden" class="mantenimientoId" name="mantenimientoId">
            <a class="btn btn-primary" href="#"><i class="icon-white icon-print"></i> Imprimir</a>
            <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Cancelar</button>
        </div>
    </div>

<div class="span11 sidebar-nav-content-custom">

    <div class="contenedor_lista">
        <div class="hotel_container_data">
            <div class="column_custom">
                <div class="row-fluid">
                    <a class="btn btn-primary add_button" href="<?php echo $this->base_url ?>/admin-articulos-ver">Agregar</a>
                    <form class="searchListForm" id="empresasListForm">
                        <input id="limitSearch" type="hidden" name="limit" value="20" />
                        <input type="hidden" name="action" value="searchByArgs" />
                        <button type="submit" class="btn btn-warning add_button" id="initFiltro" name=""><i class="icon icon-white icon-search"></i> Buscar</button>
                        <input type="search" class="filter_search" id="filtro_empresas" name="query" title="Filtro" data-rel="tooltip" placeholder="Buscar por palabras clave..."/>
                        <select class="selectpicker span2 tipo_ordena" id="ordena_tipo" name="type" data-style="btn-warning"  title="Ordenar" data-rel="tooltip">
                            <option value="ASC">Ascendente</option>
                            <option value="DESC">Descendente</option>
                        </select>
                        <select class="selectpicker span2" id="ordena_empresas" name="filter" data-style="btn-warning"  title="Ordenar" data-rel="tooltip">
                            <option value="a.id_articulo" selected>Id</option>
                            <option value="a.nombre">Nombre</option>
                            <option value="a.codigo">C&oacute;digo</option>
                            <option value="t.nombre">Tipo</option>
                            <option value="a.precio_base">Precio base</option>
                        </select>
                        <span class="ordenaPor">Ordenar por:</span>
                    </form>
                </div> 
                <div class="listado_boostrap">
                    <table cellpadding="0" cellspacing="0" border="0" class="panel_lista_tabla table table-striped table-bordered bootstrap-datatable" id="empresas_table_list" >
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>C&oacute;digo</th>
                                <th>Tipo</th>
                                <th>Precio base</th>                            
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
    
    <div id="borrar_articulo_overlay" class="modal hide fade" 
     tabindex="-1" role="dialog" aria-labelledby="myModalLabel" 
     aria-hidden="true" >
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Eliminar</h3>
    </div>
    <div class="modal-body">
        <input type="hidden" id="articuloId" name="articuloId">
        Está seguro que desea borrar el artículo?
    </div>
    <div class="modal-footer">
        <button id="btn_eliminar_articulo" class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Aceptar</button>
        <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Cancelar</button>
    </div>
</div>

<div class="span11 sidebar-nav-content-custom">
    <?php $contratos = $this->getAttribute('contratos'); ?>
    <div class="contenedor_lista">
        <div class="hotel_container_data">
            <div class="column_custom">
                <div class="row-fluid">
                    <a class="btn btn-primary add_button" href="<?php echo $this->base_url ?>/admin-contrato-gestion">Agregar</a>
                    <form class="searchListForm" id="contratosListForm">
                        <input id="limitSearch" type="hidden" name="limit" value="20" />
                        <input type="hidden" name="action" value="searchByArgs" />
                        <button type="submit" class="btn btn-warning add_button" id="initFiltro" name=""><i class="icon icon-white icon-search"></i> Buscar</button>
                        <input type="search" class="filter_search" id="filtro_contratos" name="query" title="Filtro" data-rel="tooltip" placeholder="Buscar por palabras clave..."/>
                        <select class="selectpicker span2 tipo_ordena" id="ordena_tipo" name="type" data-style="btn-warning"  title="Ordenar" data-rel="tooltip">
                            <option value="ASC">Ascendente</option>
                            <option value="DESC">Descendente</option>
                        </select>
                        <select class="selectpicker span2" id="ordena_contratos" name="filter" data-style="btn-warning"  title="Ordenar" data-rel="tooltip">
                            <option value="id_contrato" selected>Id</option>
                            <option value="nombre">nombre</option>
                            <option value="fecha_creacion">Fecha</option>
                            <option value="ultima_modificacion">Modificación</option>
                            <option value="precio">Precio</option>
                            <option value="porcentaje">Porcentaje</option>
                            <option value="descripcion">Descripcion</option>
                        </select>
                        <span class="ordenaPor">Ordenar por:</span>
                    </form>
                </div> 
                <div class="listado_boostrap">
                    <table cellpadding="0" cellspacing="0" border="0" class="panel_lista_tabla table table-striped table-bordered bootstrap-datatable" id="contratos_table_list" >
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>Comisión</th>
                                <th>Descripción</th>
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
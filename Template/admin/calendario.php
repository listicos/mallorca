<?php
$empresaId = $this->getAttribute('empresaId');
$month = date('n');
?>
<div class="sidebar-nav-content-custom">
    <div class="contenedor_lista">
        <div class="hotel_container_data">
            <div class="column_custom">
                 <div class="row-fluid">
                    <form class="searchListForm" id="apartamentosListForm">
                        <?php if ($empresaId) { ?>
                        <input type="hidden" name="empresaId" value="<?php echo $empresaId ?>">
                        <?php } ?>
                        <input id="limitSearch" type="hidden" name="limit" value="20" />
                        <input type="hidden" name="action" value="searchByArgs" />
                        <button type="submit" class="btn btn-primary add_button" id="initFiltro" name=""><i class="icon icon-white icon-search"></i> Buscar</button>
                        <input type="search" class="filter_search" id="filtro_apartamentos" name="query" title="Filtro" data-rel="tooltip" placeholder="Buscar por palabras clave..."/>
                        <select class="selectpicker span2 tipo_ordena" id="ordena_tipo" name="type" data-style="btn-warning"  title="Ordenar" data-rel="tooltip">
                            <option value="ASC">Ascendente</option>
                            <option value="DESC">Descendente</option>
                        </select>
                        <select class="selectpicker span2" id="ordena_apartamentos" name="filter" data-style="btn-warning"  title="Ordenar" data-rel="tooltip">
                            <option value="id_apartamento" selected>ID</option>
                            <option value="nombre">Titulo</option>
                        </select>
                        <span class="ordenaPor">Ordenar por:</span>
                        <select class="selectpicker span2" id="ordena_apartamentos" name="year" data-style="btn-warning"  title="Ordenar" data-rel="tooltip">
                        <?php for($i=date("Y"); $i<=date("Y")+5; $i++)
                            if($year == $i)
                            echo "<option value='$i' selected>$i</option>";
                            else
                            echo "<option value='$i'>$i</option>";
                        ?>
                        </select>
                        <select class="selectpicker span2" id="ordena_apartamentos" name="month" data-style="btn-warning"  title="Ordenar" data-rel="tooltip">
                            <option value="1" <?php if($month==1) echo "selected";?>>Enero</option>
                            <option value="2" <?php if($month==2) echo "selected";?>>Febrero</option>
                            <option value="3" <?php if($month==3) echo "selected";?>>Marzo</option>
                            <option value="4" <?php if($month==4) echo "selected";?>>Abril</option>
                            <option value="5" <?php if($month==5) echo "selected";?>>Mayo</option>
                            <option value="6" <?php if($month==6) echo "selected";?>>Junio</option>
                            <option value="7" <?php if($month==7) echo "selected";?>>Julio</option>
                            <option value="8" <?php if($month==8) echo "selected";?>>Agosto</option>
                            <option value="9" <?php if($month==9) echo "selected";?>>Septiembre</option>
                            <option value="10" <?php if($month==10) echo "selected";?>>Octubre</option>
                            <option value="11" <?php if($month==11) echo "selected";?>>Noviembre</option>
                            <option value="12" <?php if($month==12) echo "selected";?>>Diciembre</option>
                        </select>
                        
                    </form>
                    <div class="span2">
                        <a href="#disponibilidad_overlay" id="event_add" class="btn btn-primary" data-toggle="modal">Agregar/Editar tarifa</a>
                    </div>
                </div> 
                <div class="listado_boostrap">
                    <form id="listado_calendario">
                        <div class="contenedor-calendario">

                        </div>  
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<div id="disponibilidad_overlay" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form id="tarifas_modal_form">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Disponibilidades</h3>
        </div>
        <div class="modal-body">
            <div class="row-fluid">
                <div class="span6">
                    <div class="control-group">
                        <div class="input-prepend center span9" title="Fecha inicio" data-rel="tooltip">
                            <label>Fecha Inicial</label>
                            <div id="date-start" class="input-append span12 date datepicker" data-date-format="dd-mm-yyyy">
                                <input  class="span10 validate[required]" size="16" name="fechaInicio" type="text" readonly><span class="add-on"><i class="icon-th"></i></span>
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="span6">
                    <div class="control-group">
                        <div class="input-prepend center span9" title="Fecha final" data-rel="tooltip">
                            <label>Fecha Final</label>
                            <div id="date-end" class="input-append span12 date datepicker" data-date-format="dd-mm-yyyy">
                                <input  class="span10 validate[required]" size="16" name="fechaFinal" type="text" readonly><span class="add-on"><i class="icon-th"></i></span>
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="span12">
                    <div class="control-group">
                        <div class="input-prepend center span12" title="Disponibilidad" data-rel="tooltip">
                            <label>Estatus</label>
                            <span class="add-on"><i class="icon-check"></i></span>
                            <select class="span8 validate[required]" name="estatus">
                                <option value="" disabled>Disponibilidad</option>
                                    <option value="disponible">Disponible</option>
                                    <option value="no disponible">No Disponible</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span6">
                    <div class="control-group">
                        <div class="input-prepend  center span12" title="Precio por noche" data-rel="tooltip">
                            <label>Precio por noche</label>
                            <span class="add-on"><i class="icon-briefcase"></i></span>
                            <input class="input-large span8 validate[required, custom[number]] disponible" name="precio" type="text" placeholder="Precio por noche" data-prompt-position="topLeft:2%"/>
                        </div>
                    </div>
                </div>
                <div class="span6">
                    <div class="control-group">
                        <div class="input-prepend  center span12" title="Descuento" data-rel="tooltip">
                            <label>Descuento</label>
                            <span class="add-on"><i class="icon-briefcase"></i></span>
                            <input class="input-large span8 validate[custom[number]] disponible" name="descuento" type="text" placeholder="Descuento" data-prompt-position="topLeft:2%"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span6">
                    <div class="control-group">
                        <div class="input-prepend  center span12" title="Precio Final" data-rel="tooltip">
                            <label>Precio Final</label>
                            <span class="add-on"><i class="icon-briefcase"></i></span>
                            <input class="input-large span8 disponible" name="precioFinal" readOnly type="text" placeholder="Precio Final" data-prompt-position="topLeft:2%"/>
                        </div>
                    </div>
                </div>
                <div class="span6">
                    <div class="control-group">
                        <div class="input-prepend  center span12" title="M&iacute;nimo de noches" data-rel="tooltip">
                            <label>M&iacute;nimo de noches</label>
                            <span class="add-on"><i class="icon-briefcase"></i></span>
                            <select class="span8 validate[required] disponible" name="minimoNoches">
                                <?php for($i=0;$i<=30;$i++){ ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php } ?>    
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span6">
                    <div class="control-group">
                        <div class="input-prepend  center span12" title="Precio por consumo" data-rel="tooltip">
                            <label>Precio por consumo</label>
                            <span class="add-on"><i class="icon-briefcase"></i></span>
                            <input class="input-large span8 validate[custom[number]] disponible" name="precioPorConsumo" type="text" placeholder="Precio por consumo" data-prompt-position="topLeft:2%"/>
                        </div>
                    </div>
                </div>
                <div class="span6">
                    <div class="control-group">
                        <div class="input-prepend  center span12" title="Descuento por consumo" data-rel="tooltip">
                            <label>Descuento por consumo</label>
                            <span class="add-on"><i class="icon-briefcase"></i></span>
                            <input class="input-large span8 validate[custom[number]] disponible" name="descuentoPorConsumo" type="text" placeholder="Descuento por consumo" data-prompt-position="topLeft:2%"/>
                        </div>
                    </div>
                </div>
                <!--
                <div class="span12">
                    <div class="control-group">
                        <div class="input-prepend  center span12" title="Cup&oacute;n promocional" data-rel="tooltip">
                            <span class="add-on"><i class="icon-briefcase"></i></span>
                            <input class="input-large span6 disponible" name="cuponPromocional" type="text" placeholder="Cup&oacute;n promocional" data-prompt-position="topLeft:2%"/>
                            <a id="generar-cupon-btn" class="btn btn-primary" href="javascript:void(0)">Generar</a>
                        </div>
                    </div>
                </div>
                <div class="span12">
                    <div class="control-group">
                        <div class="input-prepend  center span12" title="Descuento por cup&oacute;n" data-rel="tooltip">
                            <span class="add-on"><i class="icon-briefcase"></i></span>
                            <input class="input-large span6 validate[custom[number]] disponible" name="descuentoPorCupon" type="text" placeholder="Descuento por cup&oacute;n" data-prompt-position="topLeft:2%"/>
                        </div>
                    </div>
                </div>-->
            </div>
        </div>
        <div class="modal-footer">
            <input type="hidden" name="idApartamento" value="<?php echo $apartamento['apartamento']->idApartamento; ?>"/>
            <input type="hidden" name="action" value="agregar_tarifas" />
            <input type="submit" class="btn btn-primary" value="Guardar">
            <button class="btn btn-warning" data-dismiss="modal" aria-hidden="true">Cerrar</button>
        </div>
    </form>
</div>

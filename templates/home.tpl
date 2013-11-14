{extends file="index.tpl"}

{block name="script" append}
    <script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>
    <script src="{$template_url_s}/js/home.js"></script>
    <script src="{$template_url_s}/js/jquery.mixitup.min.js"></script>
    <script src="{$template_url}/js/admin/calendar/app.js"></script>
    <script src="{$template_url}/js/admin/calendar/breakpoints.js"></script>
    <script src="{$template_url}/js/admin/calendar/calendar.js"></script>
    <script src="{$template_url}/js/admin/fullcalendar.min.js"></script>
    <script>
        var minPrice = {$minPrice};
        var maxPrice = {$maxPrice};
        var disponibles = {$disponibles};
    </script>
    <!--<script type="text/javascript" src="{$template_url_s}/js/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
    <script type="text/javascript" src="{$template_url_s}/js/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
    <script type="text/javascript" src="{$template_url_s}/js/fancybox/jquery.easing.1.2.js"></script>
    <script type="text/javascript" src="{$template_url_s}/js/fancybox/slider.js"></script> -->
{/block}

{block name="style" append}
<link href="{$template_url_s}/css/home.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{$template_url_s}/css/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
<link type="text/css" href="{$template_url_s}/css/fancybox/fancymoves.css" media="screen" charset="utf-8" rel="stylesheet"  />
<link href="{$template_url}/css/admin/fullcalendar.css" rel="stylesheet">
{/block}

{block name="content" append}
    <div class="container-liquid  content body-content home">
        <div class="row">
            <div class="col-sm-5">
                <div class="row form-horizontal filters-content" role="form">
                <div class="filtros-title">Tus Filtros</div>
                <form id="filtrosFrm">
                   <div class="search-slider-content">
                        <div class="form-inline" role="form">
                            <div class="form-group">
                                <label class="">Viaje</label>
                            </div>
                            <div class="form-group for_input">
                                <label class="sr-only" for="llegada">Llegada</label>
                                <input type="text" class="form-control date-start" id="llegada" name="dateStart" placeholder="Llegada">
                            </div>
                            <div class="form-group arrow_in_search"><img src="{$template_url_s}/img/icon-arrowR.png" alt="Photo 4"></div>
                            <div class="form-group for_input">
                                <label class="sr-only" for="llegada">Salida</label>
                                <input type="text" class="form-control date-end" id="llegada" name="dateEnd" placeholder="Salida">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="huesped">Llegada</label>
                                <select class="form-control" name="huespedes">
                                    <option value="1">1 Huésped</option>
                                    <option value="2">2 Huéspedes</option>
                                    <option value="3">3 Huéspedes</option>
                                    <option value="4">4 Huéspedes</option>
                                    <option value="5">5 Huéspedes</option>
                                    <option value="6">6 Huéspedes</option>
                                    <option value="7">7 Huéspedes</option>
                                    <option value="8">8 Huéspedes</option>
                                    <option value="9">9 Huéspedes</option>
                                    <option value="10">10 Huéspedes</option>
                                    <option value="11">11 Huéspedes</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 form-group">
                        <label class="control-label col-sm-4">Tipo de habitación</label>
                        <div class="col-sm-8">
                            <div class="btn-group separate-group" data-toggle="buttons">
                                <label class="btn btn-default">
                                    <input type="checkbox" name="alojamientos[]" id="option1" value="1">
                                  <div class="text-center">
                                      <img src="{$template_url_s}/img/icon-villas.png" alt="">
                                      <span>Villas</span>
                                  </div>
                                </label>
                                <label class="btn btn-default">
                                    <input type="checkbox" name="alojamientos[]" id="option2" value="2">
                                <div class="text-center">
                                      <img src="{$template_url_s}/img/icon-rural.png" alt="">
                                      <span>Turismo rural</span>
                                  </div>
                              </label>
                            </div>
                            <div class="btn-group" data-toggle="buttons">
                              
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 form-group">
                        <label class="control-label col-sm-4">Servicios</label>
                        <div class="col-sm-8" id="filtrosServicios">
                            {foreach from=$categorias item=categoria name=categorias}
                                {foreach from=$categoria->instalaciones item=instalacion name=instalaciones}
                                    {if $smarty.foreach.instalaciones.iteration < 2}
                                    <div class="checkbox-inline">
                                        <input type="checkbox" class="" name="instalaciones[]" value="{$instalacion->idInstalacion}"/>
                                        {$instalacion->nombre}
                                    </div>
                                    {/if}
                                {/foreach}
                            {/foreach} 
                            
                            <div class="checkbox-inline more-checkbox">
                                <a href="#" id="moreFiltersBtn" class="btn btn-default">MAS</a>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-sm-12 form-group">
                        <label class="control-label col-sm-4">Tipo de propiedad</label>
                        <div class="col-sm-8">
                            {foreach from=$tiposApartamento item=tipo}
                                <div class="checkbox-inline">
                                    <input type="checkbox" class="" name="tiposApartamento[]" value="{$tipo->idApartamentosTipo}" />
                                    {$tipo->nombre}
                                </div>
                            {/foreach}
                            <!--
                            <div class="checkbox-inline">
                                <input type="checkbox" class="" />
                                Casa
                            </div>
                            <div class="checkbox-inline">
                                <input type="checkbox" class="" />
                                Bed & Breakfast
                            </div>
                            <div class="checkbox-inline more-checkbox">
                                <a href="#" class="btn btn-default">MAS</a>
                            </div>
                            -->
                        </div>
                    </div>
                </form>
                </div>
                <div class="row" id="mapa">
                    <div class="col-md-12">
                        <div id="details-map-location"></div>
                    </div>
                </div>
            </div>
            <div class="col-sm-7">
                <div class="row home-main-slider">
                    {if $trash_text}
                    <div class="col-md-12">
                        <p class="slide-order-title">{substr($trash_text, 0, 5)}...</p>
                    </div>
                    {/if}
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="sr-only" for="huesped">Ordenar por</label>
                            <select class="form-control" name="order">
                                <option value="a.nombre ASC">Nombre (Ascendente)</option>
                                <option value="a.nombre DESC">Nombre (Descendente)</option>
                                <option value="d.precio ASC">Precio (Ascendente)</option>
                                <option value="d.precio DESC">Precio (Descendente)</option>
                                <option value="a.visitas ASC">Popularidad</option>
                            </select>
                        </div>
                    </div>
                    
                </div>
                <div id="resultados" class="row result-list-container">
                    {foreach from=$apartamentos item=a name=apartamentos}
                    <div class="col-lg-6 mix apto" data-name="{$a['apartamento']->nombre}" data-price="{$a['apartamento']->tarifaBase}">
                        <div class=" result-item">
                            <div>
                                <div class="carrusel">
                                    <div class="carousel slide"  id="result-slider-{$smarty.foreach.apartamentos.iteration}">
                                        <div class="carousel-inner">
                                            {foreach from=$a['adjuntos'] item=adjunto name=adjuntos}
                                            <div class="item {if $smarty.foreach.adjuntos.first}active{/if}">
                                                <img src="{$template_url}{$adjunto->ruta}" alt="">
                                                <div class="carousel-caption">
                                                    <!--<p>{$a['apartamento']->nombre}</p>-->
                                                    {if count($a['opiniones'])}
                                                    <span class="comments-icon">{count($a['opiniones'])}</span>
                                                    {/if}
                                                </div>
                                            </div>
                                            {/foreach}


                                        </div>
                                        <div class="back-images layer-1"></div>
                                        <div class="back-images layer-2"></div>

                                        <a class="left carousel-control" href="#result-slider-{$smarty.foreach.apartamentos.iteration}" data-slide="prev">
                                            <span class="icon-prev"></span>
                                        </a>
                                        <a class="right carousel-control" href="#result-slider-{$smarty.foreach.apartamentos.iteration}" data-slide="next">
                                            <span class="icon-next"></span>
                                        </a>
                                    </div>
                                </div>
                                    
                                <div class="acciones-apto">
                                    
                                    
                                            <div class="text-left descripcion-apto">
                                                <ul>
                                                    <li>
                                                        <a href="{$base_url}/apartamento/id:{$a['apartamento']->idApartamento}">{$a['apartamento']->nombre}</a>
                                                    </li>
                                                    <li>
                                                        {$a['apartamento']->tipo}
                                                    </li>
                                                    <li>
                                                        Max. ocupaci&oacute;n {$a['apartamento']->capacidadPersonas}
                                                    </li>
                                                </ul>
                                                <!--<a href="{$base_url}/apartamento/id:{$a['apartamento']->idApartamento}" class="btn btn-success book-it">Reserva inmediata</a>-->
                                                <input type="hidden" name="precio" value="{$a['apartamento']->nombre}">
                                                <input type="hidden" name="nombre" value="{$a['apartamento']->tarifaBase}">
                                                <input type="hidden" name="lat" value="{$a['apartamento']->direccion->lat}">
                                                <input type="hidden" name="lon" value="{$a['apartamento']->direccion->lon}">
                                            </div>
                                        

                                            <div class="price-apto">
                                                <p class="priceApto">{$a['apartamento']->tarifaBase|number_format:2:",":"."}<small>&euro;</small></p>
                                                <p class="text-muted">Por&nbsp;noche</p>
                                            </div>
                                        
                                    
                                </div>
                            </div>
                            <div>
                                <div>
                                    <div class="apartamento-descripcion">
                                        {$a['apartamento']->descripcionLarga}
                                    </div>
                                    
                                </div>
                                <div class="acciones-disponibilidad">
                                    <span><a class="ver-disponibilidad" apartamento-id="{$a['apartamento']->idApartamento}" href="javascript:void(0)" >Ver disponibilidad</a></span>
                                    <a href="{$base_url}/apartamento/id:{$a['apartamento']->idApartamento}" class="btn btn-success book-it">Reserva inmediata</a>
                                </div>
                            </div>
                        </div>
                    </div>      
                     {/foreach}
                     
                </div>
            </div>
        </div>
    </div>
                    
<div class="modal fade" id="calendario_modal">
    <div class="modal-dialog">
        <div class="modal-content">
             <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Disponibilidad</h4>
            </div>
            <div class="modal-body">
                <div id="calendarioDisponibilidad"></div>
                <div id="calendar-legend">
                    <div class="leyenda disponible"></div><div>Disponible</div>
                    <div class="leyenda no-disponible"></div><div>No Disponible</div>
                    <div class="leyenda anterior"></div><div>No especificado</div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
                    
<div class="modal fade" id="servicios_modal">
    <div class="modal-dialog">
        <div class="modal-content">
             <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Servicios</h4>
            </div>
            <div class="modal-body">
                <div class="listado-servicios">
                    {foreach from=$categorias item=categoria}
                        <legend>{$categoria->nombre}</legend>
                        <div class="servicios">
                            {foreach from=$categoria->instalaciones item=instalacion}
                                <div class="checkbox-inline">
                                    <input type="checkbox" class="" name="instalaciones" value="{$instalacion->idInstalacion}"/>
                                    {$instalacion->nombre}
                                </div>
                            {/foreach}
                        </div>
                    {/foreach}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="filtrarServiciosBtn">Aceptar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
                    
{/block}
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
        /*var disponibles = {$disponibles};*/
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
            <div class="filtros_main_container">
                <div class="row form-horizontal filters-content" role="form">
                <h4 class="filtros-title">{#encontrar_mi_alojamiento_perfecto#}</h4>
                <form id="filtrosFrm">
                   <div class="search-slider-content">
                        <div class="form-inline" role="form">
                                <legend>{#disponibilidad#}</legend>
                            <div class="form-group for_input">
                                <label class="sr-only" for="llegada">{#llegada#}</label>
                                <input type="text" class="form-control date-start" id="llegada" name="dateStart" placeholder="Llegada">
                            </div>
                            <div class="form-group arrow_in_search"><img src="{$template_url_s}/img/icon-arrowR.png" alt="Photo 4"></div>
                            <div class="form-group for_input">
                                <label class="sr-only" for="llegada">{#salida#}</label>
                                <input type="text" class="form-control date-end" id="salida" name="dateEnd" placeholder="Salida">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="huesped">{#personas#}</label>
                                <select class="form-control" name="huespedes">
                                    <option value="1">1 {#persona#}</option>
                                    <option value="2">2 {#personas#}</option>
                                    <option value="3">3 {#personas#}</option>
                                    <option value="4">4 {#personas#}</option>
                                    <option value="5">5 {#personas#}</option>
                                    <option value="6">6 {#personas#}</option>
                                    <option value="7">7 {#personas#}</option>
                                    <option value="8">8 {#personas#}</option>
                                    <option value="9">9 {#personas#}</option>
                                    <option value="10">10 {#personas#}</option>
                                    <option value="11">11 {#personas#}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-sm-12 form-group">
                        <legend>{#tipo_de_alojamiento#}</legend>
                        <div class="">
                            <div class="btn-group separate-group" data-toggle="buttons">
                                {foreach from=$tiposApartamento item=tipo}
                                    {if $tipo->apartamentos > 0}
                                        <label class="btn btn-default">
                                            <input type="checkbox" class="" name="tiposApartamento[]" value="{$tipo->idApartamentosTipo}" />
                                            <div class="text-center">
                                              <span>{$tipo->nombre}<strong>({$tipo->apartamentos})</strong></span>
                                            </div>
                                            
                                        </label>
                                    {/if}
                                {/foreach}
                            </div>
                        </div>
                    </div>
                    <!--
                    <div class="col-sm-12 form-group">
                        <label class="control-label col-sm-4">Tipo de alojamiento</label>
                        <div class="col-sm-8">
                            <div class="btn-group separate-group" data-toggle="buttons">
                                {if $habitaciones[0]->apartamentos > 0}
                                <label class="btn btn-default" id="villas">
                                    <input type="checkbox" name="alojamientos[]" id="option1" value="1">
                                  <div class="text-center">
                                      <img src="{$template_url_s}/img/icon-villas.png" alt="">
                                      <span>Villas<strong>({$habitaciones[0]->apartamentos})</strong></span>
                                  </div>
                                </label>
                                {/if}
                                {if $habitaciones[1]->apartamentos > 0}
                                  <label class="btn btn-default" id="rural">
                                        <input type="checkbox" name="alojamientos[]" id="option2" value="2">
                                        <div class="text-center">
                                          <img src="{$template_url_s}/img/icon-rural.png" alt="">
                                          <span>Turismo rural<strong>({$habitaciones[1]->apartamentos})</strong></span>
                                        </div>
                                  </label>
                                {/if}
                            </div>
                            <div class="btn-group" data-toggle="buttons">
                              
                            </div>
                        </div>
                    </div>-->
                    <div class="col-sm-12 form-group">
                        <legend>{#servicios#}</legend>
                        <div id="filtrosServicios">
                            {foreach from=$categorias item=categoria name=categorias}
                                {foreach from=$categoria->instalaciones item=instalacion name=instalaciones}
                                    {if $smarty.foreach.instalaciones.iteration < 2}
                                        {if $instalacion->apartamentos > 0}
                                        <div class="checkbox-inline">
                                            <input type="checkbox" class="" name="instalaciones[]" value="{$instalacion->idInstalacion}"/>
                                            <span>{$instalacion->nombre}<strong>({$instalacion->apartamentos})</strong></span>
                                        </div>
                                        {/if}
                                    {/if}
                                {/foreach}
                            {/foreach} 
                            
                            <div class="checkbox-inline more-checkbox">
                                <a href="#" id="moreFiltersBtn" class="btn btn-default">{#mas#}</a>
                            </div>
                            
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
            <div class="house_side">
                <div class="row home-main-slider">
                    <div class="col-md-12">
                        <h1>{#alojamientos_en_mallorca#}</h1>
                        <p class="slide-order-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit, Lorem ipsum dolor sit amet, consectetur adipiscing elit, Lorem ipsum dolor sit amet, consectetur adipiscing elit, Lorem ipsum dolor sit amet, consectetur adipiscing elit, elit Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                    </div>
                    <div class="col-md-4 hidden">
                        <div class="form-group">
                            
                            <select class="form-control" name="order">
                                <option value="a.nombre ASC">{#nombre_ascendente#}</option>
                                <option value="a.nombre DESC">{#nombre_descendente#}</option>
                                <option value="d.precio ASC">{#precio_ascendente#}</option>
                                <option value="d.precio DESC">{#precio_descendente#}</option>
                                <option value="a.visitas ASC">{#popularidad#}</option>
                            </select>
                        </div>
                    </div>
                    
                </div>
                <div id="resultados" class="row result-list-container">
                    {foreach from=$apartamentos item=a name=apartamentos}
                    <div class="col-lg-12 mix apto apartamento-item-content" data-name="{$a['apartamento']->nombre}" data-price="{$a['apartamento']->tarifaBase}" data-id="{$a['apartamento']->idApartamento}">
                        <div class=" result-item">
                            <div>
                                <div class="carrusel">
                                {if $a['apartamento']->idComplejo}
                                    <div class="complejo-mark">
                                        <a href="javascript:void(0)" title="Pincha aquí para ver los datos del complejo" id-complejo="{$a['apartamento']->idComplejo}">
                                            Esta alojamiento pertenece a {$a['complejo']->nombre}
                                        </a>
                                    </div>
                                {/if}
                                    <div class="carousel slide"  id="result-slider-{$smarty.foreach.apartamentos.iteration}">
                                        <div class="carousel-inner">
                                            {foreach from=$a['adjuntos'] item=adjunto name=adjuntos}
                                            <div class="item {if $smarty.foreach.adjuntos.first}active{/if}">
                                                <img src="{$template_url}{$adjunto->ruta}" alt="">
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
                                                 <a href="{$base_url}/apartamento/id:{$a['apartamento']->idApartamento}" class="apto-link">{$a['apartamento']->nombre}</a>
                                                <ul class="home_attr_list">
                                                    <li>
                                                        Tipo de alojamiento {$a['apartamento']->tipo}
                                                    </li>
                                                    {if $a['apartamento']->idComplejo}
                                                    
                                                    {/if}
                                                    <li>
                                                        Capacidad {$a['apartamento']->capacidadPersonas}
                                                    </li>
                                                    <li>
                                                        Habitaciones {$a['apartamento']->habitaciones}
                                                    </li>
                                                    <li>
                                                        Ba&ntilde;os {$a['apartamento']->banio}
                                                    </li>
                                                </ul>
                                                <!--<a href="{$base_url}/apartamento/id:{$a['apartamento']->idApartamento}" class="btn btn-success book-it">Reserva inmediata</a>-->
                                                <input type="hidden" name="precio" value="{$a['apartamento']->nombre}">
                                                <input type="hidden" name="nombre" value="{$a['apartamento']->tarifaBase}">
                                                <input type="hidden" name="lat" value="{$a['apartamento']->direccion->lat}">
                                                <input type="hidden" name="lon" value="{$a['apartamento']->direccion->lon}">
                                                <input type="hidden" name="type" value="{if $a['apartamento']->idComplejo}complejo{else}house{/if}">
                                                
                                            </div>
                                        

                                            <div class="price-apto">
                                                {if $a['apartamento']->precioMinimo || $a['apartamento']->precioMaximo}
                                                <p class="text-muted">{#desde#} <strong>{$a['apartamento']->precioMinimo|number_format:2:",":"."}<small>&euro;</small></strong></p>
                                                <p class="text-muted">{#hasta#} <strong>{$a['apartamento']->precioMaximo|number_format:2:",":"."}<small>&euro;</small></strong></p>
                                                {else}
                                                    <p class="text-muted">{#no_disponible#}</p>
                                                {/if}
                                            </div>
                                             <div class="acciones-disponibilidad">
                                    <span><a class="ver-disponibilidad" apartamento-id="{$a['apartamento']->idApartamento}" href="javascript:void(0)" >Disponibilidad</a></span>
                                    <a href="{$base_url}/apartamento/id:{$a['apartamento']->idApartamento}" class="btn btn-success book-it">{#reservar#}</a>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>      
                    {/foreach} 
                     
                </div>
                <div id="loading-filters" class="row">
                    <div class="bubblingG">
                        <span id="bubblingG_1">
                        </span>
                        <span id="bubblingG_2">
                        </span>
                        <span id="bubblingG_3">
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
                    
<div class="modal fade" id="calendario_modal">
    <div class="modal-dialog">
        <div class="modal-content">
             <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">{#disponibilidad#}</h4>
            </div>
            <div class="modal-body">
                <div id="calendarioDisponibilidad"></div>
                <div id="calendar-legend">
                    <div class="leyenda disponible"></div><div>{#disponible#}</div>
                    <div class="leyenda no-disponible"></div><div>{#no_disponible#}</div>
                    <div class="leyenda anterior"></div><div>{#no_especificado#}</div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{#cerrar#}</button>
            </div>
        </div>
    </div>
</div>
                    
<div class="modal fade" id="servicios_modal">
    <div class="modal-dialog">
        <div class="modal-content">
             <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">{#servicios#}</h4>
            </div>
            <div class="modal-body">
                <div class="listado-servicios">
                    {foreach from=$categorias item=categoria}
                        <legend>{$categoria->nombre}</legend>
                        <div class="servicios">
                            {foreach from=$categoria->instalaciones item=instalacion}
                                {if $instalacion->apartamentos > 0}
                                <div class="col-sm-4">
                                    <input type="checkbox" class="" name="instalaciones" value="{$instalacion->idInstalacion}"/>
                                    <span>{$instalacion->nombre}<strong>({$instalacion->apartamentos})</strong></span>
                                </div>
                                {/if}
                            {/foreach}
                            <div class="delimiter"></div>
                        </div>
                    {/foreach}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="filtrarServiciosBtn">{#aceptar#}</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">{#cancelar#}</button>
            </div>
        </div>
    </div>
</div>
            
<div class="modal fade" id="complejo-modal">
    <div class="modal-dialog">
        
    </div>
</div>
                    
{/block}
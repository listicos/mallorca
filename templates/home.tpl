{extends file="index.tpl"}

{block name="script" append}
    <script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>
    <script src="{$template_url_s}/js/home.js"></script>
    <!--<script src="{$template_url_s}/js/jquery.mixitup.min.js"></script>-->
    <!--<script src="{$template_url}/js/admin/calendar/app.js"></script>
    <script src="{$template_url}/js/admin/calendar/breakpoints.js"></script>
    <script src="{$template_url}/js/admin/calendar/calendar.js"></script>-->
    <script src="{$template_url}/js/admin/fullcalendar.min.js"></script>
    <script>
        var minPrice = {$minPrice};
        var maxPrice = {$maxPrice};
    </script>
{/block}

{block name="style" append}
<link href="{$template_url_s}/css/home.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{$template_url_s}/css/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
<link type="text/css" href="{$template_url_s}/css/fancybox/fancymoves.css" media="screen" charset="utf-8" rel="stylesheet"  />
<link href="{$template_url}/css/admin/fullcalendar.css" rel="stylesheet">
{/block}

{block name="content" append}
    <div class="container-liquid  content body-content home">
        <div class="row banner-home">
        
        </div>
        <div class="row">
            <div class="filtros_main_container">
                <div>
                <div class="row form-horizontal filters-content" role="form">
                <h4 class="filtros-title">{#encontrar_mi_alojamiento_perfecto#}</h4>
                <form id="filtrosFrm">
                   <div class="search-slider-content">
                        <div class="form-inline" role="form">
                                <legend>{#disponibilidad#}</legend>
                            <div class="form-group for_input">
                                <label class="sr-only" for="llegada">{#llegada#}</label>
                                <input type="text"  class="form-control date-start" id="llegada" name="dateStart" placeholder="Llegada" value="{if $fechaInicio}{$fechaInicio|date_format:"%d-%m-%Y"}{/if}" >
                            </div>
                            <div class="form-group arrow_in_search"><img src="{$template_url_s}/img/icon-arrowR.png" alt="Photo 4"></div>
                            <div class="form-group for_input">
                                <label class="sr-only" for="llegada">{#salida#}</label>
                                <input type="text" class="form-control date-end" id="salida" name="dateEnd" placeholder="Salida" value="{if $fechaFinal}{$fechaFinal|date_format:"%d-%m-%Y"}{/if}">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="huesped">{#personas#}</label>
                                <select class="form-control" name="huespedes">
                                    <option value="1" {if $huespedes eq 1}selected{/if}>1 {#persona#}</option>
                                    <option value="2" {if $huespedes eq 2}selected{/if}>2 {#personas#}</option>
                                    <option value="3" {if $huespedes eq 3}selected{/if}>3 {#personas#}</option>
                                    <option value="4" {if $huespedes eq 4}selected{/if}>4 {#personas#}</option>
                                    <option value="5" {if $huespedes eq 5}selected{/if}>5 {#personas#}</option>
                                    <option value="6" {if $huespedes eq 6}selected{/if}>6 {#personas#}</option>
                                    <option value="7" {if $huespedes eq 7}selected{/if}>7 {#personas#}</option>
                                    <option value="8" {if $huespedes eq 8}selected{/if}>8 {#personas#}</option>
                                    <option value="9" {if $huespedes eq 9}selected{/if}>9 {#personas#}</option>
                                    <option value="10" {if $huespedes eq 10}selected{/if}>10 {#personas#}</option>
                                    <option value="11" {if $huespedes eq 11}selected{/if}>11 {#personas#}</option>
                                    <option value="12" {if $huespedes eq 12}selected{/if}>12 {#personas#}</option>
                                    <option value="13" {if $huespedes eq 13}selected{/if}>13 {#personas#}</option>
                                    <option value="14" {if $huespedes eq 14}selected{/if}>14 {#personas#}</option>
                                    <option value="15" {if $huespedes eq 15}selected{/if}>15 {#personas#}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-sm-12 form-group">
                        <legend>{#tipo_de_alojamiento#}</legend>
                        <div class="">
                            <div class="row-fluid" >
                                {foreach from=$tiposApartamento item=tipo}
                                    {if $tipo->apartamentos > 0}
                                        <div class="checkbox-inline">
                                            <input type="checkbox" class="" name="tiposApartamento[]" value="{$tipo->idApartamentosTipo}"/>
                                            <span>{$tipo->nombre}<strong> ({$tipo->apartamentos})</strong></span>
                                        </div>
                                        
                                    {/if}
                                {/foreach}
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 form-group">
                        <legend>{#servicios#}</legend>
                        <div id="filtrosServicios">
                            {foreach from=$categorias item=categoria name=categorias}
                                {foreach from=$categoria->instalaciones item=instalacion name=instalaciones}
                                    {if $smarty.foreach.instalaciones.iteration < 2}
                                        {if $instalacion->apartamentos > 0}
                                        <div class="checkbox-inline">
                                            <input type="checkbox" class="" name="instalaciones[]" value="{$instalacion->idInstalacion}"/>
                                            <span>{$instalacion->nombre}<strong> ({$instalacion->apartamentos})</strong></span>
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
            </div>
            <div class="house_side">
                <div class="row home-main-slider">
                    <div class="col-md-12">
                        <h1>{#alojamientos_en_mallorca#}</h1>
                        <p class="slide-order-title">Disfrute de unas exclusivas vacaciones en Mallorca en una de las Fincas o Agroturismos que desde mas de una década gestionamos.</p>
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
                                            {$a['complejo']->nombre}
                                        </a>
                                    </div>
                                {/if}
                                    <div class="carousel slide"  id="result-slider-{$smarty.foreach.apartamentos.iteration}">
                                        <div class="carousel-inner">
                                            {foreach from=$a['adjuntos'] item=adjunto name=adjuntos}
                                            <div class="item {if $smarty.foreach.adjuntos.first}active{/if}" data-urls="{$template_url}{$adjunto->ruta}" {if $smarty.foreach.adjuntos.first}data-slide-number="0"{/if}>
                                                {if $smarty.foreach.adjuntos.first}<img src="{$template_url}{$adjunto->ruta}" />{else}
                                                <div class='loading_ajax'><img src='{$template_url_s}/img/loader.gif' /></div>
                                                {/if}
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
                                                <input type="hidden" name="precio" value="{$a['apartamento']->tarifaBase}">
                                                <input type="hidden" name="nombre" value="{$a['apartamento']->nombre}">
                                                <input type="hidden" name="lat" value="{$a['apartamento']->direccion->lat}">
                                                <input type="hidden" name="lon" value="{$a['apartamento']->direccion->lon}">
                                                <input type="hidden" name="type" value="{if $a['apartamento']->idComplejo}complejo{else}house{/if}">
                                                
                                            </div>
                                        

                                            <div class="price-apto">
                                                {if $a['apartamento']->precioMinimo || $a['apartamento']->precioMaximo}
                                                    {if !$a['apartamento']->total}
                                                        <p class="text-muted">desde <strong>&euro; {$a['apartamento']->precioMinimo|number_format:2:",":"."}</strong></p>
                                                        {if $a['apartamento']->precioMaximo && $a['apartamento']->precioMaximo ne $a['apartamento']->precioMinimo}
                                                            <p class="text-muted">hasta <strong>&euro; {$a['apartamento']->precioMaximo|number_format:2:",":"."}</strong></p>
                                                        {/if}
                                                    {else}
                                                         <p class="text-muted total">Total de la reserva: <strong>&euro; {$a['apartamento']->total|number_format:2:",":"."}</strong></p>
                                                    {/if}
                                                    
                                                {else}
                                                    <p class="text-muted">{#no_disponible#}</p>
                                                {/if}
                                            </div>
                                             <div class="acciones-disponibilidad">
                                    <span><a class="ver-disponibilidad" apartamento-id="{$a['apartamento']->idApartamento}" href="javascript:void(0)" >Disponibilidad</a></span>
                                    <a href="{$base_url}/apartamento/id:{$a['apartamento']->idApartamento}" class="btn btn-success book-it">{if $a['apartamento']->precioMinimo || $a['apartamento']->precioMaximo}{#reservar#}{else}{#ver#}{/if}</a>
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
                    
<div class="modal" id="calendario_modal">
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
                        <div class="servicios row">
                            {foreach from=$categoria->instalaciones item=instalacion}
                                {if $instalacion->apartamentos > 0}
                                <div class="col-sm-4">
                                    <input type="checkbox" class="" name="instalaciones" value="{$instalacion->idInstalacion}"/>
                                    <span>{$instalacion->nombre}<strong> ({$instalacion->apartamentos})</strong></span>
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
{extends file="index.tpl"}

{block name="script" append}
    <script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>
    <script src="{$template_url_s}/js/complejos.js"></script>
{/block}

{block name="style" append}
<link href='http://fonts.googleapis.com/css?family=Shadows+Into+Light+Two' rel='stylesheet' type='text/css'>
<link href="{$template_url_s}/css/complejos.css" rel="stylesheet">
<link href="{$template_url_s}/css/complejo.css" rel="stylesheet">
<link href="{$template_url_s}/css/home.css" rel="stylesheet">
{/block}

{block name="content" append}
<div class="container-liquid  content body-content home">
    

<div class="row banner-home">
        
</div>
<div class="row complejo_container">
    
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
                    
                    
                    
                </form>
                </div>
                <div class="row" id="mapa">
                    <div class="col-md-12">
                        <div class="row-fluid">
                            <div class="col-md-12">
                                <legend>{#ubicacion#}</legend>    
                            </div>
                            
                        </div>
                        
                        
                        <div id="details-map-location"></div>
                    </div>
                </div>
                </div>
        </div>
       
    
    <div class="house_side">
     <div class="row thumbs_home">
            <div class="col-md-6">
                <a href="{$base_url}">
                <div class="selector_container">
                     <img class="img-thumbnail" src="{$template_url_s}/img/finca_mallorca.jpg">
                    <div class="thumb_description">
                        <h5>{#fincas#}</h5>
                        <p>{#texto_fincas#}</p>
                    </div>
                </div>
                </a>
            </div>
           <div class="col-md-6">
                <a href="{$base_url}/agroturismo">
                <div class="selector_container active">
                     <img class="img-thumbnail" src="{$template_url_s}/img/agroturimos_promo.jpg">
                    <div class="thumb_description">
                        <h5>{#agroturismo#}</h5>
                        <p>{#texto_agroturismo#}</p>
                    </div>
                </div>
                </a>
            </div>
    </div>
                     <p class="slide-order-title">{#texto_descriptivo#}</p>
        <ul class="complejos_list">
        {foreach from=$complejos item=complejo}
            <li class="complejo_item" data-id="{$complejo['id_complejo']}">
                <input type="hidden" name="lat" value="{$complejo['lat']}">
                <input type="hidden" name="lon" value="{$complejo['lon']}">
                <input type="hidden" name="nombre" value="{$complejo['nombre']}">
                <div class="row-fluid complejo_details">
                    <h2><a href="{$base_url}/complejo/id:{$complejo['id_complejo']}">{$complejo['nombre']}</a></h2>
                    <div class="row-fluid">
                        <div class="flexslider">
                            <ul class="slides">
                        {foreach from=$complejo['adjuntos'] item=adjunto}
                            <li data-thumb="{$template_url}{$adjunto}"><a href="{$base_url}/complejo/id:{$complejo.id_complejo}"><img src="{$template_url}{$adjunto}"></a></li>
                        {/foreach}
                            </ul>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="col-xs-9 complejo-descripcion">
                            <div class="form-group ">
                                {if $complejo.descripciones.$lang}{$complejo.descripciones.$lang}{else}{$complejo.descripciones.es}{/if}
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="form-group centered complejo-disponibilidad-precios">
                                <a class="precios-complejo">{#desde#} &euro;{$complejo.min|number_format:2:',':''} <br />{#Hasta#} &euro;{$complejo.max|number_format:2:',':''}</a>
                                <a href="" class="ver-disponibilidad" id-complejo="{$complejo.id_complejo}">{#disponibilidad#}</a>
                                <a href="{$base_url}/complejo/id:{$complejo['id_complejo']}" class="btn btn-success ver_detalle_complejos">{#ver_detalle#}</a>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </li>
        {/foreach}
        </ul>  
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
            <div class="modal-body modal-body-slim">
                <div id="calendario"></div>
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
{/block}
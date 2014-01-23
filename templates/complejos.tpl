{extends file="index.tpl"}

{block name="script" append}
    <script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>
    <script src="{$template_url_s}/js/complejos.js"></script>
{/block}

{block name="style" append}
<link href='http://fonts.googleapis.com/css?family=Shadows+Into+Light+Two' rel='stylesheet' type='text/css'>
<link href="{$template_url_s}/css/complejos.css" rel="stylesheet">
<link href="{$template_url_s}/css/home.css" rel="stylesheet">
{/block}

{block name="content" append}
<div class="container-liquid  content body-content home">
    

<div class="row banner-home">
        
</div>
<div class="row-fluid complejo_container">
    
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
                        <div id="details-map-location"></div>
                    </div>
                </div>
                </div>
        </div>
       
    
    <div class="house_side">
        <ul class="complejos_list">
        {foreach from=$complejos item=complejo}
            <li class="complejo_item" data-id="{$complejo['id_complejo']}">
                <input type="hidden" name="lat" value="{$complejo['lat']}">
                <input type="hidden" name="lon" value="{$complejo['lon']}">
                <input type="hidden" name="nombre" value="{$complejo['nombre']}">
                <div class="row-fluid complejo_details">
                    <h2>{$complejo['nombre']}</h2>
                    <div class="row-fluid">
                        <div class="flexslider">
                            <ul class="slides">
                        {foreach from=$complejo['adjuntos'] item=adjunto}
                                <li data-thumb="{$template_url}{$adjunto}"><img src="{$template_url}{$adjunto}"></li>
                        {/foreach}
                            </ul>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="col-xs-8 complejo-descripcion">
                            <div class="form-group ">
                                {$complejo['descripcion']}
                            </div>
                        </div>
                        <div class="col-xs-4 ">
                            <div class="form-group centered complejo-disponibilidad-precios">
                                <div>
                                <a href="{$base_url}/complejo/id:{$complejo['id_complejo']}" class="precios-complejo">{#desde#} 80,00&euro; {#hasta#} 120,00&euro;</a>
                                </div>
                                <div>
                                    <a href="" class="ver-disponibilidad">{#disponibilidad#}</a>
                                </div>
                            </div>
                        </div>
                        <!--
                        {foreach from=$complejo['apartamentos'] item=apartamento}
                            <ul>
                                <li>{$apartamento['nombre']}</li>
                            </ul>
                        {/foreach}
                        -->
                        <div class="clear"></div>
                    </div>
                </div>
            </li>
        {/foreach}
        </ul>  
    </div>
</div>
</div>
{/block}
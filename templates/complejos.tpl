{extends file="index.tpl"}

{block name="script" append}
    <script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>
    <script src="{$template_url_s}/js/complejos.js"></script>
{/block}

{block name="style" append}
<link href='http://fonts.googleapis.com/css?family=Shadows+Into+Light+Two' rel='stylesheet' type='text/css'>
<link href="{$template_url_s}/css/complejos.css" rel="stylesheet">
{/block}

{block name="content" append}
<div class="container-liquid  content body-content home">
    

<div class="row banner-home">
        
</div>
<div class="row-fluid complejo_container">
    <div class="col-md-4">
        <div class="filtros_main_container">
            
        </div>
       
    </div>
    <div class="col-md-8">
        <ul class="complejos_list">
        {foreach from=$complejos item=complejo}
            <li class="complejo_item">
                <input type="hidden" name="lat" value="{$complejo['lat']}">
                <input type="hidden" name="lon" value="{$complejo['lon']}">
                <input type="hidden" name="nombre" value="{$complejo['nombre']}">
                <div class="row-fluid complejo_details">
                    <h2>{$complejo['nombre']}</h2>
                    <div class="col-md-6">
                        <div class="flexslider">
                            <ul class="slides">
                        {foreach from=$complejo['adjuntos'] item=adjunto}
                                <li data-thumb="{$template_url}{$adjunto}"><img src="{$template_url}/{$adjunto}"></li>
                        {/foreach}
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        {$complejo['descripcion']}
                        {foreach from=$complejo['apartamentos'] item=apartamento}
                            <ul>
                                <li>{$apartamento['nombre']}</li>
                            </ul>
                        {/foreach}
                    </div>
                </div>
            </li>
        {/foreach}
        </ul>  
    </div>
</div>
</div>
{/block}

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
                        <li data-thumb="{$template_url}{$adjunto}"><img src="{$template_url}{$adjunto}"></li>
                {/foreach}
                    </ul>
                </div>
            </div>
            <div class="row-fluid">
                <div class="col-xs-9 complejo-descripcion">
                    <div class="form-group ">
                        {$complejo['descripcion']}
                    </div>
                </div>
                <div class="col-xs-3">
                    <div class="form-group centered complejo-disponibilidad-precios">
                        <a class="precios-complejo">{#desde#} &euro;{$complejo.min|number_format:2:',':''} <br />{#Hasta#} &euro;{$complejo.max|number_format:2:',':''}</a>
                        <a href="" class="ver-disponibilidad" id-complejo="{$complejo.id_complejo}">{#disponibilidad#}</a>
                        <a href="{$base_url}/complejo/id:{$complejo['id_complejo']}" class="btn btn-success ver_detalle_complejos">Ver detalle</a>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </li>
{/foreach}

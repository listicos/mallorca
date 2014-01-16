<!--<div id="infoMapa">
    <div class="row-fluid">
        <div class="col-sm-6" style="padding: 0;">
            <a href="{$base_url}/apartamento/id:{$apartamento->idApartamento}"><img src="{$template_url}{$apartamento->adjuntos[0]->ruta}" alt="$apartamento->nombre"></a>
        </div>
        <div class="col-sm-6">
            <a href="{$base_url}/apartamento/id:{$apartamento->idApartamento}"><strong>{$apartamento->nombre}</strong></a>
            <p>{$apartamento->direccion->provincia}</p>
        </div>
    </div>
</div>-->
<div id="infomapa" class="infomapa mix apto apartamento-item-content" data-name="{$apartamento->nombre}" data-price="{$apartamento->precioPorNoche}" data-id="{$apartamento->idApartamento}">
    <div class=" result-item">
        <div>
            <div class="carrusel">
            {if $apartamento->idComplejo}
                <div class="complejo-mark">
                    <a href="javascript:void(0)" title="Pincha aquí para ver los datos del complejo" id-complejo="{$apartamento->idComplejo}">
                        {$apartamento->complejo->nombre}
                    </a>
                </div>
            {/if}
                <div class="carousel slide"  id="result-slider-{$smarty.foreach.apartamentos.iteration}">
                    {foreach from=$apartamento->adjuntos item=adjunto name=adjuntos}
                        {if $smarty.foreach.adjuntos.first}
                                                <img src="{$template_url}{$adjunto->ruta}" />
                                               
                                      {/if}
                        {/foreach}
                </div>
            </div>

            <div class="acciones-apto">
                        <div class="text-left descripcion-apto">
                        <a href="{$base_url}/apartamento/id:{$apartamento->idApartamento}" class="apto-link">{$apartamento->nombre}</a>
                            <ul class="home_attr_list">
                                <li>
                                    {$apartamento->tipo}
                                </li>
                                <li>
                                    Max. pax {$apartamento->capacidadPersonas}
                                </li>
                                <li>
                                    Habitaciones {$apartamento->habitaciones}
                                </li>
                                <li>
                                    Ba&ntilde;os {$apartamento->banio}
                                </li>
                            </ul>
                            <input type="hidden" name="precio" value="{$apartamento->precioPorNoche}">
                            <input type="hidden" name="nombre" value="{$apartamento->nombre}">
                            <input type="hidden" name="lat" value="{$apartamento->direccion->lat}">
                            <input type="hidden" name="lon" value="{$apartamento->direccion->lon}">
                            <input type="hidden" name="type" value="{if $apartamento->idComplejo}complejo{else}house{/if}">
                        </div>


                        <div class="price-apto">
                            {if $apartamento->precioMinimo || $apartamento->precioMaximo}
                                {if !$apartamento->total}
                                    <p class="text-muted">desde <strong>&euro; {$apartamento->precioMinimo|number_format:2:",":"."}</strong></p>
                                    {if $apartamento->precioMaximo && $apartamento->precioMaximo ne $apartamento->precioMinimo}
                                        <p class="text-muted">hasta <strong>&euro; {$apartamento->precioMaximo|number_format:2:",":"."}</strong></p>
                                    {/if}
                                {else}
                                     <p class="text-muted total">Total de la reserva: <strong>&euro; {$apartamento->total|number_format:2:",":"."}</strong></p>
                                {/if}
                                
                            {else}
                                <p class="text-muted">{#no_disponible#}</p>
                            {/if}
                        </div>

                        <div class="acciones-disponibilidad">
                            <a href="{$base_url}/apartamento/id:{$apartamento->idApartamento}" class="btn btn-xs btn-success book-it">{if $apartamento->precioMinimo || $apartamento->precioMaximo}{#reservar#}{else}{#ver#}{/if}</a>
                        </div>
            </div>
        </div>
    </div>
</div>
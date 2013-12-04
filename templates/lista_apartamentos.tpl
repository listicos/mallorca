{if $apartamentos|@count gt 0}
{foreach from=$apartamentos item=a name=apartamentos}
<div class="col-lg-12 mix apto apartamento-item-content" data-name="{$a->nombre}" data-price="{$a->precioPorNoche}">
    <div class=" result-item">
        <div>
            <div class="carrusel">
                <div class="carousel slide"  id="result-slider-{$smarty.foreach.apartamentos.iteration}">
                    <div class="carousel-inner">
                        {foreach from=$a->adjuntos item=adjunto name=adjuntos}
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
                        <a href="{$base_url}/apartamento/id:{$a->idApartamento}" class="apto-link">{$a->nombre}</a>
                            <ul class="home_attr_list">
                                <li>
                                    {$a->tipo}
                                </li>
                                <li>
                                    Max. pax {$a->capacidadPersonas}
                                </li>
                                <li>
                                    Habitaciones {$a->habitaciones}
                                </li>
                                <li>
                                    Ba&ntilde;os {$a->banio}
                                </li>
                            </ul>
                            <!--<a href="{$base_url}/apartamento/id:{$a->idApartamento}" class="btn btn-success book-it">Reserva inmediata</a>-->
                            <input type="hidden" name="precio" value="{$a->precioPorNoche}">
                            <input type="hidden" name="nombre" value="{$a->nombre}">
                            <input type="hidden" name="lat" value="{$a->direccion->lat}">
                            <input type="hidden" name="lon" value="{$a->direccion->lon}">
                        </div>


                        <div class="price-apto">
                            <p class="text-muted">desde <strong>{$a->tarifaBase|number_format:2:",":"."}<small>&euro;</small></strong></p>
                            <p class="text-muted">hasta <strong>{$a->tarifaBase|number_format:2:",":"."}<small>&euro;</small></strong></p>
                        </div>

                        <div class="acciones-disponibilidad">
                            <span><a class="ver-disponibilidad" apartamento-id="{$a->idApartamento}" href="javascript:void(0)" >Disponibilidad</a></span>
                            <a href="{$base_url}/apartamento/id:{$a->idApartamento}" class="btn btn-success book-it">Reservar</a>
                        </div>
            </div>
        </div>
    </div>
</div>
{/foreach}
{else}
<div class="no_apartamentos_container">
<p>No hemos obtenido ningún resultado que se ajuste a tus criterios de búsqueda. Si los modificas, puede que mejore la búsqueda.</p>
<p>Prueba con:<p>
<p>Desactiva algunos filtros.</p>
<p>Amplía el área de búsqueda.</p>
<p>Busca una ciudad, una dirección o un punto de referencia.</p>
</div>
{/if}
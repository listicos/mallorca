{extends file="index.tpl"}

{block name="script" append}
    <script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>
    <script src="{$template_url_s}/js/buscar.js"></script>
    <script>
        var minPrice = {$minPrice};
        var maxPrice = {$maxPrice};
        var disponibles = {$disponibles};
    </script>
    
{/block}

{block name="style" append}
<link href="{$template_url_s}/css/buscar.css" rel="stylesheet">

{/block}

{block name="content" append}

<div class="container-liquid  content">
    <div class="row">
        <div class="col-sm-5 main-left-container hidden-xs hidden-sm">
            <div class="row filters-row" >
                    
                    
                        <form class="form-inline" role="form">
                              <div class="form-group col-sm-4">
                                <div id="dateStart" class="filter-inputs date datepicker date-start" data-date-format="dd-mm-yyyy">
                                    <input size="16" class="col-lg-12" name="dateStart" type="text" value="{$fechaInicio|date_format:"%e-%m-%Y"}" readonly>
                                    <span class="add-on"><i class="glyphicon glyphicon-calendar icon-white"></i></span>
                                </div>
                              </div>
                              <div class="form-group col-sm-4">
                                <div id="dateEnd" class="filter-inputs date datepicker date-end" data-date-format="dd-mm-yyyy">
                                    <input size="16" class="col-lg-12" name="dateEnd" type="text" value="{$fechaFinal|date_format:"%e-%m-%Y"}" readonly>
                                    <span class="add-on"><i class="glyphicon glyphicon-calendar icon-white"></i></span>
                                </div>
                              </div>
                              <div class="form-group col-sm-4">
                                  <select class="form-control" data-style="btn-defualt"  title="Huéspedes" name="huespedes">
                                      <option value="1" >1 Huésped</option>
                                      <option value="2">2 Huéspedes</option>
                                      <option value="3">3 Huépedes</option>
                                      <option value="4">4 Huépedes</option>
                                      <option value="5">5+ Huépedes</option>
                                </select>
                                  <input type="hidden" name="action" value="buscar">
                              </div>
                              
                        </form>
                    
                
            </div>
            <div class="row filters-row">
                <dl  class="dl-horizontal">
                    <dt>PRECIO</dt>
                    <dd>
                        <div class="row">
                            <div id="slider-range"></div>
                            <div class="range-prices-content">
                                <p class="pull-left">
                                    <label for="amount">Precio mínimo:</label>
                                    <span id="amount-min" style="border:0; font-weight:bold;" />
                                </p>
                                <p class="pull-right">
                                    <label for="amount">Precio máximo:</label>
                                    <span  id="amount-max" style="border:0; font-weight:bold;" />
                                </p>
                                <br class="clearfix"/>
                            </div>
                        </div>
                    </dd>
                </dl>
            </div>
            <div class="row"  id="mapa">
                <div id="details-map-location"></div>
            </div>
        </div>
        <div class="col-md-7 main-right-container">
            <div class="row">                

                <div class="col-lg-11 filters-row">
                    <div class="row more-filters">
                        <div class="col-lg-6">
                            <a href="#" onclick="return false;" class="btn btn-default hidden">Más filtros</a>
                        </div>
                        <div class="col-lg-6">
                            <p><span class="badge">{count($apartamentos)} anuncios</span> · Mallorca, Islas Baleares, España</p>
                        </div>
                    </div>
                    <div class="row result-list-container">
                        {foreach name=apartamentos from=$apartamentos item=a}
                            {if $smarty.foreach.apartamentos.iteration % 2 != 0 }
                            <div class="row">
                            {/if}
                            <div class="col-lg-6">
                            <div class=" result-item">
                                <div class="carousel slide"  id="result-slider-{$smarty.foreach.apartamentos.index}">
                                    <div class="carousel-inner">
                                        {foreach name=adjuntos from=$a['apartamento']->adjuntos item=b}
                                            <div class="item {if $smarty.foreach.adjuntos.first}active{/if}">
                                                <img src="{$template_url}{$b->ruta}" alt="{$a['apartamento']->nombre}" width="378px" height="284px">
                                                <div class="carousel-caption">
                                                    <p>{$a['apartamento']->nombre}</p>
                                                    {if $a['opiniones']}
                                                    <span class="comments-icon">{$a['opiniones']}</span>
                                                    {/if}
                                                </div>
                                                <!--<div class="add-to-wishlist"></div>-->
                                            </div>
                                        {/foreach}
                                    </div>
                                    <div class="back-images layer-1"></div>
                                    <div class="back-images layer-2"></div>

                                    <a class="left carousel-control" href="#result-slider-{$smarty.foreach.apartamentos.index}" data-slide="prev">
                                        <span class="icon-prev"></span>
                                    </a>
                                    <a class="right carousel-control" href="#result-slider-{$smarty.foreach.apartamentos.index}" data-slide="next">
                                        <span class="icon-next"></span>
                                    </a>
                                </div>
                                    <input type="hidden" name="precio" value="{$a['apartamento']->tarifaBase}">
                                    <input type="hidden" name="nombre" value="{$a['apartamento']->nombre}">
                                    <input type="hidden" name="lat" value="{$a['apartamento']->direccion->lat}">
                                    <input type="hidden" name="lon" value="{$a['apartamento']->direccion->lon}">
                                <div class="row acciones-apto">
                                    <div class="col-md-6">
                                        <span class="priceApto">{$a['precio_base']}</span>
                                        <span>Por&nbsp;noche</span>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <a href="{$base_url}/apartamento/id:{$a['apartamento']->idApartamento}" class="btn btn-success">Resérvalo</a>
                                    </div>
                                </div>
                            </div>
                            </div>
                            {if $smarty.foreach.apartamentos.iteration % 2 == 0 || $smarty.foreach.apartamentos.last}
                            </div>
                            {/if}
                        {/foreach}
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
{/block}
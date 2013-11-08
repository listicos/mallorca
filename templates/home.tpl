{extends file="index.tpl"}

{block name="script" append}
    <!--<script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>-->
    <script src="{$template_url_s}/js/home.js"></script>
    <script>
        var minPrice = {$minPrice};
        var maxPrice = {$maxPrice};
    </script>
    <script type="text/javascript" src="{$template_url_s}/js/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
    <script type="text/javascript" src="{$template_url_s}/js/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
    <script type="text/javascript" src="{$template_url_s}/js/fancybox/jquery.easing.1.2.js"></script>
    <script type="text/javascript" src="{$template_url_s}/js/fancybox/slider.js"></script>
{/block}

{block name="style" append}
<link href="{$template_url_s}/css/home.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{$template_url_s}/css/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
<link type="text/css" href="{$template_url_s}/css/fancybox/fancymoves.css" media="screen" charset="utf-8" rel="stylesheet"  />
{/block}

{block name="content" append}
<div class="container-liquid header">
    <div class="row">
        <div class="carousel slide"  id="header-slider">
            <ol class="carousel-indicators">
                <li data-target="#header-slider" data-slide-to="0" class="active"></li>
                <li data-target="#header-slider" data-slide-to="1"></li>
                <li data-target="#header-slider" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="item active">
                    <img src="{$template_url_s}/img/slider/1.jpg" alt="Photo 1">
                </div>
                <div class="item">
                    <img src="{$template_url_s}/img/slider/2.jpg" alt="Photo 2">
                    <div class="carousel-caption">
                    </div>
                </div>
                <div class="item">
                    <img src="{$template_url_s}/img/slider/3.jpg" alt="Photo 3">
                    <div class="carousel-caption">
                    </div>
                </div>
                <div class="item">
                    <img src="{$template_url_s}/img/slider/4.jpg" alt="Photo 4">
                    <div class="carousel-caption">
                    </div>
                </div>
            </div>
            <div class="back-images layer-1"></div>
            <div class="back-images layer-2"></div>

            <a class="left carousel-control" href="#header-slider" data-slide="prev">
                <span class="icon-prev"></span>
            </a>
            <a class="right carousel-control" href="#header-slider" data-slide="next">
                <span class="icon-next"></span>
            </a>
        </div>
    </div>

    <div class="col-lg-5" id="main_filters_container">
        <h4 class="text-center">¿Cuando quieres ir?</h4>
        <div class="row-fluid">
            <form class="form-inline" role="form">
                  <div class="form-group col-sm-3">
                    <div id="dateStart" class="filter-inputs date datepicker date-start" data-date-format="dd-mm-yyyy">
                        <input size="16" class="col-lg-12" name="dateStart" type="text" value="{$dia_comienzo}" readonly>
                        <span class="add-on"><i class="glyphicon glyphicon-calendar icon-white"></i></span>
                    </div>
                  </div>
                  <div class="form-group col-sm-3">
                    <div id="dateEnd" class="filter-inputs date datepicker date-end" data-date-format="dd-mm-yyyy">
                        <input size="16" class="col-lg-12" name="dateEnd" type="text" value="{$dia_comienzo}" readonly>
                        <span class="add-on"><i class="glyphicon glyphicon-calendar icon-white"></i></span>
                    </div>
                  </div>
                  <div class="form-group col-sm-3">
                      <select class="form-control" data-style="btn-defualt"  title="Huéspedes" name="huespedes">
                          <option value="1" >1 Huésped</option>
                          <option value="2">2 Huéspedes</option>
                          <option value="3">3 Huépedes</option>
                          <option value="4">4 Huépedes</option>
                          <option value="5">5+ Huépedes</option>
                    </select>
                  </div>
                  <div class="form-group col-sm-3">
                      <input type="hidden" name="action" value="buscar">
                    <button type="submit" class="btn btn-default form-control btn-success">Buscar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="container-liquid  content body-content">
    <div class="row" id="visitados-container">
        <legend class="title">Mis Ofertas Visitadas</legend>
        <div id="visitados" class="scroll-pane">
            {foreach from=$apartamentos name=apto item=a}
                <div class="result-item">
                    
                    <div class="visitados picture">
                        
                        <img src="{$template_url}{$a['adjuntos'][0]->ruta}" width="360px" height="300px" alt="{$a['apartamento']->nombre}">                                    
                                                
                    </div>
                        
                    <div class="row acciones-apto">
                        <div class="col-md-6">
                            <span class="priceApto">&euro;{$a['apartamento']->tarifaBase|number_format:2:",":"."}</span>
                            <span>Por&nbsp;noche</span>
                        </div>

                        <div class="col-md-6">
                            <a href="{$base_url}/apartamento/id:{$a['apartamento']->idApartamento}" class="btn btn-success">Resérvalo</a>
                        </div>
                    </div>
                    
                </div>
            {/foreach}
        </div>
    </div>
    <!--
    <div class="row">
        <div class="col-sm-5 main-left-container hidden-xs hidden-sm">
            <div class="row"  id="mapa">
                <div id="details-map-location"></div>
            </div>
        </div>
        <div class="col-md-7 main-right-container">
            <div class="row">
                <div class="col-lg-12 filters-row">
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
                                        {foreach name=adjuntos from=$a['adjuntos'] item=b}
                                            <div class="item {if $smarty.foreach.adjuntos.first}active{/if}">
                                                <img src="{$template_url}{$b->ruta}" alt="{$a['apartamento']->nombre}" width="378px" height="284px">
                                                <div class="carousel-caption">
                                                    <p>{$a['apartamento']->nombre}</p>
                                                    {if count($a['opiniones'])}
                                                    <span class="comments-icon">{count($a['opiniones'])}</span>
                                                    {/if}
                                                </div>
                                                
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
                                        <span class="priceApto">&euro;{$a['apartamento']->tarifaBase|number_format:2:",":"."}</span>
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
        
    </div>-->
</div>
{/block}
{extends file="index.tpl"}

{block name="script" append}
    <script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>
    <script src="{$template_url_s}/js/home.js"></script>
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
                    <img src="{$template_url_s}/img/header_1.png" alt="Photo 1">
                </div>
                <div class="item">
                    <img src="{$template_url_s}/img/header_2.png" alt="Photo 2">
                    <div class="carousel-caption">

                    </div>
                </div>
                <div class="item">
                    <img src="{$template_url_s}/img/header_3.png" alt="Photo 3">
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
                  <div class="form-group">
                    <div id="dateStart" class="filter-inputs date datepicker date-start" data-date-format="dd-mm-yyyy">
                        <input size="16" class="col-lg-12" name="dateStart" type="text" value="{$dia_comienzo}" readonly>
                        <span class="add-on"><i class="glyphicon glyphicon-calendar icon-white"></i></span>
                    </div>
                  </div>
                  <div class="form-group">
                    <div id="dateEnd" class="filter-inputs date datepicker date-end" data-date-format="dd-mm-yyyy">
                        <input size="16" class="col-lg-12" name="dateEnd" type="text" value="{$dia_comienzo}" readonly>
                        <span class="add-on"><i class="glyphicon glyphicon-calendar icon-white"></i></span>
                    </div>
                  </div>
                  <div class="form-group">
                    <select class="form-control" data-style="btn-defualt"  title="Huéspedes">
                        <option>1 Huésped</option>
                        <option>2 Huéspedes</option>
                        <option>3 Huépedes</option>
                        <option>4 Huépedes</option>
                        <option>5+ Huépedes</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-default form-control btn-primary">Buscar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="container-liquid  content">
    <div class="row">
        <div class="col-sm-5 main-left-container">
            <div class="row"  id="mapa">
                <div id="details-map-location"></div>
            </div>
        </div>
        <div class="col-sm-7 main-right-container">
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

                <div class="col-lg-12 filters-row">
                    <div class="row more-filters">
                        <div class="col-lg-6">
                            <a href="#" onclick="return false;" class="btn btn-default">Más filtros</a>
                        </div>
                        <div class="col-lg-6">
                            <p><span class="badge">12 anuncios</span> · Mallorca, Islas Baleares, España</p>
                        </div>
                    </div>
                    <div class="row result-list-container">
                        {foreach name=apartamentos from=$apartamentos item=a}
                            <div class="col-lg-6 result-item">
                                <div class="carousel slide"  id="result-slider-{$smarty.foreach.apartamentos.index}">
                                    <div class="carousel-inner">
                                        {foreach name=adjuntos from=$a['adjuntos'] item=b}
                                            <div class="item {if $smarty.foreach.adjuntos.first}active{/if}">
                                                <img src="{$template_url}{$b->ruta}" alt="{$a['apartamento']->nombre}">
                                                <div class="carousel-caption">
                                                    <p>
                                                    {$a['apartamento']->nombre}</p>
                                                    <span class="comments-icon">2</span>
                                                </div>
                                                <div class="add-to-wishlist"></div>
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
                            </div>
                        {/foreach}
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
{/block}
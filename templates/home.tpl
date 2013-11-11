{extends file="index.tpl"}

{block name="script" append}
    <script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>
    <script src="{$template_url_s}/js/home.js"></script>
    <script src="{$template_url_s}/js/jquery.mixitup.min.js"></script>
    <script>
        var minPrice = {$minPrice};
        var maxPrice = {$maxPrice};
        var disponibles = {$disponibles};
    </script>
    <!--<script type="text/javascript" src="{$template_url_s}/js/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
    <script type="text/javascript" src="{$template_url_s}/js/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
    <script type="text/javascript" src="{$template_url_s}/js/fancybox/jquery.easing.1.2.js"></script>
    <script type="text/javascript" src="{$template_url_s}/js/fancybox/slider.js"></script> -->
{/block}

{block name="style" append}
<link href="{$template_url_s}/css/home.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{$template_url_s}/css/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
<link type="text/css" href="{$template_url_s}/css/fancybox/fancymoves.css" media="screen" charset="utf-8" rel="stylesheet"  />
{/block}

{block name="content" append}
    <div class="container-liquid  content body-content home">
        <div class="row">
            <div class="col-sm-5">
                <div class="row form-horizontal filters-content" role="form">
                <div class="filtros-title">Tus Filtros</div>
                <form id="filtrosFrm">
                   <div class="search-slider-content">
                        <div class="form-inline" role="form">
                            <div class="form-group">
                                <label class="">Viaje</label>
                            </div>
                            <div class="form-group for_input">
                                <label class="sr-only" for="llegada">Llegada</label>
                                <input type="text" class="form-control date-start" id="llegada" name="dateStart" placeholder="Llegada">
                            </div>
                            <div class="form-group arrow_in_search"><img src="{$template_url_s}/img/icon-arrowR.png" alt="Photo 4"></div>
                            <div class="form-group for_input">
                                <label class="sr-only" for="llegada">Salida</label>
                                <input type="text" class="form-control date-end" id="llegada" name="dateEnd" placeholder="Salida">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="huesped">Llegada</label>
                                <select class="form-control" name="huespedes">
                                    <option value="1">1 Huésped</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 form-group">
                        <label class="control-label col-sm-4">Tipo de habitación</label>
                        <div class="col-sm-8">
                            <div class="btn-group separate-group" data-toggle="buttons">
                                <label class="btn btn-default">
                                  <input type="radio" name="options" id="option1">
                                  <div class="text-center">
                                      <img src="{$template_url_s}/img/icon-villas.png" alt="">
                                      <span>Villas</span>
                                  </div>
                                </label>
                                <label class="btn btn-default">
                                <input type="radio" name="options" id="option2">
                                <div class="text-center">
                                      <img src="{$template_url_s}/img/icon-rural.png" alt="">
                                      <span>Turismo rural</span>
                                  </div>
                              </label>
                            </div>
                            <div class="btn-group" data-toggle="buttons">
                              
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 form-group">
                        <label class="control-label col-sm-4">Servicios</label>
                        <div class="col-sm-8">
                            {foreach from=$categorias item=categoria name=categorias}
                                {foreach from=$categoria->instalaciones item=instalacion name=instalaciones}
                                    {if $smarty.foreach.instalaciones.iteration < 2}
                                    <div class="checkbox-inline">
                                        <input type="checkbox" class="" name="instalaciones[]" value="{$instalacion->idInstalacion}"/>
                                        {$instalacion->nombre}
                                    </div>
                                    {/if}
                                {/foreach}
                            {/foreach} 
                            <!--
                            <div class="checkbox-inline">
                                <input type="checkbox" class="" />
                                TV
                            </div>
                            <div class="checkbox-inline">
                                <input type="checkbox" class="" />
                                Cocina
                            </div>-->
                            <div class="checkbox-inline more-checkbox">
                                <a href="#" class="btn btn-default">MAS</a>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-sm-12 form-group">
                        <label class="control-label col-sm-4">Tipo de propiedad</label>
                        <div class="col-sm-8">
                            {foreach from=$tiposApartamento item=tipo}
                                <div class="checkbox-inline">
                                    <input type="checkbox" class="" name="tiposApartamento[]" value="{$tipo->idApartamentosTipo}" />
                                    {$tipo->nombre}
                                </div>
                            {/foreach}
                            <!--
                            <div class="checkbox-inline">
                                <input type="checkbox" class="" />
                                Casa
                            </div>
                            <div class="checkbox-inline">
                                <input type="checkbox" class="" />
                                Bed & Breakfast
                            </div>
                            <div class="checkbox-inline more-checkbox">
                                <a href="#" class="btn btn-default">MAS</a>
                            </div>
                            -->
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
            <div class="col-sm-7">
                <div class="row home-main-slider">
                    <!--
                    <div class="col-md-12">
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
                    -->
                </div>
                <div id="resultados" class="row result-list-container">
                    {foreach from=$apartamentos item=a name=apartamentos}
                    <div class="col-lg-12 mix apto" data-name="{$a['apartamento']->nombre}" data-price="{$a['apartamento']->tarifaBase}">
                        <div class=" result-item">
                            <div>
                                <div class="carrusel">
                                    <div class="carousel slide"  id="result-slider-{$smarty.foreach.apartamentos.iteration}">
                                        <div class="carousel-inner">
                                            {foreach from=$a['adjuntos'] item=adjunto name=adjuntos}
                                            <div class="item {if $smarty.foreach.adjuntos.first}active{/if}">
                                                <img src="{$template_url}{$adjunto->ruta}" alt="">
                                                <div class="carousel-caption">
                                                    <!--<p>{$a['apartamento']->nombre}</p>-->
                                                    {if count($a['opiniones'])}
                                                    <span class="comments-icon">{count($a['opiniones'])}</span>
                                                    {/if}
                                                </div>
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
                                                <ul>
                                                    <li>
                                                        {$a['apartamento']->nombre}
                                                    </li>
                                                    <li>
                                                        {$a['apartamento']->tipo}
                                                    </li>
                                                    <li>
                                                        Max. ocupaci&oacute;n {$a['apartamento']->capacidadPersonas}
                                                    </li>
                                                </ul>
                                                <!--<a href="{$base_url}/apartamento/id:{$a['apartamento']->idApartamento}" class="btn btn-success book-it">Reserva inmediata</a>-->
                                                <input type="hidden" name="precio" value="{$a['apartamento']->nombre}">
                                                <input type="hidden" name="nombre" value="{$a['apartamento']->tarifaBase}">
                                                <input type="hidden" name="lat" value="{$a['apartamento']->direccion->lat}">
                                                <input type="hidden" name="lon" value="{$a['apartamento']->direccion->lon}">
                                            </div>
                                        

                                            <div class="price-apto">
                                                <p class="priceApto">{$a['apartamento']->tarifaBase|number_format:2:",":"."}<small>&euro;</small></p>
                                                <p class="text-muted">Por&nbsp;noche</p>
                                            </div>
                                        
                                    
                                </div>
                            </div>
                            <div>
                                <div>
                                    <div class="apartamento-descripcion">
                                        {$a['apartamento']->descripcionLarga}
                                    </div>
                                    <div class="apartamento-calendario" >
                                        <input type="hidden" name="disponibilidades" value='{$a['disponibilidades']}'>
                                        <div class="calendario"></div>
                                    </div>
                                </div>
                                <div class="acciones-disponibilidad">
                                    <span><a class="ver-disponibilidad" href="javascript:void(0)">Ver disponibilidad</a></span>
                                    <a href="{$base_url}/apartamento/id:{$a['apartamento']->idApartamento}" class="btn btn-success book-it">Reserva inmediata</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    {/foreach}           
                     
                    
                </div>
            </div>
        </div>
    </div>
{/block}
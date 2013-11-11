{extends file="index.tpl"}

{block name="script" append}
    <script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>
    <script src="{$template_url_s}/js/home.js"></script>
    <script src="{$template_url_s}/js/jquery.mixitup.min.js"></script>
    <script>
        var minPrice = {$minPrice};
        var maxPrice = {$maxPrice};
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
                   <div class="search-slider-content">
                        <div class="form-inline" role="form">
                            <div class="form-group">
                                <label class="">Viaje</label>
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="llegada">Llegada</label>
                                <input type="text" class="form-control" id="llegada" placeholder="Llegada">
                            </div>
                            <div class="form-group arrow_in_search"><img src="{$template_url_s}/img/icon-arrowR.png" alt="Photo 4"></div>
                            <div class="form-group">
                                <label class="sr-only" for="llegada">Salida</label>
                                <input type="text" class="form-control" id="llegada" placeholder="Salida">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="huesped">Llegada</label>
                                <select class="form-control">
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
                            <div class="checkbox-inline">
                                <input type="checkbox" class="" />
                                Internet inalámbrico
                            </div>
                            <div class="checkbox-inline">
                                <input type="checkbox" class="" />
                                TV
                            </div>
                            <div class="checkbox-inline">
                                <input type="checkbox" class="" />
                                Cocina
                            </div>
                            <div class="checkbox-inline more-checkbox">
                                <a href="#" class="btn btn-default">MAS</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 form-group">
                        <label class="control-label col-sm-4">Tipo de propiedad</label>
                        <div class="col-sm-8">
                            <div class="checkbox-inline">
                                <input type="checkbox" class="" />
                                Apartamento
                            </div>
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
                        </div>
                    </div>
                </div>
                <div class="row" id="mapa">
                    <div class="col-md-12">
                        <div id="details-map-location"></div>
                    </div>
                </div>
            </div>
            <div class="col-sm-7">
                <div class="row home-main-slider">
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
                </div>
                <div id="resultados" class="row result-list-container">
                    
                    <div class="col-lg-6 mix apto" data-name="Nombre del apartamento 1" data-price="21,00">
                        <div class=" result-item">
                            <div class="carousel slide"  id="result-slider-1">
                                <div class="carousel-inner">
                                    
                                    <div class="item active">
                                        <img src="{$template_url_s}/img/slide_1.png" alt="">
                                        <div class="carousel-caption">
                                            <a href="{$base_url}/apartamento/id:{$a['apartamento']->idApartamento}" class="btn btn-success book-it">Reserva inmediata</a>
                                            <p>Nombre del apartamento</p>
                                            <span class="comments-icon">2</span>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <img src="{$template_url_s}/img/slide_2.png" alt="">
                                        <div class="carousel-caption">
                                            <a href="{$base_url}/apartamento/id:{$a['apartamento']->idApartamento}" class="btn btn-success book-it">Reserva inmediata</a>
                                            <p>Nombre del apartamento</p>
                                            <span class="comments-icon">2</span>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <img src="{$template_url_s}/img/slide_2.png" alt="">
                                        <div class="carousel-caption">
                                            <a href="{$base_url}/apartamento/id:{$a['apartamento']->idApartamento}" class="btn btn-success book-it">Reserva inmediata</a>
                                            <p>Nombre del apartamento</p>
                                            <span class="comments-icon">2</span>
                                        </div>
                                    </div>

                                    
                                </div>
                                <div class="back-images layer-1"></div>
                                <div class="back-images layer-2"></div>

                                <a class="left carousel-control" href="#result-slider-1" data-slide="prev">
                                    <span class="icon-prev"></span>
                                </a>
                                <a class="right carousel-control" href="#result-slider-1" data-slide="next">
                                    <span class="icon-next"></span>
                                </a>
                            </div>
                                <input type="hidden" name="precio" value="">
                                <input type="hidden" name="nombre" value="">
                                <input type="hidden" name="lat" value="">
                                <input type="hidden" name="lon" value="">
                            <div class="row acciones-apto">
                                <div class="col-xs-8 text-left">
                                    <img src="{$template_url_s}/img/pattern_1.jpg"  class="thumbnail" alt="" height="50">
                                    <span class="text-muted text-apto">Casa/apto. entero</span>
                                </div>

                                <div class="col-xs-4 price-apto">
                                    <p class="priceApto">16,00<small>&euro;</small></p>
                                    <p class="text-muted">Por&nbsp;noche</p>
                                </div>
                            </div>
                        </div>
                    </div>
                                
                     <div class="col-lg-6 mix apto" data-name="Nombre del apartamento 2" data-price="19,00">
                        <div class=" result-item">
                            <div class="carousel slide"  id="result-slider-2">
                                <div class="carousel-inner">
                                    
                                    <div class="item active">
                                        <img src="{$template_url_s}/img/slide_1.png" alt="">
                                        <div class="carousel-caption">
                                            <a href="{$base_url}/apartamento/id:{$a['apartamento']->idApartamento}" class="btn btn-success book-it">Reserva inmediata</a>
                                            <p>Nombre del apartamento</p>
                                            <span class="comments-icon">2</span>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <img src="{$template_url_s}/img/slide_2.png" alt="">
                                        <div class="carousel-caption">
                                            <a href="{$base_url}/apartamento/id:{$a['apartamento']->idApartamento}" class="btn btn-success book-it">Reserva inmediata</a>
                                            <p>Nombre del apartamento</p>
                                            <span class="comments-icon">2</span>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <img src="{$template_url_s}/img/slide_2.png" alt="">
                                        <div class="carousel-caption">
                                            <a href="{$base_url}/apartamento/id:{$a['apartamento']->idApartamento}" class="btn btn-success book-it">Reserva inmediata</a>
                                            <p>Nombre del apartamento</p>
                                            <span class="comments-icon">2</span>
                                        </div>
                                    </div>

                                    
                                </div>
                                <div class="back-images layer-1"></div>
                                <div class="back-images layer-2"></div>

                                <a class="left carousel-control" href="#result-slider-2" data-slide="prev">
                                    <span class="icon-prev"></span>
                                </a>
                                <a class="right carousel-control" href="#result-slider-2" data-slide="next">
                                    <span class="icon-next"></span>
                                </a>
                            </div>
                                <input type="hidden" name="precio" value="">
                                <input type="hidden" name="nombre" value="">
                                <input type="hidden" name="lat" value="">
                                <input type="hidden" name="lon" value="">
                            <div class="row acciones-apto">
                                <div class="col-xs-8 text-left">
                                    <img src="{$template_url_s}/img/pattern_1.jpg"  class="thumbnail" alt="" height="50">
                                    <span class="text-muted text-apto">Casa/apto. entero</span>
                                </div>

                                <div class="col-xs-4 price-apto">
                                    <p class="priceApto">16,00<small>&euro;</small></p>
                                    <p class="text-muted">Por&nbsp;noche</p>
                                </div>
                            </div>
                        </div>
                    </div>
                                
                    <div class="col-lg-6 mix apto" data-name="Nombre del apartamento 3" data-price="15,00">
                        <div class=" result-item">
                            <div class="carousel slide"  id="result-slider-3">
                                <div class="carousel-inner">
                                    
                                    <div class="item active">
                                        <img src="{$template_url_s}/img/slide_1.png" alt="">
                                        <div class="carousel-caption">
                                            <a href="{$base_url}/apartamento/id:{$a['apartamento']->idApartamento}" class="btn btn-success book-it">Reserva inmediata</a>
                                            <p>Nombre del apartamento</p>
                                            <span class="comments-icon">2</span>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <img src="{$template_url_s}/img/slide_2.png" alt="">
                                        <div class="carousel-caption">
                                            <a href="{$base_url}/apartamento/id:{$a['apartamento']->idApartamento}" class="btn btn-success book-it">Reserva inmediata</a>
                                            <p>Nombre del apartamento</p>
                                            <span class="comments-icon">2</span>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <img src="{$template_url_s}/img/slide_2.png" alt="">
                                        <div class="carousel-caption">
                                            <a href="{$base_url}/apartamento/id:{$a['apartamento']->idApartamento}" class="btn btn-success book-it">Reserva inmediata</a>
                                            <p>Nombre del apartamento</p>
                                            <span class="comments-icon">2</span>
                                        </div>
                                    </div>

                                    
                                </div>
                                <div class="back-images layer-1"></div>
                                <div class="back-images layer-2"></div>

                                <a class="left carousel-control" href="#result-slider-3" data-slide="prev">
                                    <span class="icon-prev"></span>
                                </a>
                                <a class="right carousel-control" href="#result-slider-3" data-slide="next">
                                    <span class="icon-next"></span>
                                </a>
                            </div>
                                <input type="hidden" name="precio" value="">
                                <input type="hidden" name="nombre" value="">
                                <input type="hidden" name="lat" value="">
                                <input type="hidden" name="lon" value="">
                            <div class="row acciones-apto">
                                <div class="col-xs-8 text-left">
                                    <img src="{$template_url_s}/img/pattern_1.jpg"  class="thumbnail" alt="" height="50">
                                    <span class="text-muted text-apto">Casa/apto. entero</span>
                                </div>

                                <div class="col-xs-4 price-apto">
                                    <p class="priceApto">16,00<small>&euro;</small></p>
                                    <p class="text-muted">Por&nbsp;noche</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
{/block}
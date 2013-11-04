{extends file="index.tpl"}

{block name="script" append}
    <script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>
    <script src="{$template_url}/js/apartamento.js"></script>
{/block}

{block name="style" append}
<link href="{$template_url_s}/css/apartamento.css" rel="stylesheet">
{/block}

{block name="content" append}
       <div class="container row-fluid">
            <div class="titulo row-fluid">
                <div class="col-xs-12">
                    <h2>{$apartamento['apartamento']->nombre}</h2>
                </div>
            </div>
            <div class="sub-titulo row-fluid"> 
                <div class="col-xs-12">      
                    <h5>
                        <a href="" class="property-type">{$apartamento['apartamento']->tipo->nombre}</a>
                        <input type="hidden" name="lat" value="{$apartamento['direccion']->lat}">
                        <input type="hidden" name="lon" value="{$apartamento['direccion']->lon}">
                        <span class="middot">·</span>
                        <span id="display-address" data-location="Riviera Maya, Cancun, Quintana Roo, México">
                            {$apartamento['direccion']->provincia}, {$apartamento['direccion']->paisNombre}
                        </span>
                    </h5>
                </div>
            </div>
            <div class="contenedor-columnas row-fluid">
                <div class="columna-izquierda col-md-8">
                    <div class="container-fotos">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#carousel-apto"><font><font class="">Casa</font></font></a></li>
                            <li><a href="#mapaContainer"><font><font>Mapa</font></font></a></li>
                            <li><a href="#"><font><font class="">Calendario</font></font></a></li>
                        </ul>

                        <div id="carousel-apto" class="corousel_apartamentos">
                            <div id="carousel-example-captions" class="carousel slide bs-docs-carousel-example">
                                <ol class="carousel-indicators">
                                    {foreach from=$apartamento['adjuntos'] item=adjunto name=fotos}
                                    <li data-target="#carousel-example-captions" data-slide-to="{$smarty.foreach.fotos.iteration - 1}" class="{if $smarty.foreach.fotos.first}active{/if}"></li>
                                    
                                    {/foreach}
                                </ol>
                                <div class="carousel-inner">
                                    {foreach from=$apartamento['adjuntos'] item=adjunto name=fotos}
                                    <div class="item {if $smarty.foreach.fotos.first}active{/if}">
                                        <img data-src="holder.js/900x500/auto/#777:#777" src="{$template_url}/{$adjunto->ruta}" alt="900x500">
                                        <div class="carousel-caption">
                                            <!--<h3><font><font>Etiqueta de Primera diapositiva</font></font></h3>
                                            <p><font><font>Nulla vitae elit libero, un pharetra augue mollis Interdum.</font></font></p>-->
                                        </div>
                                    </div>
                                    {/foreach}
                                    
                                </div>
                                <a class="left carousel-control" href="#carousel-example-captions" data-slide="prev">
                                    <span class="icon-prev"></span>
                                </a>
                                <a class="right carousel-control" href="#carousel-example-captions" data-slide="next">
                                    <span class="icon-next"></span>
                                </a>
                            </div>
                        </div>
                                    
                        <div id="mapaContainer" class="mapaContainer ">
                            <div id="mapa"></div>
                        </div>
                                    
                        <div id="calendarioContainer" class="calendarioContainer ">
                            <div></div>
                        </div>
                    </div>


                    <div class="descripcion-servicios row-fluid">
                        <div class="servicios">
                            <div class="row-fluid">
                                <div class="bs-example bs-example-tabs">
                                    <ul id="myTab" class="nav nav-tabs">
                                        <li class="active"><a href="#descripcion" data-toggle="tab">Descripción</a></li>
                                        <li class=""><a href="#servicios" data-toggle="tab">Servicios</a></li>
                                        <li class=""><a href="#normas" data-toggle="tab">Normas de la casa</a></li>
                                    </ul>
                                    <div id="myTabContent" class="tab-content col-md-12">
                                        <div class="tab-pane fade active in row" id="descripcion">
                                            <p class="col-md-6"> {$apartamento['apartamento']->descripcionLarga} </p>
                                            <div class="col-md-6 tabla-descripcion">
                                                <table class="table table-bordered table-striped">
                                                    <tbody><tr>
                                                            <td>Tipo de habitación:</td>
                                                            <td class="value">{$apartamento['apartamento']->tipo->nombre}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Capacidad:</td>
                                                            <td class="value">{$apartamento['apartamento']->capacidadPersonas} personas</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Dormitorios:</td>
                                                            <td class="value">{$apartamento['apartamento']->habitaciones}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Camas:</td>
                                                            <td class="value">{$apartamento['apartamento']->camas}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Baños:</td>
                                                            <td class="value">{$apartamento['apartamento']->banio}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Personas adicionales:</td>
                                                            <td class="value"><span id="extra_people_price_string">Sin cargo</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Tarifa semanal:</td>
                                                            <td class="value"><span id="weekly_price_string">${$apartamento['apartamento']->tarifaSemana}</span> /semana</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Tarifa mensual:</td>
                                                            <td class="value"><span id="monthly_price_string">${$apartamento['apartamento']->tarifaMes}</span> /mes</td>
                                                        </tr>

                                                    </tbody></table>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="servicios">
                                            <ul class="unstyled col-md-4 pull-left">
                                                <li> <span class="glyphicon glyphicon-adjust"> Apto para fumadores</span></li>
                                                <li> <span class="glyphicon glyphicon-adjust"> Admite mascotas</span></li>
                                                <li> <span class="glyphicon glyphicon-adjust"> TV</span></li>
                                                <li> <span class="glyphicon glyphicon-adjust"> TV por satelite</span></li>
                                                <li> <span class="glyphicon glyphicon-adjust"> Internet  </span></li>
                                                <li> <span class="glyphicon glyphicon-adjust"> Internet inalámbrico (wifi)</span></li>
                                                <li> <span class="glyphicon glyphicon-adjust"> Aire acondicionado</span></li>
                                                <li> <span class="glyphicon glyphicon-adjust"> Calefacción</span></li>
                                            </ul>
                                            <ul class="unstyled col-md-4 pull-center">
                                                <li> <span class="glyphicon glyphicon-adjust"> Edificio con ascenso</span></li>
                                                <li> <span class="glyphicon glyphicon-adjust"> Acceso para discapacitados</span></li>
                                                <li> <span class="glyphicon glyphicon-adjust"> Piscina</span></li>
                                                <li> <span class="glyphicon glyphicon-adjust"> Cocina</span></li>
                                                <li> <span class="glyphicon glyphicon-adjust"> Parking incluido</span></li>
                                                <li> <span class="glyphicon glyphicon-adjust"> Portero</span></li>
                                                <li> <span class="glyphicon glyphicon-adjust"> Gimnasio</span></li>
                                                <li> <span class="glyphicon glyphicon-adjust"> Jacuzzi</span></li>
                                            </ul> 
                                            <ul class="unstyled col-md-4 pull-right">
                                                <li> <span class="glyphicon glyphicon-ban-circle"> Chimenea interior</span></li>
                                                <li> <span class="glyphicon glyphicon-adjust"> Timbre/Interfono inalámbrico</span></li>
                                                <li> <span class="glyphicon glyphicon-adjust"> Desayuno</span></li>
                                                <li> <span class="glyphicon glyphicon-adjust"> Apto para toda la familia</span></li>
                                                <li> <span class="glyphicon glyphicon-adjust"> Apto para eventos</span></li>
                                                <li> <span class="glyphicon glyphicon-adjust"> Lavadora</span></li>
                                                <li> <span class="glyphicon glyphicon-adjust"> Secadora</span></li>
                                                <li> <span class="glyphicon glyphicon-adjust"> Peluqueria</span></li>
                                            </ul>   
                                            <div class="delimiter"></div>
                                        </div>

                                        <div class="col-xs-12 row-fluid  tab-pane fade" id="normas">
                                            <p> {$apartamento['apartamento']->normas} </p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="row-fluid">
                                <div class="col-xs-12">
                                    &nbsp
                                </div>
                            </div>   
                        </div>
                        <div class="panel-titulo row-fluid">

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Comentarios</h3>
                                </div>
                                <div class="panel-body">
                                    {foreach from=$apartamento['opiniones'] item=opinion}
                                    <div class="contenido-comentarios1">
                                        <div class="panel-comentarios col-xs-2">
                                            <img data-src="holder.js/80x80" src="" class="img-thumbnail" alt="80x80" style="width: 80px; height: 80px;">
                                        </div>
                                        <div class="titulo-nombre col-xs-10">
                                            <a href="" class="review-author-link" title="{$opinion->usuario->nombre}">{$opinion->usuario->nombre}</a>
                                            <p>
                                                {$opinion->opinion}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="panel-dia">
                                        <p class="text-right"><strong>{$opinion->fechaCreacion}</strong></p>
                                    </div>
                                    {/foreach}
                                    


                                </div>
                                <div class="row-fluid col-xs-12">
                                    <!--<ul class="pagination">
                                        <li><a href="#">&laquo;</a></li>
                                        <li><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li><a href="#">5</a></li>
                                        <li><a href="#">&raquo;</a></li>
                                    </ul>-->
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>



                <div class="columna-derecha col-md-4">
                    <div class="contenedor-calendario panel panel-default">
                        <div class="panel-heading">
                            <h1 class="text-center panel-title">Tu reserva</h1>
                        </div>
                        <div class="panel-body">
                            <div class="contenedor-noche">
                                <div class="col-md-6">
                                    <strong>Desde</strong>  
                                </div>
                                <div class=" pull-right col-xs-6">

                                    <select class="form-control">
                                        <option>Por noche</option>
                                        <option>por semana</option>
                                        <option>Por mes</option>

                                    </select>
                                </div>
                            </div>
                            <div class="precio col-xs-12">
                                <h1>{$apartamento['apartamento']->tarifaBase|number_format:2:',':'.'}&euro;</h1>
                            </div>

                            <div class="contenedor-llegada row-fluid clearfix">
                                <form class="form-inline" role="form">
                                    <div class="form-group col-md-4">
                                        <label class="sr-only" for="exampleInputEmail2">llegada</label>
                                        <input type="text" class="form-control" id="date-start" placeholder="Llegada">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="sr-only" for="exampleInputEmail2">Salida</label>
                                        <input type="text" class="form-control" id="date-end" placeholder="Salida">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <select class="form-control col-md-4" name="huespedes">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                </form>       
                            </div>
                            <div class="contenido-calendario row-fluid">
                                <div class="button-reservalo col-md-12"><button type="button" class="btn btn-success btn-lg btn-block">Resérvalo</button></div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
{/block}
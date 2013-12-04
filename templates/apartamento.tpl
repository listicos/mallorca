{extends file="index.tpl"}

{block name="script" append}
    <script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>
    <script src="{$template_url_s}/js/apartamento.js"></script>
    <script src="{$template_url}/js/admin/calendar/app.js"></script>
    <script src="{$template_url}/js/admin/calendar/breakpoints.js"></script>
    <script src="{$template_url}/js/admin/calendar/calendar.js"></script>
    <script src="{$template_url}/js/admin/fullcalendar.min.js"></script>
    <script src="{$template_url}/js/admin/jquery.validationEngine.js"></script>
    <script src="{$template_url}/js/admin/jquery.validationEngine-es.js"></script>
    <script>
        var FECHAS_DISPONIBLES = {$disponibles};
    </script>
{/block}

{block name="style" append}
<link href="{$template_url_s}/css/apartamento.css" rel="stylesheet">
<link href="{$template_url}/css/admin/fullcalendar.css" rel="stylesheet">
<link href="{$template_url}/css/admin/validationEngine.jquery.css" rel="stylesheet">
{/block}

{block name="content" append}
       <div class="container row-fluid body-content">
            
            <div class="contenedor-columnas row-fluid">
                <div class="columna-izquierda col-md-8">
                    <div class="titulo row-fluid">
                        <h2>{$apartamento['apartamento']->nombre}</h2>
                    </div>
                    <div class="sub-titulo row-fluid"> 
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
                    <div class="container-fotos" id="tabs1">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#carousel-apto"><font><font class="">Casa</font></font></a></li>
                            <li><a href="#mapaContainer"><font><font>Mapa</font></font></a></li>
                            <li><a href="#calendarioContainer"><font><font class="">Calendario</font></font></a></li>
                        </ul>

                        <div id="carousel-apto" class="corousel_apartamentos">
                            <div class="flexslider">
                                <ul class="slides">
                                   {foreach from=$apartamento['adjuntos'] item=adjunto}                                   
                                      <li data-thumb="{$template_url}/{$adjunto->ruta}">
                                        <img src="{$template_url}/{$adjunto->ruta}">
                                      </li>
                                    {/foreach}
                                </ul>
                              </div>
                        </div>
                                    
                        <div id="mapaContainer" class="mapaContainer ">
                            <div id="mapa"></div>
                        </div>
                                    
                        <div id="calendarioContainer" class="calendarioContainer ">
                            <div class="col-md-8">
                                <div id="calendar" >
                                </div>
                                <div id="calendar-legend">
                                    <div class="leyenda disponible"></div><div>Disponible</div>
                                    <div class="leyenda no-disponible"></div><div>No Disponible</div>
                                    <div class="leyenda anterior"></div><div>No especificado</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <p>El calendario se actualiza cada 5 minutos y la disponibilidad no siempre es exacta.</p>
                                <p>Algunos anfitriones establecen precios personalizados para dias especificos de su calendario. Las tarifas son por día y no incluyen gastos de limpieza ni el precio por persona adicional que el anfitrion puede establecer para su alojamiento. Si quieres obtener mas informacion lee la descripcion del anuncio.</p>
                                <p>Te recomendamos que te pongas en contacto con el anfitrion para confirmar la disponibilidad y las tarifas antes de enviar una solicitud de reserva.</p>
                            </div>
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
                                            <div class="col-md-12"> {$apartamento['apartamento']->descripcionLarga} </div>
                                            <!--<div class="col-md-6 tabla-descripcion">
                                                <table class="table table-bordered table-striped">
                                                    <tbody>
                                                        <tr>
                                                            <td>Alojamiento:</td>
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
                                            </div>-->
                                        </div>
                                        <div class="tab-pane fade" id="servicios">
                                            <ul class="unstyled pull-left">
                                            {foreach from=$apartamento['instalaciones'] item=instalacion name=servicios}
                                                
                                            
                                                <li> <img src="{$template_url_s}/img/tick.png"> {$instalacion->nombre}</li>
                                                
                                            {/foreach}
                                            </ul>
                                            <div class="delimiter"></div>
                                        </div>

                                        <div class="col-xs-12 row-fluid  tab-pane fade" id="normas">
                                            <p> {$apartamento['apartamento']->normas} </p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        {if count($apartamento['opiniones'])}
                        <br />
                        <div class="panel-titulo row-fluid">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h1 class="text-center panel-title">Comentarios</h1>
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
                            </div>  
                        </div>
                        {/if}
                    </div>
                </div>
                <div class="columna-derecha col-md-4 contenedor-calendario-right">
                    <div class="contenedor-calendario panel panel-default">
                        <div class="panel-heading">
                            <h1 class="text-center panel-title">Tu reserva</h1>
                        </div>
                        <div class="panel-body">
                            <form class="form-inline" role="form" id="reservaForm">
                            <div class="contenedor-llegada row-fluid clearfix">
                                    <div class="form-group col-md-4">
                                        <label class="" for="fechaInicio">Llegada</label>
                                        <input type="text" readonly="true" class="form-control validate[required]" id="fechaInicio" value="{if $entrada}{$entrada|date_format:"%e-%m-%Y"}{/if}" placeholder="Llegada" name="fechaInicio">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="" for="fechaFinal">Salida</label>
                                        <input type="text" readonly="true" class="form-control validate[required]" id="fechaFinal" value="{if $salida}{$salida|date_format:"%e-%m-%Y"}{/if}" placeholder="Salida" name="fechaFinal">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="" for="huespedes">Personas</label>
                                        <select class="form-control col-md-4" name="huespedes">
                                            <option {if $huespedes eq 1}selected{/if}>1</option>
                                            <option {if $huespedes eq 2}selected{/if}>2</option>
                                            <option {if $huespedes eq 3}selected{/if}>3</option>
                                            <option {if $huespedes eq 4}selected{/if}>4</option>
                                            <option {if $huespedes eq 5}selected{/if}>5</option>
                                            <option {if $huespedes eq 6}selected{/if}>6</option>
                                            <option {if $huespedes eq 7}selected{/if}>7</option>
                                            <option {if $huespedes eq 8}selected{/if}>8</option>
                                            <option {if $huespedes eq 9}selected{/if}>9</option>
                                            <option {if $huespedes eq 10}selected{/if}>10</option>
                                            <option {if $huespedes eq 11}selected{/if}>11</option>
                                            <option {if $huespedes eq 12}selected{/if}>12</option>
                                            <option {if $huespedes eq 13}selected{/if}>13</option>
                                            <option {if $huespedes eq 14}selected{/if}>14</option>
                                            <option {if $huespedes eq 15}selected{/if}>15</option>
                                        </select>
                                        <input type="hidden" name="idApartamento" value="{$apartamento['apartamento']->idApartamento}">
                                    </div>
                                     
                            </div>
                            <div class="row-fluid">
                                <div class="precio text-right col-md-12">
                                    <div class="total-precio-reserva" style="display: none;">
                                        <h4 class="text-right">Total <span>{$menor_precio}</span></h4>
                                        <small class="text-right">Impuestos y tasas incuidas<br />Sujeto a disponibilidad</small>
                                    </div>
                                    <div class="row desde-precio-reserva" style="display: none;">
                                        <div class="col-md-12">
                                            <h4>Desde <span>{$menor_precio}</span> - hasta <span>{$menor_precio}</span></h4>
                                            <small>impuestos y tasas incuidas, sujeto a disponibilidad</small>
                                        </div>
                                    </div>
                                </div>
                                            
                                <div class="contenido-calendario col-md-12">
                                    <div class="button-reservalo col-md-12"><button type="submit" class="btn btn-success btn-lg btn-block">Resérvalo</button></div>
                                </div>
                                            
                                <div class="reserva-hotel-detalles">
                                    <h4>{$apartamento['apartamento']->nombre}</h4>
                                    <table class="table table-striped table-bordered">
                                        <tr>
                                            <td>Tipo de alojamiento:</td>
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
                                    </table>
                                </div>
                                            
                            </div>
                            </form>  
                        </div>
                    </div>
                                    
                    <div id="cercanos" class="contenedor-calendario panel panel-default">
                        <div class="panel-heading">
                            <h1 class="text-center panel-title">Anuncios similares</h1>
                        </div>
                        <div class="panel-body">
                            {foreach from=$apartamento['sugerencias'] item=sugerencia}
                            <div class="row">
                                <div class="col-md-5">
                                    <a href="{$base_url}/apartamento/id:{$sugerencia->idApartamento}"><img src="{$sugerencia->adjuntoImg}" class="sugerencia-picture"></a>
                                </div>
                                <div class="col-md-7">
                                    <span><a href="{$base_url}/apartamento/id:{$sugerencia->idApartamento}"><strong>{$sugerencia->nombre}</strong></a></span><br/>
                                    <span class="distancia">a {$sugerencia->distancia} km de distancia</span><br/>
                                    <span>{$sugerencia->precio_base}</span><br/>                                    
                                </div>
                            </div>
                            {/foreach}
                        </div>
                    </div>
                </div> 
            </div>
        </div>
{/block}
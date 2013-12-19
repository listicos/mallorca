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
            <div class="columna-izquierda col-md-12">
                <ol class="breadcrumb">
                  <li><a href="{$base_url}">{#inicio#}</a></li>
                  <li class="active">{$apartamento['apartamento']->nombre}</li>
                </ol>
            </div>
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
                            <li class="active"><a href="#carousel-apto"><font><font class="">{#casa#}</font></font></a></li>
                            <li><a href="#mapaContainer"><font><font>{#mapa#}</font></font></a></li>
                            <li><a href="#calendarioContainer"><font><font class="">{#calendario#}</font></font></a></li>
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
                                    <div class="leyenda disponible"></div><div>{#disponible#}</div>
                                    <div class="leyenda no-disponible"></div><div>{#no_disponible#}</div>
                                    <div class="leyenda anterior"></div><div>{#no_especificado#}</div>
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
                                        <li class="active"><a href="#descripcion" data-toggle="tab">{#descripcion#}</a></li>
                                        <li class=""><a href="#servicios" data-toggle="tab">{#servicios#}</a></li>
                                        <li class=""><a href="#normas" data-toggle="tab">{#normas_de_la_casa#}</a></li>
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
                                    <h1 class="text-center panel-title">{#comentarios#}</h1>
                                </div>
                                <div class="panel-body">
                                    {foreach from=$apartamento['opiniones'] item=opinion}
                                    <div class="contenido-comentarios1">
                                        <div class="titulo-nombre col-xs-12">
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
                            <h1 class="text-center panel-title">{#tu_reserva#}</h1>
                        </div>
                        <div class="panel-body">
                            <form class="form-inline" role="form" id="reservaForm">
                            <div class="contenedor-llegada row-fluid clearfix">
                                    <div class="form-group col-md-4">
                                        <label class="" for="fechaInicio">{#llegada#}</label>
                                        <input type="text" readonly="true" class="form-control validate[required]" id="fechaInicio" value="{if $entrada}{$entrada|date_format:"%e-%m-%Y"}{/if}" placeholder="Llegada" name="fechaInicio">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="" for="fechaFinal">{#salida#}</label>
                                        <input type="text" readonly="true" class="form-control validate[required]" id="fechaFinal" value="{if $salida}{$salida|date_format:"%e-%m-%Y"}{/if}" placeholder="Salida" name="fechaFinal">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="" for="huespedes">{#personas#}</label>
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
                                        <h4 class="text-right">{#total#} <span>{$menor_precio}</span></h4>
                                        <small class="text-right">{#impuestos_y_tasas_incuidas#}<br />{#sujeto_a_disponibilidad#}</small>
                                    </div>

                                    {if count($disponibles)>0}
                                    <div class="row desde-precio-reserva" style="display: none;">
                                        <div class="col-md-12">
                                            <h4>{#desde#} <span>{$menor_precio}</span> - {#hasta#} <span>{$menor_precio}</span></h4>
                                            <small>{#impuestos_y_tasas_incluidas_sujeto_a_disponibilidad#}</small>
                                        </div>
                                    </div>
                                    {/if}

                                </div>
                                            
                                <div class="contenido-calendario col-md-12">
                                    <div class="button-reservalo col-md-12"><button type="submit" class="btn btn-success btn-lg btn-block">{#reservalo#}</button></div>
                                    
                                    <div class="button-pregunta col-md-12"><a href="javascript:void(0)" id="make_a_question" class="btn btn-info btn-xs btn-block">¿Tienes una pregunta?</a></div>
                                </div>
                                            
                                <div class="reserva-hotel-detalles">
                                    <h4>{$apartamento['apartamento']->nombre}</h4>
                                    <table class="table table-striped table-bordered">
                                        <tr>
                                            <td>{#tipo_de_alojamiento#}</td>
                                            <td class="value">{$apartamento['apartamento']->tipo->nombre}</td>
                                        </tr>
                                        <tr>
                                            <td>{#capacidad#}</td>
                                            <td class="value">{$apartamento['apartamento']->capacidadPersonas} {#personas#}</td>
                                        </tr>
                                        <tr>
                                            <td>{#dormitorios#}</td>
                                            <td class="value">{$apartamento['apartamento']->habitaciones}</td>
                                        </tr>
                                        <tr>
                                            <td>{#camas#}</td>
                                            <td class="value">{$apartamento['apartamento']->camas}</td>
                                        </tr>
                                        <tr>
                                            <td>{#banios#}</td>
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
                            <h1 class="text-center panel-title">{#anuncios_similares#}</h1>
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
    <div class="modal fade" id="make_question_modal">
    <div class="modal-dialog">
        <div class="modal-content">
        <form id="make-question-form">
             <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Realiza tu pregunta sobre [<b>{$apartamento['apartamento']->nombre}</b>]</h4>
            </div>
            <div class="modal-body">
                
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label for="nombre_viajero">Nombre/s:</label>
                            <input type="text" name="nombre" class="form-control validate[required]" placeholder="Nombre/s">
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="apellidos">Apellido/s:</label>
                            <input type="text" name="apellidos" class="form-control validate[required]" placeholder="Apellido/s">
                        </div>
                    </div>
                    <div class="row">
                         <div class="col-sm-6 form-group">
                             <label for="email">Correo eletrónico:</label>
                             <input type="text" name="email" class="form-control validate[required, custom[email]]" placeholder="Correo electrónico">
                         </div>
                         <div class="col-sm-6 form-group">
                             <label for="telefono">Teléfono de contacto:</label>
                             <input type="text" name="telefono" class="form-control validate[required, custom[confirmationEmail]]" placeholder="Teléfono de contacto">
                         </div>
                    </div>
                    <div class="row-fluid form-group">
                        <label for="mensaje">Mensaje:</label>
                        <textarea name="mensaje" class="form-control"></textarea>
                    </div>
                    <input type="hidden" name="idApartamento" value="{$apartamento['apartamento']->idApartamento}">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-info" id="btn-send-question">Enviar pregunta</button>
            </div>
            </form>
        </div>
    </div>
</div>
{/block}
{extends file="index.tpl"}

{block name="script" append}
    <script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>
    <script src="{$template_url_s}/js/complejo.js"></script>
    <script src="{$template_url}/js/admin/calendar/app.js"></script>
    <script src="{$template_url}/js/admin/calendar/breakpoints.js"></script>
    <script src="{$template_url}/js/admin/calendar/calendar.js"></script>
    <script src="{$template_url}/js/admin/fullcalendar.min.js"></script>
    <script src="{$template_url}/js/admin/jquery.validationEngine.js"></script>
    <script src="{$template_url}/js/admin/jquery.validationEngine-es.js"></script>
    <script>
        //var FECHAS_DISPONIBLES = {$disponibles};
    </script>
{/block}

{block name="style" append}
<link href="{$template_url_s}/css/apartamento.css" rel="stylesheet">
<link href="{$template_url_s}/css/complejo.css" rel="stylesheet">
<link href="{$template_url}/css/admin/fullcalendar.css" rel="stylesheet">
<link href="{$template_url}/css/admin/validationEngine.jquery.css" rel="stylesheet">
{/block}

{block name="content" append}
       <div class="container row-fluid body-content">
            
            <div class="contenedor-columnas row-fluid">
            <div class="columna-izquierda col-md-12">
                <ol class="breadcrumb">
                  <li><a href="{$base_url}/agroturismo">{#complejos#}</a></li>
                  <li class="active">{$complejo['nombre']}</li>
                </ol>
            </div>
                <div class="columna-izquierda col-md-8">
                    <div class="titulo row-fluid">
                        <h2>{$complejo['nombre']}</h2>
                    </div>
                    <div class="sub-titulo row-fluid"> 
                        <h5>
                            <input type="hidden" name="idComplejo" value="{$complejo['id_complejo']}">
                            <input type="hidden" name="lat" value="{$complejo['lat']}">
                            <input type="hidden" name="lon" value="{$complejo['lon']}">
                            <span class="middot">·</span>
                            <span id="display-address" data-location="{$complejo['direccion']}">
                                {$complejo['direccion']}
                            </span>
                        </h5>
                    </div>
                    <div class="container-fotos" id="tabs1">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#carousel-apto"><font><font class="">{$complejo['nombre']}</font></font></a></li>
                            <li><a href="#mapaContainer"><font><font>{#mapa#}</font></font></a></li>
                            <li><a href="#calendarioContainer"><font><font class="">{#calendario#}</font></font></a></li>
                        </ul>

                        <div id="carousel-apto" class="corousel_apartamentos">
                            <div class="flexslider">


                                <ul class="slides">
                                   {foreach from=$complejo['adjuntos'] item=adjunto}                                   
                                      <li data-thumb="{$template_url}/{$adjunto}">
                                        <img src="{$template_url}/{$adjunto}">
                                      </li>
                                    {/foreach}
                                </ul>
                              </div>
                        </div>
                                    
                        <div id="mapaContainer" class="mapaContainer ">
                            <div id="mapa"></div>
                        </div>
                                    
                        <div id="calendarioContainer" class="calendarioContainer ">
                            <div class="col-md-10 col-md-offset-1">
                                <div id="calendar" >
                                </div>
                                <div id="calendar-legend">
                                    <div class="leyenda disponible"></div><div>{#disponible#}</div>
                                    <div class="leyenda no-disponible"></div><div>{#no_disponible#}</div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="descripcion-servicios row-fluid">
                        <div class="servicios">
                            <div class="row-fluid">
                                <div class="bs-example bs-example-tabs">
                                    <ul id="myTab" class="nav nav-tabs">
                                        <li class="active"><a href="#descripcion" data-toggle="tab">{#descripcion#}</a></li>
                                    </ul>
                                    <div id="myTabContent" class="tab-content col-md-12">
                                        <div class="tab-pane fade active in row" id="descripcion">
                                            <div class="col-md-12"> {$complejo['descripcion']} </div>
                                            
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="columna-derecha col-md-4 contenedor-calendario-right">
                                    
                    <div id="cercanos" class="contenedor-calendario panel panel-default">
                        <div class="panel-heading">
                            <h1 class="text-center panel-title">{#alojamientos#}</h1>
                        </div>
                        <div class="panel-body">
                            {foreach from=$complejo['apartamentos'] item=apartamento}
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="{$base_url}/apartamento/id:{$apartamento.id_apartamento}"><img src="{$template_url}{$apartamento.adjunto}" class="sugerencia-picture"></a>
                                </div>
                                <div class="col-md-6">
                                    <span><a href="{$base_url}/apartamento/id:{$apartamento.id_apartamento}"><strong>{$apartamento.nombre}</strong></a></span><br/>
                                    <span class="distancia">{#hasta#} {$apartamento.capacidad} {#personas#}</span><br/>
                                    <span>{#de#} <strong>&euro;{$apartamento.precio_minimo|number_format:2:',':' '}</strong> {#a#} <strong>&euro;{$apartamento.precio_maximo|number_format:2:',':' '}</strong></span><br/>                                    
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
                <h4 class="modal-title">{#realiza_tu_pregunta#} [<b>{$apartamento['apartamento']->nombre}</b>]</h4>
            </div>
            <div class="modal-body">
                
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label for="nombre_viajero">{#nombre#}</label>
                            <input type="text" name="nombre" class="form-control validate[required]" placeholder="{#nombre#}">
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="apellidos">{#apellidos#}:</label>
                            <input type="text" name="apellidos" class="form-control validate[required]" placeholder="{#apellidos#}">
                        </div>
                    </div>
                    <div class="row">
                         <div class="col-sm-6 form-group">
                             <label for="email">{#correo_electronico#}:</label>
                             <input type="text" name="email" class="form-control validate[required, custom[email]]" placeholder="{#correo_electronico#}">
                         </div>
                         <div class="col-sm-6 form-group">
                             <label for="telefono">{#telefono#}:</label>
                             <input type="text" name="telefono" class="form-control validate[required]" placeholder="{#telefono#}">
                         </div>
                    </div>
                    <div class="row-fluid form-group">
                        <label for="mensaje">{#mensaje#}:</label>
                        <textarea name="mensaje" class="form-control"></textarea>
                    </div>
                    <input type="hidden" name="idApartamento" value="{$apartamento['apartamento']->idApartamento}">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{#cerrar#}</button>
                <button type="submit" class="btn btn-info" id="btn-send-question">{#enviar_pregunta#}</button>
            </div>
            </form>
        </div>
    </div>
</div>
{/block}
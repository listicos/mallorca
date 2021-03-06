{extends file="index.tpl"}
{block name="style" append}
  <link rel="stylesheet" type="text/css" href="{$template_url_s}/css/confirmacion.css" />
{/block}
{block name="script" append}
<script src="{$template_url_s}/js/confirmacion.js"></script>
{/block}
{block name="content" append}
<div class="main_content content body-content">
    <div class="col-md-12">
        <div class="main_content book-confirmation">
            <div class="book-confirmation-inner">
                <div class="row">
                <div class="col-md-12">
                    <h2 class="text-primary">{#gracias#} {$reserva['cliente']->nombre}{if $disponible}{#tu_reserva_esta_confirmada#}{else}{#tu_solicitud_de_reserva_esta_confirmada#}{/if}</h2>
                    <ul class="checklist">
                        <li><p>{#te_hemos_enviado_un_email_de_confirmacion_a#} {$reserva['cliente']->email}</p></li>
                        <li><p>{#hemos_informado_a#} {if $reserva['apartamento']->empresa}{$reserva['apartamento']->empresa->nombreFiscal}{else}{$reserva['apartamento']->nombre}{/if} {#de_tu_llegada#}</p></li>
                    </ul>
                </div>
                </div>
                <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h1 class="text-center panel-title">{#comprueba_los_datos#}</h1>
                        </div>
                        <div class="panel-body">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-sm-4"><p><strong>{#numero_de_reserva#}</strong></p></div>
                                    <div class="col-sm-8"><p>{$reserva['reserva']->idReservacion}</p></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4"><p><strong>{#datos_de_la_reserva#}</strong></p></div>
                                    <div class="col-sm-8"><p>{$reserva['reserva']->noches} noche{if $reserva['reserva']->noches > 1}s{/if}, {$reserva['reserva']->adultos} huesped{if $reserva['reserva']->adultos > 1}es{/if}</p></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4"><p><strong>{#entrada#}</strong></p></div>
                                    <div class="col-sm-8"><p>{$reserva['reserva']->fechaEntradaFormat}</p></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4"><p><strong>{#salida#}</strong></p></div>
                                    <div class="col-sm-8"><p>{$reserva['reserva']->fechaSalidaFormat}</p></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4"><p><strong>{#apartamento#}</strong></p></div>
                                    <div class="col-sm-8"><p>{$reserva['reserva']->total} {#impuestos_incluidos#}</p></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4"><h4 class="text-primary"><strong>{#precio_total#}</strong></h4></div>
                                    <div class="col-sm-8"><p><strong>{$reserva['reserva']->total}</strong></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="panel panel-default" style="margin-top: 15px;">
                        <div class="panel-heading">
                            <h1 class="text-center panel-title">{#tus_datos#}</h1>
                        </div>
                        <div class="panel-body">
                            <div class="col-md-12">
                                <div class="row" style="margin-bottom: 0; border-bottom: 1px solid #f7f7f7;">
                                    <div class="col-sm-4"><p><strong>{#nombre#}</strong></p></div>
                                    <div class="col-sm-8"><p>{$reserva['cliente']->fullName}</p></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4"><p><strong>{#email#}</strong></p></div>
                                    <div class="col-sm-8"><p>{$reserva['cliente']->email}</p></div>
                                </div>
                                {if $reserva['reserva']->observaciones}
                                <div class="row">
                                    <div class="col-sm-4"><p><strong>{#peticiones_especiales#}</strong></p></div>
                                    <div class="col-sm-8"><p>{$reserva['reserva']->observaciones}</p></div>
                                </div>
                                {/if}
                            </div>
                        </div>
                    </div>
                </div>
                                    
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h1 class="text-center panel-title">{#datos_del_apartamento#}</h1>
                        </div>
                        <div class="panel-body">
                            <div class="col-md-12">
                                <div class="row no-margin">
                                    <div class="col-sm-6"><h3 class="text-info">{$reserva['apartamento']->nombre}</h3></div>
                                    <div class="col-sm-6">&nbsp;</div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3"><p><strong>{#direccion#}</strong></p></div>
                                    <div class="col-sm-9">
                                        <p>{$reserva['direccion']->provincia}</p>
                                        {if $reserva['direccion']->calle}<p>{$reserva['direccion']->calle}, {$reserva['direccion']->numero}</p>{/if}
                                        {if $reserva['direccion']->pais}<p>{$reserva['direccion']->pais}</p>{/if}
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-sm-3"><p><strong>{#informacion_para_el_viaje#}</strong></p></div>
                                    <div class="col-sm-9">
                                        <p>Latitude {$reserva['direccion']->lat}, Longitud {$reserva['direccion']->lon}</p>
                                        
                                    </div>
                                </div>
                                <div class="row divider"></div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h4 class="text-primary">{#apartamento_de#} {$reserva['apartamento']->habitaciones} habitaciones ({$reserva['apartamento']->capacidadPersonas} personas)</h4>
                                        <div class="reserva-hotel-detalles">
                                    
                                    <table class="table table-striped table-bordered">
                                        <tr>
                                            <td>{#tipo_de_alojamiento#}</td>
                                            <td class="value">{$reserva['apartamento']->tipo}</td>
                                        </tr>
                                        <tr>
                                            <td>{#capacidad#}</td>
                                            <td class="value">{$reserva['apartamento']->capacidadPersonas} {#personas#}</td>
                                        </tr>
                                        <tr>
                                            <td>{#dormitorios#}</td>
                                            <td class="value">{$reserva['apartamento']->habitaciones}</td>
                                        </tr>
                                        <tr>
                                            <td>{#camas#}</td>
                                            <td class="value">{$reserva['apartamento']->camas}</td>
                                        </tr>
                                        <tr>
                                            <td>{#banios#}</td>
                                            <td class="value">{$reserva['apartamento']->banio}</td>
                                        </tr>
                                    </table>
                                </div>
                                        <p>Este apartamento dispone de {foreach from=$reserva['apartamento']->servicios item=servicio name=servicios}{if !$smarty.foreach.servicios.first && !$smarty.foreach.servicios.last}, {/if}{if !$smarty.foreach.servicios.first && $smarty.foreach.servicios.last} y {/if}{$servicio->nombre}{/foreach}.</p>
                                    </div>
                                </div>
                                    <div class="row">
                                        <h4 class="text-info">{#politica_cancelacion#}</h4>
                                        <p>
                                            <a href="{$base_url}/politica/id:{$reserva['apartamento']->idPoliticaCancelacion}" target="_blank">{$politica->nombres->es}</a>
                                        </p>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <div class="row hidden-print">
                    <div class="col-md-12">
                        <div class="form-actions centered">
                            <a class="btn btn-default finalizar" href="{$base_url}">{#finalizar#}</a>
                            <a class="btn btn-success imprimir" onclick="window.print(); return false;">{#imprimir#}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{/block}
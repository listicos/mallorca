{extends file="index.tpl"}

{block name="style" append}
  <link rel="stylesheet" type="text/css" href="{$template_url_s}/css/confirmacion.css" />
  
{/block}

{block name="script" append}
<script src="{$template_url_s}/js/confirmacion.js"></script>
{/block}

{block name="content" append}
<div class="row-fluid clearfix top_content_container">
    <div class="col-md-12">
        <div class="main_content book-confirmation">
            <div class="book-confirmation-inner">
                <div class="row">
                    <h2 class="text-primary">¡Gracias, {$reserva['cliente']->nombre}! Tu reserva está confirmada.</h2>
                    <ul class="checklist">
                        <li><p>Te hemos enviado un email de confirmación a {$reserva['cliente']->email}</p></li>
                        <li><p>Hemos informado a {if $reserva['apartamento']->empresa}{$reserva['apartamento']->empresa->nombreFiscal}{else}{$reserva['apartamento']->nombre}{/if} de tu llegada.</p></li>
                    </ul>
                </div>
                <div class="row">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Comprueba los datos</h3>
                        </div>
                        <div class="panel-body">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-sm-10">
                                        <h3 class="text-info">{$reserva['apartamento']->nombre}</h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3"><p><strong>Número de reserva</strong></p></div>
                                    <div class="col-sm-9"><p>{$reserva['reserva']->idReserva}</p></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3"><p><strong>Datos de la reserva</strong></p></div>
                                    <div class="col-sm-9"><p>{$reserva['reserva']->noches} noche{if $reserva['reserva']->noches > 1}s{/if}, {$reserva['reserva']->adultos} huesped{if $reserva['reserva']->adultos > 1}es{/if}</p></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3"><p><strong>Entrada</strong></p></div>
                                    <div class="col-sm-9"><p>{$reserva['reserva']->fechaEntradaFormat}</p></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3"><p><strong>Salida</strong></p></div>
                                    <div class="col-sm-9"><p>{$reserva['reserva']->fechaSalidaFormat}</p></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3"><p class="check"><strong>Apartamento</strong></p></div>
                                    <div class="col-sm-9"><p>{$reserva['reserva']->total} (Impuestos incluidos)</p></div>
                                </div>
                                <div class="row text-success">
                                    <div class="col-sm-3"><p class="check"><strong>Pagas hoy</strong></p></div>
                                    <div class="col-sm-9"><p>{$reserva['reserva']->total}</p></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3"><h4 class="text-primary"><strong>Precio total:</strong></h4></div>
                                    <div class="col-sm-9"><p><strong>{$reserva['reserva']->total}</strong></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                                    
                <div class="row">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Datos del apartamento</h3>
                        </div>
                        <div class="panel-body">
                            <div class="col-md-12">
                                <div class="row no-margin">
                                    <div class="col-sm-6"><h3 class="text-info">{$reserva['apartamento']->nombre}</h3></div>
                                    <div class="col-sm-6">&nbsp;</div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3"><p><strong>Dirección</strong></p></div>
                                    <div class="col-sm-9">
                                        <p>{$reserva['direccion']->provincia}</p>
                                        {if $reserva['direccion']->calle}<p>{$reserva['direccion']->calle}, {$reserva['direccion']->numero}</p>{/if}
                                        {if $reserva['direccion']->pais}<p>{$reserva['direccion']->pais}</p>{/if}
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-sm-3"><p><strong>Información para el viaje</strong></p></div>
                                    <div class="col-sm-9">
                                        <p>Latitude {$reserva['direccion']->lat}, Longitud {$reserva['direccion']->lon}</p>
                                        
                                    </div>
                                </div>
                                <div class="row divider"></div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h4 class="text-primary">Apartamento de {$reserva['apartamento']->habitaciones} habitaciones ({$reserva['apartamento']->capacidadPersonas} personas)</h4>
                                        <p>este apartamento dispone de {foreach from=$reserva['apartamento']->servicios item=servicio name=servicios}{if !$smarty.foreach.servicios.first && !$smarty.foreach.servicios.last}, {/if}{if !$smarty.foreach.servicios.first && $smarty.foreach.servicios.last} y {/if}{$servicio->nombre}{/foreach}.</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3"><p><strong>Nombre del cliente</strong></p></div>
                                    <div class="col-sm-9"><p>{$reserva['cliente']->fullName}</p></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                                    
            </div>
        </div>
    </div>
</div>
{/block}
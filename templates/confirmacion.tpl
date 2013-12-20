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
                    <h2 class="text-primary">{#gracias#} {$reserva['cliente']->nombre}{#tu_reserva_esta_confirmada#}</h2>
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
                                    <div class="col-sm-10">
                                        <h3 class="text-info">{$reserva['apartamento']->nombre}</h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3"><p><strong>{#numero_de_reserva#}</strong></p></div>
                                    <div class="col-sm-9"><p>{$reserva['reserva']->idReserva}</p></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3"><p><strong>{#datos_de_la_reserva#}</strong></p></div>
                                    <div class="col-sm-9"><p>{$reserva['reserva']->noches} noche{if $reserva['reserva']->noches > 1}s{/if}, {$reserva['reserva']->adultos} huesped{if $reserva['reserva']->adultos > 1}es{/if}</p></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3"><p><strong>{#entrada#}</strong></p></div>
                                    <div class="col-sm-9"><p>{$reserva['reserva']->fechaEntradaFormat}</p></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3"><p><strong>{#salida#}</strong></p></div>
                                    <div class="col-sm-9"><p>{$reserva['reserva']->fechaSalidaFormat}</p></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3"><p class="check"><strong>{#apartamento#}</strong></p></div>
                                    <div class="col-sm-9"><p>{$reserva['reserva']->total} {#impuestos_incluidos#}</p></div>
                                </div>
                                <div class="row text-success">
                                    <div class="col-sm-3"><p class="check"><strong>{#pagas_hoy#}</strong></p></div>
                                    <div class="col-sm-9"><p>{$reserva['reserva']->total}</p></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3"><h4 class="text-primary"><strong>{#precio_total#}</strong></h4></div>
                                    <div class="col-sm-9"><p><strong>{$reserva['reserva']->total}</strong></p>
                                    </div>
                                </div>
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
                                        <p>este apartamento dispone de {foreach from=$reserva['apartamento']->servicios item=servicio name=servicios}{if !$smarty.foreach.servicios.first && !$smarty.foreach.servicios.last}, {/if}{if !$smarty.foreach.servicios.first && $smarty.foreach.servicios.last} y {/if}{$servicio->nombre}{/foreach}.</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3"><p><strong>{#nombre_del_cliente#}</strong></p></div>
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
</div>
{/block}
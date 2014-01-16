
<div class="confirma_reserva_container">
    <table style="font-family: Arial, Helvetica;">
        <tbody>
            <tr>
                <td><h2>{#gracias#} {$reserva['cliente']->nombre}, {if $disponible}{#su_reserva_se_ha_realizado_correctamente#}{else}{#su_solicitud_de_reserva_se_ha_realizado_correctamente#}{/if}</h2></td>
            </tr>	 
        </tbody>
    </table>
    <table border="1" cellspacing="0" cellpadding="8px" width="900" style="font-family: Arial, Helvetica;">
        <tbody>
            <tr>
                <td colspan="2"><b><h3>{#datos_de_la_reserva_realizada_el#}{$reserva['reserva']->tiempoCreacion} </h3></b></td>
            </tr>

            <tr>
                <td>No. de reserva</td>
                <td><b>{$reserva['reserva']->idReservacion}</b></td>
            </tr> 
            <tr>
                <td>{#nombre#}</td>
                <td><b>{$reserva['cliente']->fullName}</b></td>
            </tr>
            <tr>
                <td>{#email#}</td>
                <td>{$reserva['cliente']->email}</td>
            </tr>
            <tr>
                <td>{#alojamiento#}</td>
                <td><b>{$reserva['apartamento']->nombre}</b></td>
            </tr>
            <tr>
                <td>{#direccion#}</td>
                <td>
                    {$reserva['direccion']->calle}&nbsp;
                    {$reserva['direccion']->numero},{$reserva['direccion']->codigo_postal}&nbsp;
                    {$reserva['direccion']->provincia}
                </td>
            </tr>
            <tr>
                <td>
                    <table>	
                        <tr>
                            <td>{#fecha_de_entrada#}</td>
                            <td><b>{$reserva['reserva']->fechaEntradaFormat}</b></td>
                        </tr>
                        
                    </table>
                </td>
                <td>
                    <table>	
                        <tr>
                            <td>{#fecha_de_salida#}</td>
                            <td><b>{$reserva['reserva']->fechaSalidaFormat}</b></td>
                        </tr>	
                        
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table>	
                        <tr><td>{#total_de_noches#}</td>
                            <td>{$reserva['reserva']->noches}</td></tr>
                        <tr><td>Cantidad</td>
                            <td>1 {$reserva['apartamento']->tipo}</td></tr>                        
                    </table>
                </td>
                <td>
                    <table>	
                        <tr><td>{#adultos#}</td>
                            <td>{$reserva['reserva']->adultos}</td></tr>
                        <tr><td>Niños (0-12 años)</td>
                            <td>{$reserva['reserva']->ninios + $reserva['reserva']->bebes}</td></tr>
                        <tr><td>&nbsp;</td></tr>
                    </table>
                </td>
            </tr>
            <tr>
                <h3>{#observaciones#}</h3>
                <p>{$reserva['reserva']->observaciones}</p>
            </tr>
            <tr>
                <td><b>{#precio_de_la_estancia#}</b></td>
                <td><b>{$reserva['reserva']->total}</b></td>
            </tr>
            <tr>
                <td></td>
                <td>{#iva_incluido_Impuestos_municipales_y_o_turisticos_no_incluidos#}</td>
            </tr>	
            <!--<tr>
                <td colspan="2"><h3>{#registro_de_entrada_y_entrega_de_llaves#}</h3></td>
            </tr>-->
            <tr>
                <td>
                    <table>	
                        <tr>
                            <td colspan="2"><b>{#direccion#}</b></td></tr>
                        <tr>
                            <td colspan="2">
                                {$reserva['direccion']->calle}&nbsp;{$reserva['direccion']->numero}&nbsp;{$reserva['direccion']->codigo_postal}<br>
                                {$reserva['direccion']->provincia}
                            </td>
                        </tr>
                        <tr><td>&nbsp;</td></tr>
                        <tr>
                            <td>{#telefono#}</td>
                            <td>+34 902 070 298</td>
                        </tr>	
                        <tr>
                            <td>{#fax#}</td>
                            <td>+34 902 070 298</td>
                        </tr>	
                        <tr>
                            <td>{#email#}</td>
                            <td>reservas@mallorcarenthaus.com</td>
                        </tr>
                    </table>
                </td>

                <td align="center">
                    <div class="reservacion_mapa_container">
                        <div id="reservacion_mapa">
                            <img width="100%" height="100%" src="http://maps.googleapis.com/maps/api/staticmap?center={$reserva['direccion']->lat},{$reserva['direccion']->lon}&zoom=15&size=608x194&sensor=true&markers=color:red|label:{$reserva['apartamento']->nombre}|{$reserva['direccion']->lat},{$reserva['direccion']->lon}">
                        </div>
                    </div>
                </td>	
            </tr>
            <!--
            <tr>
                <td><b>{#tarifa_de_limpieza#}</b></td>
                <td>{if $reserva['apartamento']->costoLimpieza} &euro; {$reserva['apartamento']->costoLimpieza|number_format:2:',':'.'} {else} Incluida{/if}</td>
            </tr>
            <tr>	
                <td><b>{#otros_suplementos#}</b></td>
                <td>
                    {if $reserva['articulos'] && count($reserva['articulos'])}
                        <table style="width: 100%; border: none;">
                            {foreach from=$reserva['articulos'] item=articulo}
                            <tr>
                                <td>{$articulo->nombre}</td>
                                <td>{$articulo->cantidad}</td>
                                <td>&euro; {$articulo->precio|number_format:2:',':'.'}</td>
                            </tr>
                            {/foreach}
                        </table>
                    {else} {#no_incluidos#}{/if}
                </td>
            </tr>
            <tr>
                <td><b>{#deposito_de_seguridad#}</b></td>
                <td>{$reserva['apartamento']->depositoSeguridad|number_format:2:',':'.'}</td>
            </tr>
            <tr>
                <td></td>
                <td>{#el_importe_aplicado_en_fianza_del_apartamento_reembolsable_al_final_de_la_estancia#}</td>
            </tr>	
            <tr>
                <td><b>Pago por adelantado</b></td>
                <td>Se realizará un cargo del 35% del importe de esta reserva en la tarjeta con la que ha confirmado esta reserva en el momento en que se ha realizado la misma.El resto de la reserva y suplementos se abonarán a la llegada.</td>
            </tr>-->	
            <tr>
                <td><b>{#tarjetas_aceptadas#}</b></td>
                <td>
                    {if $reserva['pagosTipos']}
                            {foreach from=$reserva['pagosTipos'] item=pagoTipo name=pagostipos}
                                {if $smarty.foreach.pagostipos.first}, {/if}{$pagoTipo->nombre}
                             {/foreach}
                    {/if}                    
                </td>
            </tr>
            <tr>
                <td><b>{#politica_de_cancelaciones#}</b></td>
                <td><a href="{$base_url}/politica/id:{$reserva['apartamento']->idPoliticaCancelacion}">{$politica->nombres->es}</a></td>
            </tr>
            <tr>
                <td><b>{#nota_importante#}</b></td>
                <td><!--{#en_el_improbable_caso#}--></td>
            </tr>
            <tr></tr>
            <tr>
                <td colspan="2" align="center"><b>{#gracias_por_haber_reservado_con#} Mallorca Rent Haus.</b></td>
            </tr>	
        </tbody>
    </table>

</div>

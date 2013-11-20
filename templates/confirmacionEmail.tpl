
<div class="confirma_reserva_container">
    <table style="font-family: Arial, Helvetica;">
        <tbody>
            <tr>
                <td><h2>>Gracias {$reserva['cliente']->nombre}, su reserva se ha realizado correctamente.</h2></td>
            </tr>	 
        </tbody>
    </table>
    <table border="1" cellspacing="0" cellpadding="8px" width="900" style="font-family: Arial, Helvetica;">
        <tbody>
            <tr>
                <td colspan="2"><b><h3>Datos de la reserva realizada el {$reserva['reserva']->tiempoCreacion} </h3></b></td>
            </tr>

            <tr>
                <td>No. de reserva</td>
                <td><b>{$reserva['reserva']->idReservacion}</b></td>
            </tr> 
            <tr>
                <td>Nombre</td>
                <td><b>{$reserva['cliente']->fullName}</b></td>
            </tr>
            <tr>
                <td>Email</td>
                <td>{$reserva['cliente']->email}</td>
            </tr>
            <tr>
                <td>Alojamiento</td>
                <td><b>{$reserva['apartamento']->nombre}</b></td>
            </tr>
            <tr>
                <td>Dirección</td>
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
                            <td>Fecha de entrada:</td>
                            <td><b>{$reserva['reserva']->fechaEntradaFormat}</b></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Entrada apartir de {$reserva['apartamento']->horaEntrada|date_format:"%H:%M"} hrs.</td>
                        </tr>
                    </table>
                </td>
                <td>
                    <table>	
                        <tr>
                            <td>Fecha de salida:</td>
                            <td><b>{$reserva['reserva']->fechaSalidaFormat}</b></td>
                        </tr>	
                        <tr>
                            <td></td>
                            <td>Salidas hasta las {$reserva['apartamento']->horaSalida|date_format:"%H:%M"} hrs.</td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table>	
                        <tr><td>Total de noches</td>
                            <td>{$reserva['reserva']->noches}</td></tr>
                        <tr><td>Cantidad</td>
                            <td>1 {$reserva['apartamento']->tipo}</td></tr>
                        <tr>
                            <td>Observaciones</td>
                            <td>{$reserva['reserva']->observaciones}</td></tr>
                    </table>
                </td>
                <td>
                    <table>	
                        <tr><td>Adultos</td>
                            <td>{$reserva['reserva']->adultos}</td></tr>
                        <tr><td>Niños (0-12 años)</td>
                            <td>{$reserva['reserva']->ninios + $reserva['reserva']->bebes}</td></tr>
                        <tr><td>&nbsp;</td></tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td><b>Precio de la estancia</b></td>
                <td><b>{$reserva['reserva']->total}</b></td>
            </tr>
            <tr>
                <td></td>
                <td>IVA incluido.Impuestos municipales y/o turísticos no incluidos</td>
            </tr>	
            <tr>
                <td colspan="2"><h3>Registro de entrada y entrega de llaves</h3></td>
            </tr>
            <tr>
                <td>
                    <table>	
                        <tr>
                            <td colspan="2"><b>Dirección:</b></td></tr>
                        <tr>
                            <td colspan="2">
                                {$reserva['direccion']->calle}&nbsp;{$reserva['direccion']->numero}&nbsp;{$reserva['direccion']->codigo_postal}<br>
                                {$reserva['direccion']->provincia}
                            </td>
                        </tr>
                        <tr><td>&nbsp;</td></tr>
                        <tr>
                            <td>Teléfono:</td>
                            <td>+34 902 070 298</td>
                        </tr>	
                        <tr>
                            <td>Fax:</td>
                            <td>+34 902 070 298</td>
                        </tr>	
                        <tr>
                            <td>E-mail:</td>
                            <td>reservas@clickandbooking.com</td>
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

            <tr>
                <td><b>Tarifa de limpieza</b></td>
                <td>{if $reserva['apartamento']->costoLimpieza} &euro; {$reserva['apartamento']->costoLimpieza|number_format:2:',':'.'} {else} Incluida{/if}</td>
            </tr>
            <tr>	
                <td><b>Otros suplementos</b></td>
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
                    {else} no incuidos{/if}
                </td>
            </tr>
            <tr>
                <td><b>Depósito de seguridad</b></td>
                <td>{$reserva['apartamento']->depositoSeguridad|number_format:2:',':'.'}</td>
            </tr>
            <tr>
                <td></td>
                <td>(el importe aplicado en fianza del apartamento,reembolsable al final de la estancia)</td>
            </tr>	
            <!--<tr>
                <td><b>Pago por adelantado</b></td>
                <td>Se realizará un cargo del 35% del importe de esta reserva en la tarjeta con la que ha confirmado esta reserva en el momento en que se ha realizado la misma.El resto de la reserva y suplementos se abonarán a la llegada.</td>
            </tr>-->	
            <tr>
                <td><b>Tarjetas aceptadas</b></td>
                <td>
                    {if $reserva['pagosTipos']}
                            {foreach from=$reserva['pagosTipos'] item=pagoTipo name=pagostipos}
                                {if $smarty.foreach.pagostipos.first}, {/if}{$pagoTipo->nombre}
                             {/foreach}
                    {/if}                    
                </td>
            </tr>
            <tr>
                <td><b>Política de cancelaciones:</b></td>
                <td>Si cancela su reserva hasta el {$reserva['fechaCancelacion']} [{$reserva['politicaCancelacion']->reembolsoDia} días antes],23:59(horalocal) del inicio de la estancia,se retendrá un {$reserva['politicaCancelacion']->reembolsoPorcentaje}% del importe cobrado en concepto de gastos administivos.</td>
            </tr>
            <tr>
                <td><b>Nota importante:</b></td>
                <td>En el improbable caso de un problema con el alojamiento reservado,nos reservamos el derecho de modificar su reserva y reasignarlo a un alojamiento de similares características y lo más próximo posible al reservado.</td>
            </tr>
            <tr></tr>
            <tr>
                <td colspan="2" align="center"><b>Gracias por haber reservado con Click&Booking.</b></td>
            </tr>	
        </tbody>
    </table>

</div>

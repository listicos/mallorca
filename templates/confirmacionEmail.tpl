<div class="confirma_reserva_container">
    <h2><strong>{#gracias#}</strong>
    {$reserva['cliente']->nombre}, {if $disponible}{#su_reserva_se_ha_realizado_correctamente#}{else}{#su_solicitud_de_reserva_se_ha_realizado_correctamente#}{/if}</h2>
    <p>{#datos_de_la_reserva_realizada_el#}{$reserva['reserva']->tiempoCreacion}</p>
    <p><strong>No. de reserva:</strong> {$reserva['reserva']->idReservacion}</p>
    <p><strong>{#nombre#}</strong> {$reserva['cliente']->fullName}</p>
    <p><strong>{#email#}</strong> {$reserva['cliente']->email}</p>
    <p><strong>{#alojamiento#}:</strong> {$reserva['apartamento']->nombre}</p>
    <p><strong>{#fecha_de_entrada#}</strong> {$reserva['reserva']->fechaEntradaFormat}</p>
    <p><strong>{#fecha_de_salida#}</strong> {$reserva['reserva']->fechaSalidaFormat}</p>
    <p><strong>{#total_de_noches#}:</strong> {$reserva['reserva']->noches}</p>
    <p><strong>{#tipo_de_alojamiento#}</strong> {$reserva['apartamento']->tipo}</p>

    <p><strong>PAX:</strong> {$reserva['reserva']->adultos}</p>
    <p><strong>{#observaciones#}</strong> {$reserva['reserva']->observaciones}</p>

    <h3>{#contacto#}</h3>
    <p><strong>{#direccion#}</strong> {$reserva['direccion']->calle}&nbsp;
                    {$reserva['direccion']->numero},{$reserva['direccion']->codigo_postal}&nbsp;
                    {$reserva['direccion']->provincia}</p>
    <p><strong>{#telefono#}</strong> {$config->telefonosContacto}</p>
    <p><strong>{#email#}</strong> {$config->emailContacto}</p>


    <p><strong>{#precio_de_la_estancia#}</strong> {$reserva['reserva']->total} <small>({#iva_incluido#})</small></p>

    <p><b>{#gracias_por_haber_reservado_con#} Mallorca Rent Haus.</b></p>
</div>

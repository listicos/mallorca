<?php

$usuario_core->validateUser();

$usuario = $usuario_core->getUsuario();

$template = new Core_template();
$template->setView('perfil.php');
$template->setCSS('perfil.css');
$template->setCSS('reserva.css');
$template->setJS('perfil.js');

$template->setTitle('Perfil | ' . $usuario->nombre);

$reservas = getReservaByUsuario($usuario->idUsuario);
$reservas_array = array();

$dias = array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");
$meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

foreach ($reservas as $key => $reserva) {
    $apartamento = getApartamento($reserva->idApartamento);
    //$reservas_array[$key]['apartamento'] = $apartamento;
    $reservas_array[$key]['nombre'] = $apartamento->nombre;
    $apartamentos_adjuntos = getApartamentosAdjuntos($apartamento->idApartamento);
    $adjunto = getAdjunto($apartamentos_adjuntos[0]->idAdjunto);

    if ($adjunto && count($adjunto) > 0) {
        $reservas_array[$key]['adjunto'] = $template_url . $adjunto->ruta;
    } else {
        $reservas_array[$key]['adjunto'] = $template_url . '/imagen/apartamento.png';
    }

    $salida = strtotime($reserva->fechaSalida);
    $entrada = strtotime($reserva->fechaEntrada);

    $$reservas_array[$key]['fechaSalida'] = $dias[date('w', $salida)] . ' ' . date('d', $salida) . ' de ' . $meses[date('n', $salida) - 1] . ' ' . date('Y', $salida);
    $reservas_array[$key]['fechaEntrada'] = $dias[date('w', $entrada)] . ' ' . date('d', $entrada) . ' de ' . $meses[date('n', $entrada) - 1] . ' ' . date('Y', $entrada);
    $reservas_array[$key]['total'] = '€' . money_format('%i', $reserva->total);

    $reservas_array[$key]['idReservacion'] = $reserva->idReservacion;
}
//var_dump($reservas_array);
$template->setAttribute('reservas', $reservas_array);
$template->setAttribute('usuario', $usuario);

echo $template->render();
?>
<?php
setlocale(LC_ALL, "es_ES");
setlocale(LC_MONETARY, 'it_IT');
require_once 'Logic/apartamentos.php';
require_once 'Logic/opiniones.php';
require_once 'Logic/direcciones.php';

$template = new Core_template();
$template->setView('apartamento.php');
$template->setJS('apartamento.js');
$template->setJS('googlemaps_tiny.js');
//$template->setCSS('apartamento.css');

$template->setTitle('Bienvenidos a Click & Booking');

$idApartamento = $_GET['id'];
$apartamento = getApartamento($idApartamento);

$apartamentos_array = array();
$apartamentos_array['apartamento'] = $apartamento;

$apartamentosAdjuntos = getApartamentosAdjuntos($idApartamento);
foreach ($apartamentosAdjuntos as $adkey => $apartamentoAdjunto) {
    $adjunto = getAdjunto($apartamentoAdjunto->idAdjunto);
    $apartamentos_array['adjuntos'][$adkey] = $adjunto;
}

$direccion = getDireccion($apartamento->idDireccion);
$direccion->paisNombre = getPais($direccion->idPais)->nombreCompleto;
$apartamentos_array['direccion'] = $direccion;

$disponibilidad = getDisponibilidadByApartamento($idApartamento);
$dias = array("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado");
$dias_corto = array("Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sáb");
$meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

$fecha_inicio = $dias_corto[date('w', strtotime($disponibilidad[0]->fechaInicio))] . ' ' . date('d', strtotime($disponibilidad[0]->fechaInicio)) . ' , ' . $meses[date('n', strtotime($disponibilidad[0]->fechaInicio)) - 1] . ' ' . date('Y', strtotime($disponibilidad[0]->fechaInicio));
$fecha_final = $dias_corto[date('w', strtotime($disponibilidad[0]->fechaFinal))] . ' ' . date('d', strtotime($disponibilidad[0]->fechaFinal)) . ' , ' . $meses[date('n', strtotime($disponibilidad[0]->fechaFinal)) - 1] . ' ' . date('Y', strtotime($disponibilidad[0]->fechaFinal));
$disponibilidad[0]->fechaInicio = $fecha_inicio;
$disponibilidad[0]->fechaFinal = $fecha_final;
//$disponibilidad[0]->precio = money_format('%.2n', $disponibilidad[0]->precio);
$apartamentos_array['disponibilidad'] = $disponibilidad[0];

$opiniones = getOpinionesByApartamento($idApartamento);
if (count($opiniones) > 0) {
    $total_puntuacion = 0;
    foreach ($opiniones as $opkey => $opinion) {
        $opiniones[$opkey]->fechaCreacion = date('d/m/Y', strtotime($opiniones[$opkey]->fechaCreacion));
        $total_puntuacion += floatval($opiniones[$opkey]->puntuacion);
    }

    $promedio = round($total_puntuacion / count($opiniones), 1, PHP_ROUND_HALF_UP);

    $apartamentos_array['opiniones'] = $opiniones;
    $apartamentos_array['promedio'] = $promedio;

    $last_opinion = $opiniones[(count($opiniones)) - 1];
    $user_last_opinion = getUsuario($last_opinion->idUsuario);

    $apartamentos_array['last_opinion']['opinion'] = $last_opinion->opinion;
    $apartamentos_array['last_opinion']['usuario'] = $user_last_opinion->nombre;
}
$template->setAttribute('apartamento', $apartamentos_array);

echo $template->render();
?>

<?php

$usuario_core->validateUser();
$template = new Core_template();
$template->setTitle("Confirmación");

$template->setJS('confirmaReserva.js');

if (isset($_GET['id'])) {

    $reserva_array = array();
    $reserva = getReserva($_GET['id']);

    $salida = strtotime($reserva->fechaSalida);
    $entrada = strtotime($reserva->fechaEntrada);
    $creacion = strtotime($reserva->tiempoCreacion);

    $dias = array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");
    $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

    $reserva->fechaSalidaFormat = $dias[date('w', $salida)] . ' ' . date('d', $salida) . ' de ' . $meses[date('n', $salida) - 1] . ' ' . date('Y', $salida);
    $reserva->fechaEntradaFormat = $dias[date('w', $entrada)] . ' ' . date('d', $entrada) . ' de ' . $meses[date('n', $entrada) - 1] . ' ' . date('Y', $entrada);
    $reserva->tiempoCreacion = date('d/m/Y', $creacion);

    $noches = (intval($salida) - intval($entrada)) / 86400;
    $reserva->noches = $noches;
    $reserva->total = '€'.money_format('%i', $reserva->total);
    $reserva_array['reserva'] = $reserva;

    $cliente = getUsuario(getHuesped($reserva->idHuesped)->idUsuario);
    $cliente->fullName = $cliente->nombre . ' ' . $cliente->apellidoPaterno . ' ' . $cliente->apellidoMaterno;
    $reserva_array['cliente'] = $cliente;

    $apartamento = unserialize($reserva->apartamento);
    $apartamentoTipo = getApartamentosTipos($apartamento->idApartamentosTipo);
    $apartamento->apartamentoTipo = $apartamentoTipo->nombre;
    $tipoApartamento = getApartamentosTipos($apartamento->idApartamentosTipo);
    $apartamento->tipo = $tipoApartamento->nombre;
    $reserva_array['apartamento'] = $apartamento;

    $reserva_array['direccion'] = getDireccion($apartamento->idDireccion);

    $view = new Core_template('confirmaReserva.php');
    $view->setAttribute('reserva', $reserva_array);
    $template->setView($view);
}

echo $template->render();
?>
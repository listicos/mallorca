<?php

$usuario_core->validateUser();
$action = $_POST["action"];
$result = array("msg" => "error", "data" => "Tu no tienes suficientes permisos.");

if (strcmp($action, "checkIn") == 0) {
    
        
    $limit = 20;
    if(isset($_POST['limit']))
        $limit = $_POST['limit'];

    $reservas = getReservasParaHoyManana($limit);
    //$opiniones = array();
    if ($reservas && count($reservas) > 0) {
        foreach ($reservas as $key => $reserva) {
            $reservas[$key]->noches = ((strtotime($reserva->fechaSalida) - strtotime($reserva->fechaEntrada)) / (60*60*24));
            $reservas[$key]->fechaEntrada = date('d/m/Y', strtotime($reserva->fechaEntrada));
            $reservas[$key]->fechaSalida = date('d/m/Y', strtotime($reserva->fechaSalida));
            $reservas[$key]->apartamento = getApartamento($reserva->idApartamento);
            $reservas[$key]->huesped = getUsuario($reserva->idUsuario);
        }
        $template = new Core_template('admin/reserva/filtros.php');
        $template->setAttribute('reservas', $reservas);
        $result = array("msg" => "ok", "data" => "Reservas encontradas.", 'html' => $template->getContent());
    } else {
        $result = array("msg" => "ok", "data" => "No se encontraron reservas para hoy o mañana.", 'html' => '<p class="no_results_found">No se encontraron reservas para hoy o mañana</p>');
    }
    
}

if (strcmp($action, "checkOut") == 0) {
    
        
    $limit = 20;
    if(isset($_POST['limit']))
        $limit = $_POST['limit'];

    $reservas = getReservasSalidaParaHoyManana($limit);
    //$opiniones = array();
    if ($reservas && count($reservas) > 0) {
        foreach ($reservas as $key => $reserva) {
            $reservas[$key]->noches = ((strtotime($reserva->fechaSalida) - strtotime($reserva->fechaEntrada)) / (60*60*24));
            $reservas[$key]->fechaEntrada = date('d/m/Y', strtotime($reserva->fechaEntrada));
            $reservas[$key]->fechaSalida = date('d/m/Y', strtotime($reserva->fechaSalida));
            $reservas[$key]->apartamento = getApartamento($reserva->idApartamento);
            $reservas[$key]->huesped = getUsuario($reserva->idUsuario);
        }
        $template = new Core_template('admin/reserva/filtros.php');
        $template->setAttribute('reservas', $reservas);
        $result = array("msg" => "ok", "data" => "Reservas encontradas.", 'html' => $template->getContent());
    } else {
        $result = array("msg" => "ok", "data" => "No se encontraron reservas para hoy o mañana.", 'html' => '<p class="no_results_found">No se encontraron reservas para hoy o mañana</p>');
    }
    
}

if (strcmp($action, "reservasRecientes") == 0) {
    
        
    $limit = 20;
    if(isset($_POST['limit']))
        $limit = $_POST['limit'];

    $reservas = getReservasRecientes(5);
    //$opiniones = array();
    if ($reservas && count($reservas) > 0) {
        foreach ($reservas as $key => $reserva) {
            $reservas[$key]->noches = ((strtotime($reserva->fechaSalida) - strtotime($reserva->fechaEntrada)) / (60*60*24));
            $reservas[$key]->fechaEntrada = date('d/m/Y', strtotime($reserva->fechaEntrada));
            $reservas[$key]->fechaSalida = date('d/m/Y', strtotime($reserva->fechaSalida));
            $reservas[$key]->apartamento = getApartamento($reserva->idApartamento);
            $reservas[$key]->huesped = getUsuario($reserva->idUsuario);
        }
        $template = new Core_template('admin/reserva/filtros.php');
        $template->setAttribute('reservas', $reservas);
        $result = array("msg" => "ok", "data" => "Reservas encontradas.", 'html' => $template->getContent());
    } else {
        $result = array("msg" => "ok", "data" => "No se encontraron reservas de hoy o ayer.", 'html' => '<p class="no_results_found">No se encontraron reservas de hoy o ayer</p>');
    }
    
}


echo json_encode($result);
?>

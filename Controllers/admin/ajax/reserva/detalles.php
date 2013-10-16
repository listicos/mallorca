<?php

$usuario_core->validateUser();
$action = $_POST["action"];
$result = array("msg" => "error", "data" => "Tu no tienes suficientes permisos.");

if (strcmp($action, "getDetailsToOverlay") == 0 || isset($_GET['id'])) {
    if (isset($_POST['idReservacion']) || isset($_GET['id'])) {

        $reserva_array = array();
        $idReservacion = isset($_POST['idReservacion']) ? $_POST['idReservacion'] : $_GET['id'];
        $reserva = getReserva($idReservacion);
        $salida = strtotime($reserva->fechaSalida);
        $entrada = strtotime($reserva->fechaEntrada);

        $reserva->fechaSalidaFormat = date('d/m/Y', $salida);
        $reserva->fechaEntradaFormat = date('d/m/Y', $entrada);

        $noches = (intval($salida) - intval($entrada)) / 86400;
        $reserva->noches = $noches;
        $reserva_array['reserva'] = $reserva;

        $reserva_array['cliente'] = getUsuario($reserva->idUsuario);

        $apartamento = unserialize($reserva->apartamento);
        $apartamentoTipo = getApartamentosTipos($apartamento->idApartamentosTipo);
        $apartamento->apartamentoTipo = $apartamentoTipo->nombre;
        $reserva_array['apartamento'] = $apartamento;
        
        $template = new Core_template('admin/reserva/detalles.php');
        $template->setAttribute('reserva', $reserva_array);
        
        if(isset($_GET['id'])) {
            $template->setCSS('css/admin/bootstrap.min.css');
            $template->setAttribute('print', true);
            echo $template->render();
            return;
        } else {
            $result = array("msg" => "ok", "data" => "Opiniones encontradas.", 'idReservacion' => '', 'html' => $template->getContent());
        }
        
        
    } else {
        $result = array("msg" => "error", "data" => "Reservación no encontrada.");
    }
}

if (strcmp($action, "getEmailToOverlay") == 0) {
    if (isset($_POST['idReservacion'])) {

        $template = new Core_template('admin/reserva/correo.php');
        //$template->setAttribute('reserva', $reserva_array);
        $result = array("msg" => "ok", "data" => "Opiniones encontradas.", 'idReservacion' => '', 'html' => $template->getContent());
    } else {
        $result = array("msg" => "error", "data" => "Reservación no encontrada.");
    }
}

if (strcmp($action, "sendEmailFromOverlay") == 0) {

    $mailer = new Core_Mailer();
    if($mailer->send_email('zapata46_9@hotmail.com', 'Test my mail')){
        $result = array("msg" => "ok", "data" => "El email fue enviado.");
    }else{
        $result = array("msg" => "error", "data" => "El email no fue enviado.");
    }
    
    //$template = new Core_template('admin/reserva/correo.php');
    //$template->setAttribute('reserva', $reserva_array);
    //$result = array("msg" => "ok", "data" => "Opiniones encontradas.", 'idReservacion' => '', 'html' => $template->getContent());
}

echo json_encode($result);
?>

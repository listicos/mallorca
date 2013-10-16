<?php

$usuario_core->validateUser();
$action = $_POST["action"];
$result = array("msg" => "error", "data" => "Tu no tienes suficientes permisos.");

if (strcmp($action, "getEmailToOverlay") == 0) {
    if (isset($_POST['idOpinion'])) {

        $template = new Core_template('admin/opinion/correo.php');
        $opinion = getOpinion($_POST['idOpinion']);
        $template->setAttribute('opinion', $opinion);
        $to = getUsuario($opinion->idUsuario);
        $template->setAttribute('to', $to);
        $from = $usuario_core->getUsuario();
        $template->setAttribute('from', $from);
        $result = array("msg" => "ok", "data" => "Opiniones encontradas.", 'idOpinion' => '', 'html' => $template->getContent());
    } else {
        $result = array("msg" => "error", "data" => "Reservación no encontrada.");
    }
}

if (strcmp($action, "sendEmailFromOverlay") == 0) {

    $mailer = new Core_Mailer();
    $opinion = getOpinion($_POST['idOpinion']);
    $from = $usuario_core->getUsuario();
    $to = getUsuario($opinion->idUsuario);
    $subject = $_POST['subject'];
    $body = $_POST['body'];
    if($mailer->send_email($to->email, $subject, $body)){
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

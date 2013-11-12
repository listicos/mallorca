<?php

include_once 'Logic/suscripciones.php';

$action = $_POST["action"];
$result = array("msg" => "error", "data" => "No tienes los permisos suficientes");



if(isset($_POST['email'])){
    $data = array();
    $data['email'] = $_POST['email'];
    
    if(insertSuscripcion($data)) {
        $result['msg'] = 'ok';
        $result['data'] = 'Se guardaron los datos correctamente';
    } else {
        $result['data'] = 'No se guardaron los datos correctamente.';
    }
}

echo json_encode($result);
?>

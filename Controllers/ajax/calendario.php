<?php

$action = $_POST["action"];
$result = array("msg" => "error", "data" => "Tu no tienes suficnetes permisos.");

if (strcmp($action, "getTarifas") == 0) {
    if (isset($_POST['idApartamento'])) {
        $tarifas = getDisponibilidadByApartamento($_POST['idApartamento']);
        $result = array("msg" => "ok", "data" => "Tarifas obtenidas", "tarifas" => $tarifas);
    } else {
        $result = array("msg" => "error", "data" => "idApartamento es necesario.");
    }
}


echo json_encode($result);
?>

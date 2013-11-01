<?php



$usuario_core->validateUser();
$action = $_POST["action"];
$result = array("msg" => "error", "data" => "You do not have sufficient permissions.");

if(strcmp($action, "updateComplejo") == 0) {
    $nombre = $_POST['nombre'];
    $data = array('nombre' => $nombre);
    if(isset($_POST['complejoId'])) {
        $complejoId = $_POST['complejoId'];
        $complejoId = updateComplejo($complejoId, $data);
    } else {
        $complejoId = insertComplejo($data);
    }
    
    if($complejoId) {
        $result['msg'] = 'ok';
        $result['data'] = 'Se guardaron los cambios correctamente';
    } else {
        $result['data'] = 'No se guardaron los cambios';
    }
}

echo json_encode($result);
?>

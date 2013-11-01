<?php

include_once 'Logic/canales.php';

$usuario_core->validateUser();
$action = $_POST["action"];
$result = array("msg" => "error", "data" => "Tu no tienes suficientes permisos.");


if (strcmp($action, "updateCanal") == 0) {
    
    $data = array(
        'nombre' => NULL,
        'comision' => 0,
        'senia' => 0,
        'diasTolerancia' => 0,
        'porcentajeComision' => 0
    );
    
    foreach (array_keys($data) as $k) {
        if(isset($_POST[$k]))
            $data[$k] = $_POST[$k];
    }
    
    if(isset($_POST['idCanal']))
        $idCanal = $_POST['idCanal'];
    
    if($idCanal) {
        $idCanal = updateCanal($idCanal, $data);
    } else {
        $idCanal = insertCanal($data);
    }
    
    if($idCanal) {
        $result['msg'] = 'ok';
        $result['data'] = 'Se guardaron los datos correctamente';
        $result['idCanal'] = $idCanal;
    }
    
}

echo json_encode($result);

?>

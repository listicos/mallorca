<?php

include_once 'Logic/politicas.php';

$result = array("msg" => "error", "data" => "You do not have sufficient permissions.");
$usuario_core->validateUser();

$action = $_POST['action'];

if(strcmp($action, "updatePolitica") == 0) {
    $data = array(
        'nombre' => NULL,
        'reembolsoDia' => NULL,
        'comision' => NULL,
        'reembolsoPorcentaje' => NULL
    );
    
    $keys = array_keys($data);
    
    foreach ($keys as $key) {
        if(isset($_POST[$key]))
            $data[$key] = $_POST[$key];
    }
    
    if(!isset($_POST['politicaId'])) {
        $politicaId = insertPolitica($data);
    } else {
        $politicaId = $_POST['politicaId'];
        $updated = updatePolitica($politicaId, $data);
    }
    
    if($politicaId) {
        $result['msg'] = 'ok';
        $result['data'] = 'Se guardaron los cambios correctamente.';
        $result['politicaId'] = $politicaId;
    }
    
    
}

echo json_encode($result);

?>

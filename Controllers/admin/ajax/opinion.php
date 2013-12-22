<?php

include_once 'Logic/opiniones.php';

$result = array("msg" => "error", "data" => "You do not have sufficient permissions.");
$usuario_core->validateUser();

$action = $_POST['action'];

if(strcmp($action, "update") == 0) {
    $data = array(
        'idApartamento' => NULL,
        'idUsuario' => NULL,
        'puntuacion' => NULL,
        'opinion' => NULL
    );
    
    $keys = array_keys($data);
    
    foreach ($keys as $key) {
        if(isset($_POST[$key]))
            $data[$key] = $_POST[$key];
    }
    
    if(!isset($_POST['opinionId'])) {
        $opinionId = insertOpinion($data);
    } else {
        $opinionId = $_POST['opinionId'];
        $updated = updateOpinion($opinionId, $data);
    }
    
    if($opinionId) {
        $result['msg'] = 'ok';
        $result['data'] = 'Se guardaron los cambios correctamente.';
        $result['opinionId'] = $opinionId;
    }
    
    
}

echo json_encode($result);

?>

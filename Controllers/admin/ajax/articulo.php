<?php

$result = array("msg" => "error", "data" => "You do not have sufficient permissions.");
$usuario_core->validateUser();

$action = $_POST['action'];

if(strcmp($action, "updateArticulo") == 0) {
    $data = array(
        'nombre' => NULL,
        'codigo' => NULL,
        'idArticuloTipo' => NULL,
        'precioBase' => NULL,
        'idIdioma' => NULL,
        'descripcion' => NULL
    );
    
    $keys = array_keys($data);
    
    foreach ($keys as $key) {
        if(isset($_POST[$key]))
            $data[$key] = $_POST[$key];
    }
    
    if(!isset($_POST['articuloId'])) {
        $articuloId = insertArticulo($data);
    } else {
        $articuloId = $_POST['articuloId'];
        $updated = updateArticulo($articuloId, $data);
    }
    
    if($articuloId) {
        $result['msg'] = 'ok';
        $result['data'] = 'Se guardaron los cambios correctamente.';
        $result['articuloId'] = $articuloId;
    }
    
    
}

echo json_encode($result);

?>

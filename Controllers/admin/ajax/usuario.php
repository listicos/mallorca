<?php

$usuario_core->validateUser();

$result = array('msg'=>'error', 'data'=>'');

if(isset($_POST['action']))
    $action = $_POST['action'];

if(strcmp($action, "updateUsuario") == 0) {
    
    $data = array(
        'nombre' => NULL,
        'apellidoPaterno' => NULL,
        'apellidoMaterno' => NULL,
        'email' => NULL,
        'idUsuarioGrupo' => NULL,
        'telefono' => NULL,
        'telefonoAlterno' => NULL
    );
    
    foreach (array_keys($data) as $k) {
        if(isset($_POST[$k])) {
            $data[$k] = $_POST[$k];
        }
    }
    
    if(isset($_POST['password']) && count($_POST['password']) > 0)
        $data['password'] = $_POST['password'];
    
    if(isset($_POST['idUsuario'])) {
        $idUsuario = updateUsuario($_POST['idUsuario'], $data); 
    } else {
        $idUsuario = insertUsuario($data);
    }
    
    if($idUsuario) {
        $result['msg'] = 'ok';
        $result['data'] = 'Se guardaron los cambios correctamente';
    }
    
}

if(strcmp($action, "deleteUsuario") == 0) {
    if(isset($_POST['idUsuario'])) {
        $idUsuario = $_POST['idUsuario'];
        
        $d = deleteUsuario($idUsuario);
        
        if($d) {
            $result['msg'] = 'ok';
            $result['data'] = 'Se eliminó el usuario correctamente';
        } else {
            $result['data'] = 'No se pudo eliminar el usuario';
        }
    }
}

echo json_encode($result);

?>

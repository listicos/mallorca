<?php

$usuario_core->validateUser();

AllowRoles("Administrador, Mallorca");

$action = $_POST["action"];
$result = array("msg" => "error", "data" => "You do not have sufficient permissions.");

if(strcmp($action, "updateConfiguracion") == 0) {
    $data = array(
        'email' => NULL,
        'password' => NULL,
        'username' => NULL,
        'servidor' => NULL,
        'puerto' => 0,
        'nombreEmpresa' => NULL,
        'empresaCif' => NULL,
        'telefonosContacto' => NULL,
        'emailContacto' => NULL,
        'facebook' => NULL,
        'twitter' => NULL,
        'vimeo' => NULL,
        'rss' => NULL
    );
    
    foreach (array_keys($data) as $key)
        if(isset ($_POST[$key]))
            $data[$key] = $_POST[$key];
        
    $data_direccion = array(
        'calle' => NULL,
        'numero' => NULL,
        'provincia' => NULL,
        'codigoPostal' => NULL,
        'idPais' => NULL,
        'lat' => NULL,
        'lon' => NULL
    );
    
    foreach (array_keys($data_direccion) as $key)
        if(isset ($_POST[$key]))
            $data_direccion[$key] = $_POST[$key];
        
    if(setConfiguracion($data, $data_direccion)) {
        $result['msg'] = 'ok';
        $result['data'] = 'Se guardaron los datos correctamente';
    } else {
        $result['data'] = 'No se guardaron los datos correctamente';
    }
}

echo json_encode($result);

?>

<?php

//$usuario_core->validateUser();
$action = $_POST["action"];
$result = array("msg" => "error", "data" => "No tienes los permisos suficientes");

if (strcmp($action, "insert") == 0) {

    $data = array();

    if (isset($_POST['nombre']))
        $data['nombre'] = $_POST['nombre'];
    if (isset($_POST['apellidoPaterno']))
        $data['apellidoPaterno'] = $_POST['apellidoPaterno'];
    if (isset($_POST['apellidoMaterno']))
        $data['apellidoMaterno'] = $_POST['apellidoMaterno'];
    if (isset($_POST['email']))
        $data['email'] = $_POST['email'];
    if (isset($_POST['password']))
        $data['password'] = $_POST['password'];

    $data['estatus'] = 'activo';
    $data['idUsuarioGrupo'] = '2';
    $data['tiempoCreacion'] = date('Y-m-d H:i:s');
    $data['ultimaModificacion'] = date('Y-m-d H:i:s');

    $usuario_id = insertUsuario($data);
    if ($usuario_id) {
        $usuario = getUsuario($usuario_id);
        $usuario_core->setUsuario($usuario);
        $result = array("msg" => "ok", "data" => "Usuario creado correctamente.");
    } else {
        $result = array("msg" => "error", "data" => "No se pudo crear el usuario.");
    }
}

if (strcmp($action, "editarPerfil") == 0) {
    $data = array();

    if (isset($_POST['nombre']))
        $data['nombre'] = $_POST['nombre'];
    if (isset($_POST['apellidoPaterno']))
        $data['apellidoPaterno'] = $_POST['apellidoPaterno'];
    if (isset($_POST['apellidoMaterno']))
        $data['apellidoMaterno'] = $_POST['apellidoMaterno'];
    if (isset($_POST['email']))
        $data['email'] = $_POST['email'];
    if (isset($_POST['telefono']))
        $data['telefono'] = $_POST['telefono'];
    if (isset($_POST['password']))
        $data['password'] = $_POST['password'];

    $data['ultimaModificacion'] = date('Y-m-d H:i:s');

    $usuario_edit = updateUsuario($_POST['idUsuario'], $data);
    if ($usuario_edit) {
        $result = array("msg" => "ok", "data" => "Los cambios se han guardado correctamente.");
    } else {
        $result = array("msg" => "error", "data" => "Los datos no se pudieron guardar, intente de nuevo.");
    }
}

echo json_encode($result);
?>

<?php

$usuario_core->validateUser();
$action = $_POST["action"];
$result = array("msg" => "error", "data" => "You do not have sufficient permissions.");

if (strcmp($action, "insert") == 0) {
    $data_contrato = array();

    if (isset($_POST['nombre']))
        $data_contrato['nombre'] = $_POST['nombre'];
    if (isset($_POST['precio']))
        $data_contrato['precio'] = $_POST['precio'];
    if (isset($_POST['porcentaje']))
        $data_contrato['porcentaje'] = $_POST['porcentaje'];
    if (isset($_POST['descripcion']))
        $data_contrato['descripcion'] = $_POST['descripcion'];

    $data_contrato['tiempoCreacion'] = date('Y-m-d H:i:s');
    $data_contrato['ultimaModificacion'] = date('Y-m-d H:i:s');

    $new_contrato_id = insertContrato($data_contrato);

    if ($new_contrato_id) {
        $result['msg'] = 'ok';
        $result['data'] = 'El Contrato se agregó correctamente.';
    } else {
        $result['msg'] = 'error';
        $result['data'] = 'Ocurrió un error, no se pudo guardar el contrato.';
    }
}

if (strcmp($action, "update") == 0) {

    if (isset($_POST['idContrato']) && is_numeric($_POST['idContrato'])) {
        $data_contrato = array();

        if (isset($_POST['nombre']))
            $data_contrato['nombre'] = $_POST['nombre'];
        if (isset($_POST['precio']))
            $data_contrato['precio'] = $_POST['precio'];
        if (isset($_POST['porcentaje']))
            $data_contrato['porcentaje'] = $_POST['porcentaje'];
        if (isset($_POST['descripcion']))
            $data_contrato['descripcion'] = $_POST['descripcion'];

        $data_contrato['ultimaModificacion'] = date('Y-m-d H:i:s');

        $new_contrato = updateContrato($_POST['idContrato'], $data_contrato);

        if ($new_contrato) {
            $result['msg'] = 'ok';
            $result['data'] = 'Los cambios se han guardado correctamente.';
        } else {
            $result['msg'] = 'error';
            $result['data'] = 'Ocurrió un error, no se pudo guardar el contrato.';
        }
    } else {
        $result['msg'] = 'error';
        $result['data'] = 'No se ha encontrado el contrato.';
    }
}

echo json_encode($result);
?>

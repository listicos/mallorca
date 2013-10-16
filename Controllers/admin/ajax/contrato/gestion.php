<?php
$usuario_core->validateUser();
$action = $_POST["action"];
$result = array("msg" => "error", "data" => "Tu no tienes suficientes permisos.");

if (strcmp($action, "getContratosByEmpresa") == 0) {
    if (isset($_POST['idEmpresa'])) {
        $contato_data = array();
        $empresas_contratos = getContratoEmpresa($_POST['idEmpresa']);
        if($empresas_contratos && count($empresas_contratos)>0){
        	foreach ($empresas_contratos as $c_k => $e_c) {
                $contato_data[$c_k] = getContrato($e_c->idContrato);
        	}
            $result = array("msg" => "ok", "data" => $contato_data);
        }else{
        	$result = array("msg" => "error", "data" => "La empresa no cuenta con contratos asignados");
        }
    } else {
        $result = array("msg" => "error", "data" => "Empresa es necesaria.");
    }
}
if (strcmp($action, "get") == 0) {
    if (isset($_POST['idContrato'])) {
        $contrato = getContratosByContratoEmpresaId($_POST['idEmpresa'],$_POST['idContrato']);
        if($contrato && count($contrato)>0){
            $contrato = array_pop($contrato);
            $contrato['contratoEmpresa']->fechaFin = date('d/m/Y',strtotime($contrato['contratoEmpresa']->fechaFin));
            $contrato['contratoEmpresa']->fechaInicio = date('d/m/Y',strtotime($contrato['contratoEmpresa']->fechaInicio));
            
            $result = array("msg" => "ok", "data" => $contrato);
        }else{
            $result = array("msg" => "error", "data" => "No se encontró contrato.");
        }
    } else {
        $result = array("msg" => "error", "data" => "Contrato es necesario.");
    }
}
if (strcmp($action, "deleteEmpresaContrato") == 0) {
    if (isset($_POST['idEmpresaContrato'])) {
        if(deleteEmpresaContrato($_POST['idEmpresaContrato'])){
            $result = array("msg" => "ok", "data" => "El contrato ha sido removido de la empresa.");
        }else{
            $result = array("msg" => "error", "data" => "El contrato que intenta eliminar ya esta asignado.");
        }
    }else {
        $result = array("msg" => "error", "data" => "idEmpresaContrato es necesario.");
    }
}

echo json_encode($result);
?>
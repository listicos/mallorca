<?php

include_once 'Logic/mantenimiento.php';

$usuario_core->validateUser();
$action = $_POST["action"];
$result = array("msg" => "error", "data" => "Tu no tienes suficientes permisos.");

if (strcmp($action, "searchByArgs") == 0) {
    if (isset($_POST['query'])) {

        $limit = 20;
        if (isset($_POST['limit']))
            $limit = $_POST['limit'];

        $data = array('query' => $_POST['query'], 'type' => $_POST['type'], 'filter' => $_POST['filter'], 'limit' => $limit, 'page' => 0);
        
        $mantenimientos = searchMantenimientos($data);

        if ($mantenimientos && count($mantenimientos) > 0) {         
            
            $template = new Core_template('admin/mantenimientos/filtros.php');
            $template->setAttribute('mantenimientos', $mantenimientos);
            $result = array("msg" => "ok", "data" => "Mantenimientos encontrados.", 'html' => $template->getContent());
        } else {
            $result = array("msg" => "ok", "data" => "No se encontraron mantenimientos.", 'html' => '<p class="no_results_found">No se encontraron mantenimientos</p>');
        }
    } 
}

else if(strcmp($action, 'deleteMantenimiento') == 0) {
    if(isset($_POST['mantenimientoId'])) {
        $mantenimientoId = $_POST['mantenimientoId'];
        
        $d = deleteMantenimiento($mantenimientoId);
        
        if($d) {
            $result['msg'] = 'ok';
            $result['data'] = 'Se guardaron los cambios correctamente';
        }
        
    }
}

else if(strcmp($action, 'printMantenimiento') == 0) {
    if(isset($_POST['mantenimientoId'])) {
        $mantenimientoId = $_POST['mantenimientoId'];

        $m = getMantenimiento($mantenimientoId);
        //var_dump($m);        
        if($m) {
            
            $template = new Core_template('admin/mantenimientos/imprimir.php');
            $template->setAttribute('mantenimiento', $m);
            
            $result = array("msg" => "ok", "data" => "Mantenimiento encontrados.", 'idmantenimiento' => '', 'html' => $template->getContent());
            //var_dump($result); 
        }
        
    }
}

else if(strcmp($action, 'cambiarEstatus') == 0) {
    if(isset($_POST['mantenimientoId'])) {
        $mttoId = $_POST['mantenimientoId'];
        $estatus = $_POST['estatus'];
        $d = cambiarEstatusMantenimiento($mttoId, $estatus);
        
        if($d) {
            $result['msg'] = 'ok';
            $result['data'] = 'Se guardaron los cambios correctamente';
        }
        
    }
}

echo json_encode($result);

?>

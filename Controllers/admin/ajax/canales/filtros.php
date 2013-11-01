<?php

include_once 'Logic/canales.php';

$usuario_core->validateUser();
$action = $_POST["action"];
$result = array("msg" => "error", "data" => "Tu no tienes suficientes permisos.");

if (strcmp($action, "searchByArgs") == 0) {
    if (isset($_POST['query'])) {

        $limit = 20;
        if (isset($_POST['limit']))
            $limit = $_POST['limit'];

        $data = array('query' => $_POST['query'], 'type' => $_POST['type'], 'filter' => $_POST['filter'], 'limit' => $limit, 'page' => 0);
        
        $canales = searchCanales($data);

        if ($canales && count($canales) > 0) {         
            
            $template = new Core_template('admin/canales/filtros.php');
            $template->setAttribute('canales', $canales);
            $result = array("msg" => "ok", "data" => "Canales encontrados.", 'html' => $template->getContent());
        } else {
            $result = array("msg" => "ok", "data" => "No se encontraron canales.", 'html' => '<p class="no_results_found">No se encontraron canales/p>');
        }
    } 
}

else if(strcmp($action, 'deleteCanal') == 0) {
    if(isset($_POST['canalId'])) {
        $canalId = $_POST['canalId'];
        
        $d = deleteCanal($canalId);
        
        if($d) {
            $result['msg'] = 'ok';
            $result['data'] = 'Se guardaron los cambios correctamente';
        }
        
    }
}


echo json_encode($result);
?>

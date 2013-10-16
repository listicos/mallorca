<?php

include_once 'Logic/articulos.php';

$usuario_core->validateUser();
$action = $_POST["action"];
$result = array("msg" => "error", "data" => "Tu no tienes suficientes permisos.");

if (strcmp($action, "searchByArgs") == 0) {
    if (isset($_POST['query'])) {

        $limit = 20;
        if (isset($_POST['limit']))
            $limit = $_POST['limit'];

        $data = array('query' => $_POST['query'], 'type' => $_POST['type'], 'filter' => $_POST['filter'], 'limit' => $limit, 'page' => 0);
        
        $articulos = searchArticulos($data);

        if ($articulos && count($articulos) > 0) {
            
            
            $template = new Core_template('admin/articulos/filtros.php');
            $template->setAttribute('articulos', $articulos);
            $result = array("msg" => "ok", "data" => "Artículos encontrados.", 'html' => $template->getContent());
        } else {
            $result = array("msg" => "ok", "data" => "No se encontraron artículos.", 'html' => '<p class="no_results_found">No se encontraron artículos</p>');
        }
    } 
}

else if(strcmp($action, 'deleteArticulo') == 0) {
    if(isset($_POST['articuloId'])) {
        $articuloId = $_POST['articuloId'];
        
        $d = deleteArticulo($articuloId);
        
        if($d) {
            $result['msg'] = 'ok';
            $result['data'] = 'Se guardaron los cambios correctamente';
        }
        
    }
}

echo json_encode($result);
?>

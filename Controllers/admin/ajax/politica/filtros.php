<?php

include_once 'Logic/politicas.php';

$usuario_core->validateUser();
$action = $_POST["action"];
$result = array("msg" => "error", "data" => "Tu no tienes suficientes permisos.");

if (strcmp($action, "searchByArgs") == 0) {
    if (isset($_POST['query'])) {

        $limit = 20;
        if (isset($_POST['limit']))
            $limit = $_POST['limit'];

        $data = array('query' => $_POST['query'], 'type' => $_POST['type'], 'filter' => $_POST['filter'], 'limit' => $limit, 'page' => 0);
        
        $politicas = searchPoliticas($data);

        if ($politicas && count($politicas) > 0) {
            
            
            $template = new Core_template('admin/politicas/filtros.php');
            $template->setAttribute('politicas', $politicas);
            $result = array("msg" => "ok", "data" => "Políticas encontradas.", 'html' => $template->getContent());
        } else {
            $result = array("msg" => "ok", "data" => "No se encontraron políticas.", 'html' => '<p class="no_results_found">No se encontraron políticas</p>');
        }
    } 
}

else if(strcmp($action, 'deletePolitica') == 0) {
    if(isset($_POST['politicaId'])) {
        $politicaId = $_POST['politicaId'];
        
        $d = deletePolitica($politicaId);
        
        if($d) {
            $result['msg'] = 'ok';
            $result['data'] = 'Se guardaron los cambios correctamente';
        }
        
    }
}

echo json_encode($result);
?>

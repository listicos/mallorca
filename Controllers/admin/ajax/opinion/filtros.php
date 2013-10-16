<?php

$usuario_core->validateUser();
$action = $_POST["action"];
$result = array("msg" => "error", "data" => "Tu no tienes suficientes permisos.");

if (strcmp($action, "searchByArgs") == 0) {
    if (isset($_POST['query'])) {
        
        $limit = 20;
        if(isset($_POST['limit']))
            $limit = $_POST['limit'];
        
        $opiniones = searchOpiniones(array('query' => $_POST['query'], 'type' => $_POST['type'], 'filter' => $_POST['filter'], 'limit' => $limit, 'page' => 0));
        //$opiniones = array();
        if ($opiniones && count($opiniones) > 0) {
            foreach ($opiniones as $key => $opi) {
                $opiniones[$key]->apartamento = getApartamento($opi->idApartamento)->nombre;
            }
            $template = new Core_template('admin/opinion/filtros.php');
            $template->setAttribute('opiniones', $opiniones);
            $result = array("msg" => "ok", "data" => "Opiniones encontradas.", 'html' => $template->getContent());
        } else {
            $result = array("msg" => "ok", "data" => "No se encontraron opiniones.", 'html' => '<p class="no_results_found">No se encontraron opiniones</p>');
        }
    } else {
        $result = array("msg" => "error", "data" => "No has selecionado tu orden.");
    }
}

else if(strcmp($action, 'deleteOpinion') == 0) {
    if(isset($_POST['opinionId'])) {
        $opinionId = $_POST['opinionId'];
        
        $d = deleteOpinion($opinionId);
        
        if($d) {
            $result['msg'] = 'ok';
            $result['data'] = 'Se guardaron los cambios correctamente';
        }
        
    }
}

echo json_encode($result);
?>

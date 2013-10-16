<?php

$usuario_core->validateUser();
$action = $_POST["action"];
$result = array("msg" => "error", "data" => "Tu no tienes suficientes permisos.");

if (strcmp($action, "searchByArgs") == 0) {
    if (isset($_POST['query'])) {
        
        $limit = 20;
        if(isset($_POST['limit']))
            $limit = $_POST['limit'];
        
        $contratos = searchContratos(array('query' => $_POST['query'], 'type' => $_POST['type'], 'filter' => $_POST['filter'], 'limit' => $limit, 'page' => 0));
        //var_dump($opiniones);
        if ($contratos && count($contratos) > 0) {
            /*foreach ($opiniones as $key => $opi) {
                $opiniones[$key]['apartamento'] = getApartamento($opi['id_apartamento'])->nombre;
            }*/
            $template = new Core_template('admin/contrato/filtros.php');
            $template->setAttribute('contratos', $contratos);
            $result = array("msg" => "ok", "data" => "Contratos encontradas.", 'html' => $template->getContent());
        } else {
            $result = array("msg" => "ok", "data" => "No se encontraron contratos.", 'html' => '<p class="no_results_found">No se encontraron contratos</p>');
        }
    } else {
        $result = array("msg" => "error", "data" => "No has selecionado tu orden.");
    }
}

echo json_encode($result);
?>

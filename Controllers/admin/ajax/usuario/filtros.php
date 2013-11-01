<?php

include_once 'Logic/clientes.php';

$usuario_core->validateUser();
$action = $_POST["action"];
$result = array("msg" => "error", "data" => "Tu no tienes suficientes permisos.");

if (strcmp($action, "searchByArgs") == 0) {
    if (isset($_POST['query'])) {

        $limit = 20;
        if (isset($_POST['limit']))
            $limit = $_POST['limit'];

        $data = array('query' => $_POST['query'], 'type' => $_POST['type'], 'filter' => $_POST['filter'], 'limit' => $limit, 'page' => 0);
        
        $usuarios = searchUsuarios($data);

        if ($usuarios && count($usuarios) > 0) {
            
            
            $template = new Core_template('admin/usuario/filtros.php');
            $template->setAttribute('usuarios', $usuarios);
            $result = array("msg" => "ok", "data" => "Usuarios encontrados.", 'html' => $template->getContent());
        } else {
            $result = array("msg" => "ok", "data" => "No se encontraron usuarios.", 'html' => '<p class="no_results_found">No se encontraron usuarios</p>');
        }
    } 
}



echo json_encode($result);
?>

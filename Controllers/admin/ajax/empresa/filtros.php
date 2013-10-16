<?php

$usuario_core->validateUser();
$action = $_POST["action"];
$result = array("msg" => "error", "data" => "Tu no tienes suficientes permisos.");

if (strcmp($action, "searchByArgs") == 0) {
    if (isset($_POST['query'])) {
        
        $limit = 20;
        if(isset($_POST['limit']))
            $limit = $_POST['limit'];
        
        $empresas = searchEmpresas(array('query' => $_POST['query'], 'type' => $_POST['type'], 'filter' => $_POST['filter'], 'limit' => $limit, 'page' => 0));
        //$opiniones = array();
        if ($empresas && count($empresas) > 0) {
            /*foreach ($opiniones as $key => $opi) {
                $opiniones[$key]->apartamento = getApartamento($opi->idApartamento)->nombre;
            }*/
            $template = new Core_template('admin/empresa/filtros.php');
            $template->setAttribute('empresas', $empresas);
            $result = array("msg" => "ok", "data" => "Empresas encontradas.", 'html' => $template->getContent());
        } else {
            $result = array("msg" => "ok", "data" => "No se encontraron empresas.", 'html' => '<p class="no_results_found">No se encontraron empresas</p>');
        }
    } else {
        $result = array("msg" => "error", "data" => "No has selecionado tu orden.");
    }
}

else if (strcmp($action, "verAptos") == 0) {
    if(isset($_POST['empresaId'])) {
        $template = new Core_template('admin/apartamento/lista.php');
        $template->setAttribute('empresaId', $_POST['empresaId']);
        $template->setJS('admin/lista-apartamento.js');
        $result['html'] = $template->getContent();
        $result['js'] = $template->getJS();
    }
}

else if (strcmp($action, "verReservas") == 0) {
    if(isset($_POST['empresaId'])) {
        $template = new Core_template('admin/reserva/lista.php');
        $template->setAttribute('empresaId', $_POST['empresaId']);
        $template->setAttribute ('apartamentos', getApartamentosByEmpresa($_POST['empresaId']));
        $template->setJS('admin/lista-reserva.js');
        $result['html'] = $template->getContent();
        $result['js'] = $template->getJS();
    }
}

else if(strcmp($action, 'deleteEmpresa') == 0) {
    if(isset($_POST['empresaId'])) {
        $empresaId = $_POST['empresaId'];
        
        $d = deleteEmpresa($empresaId);
        
        if($d) {
            $result['msg'] = 'ok';
            $result['data'] = 'Se guardaron los cambios correctamente';
        }
        
    }
}

echo json_encode($result);
?>

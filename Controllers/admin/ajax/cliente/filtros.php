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
        
        $clientes = searchClientes($data);

        if ($clientes && count($clientes) > 0) {
            
            /*$apartamentos_array = array();
            foreach ($apartamentos as $key => $ap) {
                $apartamentos_array[$key]['apartamento'] = $ap;
                $apartamentos_array[$key]['direccion'] = getDireccion($ap->idDireccion);
                $empresaContrato = getEmpresaContrato($ap->idEmpresaContrato);
                $empresa = getEmpresa($empresaContrato->idEmpresa);
                $apartamentos_array[$key]['empresa'] = $empresa;
            }*/
            $template = new Core_template('admin/cliente/filtros.php');
            $template->setAttribute('clientes', $clientes);
            $result = array("msg" => "ok", "data" => "Clientes encontrados.", 'html' => $template->getContent());
        } else {
            $result = array("msg" => "ok", "data" => "No se encontraron clientes.", 'html' => '<p class="no_results_found">No se encontraron clientes</p>');
        }
    } 
}


else if (strcmp($action, "verReservas") == 0) {
    if(isset($_POST['usuarioId'])) {
        $template = new Core_template('admin/reserva/lista.php');
        $template->setAttribute('usuarioId', $_POST['usuarioId']);
        $template->setJS('admin/lista-reserva.js');
        $result['html'] = $template->getContent();
        $result['js'] = $template->getJS();
    }
}

echo json_encode($result);
?>

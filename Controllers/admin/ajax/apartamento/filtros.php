<?php

$usuario_core->validateUser();
$action = $_POST["action"];
$result = array("msg" => "error", "data" => "Tu no tienes suficientes permisos.");

if (strcmp($action, "searchByArgs") == 0) {
    if (isset($_POST['query'])) {

        $limit = 20;
        if (isset($_POST['limit']))
            $limit = $_POST['limit'];

        $data = array('query' => $_POST['query'], 'type' => $_POST['type'], 'filter' => $_POST['filter'], 'limit' => $limit, 'page' => 0);
        if(isset($_POST['empresaId']))
            $data['empresaId'] = $_POST['empresaId'];
        $apartamentos = searchApartamentos($data);

        if ($apartamentos && count($apartamentos) > 0) {
            
            $apartamentos_array = array();
            foreach ($apartamentos as $key => $ap) {
                $apartamentos_array[$key]['apartamento'] = $ap;
                $apartamentos_array[$key]['direccion'] = getDireccion($ap->idDireccion);
                $empresaContrato = getEmpresaContrato($ap->idEmpresaContrato);
                $empresa = getEmpresa($empresaContrato->idEmpresa);
                $apartamentos_array[$key]['empresa'] = $empresa;
            }
            $template = new Core_template('admin/apartamento/filtros.php');
            $template->setAttribute('apartamentos', $apartamentos_array);
            $result = array("msg" => "ok", "data" => "Apartamentos encontradas.", 'html' => $template->getContent());
        } else {
            $result = array("msg" => "ok", "data" => "No se encontraron apartamentos.", 'html' => '<p class="no_results_found">No se encontraron apartamentos</p>');
        }
    } else {
        $result = array("msg" => "error", "data" => "No has selecionado tu orden.");
    }
}

else if(strcmp($action, 'deleteApartamento') == 0) {
    if(isset($_POST['apartamentoId'])) {
        $apartamentoId = $_POST['apartamentoId'];
        
        $d = deleteApartamento($apartamentoId);
        
        if($d) {
            $result['msg'] = 'ok';
            $result['data'] = 'Se guardaron los cambios correctamente';
        }
        
    }
}

else if(strcmp($action, 'cambiarEstatus') == 0) {
    if(isset($_POST['apartamentoId'])) {
        $apartamentoId = $_POST['apartamentoId'];
        
        $d = cambiarEstatusApartamento($apartamentoId);
        
        if($d) {
            $result['msg'] = 'ok';
            $result['data'] = 'Se guardaron los cambios correctamente';
        }
        
    }
}

else if(strcmp($action, 'reservar') == 0) {
    if(isset($_POST['aptoId'])) {
        $aptoId = $_POST['aptoId'];
        $template = new Core_template('admin/reserva/ver.php');
        
        $usuarios = getClientes();

        $template->setAttribute('usuarios', $usuarios);
        
        $template->setAttribute('apartamentoId', $aptoId);
        $template->setJS('admin/ver-reserva.js');
        $result['html'] = $template->getContent();
        $result['js'] = $template->getJS();
    }
}


echo json_encode($result);
?>

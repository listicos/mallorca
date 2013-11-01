<?php

$usuario_core->validateUser();
$action = $_POST["action"];
$result = array("msg" => "error", "data" => "Tu no tienes suficientes permisos.");

if (strcmp($action, "searchByArgs") == 0) {
    if (isset($_POST['query'])) {
        
        $limit = 20;
        if(isset($_POST['limit']))
            $limit = $_POST['limit'];
        
        $args= array();
        $args['query'] = $_POST['query'];
        $args['prop'] = $_POST['prop'];
        $args['type'] = $_POST['type'];
        $args['filter'] = $_POST['filter'];
        $args['page'] = 0;
        $args['limit'] = $limit;
        
        if(isset($_POST['dateStartFrom']) && $_POST['dateStartFrom']!='')
            $args['dateStartFrom'] = date('Y-m-d H:i:s', strtotime($_POST['dateStartFrom']));
        else
            $args['dateStartFrom'] = '0';
        
        if(isset($_POST['dateStartTo']) && $_POST['dateStartTo']!='')
            $args['dateStartTo'] = date('Y-m-d H:i:s', strtotime($_POST['dateStartTo']));
        else
            $args['dateStartTo'] = '9999-99-99 00:00:00';
        
        if(isset($_POST['dateEndFrom']) && $_POST['dateEndFrom']!='')
            $args['dateEndFrom'] = date('Y-m-d H:i:s', strtotime($_POST['dateEndFrom']));
        else
            $args['dateEndFrom'] = '0';

        if(isset($_POST['dateEndTo']) && $_POST['dateEndTo']!='')
            $args['dateEndTo'] = date('Y-m-d H:i:s', strtotime($_POST['dateEndTo']));
        else
            $args['dateEndTo'] = '9999-99-99 00:00:00';
        
        if(isset($_POST['empresaId']))
            $args['empresaId'] = $_POST['empresaId'];
        
        if(isset($_POST['idApartamento']) && $_POST['idApartamento'] != 0)
            $args['idApartamento'] = $_POST['idApartamento'];

        if(isset($_POST['usuarioId']))
            $args['usuarioId'] = $_POST['usuarioId'];
        
        $reservas = searchReservas($args);
        //$opiniones = array();
        if ($reservas && count($reservas) > 0) {
            foreach ($reservas as $key => $reserva) {
                $reservas[$key]->noches = ((strtotime($reserva->fechaSalida) - strtotime($reserva->fechaEntrada)) / (60*60*24));
                $reservas[$key]->fechaEntrada = date('d/m/Y', strtotime($reserva->fechaEntrada));
                $reservas[$key]->fechaSalida = date('d/m/Y', strtotime($reserva->fechaSalida));
            }
            $template = new Core_template('admin/reserva/filtros.php');
            $template->setAttribute('reservas', $reservas);
            $result = array("msg" => "ok", "data" => "Reservas encontradas.", 'html' => $template->getContent());
        } else {
            $result = array("msg" => "ok", "data" => "No se encontraron reservas.", 'html' => '<p class="no_results_found">No se encontraron reservas</p>');
        }
    } else {
        $result = array("msg" => "error", "data" => "No has selecionado tu orden.");
    }
}

else if(strcmp($action, 'cambiarEstatus') == 0) {
    if(isset($_POST['reservaId'])) {
        $reservaId = $_POST['reservaId'];
        $estatus = $_POST['estatus'];
        $d = cambiarEstatusReserva($reservaId, $estatus);
        
        if($d) {
            $result['msg'] = 'ok';
            $result['data'] = 'Se guardaron los cambios correctamente';
        }
        
    }
}

else if (strcmp($action, "articulosByApto") == 0) { 

    $aptoid = $_POST['apartamentoId'];
    
    $articulos = getArticulosListByApartamento($aptoid);
    
    $result['msg'] = 'ok';
    $result['data'] = $articulos;
    
}

echo json_encode($result);
?>

<?php

$usuario_core->validateUser();

$result = array('msg'=>'error', 'data'=>'');

if(isset($_POST['action']))
    $action = $_POST['action'];

if(strcmp($action, "getAptos") == 0) {
    $term = $_POST['term'];
    $aptos = searchApartamentosByNombre($term);
    
    
    
    $result['lista'] = $aptos;
    
}

else if(strcmp($action, "searchUser") == 0) {
    $term = $_POST['term'];
    $usuarios = searchUsuariosByTerm(array('query'=>$term));
    $result['msg'] = 'ok';
    $result['lista'] = $usuarios;
    
}

else if(strcmp($action, "loadUserDetails") == 0) {
    $usuarioId = $_POST['usuarioId'];
    $usuario = getUsuario($usuarioId);
    $result['msg'] = 'ok';
    $result['data'] = $usuario;
    
}

else if (strcmp($action, "updateReserva") == 0) {
    $data = array(
        'idApartamento' => null,
        'fechaEntrada' => null,
        'fechaSalida' => null,
        'adultos' => 0,
        'ninios' => 0,
        'bebes' => 0,   
        'idCanal' => null,
        'observaciones' => '',
        'horaEntrada' => null,
        'horaSalida' => null,
        'idResponsableEntrada' => null,
        'idResponsableSalida' => null,
        'llavesEntregadas' => 1,
        'llavesDevueltas' => 1,
        'lugarEntrada' => null,
        'parkingNumero' => null,
        'parkingLlavesEntregadas' => null,
        'parkingMandosEntregados' => null,
        'parkingLlavesDevueltas' => null,
        'parkingMandosDevueltos' => null,
        'revisionSalidaComentarios' => null
    );
    
    $keys = array_keys($data);
    
    foreach ($keys as $key) {
        if(isset($_POST[$key]))
            $data[$key] = $_POST[$key];
    }
    
    if(isset($_POST['fechaInicio'])) {
        $fecha = $_POST['fechaInicio'];
        $fecha = explode("-", $fecha);
        $f = $fecha[2] . "-" . $fecha[1] . "-" . $fecha[0];
        $data['fechaEntrada'] = $f;
    }
    
    if(isset($_POST['fechaFinal'])) {
        $fecha = $_POST['fechaFinal'];
        $fecha = explode("-", $fecha);
        $f = $fecha[2] . "-" . $fecha[1] . "-" . $fecha[0];
        $data['fechaSalida'] = $f;
    }

    if(isset($_POST['totalReserva']) && strlen($_POST['totalReserva']) > 0)
        $total = $_POST['totalReserva'];
    else
        $total = getTotalPrice($data['idApartamento'],strtotime($_POST['fechaInicio']),strtotime($_POST['fechaFinal']));
    
    if($total && $total>0){
        $data['total'] = $total;

        $apartamento = getApartamento($_POST['idApartamento']);

        $data['apartamento'] = serialize($apartamento);
        
        $data['request'] = serialize($_REQUEST);

        $data_huesped = array();
    
        if(isset($_POST['huespedId']) && strlen($_POST['huespedId']) > 0) {
            $data['usuarioId'] = $_POST['huespedId'];
        }
        $keys_huesped = array('nombre', 'apellidoPaterno', 'apellidoMaterno', 'telefono', 'email', 'password','telefonoAlterno');

        foreach ($keys_huesped as $key) {
            if(isset($_POST[$key]))
                $data_huesped[$key] = $_POST[$key];
        }
        
        $data_cobros = array();
        
        $tipos_cobro = array('tarjeta', 'paypal', 'transferencia', 'efectivo');
        
        foreach ($tipos_cobro as $tipo) {
            if(isset($_POST[$tipo])) {
                $params_cobros = $_POST[$tipo];
                
                foreach ($params_cobros as $cobro) {
                    $cuenta = $cobro;                    
                    $cuenta['tipo'] = $tipo;
                    array_push($data_cobros, $cuenta);
                }
            }
        }
        
        if(isset($_POST['idReservacion'])) {
            $reserva_id = $_POST['idReservacion'];
            $reserva_id = updateReserva($reserva_id, $data, $data_huesped, $data_cobros);
        } else         
            $reserva_id = addReserva($data, $data_huesped, $data_cobros);  
         if($reserva_id) {
            $result['msg'] = 'ok';
            $result['data'] = 'Se guardaron los cambios correctamente.';
        } else {
            $result['data'] = 'No se guardaron los cambios';
        }
    }else{
        $result['data'] = 'Error al calcular el total, por favor verifique las fechas seleccionadas.';
    }
}

echo json_encode($result);

?>

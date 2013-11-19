<?php

//$usuario_core->validateUser();
$action = $_POST["action"];
$result = array("msg" => "error", "data" => "No tienes los permisos suficientes");

if (strcmp($action, "insert") == 0) {
    $data = array();
    
    if(isset($_SESSION['fechaInicio']))
        $data['fechaEntrada'] = $_SESSION['fechaInicio'];
    if(isset($_SESSION['fechaFinal']))
        $data['fechaSalida'] = $_SESSION['fechaFinal'];
    if(isset($_SESSION['huespedes']))
        $data['adultos'] = $_SESSION['huespedes'];
    if(isset($_POST['idApartamento']))
        $data['idApartamento'] = $_POST['idApartamento'];
    
    $canales = getCanales();
    
    if($canales && count($canales))
        $data['idCanal'] = $canales[0]->idCanal;
    
    $idApartamento = $_POST['idApartamento'];

    $apartamento = getApartamento($_POST['idApartamento']);

    if ($apartamento) {

        $total = getTotalPrice($idApartamento, strtotime($data['fechaEntrada']), strtotime($data['fechaSalida']), array(), $data['huespedes']);

        if ($total && is_numeric($total)) {
            $data['total'] = $total;
            //verificar si logueado
            $usuario = $usuario_core->getUsuario();
            $data_usuario = array();
            if($usuario && $usuario->idUsuario) {
                echo 'usuario';
                $data['usuarioId'] = $usuario->idUsuario;
            }
            if(isset($_POST['nombre']))
                $data_usuario['nombre'] = $_POST['nombre'];
            if(isset($_POST['apellidoPaterno']))
                $data_usuario['apellidoPaterno'] = $_POST['apellidoPaterno'];
            if(isset($_POST['email']))
                $data_usuario['email'] = $_POST['email'];
            if(isset($_POST['telefono']))
                $data_usuario['telefono'] = $_POST['telefono'];
            
            
            $data_cobro = array('tipo'=>'tarjeta', 'formaPago' => 'pago', 'importe' => $total);
            if(isset($_POST['tipoTarjeta']))
                    $data_cobro['tipoTarjeta'] = $_POST['tipoTarjeta'];
            if(isset($_POST['numero']))
                    $data_cobro['numero'] = $_POST['numero'];
            if(isset($_POST['titular']))
                    $data_cobro['titular'] = $_POST['titular'];
            if(isset($_POST['caducidadMes']))
                    $data_cobro['caducidadMes'] = $_POST['caducidadMes'];
            if(isset($_POST['caducidadAnio']))
                    $data_cobro['caducidadAnio'] = $_POST['caducidadAnio'];
            
            $reservaId = addReserva($data, $data_usuario, array($data_cobro));
            
            if($reservaId) {
                $reserva = getReserva($reservaId);
                $usuario_core->setUsuario(getUsuario($reserva->idUsuario));
                $result = array('msg' => 'ok', 'data' => 'Reserva creada correctamente.', 'idReservacion' => $reservaId);
            } else {
                $result['data'] = 'No se pudo registrar la reserva';
            }
            
        } else {
            $result = array('msg' => 'error', 'data' => 'Fechas no disponibles');
        }
    } else {
        $result = array('msg' => 'error', 'data' => 'Faltan datos');
    }
}

if (strcmp($action, "addItem") == 0) {
    if (isset($_POST['idApartamento'])) {
        if (isset($_POST['total'])) {
            $articulo_extra = getArticulo($_POST['idArticulo']);
            $precio_por_articulo = intval($articulo_extra->precioBase);
            $precio_extra = $precio_por_articulo * intval($_POST['cantidad']);
            $precio_total_nuevo = intval($_POST['total']) + $precio_extra;
            $precio_total_format = '€' . money_format('%i', $precio_total_nuevo);

            $result = array('msg' => 'ok', 'data' => 'El articulo fue agregado correctamente a la reserva.', 'cantidad' => $_POST['cantidad'], 'total' => $precio_total_nuevo, 'total_format' => $precio_total_format, 'articulo' => $articulo_extra);
        } else {
            $result = array('msg' => 'error', 'data' => 'No se encuentra el total de la reserva.');
        }
    } else {
        $result = array('msg' => 'error', 'data' => 'Faltan datos.');
    }
}

if (strcmp($action, "removeItem") == 0) {
    if (isset($_POST['idApartamento'])) {
        if (isset($_POST['total'])) {
            $articulo_extra = getArticulo($_POST['idArticulo']);
            $precio_por_articulo = intval($articulo_extra->precioBase);
            $precio_extra_a_restar = $precio_por_articulo * intval($_POST['cantidad']);
            $precio_total_nuevo = intval($_POST['total']) - $precio_extra_a_restar;
            $precio_total_format = '€' . money_format('%i', $precio_total_nuevo);
            $result = array('msg' => 'ok', 'data' => 'El articulo fue removido correctamente de la reserva.', 'total' => $precio_total_nuevo, 'total_format' => $precio_total_format);
        } else {
            $result = array('msg' => 'error', 'data' => 'No se encuentra el total de la reserva.');
        }
    } else {
        $result = array('msg' => 'error', 'data' => 'Faltan datos.');
    }
}
echo json_encode($result);
?>

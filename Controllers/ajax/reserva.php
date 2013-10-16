<?php

//$usuario_core->validateUser();
$action = $_POST["action"];
$result = array("msg" => "error", "data" => "No tienes los permisos suficientes");

if (strcmp($action, "insert") == 0) {
    $required = array('fechaEntrada', 'fechaSalida', 'idApartamento',
        'nombre', 'apellidoPaterno', 'email');
    $is_valid = true;

    foreach ($required as $r) {
        if (!isset($_POST[$r])) {
            $is_valid = false;
            break;
        }
    }
    $idApartamento = $_POST['idApartamento'];

    $apartamento = getApartamento($_POST['idApartamento']);

    if ($is_valid && $apartamento) {

        $total = getTotalPrice($idApartamento, strtotime($_POST['fechaEntrada']), strtotime($_POST['fechaSalida']));

        if ($total && is_numeric($total)) {
            //INSERTANDO USUARIO
            $usuario_id = false;

            $usuario_data = array();
            $usuario_data['nombre'] = $_POST['nombre'];
            $usuario_data['apellidoPaterno'] = $_POST['apellidoPaterno'];
            $usuario_data['apellidoMaterno'] = $_POST['apellidoMaterno'];
            $usuario_data['email'] = $_POST['email'];
            $usuario_data['ultimaModificacion'] = date('Y-m-d H:i:s');

            if (!isset($_POST['idUsuario']) || !is_numeric($_POST['idUsuario']) || !getUsuario($_POST['idUsuario'])) {
                $usuario_data['password'] = $_POST['password'];
                $usuario_data['estatus'] = 'activo';
                $usuario_data['idUsuarioGrupo'] = '2';
                $usuario_data['tiempoCreacion'] = date('Y-m-d H:i:s');
                $usuario_id = insertUsuario($usuario_data);
                $id_huesped = insertHuesped(array('idUsuario' => $usuario_id));
            } else {
                $usuario = updateUsuario($_POST['idUsuario'], $usuario_data);
                if ($usuario) {
                    $usuario_id = $_POST['idUsuario'];
                }
            }

            if ($usuario_id) {
                //INSERTANDO HUESPED
                /*$huesped = getHuespedByUsuario($usuario_id);
                if($huesped){
                    $id_huesped = $huesped->idHuesped;
                }
                $id_huesped = insertHuesped(array('idUsuario' => $usuario_id));
                */
                
                //INSERTANDO REERVA

                $reserva_data = array();
                $reserva_data['idUsuario'] = $usuario_id;
                $reserva_data['fechaEntrada'] = date('Y-m-d H:i:s', strtotime($_POST['fechaEntrada']));
                $reserva_data['fechaSalida'] = date('Y-m-d H:i:s', strtotime($_POST['fechaSalida']));
                $reserva_data['idApartamento'] = $_POST['idApartamento'];
                $reserva_data['adultos'] = $_POST['adultos'];
                $reserva_data['ninios'] = $_POST['ninios'];
                $reserva_data['bebes'] = $_POST['bebes'];
                $reserva_data['tiempoCreacion'] = date('Y-m-d H:i:s');
                $reserva_data['ultimaModificacion'] = date('Y-m-d H:i:s');
                $reserva_data['apartamento'] = serialize($apartamento);
                $reserva_data['request'] = serialize($_SERVER);
                $reserva_data['total'] = $total;

                $reserva_id = insertReserva($reserva_data);
                $usuario_core->setUsuario(getUsuario($usuario_id));
                
                $result = array('msg' => 'ok', 'data' => 'Reresva creada correctamente.', 'idReservacion' => $reserva_id);
            
            } else {
                $result = array('msg' => 'error', 'data' => 'Usuario no pudo ser agregado');
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

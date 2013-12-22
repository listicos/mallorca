<?php

require_once 'Logic/politicas.php';

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
    if(isset($_POST['observaciones']))
        $data['observaciones'] = $_POST['observaciones'];
    
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
                
                $data['usuarioId'] = $usuario->idUsuario;
            }
            if(isset($_POST['nombre']))
                $data_usuario['nombre'] = $_POST['nombre'];
            if(isset($_POST['apellidoPaterno']))
                $data_usuario['apellidoPaterno'] = $_POST['apellidoPaterno'];
            if(isset($_POST['email']) && !$usuario)
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
            if(isset($_POST['cvv']))
                    $data_cobro['cvv'] = $_POST['cvv'];
            
            $reservaId = addReserva($data, $data_usuario, array($data_cobro));
            
            if($reservaId) {
                $reserva = getReserva($reservaId);
                $usuario_core->setUsuario(getUsuario($reserva->idUsuario));
                
                
                enviarCorreoConfirmacionReserva($reserva);
                
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

function enviarCorreoConfirmacionReserva($reserva) {
    try {
        
        $reserva_array = array();
        $reserva = getReserva($reserva->idReservacion);

        $salida = strtotime($reserva->fechaSalida);
        $entrada = strtotime($reserva->fechaEntrada);
        $creacion = strtotime($reserva->tiempoCreacion);

        $dias = array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");
        $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

        $reserva->fechaSalidaFormat = $dias[date('w', $salida)] . ' ' . date('d', $salida) . ' de ' . $meses[date('n', $salida) - 1] . ' ' . date('Y', $salida);
        $reserva->fechaEntradaFormat = $dias[date('w', $entrada)] . ' ' . date('d', $entrada) . ' de ' . $meses[date('n', $entrada) - 1] . ' ' . date('Y', $entrada);
        $reserva->tiempoCreacion = date('d/m/Y', $creacion);

        $noches = (intval($salida) - intval($entrada)) / 86400;
        $reserva->noches = $noches;
        $reserva->total = '€'.money_format('%i', $reserva->total);
        $reserva_array['reserva'] = $reserva;

        $cliente = getUsuario($reserva->idUsuario);
        $cliente->fullName = $cliente->nombre . ' ' . $cliente->apellidoPaterno . ' ' . $cliente->apellidoMaterno;
        $reserva_array['cliente'] = $cliente;

        $apartamento = getApartamento($reserva->idApartamento);
        $apartamentoTipo = getApartamentosTipos($apartamento->idApartamentosTipo);
        $apartamento->apartamentoTipo = $apartamentoTipo->nombre;
        $tipoApartamento = getApartamentosTipos($apartamento->idApartamentosTipo);
        $apartamento->tipo = $tipoApartamento->nombre;
        $reserva_array['apartamento'] = $apartamento;

        $reserva_array['direccion'] = getDireccion($apartamento->idDireccion);

        $articulos = getArticulosByReserva($reserva->idReservacion);

        foreach ($articulos as $a) {
            $a->nombre = getArticulo($a->idArticulo)->nombre;
            $a->precio = getArticulo($a->idArticulo)->precioBase * $a->cantidad;
        }

        $reserva_array['articulos'] = $articulos;

        $apartamentoPagoTipos = getApartamentosPagosTipos($reserva->idApartamento);
        foreach ($apartamentoPagoTipos as $pagoTipo) {
            $tipo = getPagoTipo($pagoTipo->idPagoTipo);
            $pagoTipo->nombre = $tipo->nombre;
        }

        $reserva_array['pagosTipos'] = $apartamentoPagoTipos;
        $apto = getApartamento($reserva->idApartamento);

        $politicaCancelacion = getPolitica($apto->idPoliticaCancelacion);

        $fechaCancelacionTime = strtotime($reserva->fechaEntrada) - (($politicaCancelacion->reembolsoDia + 1) * 60 * 60 * 24);
        $fechaCancelacion = date("d", $fechaCancelacionTime) . " de " . $meses[date("m", $fechaCancelacionTime) - 1] . " de " . date("Y", $fechaCancelacionTime);

        $reserva_array['politicaCancelacion'] = $politicaCancelacion;
        $reserva_array['fechaCancelacion'] = $fechaCancelacion;
        
        $mailer = new Core_Mailer();
        
        global $smarty;
        $disponible = !noDisponible($reserva->idApartamento, $reserva->fechaEntrada, $reserva->fechaSalida);
        $smarty->assign('disponible', $disponible);
        $smarty->assign('reserva', $reserva_array);
        $body = $smarty->fetch('confirmacionEmail.tpl');

        $email_user = $cliente->email;

        $subject = "Gracias, " . $cliente->nombre . "! Su solicitud de reserva está siendo procesada";

        $config = getConfiguracion();
        if($config)
            $data_config = array(
                'email' => $config->email,
                'username' => $config->username,
                'password' => $config->password,
                'servidor' => $config->servidor,
                'puerto' => $config->puerto
            );
        else $data_config = null;
        $mailer->send_email($email_user, $subject, $body, $data_config);

        
        $propietario = getPropietarioByApartamento($reserva->idApartamento);

        $subject = "Se ha registrado una nueva reserva";

        $mailer->send_email($propietario->email, $subject, $body);

    } catch(Exception $exc) {
        print_r($exc);
    }
}

echo json_encode($result);
?>

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
    
    $articulos_reserva = array();
    
    if(isset($_POST['idArticulo']))
        $articulos_reserva = $_POST['idArticulo'];
    
    

    if(isset($_POST['totalReserva']) && strlen($_POST['totalReserva']) > 0)
        $total = $_POST['totalReserva'];
    else
        $total = getTotalPrice($data['idApartamento'],strtotime($_POST['fechaInicio']),strtotime($_POST['fechaFinal']), $articulos_reserva, $data['adultos']);
    
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
            $reserva_id = updateReserva($reserva_id, $data, $data_huesped, $data_cobros, $articulos_reserva);
            
            $reserva = getReserva($reserva_id);
            
            if(strcmp($reserva->estatus, $_POST['estatus']) != 0) {
                $estatus = $_POST['estatus'];
                cambiarEstatusReserva($reserva_id, $estatus);
            }
            
        } else {        
            $reserva_id = addReserva($data, $data_huesped, $data_cobros, $articulos_reserva);
            if($reserva_id) {
                try {
                    $mailer = new Core_Mailer();
                    $apartamento = getApartamento($data['idApartamento']);
                    $subject = 'Se ha registrado una nueva reserva';
                    $empresa = getPropietarioByApartamento($data['idApartamento']);
                    $to = $empresa->email;

                    $body = createEmailReserva($reserva_id);
                    
                    $mailer->send_email($to, $subject, $body);
                    $mailer->send_email($reservas_email, $subject, $body);
                    
                    $user_email = $data_huesped['email'];
                    $subject = "Gracias, " . $data_huesped['nombre'] . "! Su reserva está siendo procesada.";

                    $mailer->send_email($user_email, $subject, $body);
                } catch (Exception $e) {
                    print_r($e);
                }
                
            }
            
        }
        
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

function createEmailReserva($idReserva) {
    $reserva_array = array();
    $reserva = getReserva($idReserva);

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

    
    $view = new Core_template('confirmaReserva.php');
    $view->setAttribute('reserva', $reserva_array);
    
    $body = $view->getContent();
    return $body;
}

?>

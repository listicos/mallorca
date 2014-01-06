<?php

    require_once 'Logic/politicas.php';

    if(isset($_GET['id'])) {
        $reservaId = $_GET['id'];
        unset($_SESSION['reserva_id']);
        
        $reserva_array = array();
        $reserva = getReserva($reservaId);

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
        
        $apartamento->empresa = getPropietarioByApartamento($apartamento->idApartamento);
        
        $instalaciones_array = array();
        $instalaciones_list = getApartamentoInstalacionesByAparatamento($apartamento->idApartamento);
        foreach ($instalaciones_list as $ckey => $instalacio) {
            $instalaciones_array[$ckey] = getInstalacion($instalacio->idInstalacion);
        }
        
        $apartamento->servicios = $instalaciones_array;
        
        $reserva_array['apartamento'] = $apartamento;

        $reserva_array['direccion'] = getDireccion($apartamento->idDireccion);
        /*
        $articulos = getArticulosByReserva($reserva->idReservacion);

        foreach ($articulos as $a) {
            $a->nombre = getArticulo($a->idArticulo)->nombre;
            $a->precio = getArticulo($a->idArticulo)->precioBase * $a->cantidad;
        }

        $reserva_array['articulos'] = $articulos;
        */
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
        
        $disponible = !noDisponible($reserva->idApartamento, $reserva->fechaEntrada, $reserva->fechaSalida);
        $smarty->assign('disponible', $disponible);
        
        $smarty->assign('reserva', $reserva_array);
        
    }

	$smarty->display('confirmacion.tpl');
?>
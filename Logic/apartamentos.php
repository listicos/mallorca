<?php


function insertApartamento($data = array()) {
    try {
        $transaction = new Transaction();
        
        if(isset($data['idEmpresa'])) {
            $contrato = DAOFactory::getContratosDAO()->prepare(array('tiempoCreacion'=> date('Y-m-d')));
            $contrato_id = DAOFactory::getContratosDAO()->insert($contrato);
            
            $empresa_contrato = DAOFactory::getEmpresasContratosDAO()->prepare(array('idEmpresa'=>$data['idEmpresa'], 'idContrato'=>$contrato_id));
            $id_ec = DAOFactory::getEmpresasContratosDAO()->insert($empresa_contrato);
            $data['idEmpresaContrato'] = $id_ec;
        }
        $data['idMoneda'] = 1;
        $apartamento = DAOFactory::getApartamentosDAO()->prepare($data);
        $apartamento_id = DAOFactory::getApartamentosDAO()->insert($apartamento);
        
        registrarAccion("insert", "apartamentos", $apartamento_id);

        $transaction->commit();

        return $apartamento_id;
    } catch (Exception $e) {
        var_dump($e);
        if ($transaction)
            $transaction->rollback();
        return false;
    }
}
function updateApartamento($idApartamento, $data= array()){
    try {
        $transaction = new Transaction();
        
        
        
        if(isset($data['idEmpresa'])) {
            
            $a = DAOFactory::getApartamentosDAO()->load($idApartamento);
            
            if($a->idEmpresaContrato) {
                
                $empresa_contrato = DAOFactory::getEmpresasContratosDAO()->prepare(array('idEmpresa'=>$data['idEmpresa']), $a->idEmpresaContrato);
                DAOFactory::getEmpresasContratosDAO()->update($empresa_contrato);
                
            } else {
            
                $contrato = DAOFactory::getContratosDAO()->prepare(array('tiempoCreacion'=> date('Y-m-d')));
                $contrato_id = DAOFactory::getContratosDAO()->insert($contrato);

                $empresa_contrato = DAOFactory::getEmpresasContratosDAO()->prepare(array('idEmpresa'=>$data['idEmpresa'], 'idContrato'=>$contrato_id));
                $id_ec = DAOFactory::getEmpresasContratosDAO()->insert($empresa_contrato);
                $data['idEmpresaContrato'] = $id_ec;
            }
        }
        
        $apartamento = DAOFactory::getApartamentosDAO()->prepare($data, $idApartamento);
        if(!$data['idComplejo'])
            $apartamento->idComplejo = NULL;
        DAOFactory::getApartamentosDAO()->update($apartamento);
        
        registrarAccion("update", "apartamentos", $idApartamento);

        $transaction->commit();

        return $apartamento;
    } catch (Exception $e) {
        var_dump($e);
        if ($transaction)
            $transaction->rollback();
        return false;
    }
}

function updateApartamentoContrato ($idApartamento, $data = array()){
    try {
        $transaction = new Transaction();

        $apartamento = DAOFactory::getApartamentosDAO()->load($idApartamento);
        
        if(is_null($apartamento->idEmpresaContrato)) {
            $data['tiempoCreacion'] = date("Y-m-d H:i:s");
            $contrato = DAOFactory::getContratosDAO()->prepare($data);
            $idContrato = DAOFactory::getContratosDAO()->insert($contrato);
            $data_empresa_contrato = array('idEmpresa' => $data['idEmpresa'], 'idContrato' => $idContrato);
            $empresaContrato = DAOFactory::getEmpresasContratosDAO()->prepare($data_empresa_contrato);
            $id_empresa_contrato = DAOFactory::getEmpresasContratosDAO()->insert($empresaContrato);
            $apartamento = DAOFactory::getApartamentosDAO()->prepare(array('idEmpresaContrato'=>$id_empresa_contrato, 'ultimaModificacion' => date('Y-m-d H:i:s')));
        } else {
            $data['ultimaModificacion'] = date('Y-m-d H:i:s');
            $empresaContrato = DAOFactory::getEmpresasContratosDAO()->prepare(array(
                'idEmpresa' => $data['idEmpresa'],
                'ultimaModificacion' => date('Y-m-d H:i:s')
            ), $apartamento->idEmpresaContrato);
            DAOFactory::getEmpresasContratosDAO()->update($empresaContrato);
            $contrato = DAOFactory::getContratosDAO()->prepare($data, $empresaContrato->idContrato);
            DAOFactory::getContratosDAO()->update($contrato);
        }
        
        registrarAccion("update", "apartamentos", $idApartamento);

        $transaction->commit();

        return $apartamento;
    } catch (Exception $e) {
        var_dump($e);
        if ($transaction)
            $transaction->rollback();
        return false;
    }
}

function getApartamentosCercanos($lat,$lon) {
    try {
        $apartamentos = DAOFactory::getApartamentosDAO()->queryByLatLonNear($lat, $lon);
        return $apartamentos;
    } catch (Exception $e) {
        return false;
    }
}

function countApartamentosByFilters($fechaInicio,$fechaFinal,$huespedes = false, $instalaciones = array(), $tipos = array(), $alojamientos = array()) {
    try {
    $timeFechaInicio = $fechaInicio ? strtotime($fechaInicio) : 0;
        $timeFechaFinal = $fechaFinal ? strtotime($fechaFinal) : 0;
        $apartamentos = DAOFactory::getApartamentosDAO()->queryApartamentosFilters($timeFechaInicio, $timeFechaFinal,$huespedes, $instalaciones, $tipos, $alojamientos, $start, $limit, $order, $bounds);
        return count($apartamentos);
    } catch (Exception $e) {
        var_dump($e);
        return false;
    }
}

function getApartamentosFilters($fechaInicio,$fechaFinal,$huespedes = false, $instalaciones = array(), $tipos = array(), $alojamientos = array(), $start = 0, $limit = 10, $order = false, $bounds = array(), $loadAll = true) {
    try {
        $timeFechaInicio = $fechaInicio ? strtotime($fechaInicio) : 0;
        $timeFechaFinal = $fechaFinal ? strtotime($fechaFinal) : 0;
        $apartamentos = DAOFactory::getApartamentosDAO()->queryApartamentosFilters($timeFechaInicio, $timeFechaFinal,$huespedes, $instalaciones, $tipos, $alojamientos, $start, $limit, $order, $bounds);
        if($loadAll)
        foreach ($apartamentos as $apartamento) {
            
            $apartamento->adjuntos = getAdjuntosByApartamentoId($apartamento->idApartamento);
            
            if($apartamento->idDireccion)
                $apartamento->direccion = DAOFactory::getDireccionesDAO ()->load ($apartamento->idDireccion);
            
            if($apartamento->idComplejo)
                $apartamento->complejo = getComplejoById ($apartamento->idComplejo);
            
            $apartamento->tipo = getTipoApartamento($apartamento->idApartamentosTipo)->nombre;
            
            /*Solucion temporal
            $disponibilidad = getDisponibilidadByApartamentoMinMaxPrecio($apartamento->idApartamento, date('Y-m-d'), 0);
        
            if($disponibilidad){
                $apartamento->precioMinimo = $disponibilidad['precioMinimo'];
                $apartamento->precioMaximo = $disponibilidad['precioMaximo'];
            }*/

            
            $rangoPrecios = getRangoPreciosByApartamento($apartamento->idApartamento, $fechaInicio ? : date('Y-m-d'), $fechaFinal ? : 0);
            
            if($rangoPrecios) {
                $apartamento->precioMinimo = $rangoPrecios[0];
                $apartamento->precioMaximo = $rangoPrecios[1];
            }
        }
        return $apartamentos;
    } catch (Exception $e) {
        return false;
    }
}

function getApartamentos() {
    try {
        $apartamentos = DAOFactory::getApartamentosDAO()->queryAll();
        return $apartamentos;
    } catch (Exception $e) {
        return false;
    }
}

function getApartamentosByEmpresa($empresaId) {
    try {
        $apartamentos = DAOFactory::getApartamentosDAO()->queryByIdEmpresa($empresaId);
        return $apartamentos;
    } catch (Exception $e) {
        return false;
    }
}

function searchApartamentosByNombre($term) {
    try {
        $apartamentos = DAOFactory::getApartamentosDAO()->searchByNombre($term);
        return $apartamentos;
    } catch (Exception $e) {
        return false;
    }
}

function getApartamento($idApartamento) {
    try {
        $apartamento = DAOFactory::getApartamentosDAO()->load($idApartamento);
        if($apartamento->idEmpresaContrato) {
            $apartamento->idEmpresa = DAOFactory::getEmpresasContratosDAO()->load($apartamento->idEmpresaContrato)->idEmpresa;
        }
        
        if($apartamento->descripcionLarga)
            $apartamento->descripciones = json_decode ($apartamento->descripcionLarga);
        
        if($apartamento->normas)
            $apartamento->norma = json_decode ($apartamento->normas);
        
        if($apartamento->manual)
            $apartamento->manuales = json_decode ($apartamento->manual);
        
        if($apartamento->tpv)
            $apartamento->tpvs = json_decode ($apartamento->tpv);
        
        
        return $apartamento;
    } catch (Exception $e) {
        return false;
    }
}

function getAdjunto($idAdjunto) {
    try {
        $adjunto = DAOFactory::getAdjuntosDAO()->load($idAdjunto);
        return $adjunto;
    } catch (Exception $e) {
        return false;
    }
}

function getApartamentosAdjuntos($idApartamento) {
    try {
        $adjunto = DAOFactory::getApartamentosAdjuntosDAO()->queryByIdApartamento($idApartamento);
        return $adjunto;
    } catch (Exception $e) {
        return false;
    }
}

function getAdjuntosByApartamentoId($idApartamento) {
    try {
        $adjuntos = DAOFactory::getAdjuntosDAO()->queryByApartamentoId($idApartamento);
        return $adjuntos;
    } catch (Exception $e) {
        return false;
    }
}

function getApartamentoAdjunto($idApartamentoAdjunto) {
    try {
        $adjunto = DAOFactory::getApartamentosAdjuntosDAO()->load($idApartamentoAdjunto);
        return $adjunto;
    } catch (Exception $e) {
        return false;
    }
}

function getCalendario(){
    try {
        $disponibilidades = DAOFactory::getDisponibilidadesDAO()->queryCalendario();
        $disponibles_array = array();
        foreach ($disponibilidades as $disponibilidad) {
            
            $apartamento = DAOFactory::getApartamentosDAO()->load($disponibilidad->idApartamento);
            $reservaciones = DAOFactory::getReservacionesDAO()->queryByApartamentoIdAndFecha($disponibilidad->idApartamento, $disponibilidad->fechaInicio);
            $disponibles = $apartamento->cantidad ? : 1;
            
            if(count($reservaciones) < $disponibles)
                array_push ($disponibles_array, $disponibilidad);
        }
        return $disponibles_array;
    } catch (Exception $e) {
        return false;
    }
}


function getDisponibilidades() {
    try {
        $disponibilidades = DAOFactory::getDisponibilidadesDAO()->queryAll();
        return $disponibilidades;
    } catch (Exception $e) {
        return false;
    }
}

function getDisponibilidadByApartamentoFechas($idApartamento, $fechaInicio = 0, $fechaFin = 0) {
    try {
        $fi = ($fechaInicio) ? date('Y-m-d', $fechaInicio) : date('Y-m-d');
        $ff = ($fechaFin) ? date('Y-m-d', $fechaFin) : 0;
        //echo $fi . '---' . $ff . '  <p>';
        $disponibilidad = DAOFactory::getDisponibilidadesDAO()->queryByIdApartamentoFechas($idApartamento, $fi, $ff);
        $apartamento = getApartamento($idApartamento);
        $disponibilidades = array();
        $days = (31*18);
        if($fechaInicio && $fechaFin)
            $days = ($fechaFin - $fechaInicio)/(3600*24);
        //echo 'days:' . $days . '<p>';
        for($i=0;$i<$days;$i++) {
            $time = strtotime('+' . $i . ' days', $fechaInicio);
            $dispo = DAOFactory::getDisponibilidadesDAO()->prepare(array(
                'estatus' => 'disponible',
                'fechaInicio' => date('Y-m-d', $time),
                'fechaFinal' => date('Y-m-d', $time),
                'precio' => $apartamento->tarifaBase
            ));
            foreach ($disponibilidad as $d) {                
                if(date('Y-m-d', $time) == date('Y-m-d', strtotime($d->fechaInicio))) {
                    $dispo = $d;
                    if(!$d->precio)
                        $dispo->precio = $apartamento->tarifaBase;
                    break;
                }
                if($time < strtotime($d->fechaInicio))
                    break;
            }
            array_push($disponibilidades, $dispo);
        }
        
        /*
        foreach ($disponibilidad as $d) {
            $fechaContrato = getFechasContratosByApartamentoAndFecha($idApartamento, $d->fechaInicio);
            if($fechaContrato && count($fechaContrato) > 0) {
                $d->precioContrato = $fechaContrato[0]->precio;
            }
            $disponibles = $apartamento->cantidad ? : 1;
            $reservas = DAOFactory::getReservacionesDAO()->queryByApartamentoIdAndFecha($idApartamento, $d->fechaInicio);
            $disponibles -= count($reservas);
            $d->disponibles = $disponibles < 0 ? 0 : $disponibles;
            $d->reservados = $apartamento->cantidad - $d->disponibles;
        }
        */
        return $disponibilidades;
    } catch (Exception $e) {
        return false;
    }
}

function getDisponibilidadByApartamentoFechasPro($idApartamento, $fechaInicio = 0, $fechaFin = 0) {
    try {
        $fi = ($fechaInicio) ? date('Y-m-d', $fechaInicio) : date('Y-m-d');
        $ff = ($fechaFin) ? date('Y-m-d', $fechaFin) : 0;
        $disponibilidad = DAOFactory::getDisponibilidadesDAO()->queryByIdApartamentoFechas($idApartamento, $fi, $ff);

        return $disponibilidad;
    } catch (Exception $e) {
        return false;
    }
}

function getDisponibilidadByApartamento($idApartamento) {
    try {
        $disponibilidad = DAOFactory::getDisponibilidadesDAO()->queryByIdApartamentoFechas($idApartamento, date('Y-m-d'), false);
        $apartamento = getApartamento($idApartamento);
        $disponibilidades = array();
        $days = (31*12);
        
        for($i=0;$i<$days;$i++) {
            $time = strtotime('+' . $i . ' days');
            $dispo = DAOFactory::getDisponibilidadesDAO()->prepare(array(
                'estatus' => 'disponible',
                'fechaInicio' => date('Y-m-d', $time),
                'fechaFinal' => date('Y-m-d', $time),
                'precio' => $apartamento->tarifaBase
            ));
            foreach ($disponibilidad as $d) {                
                if(date('Y-m-d', $time) == date('Y-m-d', strtotime($d->fechaInicio))) {
                    $dispo = $d;
                    break;
                }
                if($time < strtotime($d->fechaInicio))
                    break;
            }
            if(!$dispo->precio) $dispo->precio = $apartamento->tarifaBase;
            array_push($disponibilidades, $dispo);
        }
        
        /*
        foreach ($disponibilidad as $d) {
            $fechaContrato = getFechasContratosByApartamentoAndFecha($idApartamento, $d->fechaInicio);
            if($fechaContrato && count($fechaContrato) > 0) {
                $d->precioContrato = $fechaContrato[0]->precio;
            }
            $disponibles = $apartamento->cantidad ? : 1;
            $reservas = DAOFactory::getReservacionesDAO()->queryByApartamentoIdAndFecha($idApartamento, $d->fechaInicio);
            $disponibles -= count($reservas);
            $d->disponibles = $disponibles < 0 ? 0 : $disponibles;
            $d->reservados = $apartamento->cantidad - $d->disponibles;
        }
        */
        return $disponibilidades;
    } catch (Exception $e) {
        return false;
    }
}

function getDisponibilidadByApartamentoMenorPrecio($idApartamento,$limit = 1) {
    try {
        $disponibilidad = DAOFactory::getDisponibilidadesDAO()->queryByIdApartamentoMenorPrecio($idApartamento,$limit);
        $d = $disponibilidad;
        $fechaContrato = getFechasContratosByApartamentoAndFecha($idApartamento, $d->fechaInicio);
        if($fechaContrato && count($fechaContrato) > 0) {
            $d->precioContrato = $fechaContrato[0]->precio;
        }
        
        return $disponibilidad;
    } catch (Exception $e) {
        return false;
    }
}

/*Temporal*/
function getDisponibilidadByApartamentoMinMaxPrecio($idApto, $fechaInicial = 0, $fechaFinal = 0){
    try {
        $fechaInicial = ($fechaInicial && strlen(trim($fechaInicial))) ? strtotime($fechaInicial) : strtotime();
        $fechaFinal = ($fechaFinal && strlen(trim($fechaFinal))) ? strtotime($fechaFinal) : 0;

        $disponibilidad = DAOFactory::getDisponibilidadesDAO()->queryByIdApartamentoMinMaxPrecio($idApto, $fechaInicial = 0, $fechaFinal = 0);
        if($disponibilidad){
            $dispo = array_pop($disponibilidad);
            return $dispo;
        }else{
            return false;
        }
        
    } catch (Exception $e) {
        return false;
    }
}


function getByIdApartamentoFechas($idApartamento,$fechaInicio = false, $fechaFinal = false) {
    try {

        if($fechaInicio)
            $fechaInicio = date('Y-m-d H:i:s',$fechaInicio);
        if($fechaFinal)
            $fechaFinal = date('Y-m-d H:i:s',$fechaFinal);

        $disponibilidades = DAOFactory::getDisponibilidadesDAO()->queryByIdApartamentoFechas($idApartamento,$fechaInicio,$fechaFinal);
        return $disponibilidades;
    } catch (Exception $e) {
        return false;
    }
}

function getTotalPrice($idApartamento,$fechaInicio, $fechaFinal, $articulos = array(), $adultos = 0) {
    $disponibilidades = getDisponibilidadByApartamentoFechas($idApartamento,$fechaInicio, $fechaFinal);
    
    $total = 0;
    
    $noches = ($fechaFinal - $fechaInicio) / 86400;
    $noches_disponibles = 0;
    
    $last_d = null;

    if($disponibilidades){
        foreach ($disponibilidades as $d) {
            if($d->precio && is_numeric($d->precio) && $d->precio>0){
                $total+=$d->precio - ($d->precio * $d->descuento / 100);
                $noches_disponibles++;
                $last_d = $d;
            }
        }
        
        if(!$noches){
            return false;
        }else{
            /*
            if($last_d && $last_d->precioPorConsumo && $total >= $last_d->precioPorConsumo) {
                $total = $total - ($total * $last_d->descuentoPorConsumo / 100);
            }*/
            
            foreach ($articulos as $art=>$cant) {
                $articulo = DAOFactory::getArticulosDAO()->load($art);
                $total += ($articulo->precioBase * $cant);
            }
            
            if($adultos > 0) {
                $apto = DAOFactory::getApartamentosDAO()->load($idApartamento);
                $tasas = 0.45 * $adultos * (($noches <= 7) ? $noches : 7);
                $total += $tasas;
            }
            
            $IVA = $tasas / 10;
            
            $total += $IVA;
            
           return $total;
        }
    }else{
        return false;
    }

}

function getTotalPriceComplete($idApartamento,$fechaInicio, $fechaFinal, $articulos = array(), $adultos = 0) {
    $disponibilidades = getDisponibilidadByApartamentoFechas($idApartamento,$fechaInicio, $fechaFinal);
    $total = 0;
    
    $price = array(
        'pvp' => 0,
        'articulos' => 0,
        'subtotal' => 0,
        'tasas' => 0,
        'iva' => 0,
        'total' => 0
    );
    
    $noches = ($fechaFinal - $fechaInicio) / 86400;
    $noches_disponibles = 0;

    $last_d = null;
    if($disponibilidades){
        foreach ($disponibilidades as $d) {
            if($d->precio && is_numeric($d->precio) && $d->precio>0){
                $total+=$d->precio - ($d->precio * $d->descuento / 100);
                $noches_disponibles++;
                $last_d = $d;
            }
        }
        if($noches != $noches_disponibles){
            return false;
        }else{
            
            if($last_d && $last_d->precioPorConsumo && $total >= $last_d->precioPorConsumo) {
                $price['pvp_sindescuento'] = money_format("%i", $total);
                $total = $total - ($total * $last_d->descuentoPorConsumo / 100);
            }
            
            $price['pvp'] = $total;
            
            foreach ($articulos as $art=>$cant) {
                $articulo = DAOFactory::getArticulosDAO()->load($art);
                $total += ($articulo->precioBase * $cant);
                $price['articulos'] += ($articulo->precioBase * $cant);
            }
            
            $price['subtotal'] = $total;
            
            if($adultos > 0) {
                $apto = DAOFactory::getApartamentosDAO()->load($idApartamento);
                $tasas = 0.45 * $adultos * (($noches <= 7) ? $noches : 7);
                $total += $tasas;
                $price['tasas'] = $tasas;
            }
            
            $IVA = $tasas / 10;
            $price['iva'] = $IVA;
            
            $total += $IVA;
            $price['total'] = $total;
            
            
            
           return $price;
        }
    }else{
        return false;
    }

}


function getPagosTipos() {
    try {
        $pagos = DAOFactory::getPagosTiposDAO()->queryAll();
        return $pagos;
    } catch (Exception $e) {
        return false;
    }
}
function getApartamentosPagosTipos($idApartamento){
    try {
        $pagos = DAOFactory::getApartamentosPagosTiposDAO()->queryByIdApartamento($idApartamento);
        return $pagos;
    } catch (Exception $e) {
        return false;
    }
}

function getPagoTipo($idPagoTipo){
    try {
        $pago = DAOFactory::getPagosTiposDAO()->load($idPagoTipo);
        return $pago;
    } catch (Exception $e) {
        return false;
    }
}

function getApartamentosTipos($idApartamentoTipo){
    try {
        $apartamentoTipo = DAOFactory::getApartamentosTiposDAO()->load($idApartamentoTipo);
        return $apartamentoTipo;
    } catch (Exception $e) {
        return false;
    }
}

function getIdiomas() {
    try {
        $idiomas = DAOFactory::getIdiomasDAO()->queryAll();
        return $idiomas;
    } catch (Exception $e) {
        return false;
    }
}

function getAllInstalacionesCategoria() {
    try {
        $instalacionesCatego = DAOFactory::getInstalacionesCategoriaDAO()->queryAll();
        return $instalacionesCatego;
    } catch (Exception $e) {
        return false;
    }
}

function getAllInstalaciones() {
    try {
        $instalaciones = DAOFactory::getInstalacionesDAO()->queryAll();
        return $instalaciones;
    } catch (Exception $e) {
        return false;
    }
}

function getInstalacionesByCategoria($idInstalacionCategoria) {
    try {
        $instalaciones = DAOFactory::getInstalacionesDAO()->queryByIdInstalacionCategoria($idInstalacionCategoria);
        return $instalaciones;
    } catch (Exception $e) {
        return false;
    }
}

function getApartamentoInstalacionesByAparatamento($idApartamento) {
    try {
        $instalaciones = DAOFactory::getApartamentosInstalacionesDAO()->queryByIdApartamento($idApartamento);
        return $instalaciones;
    } catch (Exception $e) {
        return false;
    }
}

function getApartamentoAlojamientoByAparatamento($idApartamento) {
    try {
        $alojamiento = DAOFactory::getApartamentosAlojamientosDAO()->queryByIdApartamento($idApartamento);
        return $alojamiento;
    } catch (Exception $e) {
        return false;
    }
}
function getAlojamiento($idAlojamiento) {
    try {
        $alojamiento = DAOFactory::getAlojamientosDAO()->load($idAlojamiento);
        return $alojamiento;
    } catch (Exception $e) {
        return false;
    }
}
function getInstalacion($idInstalacion) {
    try {
        $instalacion = DAOFactory::getInstalacionesDAO()->load($idInstalacion);
        return $instalacion;
    } catch (Exception $e) {
        return false;
    }
}

function insertApartamentoInstalacion($data = array()) {
    try {
        $transaction = new Transaction();

        $apartamentoInstalacion = DAOFactory::getApartamentosInstalacionesDAO()->prepare($data);
        $apartamento_instalacion_id = DAOFactory::getApartamentosInstalacionesDAO()->insert($apartamentoInstalacion);

        registrarAccion("insert", "apartamentos_instalaciones", $apartamento_instalacion_id);
        
        $transaction->commit();

        return $apartamento_instalacion_id;
    } catch (Exception $e) {
        var_dump($e);
        if ($transaction)
            $transaction->rollback();
        return false;
    }
}

function insertApartamentoPagoTipo($data = array()) {
    try {
        $transaction = new Transaction();

        $apartamentosPagosTipo = DAOFactory::getApartamentosPagosTiposDAO()->prepare($data);
        $apartamento_pago_tipo_id = DAOFactory::getApartamentosPagosTiposDAO()->insert($apartamentosPagosTipo);

        $transaction->commit();

        return $apartamento_pago_tipo_id;
    } catch (Exception $e) {
        if ($transaction)
            $transaction->rollback();
        return false;
    }
}

function insertApartamentoLugarCercano($data = array()) {
    try {
        $transaction = new Transaction();

        $apartamentoLugarCercano = DAOFactory::getApartamentosLugaresCercanosDAO()->prepare($data);
        $apartamento_lugar_cercano_id = DAOFactory::getApartamentosPagosTiposDAO()->insert($apartamentoLugarCercano);

        registrarAccion("insert", "apartamentos_lugares_cercanos", $apartamento_lugar_cercano_id);
        
        $transaction->commit();

        return $apartamento_lugar_cercano_id;
    } catch (Exception $e) {
        if ($transaction)
            $transaction->rollback();
        return false;
    }
}

function insertLugarCercano($data = array()) {
    try {
        $transaction = new Transaction();

        $lugarCercano = DAOFactory::getLugaresCercanosDAO()->prepare($data);
        $lugar_cercano_id = DAOFactory::getLugaresCercanosDAO()->insert($lugarCercano);
        
        registrarAccion("insert", "lugares_cercanos", $lugar_cercano_id);

        $transaction->commit();

        return $lugar_cercano_id;
    } catch (Exception $e) {
        if ($transaction)
            $transaction->rollback();
        return false;
    }
}

function insertApartamentosAlojamientos($data = array()) {
    try {
        $transaction = new Transaction();

        $apartamentosAlojamiento = DAOFactory::getApartamentosAlojamientosDAO()->prepare($data);
        $apartamento_alojamientos_id = DAOFactory::getApartamentosAlojamientosDAO()->insert($apartamentosAlojamiento);

        registrarAccion("insert", "apartamentos_alojamientos", $apartamento_alojamientos_id);
        
        $transaction->commit();

        return $apartamento_alojamientos_id;
    } catch (Exception $e) {
        if ($transaction)
            $transaction->rollback();
        return false;
    }
}

function updateApartamentosAlojamientos($idApartamentosAlojamientos, $data = array()) {
    try {
        $transaction = new Transaction();

        $apartamentosAlojamiento = DAOFactory::getApartamentosAlojamientosDAO()->prepare($data, $idApartamentosAlojamientos);
        DAOFactory::getApartamentosAlojamientosDAO()->update($apartamentosAlojamiento);

        registrarAccion("update", "apartamentos_alojamientos", $idApartamentosAlojamientos);
        
        $transaction->commit();

        return $apartamentosAlojamiento;
    } catch (Exception $e) {
        if ($transaction)
            $transaction->rollback();
        return false;
    }
}

function deleteApartamentosAlojamientos($idApartamento) {
    try {
        $transaction = new Transaction();

        $result = DAOFactory::getApartamentosAlojamientosDAO()->deleteByIdApartamento($idApartamento);

        registrarAccion("delete", "apartamentos_alojamientos", $idApartamento, "id_apartamento");
        
        $transaction->commit();

        return $result;
    } catch (Exception $e) {
        if ($transaction)
            $transaction->rollback();
        return false;
    }
}

function deleteApartamentosAdjuntos($idApartamentoAdjunto) {
    try {
        $transaction = new Transaction();

        $result = DAOFactory::getApartamentosAdjuntosDAO()->delete($idApartamentoAdjunto);
        
        registrarAccion("delete", "apartamentos_adjuntos", $idApartamentoAdjunto);

        $transaction->commit();

        return $result;
    } catch (Exception $e) {
        if ($transaction)
            $transaction->rollback();
        return false;
    }
}

function deleteAdjunto($idAdjunto) {
    try {
        $transaction = new Transaction();

        $result = DAOFactory::getAdjuntosDAO()->delete($idAdjunto);
        
        registrarAccion("delete", "adjuntos", $idAdjunto);

        $transaction->commit();

        return $result;
    } catch (Exception $e) {
        if ($transaction)
            $transaction->rollback();
        return false;
    }
}

function getTipoHabitaciones() {
    try {
        $habitaciones = DAOFactory::getAlojamientosDAO()->queryAll();
        return $habitaciones;
    } catch (Exception $e) {
        return false;
    }
}

function getTiposApartamentos() {
    try {
        $tipoApartamentos = DAOFactory::getApartamentosTiposDAO()->queryAll();
        return $tipoApartamentos;
    } catch (Exception $e) {
        return false;
    }
}

function countTiposApartamentos(){
    try {
        $tipoApartamentos = DAOFactory::getApartamentosTiposDAO()->queryAll();
        return $tipoApartamentos;
    } catch (Exception $e) {
        return false;
    }
}

function getTipoApartamento($idTipo) {
    try {
        $tipoApartamentos = DAOFactory::getApartamentosTiposDAO()->load($idTipo);
        return $tipoApartamentos;
    } catch (Exception $e) {
        return false;
    }
}

function deleteAllInstalacionesByApartamento($idApartamento){
    try {
        $transaction = new Transaction();

        $result = DAOFactory::getApartamentosInstalacionesDAO()->deleteByIdApartamento($idApartamento);

        $transaction->commit();

        return $result;
    } catch (Exception $e) {
        if ($transaction)
            $transaction->rollback();
        return false;
    }
}

function deleteAllApartamentosPagoTiposByApartamento($idApartamento){
    try {
        $transaction = new Transaction();

        $result = DAOFactory::getApartamentosPagosTiposDAO()->deleteByIdApartamento($idApartamento);

        $transaction->commit();

        return $result;
    } catch (Exception $e) {
        if ($transaction)
            $transaction->rollback();
        return false;
    }
}

function insertApartamentoAdjunto($data = array()) {
    try {
        $transaction = new Transaction();

        $apartamentoAdjunto = DAOFactory::getApartamentosAdjuntosDAO()->prepare($data);
        $apartamento_adjunto_id = DAOFactory::getApartamentosAdjuntosDAO()->insert($apartamentoAdjunto);

        registrarAccion("insert", "apartamentos_adjuntos", $apartamento_adjunto_id);
        
        $transaction->commit();

        return $apartamento_adjunto_id;
    } catch (Exception $e) {
        var_dump($e);
        if ($transaction)
            $transaction->rollback();
        return false;
    }
}

function insertAdjunto($data = array()) {
    try {
        $transaction = new Transaction();

        $adjunto = DAOFactory::getAdjuntosDAO()->prepare($data);
        $adjunto_id = DAOFactory::getAdjuntosDAO()->insert($adjunto);
        
        registrarAccion("insert", "adjuntos", $adjunto_id);

        $transaction->commit();

        return $adjunto_id;
    } catch (Exception $e) {
        if ($transaction)
            $transaction->rollback();
        return false;
    }
}

function searchApartamentos($data = array()){
    try{
        $apartamentos = DAOFactory::getApartamentosDAO()->searchByArguments($data);
        return $apartamentos;
    }catch (Exception $e) {
       
        return false;
    }
}

function updateApartamentoAdjuntos($apartamento_id, $data_adjuntos = array()) {
    try {
        $transaction = new Transaction();
        
        $tipos_adjunto = array_keys($data_adjuntos);
                
        foreach ($tipos_adjunto as $tipo) {
            if(is_null($data_adjuntos[$tipo])) continue;
            
            $adjunto_anterior = DAOFactory::getApartamentosDocumentosDAO()->queryByIdApartamentoAndTipo($apartamento_id, $tipo);
            $data_adjunto = $data_adjuntos[$tipo];
            
            if(count($adjunto_anterior) == 0) {
                
                $adjunto = DAOFactory::getAdjuntosDAO()->prepare($data_adjunto);
                $adjunto_id = DAOFactory::getAdjuntosDAO()->insert($adjunto);
                
                if(!$adjunto_id) throw new Exception('can not insert adjunto');
                
                $data = array('idApartamento' => $apartamento_id, 'idAdjunto' => $adjunto_id, tipo => $tipo);
                
                $apartamentoAdjunto = DAOFactory::getApartamentosDocumentosDAO()->prepare($data);
                $apartamentoAdjunto_id = DAOFactory::getApartamentosDocumentosDAO()->insert($apartamentoAdjunto);
                
                if(!$apartamentoAdjunto_id) throw new Exception('can not insert apartamento Adjunto');
                
            } else {
                $adjunto_anterior = $adjunto_anterior[0];                
                $adjunto = DAOFactory::getAdjuntosDAO()->prepare($data_adjunto, $adjunto_anterior->idAdjunto);
                DAOFactory::getAdjuntosDAO()->update($adjunto);
            }
        }
        
        registrarAccion("update", "apartamentos_adjuntos", $apartamento_id, "id_apartamento");
        
        $transaction->commit();
        
        return true;
        
    } catch(Exception $e) {
        print_r($e);
        if ($transaction)
            $transaction->rollback();
        return false;
    }
}

function getDocumentosByApartamentoId($apartamentoId) {
    try {
        
        $data_files = array(
            'licenciaTuristica' => NULL,
            'notaRegistral' => NULL,
            'reciboIBI' => NULL,
            'cedulaHabitabilidad' => NULL,
            'dniPropietario' => NULL,
            'certificadoComunidad' => NULL
        );
        
        $tipos = array_keys($data_files);
        
        foreach ($tipos as $tipo) {
            $apartamentoAdjunto = DAOFactory::getApartamentosDocumentosDAO()->queryByIdApartamentoAndTipo($apartamentoId, $tipo);
            if(count($apartamentoAdjunto) > 0) {
                $apartamentoAdjunto = $apartamentoAdjunto[0];
                $adjunto = DAOFactory::getAdjuntosDAO()->load($apartamentoAdjunto->idAdjunto);
                $data_files[$tipo] = $adjunto;
            }
        }
        
        return $data_files;
        
    } catch(Exception $e) {
        return false;
    }
}

function deleteApartamento($idApartamento, $inTransaction = true) {
    try {
        if($inTransaction)
        $transaction = new Transaction();

        $apartamento = DAOFactory::getApartamentosDAO()->load($idApartamento);
        
        // Borrar adjuntos por apartamento
        $adjuntos = DAOFactory::getApartamentosAdjuntosDAO()->queryByIdApartamento($idApartamento);
        
        DAOFactory::getApartamentosAdjuntosDAO()->deleteByIdApartamento($idApartamento);
        
        foreach ($adjuntos as $adjunto) {
            DAOFactory::getAdjuntosDAO()->delete($adjunto->idAdjunto);
        }
        
        // Borrar documentos por apartamento
        $adjuntos = DAOFactory::getApartamentosDocumentosDAO()->queryByIdApartamento($idApartamento);
        
        DAOFactory::getApartamentosDocumentosDAO()->deleteByIdApartamento($idApartamento);
        
        foreach ($adjuntos as $adjunto) {
            DAOFactory::getAdjuntosDAO()->delete($adjunto->idAdjunto);
        }
        
        //Borrar Alojamientos por apartamento
        DAOFactory::getApartamentosAlojamientosDAO()->deleteByIdApartamento($idApartamento);
        
        //Borrar instalaciones por apartamento
        DAOFactory::getApartamentosInstalacionesDAO()->deleteByIdApartamento($idApartamento);
                
        //Borrar articulos por apartamento
        DAOFactory::getApartamentosArticulosDAO()->deleteByIdApartamento($idApartamento);
        
        //Borrar instalaciones por apartamento
        DAOFactory::getApartamentosInstalacionesDAO()->deleteByIdApartamento($idApartamento);
        
        //Borrar lugares cercanos por apartamento
        DAOFactory::getApartamentosLugaresCercanosDAO()->deleteByIdApartamento($idApartamento);
        
        //Borrar tipos de pago por apartamento
        DAOFactory::getApartamentosPagosTiposDAO()->deleteByIdApartamento($idApartamento);
        
        //Borrar instalaciones por apartamento
        DAOFactory::getApartamentosInstalacionesDAO()->deleteByIdApartamento($idApartamento);
        
        //Borrar reservaciones por apartamento
        $reservaciones = DAOFactory::getReservacionesDAO()->queryByIdApartamento($idApartamento);
        
        foreach ($reservaciones as $reservacion) {
            deleteReserva($reservacion->idReservacion, FALSE);
        }
        
        
        //Borrar condiciones compra por apartamento
        DAOFactory::getCondicionesCompraDAO()->deleteByIdApartamento($idApartamento);
        
        //Borrar opiniones por apartamento
        DAOFactory::getOpinionesDAO()->deleteByIdApartamento($idApartamento);
        
        //Borrar disponibilidades por apartamento
        DAOFactory::getDisponibilidadesDAO()->deleteByIdApartamento($idApartamento);
        
        //Borrar apartamento
        DAOFactory::getApartamentosDAO()->delete($idApartamento);
        
        //Borrar direccion por apartamento
        //DAOFactory::getDireccionesDAO()->delete($apartamento->idDireccion);
        
        registrarAccion("delete", "apartamentos", $idApartamento);

        if($inTransaction)
        $transaction->commit();

        return true;
    } catch (Exception $e) {
        //print_r($e);
        if ($inTransaction && $transaction)
            $transaction->rollback();
        return false;
    }
}

function eliminarDocumentoApartamento($apartamentoId, $tipo){
    try {
        $transaction = new Transaction();
        
        $apartamentoDocumento = DAOFactory::getApartamentosDocumentosDAO()->queryByIdApartamentoAndTipo($apartamentoId, $tipo);
        
        if(!$apartamentoDocumento || count($apartamentoDocumento) == 0) throw new Exception('not exist documento');
        $apartamentoDocumento = $apartamentoDocumento[0];
        $d = DAOFactory::getApartamentosDocumentosDAO()->delete($apartamentoDocumento->idApartamentoDocumento);
        if(!$d) throw new Exception('not deleted apartamento-documento');
        
        $d = DAOFactory::getAdjuntosDAO()->delete($apartamentoDocumento->idAdjunto);
        if(!$d) throw new Exception('not deleted documento');
        
        registrarAccion("delete", "apartamentos_documentos", $apartamentoDocumento->idApartamentoDocumento);
        
        $transaction->commit();

        return true;
    } catch(Exception $e) {
        print_r($e);
        if ($transaction)
            $transaction->rollback();
        return false;
    }
}

function cambiarEstatusApartamento($idApartamento){
    try {
        $transaction = new Transaction();

        $apartamento = DAOFactory::getApartamentosDAO()->load($idApartamento);
        
        $apartamento->estatus = ($apartamento->estatus != 'inactivo') ? 'inactivo' : 'activo';
        
        DAOFactory::getApartamentosDAO()->update($apartamento);
        
        registrarAccion("update estatus", "apartamentos", $idApartamento);

        $transaction->commit();

        return true;
    } catch (Exception $e) {
        var_dump($e);
        if ($transaction)
            $transaction->rollback();
        return false;
    }
}

function getPropietarioByApartamento($aptoId) {
    try {
        $empresa = DAOFactory::getEmpresasDAO()->queryByApartamentoId($aptoId);
        
        return $empresa;
    } catch(Exception $e) {
        var_dump($e);
        return false;
    }
}

function getApartamentosMasVisitados($limit = 3) {
    try {
        $apartamentos = DAOFactory::getApartamentosDAO()->queryByVisitasAsc($limit);
       
        /*Esto se podia evitar
            foreach ($apartamentos as $apartamento) {
            if($apartamento->idComplejo)
                $apartamento->complejo = getComplejoById ($apartamento->idComplejo);
        }*/
        return $apartamentos;
    } catch(Exception $e) {
        var_dump($e);
        return false;
    }
}

function getFechasContratosByApartamento($idApartamento) {
    try {
        $fechas = DAOFactory::getContratosFechasDAO()->queryByIdApartamento($idApartamento);
        return $fechas;
    } catch (Exception $e) {
        return false;
    }
}

function getFechasContratosByApartamentoAndFecha($idApartamento, $fecha) {
    try {
        $fechas = DAOFactory::getContratosFechasDAO()->queryByIdApartamentoAndFecha($idApartamento, $fecha);
        return $fechas;
    } catch (Exception $e) {
        return false;
    }
}

function insertFechasContratos($data = array()) {
    try {
        $fechaContrato = DAOFactory::getContratosFechasDAO()->prepare($data);
        DAOFactory::getContratosFechasDAO()->insert($fechaContrato);
        return true;
    } catch (Exception $e) {
        return false;
    }
}

function updateFechasContratos($id, $data = array()) {
    try {
        $fechaContrato = DAOFactory::getContratosFechasDAO()->prepare($data, $id);
        DAOFactory::getContratosFechasDAO()->update($fechaContrato);
        return true;
    } catch (Exception $e) {
        return false;
    }
}

function deleteFechasContratos($id) {
    try {
        
        DAOFactory::getContratosFechasDAO()->delete($id);
        return true;
    } catch (Exception $e) {
        return false;
    }
}

function getApartamentosInstalacionesFilters($fechaInicio,$fechaFinal,$huespedes = false, $instalaciones = array(), $tipos = array(), $alojamientos = array(), $bounds = array()) {
    try {
        $timeFechaInicio = $fechaInicio ? strtotime($fechaInicio) : 0;
        $timeFechaFinal = $fechaFinal ? strtotime($fechaFinal) : 0;
        $instalaciones = DAOFactory::getInstalacionesDAO()->queryApartamentosFilters($timeFechaInicio, $timeFechaFinal,$huespedes, $instalaciones, $tipos, $alojamientos, $bounds);
                
        return $instalaciones;
    } catch (Exception $e) {
        var_dump($e);
        return false;
    }
}

function getApartamentosTiposFilters($fechaInicio,$fechaFinal,$huespedes = false, $instalaciones = array(), $tipos = array(), $alojamientos = array(), $bounds = array()) {
    try {
        $timeFechaInicio = $fechaInicio ? strtotime($fechaInicio) : 0;
        $timeFechaFinal = $fechaFinal ? strtotime($fechaFinal) : 0;
        $tipos = DAOFactory::getApartamentosTiposDAO()->queryApartamentosFilters($timeFechaInicio, $timeFechaFinal,$huespedes, $instalaciones, $tipos, $alojamientos, $bounds);
                
        return $tipos;
    } catch (Exception $e) {
        var_dump($e);
        return false;
    }
}

function getRangoPreciosByApartamento($idApto, $fechaInicial = 0, $fechaFinal = 0) {
    try {
        $fechaInicial = ($fechaInicial && strlen(trim($fechaInicial))) ? strtotime($fechaInicial) : strtotime();
        $fechaFinal = ($fechaFinal && strlen(trim($fechaFinal))) ? strtotime($fechaFinal) : 0;
        $disponibilidades = DAOFactory::getDisponibilidadesDAO()->getByApartamentoFechasPrecioAsc($idApto, $fechaInicial, $fechaFinal);

        $apartamento = DAOFactory::getApartamentosDAO()->load($idApto);
        if(!$disponibilidades || !count($disponibilidades))
            return array($apartamento->tarifaBase, $apartamento->tarifaBase);
        
        
        $min = $disponibilidades[0]->precio - ($disponibilidades[0]->precio * $disponibilidades[0]->descuento / 100);
        $cant = count($disponibilidades);
        $max = $disponibilidades[$cant - 1]->precio - ($disponibilidades[$cant - 1]->precio * $disponibilidades[$cant - 1]->descuento / 100);
        
        if(!$fechaFinal || ($fechaFinal - $fechaInicial)/(3600*24) > $cant && $apartamento->tarifaBase) {
            if($min > $apartamento->tarifaBase) $min = $apartamento->tarifaBase;
            if($max < $apartamento->tarifaBase) $max = $apartamento->tarifaBase;
        }
                
        return array($min, $max);
    } catch (Exception $e) {
        var_dump($e);
        return false;
    }
}

function noDisponible($idApartamento, $fechaInicio, $fechaFin) {
    try {
        
        $NoDisponibles = DAOFactory::getDisponibilidadesDAO()->queryNoDisponiblesByApartamentoIdAndFechas($idApartamento, $fechaInicio, $fechaFin);
        
        if(count($NoDisponibles) > 0)
            return true;
        return false;
        
    } catch (Exception $e) {
        
        return false;
    }   
}

?>

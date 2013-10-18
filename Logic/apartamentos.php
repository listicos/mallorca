<?php
function insertApartamento($data = array()) {
    try {
        $transaction = new Transaction();

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

        $apartamento = DAOFactory::getApartamentosDAO()->prepare($data, $idApartamento);
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

function getApartamentosCercanos($lat,$lon) {
    try {
        $apartamentos = DAOFactory::getApartamentosDAO()->queryByLatLonNear($lat, $lon);
        return $apartamentos;
    } catch (Exception $e) {
        return false;
    }
}

function getApartamentosFilters($fechaInicio,$fechaFinal,$huespedes = false) {
    try {
        $apartamentos = DAOFactory::getApartamentosDAO()->queryApartamentosFilters($fechaInicio, $fechaFinal,$huespedes);
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
        return $disponibilidades;
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

function getDisponibilidadByApartamento($idApartamento) {
    try {
        $disponibilidad = DAOFactory::getDisponibilidadesDAO()->queryByIdApartamento($idApartamento);
        return $disponibilidad;
    } catch (Exception $e) {
        return false;
    }
}

function getDisponibilidadByApartamentoMenorPrecio($idApartamento,$limit = 1) {
    try {
        $disponibilidad = DAOFactory::getDisponibilidadesDAO()->queryByIdApartamentoMenorPrecio($idApartamento,$limit);
        return $disponibilidad;
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

function getTotalPrice($idApartamento,$fechaInicio, $fechaFinal) {
    $disponibilidades = getByIdApartamentoFechas($idApartamento,$fechaInicio, $fechaFinal);
    $total = 0;

    $noches = ($fechaFinal - $fechaInicio) / 86400;
    $noches_disponibles = 0;

    if($disponibilidades){
        foreach ($disponibilidades as $d) {
            if($d->precio && is_numeric($d->precio) && $d->precio>0){
                $total+=$d->precio;
                $noches_disponibles++;
            }
        }
        if($noches != $noches_disponibles){
            return false;
        }else{
           return $total;
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
            DAOFactory::getReservacionesPagosDAO()->deleteByIdReservacion($reservacion->idReservacion);
        }
        
        DAOFactory::getReservacionesDAO()->deleteByIdApartamento($idApartamento);
        
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

function buscarApartamentosByFechasAndHuespedes($fechaInicio, $fechaFin, $huespedes) {
    try {
        
    } catch(Exception $exc) {
        var_dump($exc);
        return false;
    }
}

?>

<?php 
function insertDisponibilidad($data = array()) {
    try {
        $transaction = new Transaction();

        $disponibilidad = DAOFactory::getDisponibilidadesDAO()->prepare($data);
        $disponibilidad_id = DAOFactory::getDisponibilidadesDAO()->insert($disponibilidad);

        $transaction->commit();

        return $disponibilidad_id;
    } catch (Exception $e) {
        var_dump($e);
        if ($transaction)
            $transaction->rollback();
        return false;
    }
}

function updateDisponibilidad($idDisponibilidad, $data = array()){
    try {
        $transaction = new Transaction();
        
        $disponibilidad = DAOFactory::getDisponibilidadesDAO()->prepare($data, $idDisponibilidad);
        DAOFactory::getDisponibilidadesDAO()->update($disponibilidad);

        $transaction->commit();

        return $disponibilidad;
    } catch (Exception $e) {
        var_dump($e);
        if ($transaction)
            $transaction->rollback();
        return false;
    }
}

function deleteDisponibilidadByApartamento($idApartamento, $fechaInicio, $fechaFinal){
    try {
        $transaction = new Transaction();
        
        if(!$fechaInicio)
            DAOFactory::getDisponibilidadesDAO ()->deleteByIdApartamento ($idApartamento);
        else 
            DAOFactory::getDisponibilidadesDAO ()->deleteByIdApartamentoAndFechas ($idApartamento, $fechaInicio, $fechaFinal);

        $transaction->commit();

        return true;
    } catch (Exception $e) {
        var_dump($e);
        if ($transaction)
            $transaction->rollback();
        return false;
    }
}


?>
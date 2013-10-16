<?php

function getOpinion($idOpinion) {
    try {
        $opinion = DAOFactory::getOpinionesDAO()->load($idOpinion);
        return $opinion;
    } catch (Exception $e) {
        return false;
    }
}

function getOpiniones() {
    try {
        $opiniones = DAOFactory::getOpinionesDAO()->queryAll();
        return $opiniones;
    } catch (Exception $e) {
        return false;
    }
}

function getOpinionesByApartamento($idApartamento){
    try{
        $opiniones = DAOFactory::getOpinionesDAO()->queryByIdApartamento($idApartamento);
        return $opiniones;
    }catch (Exception $e) {
        return false;
    }
}

function searchOpiniones($data = array()){
    try{
        $opiniones = DAOFactory::getOpinionesDAO()->searchByArguments($data);
        return $opiniones;
    }catch (Exception $e) {
        return false;
    }
}

function getOrderedOpiniones($data = array()){
    try{
        $opiniones = DAOFactory::getOpinionesDAO()->orderByArgs($data);
        return $opiniones;
    }catch (Exception $e) {
        return false;
    }
}

function insertOpinion($data = array()) {
    try {
        $transaction = new Transaction();

        $opinion = DAOFactory::getOpinionesDAO()->prepare($data);
        $opinion_id = DAOFactory::getOpinionesDAO()->insert($opinion);
        
        registrarAccion("insert", "opiniones", $opinion_id);

        $transaction->commit();

        return $opinion_id;
    } catch (Exception $e) {
        if ($transaction)
            $transaction->rollback();
        return false;
    }
}


function updateOpinion($idOpinion, $data = array()) {
    try {
        //start new transaction	
        $transaction = new Transaction();

        $opinion = DAOFactory::getOpinionesDAO()->prepare($data, $idOpinion);

        DAOFactory::getOpinionesDAO()->update($opinion);
        
        registrarAccion("update", "opiniones", $idOpinion);

        $transaction->commit();

        return $opinion;
    } catch (Exception $e) {
        if ($transaction)
            $transaction->rollback();
        
        var_dump($e->getMessage());
        return false;
    }
}

function deleteOpinion($idOpinion) {
    try {
        //start new transaction	
        $transaction = new Transaction();

        $opinion = DAOFactory::getOpinionesDAO()->delete($idOpinion);
        
        registrarAccion("delete", "opiniones", $idOpinion);

        $transaction->commit();

        return $opinion;
    } catch (Exception $e) {
        if ($transaction)
            $transaction->rollback();
        
        var_dump($e->getMessage());
        return false;
    }
}

?>

<?php

function getPolitica($idPolitica) {
    try {
        
        $politica = DAOFactory::getPoliticasCancelacionDAO()->load($idPolitica);
        return $politica;
        
    } catch (Exception $e) {
        return false;
    }
}

function getPoliticas() {
    try {
        
        $politicas = DAOFactory::getPoliticasCancelacionDAO()->queryAll();
        return $politicas;
        
    } catch (Exception $e) {
        return false;
    }
}

function searchPoliticas($data = array()){
    try{
        $politicas = DAOFactory::getPoliticasCancelacionDAO()->searchByArguments($data);
        
        return $politicas;
    }catch (Exception $e) {
       
        return false;
    }
}

function insertPolitica($data = array()) {
    try {
        $transaction = new Transaction();

        $politica = DAOFactory::getPoliticasCancelacionDAO()->prepare($data);
        $politica_id = DAOFactory::getPoliticasCancelacionDAO()->insert($politica);
        
        registrarAccion("insert", "politicas_cancelacion", $politica_id);

        $transaction->commit();

        return $politica_id;
    } catch (Exception $e) {
        var_dump($e);
        if ($transaction)
            $transaction->rollback();
        return false;
    }
}

function updatePolitica($idPolitica, $data= array()){
    try {
        $transaction = new Transaction();

        $politica = DAOFactory::getPoliticasCancelacionDAO()->prepare($data, $idPolitica);
        DAOFactory::getPoliticasCancelacionDAO()->update($politica);
        
        registrarAccion("update", "politicas_cancelacion", $idPolitica);

        $transaction->commit();

        return $politica;
    } catch (Exception $e) {
        var_dump($e);
        if ($transaction)
            $transaction->rollback();
        return false;
    }
}

function deletePolitica($idPolitica) {
    try {
        $transaction = new Transaction();

        DAOFactory::getPoliticasCancelacionDAO()->delete($idPolitica);
        
        registrarAccion("delete", "politicas_cancelacion", $idPolitica);

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

<?php

function searchComplejos($data = array()){
    try{
        $complejos = DAOFactory::getComplejosDAO()->searchByArguments($data);
        return $complejos;
    }catch (Exception $e) {
        return false;
    }
}

function deleteComplejo($complejoId) {
    try {
        
        $transaction = new Transaction();
        
        DAOFactory::getComplejosDAO()->delete($complejoId);
        
        $transaction->commit();
        return true;
        
    } catch (Exception $e) {
        var_dump($e);
        if($transaction)$transaction->rollback ();
        return false;
    }
}

function getComplejoById($id) {
    try{
        $complejo = DAOFactory::getComplejosDAO()->load($id);
        return $complejo;
    }catch (Exception $e) {
        return false;
    }
}

function insertComplejo($data = array()) {
    try {
        
        $transaction = new Transaction();
        
        $complejo = DAOFactory::getComplejosDAO()->prepare($data);
        DAOFactory::getComplejosDAO()->insert($complejo);
        
        $transaction->commit();
        return true;
        
    } catch (Exception $e) {
        var_dump($e);
        if($transaction)$transaction->rollback ();
        return false;
    }
}

function updateComplejo($complejoId, $data) {
    try {
        
        $transaction = new Transaction();
        
        $complejo = DAOFactory::getComplejosDAO()->prepare($data, $complejoId);
        DAOFactory::getComplejosDAO()->update($complejo);
        
        $transaction->commit();
        return true;
        
    } catch (Exception $e) {
        var_dump($e);
        if($transaction)$transaction->rollback ();
        return false;
    }
}

function allComplejos() {
    try {
        $complejos = DAOFactory::getComplejosDAO()->queryAll();
        return $complejos;
    } catch(Exception $e) {
        var_dump($e);
        return false;
    }
}

?>

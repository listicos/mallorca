<?php

function searchCanales($data = array()) {
    try {
        $canales = DAOFactory::getCanalesDAO()->searchByArguments($data);
        
        return $canales;
    } catch (Exception $e) {

        return false;
    }
}

function getCanal($id) {
    try {
        
        $canal = DAOFactory::getCanalesDAO()->load($id);
        return $canal;
        
    } catch(Exception $e) {
        var_dump($e);
        return false;
    }
}

function insertCanal($data = array()) {
    try {
        
        $canal = DAOFactory::getCanalesDAO()->prepare($data);
        $idCanal = DAOFactory::getCanalesDAO()->insert($canal);
        return $idCanal;
        
    } catch(Exception $e) {
        var_dump($e);
        return false;
    }
}

function updateCanal($idCanal, $data = array()) {
    try {
        
        $canal = DAOFactory::getCanalesDAO()->prepare($data, $idCanal);
        DAOFactory::getCanalesDAO()->update($canal);
        return $idCanal;
        
    } catch(Exception $e) {
        var_dump($e);
        return false;
    }
}

function deleteCanal($idCanal) {
    try {
        
        DAOFactory::getCanalesDAO()->delete($idCanal);
        return $idCanal;
        
    } catch(Exception $e) {
        var_dump($e);
        return false;
    }
}

?>

<?php

function getConfiguracion() {
    try {
        
        $config = DAOFactory::getConfiguracionDAO()->queryAll();
        if($config && count($config)) {
            $config[0]->direccion = getDireccion($config[0]->idDireccion);
            return $config[0];
        }
        return false;
        
    } catch(Exception $e) {
        var_dump($e);
        return false;
    }
}

function setConfiguracion($data = array(), $data_direccion = array()) {
    try {
        
        $config = getConfiguracion();
        if($config) { //update
            updateDireccion($config->idDireccion, $data_direccion);
            $config = DAOFactory::getConfiguracionDAO()->prepare($data, $config->idConfiguracion);
            DAOFactory::getConfiguracionDAO()->update($config);
            
        } else { //insert
            
            $direccion_id = insertDireccion($data_direccion);
            $data['idDireccion'] = $direccion_id;
            $config = DAOFactory::getConfiguracionDAO()->prepare($data);
            $id_config = DAOFactory::getConfiguracionDAO()->insert($config);
        }
        
        return true;
        
    } catch(Exception $e) {
        var_dump($e);
        if(isset($transaction)) {
            $transaction->rollback();
        }
        return false;
    }
}
?>

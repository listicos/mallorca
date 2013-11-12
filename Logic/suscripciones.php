<?php

function insertSuscripcion($data = array()) {
    try {
        
        $suscripcion = DAOFactory::getSubscripcionesDAO()->queryByEmail($data['email']);
        if(!$suscripcion || count($suscripcion) == 0) {
            $data['tiempoCreacion'] = date("Y-m-d");
            $data['estatus'] = 'Activo';
            $suscripcion = DAOFactory::getSubscripcionesDAO()->prepare($data);
            $suscripcion_id = DAOFactory::getSubscripcionesDAO()->insert($suscripcion);
        }
        return true;
        
    } catch(Exception $e) {
        var_dump($e);
        return false;
    }
}
?>

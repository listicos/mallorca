<?php
function getProvincias() {
    try {
        $provincias = DAOFactory::getProvinciasDAO()->queryAll();
        return $provincias;
    } catch (Exception $e) {
        return false;
    }
}

function getCiudades() {
    try {
        $ciudades = DAOFactory::getCiudadesDAO()->queryAll();
        return $ciudades;
    } catch (Exception $e) {
        return false;
    }
}

function getPais($idPais) {
    try {
        $pais = DAOFactory::getPaisesDAO()->load($idPais);
        return $pais;
    } catch (Exception $e) {
        return false;
    }
}

function getPaises() {
    try {
        $paises = DAOFactory::getPaisesDAO()->queryAll();
        return $paises;
    } catch (Exception $e) {
        return false;
    }
}

function buscar_paises($query = '') {
    try {
        $paises = DAOFactory::getPaisesDAO()->buscar($query);
        return $paises;
    } catch (Exception $e) {
        return false;
    }
}

function getDireccion($idDireccion) {
    try {
        $direccion = DAOFactory::getDireccionesDAO()->load($idDireccion);
        return $direccion;
    } catch (Exception $e) {
        return false;
    }
}

function getDirecciones() {
    try {
        $direcciones = DAOFactory::getDireccionesDAO()->queryAll();
        return $direcciones;
    } catch (Exception $e) {
        return false;
    }
}

function insertDireccion($data = array()) {
    try {

        $transaction = new Transaction();

        $direccion = DAOFactory::getDireccionesDAO()->prepare($data);
        $id_direccion = DAOFactory::getDireccionesDAO()->insert($direccion);

        $transaction->commit();

        return $id_direccion;
        
    } catch (Exception $e) {
        var_dump($e);
        if ($transaction)
            $transaction->rollback();
        return false;
    }
}

function updateDireccion($idDireccion, $data = array()) {
    try {
        //start new transaction	
        $transaction = new Transaction();

        $direccion = DAOFactory::getDireccionesDAO()->prepare($data, $idDireccion);

        DAOFactory::getDireccionesDAO()->update($direccion);

        $transaction->commit();

        return $direccion;
    } catch (Exception $e) {
        if ($transaction)
            $transaction->rollback();
        
        var_dump($e->getMessage());
        return false;
    }
}


function deleteDireccion($idDir) {
    try {
        $direcciones = DAOFactory::getDireccionesDAO()->deleteByIdDireccion($idDir);
        return $direcciones;
    } catch (Exception $e) {
        var_dump($e->getMessage());
        return false;
    }
}
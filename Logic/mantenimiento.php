<?php

function searchMantenimientos($data = array()) {
    try {
        $mantenimientos = DAOFactory::getMantenimientosDAO()->searchByArguments($data);
        foreach ($mantenimientos as $mantenimiento) {
            $mantenimiento->apartamento = DAOFactory::getApartamentosDAO()->load($mantenimiento->idApartamento);
            if ($mantenimiento->fechaCierre) {
                $fecha = explode("-", $mantenimiento->fechaCierre);
                $mantenimiento->fechaCierre = date_date_set(new DateTime(), $fecha[0], $fecha[1], $fecha[2]);
            }
        }
        return $mantenimientos;
    } catch (Exception $e) {

        return false;
    }
}

function getMantenimiento($idMantenimiento) {
    try {
        $mantenimiento = DAOFactory::getMantenimientosDAO()->load($idMantenimiento);
        $mantenimiento->apartamento = DAOFactory::getApartamentosDAO()->load($mantenimiento->idApartamento);
        if ($mantenimiento->fechaCierre) {
            $fecha = explode("-", $mantenimiento->fechaCierre);
            $mantenimiento->fechaCierre = date_date_set(new DateTime(), $fecha[0], $fecha[1], $fecha[2]);
        }
        $materiales = DAOFactory::getMantenimientosMaterialesDAO()->queryByIdMantenimiento($idMantenimiento);
        $mantenimiento->materiales = $materiales;

        $personal = DAOFactory::getMantenimientosPersonalDAO()->queryByIdMantenimiento($idMantenimiento);

        foreach ($personal as $p) {
            if ($p->fecha) {
                $fecha = explode("-", $p->fecha);
                $p->fecha = date_date_set(new DateTime(), $fecha[0], $fecha[1], $fecha[2]);
            }
        }
        $mantenimiento->personal = $personal;
        return $mantenimiento;
    } catch (Exception $e) {

        return false;
    }
}

function insertMantenimiento($data = array(), $data_materiales = array(), $data_personal = array()) {
    try {
        $transaction = new Transaction();

        $data['tiempoCreacion'] = date("Y-m-d H:i:s");

        $mantenimiento = DAOFactory::getMantenimientosDAO()->prepare($data);

        $mantenimiento_id = DAOFactory::getMantenimientosDAO()->insert($mantenimiento);

        foreach ($data_materiales as $data_material) {
            $data_material['idMantenimiento'] = $mantenimiento_id;
            $material = DAOFactory::getMantenimientosMaterialesDAO()->prepare($data_material);
            $material_id = DAOFactory::getMantenimientosMaterialesDAO()->insert($material);
            if (!$material_id)
                throw new Exception('not insert material');
        }

        foreach ($data_personal as $data_p) {
            $data_p['idMantenimiento'] = $mantenimiento_id;
            $p = DAOFactory::getMantenimientosPersonalDAO()->prepare($data_p);
            $p_id = DAOFactory::getMantenimientosPersonalDAO()->insert($p);
            if (!$p_id)
                throw new Exception('not insert personal');
        }

        registrarAccion("insert", "mantenimientos", $mantenimiento_id);

        $transaction->commit();
        return $mantenimiento_id;
    } catch (Exception $e) {
        print_r($e);
        var_dump($e);
        if ($transaction)
            $transaction->rollback();
        return false;
    }
}

function updateMantenimientoEstatus($idMantenimiento) {
    try {
        $transaction = new Transaction();

        $data['ultimaModificacion'] = date("Y-m-d H:i:s");

        $mantenimiento = DAOFactory::getMantenimientosDAO()->prepare($data, $idMantenimiento);
        
        $mantenimiento->estatus = ($mantenimiento->estatus == 'Rechazado') ? 'Aprobado' : 'Rechazado';

        DAOFactory::getMantenimientosDAO()->update($mantenimiento);
        
        $transaction->commit();
        
        return $mantenimiento;
    } catch (Exception $e) {
        if ($transaction)
            $transaction->rollback();
        return false;
    }
}

function updateMantenimiento($idMantenimiento, $data = array(), $data_materiales = array(), $data_personal = array()) {
    try {
        $transaction = new Transaction();

        $data['ultimaModificacion'] = date("Y-m-d H:i:s");

        $mantenimiento = DAOFactory::getMantenimientosDAO()->prepare($data, $idMantenimiento);

        DAOFactory::getMantenimientosDAO()->update($mantenimiento);

        DAOFactory::getMantenimientosMaterialesDAO()->deleteByIdMantenimiento($idMantenimiento);

        foreach ($data_materiales as $data_material) {
            $data_material['idMantenimiento'] = $idMantenimiento;
            $material = DAOFactory::getMantenimientosMaterialesDAO()->prepare($data_material);
            $material_id = DAOFactory::getMantenimientosMaterialesDAO()->insert($material);
            if (!$material_id)
                throw new Exception('not insert material');
        }

        DAOFactory::getMantenimientosPersonalDAO()->deleteByIdMantenimiento($idMantenimiento);

        foreach ($data_personal as $data_p) {
            $data_p['idMantenimiento'] = $idMantenimiento;
            $p = DAOFactory::getMantenimientosPersonalDAO()->prepare($data_p);
            $p_id = DAOFactory::getMantenimientosPersonalDAO()->insert($p);
            if (!$p_id)
                throw new Exception('not insert personal');
        }

        registrarAccion("update", "mantenimientos", $idMantenimiento);

        $transaction->commit();
        return true;
    } catch (Exception $e) {
        var_dump($e);
        if ($transaction)
            $transaction->rollback();
        return false;
    }
}

function cambiarEstatusMantenimiento($idMantenimiento, $estatus){
    try {
        $transaction = new Transaction();

        $mtto = DAOFactory::getMantenimientosDAO()->load($idMantenimiento);
        
        $mtto->estatus = $estatus;
        
        if(strcmp($estatus, "Terminado"))
            $mtto->fechaCierre = date("Y-m-d");
        
        DAOFactory::getMantenimientosDAO()->update($mtto);
        
        registrarAccion("update", "mantenimientos", $idMantenimiento);

        $transaction->commit();

        return true;
    } catch (Exception $e) {
        var_dump($e);
        if ($transaction)
            $transaction->rollback();
        return false;
    }
}

function getMantenimientosByEstado($estado) {
    try {
        
        $mantenimientos = DAOFactory::getMantenimientosDAO()->queryByEstatus($estado);
        return $mantenimientos;
        
    } catch (Exception $e) {
        var_dump($e);
        return false;
    }
}

?>

<?php

function getMonedas(){
    try{
        $monedas = DAOFactory::getMonedasDAO()->queryAll();
        return $monedas;
    }  catch (Exception $e){
        return false;
    }
}

function getMoneda($idMoneda){
    try{
        $moneda = DAOFactory::getMonedasDAO()->load($idMoneda);
        return $moneda;
    }  catch (Exception $e){
        return false;
    }
}

function insertCuenta($data = array()){
    try {
        $transaction = new Transaction();

        $cuenta = DAOFactory::getCuentasDAO()->prepare($data);
        $cuenta_id = DAOFactory::getCuentasDAO()->insert($cuenta);

        $transaction->commit();

        return $cuenta_id;
    } catch (Exception $e) {
        var_dump($e);
        if ($transaction)
            $transaction->rollback();
        return false;
    }
}

function getCuentaByEmpresaId($idEmpresa) {
    try {
        $cuentas_empresa = DAOFactory::getEmpresasCuentasDAO()->queryByIdEmpresa($idEmpresa);
        $cuentas = array();
        if($cuentas_empresa){
            foreach ($cuentas_empresa as $c_e) {
                $cuenta = DAOFactory::getCuentasDAO()->load($c_e->idCuenta);
                if($cuenta){
                    $cuentas[] = $cuenta;
                }
            }
            if($cuentas && count($cuentas)>0){
                return $cuentas;
            }else{
                return false;
            }
        }else{
            return false;
        }
        
    } catch (Exception $e) {
        return false;
    }
}

function getCuentas() {
    try {
        $cuentas = DAOFactory::getCuentasDAO()->queryAll();
        return $cuentas;
    } catch (Exception $e) {
        return false;
    }
}

function getMonedaById($id_mon) {
    try {
        $moneda = DAOFactory::getMonedasDAO()->load($id_mon);
        return $moneda;
    } catch (Exception $e) {
        return false;
    }
}

function updateCuenta($idCuenta, $data = array()) {
    try {
        //start new transaction	
        $transaction = new Transaction();

        $cuenta = DAOFactory::getCuentasDAO()->prepare($data, $idCuenta);

        DAOFactory::getCuentasDAO()->update($cuenta);

        $transaction->commit();

        return $cuenta;
    } catch (Exception $e) {
        if ($transaction)
            $transaction->rollback();
        var_dump($e->getMessage());
        return false;
    }
}

function deleteCuenta($idCuenta) {
    try {
        $cuenta = DAOFactory::getCuentasDAO()->deleteByIdEmpresa($idCuenta);
        return $cuenta;
    } catch (Exception $e) {
        return false;
    }
}

?>

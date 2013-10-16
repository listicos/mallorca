<?php

function getContratos() {
    try {
        $contratos = DAOFactory::getContratosDAO()->queryAll();
        return $contratos;
    } catch (Exception $e) {
        return false;
    }
}

function getContrato($idContrato) {
    try {
        $contrato = DAOFactory::getContratosDAO()->load($idContrato);
        return $contrato;
    } catch (Exception $e) {
        return false;
    }
}

function getContratoEmpresa($idEmpresa) {
    try {
        $empresa_contrato = DAOFactory::getEmpresasContratosDAO()->queryByIdEmpresa($idEmpresa);
        return $empresa_contrato;
    } catch (Exception $e) {
        return false;
    }
}

function getEmpresaContrato($idEmpresaContrato) {
    try {
        $empresa_contrato = DAOFactory::getEmpresasContratosDAO()->load($idEmpresaContrato);
        return $empresa_contrato;
    } catch (Exception $e) {
        return false;
    }
}

function getContratosByContratoEmpresaId($idEmpresa, $idContrato) {
    try {
        $contratos_array = array();
        $contratosEmpresa = DAOFactory::getEmpresasContratosDAO()->queryByIdContratoEmpresa($idEmpresa,$idContrato);
        if($contratosEmpresa && count($contratosEmpresa)>0){
            foreach ($contratosEmpresa as $key => $contratoEmp) {
                $contrato_temp = DAOFactory::getContratosDAO()->load($contratoEmp->idContrato);
                $contratos_array[$key]['contrato'] = $contrato_temp;
                $contratos_array[$key]['contratoEmpresa'] = $contratoEmp;
            }
            return $contratos_array;
        }else{
            return false;
        }
        
    } catch (Exception $e) {
        return false;
    }
}

function getContratosByEmpresaId($idEmpresa) {
    try {
        $contratos_array = array();
        $contratosEmpresa = DAOFactory::getEmpresasContratos()->queryByIdEmpresa($idEmpresa);
        if($contratosEmpresa && count($contratosEmpresa)>0){
            foreach ($contratosEmpresa as $key => $contratoEmp) {
                $contrato_temp = DAOFactory::getContratosDAO()->load($contratoEmp->idContrato);
                $contratos_array[$key]['contrato'] = $contrato_temp;
                $contratos_array[$key]['contratoEmpresa'] = $contratoEmp;
            }
            return $contratos_array;
        }else{
            return false;
        }
        
    } catch (Exception $e) {
        return false;
    }
}

function insertContrato($data = array()) {
    try {
        $transaction = new Transaction();

        $contrato = DAOFactory::getContratosDAO()->prepare($data);
        $contrato_id = DAOFactory::getContratosDAO()->insert($contrato);

        $transaction->commit();

        return $contrato_id;
    } catch (Exception $e) {
        if ($transaction)
            $transaction->rollback();
        return false;
    }
}

function updateContrato($idContrato, $data = array()) {
    try {
        //start new transaction	
        $transaction = new Transaction();

        $contrato = DAOFactory::getContratosDAO()->prepare($data, $idContrato);

        DAOFactory::getContratosDAO()->update($contrato);

        $transaction->commit();

        return $contrato;
    } catch (Exception $e) {
        if ($transaction)
            $transaction->rollback();
        return false;
    }
}

function deleteEmpresaContrato($idEmpresaContrato) {
    try {
        $empresaContrato = DAOFactory::getEmpresasContratosDAO()->delete($idEmpresaContrato);
        return $empresaContrato;
    } catch (Exception $e) {
        return false;
    }
}

function searchContratos($data = array()){
    try{
        $contratos = DAOFactory::getContratosDAO()->searchByArguments($data);
        return $contratos;
    }catch (Exception $e) {
        return false;
    }
}

?>
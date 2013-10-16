<?php

function insertEmpresa($data = array()) {
    try {
        $transaction = new Transaction();

        $empresa = DAOFactory::getEmpresasDAO()->prepare($data);
        $empresa_id = DAOFactory::getEmpresasDAO()->insert($empresa);
        
        registrarAccion("insert", "empresas", $empresa_id);

        $transaction->commit();

        return $empresa_id;
    } catch (Exception $e) {
        if ($transaction)
            $transaction->rollback();
        return false;
    }
}

function updateEmpresa($idEmpresa, $data = array()) {
    try {
        //start new transaction	
        $transaction = new Transaction();

        $empresa = DAOFactory::getEmpresasDAO()->prepare($data, $idEmpresa);

        DAOFactory::getEmpresasDAO()->update($empresa);
        
        registrarAccion("update", "empresas", $idEmpresa);

        $transaction->commit();

        return $empresa;
    } catch (Exception $e) {
        if ($transaction)
            $transaction->rollback();
        
        var_dump($e->getMessage());
        return false;
    }
}

function getEmpresa($idEmpresa) {
    try {
        $empresa = DAOFactory::getEmpresasDAO()->load($idEmpresa);
        return $empresa;
    } catch (Exception $e) {
        return false;
    }
}

function getEmpresas() {
    try {
        $empresas = DAOFactory::getEmpresasDAO()->queryAll();
        return $empresas;
    } catch (Exception $e) {
        return false;
    }
}

function getEmpresaByDireccionId($idEmpresa) {
    try {
        $empresa = DAOFactory::getEmpresasDAO()->load($idEmpresa);
        return $empresa;
    } catch (Exception $e) {
        return false;
    }
}

function getDatosEmpresa() {
    try {
        //$empresa = DAOFactory::getEmpresasDAO()->queryNombreAndID();
        $empresa = DAOFactory::getEmpresasDAO()->queryNombreAndID();
        return $empresa;
    } catch (Exception $e) {
        return false;
    }
}

function getDatosEmpresaAutocomplete($value) {
    try {
        //$empresa = DAOFactory::getEmpresasDAO()->queryNombreAndID();
        $empresa = DAOFactory::getEmpresasDAO()->queryNombreIDByLike($value);
        return $empresa;
    } catch (Exception $e) {
        return false;
    }
}


function deleteEmpresa($idEmpresa) {
    try {
        
        $transaction = new Transaction();
        
        // borrar contratos por empresa
        $contratos = DAOFactory::getEmpresasContratosDAO()->queryByIdEmpresa($idEmpresa);
        
        foreach ($contratos as $contrato) {
            //borrar aptos por empresa
            $apartamentos = DAOFactory::getApartamentosDAO()->queryByIdEmpresaContrato($contrato->idEmpresaContrato);
            
            foreach ($apartamentos as $apartamento) {
                
                $idApartamento = $apartamento->idApartamento;
                // Borrar adjuntos por apartamento
                $adjuntos = DAOFactory::getApartamentosAdjuntosDAO()->queryByIdApartamento($idApartamento);

                DAOFactory::getApartamentosAdjuntosDAO()->deleteByIdApartamento($idApartamento);

                foreach ($adjuntos as $adjunto) {
                    DAOFactory::getAdjuntosDAO()->delete($adjunto->idAdjunto);
                }

                // Borrar documentos por apartamento
                $adjuntos = DAOFactory::getApartamentosDocumentosDAO()->queryByIdApartamento($idApartamento);

                DAOFactory::getApartamentosDocumentosDAO()->deleteByIdApartamento($idApartamento);

                foreach ($adjuntos as $adjunto) {
                    DAOFactory::getAdjuntosDAO()->delete($adjunto->idAdjunto);
                }

                //Borrar Alojamientos por apartamento
                DAOFactory::getApartamentosAlojamientosDAO()->deleteByIdApartamento($idApartamento);

                //Borrar instalaciones por apartamento
                DAOFactory::getApartamentosInstalacionesDAO()->deleteByIdApartamento($idApartamento);

                //Borrar articulos por apartamento
                DAOFactory::getApartamentosArticulosDAO()->deleteByIdApartamento($idApartamento);

                //Borrar instalaciones por apartamento
                DAOFactory::getApartamentosInstalacionesDAO()->deleteByIdApartamento($idApartamento);

                //Borrar lugares cercanos por apartamento
                DAOFactory::getApartamentosLugaresCercanosDAO()->deleteByIdApartamento($idApartamento);

                //Borrar tipos de pago por apartamento
                DAOFactory::getApartamentosPagosTiposDAO()->deleteByIdApartamento($idApartamento);

                //Borrar instalaciones por apartamento
                DAOFactory::getApartamentosInstalacionesDAO()->deleteByIdApartamento($idApartamento);

                //Borrar reservaciones por apartamento
                $reservaciones = DAOFactory::getReservacionesDAO()->queryByIdApartamento($idApartamento);

                foreach ($reservaciones as $reservacion) {
                    DAOFactory::getReservacionesPagosDAO()->deleteByIdReservacion($reservacion->idReservacion);
                }

                DAOFactory::getReservacionesDAO()->deleteByIdApartamento($idApartamento);

                //Borrar condiciones compra por apartamento
                DAOFactory::getCondicionesCompraDAO()->deleteByIdApartamento($idApartamento);

                //Borrar opiniones por apartamento
                DAOFactory::getOpinionesDAO()->deleteByIdApartamento($idApartamento);

                //Borrar disponibilidades por apartamento
                DAOFactory::getDisponibilidadesDAO()->deleteByIdApartamento($idApartamento);

                //Borrar apartamento
                DAOFactory::getApartamentosDAO()->delete($idApartamento);
                
            }            
        }
        
        DAOFactory::getEmpresasContratosDAO()->deleteByIdEmpresa($idEmpresa);
        
        //borrar cuentas por empresa
        $cuentas = DAOFactory::getEmpresasCuentasDAO()->queryByIdEmpresa($idEmpresa);
        DAOFactory::getEmpresasCuentasDAO()->deleteByIdEmpresa($idEmpresa);
        foreach ($cuentas as $cuenta) {
            DAOFactory::getCuentasDAO()->delete($cuenta->idCuenta);
        }
        
        $empresa = DAOFactory::getEmpresasDAO()->load($idEmpresa);
        
        DAOFactory::getEmpresasDAO()->delete($idEmpresa);
        
        DAOFactory::getDireccionesDAO()->delete($empresa->idDireccion);
        
        registrarAccion("delete", "empresas", $idEmpresa);
        
        $transaction->commit();
        
        return $empresa;
    } catch (Exception $e) {
        
        if ($transaction)
            $transaction->rollback();
        return false;
    }
}

function insertEmpresaContrato($data = array()) {
    try {
        $transaction = new Transaction();

        $empresasContrato = DAOFactory::getEmpresasContratosDAO()->prepare($data);
        $empresas_contrato_id = DAOFactory::getEmpresasContratosDAO()->insert($empresasContrato);

        registrarAccion("insert", "empresas_contratos", $empresas_contrato_id);
        
        $transaction->commit();

        return $empresas_contrato_id;
    } catch (Exception $e) {
        var_dump($e);
        if ($transaction)
            $transaction->rollback();
        return false;
    }
}


function insertEmpresaCuenta($data = array()) {
    try {
        $transaction = new Transaction();

        $empresasCuenta = DAOFactory::getEmpresasCuentasDAO()->prepare($data);
        $empresas_cuenta_id = DAOFactory::getEmpresasCuentasDAO()->insert($empresasCuenta);

        registrarAccion("insert", "empresas_cuentas", $empresas_cuenta_id);
        
        $transaction->commit();

        return $empresas_cuenta_id;
    } catch (Exception $e) {
        var_dump($e);
        if ($transaction)
            $transaction->rollback();
        return false;
    }
}

function updateEmpresaContrato($idEmpresaContrato, $data = array()) {
    try {
        //start new transaction	
        $transaction = new Transaction();

        $empresasContrato = DAOFactory::getEmpresasContratosDAO()->prepare($data, $idEmpresaContrato);

        DAOFactory::getEmpresasContratosDAO()->update($empresasContrato);
        
        registrarAccion("update", "empresas_contratos", $idEmpresaContrato);

        $transaction->commit();

        return $empresasContrato;
    } catch (Exception $e) {
        if ($transaction)
            $transaction->rollback();

        return false;
    }
}

function searchEmpresas($data = array()){
    try{
        $empresas = DAOFactory::getEmpresasDAO()->searchByArguments($data);
        return $empresas;
    }catch (Exception $e) {
        return false;
    }
}



?>
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
        
        $adjuntos_complejo = DAOFactory::getComplejosAdjuntosDAO()->queryByIdComplejo($id);
        $adjuntos = array();
        if($adjuntos_complejo)
            foreach ($adjuntos_complejo as $ac) {
                $adjunto = DAOFactory::getAdjuntosDAO()->load($ac->idAdjunto);
                array_push($adjuntos, $adjunto);
            }
            
        $complejo->adjuntos = $adjuntos;
        
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

function addFotoToComplejo($idComplejo, $idAdjunto) {
    try {
        
        $adjunto_complejo = DAOFactory::getComplejosAdjuntosDAO()->prepare(array('idComplejo' => $idComplejo, 'idAdjunto'=>$idAdjunto));
        $ac_id = DAOFactory::getComplejosAdjuntosDAO()->insert($adjunto_complejo);
        return $idAdjunto;
        
    } catch (Exception $e) {
        print_r($e);
        return false;
    }
}

function eliminarAdjuntoComplejo($idAdjunto) {
    try {
        
        DAOFactory::getComplejosAdjuntosDAO()->deleteByIdAdjunto($idAdjunto);
        DAOFactory::getAdjuntosDAO()->delete($idAdjunto);
        
        return true;
        
    } catch (Exception $e) {
        print_r($e);
        return false;
    }
}

?>

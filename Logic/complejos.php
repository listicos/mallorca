<?php
function allFullComplejos() {
    try {
        $complejos = DAOFactory::getComplejosDAO()->queryFullComplejos();
        return $complejos;
    } catch(Exception $e) {
        var_dump($e);
        return false;
    }
}

function fullComplejoById($idComplejo) {
    try {
        $complejo = DAOFactory::getComplejosDAO()->queryFullComplejoById($idComplejo);
        return $complejo;
    } catch(Exception $e) {
        var_dump($e);
        return false;
    }
}

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
        
        $apartamentos = DAOFactory::getApartamentosDAO()->queryByIdComplejo($complejoId);
        
        if($apartamentos) {
            foreach ($apartamentos as $a) {
                deleteApartamento($a->idApartamento, FALSE);
            }
        }
        
        DAOFactory::getComplejosDAO()->delete($complejoId);
        
        $transaction->commit();
        return true;
        
    } catch (Exception $e) {
        var_dump($e);
        if($transaction)$transaction->rollback ();
        return false;
    }
}

function getComplejo($id) {
    try{
        $complejo = DAOFactory::getComplejosDAO()->load($id);
        return $complejo;
    }catch (Exception $e) {
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
        
        if($complejo->descripcion && strlen(trim($complejo->descripcion) > 2)
                && $complejo->descripcion[0] == '{'
                && $complejo->descripcion[strlen($complejo->descripcion) - 1] == '}') {
            $complejo->descripciones = json_decode($complejo->descripcion);
        } else {
            $complejo->descripciones = array('es' => $complejo->descripcion);
        }
        
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

function getTarifasByComplejoId($idComplejo, $mes = 0, $anio = 0) {
    try {
        
        $disponibilidades = DAOFactory::getDisponibilidadesDAO()->queryByComplejoId($idComplejo, $mes, $anio);
        
        $apartamentos = array();
        $idApartamento = false;
        
        foreach ($disponibilidades as $d) {
            if($idApartamento != $d['idApartamento']) {
                
                if($apartamento) {
                    $apartamentos[$apartamento->idApartamento] = $apartamento;                    
                }
                $idApartamento = $d['idApartamento'];
                
                $apartamento = DAOFactory::getApartamentosDAO()->prepare($d);
                $apartamento->disponibilidades = array();
                
                
            }
            $apartamento->disponibilidades[date('j', strtotime($d['fechaInicio']))] = DAOFactory::getDisponibilidadesDAO()->prepare($d);
        }
        if($apartamento)
            $apartamentos[$apartamento->idApartamento] = $apartamento; 
        
        $aptosComplejo = DAOFactory::getApartamentosDAO()->queryByIdComplejo($idComplejo);
        
        foreach ($aptosComplejo as $a) {
            if(!$apartamentos[$a->idApartamento])$apartamentos[$a->idApartamento] = $a;
        }
        
        return $apartamentos;
        
    } catch (Exception $e) {
        error_log($e);
        return false;
    }
}
function getRangoPreciosByComplejo($idComplejo) {
    try {
        
        $precios = DAOFactory::getComplejosDAO()->rangoPreciosByComplejo($idComplejo);
        //print_r($precios);
        return $precios[0];
        
    } catch (Exception $e) {
        print_r($e);
        return false;
    }
}

function getComplejosFilters($fechaInicio = 0, $fechaFinal = 0, $huespedes = 1, $start = 0, $count = 10, $order = 0, $bounds = array()) {
    try {
        $complejos = DAOFactory::getComplejosDAO()->getComplejosFilters($fechaInicio, $fechaFinal, $huespedes, $start, $count, $order, $bounds);
        
        return $complejos;
    } catch(Exception $e) {
        var_dump($e);
        return false;
    }
}

?>

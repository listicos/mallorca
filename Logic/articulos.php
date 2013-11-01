<?php 
function insertArticulo($data = array()) {
    try {
        $transaction = new Transaction();

        $articulo = DAOFactory::getArticulosDAO()->prepare($data);
        $articulo_id = DAOFactory::getArticulosDAO()->insert($articulo);

        registrarAccion("insert", "articulos", $articulo_id);
        
        $transaction->commit();

        return $articulo_id;
    } catch (Exception $e) {
        var_dump($e);
        if ($transaction)
            $transaction->rollback();
        return false;
    }
}

function updateArticulo($idArticulo, $data= array()){
    try {
        $transaction = new Transaction();

        $articulo = DAOFactory::getArticulosDAO()->prepare($data, $idArticulo);
        DAOFactory::getArticulosDAO()->update($articulo);

        registrarAccion("update", "articulos", $idArticulo);
        
        $transaction->commit();

        return $articulo;
    } catch (Exception $e) {
        var_dump($e);
        if ($transaction)
            $transaction->rollback();
        return false;
    }
}

function getArticulos() {
    try {
        $Articulos = DAOFactory::getArticulosDAO()->queryAll();
        return $Articulos;
    } catch (Exception $e) {
        return false;
    }
}

function getTiposArticulo() {
    try {
        $tArticulos = DAOFactory::getArticulosTiposDAO()->queryAll();
        return $tArticulos;
    } catch (Exception $e) {
        return false;
    }
}

function getArticulo($idArticulo) {
    try {
        $articulo = DAOFactory::getArticulosDAO()->load($idArticulo);
        return $articulo;
    } catch (Exception $e) {
        return false;
    }
}

function insertApartamentoArticulos($data = array()) {
    try {
        $transaction = new Transaction();

        $apartamentoArticulos = DAOFactory::getApartamentosArticulosDAO()->prepare($data);
        $apartamento_instalacion_id = DAOFactory::getApartamentosArticulosDAO()->insert($apartamentoArticulos);

        registrarAccion("insert", "apartamentos_articulos", $apartamento_instalacion_id);
        
        $transaction->commit();

        return $apartamento_instalacion_id;
    } catch (Exception $e) {
        var_dump($e);
        if ($transaction)
            $transaction->rollback();
        return false;
    }
}

function getArticulosByApartamento($idApartamento) {
    try {
        $articulo = DAOFactory::getApartamentosArticulosDAO()->queryByIdApartamento($idApartamento);
        return $articulo;
    } catch (Exception $e) {
        return false;
    }
}

function getArticulosListByApartamento($idApartamento) {
    try {
        $articulo_apto = DAOFactory::getApartamentosArticulosDAO()->queryByIdApartamento($idApartamento);
        $articulos = array();
        foreach ($articulo_apto as $aa) {
            $a = DAOFactory::getArticulosDAO()->load($aa->idArticulo);
            array_push($articulos, $a);
        }
        return $articulos;
    } catch (Exception $e) {
        return false;
    }
}

function getArticulosByReserva($idReserva) {
    try {
        $articulos = DAOFactory::getReservacionesArticulosDAO()->queryByIdReservacion($idReserva);
        return $articulos;
    } catch (Exception $e) {
        return false;
    }
}

function deleteApartamentosArticulos($idApartamento) {
    try {
        $transaction = new Transaction();

        $result = DAOFactory::getApartamentosArticulosDAO()->deleteByIdApartamento($idApartamento);

        registrarAccion("delete", "apartamentos_articulos", $idApartamento, "idApartamento");
        
        $transaction->commit();

        return $result;
    } catch (Exception $e) {
        if ($transaction)
            $transaction->rollback();
        return false;
    }
}

function searchArticulos($data = array()){
    try{
        $articulos = DAOFactory::getArticulosDAO()->searchByArguments($data);
        foreach ($articulos as $articulo) {
            $articulo->tipo = DAOFactory::getArticulosTiposDAO()->load($articulo->idArticuloTipo)->nombre;
        }
        return $articulos;
    }catch (Exception $e) {
       
        return false;
    }
}

function deleteArticulo($idArticulo) {
    try {
        $transaction = new Transaction();

        $result = DAOFactory::getArticulosDAO()->delete($idArticulo);
        
        registrarAccion("delete", "articulos", $idArticulo);

        $transaction->commit();

        return $result;
    } catch (Exception $e) {
        if ($transaction)
            $transaction->rollback();
        return false;
    }
}
?>
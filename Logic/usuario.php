<?php

function authenticateUsuario($user, $pass) {
    try {
        $args = array("email" => $user, "password" => $pass);

        $customer = DAOFactory::getUsuariosDAO()->queryByArgs($args);
        if (sizeof($customer) > 0)
            return $customer[0];
        else
            return false;
    } catch (Exception $e) {
        return false;
    }
}

function insertUsuario($data = array()) {
    try {
        //set creatrion date.	
        $data["tiempoCreacion"] = date("Y-m-d H:i:s");
        //start new transaction				
        $transaction = new Transaction();

        $customer = DAOFactory::getUsuariosDAO()->prepare($data);
        $customer_id = DAOFactory::getUsuariosDAO()->insert($customer);

        registrarAccion("insert", "usuarios", $customer_id);
        
        $transaction->commit();

        return $customer_id;
    } catch (Exception $e) {
        var_dump($e);
        if ($transaction)
            $transaction->rollback();
        return false;
    }
}

function insertHuesped($data = array()) {
    try {         
        $transaction = new Transaction();

        $huesped = DAOFactory::getHuespedesDAO()->prepare($data);
        $huesped_id = DAOFactory::getHuespedesDAO()->insert($huesped);
        
        registrarAccion("insert", "huespedes", $huesped_id);

        $transaction->commit();

        return $huesped_id;
    } catch (Exception $e) {
        var_dump($e);
        if ($transaction)
            $transaction->rollback();
        return false;
    }
}

function updateUsuario($idUsuario, $data = array()) {
    try {
        //start new transaction	
        $transaction = new Transaction();

        $customer = DAOFactory::getUsuariosDAO()->prepare($data, $idUsuario);

        DAOFactory::getUsuariosDAO()->update($customer);
        
        registrarAccion("update", "usuarios", $idUsuario);

        $transaction->commit();

        return $customer;
    } catch (Exception $e) {
        var_dump($e);
        if ($transaction)
            $transaction->rollback();
        return false;
    }
}


function getUsuario($idUsuario) {
    try {
        $customer = DAOFactory::getUsuariosDAO()->load($idUsuario);
        return $customer;
    } catch (Exception $e) {
        return false;
    }
}

function getHuespedByUsuario($idUsuario) {
    try {
        $huesped = DAOFactory::getHuespedesDAO()->queryByIdUsuario($idUsuario);
        return $huesped;
    } catch (Exception $e) {
        return false;
    }
}

function getUsuarioByEmail($email)
{
	try 
	{
        $customer = DAOFactory::getUsuariosDAO()->getByEmail($email);
        return $customer;
    } catch (Exception $e) {
        return false;
    }
}

function getUsuarios($args = array()) {
    try {
        return DAOFactory::getUsuariosDAO()->queryByArgs($args);
    } catch (Exception $e) {
        return array();
    }
}

function getFriendsUsuario($args = array()) {
    try {
        return DAOFactory::getUsuariosDAO()->queryFriends($args);
    } catch (Exception $e) {
        return array();
    }
}

function getFriendsUsuarioByName($idUsuario, $friendName) {
    try {
        return DAOFactory::getUsuariosDAO()->queryFriendsByName($idUsuario, $friendName);
    } catch (Exception $e) {
        return array();
    }
}



function searchUsuarios($args) {
    try {
        return DAOFactory::getUsuariosDAO()->querySearch($args);
    } catch (Exception $e) {
        return array();
    }
}

function getClientes() {
    try {
        return DAOFactory::getUsuariosDAO()->queryByIdUsuarioGrupo(2);
    } catch (Exception $e) {
        return array();
    }
}


function registrarAccion($accion, $tabla, $id, $propiedad = "id") {
    try {
        $transaction = new Transaction();
        
        $usuario_core = Core_Usuario::getInstance();

        $registro = new UsuariosRegistro();
        $user = $usuario_core->getUsuario();
        if($user){
            $registro->idUsuario = $user->idUsuario;
        }
        $registro->tipo = $tabla . " where " . $propiedad . "=" . $id;
        $registro->movimiento = $accion;
        $registro->tiempoCreacion = date("Y-m-d H:i:s");
        

        $registro_id = DAOFactory::getUsuariosRegistrosDAO()->insert($registro);

        $transaction->commit();

        return $registro_id;
    } catch(Exception $e) {
        var_dump($e);
        if ($transaction)
            $transaction->rollback();
        return false;
    }
}

function searchUsuariosByTerm($args) {
    try {
        return DAOFactory::getUsuariosDAO()->queryBuscar($args);
    } catch (Exception $e) {
        return array();
    }
}

?>
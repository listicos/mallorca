<?php

function searchClientes($data = array()){
    try{
        $clientes = DAOFactory::getUsuariosDAO()->searchByArguments($data);
        return $clientes;
    }catch (Exception $e) {
       
        return false;
    }
}
?>

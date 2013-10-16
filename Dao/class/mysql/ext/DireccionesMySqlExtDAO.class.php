<?php

/**
 * Class that operate on table 'direcciones'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-05-28 00:05
 */
class DireccionesMySqlExtDAO extends DireccionesMySqlDAO {

    private $mysql;

    function __construct() {
        $this->mysql = new MySql();
    }

    function prepare($data, $idDireccion = 0) {

        if ($idDireccion != 0)
            $direccion = $this->load($idDireccion);
        else
            $direccion = new Direccione();
        return $this->mysql->prepare($direccion, $data);
    }

}

?>
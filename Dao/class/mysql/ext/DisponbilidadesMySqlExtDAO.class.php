<?php

/**
 * Class that operate on table 'disponbilidades'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-05-31 15:57
 */
class DisponbilidadesMySqlExtDAO extends DisponbilidadesMySqlDAO {

    private $mysql;

    function __construct() {
        $this->mysql = new MySql();
    }

    function prepare($data, $idDisponibilidad = 0) {

        if ($idDisponibilidad != 0)
            $disponibilidad = $this->load($idDisponibilidad);
        else
            $disponibilidad = new Disponbilidade ();
        return $this->mysql->prepare($disponibilidad, $data);
    }

}

?>
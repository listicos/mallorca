<?php

/**
 * Class that operate on table 'apartamentos_alojamientos'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-05-28 00:05
 */
class ApartamentosAlojamientosMySqlExtDAO extends ApartamentosAlojamientosMySqlDAO {

    private $mysql;

    function __construct() {
        $this->mysql = new MySql();
    }

    function prepare($data, $idApartamentosAlojamientos = 0) {

        if ($idApartamentosAlojamientos != 0)
            $apartamentosAlojamientos = $this->load($idApartamentosAlojamientos);
        else
            $apartamentosAlojamientos = new ApartamentosAlojamiento();
        return $this->mysql->prepare($apartamentosAlojamientos, $data);
    }

}

?>
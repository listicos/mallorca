<?php

/**
 * Class that operate on table 'apartamentos_lugares_cercanos'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-05-28 00:05
 */
class ApartamentosLugaresCercanosMySqlExtDAO extends ApartamentosLugaresCercanosMySqlDAO {

    private $mysql;

    function __construct() {
        $this->mysql = new MySql();
    }

    function prepare($data, $idApartamentoLugarCercano = 0) {

        if ($idApartamentoLugarCercano != 0)
            $apartamentoLugarCercano = $this->load($idApartamentoLugarCercano);
        else
            $apartamentoLugarCercano = new ApartamentosLugaresCercano();
        return $this->mysql->prepare($apartamentoLugarCercano, $data);
    }

}

?>
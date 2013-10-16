<?php

/**
 * Class that operate on table 'apartamentos_instalaciones'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-05-28 00:05
 */
class ApartamentosInstalacionesMySqlExtDAO extends ApartamentosInstalacionesMySqlDAO {

    private $mysql;

    function __construct() {
        $this->mysql = new MySql();
    }

    function prepare($data, $idApartamentoInstalacion = 0) {

        if ($idApartamentoInstalacion != 0)
            $apartamentoInstalacion = $this->load($idApartamentoInstalacion);
        else
            $apartamentoInstalacion = new ApartamentosInstalacione();
        return $this->mysql->prepare($apartamentoInstalacion, $data);
    }

}

?>
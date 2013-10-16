<?php

/**
 * Class that operate on table 'apartamentos_pagos_tipos'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-05-28 00:05
 */
class ApartamentosPagosTiposMySqlExtDAO extends ApartamentosPagosTiposMySqlDAO {

    private $mysql;

    function __construct() {
        $this->mysql = new MySql();
    }

    function prepare($data, $idApartamentoPagoTipo = 0) {

        if ($idApartamentoPagoTipo != 0)
            $apartamentoPagoTipo = $this->load($idApartamentoPagoTipo);
        else
            $apartamentoPagoTipo = new ApartamentosPagosTipo();
        return $this->mysql->prepare($apartamentoPagoTipo, $data);
    }

}

?>
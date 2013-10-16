<?php
/**
 * Class that operate on table 'apartamentos_articulos'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-07-16 20:58
 */
class ApartamentosArticulosMySqlExtDAO extends ApartamentosArticulosMySqlDAO{

    private $mysql;

    function __construct() {
        $this->mysql = new MySql();
    }

    function prepare($data, $idApartamentoArticulos = 0) {

        if ($idApartamentoArticulos != 0)
            $apartamentoArticulos  = $this->load($idApartamentoArticulos);
        else
            $apartamentoArticulos = new ApartamentosArticulo();
        return $this->mysql->prepare($apartamentoArticulos, $data);
    }
	
}
?>
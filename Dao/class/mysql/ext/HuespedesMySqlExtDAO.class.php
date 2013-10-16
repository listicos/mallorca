<?php
/**
 * Class that operate on table 'huespedes'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-05-31 15:57
 */
class HuespedesMySqlExtDAO extends HuespedesMySqlDAO{


	private $mysql;

    function __construct() {
        $this->mysql = new MySql();
    }

    function prepare($data, $idHuesped = 0) {

        if ($idHuesped != 0)
            $huesped = $this->load($idHuesped);
        else
            $huesped = new Huespede();
        return $this->mysql->prepare($huesped, $data);
    }
	
}
?>
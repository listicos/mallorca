<?php
/**
 * Class that operate on table 'reservaciones_articulos'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-08-26 12:25
 */
class ReservacionesArticulosMySqlExtDAO extends ReservacionesArticulosMySqlDAO{

	private $mysql;

    function __construct() {
        $this->mysql = new MySql();
    }

    function prepare($data, $id = 0) {

        if ($id != 0)
            $obj = $this->load($id);
        else
            $obj = new ReservacionesArticulo ();
        return $this->mysql->prepare($obj, $data);
    }
}
?>
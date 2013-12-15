<?php
/**
 * Class that operate on table 'complejos_adjuntos'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-12-15 21:34
 */
class ComplejosAdjuntosMySqlExtDAO extends ComplejosAdjuntosMySqlDAO{

	private $mysql;

    function __construct() {
        $this->mysql = new MySql();
    }

    function prepare($data, $id = 0) {

        if ($id != 0)
            $o = $this->load($id);
        else
            $o = new ComplejosAdjunto ();
        return $this->mysql->prepare($o, $data);
    }
}
?>
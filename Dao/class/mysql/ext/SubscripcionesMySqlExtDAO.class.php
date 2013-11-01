<?php
/**
 * Class that operate on table 'subscripciones'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-05-31 15:57
 */
class SubscripcionesMySqlExtDAO extends SubscripcionesMySqlDAO{

    private $mysql;

    function __construct() {
        $this->mysql = new MySql();
    }

    function prepare($data, $id = 0) {

        if ($id != 0)
            $obj = $this->load($id);
        else
            $obj = new Subscripcione ();
        return $this->mysql->prepare($obj, $data);
    }
}
?>
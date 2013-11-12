<?php
/**
 * Class that operate on table 'configuracion'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-11-12 21:04
 */
class ConfiguracionMySqlExtDAO extends ConfiguracionMySqlDAO{

	private $mysql;

    function __construct() {
        $this->mysql = new MySql();
    }

    function prepare($data, $id = 0) {

        if ($id != 0)
            $obj = $this->load($id);
        else
            $obj = new Configuracion();
        return $this->mysql->prepare($obj, $data);
    }
}
?>
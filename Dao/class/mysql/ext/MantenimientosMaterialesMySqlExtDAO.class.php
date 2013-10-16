<?php
/**
 * Class that operate on table 'mantenimientos_materiales'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-08-07 00:44
 */
class MantenimientosMaterialesMySqlExtDAO extends MantenimientosMaterialesMySqlDAO{

    private $mysql;

    function __construct() {
        $this->mysql = new MySql();
    }

    function prepare($data, $id = 0) {

        if ($id != 0)
            $material = $this->load($id);
        else
            $material = new MantenimientosMateriale ();
        return $this->mysql->prepare($material, $data);
    }
}
?>
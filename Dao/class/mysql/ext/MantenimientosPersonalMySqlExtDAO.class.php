<?php
/**
 * Class that operate on table 'mantenimientos_personal'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-08-07 00:44
 */
class MantenimientosPersonalMySqlExtDAO extends MantenimientosPersonalMySqlDAO{

    private $mysql;

    function __construct() {
        $this->mysql = new MySql();
    }

    function prepare($data, $id = 0) {

        if ($id != 0)
            $personal = $this->load($id);
        else
            $personal = new MantenimientosPersonal ();
        return $this->mysql->prepare($personal, $data);
    }
}
?>
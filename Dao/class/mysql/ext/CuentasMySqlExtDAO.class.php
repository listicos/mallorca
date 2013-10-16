<?php

/**
 * Class that operate on table 'cuentas'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-05-28 00:05
 */
class CuentasMySqlExtDAO extends CuentasMySqlDAO {

    private $mysql;

    function __construct() {
        $this->mysql = new MySql();
    }

    function prepare($data, $idCuenta = 0) {

        if ($idCuenta != 0)
            $cuenta = $this->load($idCuenta);
        else
            $cuenta = new Cuenta();
        return $this->mysql->prepare($cuenta, $data);
    }

}

?>
<?php
/**
 * Class that operate on table 'empresas_cuentas'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-07-16 23:10
 */
class EmpresasCuentasMySqlExtDAO extends EmpresasCuentasMySqlDAO{

	private $mysql;

    function __construct() {
        $this->mysql = new MySql();
    }

    function prepare($data, $idEmpresaCuenta = 0) {
        if ($idEmpresaCuenta != 0)
            $empresa_cuenta = $this->load($idEmpresaCuenta);
        else
            $empresa_cuenta = new EmpresasCuenta();
        return $this->mysql->prepare($empresa_cuenta, $data);
    }

}
?>
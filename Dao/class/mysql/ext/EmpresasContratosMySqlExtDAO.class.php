<?php

/**
 * Class that operate on table 'empresas_contratos'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-07-04 19:10
 */
class EmpresasContratosMySqlExtDAO extends EmpresasContratosMySqlDAO {

    private $mysql;

    function __construct() {
        $this->mysql = new MySql();
    }

    function prepare($data, $idEmpresaContrato = 0) {

        if ($idEmpresaContrato != 0)
            $empresaContrato = $this->load($idEmpresaContrato);
        else
            $empresaContrato = new EmpresasContrato ();
        return $this->mysql->prepare($empresaContrato, $data);
    }

    public function queryByIdContratoEmpresa($idEmpresa,$idContrato){
        $sql = 'SELECT * FROM empresas_contratos WHERE id_empresa = ? AND id_contrato = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->setNumber($idEmpresa);
        $sqlQuery->setNumber($idContrato);
        return $this->getList($sqlQuery);
    }


}

?>
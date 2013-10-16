<?php

/**
 * Class that operate on table 'contratos'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-05-29 22:21
 */
class ContratosMySqlExtDAO extends ContratosMySqlDAO {

    private $mysql;

    function __construct() {
        $this->mysql = new MySql();
    }

    function prepare($data, $idContrato = 0) {

        if ($idContrato != 0)
            $contrato = $this->load($idContrato);
        else
            $contrato = new Contrato();
        return $this->mysql->prepare($contrato, $data);
    }

    function searchByArguments($data) {
        
        if(isset($data['query']))
            $query = $data['query'];
        else
            $query = '';
        
        $type = $data['type'];
        $filter = $data['filter'];
        $args = array('page' => $data['page'], 'limit' => $data['limit']);

        if (isset($filter) && $filter != '')
            $order_by = ' ORDER BY ' . $filter . ' ' . $type;
        else
            $order_by = '';

        $sql = 'SELECT * FROM contratos';
        $sql .= " WHERE id_contrato like '%" . $query . "%' OR tiempo_creacion like '%" . $query . "%' OR ultima_modificacion like '%" . $query . "%' OR precio like '%" . $query . "%' OR porcentaje like '%" . $query . "%' OR descripcion like '%" . $query . "%'";
        $sql .= $order_by;
        
        $sql .= $this->mysql->limit($args);
        $sqlQuery = new SqlQuery($sql);
        
        return $this->getList($sqlQuery);
    }

}

?>
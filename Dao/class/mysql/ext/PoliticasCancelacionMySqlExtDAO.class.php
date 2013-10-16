<?php
/**
 * Class that operate on table 'politicas_cancelacion'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-07-29 23:52
 */
class PoliticasCancelacionMySqlExtDAO extends PoliticasCancelacionMySqlDAO{

    private $mysql;

    function __construct() {
        $this->mysql = new MySql();
    }

    function prepare($data, $idPolitica = 0) {

        if ($idPolitica != 0)
            $politica = $this->load($idPolitica);
        else
            $politica = new PoliticasCancelacion();
        return $this->mysql->prepare($politica, $data);
    }
    
    function searchByArguments($data) {
        $query = $data['query'];
        $type = $data['type'];
        $filter = $data['filter'];
        
        
        if (isset($filter) && $filter != '')
            $order_by = ' ORDER BY ' . $filter . ' ' . $type;
        else
            $order_by = '';

        $sql = 'SELECT * FROM politicas_cancelacion';
        $sql .= " WHERE (id_politica_cancelacion like '%" . $query . "%' OR nombre like '%" . $query . "%' OR reembolso_dia like '%" . $query . "%' OR comision like '%" . $query . "%' OR reembolso_porcentaje like '%" . $query . "%' )";
        
        $sql .= $order_by;
        
        $sqlQuery = new SqlQuery($sql);
        
        
        return $this->getList($sqlQuery);
    }
	
}
?>
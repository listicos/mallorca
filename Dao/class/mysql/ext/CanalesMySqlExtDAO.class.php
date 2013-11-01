<?php
/**
 * Class that operate on table 'canales'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-08-26 12:25
 */
class CanalesMySqlExtDAO extends CanalesMySqlDAO{

    private $mysql;

    function __construct() {
        $this->mysql = new MySql();
    }

    function prepare($data, $id = 0) {

        if ($id != 0)
            $obj = $this->load($id);
        else
            $obj = new Canale();
        return $this->mysql->prepare($obj, $data);
    }
    
    function searchByArguments($data) {
        $query = $data['query'];
        $type = $data['type'];
        $filter = $data['filter'];
        
        
        if (isset($filter) && $filter != '')
            $order_by = ' ORDER BY ' . $filter . ' ' . $type;
        else
            $order_by = '';

        $sql = 'SELECT * FROM canales ';
        $sql .= " WHERE (id_canal like '%" . $query . "%' OR nombre like '%" . $query . "%' OR comision like '%" . $query . "%' OR senia like '%" . $query . "%' OR dias_tolerancia like '%" . $query . "%'OR porcentaje_comision like '%" . $query . "%')";
        
        
        $sql .= $order_by;
        $sqlQuery = new SqlQuery($sql);
        
        
        return $this->getList($sqlQuery);
    }
}
?>
<?php
/**
 * Class that operate on table 'complejos'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-07-29 23:52
 */
class ComplejosMySqlExtDAO extends ComplejosMySqlDAO{
    
    private $mysql;

    function __construct() {
        $this->mysql = new MySql();
    }

    function prepare($data, $id = 0) {

        if ($id != 0)
            $o = $this->load($id);
        else
            $o = new Complejo ();
        return $this->mysql->prepare($o, $data);
    }

    function searchByArguments($data) {
        $query = $data['query'];
        $type = $data['type'];
        $filter = $data['filter'];

        if (isset($filter) && $filter != '')
            $order_by = ' ORDER BY ' . $filter . ' ' . $type;
        else
            $order_by = '';

        $sql = 'SELECT * FROM complejos';
        $sql .= " WHERE id_complejo like '%" . $query . "%' OR nombre like '%" . $query . "%' ";
        $sql .= $order_by;
        
        $sqlQuery = new SqlQuery($sql);

        return $this->getList($sqlQuery);
    }
}
?>
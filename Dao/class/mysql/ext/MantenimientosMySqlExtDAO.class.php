<?php
/**
 * Class that operate on table 'mantenimientos'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-08-07 00:44
 */
class MantenimientosMySqlExtDAO extends MantenimientosMySqlDAO{

    private $mysql;

    function __construct() {
        $this->mysql = new MySql();
    }

    function prepare($data, $idMantenimiento = 0) {

        if ($idMantenimiento != 0)
            $mantenimiento = $this->load($idMantenimiento);
        else
            $mantenimiento = new Mantenimiento();
        return $this->mysql->prepare($mantenimiento, $data);
    }
    
    function searchByArguments($data) {
        $query = $data['query'];
        $type = $data['type'];
        $filter = $data['filter'];
        
        
        if (isset($filter) && $filter != '')
            $order_by = ' ORDER BY ' . $filter . ' ' . $type;
        else
            $order_by = '';

        $sql = 'SELECT m.* FROM mantenimientos AS m';
        $sql .= ' INNER JOIN apartamentos AS a ON a.id_apartamento = m.id_apartamento';
        $sql .= " WHERE (m.solicitante like '%" . $query . "%' OR a.nombre like '%" . $query . "%' OR m.estatus like '%" . $query . "%' OR m.fecha_cierre like '%" . $query . "%' )";
        
        $sql .= $order_by;
        $sqlQuery = new SqlQuery($sql);
        
        
        return $this->getList($sqlQuery);
    }
}
?>
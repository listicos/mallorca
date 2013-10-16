<?php

/**
 * Class that operate on table 'opiniones'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-05-31 15:57
 */
class OpinionesMySqlExtDAO extends OpinionesMySqlDAO {

    private $mysql;

    function __construct() {
        $this->mysql = new MySql();
    }

    function prepare($data, $idOpinion = 0) {

        if ($idOpinion != 0)
            $opinion = $this->load($idOpinion);
        else
            $opinion = new Opinione ();
        return $this->mysql->prepare($opinion, $data);
    }

    function searchByArguments($data) {
        $query = $data['query'];
        $type = $data['type'];
        $filter = $data['filter'];

        if (isset($filter) && $filter != '')
            $order_by = ' ORDER BY opiniones.' . $filter . ' ' . $type;
        else
            $order_by = '';

        $sql = 'SELECT * FROM opiniones';
        $sql .= ' INNER JOIN apartamentos AS a ON a.id_apartamento = opiniones.id_apartamento';
        $sql .= " WHERE opinion like '%" . $query . "%' OR puntuacion like '%" . $query . "%' OR fecha_creacion like '%" . $query . "%' OR ultima_actualizacion like '%" . $query . "%' OR a.nombre like '%" . $query . "%'";
        $sql .= $order_by;
        
        $sqlQuery = new SqlQuery($sql);

        return $this->getList($sqlQuery);
    }

    function orderByArgs($data) {
        $query = $data['query'];
        $type = $data['type'];

        $sql = 'SELECT * FROM opiniones ORDER BY ' . $query . ' ' . $type;

        $sqlQuery = new SqlQuery($sql);
        return $this->execute($sqlQuery);
    }

}

?>
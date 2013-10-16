<?php
/**
 * Class that operate on table 'articulos'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-07-04 19:10
 */
class ArticulosMySqlExtDAO extends ArticulosMySqlDAO{

	private $mysql;

    function __construct() {
        $this->mysql = new MySql();
    }

    function prepare($data, $idArticulo = 0) {

        if ($idArticulo != 0)
            $articulo = $this->load($idArticulo);
        else
            $articulo = new Articulo();
        return $this->mysql->prepare($articulo, $data);
    }
    
    function searchByArguments($data) {
        $query = $data['query'];
        $type = $data['type'];
        $filter = $data['filter'];
        
        
        if (isset($filter) && $filter != '')
            $order_by = ' ORDER BY ' . $filter . ' ' . $type;
        else
            $order_by = '';

        $sql = 'SELECT a.* FROM articulos AS a';
        $sql .= ' INNER JOIN articulos_tipos AS t ON a.id_articulo_tipo = t.id_articulo_tipo';
        $sql .= " WHERE (a.nombre like '%" . $query . "%' OR a.codigo like '%" . $query . "%' OR a.precio_base like '%" . $query . "%' OR t.nombre like '%" . $query . "%' )";
        
        $sql .= $order_by;
        
        $sqlQuery = new SqlQuery($sql);
        
        
        return $this->getList($sqlQuery);
    }
	
}
?>
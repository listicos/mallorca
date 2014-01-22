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

    public function queryFullComplejos() {
        $sql = 'SELECT distinct a.nombre AS a_nombre, aa.id_adjunto id_adjunto, d.lat, d.lon, a.id_apartamento AS id_apartamento, a.id_complejo, a.descripcion_larga AS a_descripcion, aa.ruta AS ruta, 
                c.nombre AS complejo, c.descripcion AS descripcion, at.nombre AS tipo FROM apartamentos AS a 
                INNER JOIN complejos AS c ON c.id_complejo = a.id_complejo
                LEFT JOIN complejos_adjuntos AS ca ON ca.id_complejo = c.id_complejo
                LEFT JOIN apartamentos_adjuntos AS aaa ON aaa.id_apartamento = a.id_apartamento
                LEFT JOIN adjuntos AS aa ON aa.id_adjunto = ca.id_adjunto OR aaa.id_adjunto = aa.id_adjunto
                LEFT JOIN apartamentos_tipos AS at ON at.id_apartamentos_tipo = a.id_apartamentos_tipo
                LEFT JOIN direcciones AS d ON a.id_direccion = d.id_direccion
        WHERE a.estatus <> "inactivo"';
        
        $sqlQuery = new SqlQuery($sql);
        $apartamentos = $this->execute($sqlQuery);
        return $apartamentos;
    }
}
?>
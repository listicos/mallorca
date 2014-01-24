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
        $sql = 'SELECT distinct a.nombre AS a_nombre, aa.id_adjunto, d.lat, d.lon, a.id_apartamento AS id_apartamento, a.id_complejo, a.descripcion_larga AS a_descripcion, aa.ruta AS ruta, 
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
    
    public function queryFullComplejoById($idComplejo) {
        $sql = 'SELECT distinct a.nombre AS a_nombre, aa.id_adjunto, d.lat, d.lon, d.provincia as direccion, a.id_apartamento AS id_apartamento, a.id_complejo, a.descripcion_larga AS a_descripcion, aa.ruta AS ruta, 
                c.nombre AS complejo, c.descripcion AS descripcion, at.nombre AS tipo, caa.ruta as complejo_ruta, a.capacidad_personas, a.tarifa_base FROM apartamentos AS a 
                INNER JOIN complejos AS c ON c.id_complejo = a.id_complejo
                LEFT JOIN complejos_adjuntos AS ca ON ca.id_complejo = c.id_complejo
                LEFT JOIN apartamentos_adjuntos AS aaa ON aaa.id_apartamento = a.id_apartamento
                LEFT JOIN adjuntos AS aa ON aaa.id_adjunto = aa.id_adjunto
                LEFT JOIN adjuntos AS caa ON caa.id_adjunto = ca.id_adjunto
                LEFT JOIN apartamentos_tipos AS at ON at.id_apartamentos_tipo = a.id_apartamentos_tipo
                LEFT JOIN direcciones AS d ON a.id_direccion = d.id_direccion
        WHERE a.estatus <> "inactivo" AND a.id_complejo = ?';
        
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->setNumber($idComplejo);
        $apartamentos = $this->execute($sqlQuery);
        return $apartamentos;
    }
    
    public function rangoPreciosByComplejo($idComplejo) {
        $sql = 'select min(d.precio - (d.precio * d.descuento / 100)), max(d.precio - (d.precio * d.descuento / 100))
                from disponibilidades as d
                inner join apartamentos as a
                on a.id_apartamento = d.id_apartamento
                where a.id_complejo = ?
                and d.estatus = "disponible"
                and UNIX_TIMESTAMP(d.fecha_inicio) >= UNIX_TIMESTAMP("' . date('Y-m-d') . '")';
        
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->setNumber($idComplejo);
        $apartamentos = $this->execute($sqlQuery);
        return $apartamentos;
    }
    
    public function getComplejosFilters($fechaInicio = 0, $fechaFinal = 0, $huespedes = 1, $start = 0, $count = 10, $order = 0, $bounds = array()) {
        $sql = 'SELECT distinct a.nombre AS a_nombre, aa.id_adjunto, d.lat, d.lon, a.id_apartamento AS id_apartamento, a.id_complejo, a.descripcion_larga AS a_descripcion, aa.ruta AS ruta, 
                c.nombre AS complejo, c.descripcion AS descripcion, at.nombre AS tipo FROM apartamentos AS a 
                INNER JOIN complejos AS c ON c.id_complejo = a.id_complejo
                LEFT JOIN complejos_adjuntos AS ca ON ca.id_complejo = c.id_complejo
                LEFT JOIN apartamentos_adjuntos AS aaa ON aaa.id_apartamento = a.id_apartamento
                LEFT JOIN adjuntos AS aa ON aa.id_adjunto = ca.id_adjunto OR aaa.id_adjunto = aa.id_adjunto
                LEFT JOIN apartamentos_tipos AS at ON at.id_apartamentos_tipo = a.id_apartamentos_tipo
                LEFT JOIN direcciones AS d ON a.id_direccion = d.id_direccion
        WHERE a.estatus <> "inactivo" AND a.capacidad_personas >= ? ';
        if($fechaInicio && $fechaFinal) {
            $ini = strtotime($fechaInicio);
            $end = strtotime($fechaFinal);
            $days = ($end - $ini)/(60*60*24);
            $sql .= ' AND ' .$days .' <= (SELECT COUNT(di.fecha_inicio) FROM disponibilidades AS di WHERE UNIX_TIMESTAMP(di.fecha_inicio) >= UNIX_TIMESTAMP("'.$fechaInicio.'") AND UNIX_TIMESTAMP(di.fecha_inicio) <= UNIX_TIMESTAMP("'.$fechaFinal.'") AND di.id_apartamento = a.id_apartamento AND di.estatus = "disponible")';
        }
        
        
        
        //echo $sql;
        
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->setNumber($huespedes);
        $rows = $this->execute($sqlQuery);
        return $rows;
    }
}
?>
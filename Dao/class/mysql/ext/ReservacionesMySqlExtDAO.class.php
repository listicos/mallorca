<?php

/**
 * Class that operate on table 'reservaciones'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-06-09 22:50
 */
class ReservacionesMySqlExtDAO extends ReservacionesMySqlDAO {

    private $mysql;

    function __construct() {
        $this->mysql = new MySql();
    }

    function prepare($data, $idReservacion = 0) {

        if ($idReservacion != 0)
            $reserva = $this->load($idReservacion);
        else
            $reserva = new Reservacione ();
        return $this->mysql->prepare($reserva, $data);
    }

    function searchByArguments($data) {
        $query = $data['query'];
        $type = $data['type'];
        $filter = $data['filter'];
        
        if(isset($data['empresaId']) && $data['empresaId'] != 0) $empresaId = $data['empresaId'];
        
        if(isset($data['usuarioId'])) $usuarioId = $data['usuarioId'];

        if (isset($filter) && $filter != '')
            $order_by = ' ORDER BY r.' . $filter . ' ' . $type;
        else
            $order_by = '';
        
        if(strcmp($filter, 'a.nombre') == 0)
                $order_by = ' ORDER BY ' . $filter . ' ' . $type;

        //$filter_date = " AND ((fecha_entrada >= '".$data['dateStartFrom']."' AND fecha_entrada <='".$data['dateStartTo']."') AND (fecha_salida >= '".$data['dateEndFrom']."' AND fecha_salida <= '".$data['dateEndTo']."'))";

        $sql = 'SELECT DISTINCT r.id_reservacion, r.*, u.id_usuario, u.nombre, u.apellido_paterno, a.nombre';
        $sql .= ' FROM reservaciones AS r';
        $sql .= ' INNER JOIN usuarios AS u ON u.id_usuario = r.id_usuario';
        $sql .= ' INNER JOIN apartamentos AS a ON r.id_apartamento = a.id_apartamento';
        
        if(isset($empresaId)) {
            
            $sql .= ' INNER JOIN empresas_contratos AS c ON c.id_empresa_contrato = a.id_empresa_contrato';
        }
        
        $sql .= " WHERE (fecha_entrada like '%" . $query . "%' OR fecha_salida like '%" . $query . "%' OR total like '%" . $query . "%')";
        $sql .= " AND ((fecha_entrada >= '" . $data['dateStartFrom'] . "' AND fecha_entrada <='" . $data['dateStartTo'] . "') AND (fecha_salida >= '" . $data['dateEndFrom'] . "' AND fecha_salida <= '" . $data['dateEndTo'] . "'))";

        if($data['idApartamento']){
            $sql .= ' AND r.id_apartamento = '.$data['idApartamento'];
        }
        
        if(isset($empresaId) && $data['empresaId'] != 0) {
            $sql .= ' AND c.id_empresa=? ';
        }
        
        if(isset($usuarioId)) {
            $sql .= ' AND u.id_usuario=? ';
        }
        
        $sql .= $order_by;
        //var_dump($sql);
        $sqlQuery = new SqlQuery($sql);
        
        if(isset($empresaId)) {
            $sqlQuery->setNumber($empresaId);
        }
        
        if(isset($usuarioId)) {
            $sqlQuery->setNumber($usuarioId);
        }

        return $this->getList($sqlQuery);
    }
    
    public function queryByEstatusAndFechaEntrada($estado, $fecha){
            $sql = 'SELECT * FROM reservaciones WHERE estatus = ? AND fecha_entrada = ?';
            $sqlQuery = new SqlQuery($sql);
            $sqlQuery->set($estado);
            $sqlQuery->set($fecha);
            return $this->getList($sqlQuery);
    }
    
    public function queryByEstatusAndFechaSalida($estado, $fecha){
            $sql = 'SELECT * FROM reservaciones WHERE estatus = ? AND fecha_salida = ?';
            $sqlQuery = new SqlQuery($sql);
            $sqlQuery->set($estado);
            $sqlQuery->set($fecha);
            return $this->getList($sqlQuery);
    }
    
    public function queryByApartamentoIdAndFecha($idApartamento, $fecha){
            $sql = 'SELECT * FROM reservaciones WHERE id_apartamento = ? AND ';
            $sql .= ' UNIX_TIMESTAMP("'.$fecha.'") BETWEEN UNIX_TIMESTAMP(fecha_entrada) AND UNIX_TIMESTAMP(fecha_salida)';
            $sqlQuery = new SqlQuery($sql);
            $sqlQuery->setNumber($idApartamento);
            return $this->getList($sqlQuery);
    }
    
    public function queryByFechaCreacion($fecha){
            $sql = 'SELECT * FROM reservaciones ';
            $sql .= ' WHERE UNIX_TIMESTAMP(tiempo_creacion) BETWEEN UNIX_TIMESTAMP("'.$fecha.'") AND UNIX_TIMESTAMP("'.date("Y-m-d", strtotime($fecha) + 86400).'")';
            
            $sqlQuery = new SqlQuery($sql);
            return $this->getList($sqlQuery);
    }
    
    public function queryByFechaCreacionInRange($fechaInicio, $fechaFin){
            $sql = 'SELECT * FROM reservaciones ';
            $sql .= ' WHERE UNIX_TIMESTAMP(tiempo_creacion) BETWEEN UNIX_TIMESTAMP("'.$fechaInicio.'") AND UNIX_TIMESTAMP("'.date("Y-m-d", strtotime($fechaFin)).'")';
            
            $sqlQuery = new SqlQuery($sql);
            return $this->getList($sqlQuery);
    }

}

?>
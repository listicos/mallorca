<?php
/**
 * Class that operate on table 'reservaciones_pagos'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-07-16 20:58
 */
class ReservacionesPagosMySqlExtDAO extends ReservacionesPagosMySqlDAO{

    private $mysql;

    function __construct() {
        $this->mysql = new MySql();
    }

    function prepare($data, $id = 0) {

        if ($id != 0)
            $obj = $this->load($id);
        else
            $obj = new ReservacionesPago();
        return $this->mysql->prepare($obj, $data);
    }
    
    public function queryByIdReservacionAndFormaPago($idReservacion, $formaPago){
        $sql = 'SELECT * FROM reservaciones_pagos WHERE id_reservacion = ? AND forma_pago = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->setNumber($idReservacion);
        $sqlQuery->setString($formaPago);
        return $this->getList($sqlQuery);
    }
}
?>
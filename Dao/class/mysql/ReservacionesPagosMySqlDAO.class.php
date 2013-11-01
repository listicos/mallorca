<?php
/**
 * Class that operate on table 'reservaciones_pagos'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-10-28 15:51
 */
class ReservacionesPagosMySqlDAO implements ReservacionesPagosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ReservacionesPagosMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM reservaciones_pagos WHERE id_reservacion_pago = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM reservaciones_pagos';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM reservaciones_pagos ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param reservacionesPago primary key
 	 */
	public function delete($id_reservacion_pago){
		$sql = 'DELETE FROM reservaciones_pagos WHERE id_reservacion_pago = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_reservacion_pago);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ReservacionesPagosMySql reservacionesPago
 	 */
	public function insert($reservacionesPago){
		$sql = 'INSERT INTO reservaciones_pagos (id_reservacion, forma_pago, autorizacion, request, importe, concepto, estado, tiempo_creacion, ultima_modificacion, origen, validada, comentario, tipo, id_cuenta) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($reservacionesPago->idReservacion);
		$sqlQuery->set($reservacionesPago->formaPago);
		$sqlQuery->set($reservacionesPago->autorizacion);
		$sqlQuery->set($reservacionesPago->request);
		$sqlQuery->set($reservacionesPago->importe);
		$sqlQuery->set($reservacionesPago->concepto);
		$sqlQuery->set($reservacionesPago->estado);
		$sqlQuery->set($reservacionesPago->tiempoCreacion);
		$sqlQuery->set($reservacionesPago->ultimaModificacion);
		$sqlQuery->set($reservacionesPago->origen);
		$sqlQuery->setNumber($reservacionesPago->validada);
		$sqlQuery->set($reservacionesPago->comentario);
		$sqlQuery->set($reservacionesPago->tipo);
		$sqlQuery->setNumber($reservacionesPago->idCuenta);

		$id = $this->executeInsert($sqlQuery);	
		$reservacionesPago->idReservacionPago = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ReservacionesPagosMySql reservacionesPago
 	 */
	public function update($reservacionesPago){
		$sql = 'UPDATE reservaciones_pagos SET id_reservacion = ?, forma_pago = ?, autorizacion = ?, request = ?, importe = ?, concepto = ?, estado = ?, tiempo_creacion = ?, ultima_modificacion = ?, origen = ?, validada = ?, comentario = ?, tipo = ?, id_cuenta = ? WHERE id_reservacion_pago = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($reservacionesPago->idReservacion);
		$sqlQuery->set($reservacionesPago->formaPago);
		$sqlQuery->set($reservacionesPago->autorizacion);
		$sqlQuery->set($reservacionesPago->request);
		$sqlQuery->set($reservacionesPago->importe);
		$sqlQuery->set($reservacionesPago->concepto);
		$sqlQuery->set($reservacionesPago->estado);
		$sqlQuery->set($reservacionesPago->tiempoCreacion);
		$sqlQuery->set($reservacionesPago->ultimaModificacion);
		$sqlQuery->set($reservacionesPago->origen);
		$sqlQuery->setNumber($reservacionesPago->validada);
		$sqlQuery->set($reservacionesPago->comentario);
		$sqlQuery->set($reservacionesPago->tipo);
		$sqlQuery->setNumber($reservacionesPago->idCuenta);

		$sqlQuery->setNumber($reservacionesPago->idReservacionPago);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM reservaciones_pagos';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIdReservacion($value){
		$sql = 'SELECT * FROM reservaciones_pagos WHERE id_reservacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFormaPago($value){
		$sql = 'SELECT * FROM reservaciones_pagos WHERE forma_pago = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAutorizacion($value){
		$sql = 'SELECT * FROM reservaciones_pagos WHERE autorizacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRequest($value){
		$sql = 'SELECT * FROM reservaciones_pagos WHERE request = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByImporte($value){
		$sql = 'SELECT * FROM reservaciones_pagos WHERE importe = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByConcepto($value){
		$sql = 'SELECT * FROM reservaciones_pagos WHERE concepto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEstado($value){
		$sql = 'SELECT * FROM reservaciones_pagos WHERE estado = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTiempoCreacion($value){
		$sql = 'SELECT * FROM reservaciones_pagos WHERE tiempo_creacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUltimaModificacion($value){
		$sql = 'SELECT * FROM reservaciones_pagos WHERE ultima_modificacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByOrigen($value){
		$sql = 'SELECT * FROM reservaciones_pagos WHERE origen = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByValidada($value){
		$sql = 'SELECT * FROM reservaciones_pagos WHERE validada = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByComentario($value){
		$sql = 'SELECT * FROM reservaciones_pagos WHERE comentario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTipo($value){
		$sql = 'SELECT * FROM reservaciones_pagos WHERE tipo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdCuenta($value){
		$sql = 'SELECT * FROM reservaciones_pagos WHERE id_cuenta = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIdReservacion($value){
		$sql = 'DELETE FROM reservaciones_pagos WHERE id_reservacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFormaPago($value){
		$sql = 'DELETE FROM reservaciones_pagos WHERE forma_pago = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAutorizacion($value){
		$sql = 'DELETE FROM reservaciones_pagos WHERE autorizacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRequest($value){
		$sql = 'DELETE FROM reservaciones_pagos WHERE request = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByImporte($value){
		$sql = 'DELETE FROM reservaciones_pagos WHERE importe = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByConcepto($value){
		$sql = 'DELETE FROM reservaciones_pagos WHERE concepto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEstado($value){
		$sql = 'DELETE FROM reservaciones_pagos WHERE estado = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTiempoCreacion($value){
		$sql = 'DELETE FROM reservaciones_pagos WHERE tiempo_creacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUltimaModificacion($value){
		$sql = 'DELETE FROM reservaciones_pagos WHERE ultima_modificacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByOrigen($value){
		$sql = 'DELETE FROM reservaciones_pagos WHERE origen = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByValidada($value){
		$sql = 'DELETE FROM reservaciones_pagos WHERE validada = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByComentario($value){
		$sql = 'DELETE FROM reservaciones_pagos WHERE comentario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTipo($value){
		$sql = 'DELETE FROM reservaciones_pagos WHERE tipo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdCuenta($value){
		$sql = 'DELETE FROM reservaciones_pagos WHERE id_cuenta = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ReservacionesPagosMySql 
	 */
	protected function readRow($row){
		$reservacionesPago = new ReservacionesPago();
		
		$reservacionesPago->idReservacionPago = $row['id_reservacion_pago'];
		$reservacionesPago->idReservacion = $row['id_reservacion'];
		$reservacionesPago->formaPago = $row['forma_pago'];
		$reservacionesPago->autorizacion = $row['autorizacion'];
		$reservacionesPago->request = $row['request'];
		$reservacionesPago->importe = $row['importe'];
		$reservacionesPago->concepto = $row['concepto'];
		$reservacionesPago->estado = $row['estado'];
		$reservacionesPago->tiempoCreacion = $row['tiempo_creacion'];
		$reservacionesPago->ultimaModificacion = $row['ultima_modificacion'];
		$reservacionesPago->origen = $row['origen'];
		$reservacionesPago->validada = $row['validada'];
		$reservacionesPago->comentario = $row['comentario'];
		$reservacionesPago->tipo = $row['tipo'];
		$reservacionesPago->idCuenta = $row['id_cuenta'];

		return $reservacionesPago;
	}
	
	protected function getList($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		$ret = array();
		for($i=0;$i<count($tab);$i++){
			$ret[$i] = $this->readRow($tab[$i]);
		}
		return $ret;
	}
	
	/**
	 * Get row
	 *
	 * @return ReservacionesPagosMySql 
	 */
	protected function getRow($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		if(count($tab)==0){
			return null;
		}
		return $this->readRow($tab[0]);		
	}
	
	/**
	 * Execute sql query
	 */
	protected function execute($sqlQuery){
		return QueryExecutor::execute($sqlQuery);
	}
	
		
	/**
	 * Execute sql query
	 */
	protected function executeUpdate($sqlQuery){
		return QueryExecutor::executeUpdate($sqlQuery);
	}

	/**
	 * Query for one row and one column
	 */
	protected function querySingleResult($sqlQuery){
		return QueryExecutor::queryForString($sqlQuery);
	}

	/**
	 * Insert row to table
	 */
	protected function executeInsert($sqlQuery){
		return QueryExecutor::executeInsert($sqlQuery);
	}
}
?>
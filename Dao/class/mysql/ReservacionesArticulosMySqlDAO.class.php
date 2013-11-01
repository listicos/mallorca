<?php
/**
 * Class that operate on table 'reservaciones_articulos'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-10-18 16:11
 */
class ReservacionesArticulosMySqlDAO implements ReservacionesArticulosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ReservacionesArticulosMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM reservaciones_articulos WHERE id_reservacion_articulo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM reservaciones_articulos';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM reservaciones_articulos ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param reservacionesArticulo primary key
 	 */
	public function delete($id_reservacion_articulo){
		$sql = 'DELETE FROM reservaciones_articulos WHERE id_reservacion_articulo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_reservacion_articulo);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ReservacionesArticulosMySql reservacionesArticulo
 	 */
	public function insert($reservacionesArticulo){
		$sql = 'INSERT INTO reservaciones_articulos (id_reservacion, id_articulo, cantidad, precio) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($reservacionesArticulo->idReservacion);
		$sqlQuery->setNumber($reservacionesArticulo->idArticulo);
		$sqlQuery->setNumber($reservacionesArticulo->cantidad);
		$sqlQuery->set($reservacionesArticulo->precio);

		$id = $this->executeInsert($sqlQuery);	
		$reservacionesArticulo->idReservacionArticulo = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ReservacionesArticulosMySql reservacionesArticulo
 	 */
	public function update($reservacionesArticulo){
		$sql = 'UPDATE reservaciones_articulos SET id_reservacion = ?, id_articulo = ?, cantidad = ?, precio = ? WHERE id_reservacion_articulo = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($reservacionesArticulo->idReservacion);
		$sqlQuery->setNumber($reservacionesArticulo->idArticulo);
		$sqlQuery->setNumber($reservacionesArticulo->cantidad);
		$sqlQuery->set($reservacionesArticulo->precio);

		$sqlQuery->setNumber($reservacionesArticulo->idReservacionArticulo);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM reservaciones_articulos';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIdReservacion($value){
		$sql = 'SELECT * FROM reservaciones_articulos WHERE id_reservacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdArticulo($value){
		$sql = 'SELECT * FROM reservaciones_articulos WHERE id_articulo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCantidad($value){
		$sql = 'SELECT * FROM reservaciones_articulos WHERE cantidad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPrecio($value){
		$sql = 'SELECT * FROM reservaciones_articulos WHERE precio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIdReservacion($value){
		$sql = 'DELETE FROM reservaciones_articulos WHERE id_reservacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdArticulo($value){
		$sql = 'DELETE FROM reservaciones_articulos WHERE id_articulo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCantidad($value){
		$sql = 'DELETE FROM reservaciones_articulos WHERE cantidad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPrecio($value){
		$sql = 'DELETE FROM reservaciones_articulos WHERE precio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ReservacionesArticulosMySql 
	 */
	protected function readRow($row){
		$reservacionesArticulo = new ReservacionesArticulo();
		
		$reservacionesArticulo->idReservacion = $row['id_reservacion'];
		$reservacionesArticulo->idArticulo = $row['id_articulo'];
		$reservacionesArticulo->idReservacionArticulo = $row['id_reservacion_articulo'];
		$reservacionesArticulo->cantidad = $row['cantidad'];
		$reservacionesArticulo->precio = $row['precio'];

		return $reservacionesArticulo;
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
	 * @return ReservacionesArticulosMySql 
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
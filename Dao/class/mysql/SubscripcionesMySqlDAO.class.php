<?php
/**
 * Class that operate on table 'subscripciones'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-10-01 15:39
 */
class SubscripcionesMySqlDAO implements SubscripcionesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return SubscripcionesMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM subscripciones WHERE id_subscripcion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM subscripciones';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM subscripciones ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param subscripcione primary key
 	 */
	public function delete($id_subscripcion){
		$sql = 'DELETE FROM subscripciones WHERE id_subscripcion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_subscripcion);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param SubscripcionesMySql subscripcione
 	 */
	public function insert($subscripcione){
		$sql = 'INSERT INTO subscripciones (email, estatus, tiempo_creacion, ultima_modificacion) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($subscripcione->email);
		$sqlQuery->set($subscripcione->estatus);
		$sqlQuery->set($subscripcione->tiempoCreacion);
		$sqlQuery->set($subscripcione->ultimaModificacion);

		$id = $this->executeInsert($sqlQuery);	
		$subscripcione->idSubscripcion = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param SubscripcionesMySql subscripcione
 	 */
	public function update($subscripcione){
		$sql = 'UPDATE subscripciones SET email = ?, estatus = ?, tiempo_creacion = ?, ultima_modificacion = ? WHERE id_subscripcion = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($subscripcione->email);
		$sqlQuery->set($subscripcione->estatus);
		$sqlQuery->set($subscripcione->tiempoCreacion);
		$sqlQuery->set($subscripcione->ultimaModificacion);

		$sqlQuery->setNumber($subscripcione->idSubscripcion);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM subscripciones';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByEmail($value){
		$sql = 'SELECT * FROM subscripciones WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEstatus($value){
		$sql = 'SELECT * FROM subscripciones WHERE estatus = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTiempoCreacion($value){
		$sql = 'SELECT * FROM subscripciones WHERE tiempo_creacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUltimaModificacion($value){
		$sql = 'SELECT * FROM subscripciones WHERE ultima_modificacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByEmail($value){
		$sql = 'DELETE FROM subscripciones WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEstatus($value){
		$sql = 'DELETE FROM subscripciones WHERE estatus = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTiempoCreacion($value){
		$sql = 'DELETE FROM subscripciones WHERE tiempo_creacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUltimaModificacion($value){
		$sql = 'DELETE FROM subscripciones WHERE ultima_modificacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return SubscripcionesMySql 
	 */
	protected function readRow($row){
		$subscripcione = new Subscripcione();
		
		$subscripcione->idSubscripcion = $row['id_subscripcion'];
		$subscripcione->email = $row['email'];
		$subscripcione->estatus = $row['estatus'];
		$subscripcione->tiempoCreacion = $row['tiempo_creacion'];
		$subscripcione->ultimaModificacion = $row['ultima_modificacion'];

		return $subscripcione;
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
	 * @return SubscripcionesMySql 
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
<?php
/**
 * Class that operate on table 'lugares_cercanos'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-10-18 16:11
 */
class LugaresCercanosMySqlDAO implements LugaresCercanosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return LugaresCercanosMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM lugares_cercanos WHERE id_lugar_cercano = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM lugares_cercanos';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM lugares_cercanos ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param lugaresCercano primary key
 	 */
	public function delete($id_lugar_cercano){
		$sql = 'DELETE FROM lugares_cercanos WHERE id_lugar_cercano = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_lugar_cercano);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param LugaresCercanosMySql lugaresCercano
 	 */
	public function insert($lugaresCercano){
		$sql = 'INSERT INTO lugares_cercanos (nombre, medida, tipo) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($lugaresCercano->nombre);
		$sqlQuery->set($lugaresCercano->medida);
		$sqlQuery->set($lugaresCercano->tipo);

		$id = $this->executeInsert($sqlQuery);	
		$lugaresCercano->idLugarCercano = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param LugaresCercanosMySql lugaresCercano
 	 */
	public function update($lugaresCercano){
		$sql = 'UPDATE lugares_cercanos SET nombre = ?, medida = ?, tipo = ? WHERE id_lugar_cercano = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($lugaresCercano->nombre);
		$sqlQuery->set($lugaresCercano->medida);
		$sqlQuery->set($lugaresCercano->tipo);

		$sqlQuery->setNumber($lugaresCercano->idLugarCercano);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM lugares_cercanos';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNombre($value){
		$sql = 'SELECT * FROM lugares_cercanos WHERE nombre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMedida($value){
		$sql = 'SELECT * FROM lugares_cercanos WHERE medida = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTipo($value){
		$sql = 'SELECT * FROM lugares_cercanos WHERE tipo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNombre($value){
		$sql = 'DELETE FROM lugares_cercanos WHERE nombre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMedida($value){
		$sql = 'DELETE FROM lugares_cercanos WHERE medida = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTipo($value){
		$sql = 'DELETE FROM lugares_cercanos WHERE tipo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return LugaresCercanosMySql 
	 */
	protected function readRow($row){
		$lugaresCercano = new LugaresCercano();
		
		$lugaresCercano->idLugarCercano = $row['id_lugar_cercano'];
		$lugaresCercano->nombre = $row['nombre'];
		$lugaresCercano->medida = $row['medida'];
		$lugaresCercano->tipo = $row['tipo'];

		return $lugaresCercano;
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
	 * @return LugaresCercanosMySql 
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
<?php
/**
 * Class that operate on table 'monedas'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-10-01 15:39
 */
class MonedasMySqlDAO implements MonedasDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return MonedasMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM monedas WHERE id_moneda = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM monedas';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM monedas ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param moneda primary key
 	 */
	public function delete($id_moneda){
		$sql = 'DELETE FROM monedas WHERE id_moneda = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_moneda);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param MonedasMySql moneda
 	 */
	public function insert($moneda){
		$sql = 'INSERT INTO monedas (nombre, simbolo, codigo, tasa_cambio) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($moneda->nombre);
		$sqlQuery->set($moneda->simbolo);
		$sqlQuery->set($moneda->codigo);
		$sqlQuery->set($moneda->tasaCambio);

		$id = $this->executeInsert($sqlQuery);	
		$moneda->idMoneda = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param MonedasMySql moneda
 	 */
	public function update($moneda){
		$sql = 'UPDATE monedas SET nombre = ?, simbolo = ?, codigo = ?, tasa_cambio = ? WHERE id_moneda = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($moneda->nombre);
		$sqlQuery->set($moneda->simbolo);
		$sqlQuery->set($moneda->codigo);
		$sqlQuery->set($moneda->tasaCambio);

		$sqlQuery->setNumber($moneda->idMoneda);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM monedas';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNombre($value){
		$sql = 'SELECT * FROM monedas WHERE nombre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySimbolo($value){
		$sql = 'SELECT * FROM monedas WHERE simbolo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCodigo($value){
		$sql = 'SELECT * FROM monedas WHERE codigo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTasaCambio($value){
		$sql = 'SELECT * FROM monedas WHERE tasa_cambio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNombre($value){
		$sql = 'DELETE FROM monedas WHERE nombre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySimbolo($value){
		$sql = 'DELETE FROM monedas WHERE simbolo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCodigo($value){
		$sql = 'DELETE FROM monedas WHERE codigo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTasaCambio($value){
		$sql = 'DELETE FROM monedas WHERE tasa_cambio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return MonedasMySql 
	 */
	protected function readRow($row){
		$moneda = new Moneda();
		
		$moneda->idMoneda = $row['id_moneda'];
		$moneda->nombre = $row['nombre'];
		$moneda->simbolo = $row['simbolo'];
		$moneda->codigo = $row['codigo'];
		$moneda->tasaCambio = $row['tasa_cambio'];

		return $moneda;
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
	 * @return MonedasMySql 
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
<?php
/**
 * Class that operate on table 'pagos_tipos'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-10-18 16:11
 */
class PagosTiposMySqlDAO implements PagosTiposDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return PagosTiposMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM pagos_tipos WHERE id_pago_tipo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM pagos_tipos';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM pagos_tipos ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param pagosTipo primary key
 	 */
	public function delete($id_pago_tipo){
		$sql = 'DELETE FROM pagos_tipos WHERE id_pago_tipo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_pago_tipo);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PagosTiposMySql pagosTipo
 	 */
	public function insert($pagosTipo){
		$sql = 'INSERT INTO pagos_tipos (nombre) VALUES (?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($pagosTipo->nombre);

		$id = $this->executeInsert($sqlQuery);	
		$pagosTipo->idPagoTipo = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param PagosTiposMySql pagosTipo
 	 */
	public function update($pagosTipo){
		$sql = 'UPDATE pagos_tipos SET nombre = ? WHERE id_pago_tipo = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($pagosTipo->nombre);

		$sqlQuery->setNumber($pagosTipo->idPagoTipo);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM pagos_tipos';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNombre($value){
		$sql = 'SELECT * FROM pagos_tipos WHERE nombre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNombre($value){
		$sql = 'DELETE FROM pagos_tipos WHERE nombre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return PagosTiposMySql 
	 */
	protected function readRow($row){
		$pagosTipo = new PagosTipo();
		
		$pagosTipo->idPagoTipo = $row['id_pago_tipo'];
		$pagosTipo->nombre = $row['nombre'];

		return $pagosTipo;
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
	 * @return PagosTiposMySql 
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
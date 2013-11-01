<?php
/**
 * Class that operate on table 'apartamentos_tipos'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-10-18 16:11
 */
class ApartamentosTiposMySqlDAO implements ApartamentosTiposDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ApartamentosTiposMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM apartamentos_tipos WHERE id_apartamentos_tipo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM apartamentos_tipos';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM apartamentos_tipos ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param apartamentosTipo primary key
 	 */
	public function delete($id_apartamentos_tipo){
		$sql = 'DELETE FROM apartamentos_tipos WHERE id_apartamentos_tipo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_apartamentos_tipo);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ApartamentosTiposMySql apartamentosTipo
 	 */
	public function insert($apartamentosTipo){
		$sql = 'INSERT INTO apartamentos_tipos (nombre) VALUES (?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($apartamentosTipo->nombre);

		$id = $this->executeInsert($sqlQuery);	
		$apartamentosTipo->idApartamentosTipo = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ApartamentosTiposMySql apartamentosTipo
 	 */
	public function update($apartamentosTipo){
		$sql = 'UPDATE apartamentos_tipos SET nombre = ? WHERE id_apartamentos_tipo = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($apartamentosTipo->nombre);

		$sqlQuery->setNumber($apartamentosTipo->idApartamentosTipo);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM apartamentos_tipos';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNombre($value){
		$sql = 'SELECT * FROM apartamentos_tipos WHERE nombre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNombre($value){
		$sql = 'DELETE FROM apartamentos_tipos WHERE nombre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ApartamentosTiposMySql 
	 */
	protected function readRow($row){
		$apartamentosTipo = new ApartamentosTipo();
		
		$apartamentosTipo->idApartamentosTipo = $row['id_apartamentos_tipo'];
		$apartamentosTipo->nombre = $row['nombre'];

		return $apartamentosTipo;
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
	 * @return ApartamentosTiposMySql 
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
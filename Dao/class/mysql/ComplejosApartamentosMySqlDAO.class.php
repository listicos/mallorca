<?php
/**
 * Class that operate on table 'complejos_apartamentos'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-10-01 15:39
 */
class ComplejosApartamentosMySqlDAO implements ComplejosApartamentosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ComplejosApartamentosMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM complejos_apartamentos WHERE id_complejo_apartamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM complejos_apartamentos';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM complejos_apartamentos ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param complejosApartamento primary key
 	 */
	public function delete($id_complejo_apartamento){
		$sql = 'DELETE FROM complejos_apartamentos WHERE id_complejo_apartamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_complejo_apartamento);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ComplejosApartamentosMySql complejosApartamento
 	 */
	public function insert($complejosApartamento){
		$sql = 'INSERT INTO complejos_apartamentos (id_complejo, id_apartamento) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($complejosApartamento->idComplejo);
		$sqlQuery->setNumber($complejosApartamento->idApartamento);

		$id = $this->executeInsert($sqlQuery);	
		$complejosApartamento->idComplejoApartamento = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ComplejosApartamentosMySql complejosApartamento
 	 */
	public function update($complejosApartamento){
		$sql = 'UPDATE complejos_apartamentos SET id_complejo = ?, id_apartamento = ? WHERE id_complejo_apartamento = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($complejosApartamento->idComplejo);
		$sqlQuery->setNumber($complejosApartamento->idApartamento);

		$sqlQuery->setNumber($complejosApartamento->idComplejoApartamento);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM complejos_apartamentos';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIdComplejo($value){
		$sql = 'SELECT * FROM complejos_apartamentos WHERE id_complejo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdApartamento($value){
		$sql = 'SELECT * FROM complejos_apartamentos WHERE id_apartamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIdComplejo($value){
		$sql = 'DELETE FROM complejos_apartamentos WHERE id_complejo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdApartamento($value){
		$sql = 'DELETE FROM complejos_apartamentos WHERE id_apartamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ComplejosApartamentosMySql 
	 */
	protected function readRow($row){
		$complejosApartamento = new ComplejosApartamento();
		
		$complejosApartamento->idComplejo = $row['id_complejo'];
		$complejosApartamento->idApartamento = $row['id_apartamento'];
		$complejosApartamento->idComplejoApartamento = $row['id_complejo_apartamento'];

		return $complejosApartamento;
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
	 * @return ComplejosApartamentosMySql 
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
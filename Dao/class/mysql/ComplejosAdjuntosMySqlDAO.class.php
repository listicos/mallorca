<?php
/**
 * Class that operate on table 'complejos_adjuntos'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-12-15 21:34
 */
class ComplejosAdjuntosMySqlDAO implements ComplejosAdjuntosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ComplejosAdjuntosMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM complejos_adjuntos WHERE id_complejo_adjunto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM complejos_adjuntos';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM complejos_adjuntos ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param complejosAdjunto primary key
 	 */
	public function delete($id_complejo_adjunto){
		$sql = 'DELETE FROM complejos_adjuntos WHERE id_complejo_adjunto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_complejo_adjunto);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ComplejosAdjuntosMySql complejosAdjunto
 	 */
	public function insert($complejosAdjunto){
		$sql = 'INSERT INTO complejos_adjuntos (id_complejo, id_adjunto) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($complejosAdjunto->idComplejo);
		$sqlQuery->setNumber($complejosAdjunto->idAdjunto);

		$id = $this->executeInsert($sqlQuery);	
		$complejosAdjunto->idComplejoAdjunto = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ComplejosAdjuntosMySql complejosAdjunto
 	 */
	public function update($complejosAdjunto){
		$sql = 'UPDATE complejos_adjuntos SET id_complejo = ?, id_adjunto = ? WHERE id_complejo_adjunto = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($complejosAdjunto->idComplejo);
		$sqlQuery->setNumber($complejosAdjunto->idAdjunto);

		$sqlQuery->setNumber($complejosAdjunto->idComplejoAdjunto);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM complejos_adjuntos';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIdComplejo($value){
		$sql = 'SELECT * FROM complejos_adjuntos WHERE id_complejo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdAdjunto($value){
		$sql = 'SELECT * FROM complejos_adjuntos WHERE id_adjunto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIdComplejo($value){
		$sql = 'DELETE FROM complejos_adjuntos WHERE id_complejo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdAdjunto($value){
		$sql = 'DELETE FROM complejos_adjuntos WHERE id_adjunto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ComplejosAdjuntosMySql 
	 */
	protected function readRow($row){
		$complejosAdjunto = new ComplejosAdjunto();
		
		$complejosAdjunto->idComplejoAdjunto = $row['id_complejo_adjunto'];
		$complejosAdjunto->idComplejo = $row['id_complejo'];
		$complejosAdjunto->idAdjunto = $row['id_adjunto'];

		return $complejosAdjunto;
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
	 * @return ComplejosAdjuntosMySql 
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
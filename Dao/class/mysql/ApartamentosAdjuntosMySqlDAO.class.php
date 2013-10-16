<?php
/**
 * Class that operate on table 'apartamentos_adjuntos'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-10-01 15:39
 */
class ApartamentosAdjuntosMySqlDAO implements ApartamentosAdjuntosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ApartamentosAdjuntosMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM apartamentos_adjuntos WHERE id_apartamento_adjunto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM apartamentos_adjuntos';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM apartamentos_adjuntos ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param apartamentosAdjunto primary key
 	 */
	public function delete($id_apartamento_adjunto){
		$sql = 'DELETE FROM apartamentos_adjuntos WHERE id_apartamento_adjunto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_apartamento_adjunto);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ApartamentosAdjuntosMySql apartamentosAdjunto
 	 */
	public function insert($apartamentosAdjunto){
		$sql = 'INSERT INTO apartamentos_adjuntos (id_apartamento, id_adjunto) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($apartamentosAdjunto->idApartamento);
		$sqlQuery->setNumber($apartamentosAdjunto->idAdjunto);

		$id = $this->executeInsert($sqlQuery);	
		$apartamentosAdjunto->idApartamentoAdjunto = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ApartamentosAdjuntosMySql apartamentosAdjunto
 	 */
	public function update($apartamentosAdjunto){
		$sql = 'UPDATE apartamentos_adjuntos SET id_apartamento = ?, id_adjunto = ? WHERE id_apartamento_adjunto = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($apartamentosAdjunto->idApartamento);
		$sqlQuery->setNumber($apartamentosAdjunto->idAdjunto);

		$sqlQuery->setNumber($apartamentosAdjunto->idApartamentoAdjunto);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM apartamentos_adjuntos';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIdApartamento($value){
		$sql = 'SELECT * FROM apartamentos_adjuntos WHERE id_apartamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdAdjunto($value){
		$sql = 'SELECT * FROM apartamentos_adjuntos WHERE id_adjunto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIdApartamento($value){
		$sql = 'DELETE FROM apartamentos_adjuntos WHERE id_apartamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdAdjunto($value){
		$sql = 'DELETE FROM apartamentos_adjuntos WHERE id_adjunto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ApartamentosAdjuntosMySql 
	 */
	protected function readRow($row){
		$apartamentosAdjunto = new ApartamentosAdjunto();
		
		$apartamentosAdjunto->idApartamento = $row['id_apartamento'];
		$apartamentosAdjunto->idAdjunto = $row['id_adjunto'];
		$apartamentosAdjunto->idApartamentoAdjunto = $row['id_apartamento_adjunto'];

		return $apartamentosAdjunto;
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
	 * @return ApartamentosAdjuntosMySql 
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
<?php
/**
 * Class that operate on table 'adjuntos'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-10-01 15:39
 */
class AdjuntosMySqlDAO implements AdjuntosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return AdjuntosMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM adjuntos WHERE id_adjunto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM adjuntos';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM adjuntos ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param adjunto primary key
 	 */
	public function delete($id_adjunto){
		$sql = 'DELETE FROM adjuntos WHERE id_adjunto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_adjunto);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param AdjuntosMySql adjunto
 	 */
	public function insert($adjunto){
		$sql = 'INSERT INTO adjuntos (nombre, ruta, tipo, ext) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($adjunto->nombre);
		$sqlQuery->set($adjunto->ruta);
		$sqlQuery->set($adjunto->tipo);
		$sqlQuery->set($adjunto->ext);

		$id = $this->executeInsert($sqlQuery);	
		$adjunto->idAdjunto = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param AdjuntosMySql adjunto
 	 */
	public function update($adjunto){
		$sql = 'UPDATE adjuntos SET nombre = ?, ruta = ?, tipo = ?, ext = ? WHERE id_adjunto = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($adjunto->nombre);
		$sqlQuery->set($adjunto->ruta);
		$sqlQuery->set($adjunto->tipo);
		$sqlQuery->set($adjunto->ext);

		$sqlQuery->setNumber($adjunto->idAdjunto);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM adjuntos';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNombre($value){
		$sql = 'SELECT * FROM adjuntos WHERE nombre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRuta($value){
		$sql = 'SELECT * FROM adjuntos WHERE ruta = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTipo($value){
		$sql = 'SELECT * FROM adjuntos WHERE tipo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByExt($value){
		$sql = 'SELECT * FROM adjuntos WHERE ext = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNombre($value){
		$sql = 'DELETE FROM adjuntos WHERE nombre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRuta($value){
		$sql = 'DELETE FROM adjuntos WHERE ruta = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTipo($value){
		$sql = 'DELETE FROM adjuntos WHERE tipo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByExt($value){
		$sql = 'DELETE FROM adjuntos WHERE ext = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return AdjuntosMySql 
	 */
	protected function readRow($row){
		$adjunto = new Adjunto();
		
		$adjunto->idAdjunto = $row['id_adjunto'];
		$adjunto->nombre = $row['nombre'];
		$adjunto->ruta = $row['ruta'];
		$adjunto->tipo = $row['tipo'];
		$adjunto->ext = $row['ext'];

		return $adjunto;
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
	 * @return AdjuntosMySql 
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
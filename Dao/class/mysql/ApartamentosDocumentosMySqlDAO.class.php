<?php
/**
 * Class that operate on table 'apartamentos_documentos'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-10-18 16:11
 */
class ApartamentosDocumentosMySqlDAO implements ApartamentosDocumentosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ApartamentosDocumentosMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM apartamentos_documentos WHERE id_apartamento_documento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM apartamentos_documentos';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM apartamentos_documentos ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param apartamentosDocumento primary key
 	 */
	public function delete($id_apartamento_documento){
		$sql = 'DELETE FROM apartamentos_documentos WHERE id_apartamento_documento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_apartamento_documento);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ApartamentosDocumentosMySql apartamentosDocumento
 	 */
	public function insert($apartamentosDocumento){
		$sql = 'INSERT INTO apartamentos_documentos (id_apartamento, id_adjunto, tipo) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($apartamentosDocumento->idApartamento);
		$sqlQuery->setNumber($apartamentosDocumento->idAdjunto);
		$sqlQuery->set($apartamentosDocumento->tipo);

		$id = $this->executeInsert($sqlQuery);	
		$apartamentosDocumento->idApartamentoDocumento = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ApartamentosDocumentosMySql apartamentosDocumento
 	 */
	public function update($apartamentosDocumento){
		$sql = 'UPDATE apartamentos_documentos SET id_apartamento = ?, id_adjunto = ?, tipo = ? WHERE id_apartamento_documento = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($apartamentosDocumento->idApartamento);
		$sqlQuery->setNumber($apartamentosDocumento->idAdjunto);
		$sqlQuery->set($apartamentosDocumento->tipo);

		$sqlQuery->setNumber($apartamentosDocumento->idApartamentoDocumento);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM apartamentos_documentos';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIdApartamento($value){
		$sql = 'SELECT * FROM apartamentos_documentos WHERE id_apartamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdAdjunto($value){
		$sql = 'SELECT * FROM apartamentos_documentos WHERE id_adjunto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTipo($value){
		$sql = 'SELECT * FROM apartamentos_documentos WHERE tipo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIdApartamento($value){
		$sql = 'DELETE FROM apartamentos_documentos WHERE id_apartamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdAdjunto($value){
		$sql = 'DELETE FROM apartamentos_documentos WHERE id_adjunto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTipo($value){
		$sql = 'DELETE FROM apartamentos_documentos WHERE tipo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ApartamentosDocumentosMySql 
	 */
	protected function readRow($row){
		$apartamentosDocumento = new ApartamentosDocumento();
		
		$apartamentosDocumento->idApartamentoDocumento = $row['id_apartamento_documento'];
		$apartamentosDocumento->idApartamento = $row['id_apartamento'];
		$apartamentosDocumento->idAdjunto = $row['id_adjunto'];
		$apartamentosDocumento->tipo = $row['tipo'];

		return $apartamentosDocumento;
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
	 * @return ApartamentosDocumentosMySql 
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
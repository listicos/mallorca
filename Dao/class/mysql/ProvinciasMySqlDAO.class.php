<?php
/**
 * Class that operate on table 'provincias'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-10-01 15:39
 */
class ProvinciasMySqlDAO implements ProvinciasDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ProvinciasMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM provincias WHERE id_provincia = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM provincias';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM provincias ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param provincia primary key
 	 */
	public function delete($id_provincia){
		$sql = 'DELETE FROM provincias WHERE id_provincia = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_provincia);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ProvinciasMySql provincia
 	 */
	public function insert($provincia){
		$sql = 'INSERT INTO provincias (nombre, codigo, id_pais) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($provincia->nombre);
		$sqlQuery->set($provincia->codigo);
		$sqlQuery->setNumber($provincia->idPais);

		$id = $this->executeInsert($sqlQuery);	
		$provincia->idProvincia = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ProvinciasMySql provincia
 	 */
	public function update($provincia){
		$sql = 'UPDATE provincias SET nombre = ?, codigo = ?, id_pais = ? WHERE id_provincia = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($provincia->nombre);
		$sqlQuery->set($provincia->codigo);
		$sqlQuery->setNumber($provincia->idPais);

		$sqlQuery->setNumber($provincia->idProvincia);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM provincias';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNombre($value){
		$sql = 'SELECT * FROM provincias WHERE nombre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCodigo($value){
		$sql = 'SELECT * FROM provincias WHERE codigo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdPais($value){
		$sql = 'SELECT * FROM provincias WHERE id_pais = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNombre($value){
		$sql = 'DELETE FROM provincias WHERE nombre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCodigo($value){
		$sql = 'DELETE FROM provincias WHERE codigo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdPais($value){
		$sql = 'DELETE FROM provincias WHERE id_pais = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ProvinciasMySql 
	 */
	protected function readRow($row){
		$provincia = new Provincia();
		
		$provincia->idProvincia = $row['id_provincia'];
		$provincia->nombre = $row['nombre'];
		$provincia->codigo = $row['codigo'];
		$provincia->idPais = $row['id_pais'];

		return $provincia;
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
	 * @return ProvinciasMySql 
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
<?php
/**
 * Class that operate on table 'instalaciones_categoria'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-10-18 16:11
 */
class InstalacionesCategoriaMySqlDAO implements InstalacionesCategoriaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return InstalacionesCategoriaMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM instalaciones_categoria WHERE id_instalacion_categoria = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM instalaciones_categoria';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM instalaciones_categoria ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param instalacionesCategoria primary key
 	 */
	public function delete($id_instalacion_categoria){
		$sql = 'DELETE FROM instalaciones_categoria WHERE id_instalacion_categoria = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_instalacion_categoria);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param InstalacionesCategoriaMySql instalacionesCategoria
 	 */
	public function insert($instalacionesCategoria){
		$sql = 'INSERT INTO instalaciones_categoria (nombre) VALUES (?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($instalacionesCategoria->nombre);

		$id = $this->executeInsert($sqlQuery);	
		$instalacionesCategoria->idInstalacionCategoria = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param InstalacionesCategoriaMySql instalacionesCategoria
 	 */
	public function update($instalacionesCategoria){
		$sql = 'UPDATE instalaciones_categoria SET nombre = ? WHERE id_instalacion_categoria = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($instalacionesCategoria->nombre);

		$sqlQuery->setNumber($instalacionesCategoria->idInstalacionCategoria);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM instalaciones_categoria';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNombre($value){
		$sql = 'SELECT * FROM instalaciones_categoria WHERE nombre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNombre($value){
		$sql = 'DELETE FROM instalaciones_categoria WHERE nombre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return InstalacionesCategoriaMySql 
	 */
	protected function readRow($row){
		$instalacionesCategoria = new InstalacionesCategoria();
		
		$instalacionesCategoria->idInstalacionCategoria = $row['id_instalacion_categoria'];
		$instalacionesCategoria->nombre = $row['nombre'];

		return $instalacionesCategoria;
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
	 * @return InstalacionesCategoriaMySql 
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
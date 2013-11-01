<?php
/**
 * Class that operate on table 'instalaciones'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-10-18 16:11
 */
class InstalacionesMySqlDAO implements InstalacionesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return InstalacionesMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM instalaciones WHERE id_instalacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM instalaciones';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM instalaciones ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param instalacione primary key
 	 */
	public function delete($id_instalacion){
		$sql = 'DELETE FROM instalaciones WHERE id_instalacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_instalacion);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param InstalacionesMySql instalacione
 	 */
	public function insert($instalacione){
		$sql = 'INSERT INTO instalaciones (nombre, id_instalacion_categoria) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($instalacione->nombre);
		$sqlQuery->setNumber($instalacione->idInstalacionCategoria);

		$id = $this->executeInsert($sqlQuery);	
		$instalacione->idInstalacion = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param InstalacionesMySql instalacione
 	 */
	public function update($instalacione){
		$sql = 'UPDATE instalaciones SET nombre = ?, id_instalacion_categoria = ? WHERE id_instalacion = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($instalacione->nombre);
		$sqlQuery->setNumber($instalacione->idInstalacionCategoria);

		$sqlQuery->setNumber($instalacione->idInstalacion);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM instalaciones';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNombre($value){
		$sql = 'SELECT * FROM instalaciones WHERE nombre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdInstalacionCategoria($value){
		$sql = 'SELECT * FROM instalaciones WHERE id_instalacion_categoria = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNombre($value){
		$sql = 'DELETE FROM instalaciones WHERE nombre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdInstalacionCategoria($value){
		$sql = 'DELETE FROM instalaciones WHERE id_instalacion_categoria = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return InstalacionesMySql 
	 */
	protected function readRow($row){
		$instalacione = new Instalacione();
		
		$instalacione->idInstalacion = $row['id_instalacion'];
		$instalacione->nombre = $row['nombre'];
		$instalacione->idInstalacionCategoria = $row['id_instalacion_categoria'];

		return $instalacione;
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
	 * @return InstalacionesMySql 
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
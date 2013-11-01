<?php
/**
 * Class that operate on table 'mantenimientos_materiales'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-10-18 16:11
 */
class MantenimientosMaterialesMySqlDAO implements MantenimientosMaterialesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return MantenimientosMaterialesMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM mantenimientos_materiales WHERE id_mantenimiento_marterial = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM mantenimientos_materiales';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM mantenimientos_materiales ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param mantenimientosMateriale primary key
 	 */
	public function delete($id_mantenimiento_marterial){
		$sql = 'DELETE FROM mantenimientos_materiales WHERE id_mantenimiento_marterial = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_mantenimiento_marterial);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param MantenimientosMaterialesMySql mantenimientosMateriale
 	 */
	public function insert($mantenimientosMateriale){
		$sql = 'INSERT INTO mantenimientos_materiales (cantidad, descripcion, id_mantenimiento) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($mantenimientosMateriale->cantidad);
		$sqlQuery->set($mantenimientosMateriale->descripcion);
		$sqlQuery->setNumber($mantenimientosMateriale->idMantenimiento);

		$id = $this->executeInsert($sqlQuery);	
		$mantenimientosMateriale->idMantenimientoMarterial = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param MantenimientosMaterialesMySql mantenimientosMateriale
 	 */
	public function update($mantenimientosMateriale){
		$sql = 'UPDATE mantenimientos_materiales SET cantidad = ?, descripcion = ?, id_mantenimiento = ? WHERE id_mantenimiento_marterial = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($mantenimientosMateriale->cantidad);
		$sqlQuery->set($mantenimientosMateriale->descripcion);
		$sqlQuery->setNumber($mantenimientosMateriale->idMantenimiento);

		$sqlQuery->setNumber($mantenimientosMateriale->idMantenimientoMarterial);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM mantenimientos_materiales';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByCantidad($value){
		$sql = 'SELECT * FROM mantenimientos_materiales WHERE cantidad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescripcion($value){
		$sql = 'SELECT * FROM mantenimientos_materiales WHERE descripcion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdMantenimiento($value){
		$sql = 'SELECT * FROM mantenimientos_materiales WHERE id_mantenimiento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByCantidad($value){
		$sql = 'DELETE FROM mantenimientos_materiales WHERE cantidad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescripcion($value){
		$sql = 'DELETE FROM mantenimientos_materiales WHERE descripcion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdMantenimiento($value){
		$sql = 'DELETE FROM mantenimientos_materiales WHERE id_mantenimiento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return MantenimientosMaterialesMySql 
	 */
	protected function readRow($row){
		$mantenimientosMateriale = new MantenimientosMateriale();
		
		$mantenimientosMateriale->idMantenimientoMarterial = $row['id_mantenimiento_marterial'];
		$mantenimientosMateriale->cantidad = $row['cantidad'];
		$mantenimientosMateriale->descripcion = $row['descripcion'];
		$mantenimientosMateriale->idMantenimiento = $row['id_mantenimiento'];

		return $mantenimientosMateriale;
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
	 * @return MantenimientosMaterialesMySql 
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
<?php
/**
 * Class that operate on table 'mantenimientos_personal'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-10-18 16:11
 */
class MantenimientosPersonalMySqlDAO implements MantenimientosPersonalDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return MantenimientosPersonalMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM mantenimientos_personal WHERE id_mantenimiento_personal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM mantenimientos_personal';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM mantenimientos_personal ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param mantenimientosPersonal primary key
 	 */
	public function delete($id_mantenimiento_personal){
		$sql = 'DELETE FROM mantenimientos_personal WHERE id_mantenimiento_personal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_mantenimiento_personal);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param MantenimientosPersonalMySql mantenimientosPersonal
 	 */
	public function insert($mantenimientosPersonal){
		$sql = 'INSERT INTO mantenimientos_personal (nombre, fecha, inicio, final, horas, estatus, id_mantenimiento) VALUES (?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($mantenimientosPersonal->nombre);
		$sqlQuery->set($mantenimientosPersonal->fecha);
		$sqlQuery->set($mantenimientosPersonal->inicio);
		$sqlQuery->set($mantenimientosPersonal->final);
		$sqlQuery->set($mantenimientosPersonal->horas);
		$sqlQuery->set($mantenimientosPersonal->estatus);
		$sqlQuery->setNumber($mantenimientosPersonal->idMantenimiento);

		$id = $this->executeInsert($sqlQuery);	
		$mantenimientosPersonal->idMantenimientoPersonal = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param MantenimientosPersonalMySql mantenimientosPersonal
 	 */
	public function update($mantenimientosPersonal){
		$sql = 'UPDATE mantenimientos_personal SET nombre = ?, fecha = ?, inicio = ?, final = ?, horas = ?, estatus = ?, id_mantenimiento = ? WHERE id_mantenimiento_personal = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($mantenimientosPersonal->nombre);
		$sqlQuery->set($mantenimientosPersonal->fecha);
		$sqlQuery->set($mantenimientosPersonal->inicio);
		$sqlQuery->set($mantenimientosPersonal->final);
		$sqlQuery->set($mantenimientosPersonal->horas);
		$sqlQuery->set($mantenimientosPersonal->estatus);
		$sqlQuery->setNumber($mantenimientosPersonal->idMantenimiento);

		$sqlQuery->setNumber($mantenimientosPersonal->idMantenimientoPersonal);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM mantenimientos_personal';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNombre($value){
		$sql = 'SELECT * FROM mantenimientos_personal WHERE nombre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFecha($value){
		$sql = 'SELECT * FROM mantenimientos_personal WHERE fecha = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByInicio($value){
		$sql = 'SELECT * FROM mantenimientos_personal WHERE inicio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFinal($value){
		$sql = 'SELECT * FROM mantenimientos_personal WHERE final = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByHoras($value){
		$sql = 'SELECT * FROM mantenimientos_personal WHERE horas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEstatus($value){
		$sql = 'SELECT * FROM mantenimientos_personal WHERE estatus = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdMantenimiento($value){
		$sql = 'SELECT * FROM mantenimientos_personal WHERE id_mantenimiento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNombre($value){
		$sql = 'DELETE FROM mantenimientos_personal WHERE nombre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFecha($value){
		$sql = 'DELETE FROM mantenimientos_personal WHERE fecha = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByInicio($value){
		$sql = 'DELETE FROM mantenimientos_personal WHERE inicio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFinal($value){
		$sql = 'DELETE FROM mantenimientos_personal WHERE final = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByHoras($value){
		$sql = 'DELETE FROM mantenimientos_personal WHERE horas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEstatus($value){
		$sql = 'DELETE FROM mantenimientos_personal WHERE estatus = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdMantenimiento($value){
		$sql = 'DELETE FROM mantenimientos_personal WHERE id_mantenimiento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return MantenimientosPersonalMySql 
	 */
	protected function readRow($row){
		$mantenimientosPersonal = new MantenimientosPersonal();
		
		$mantenimientosPersonal->idMantenimientoPersonal = $row['id_mantenimiento_personal'];
		$mantenimientosPersonal->nombre = $row['nombre'];
		$mantenimientosPersonal->fecha = $row['fecha'];
		$mantenimientosPersonal->inicio = $row['inicio'];
		$mantenimientosPersonal->final = $row['final'];
		$mantenimientosPersonal->horas = $row['horas'];
		$mantenimientosPersonal->estatus = $row['estatus'];
		$mantenimientosPersonal->idMantenimiento = $row['id_mantenimiento'];

		return $mantenimientosPersonal;
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
	 * @return MantenimientosPersonalMySql 
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
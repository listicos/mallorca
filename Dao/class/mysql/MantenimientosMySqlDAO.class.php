<?php
/**
 * Class that operate on table 'mantenimientos'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-10-01 15:39
 */
class MantenimientosMySqlDAO implements MantenimientosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return MantenimientosMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM mantenimientos WHERE id_mantenimiento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM mantenimientos';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM mantenimientos ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param mantenimiento primary key
 	 */
	public function delete($id_mantenimiento){
		$sql = 'DELETE FROM mantenimientos WHERE id_mantenimiento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_mantenimiento);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param MantenimientosMySql mantenimiento
 	 */
	public function insert($mantenimiento){
		$sql = 'INSERT INTO mantenimientos (id_apartamento, tiempo_creacion, ultima_modificacion, ubicacion, solicitante, trabajos_solicitados, informe_tecnico, observaciones, estatus, fecha_cierre, id_reservacion) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($mantenimiento->idApartamento);
		$sqlQuery->set($mantenimiento->tiempoCreacion);
		$sqlQuery->set($mantenimiento->ultimaModificacion);
		$sqlQuery->set($mantenimiento->ubicacion);
		$sqlQuery->set($mantenimiento->solicitante);
		$sqlQuery->set($mantenimiento->trabajosSolicitados);
		$sqlQuery->set($mantenimiento->informeTecnico);
		$sqlQuery->set($mantenimiento->observaciones);
		$sqlQuery->set($mantenimiento->estatus);
		$sqlQuery->set($mantenimiento->fechaCierre);
		$sqlQuery->setNumber($mantenimiento->idReservacion);

		$id = $this->executeInsert($sqlQuery);	
		$mantenimiento->idMantenimiento = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param MantenimientosMySql mantenimiento
 	 */
	public function update($mantenimiento){
		$sql = 'UPDATE mantenimientos SET id_apartamento = ?, tiempo_creacion = ?, ultima_modificacion = ?, ubicacion = ?, solicitante = ?, trabajos_solicitados = ?, informe_tecnico = ?, observaciones = ?, estatus = ?, fecha_cierre = ?, id_reservacion = ? WHERE id_mantenimiento = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($mantenimiento->idApartamento);
		$sqlQuery->set($mantenimiento->tiempoCreacion);
		$sqlQuery->set($mantenimiento->ultimaModificacion);
		$sqlQuery->set($mantenimiento->ubicacion);
		$sqlQuery->set($mantenimiento->solicitante);
		$sqlQuery->set($mantenimiento->trabajosSolicitados);
		$sqlQuery->set($mantenimiento->informeTecnico);
		$sqlQuery->set($mantenimiento->observaciones);
		$sqlQuery->set($mantenimiento->estatus);
		$sqlQuery->set($mantenimiento->fechaCierre);
		$sqlQuery->setNumber($mantenimiento->idReservacion);

		$sqlQuery->setNumber($mantenimiento->idMantenimiento);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM mantenimientos';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIdApartamento($value){
		$sql = 'SELECT * FROM mantenimientos WHERE id_apartamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTiempoCreacion($value){
		$sql = 'SELECT * FROM mantenimientos WHERE tiempo_creacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUltimaModificacion($value){
		$sql = 'SELECT * FROM mantenimientos WHERE ultima_modificacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUbicacion($value){
		$sql = 'SELECT * FROM mantenimientos WHERE ubicacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySolicitante($value){
		$sql = 'SELECT * FROM mantenimientos WHERE solicitante = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTrabajosSolicitados($value){
		$sql = 'SELECT * FROM mantenimientos WHERE trabajos_solicitados = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByInformeTecnico($value){
		$sql = 'SELECT * FROM mantenimientos WHERE informe_tecnico = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByObservaciones($value){
		$sql = 'SELECT * FROM mantenimientos WHERE observaciones = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEstatus($value){
		$sql = 'SELECT * FROM mantenimientos WHERE estatus = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFechaCierre($value){
		$sql = 'SELECT * FROM mantenimientos WHERE fecha_cierre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdReservacion($value){
		$sql = 'SELECT * FROM mantenimientos WHERE id_reservacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIdApartamento($value){
		$sql = 'DELETE FROM mantenimientos WHERE id_apartamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTiempoCreacion($value){
		$sql = 'DELETE FROM mantenimientos WHERE tiempo_creacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUltimaModificacion($value){
		$sql = 'DELETE FROM mantenimientos WHERE ultima_modificacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUbicacion($value){
		$sql = 'DELETE FROM mantenimientos WHERE ubicacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySolicitante($value){
		$sql = 'DELETE FROM mantenimientos WHERE solicitante = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTrabajosSolicitados($value){
		$sql = 'DELETE FROM mantenimientos WHERE trabajos_solicitados = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByInformeTecnico($value){
		$sql = 'DELETE FROM mantenimientos WHERE informe_tecnico = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByObservaciones($value){
		$sql = 'DELETE FROM mantenimientos WHERE observaciones = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEstatus($value){
		$sql = 'DELETE FROM mantenimientos WHERE estatus = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFechaCierre($value){
		$sql = 'DELETE FROM mantenimientos WHERE fecha_cierre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdReservacion($value){
		$sql = 'DELETE FROM mantenimientos WHERE id_reservacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return MantenimientosMySql 
	 */
	protected function readRow($row){
		$mantenimiento = new Mantenimiento();
		
		$mantenimiento->idMantenimiento = $row['id_mantenimiento'];
		$mantenimiento->idApartamento = $row['id_apartamento'];
		$mantenimiento->tiempoCreacion = $row['tiempo_creacion'];
		$mantenimiento->ultimaModificacion = $row['ultima_modificacion'];
		$mantenimiento->ubicacion = $row['ubicacion'];
		$mantenimiento->solicitante = $row['solicitante'];
		$mantenimiento->trabajosSolicitados = $row['trabajos_solicitados'];
		$mantenimiento->informeTecnico = $row['informe_tecnico'];
		$mantenimiento->observaciones = $row['observaciones'];
		$mantenimiento->estatus = $row['estatus'];
		$mantenimiento->fechaCierre = $row['fecha_cierre'];
		$mantenimiento->idReservacion = $row['id_reservacion'];

		return $mantenimiento;
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
	 * @return MantenimientosMySql 
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
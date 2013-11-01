<?php
/**
 * Class that operate on table 'empresas_contratos'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-10-18 16:11
 */
class EmpresasContratosMySqlDAO implements EmpresasContratosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return EmpresasContratosMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM empresas_contratos WHERE id_empresa_contrato = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM empresas_contratos';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM empresas_contratos ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param empresasContrato primary key
 	 */
	public function delete($id_empresa_contrato){
		$sql = 'DELETE FROM empresas_contratos WHERE id_empresa_contrato = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_empresa_contrato);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param EmpresasContratosMySql empresasContrato
 	 */
	public function insert($empresasContrato){
		$sql = 'INSERT INTO empresas_contratos (id_empresa, id_contrato, fecha_inicio, fecha_fin, tiempo_creacion, ultima_modificacion) VALUES (?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($empresasContrato->idEmpresa);
		$sqlQuery->setNumber($empresasContrato->idContrato);
		$sqlQuery->set($empresasContrato->fechaInicio);
		$sqlQuery->set($empresasContrato->fechaFin);
		$sqlQuery->set($empresasContrato->tiempoCreacion);
		$sqlQuery->set($empresasContrato->ultimaModificacion);

		$id = $this->executeInsert($sqlQuery);	
		$empresasContrato->idEmpresaContrato = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param EmpresasContratosMySql empresasContrato
 	 */
	public function update($empresasContrato){
		$sql = 'UPDATE empresas_contratos SET id_empresa = ?, id_contrato = ?, fecha_inicio = ?, fecha_fin = ?, tiempo_creacion = ?, ultima_modificacion = ? WHERE id_empresa_contrato = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($empresasContrato->idEmpresa);
		$sqlQuery->setNumber($empresasContrato->idContrato);
		$sqlQuery->set($empresasContrato->fechaInicio);
		$sqlQuery->set($empresasContrato->fechaFin);
		$sqlQuery->set($empresasContrato->tiempoCreacion);
		$sqlQuery->set($empresasContrato->ultimaModificacion);

		$sqlQuery->setNumber($empresasContrato->idEmpresaContrato);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM empresas_contratos';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIdEmpresa($value){
		$sql = 'SELECT * FROM empresas_contratos WHERE id_empresa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdContrato($value){
		$sql = 'SELECT * FROM empresas_contratos WHERE id_contrato = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFechaInicio($value){
		$sql = 'SELECT * FROM empresas_contratos WHERE fecha_inicio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFechaFin($value){
		$sql = 'SELECT * FROM empresas_contratos WHERE fecha_fin = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTiempoCreacion($value){
		$sql = 'SELECT * FROM empresas_contratos WHERE tiempo_creacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUltimaModificacion($value){
		$sql = 'SELECT * FROM empresas_contratos WHERE ultima_modificacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIdEmpresa($value){
		$sql = 'DELETE FROM empresas_contratos WHERE id_empresa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdContrato($value){
		$sql = 'DELETE FROM empresas_contratos WHERE id_contrato = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFechaInicio($value){
		$sql = 'DELETE FROM empresas_contratos WHERE fecha_inicio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFechaFin($value){
		$sql = 'DELETE FROM empresas_contratos WHERE fecha_fin = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTiempoCreacion($value){
		$sql = 'DELETE FROM empresas_contratos WHERE tiempo_creacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUltimaModificacion($value){
		$sql = 'DELETE FROM empresas_contratos WHERE ultima_modificacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return EmpresasContratosMySql 
	 */
	protected function readRow($row){
		$empresasContrato = new EmpresasContrato();
		
		$empresasContrato->idEmpresa = $row['id_empresa'];
		$empresasContrato->idContrato = $row['id_contrato'];
		$empresasContrato->idEmpresaContrato = $row['id_empresa_contrato'];
		$empresasContrato->fechaInicio = $row['fecha_inicio'];
		$empresasContrato->fechaFin = $row['fecha_fin'];
		$empresasContrato->tiempoCreacion = $row['tiempo_creacion'];
		$empresasContrato->ultimaModificacion = $row['ultima_modificacion'];

		return $empresasContrato;
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
	 * @return EmpresasContratosMySql 
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
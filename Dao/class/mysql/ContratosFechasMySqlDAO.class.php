<?php
/**
 * Class that operate on table 'contratos_fechas'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-10-01 15:39
 */
class ContratosFechasMySqlDAO implements ContratosFechasDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ContratosFechasMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM contratos_fechas WHERE id_disponibilidad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM contratos_fechas';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM contratos_fechas ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param contratosFecha primary key
 	 */
	public function delete($id_disponibilidad){
		$sql = 'DELETE FROM contratos_fechas WHERE id_disponibilidad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_disponibilidad);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ContratosFechasMySql contratosFecha
 	 */
	public function insert($contratosFecha){
		$sql = 'INSERT INTO contratos_fechas (fecha_inicio, fecha_final, precio, anotacion, id_contrato) VALUES (?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($contratosFecha->fechaInicio);
		$sqlQuery->set($contratosFecha->fechaFinal);
		$sqlQuery->set($contratosFecha->precio);
		$sqlQuery->set($contratosFecha->anotacion);
		$sqlQuery->setNumber($contratosFecha->idContrato);

		$id = $this->executeInsert($sqlQuery);	
		$contratosFecha->idDisponibilidad = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ContratosFechasMySql contratosFecha
 	 */
	public function update($contratosFecha){
		$sql = 'UPDATE contratos_fechas SET fecha_inicio = ?, fecha_final = ?, precio = ?, anotacion = ?, id_contrato = ? WHERE id_disponibilidad = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($contratosFecha->fechaInicio);
		$sqlQuery->set($contratosFecha->fechaFinal);
		$sqlQuery->set($contratosFecha->precio);
		$sqlQuery->set($contratosFecha->anotacion);
		$sqlQuery->setNumber($contratosFecha->idContrato);

		$sqlQuery->setNumber($contratosFecha->idDisponibilidad);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM contratos_fechas';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByFechaInicio($value){
		$sql = 'SELECT * FROM contratos_fechas WHERE fecha_inicio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFechaFinal($value){
		$sql = 'SELECT * FROM contratos_fechas WHERE fecha_final = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPrecio($value){
		$sql = 'SELECT * FROM contratos_fechas WHERE precio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAnotacion($value){
		$sql = 'SELECT * FROM contratos_fechas WHERE anotacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdContrato($value){
		$sql = 'SELECT * FROM contratos_fechas WHERE id_contrato = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByFechaInicio($value){
		$sql = 'DELETE FROM contratos_fechas WHERE fecha_inicio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFechaFinal($value){
		$sql = 'DELETE FROM contratos_fechas WHERE fecha_final = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPrecio($value){
		$sql = 'DELETE FROM contratos_fechas WHERE precio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAnotacion($value){
		$sql = 'DELETE FROM contratos_fechas WHERE anotacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdContrato($value){
		$sql = 'DELETE FROM contratos_fechas WHERE id_contrato = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ContratosFechasMySql 
	 */
	protected function readRow($row){
		$contratosFecha = new ContratosFecha();
		
		$contratosFecha->idDisponibilidad = $row['id_disponibilidad'];
		$contratosFecha->fechaInicio = $row['fecha_inicio'];
		$contratosFecha->fechaFinal = $row['fecha_final'];
		$contratosFecha->precio = $row['precio'];
		$contratosFecha->anotacion = $row['anotacion'];
		$contratosFecha->idContrato = $row['id_contrato'];

		return $contratosFecha;
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
	 * @return ContratosFechasMySql 
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
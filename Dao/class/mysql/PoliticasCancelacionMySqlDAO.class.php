<?php
/**
 * Class that operate on table 'politicas_cancelacion'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-12-22 22:14
 */
class PoliticasCancelacionMySqlDAO implements PoliticasCancelacionDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return PoliticasCancelacionMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM politicas_cancelacion WHERE id_politica_cancelacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM politicas_cancelacion';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM politicas_cancelacion ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param politicasCancelacion primary key
 	 */
	public function delete($id_politica_cancelacion){
		$sql = 'DELETE FROM politicas_cancelacion WHERE id_politica_cancelacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_politica_cancelacion);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PoliticasCancelacionMySql politicasCancelacion
 	 */
	public function insert($politicasCancelacion){
		$sql = 'INSERT INTO politicas_cancelacion (nombre, reembolso_dia, comision, reembolso_porcentaje, descripcion) VALUES (?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($politicasCancelacion->nombre);
		$sqlQuery->setNumber($politicasCancelacion->reembolsoDia);
		$sqlQuery->set($politicasCancelacion->comision);
		$sqlQuery->set($politicasCancelacion->reembolsoPorcentaje);
		$sqlQuery->set($politicasCancelacion->descripcion);

		$id = $this->executeInsert($sqlQuery);	
		$politicasCancelacion->idPoliticaCancelacion = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param PoliticasCancelacionMySql politicasCancelacion
 	 */
	public function update($politicasCancelacion){
		$sql = 'UPDATE politicas_cancelacion SET nombre = ?, reembolso_dia = ?, comision = ?, reembolso_porcentaje = ?, descripcion = ? WHERE id_politica_cancelacion = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($politicasCancelacion->nombre);
		$sqlQuery->setNumber($politicasCancelacion->reembolsoDia);
		$sqlQuery->set($politicasCancelacion->comision);
		$sqlQuery->set($politicasCancelacion->reembolsoPorcentaje);
		$sqlQuery->set($politicasCancelacion->descripcion);

		$sqlQuery->setNumber($politicasCancelacion->idPoliticaCancelacion);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM politicas_cancelacion';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNombre($value){
		$sql = 'SELECT * FROM politicas_cancelacion WHERE nombre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByReembolsoDia($value){
		$sql = 'SELECT * FROM politicas_cancelacion WHERE reembolso_dia = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByComision($value){
		$sql = 'SELECT * FROM politicas_cancelacion WHERE comision = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByReembolsoPorcentaje($value){
		$sql = 'SELECT * FROM politicas_cancelacion WHERE reembolso_porcentaje = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescripcion($value){
		$sql = 'SELECT * FROM politicas_cancelacion WHERE descripcion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNombre($value){
		$sql = 'DELETE FROM politicas_cancelacion WHERE nombre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByReembolsoDia($value){
		$sql = 'DELETE FROM politicas_cancelacion WHERE reembolso_dia = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByComision($value){
		$sql = 'DELETE FROM politicas_cancelacion WHERE comision = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByReembolsoPorcentaje($value){
		$sql = 'DELETE FROM politicas_cancelacion WHERE reembolso_porcentaje = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescripcion($value){
		$sql = 'DELETE FROM politicas_cancelacion WHERE descripcion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return PoliticasCancelacionMySql 
	 */
	protected function readRow($row){
		$politicasCancelacion = new PoliticasCancelacion();
		
		$politicasCancelacion->idPoliticaCancelacion = $row['id_politica_cancelacion'];
		$politicasCancelacion->nombre = $row['nombre'];
		$politicasCancelacion->reembolsoDia = $row['reembolso_dia'];
		$politicasCancelacion->comision = $row['comision'];
		$politicasCancelacion->reembolsoPorcentaje = $row['reembolso_porcentaje'];
		$politicasCancelacion->descripcion = $row['descripcion'];

		return $politicasCancelacion;
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
	 * @return PoliticasCancelacionMySql 
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
<?php
/**
 * Class that operate on table 'apartamentos_descripcion'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-10-01 15:39
 */
class ApartamentosDescripcionMySqlDAO implements ApartamentosDescripcionDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ApartamentosDescripcionMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM apartamentos_descripcion WHERE id_apartamento_descripcion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM apartamentos_descripcion';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM apartamentos_descripcion ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param apartamentosDescripcion primary key
 	 */
	public function delete($id_apartamento_descripcion){
		$sql = 'DELETE FROM apartamentos_descripcion WHERE id_apartamento_descripcion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_apartamento_descripcion);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ApartamentosDescripcionMySql apartamentosDescripcion
 	 */
	public function insert($apartamentosDescripcion){
		$sql = 'INSERT INTO apartamentos_descripcion (nombre, descripcion_corta, descripcion_larga, descripcion_servicios, descripcion_condiciones, normas, manual, id_idioma) VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($apartamentosDescripcion->nombre);
		$sqlQuery->set($apartamentosDescripcion->descripcionCorta);
		$sqlQuery->set($apartamentosDescripcion->descripcionLarga);
		$sqlQuery->set($apartamentosDescripcion->descripcionServicios);
		$sqlQuery->set($apartamentosDescripcion->descripcionCondiciones);
		$sqlQuery->set($apartamentosDescripcion->normas);
		$sqlQuery->set($apartamentosDescripcion->manual);
		$sqlQuery->setNumber($apartamentosDescripcion->idIdioma);

		$id = $this->executeInsert($sqlQuery);	
		$apartamentosDescripcion->idApartamentoDescripcion = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ApartamentosDescripcionMySql apartamentosDescripcion
 	 */
	public function update($apartamentosDescripcion){
		$sql = 'UPDATE apartamentos_descripcion SET nombre = ?, descripcion_corta = ?, descripcion_larga = ?, descripcion_servicios = ?, descripcion_condiciones = ?, normas = ?, manual = ?, id_idioma = ? WHERE id_apartamento_descripcion = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($apartamentosDescripcion->nombre);
		$sqlQuery->set($apartamentosDescripcion->descripcionCorta);
		$sqlQuery->set($apartamentosDescripcion->descripcionLarga);
		$sqlQuery->set($apartamentosDescripcion->descripcionServicios);
		$sqlQuery->set($apartamentosDescripcion->descripcionCondiciones);
		$sqlQuery->set($apartamentosDescripcion->normas);
		$sqlQuery->set($apartamentosDescripcion->manual);
		$sqlQuery->setNumber($apartamentosDescripcion->idIdioma);

		$sqlQuery->setNumber($apartamentosDescripcion->idApartamentoDescripcion);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM apartamentos_descripcion';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNombre($value){
		$sql = 'SELECT * FROM apartamentos_descripcion WHERE nombre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescripcionCorta($value){
		$sql = 'SELECT * FROM apartamentos_descripcion WHERE descripcion_corta = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescripcionLarga($value){
		$sql = 'SELECT * FROM apartamentos_descripcion WHERE descripcion_larga = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescripcionServicios($value){
		$sql = 'SELECT * FROM apartamentos_descripcion WHERE descripcion_servicios = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescripcionCondiciones($value){
		$sql = 'SELECT * FROM apartamentos_descripcion WHERE descripcion_condiciones = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNormas($value){
		$sql = 'SELECT * FROM apartamentos_descripcion WHERE normas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByManual($value){
		$sql = 'SELECT * FROM apartamentos_descripcion WHERE manual = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdIdioma($value){
		$sql = 'SELECT * FROM apartamentos_descripcion WHERE id_idioma = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNombre($value){
		$sql = 'DELETE FROM apartamentos_descripcion WHERE nombre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescripcionCorta($value){
		$sql = 'DELETE FROM apartamentos_descripcion WHERE descripcion_corta = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescripcionLarga($value){
		$sql = 'DELETE FROM apartamentos_descripcion WHERE descripcion_larga = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescripcionServicios($value){
		$sql = 'DELETE FROM apartamentos_descripcion WHERE descripcion_servicios = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescripcionCondiciones($value){
		$sql = 'DELETE FROM apartamentos_descripcion WHERE descripcion_condiciones = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNormas($value){
		$sql = 'DELETE FROM apartamentos_descripcion WHERE normas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByManual($value){
		$sql = 'DELETE FROM apartamentos_descripcion WHERE manual = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdIdioma($value){
		$sql = 'DELETE FROM apartamentos_descripcion WHERE id_idioma = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ApartamentosDescripcionMySql 
	 */
	protected function readRow($row){
		$apartamentosDescripcion = new ApartamentosDescripcion();
		
		$apartamentosDescripcion->idApartamentoDescripcion = $row['id_apartamento_descripcion'];
		$apartamentosDescripcion->nombre = $row['nombre'];
		$apartamentosDescripcion->descripcionCorta = $row['descripcion_corta'];
		$apartamentosDescripcion->descripcionLarga = $row['descripcion_larga'];
		$apartamentosDescripcion->descripcionServicios = $row['descripcion_servicios'];
		$apartamentosDescripcion->descripcionCondiciones = $row['descripcion_condiciones'];
		$apartamentosDescripcion->normas = $row['normas'];
		$apartamentosDescripcion->manual = $row['manual'];
		$apartamentosDescripcion->idIdioma = $row['id_idioma'];

		return $apartamentosDescripcion;
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
	 * @return ApartamentosDescripcionMySql 
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
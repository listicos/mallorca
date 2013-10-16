<?php
/**
 * Class that operate on table 'ciudades'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-10-01 15:39
 */
class CiudadesMySqlDAO implements CiudadesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return CiudadesMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM ciudades WHERE id_ciudad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM ciudades';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM ciudades ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param ciudade primary key
 	 */
	public function delete($id_ciudad){
		$sql = 'DELETE FROM ciudades WHERE id_ciudad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_ciudad);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CiudadesMySql ciudade
 	 */
	public function insert($ciudade){
		$sql = 'INSERT INTO ciudades (nombre, id_provincia, codigo) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($ciudade->nombre);
		$sqlQuery->setNumber($ciudade->idProvincia);
		$sqlQuery->set($ciudade->codigo);

		$id = $this->executeInsert($sqlQuery);	
		$ciudade->idCiudad = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param CiudadesMySql ciudade
 	 */
	public function update($ciudade){
		$sql = 'UPDATE ciudades SET nombre = ?, id_provincia = ?, codigo = ? WHERE id_ciudad = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($ciudade->nombre);
		$sqlQuery->setNumber($ciudade->idProvincia);
		$sqlQuery->set($ciudade->codigo);

		$sqlQuery->setNumber($ciudade->idCiudad);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM ciudades';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNombre($value){
		$sql = 'SELECT * FROM ciudades WHERE nombre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdProvincia($value){
		$sql = 'SELECT * FROM ciudades WHERE id_provincia = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCodigo($value){
		$sql = 'SELECT * FROM ciudades WHERE codigo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNombre($value){
		$sql = 'DELETE FROM ciudades WHERE nombre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdProvincia($value){
		$sql = 'DELETE FROM ciudades WHERE id_provincia = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCodigo($value){
		$sql = 'DELETE FROM ciudades WHERE codigo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return CiudadesMySql 
	 */
	protected function readRow($row){
		$ciudade = new Ciudade();
		
		$ciudade->idCiudad = $row['id_ciudad'];
		$ciudade->nombre = $row['nombre'];
		$ciudade->idProvincia = $row['id_provincia'];
		$ciudade->codigo = $row['codigo'];

		return $ciudade;
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
	 * @return CiudadesMySql 
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
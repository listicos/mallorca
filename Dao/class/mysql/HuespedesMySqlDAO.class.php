<?php
/**
 * Class that operate on table 'huespedes'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-10-18 16:11
 */
class HuespedesMySqlDAO implements HuespedesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return HuespedesMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM huespedes WHERE id_huesped = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM huespedes';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM huespedes ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param huespede primary key
 	 */
	public function delete($id_huesped){
		$sql = 'DELETE FROM huespedes WHERE id_huesped = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_huesped);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param HuespedesMySql huespede
 	 */
	public function insert($huespede){
		$sql = 'INSERT INTO huespedes (id_usuario, id_direccion) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($huespede->idUsuario);
		$sqlQuery->setNumber($huespede->idDireccion);

		$id = $this->executeInsert($sqlQuery);	
		$huespede->idHuesped = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param HuespedesMySql huespede
 	 */
	public function update($huespede){
		$sql = 'UPDATE huespedes SET id_usuario = ?, id_direccion = ? WHERE id_huesped = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($huespede->idUsuario);
		$sqlQuery->setNumber($huespede->idDireccion);

		$sqlQuery->setNumber($huespede->idHuesped);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM huespedes';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIdUsuario($value){
		$sql = 'SELECT * FROM huespedes WHERE id_usuario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdDireccion($value){
		$sql = 'SELECT * FROM huespedes WHERE id_direccion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIdUsuario($value){
		$sql = 'DELETE FROM huespedes WHERE id_usuario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdDireccion($value){
		$sql = 'DELETE FROM huespedes WHERE id_direccion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return HuespedesMySql 
	 */
	protected function readRow($row){
		$huespede = new Huespede();
		
		$huespede->idHuesped = $row['id_huesped'];
		$huespede->idUsuario = $row['id_usuario'];
		$huespede->idDireccion = $row['id_direccion'];

		return $huespede;
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
	 * @return HuespedesMySql 
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
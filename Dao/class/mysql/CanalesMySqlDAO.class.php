<?php
/**
 * Class that operate on table 'canales'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-10-01 15:39
 */
class CanalesMySqlDAO implements CanalesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return CanalesMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM canales WHERE id_canal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM canales';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM canales ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param canale primary key
 	 */
	public function delete($id_canal){
		$sql = 'DELETE FROM canales WHERE id_canal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_canal);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CanalesMySql canale
 	 */
	public function insert($canale){
		$sql = 'INSERT INTO canales (nombre, comision, senia) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($canale->nombre);
		$sqlQuery->set($canale->comision);
		$sqlQuery->set($canale->senia);

		$id = $this->executeInsert($sqlQuery);	
		$canale->idCanal = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param CanalesMySql canale
 	 */
	public function update($canale){
		$sql = 'UPDATE canales SET nombre = ?, comision = ?, senia = ? WHERE id_canal = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($canale->nombre);
		$sqlQuery->set($canale->comision);
		$sqlQuery->set($canale->senia);

		$sqlQuery->setNumber($canale->idCanal);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM canales';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNombre($value){
		$sql = 'SELECT * FROM canales WHERE nombre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByComision($value){
		$sql = 'SELECT * FROM canales WHERE comision = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySenia($value){
		$sql = 'SELECT * FROM canales WHERE senia = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNombre($value){
		$sql = 'DELETE FROM canales WHERE nombre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByComision($value){
		$sql = 'DELETE FROM canales WHERE comision = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySenia($value){
		$sql = 'DELETE FROM canales WHERE senia = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return CanalesMySql 
	 */
	protected function readRow($row){
		$canale = new Canale();
		
		$canale->idCanal = $row['id_canal'];
		$canale->nombre = $row['nombre'];
		$canale->comision = $row['comision'];
		$canale->senia = $row['senia'];

		return $canale;
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
	 * @return CanalesMySql 
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
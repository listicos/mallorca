<?php
/**
 * Class that operate on table 'condiciones_compra'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-10-01 15:39
 */
class CondicionesCompraMySqlDAO implements CondicionesCompraDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return CondicionesCompraMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM condiciones_compra WHERE id_condicion_compra = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM condiciones_compra';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM condiciones_compra ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param condicionesCompra primary key
 	 */
	public function delete($id_condicion_compra){
		$sql = 'DELETE FROM condiciones_compra WHERE id_condicion_compra = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_condicion_compra);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CondicionesCompraMySql condicionesCompra
 	 */
	public function insert($condicionesCompra){
		$sql = 'INSERT INTO condiciones_compra (id_apartamento, nombre, descripcion) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($condicionesCompra->idApartamento);
		$sqlQuery->set($condicionesCompra->nombre);
		$sqlQuery->set($condicionesCompra->descripcion);

		$id = $this->executeInsert($sqlQuery);	
		$condicionesCompra->idCondicionCompra = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param CondicionesCompraMySql condicionesCompra
 	 */
	public function update($condicionesCompra){
		$sql = 'UPDATE condiciones_compra SET id_apartamento = ?, nombre = ?, descripcion = ? WHERE id_condicion_compra = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($condicionesCompra->idApartamento);
		$sqlQuery->set($condicionesCompra->nombre);
		$sqlQuery->set($condicionesCompra->descripcion);

		$sqlQuery->setNumber($condicionesCompra->idCondicionCompra);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM condiciones_compra';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIdApartamento($value){
		$sql = 'SELECT * FROM condiciones_compra WHERE id_apartamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNombre($value){
		$sql = 'SELECT * FROM condiciones_compra WHERE nombre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescripcion($value){
		$sql = 'SELECT * FROM condiciones_compra WHERE descripcion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIdApartamento($value){
		$sql = 'DELETE FROM condiciones_compra WHERE id_apartamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNombre($value){
		$sql = 'DELETE FROM condiciones_compra WHERE nombre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescripcion($value){
		$sql = 'DELETE FROM condiciones_compra WHERE descripcion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return CondicionesCompraMySql 
	 */
	protected function readRow($row){
		$condicionesCompra = new CondicionesCompra();
		
		$condicionesCompra->idCondicionCompra = $row['id_condicion_compra'];
		$condicionesCompra->idApartamento = $row['id_apartamento'];
		$condicionesCompra->nombre = $row['nombre'];
		$condicionesCompra->descripcion = $row['descripcion'];

		return $condicionesCompra;
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
	 * @return CondicionesCompraMySql 
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
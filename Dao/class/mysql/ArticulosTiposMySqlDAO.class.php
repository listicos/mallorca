<?php
/**
 * Class that operate on table 'articulos_tipos'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-10-18 16:11
 */
class ArticulosTiposMySqlDAO implements ArticulosTiposDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ArticulosTiposMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM articulos_tipos WHERE id_articulo_tipo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM articulos_tipos';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM articulos_tipos ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param articulosTipo primary key
 	 */
	public function delete($id_articulo_tipo){
		$sql = 'DELETE FROM articulos_tipos WHERE id_articulo_tipo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_articulo_tipo);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ArticulosTiposMySql articulosTipo
 	 */
	public function insert($articulosTipo){
		$sql = 'INSERT INTO articulos_tipos (nombre) VALUES (?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($articulosTipo->nombre);

		$id = $this->executeInsert($sqlQuery);	
		$articulosTipo->idArticuloTipo = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ArticulosTiposMySql articulosTipo
 	 */
	public function update($articulosTipo){
		$sql = 'UPDATE articulos_tipos SET nombre = ? WHERE id_articulo_tipo = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($articulosTipo->nombre);

		$sqlQuery->setNumber($articulosTipo->idArticuloTipo);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM articulos_tipos';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNombre($value){
		$sql = 'SELECT * FROM articulos_tipos WHERE nombre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNombre($value){
		$sql = 'DELETE FROM articulos_tipos WHERE nombre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ArticulosTiposMySql 
	 */
	protected function readRow($row){
		$articulosTipo = new ArticulosTipo();
		
		$articulosTipo->idArticuloTipo = $row['id_articulo_tipo'];
		$articulosTipo->nombre = $row['nombre'];

		return $articulosTipo;
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
	 * @return ArticulosTiposMySql 
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
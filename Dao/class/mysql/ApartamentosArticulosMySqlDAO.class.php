<?php
/**
 * Class that operate on table 'apartamentos_articulos'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-10-18 16:11
 */
class ApartamentosArticulosMySqlDAO implements ApartamentosArticulosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ApartamentosArticulosMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM apartamentos_articulos WHERE id_apartamento_articulo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM apartamentos_articulos';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM apartamentos_articulos ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param apartamentosArticulo primary key
 	 */
	public function delete($id_apartamento_articulo){
		$sql = 'DELETE FROM apartamentos_articulos WHERE id_apartamento_articulo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_apartamento_articulo);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ApartamentosArticulosMySql apartamentosArticulo
 	 */
	public function insert($apartamentosArticulo){
		$sql = 'INSERT INTO apartamentos_articulos (id_apartamento, id_articulo) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($apartamentosArticulo->idApartamento);
		$sqlQuery->setNumber($apartamentosArticulo->idArticulo);

		$id = $this->executeInsert($sqlQuery);	
		$apartamentosArticulo->idApartamentoArticulo = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ApartamentosArticulosMySql apartamentosArticulo
 	 */
	public function update($apartamentosArticulo){
		$sql = 'UPDATE apartamentos_articulos SET id_apartamento = ?, id_articulo = ? WHERE id_apartamento_articulo = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($apartamentosArticulo->idApartamento);
		$sqlQuery->setNumber($apartamentosArticulo->idArticulo);

		$sqlQuery->setNumber($apartamentosArticulo->idApartamentoArticulo);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM apartamentos_articulos';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIdApartamento($value){
		$sql = 'SELECT * FROM apartamentos_articulos WHERE id_apartamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdArticulo($value){
		$sql = 'SELECT * FROM apartamentos_articulos WHERE id_articulo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIdApartamento($value){
		$sql = 'DELETE FROM apartamentos_articulos WHERE id_apartamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdArticulo($value){
		$sql = 'DELETE FROM apartamentos_articulos WHERE id_articulo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ApartamentosArticulosMySql 
	 */
	protected function readRow($row){
		$apartamentosArticulo = new ApartamentosArticulo();
		
		$apartamentosArticulo->idApartamento = $row['id_apartamento'];
		$apartamentosArticulo->idArticulo = $row['id_articulo'];
		$apartamentosArticulo->idApartamentoArticulo = $row['id_apartamento_articulo'];

		return $apartamentosArticulo;
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
	 * @return ApartamentosArticulosMySql 
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
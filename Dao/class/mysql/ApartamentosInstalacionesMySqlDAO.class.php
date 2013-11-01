<?php
/**
 * Class that operate on table 'apartamentos_instalaciones'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-10-18 16:11
 */
class ApartamentosInstalacionesMySqlDAO implements ApartamentosInstalacionesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ApartamentosInstalacionesMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM apartamentos_instalaciones WHERE id_apartamento_instalacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM apartamentos_instalaciones';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM apartamentos_instalaciones ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param apartamentosInstalacione primary key
 	 */
	public function delete($id_apartamento_instalacion){
		$sql = 'DELETE FROM apartamentos_instalaciones WHERE id_apartamento_instalacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_apartamento_instalacion);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ApartamentosInstalacionesMySql apartamentosInstalacione
 	 */
	public function insert($apartamentosInstalacione){
		$sql = 'INSERT INTO apartamentos_instalaciones (id_apartamento, id_instalacion) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($apartamentosInstalacione->idApartamento);
		$sqlQuery->setNumber($apartamentosInstalacione->idInstalacion);

		$id = $this->executeInsert($sqlQuery);	
		$apartamentosInstalacione->idApartamentoInstalacion = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ApartamentosInstalacionesMySql apartamentosInstalacione
 	 */
	public function update($apartamentosInstalacione){
		$sql = 'UPDATE apartamentos_instalaciones SET id_apartamento = ?, id_instalacion = ? WHERE id_apartamento_instalacion = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($apartamentosInstalacione->idApartamento);
		$sqlQuery->setNumber($apartamentosInstalacione->idInstalacion);

		$sqlQuery->setNumber($apartamentosInstalacione->idApartamentoInstalacion);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM apartamentos_instalaciones';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIdApartamento($value){
		$sql = 'SELECT * FROM apartamentos_instalaciones WHERE id_apartamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdInstalacion($value){
		$sql = 'SELECT * FROM apartamentos_instalaciones WHERE id_instalacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIdApartamento($value){
		$sql = 'DELETE FROM apartamentos_instalaciones WHERE id_apartamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdInstalacion($value){
		$sql = 'DELETE FROM apartamentos_instalaciones WHERE id_instalacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ApartamentosInstalacionesMySql 
	 */
	protected function readRow($row){
		$apartamentosInstalacione = new ApartamentosInstalacione();
		
		$apartamentosInstalacione->idApartamento = $row['id_apartamento'];
		$apartamentosInstalacione->idInstalacion = $row['id_instalacion'];
		$apartamentosInstalacione->idApartamentoInstalacion = $row['id_apartamento_instalacion'];

		return $apartamentosInstalacione;
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
	 * @return ApartamentosInstalacionesMySql 
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
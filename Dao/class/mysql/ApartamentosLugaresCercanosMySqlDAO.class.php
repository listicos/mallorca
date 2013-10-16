<?php
/**
 * Class that operate on table 'apartamentos_lugares_cercanos'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-10-01 15:39
 */
class ApartamentosLugaresCercanosMySqlDAO implements ApartamentosLugaresCercanosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ApartamentosLugaresCercanosMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM apartamentos_lugares_cercanos WHERE id_apartamento_lugar_cercano = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM apartamentos_lugares_cercanos';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM apartamentos_lugares_cercanos ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param apartamentosLugaresCercano primary key
 	 */
	public function delete($id_apartamento_lugar_cercano){
		$sql = 'DELETE FROM apartamentos_lugares_cercanos WHERE id_apartamento_lugar_cercano = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_apartamento_lugar_cercano);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ApartamentosLugaresCercanosMySql apartamentosLugaresCercano
 	 */
	public function insert($apartamentosLugaresCercano){
		$sql = 'INSERT INTO apartamentos_lugares_cercanos (id_apartamento, id_lugar_cercano, valor) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($apartamentosLugaresCercano->idApartamento);
		$sqlQuery->setNumber($apartamentosLugaresCercano->idLugarCercano);
		$sqlQuery->set($apartamentosLugaresCercano->valor);

		$id = $this->executeInsert($sqlQuery);	
		$apartamentosLugaresCercano->idApartamentoLugarCercano = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ApartamentosLugaresCercanosMySql apartamentosLugaresCercano
 	 */
	public function update($apartamentosLugaresCercano){
		$sql = 'UPDATE apartamentos_lugares_cercanos SET id_apartamento = ?, id_lugar_cercano = ?, valor = ? WHERE id_apartamento_lugar_cercano = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($apartamentosLugaresCercano->idApartamento);
		$sqlQuery->setNumber($apartamentosLugaresCercano->idLugarCercano);
		$sqlQuery->set($apartamentosLugaresCercano->valor);

		$sqlQuery->setNumber($apartamentosLugaresCercano->idApartamentoLugarCercano);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM apartamentos_lugares_cercanos';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIdApartamento($value){
		$sql = 'SELECT * FROM apartamentos_lugares_cercanos WHERE id_apartamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdLugarCercano($value){
		$sql = 'SELECT * FROM apartamentos_lugares_cercanos WHERE id_lugar_cercano = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByValor($value){
		$sql = 'SELECT * FROM apartamentos_lugares_cercanos WHERE valor = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIdApartamento($value){
		$sql = 'DELETE FROM apartamentos_lugares_cercanos WHERE id_apartamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdLugarCercano($value){
		$sql = 'DELETE FROM apartamentos_lugares_cercanos WHERE id_lugar_cercano = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByValor($value){
		$sql = 'DELETE FROM apartamentos_lugares_cercanos WHERE valor = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ApartamentosLugaresCercanosMySql 
	 */
	protected function readRow($row){
		$apartamentosLugaresCercano = new ApartamentosLugaresCercano();
		
		$apartamentosLugaresCercano->idApartamento = $row['id_apartamento'];
		$apartamentosLugaresCercano->idLugarCercano = $row['id_lugar_cercano'];
		$apartamentosLugaresCercano->idApartamentoLugarCercano = $row['id_apartamento_lugar_cercano'];
		$apartamentosLugaresCercano->valor = $row['valor'];

		return $apartamentosLugaresCercano;
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
	 * @return ApartamentosLugaresCercanosMySql 
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
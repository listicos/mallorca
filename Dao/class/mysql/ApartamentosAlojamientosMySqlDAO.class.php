<?php
/**
 * Class that operate on table 'apartamentos_alojamientos'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-10-01 15:39
 */
class ApartamentosAlojamientosMySqlDAO implements ApartamentosAlojamientosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ApartamentosAlojamientosMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM apartamentos_alojamientos WHERE id_apartamento_alojamiento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM apartamentos_alojamientos';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM apartamentos_alojamientos ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param apartamentosAlojamiento primary key
 	 */
	public function delete($id_apartamento_alojamiento){
		$sql = 'DELETE FROM apartamentos_alojamientos WHERE id_apartamento_alojamiento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_apartamento_alojamiento);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ApartamentosAlojamientosMySql apartamentosAlojamiento
 	 */
	public function insert($apartamentosAlojamiento){
		$sql = 'INSERT INTO apartamentos_alojamientos (id_apartamento, id_alojamiento) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($apartamentosAlojamiento->idApartamento);
		$sqlQuery->setNumber($apartamentosAlojamiento->idAlojamiento);

		$id = $this->executeInsert($sqlQuery);	
		$apartamentosAlojamiento->idApartamentoAlojamiento = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ApartamentosAlojamientosMySql apartamentosAlojamiento
 	 */
	public function update($apartamentosAlojamiento){
		$sql = 'UPDATE apartamentos_alojamientos SET id_apartamento = ?, id_alojamiento = ? WHERE id_apartamento_alojamiento = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($apartamentosAlojamiento->idApartamento);
		$sqlQuery->setNumber($apartamentosAlojamiento->idAlojamiento);

		$sqlQuery->setNumber($apartamentosAlojamiento->idApartamentoAlojamiento);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM apartamentos_alojamientos';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIdApartamento($value){
		$sql = 'SELECT * FROM apartamentos_alojamientos WHERE id_apartamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdAlojamiento($value){
		$sql = 'SELECT * FROM apartamentos_alojamientos WHERE id_alojamiento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIdApartamento($value){
		$sql = 'DELETE FROM apartamentos_alojamientos WHERE id_apartamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdAlojamiento($value){
		$sql = 'DELETE FROM apartamentos_alojamientos WHERE id_alojamiento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ApartamentosAlojamientosMySql 
	 */
	protected function readRow($row){
		$apartamentosAlojamiento = new ApartamentosAlojamiento();
		
		$apartamentosAlojamiento->idApartamento = $row['id_apartamento'];
		$apartamentosAlojamiento->idAlojamiento = $row['id_alojamiento'];
		$apartamentosAlojamiento->idApartamentoAlojamiento = $row['id_apartamento_alojamiento'];

		return $apartamentosAlojamiento;
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
	 * @return ApartamentosAlojamientosMySql 
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
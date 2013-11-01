<?php
/**
 * Class that operate on table 'opiniones'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-10-18 16:11
 */
class OpinionesMySqlDAO implements OpinionesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return OpinionesMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM opiniones WHERE id_opinion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM opiniones';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM opiniones ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param opinione primary key
 	 */
	public function delete($id_opinion){
		$sql = 'DELETE FROM opiniones WHERE id_opinion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_opinion);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param OpinionesMySql opinione
 	 */
	public function insert($opinione){
		$sql = 'INSERT INTO opiniones (opinion, puntuacion, fecha_creacion, ultima_actualizacion, id_apartamento, id_usuario, id_reservacion) VALUES (?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($opinione->opinion);
		$sqlQuery->set($opinione->puntuacion);
		$sqlQuery->set($opinione->fechaCreacion);
		$sqlQuery->set($opinione->ultimaActualizacion);
		$sqlQuery->setNumber($opinione->idApartamento);
		$sqlQuery->setNumber($opinione->idUsuario);
		$sqlQuery->setNumber($opinione->idReservacion);

		$id = $this->executeInsert($sqlQuery);	
		$opinione->idOpinion = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param OpinionesMySql opinione
 	 */
	public function update($opinione){
		$sql = 'UPDATE opiniones SET opinion = ?, puntuacion = ?, fecha_creacion = ?, ultima_actualizacion = ?, id_apartamento = ?, id_usuario = ?, id_reservacion = ? WHERE id_opinion = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($opinione->opinion);
		$sqlQuery->set($opinione->puntuacion);
		$sqlQuery->set($opinione->fechaCreacion);
		$sqlQuery->set($opinione->ultimaActualizacion);
		$sqlQuery->setNumber($opinione->idApartamento);
		$sqlQuery->setNumber($opinione->idUsuario);
		$sqlQuery->setNumber($opinione->idReservacion);

		$sqlQuery->setNumber($opinione->idOpinion);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM opiniones';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByOpinion($value){
		$sql = 'SELECT * FROM opiniones WHERE opinion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPuntuacion($value){
		$sql = 'SELECT * FROM opiniones WHERE puntuacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFechaCreacion($value){
		$sql = 'SELECT * FROM opiniones WHERE fecha_creacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUltimaActualizacion($value){
		$sql = 'SELECT * FROM opiniones WHERE ultima_actualizacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdApartamento($value){
		$sql = 'SELECT * FROM opiniones WHERE id_apartamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdUsuario($value){
		$sql = 'SELECT * FROM opiniones WHERE id_usuario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdReservacion($value){
		$sql = 'SELECT * FROM opiniones WHERE id_reservacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByOpinion($value){
		$sql = 'DELETE FROM opiniones WHERE opinion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPuntuacion($value){
		$sql = 'DELETE FROM opiniones WHERE puntuacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFechaCreacion($value){
		$sql = 'DELETE FROM opiniones WHERE fecha_creacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUltimaActualizacion($value){
		$sql = 'DELETE FROM opiniones WHERE ultima_actualizacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdApartamento($value){
		$sql = 'DELETE FROM opiniones WHERE id_apartamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdUsuario($value){
		$sql = 'DELETE FROM opiniones WHERE id_usuario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdReservacion($value){
		$sql = 'DELETE FROM opiniones WHERE id_reservacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return OpinionesMySql 
	 */
	protected function readRow($row){
		$opinione = new Opinione();
		
		$opinione->idOpinion = $row['id_opinion'];
		$opinione->opinion = $row['opinion'];
		$opinione->puntuacion = $row['puntuacion'];
		$opinione->fechaCreacion = $row['fecha_creacion'];
		$opinione->ultimaActualizacion = $row['ultima_actualizacion'];
		$opinione->idApartamento = $row['id_apartamento'];
		$opinione->idUsuario = $row['id_usuario'];
		$opinione->idReservacion = $row['id_reservacion'];

		return $opinione;
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
	 * @return OpinionesMySql 
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
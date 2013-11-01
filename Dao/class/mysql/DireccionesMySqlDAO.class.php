<?php
/**
 * Class that operate on table 'direcciones'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-10-18 16:11
 */
class DireccionesMySqlDAO implements DireccionesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return DireccionesMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM direcciones WHERE id_direccion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM direcciones';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM direcciones ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param direccione primary key
 	 */
	public function delete($id_direccion){
		$sql = 'DELETE FROM direcciones WHERE id_direccion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_direccion);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param DireccionesMySql direccione
 	 */
	public function insert($direccione){
		$sql = 'INSERT INTO direcciones (calle, numero, provincia, codigo_postal, id_pais, lat, lon, id_provincia, referencia) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($direccione->calle);
		$sqlQuery->set($direccione->numero);
		$sqlQuery->set($direccione->provincia);
		$sqlQuery->set($direccione->codigoPostal);
		$sqlQuery->setNumber($direccione->idPais);
		$sqlQuery->set($direccione->lat);
		$sqlQuery->set($direccione->lon);
		$sqlQuery->setNumber($direccione->idProvincia);
		$sqlQuery->set($direccione->referencia);

		$id = $this->executeInsert($sqlQuery);	
		$direccione->idDireccion = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param DireccionesMySql direccione
 	 */
	public function update($direccione){
		$sql = 'UPDATE direcciones SET calle = ?, numero = ?, provincia = ?, codigo_postal = ?, id_pais = ?, lat = ?, lon = ?, id_provincia = ?, referencia = ? WHERE id_direccion = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($direccione->calle);
		$sqlQuery->set($direccione->numero);
		$sqlQuery->set($direccione->provincia);
		$sqlQuery->set($direccione->codigoPostal);
		$sqlQuery->setNumber($direccione->idPais);
		$sqlQuery->set($direccione->lat);
		$sqlQuery->set($direccione->lon);
		$sqlQuery->setNumber($direccione->idProvincia);
		$sqlQuery->set($direccione->referencia);

		$sqlQuery->setNumber($direccione->idDireccion);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM direcciones';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByCalle($value){
		$sql = 'SELECT * FROM direcciones WHERE calle = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNumero($value){
		$sql = 'SELECT * FROM direcciones WHERE numero = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByProvincia($value){
		$sql = 'SELECT * FROM direcciones WHERE provincia = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCodigoPostal($value){
		$sql = 'SELECT * FROM direcciones WHERE codigo_postal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdPais($value){
		$sql = 'SELECT * FROM direcciones WHERE id_pais = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLat($value){
		$sql = 'SELECT * FROM direcciones WHERE lat = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLon($value){
		$sql = 'SELECT * FROM direcciones WHERE lon = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdProvincia($value){
		$sql = 'SELECT * FROM direcciones WHERE id_provincia = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByReferencia($value){
		$sql = 'SELECT * FROM direcciones WHERE referencia = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByCalle($value){
		$sql = 'DELETE FROM direcciones WHERE calle = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNumero($value){
		$sql = 'DELETE FROM direcciones WHERE numero = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByProvincia($value){
		$sql = 'DELETE FROM direcciones WHERE provincia = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCodigoPostal($value){
		$sql = 'DELETE FROM direcciones WHERE codigo_postal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdPais($value){
		$sql = 'DELETE FROM direcciones WHERE id_pais = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLat($value){
		$sql = 'DELETE FROM direcciones WHERE lat = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLon($value){
		$sql = 'DELETE FROM direcciones WHERE lon = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdProvincia($value){
		$sql = 'DELETE FROM direcciones WHERE id_provincia = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByReferencia($value){
		$sql = 'DELETE FROM direcciones WHERE referencia = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return DireccionesMySql 
	 */
	protected function readRow($row){
		$direccione = new Direccione();
		
		$direccione->idDireccion = $row['id_direccion'];
		$direccione->calle = $row['calle'];
		$direccione->numero = $row['numero'];
		$direccione->provincia = $row['provincia'];
		$direccione->codigoPostal = $row['codigo_postal'];
		$direccione->idPais = $row['id_pais'];
		$direccione->lat = $row['lat'];
		$direccione->lon = $row['lon'];
		$direccione->idProvincia = $row['id_provincia'];
		$direccione->referencia = $row['referencia'];

		return $direccione;
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
	 * @return DireccionesMySql 
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
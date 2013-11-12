<?php
/**
 * Class that operate on table 'configuracion'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-11-12 21:04
 */
class ConfiguracionMySqlDAO implements ConfiguracionDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ConfiguracionMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM configuracion WHERE id_configuracion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM configuracion';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM configuracion ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param configuracion primary key
 	 */
	public function delete($id_configuracion){
		$sql = 'DELETE FROM configuracion WHERE id_configuracion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_configuracion);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ConfiguracionMySql configuracion
 	 */
	public function insert($configuracion){
		$sql = 'INSERT INTO configuracion (email, username, password, servidor, puerto, id_direccion) VALUES (?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($configuracion->email);
		$sqlQuery->set($configuracion->username);
		$sqlQuery->set($configuracion->password);
		$sqlQuery->set($configuracion->servidor);
		$sqlQuery->setNumber($configuracion->puerto);
		$sqlQuery->setNumber($configuracion->idDireccion);

		$id = $this->executeInsert($sqlQuery);	
		$configuracion->idConfiguracion = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ConfiguracionMySql configuracion
 	 */
	public function update($configuracion){
		$sql = 'UPDATE configuracion SET email = ?, username = ?, password = ?, servidor = ?, puerto = ?, id_direccion = ? WHERE id_configuracion = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($configuracion->email);
		$sqlQuery->set($configuracion->username);
		$sqlQuery->set($configuracion->password);
		$sqlQuery->set($configuracion->servidor);
		$sqlQuery->setNumber($configuracion->puerto);
		$sqlQuery->setNumber($configuracion->idDireccion);

		$sqlQuery->setNumber($configuracion->idConfiguracion);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM configuracion';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByEmail($value){
		$sql = 'SELECT * FROM configuracion WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUsername($value){
		$sql = 'SELECT * FROM configuracion WHERE username = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPassword($value){
		$sql = 'SELECT * FROM configuracion WHERE password = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByServidor($value){
		$sql = 'SELECT * FROM configuracion WHERE servidor = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPuerto($value){
		$sql = 'SELECT * FROM configuracion WHERE puerto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdDireccion($value){
		$sql = 'SELECT * FROM configuracion WHERE id_direccion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByEmail($value){
		$sql = 'DELETE FROM configuracion WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUsername($value){
		$sql = 'DELETE FROM configuracion WHERE username = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPassword($value){
		$sql = 'DELETE FROM configuracion WHERE password = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByServidor($value){
		$sql = 'DELETE FROM configuracion WHERE servidor = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPuerto($value){
		$sql = 'DELETE FROM configuracion WHERE puerto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdDireccion($value){
		$sql = 'DELETE FROM configuracion WHERE id_direccion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ConfiguracionMySql 
	 */
	protected function readRow($row){
		$configuracion = new Configuracion();
		
		$configuracion->idConfiguracion = $row['id_configuracion'];
		$configuracion->email = $row['email'];
		$configuracion->username = $row['username'];
		$configuracion->password = $row['password'];
		$configuracion->servidor = $row['servidor'];
		$configuracion->puerto = $row['puerto'];
		$configuracion->idDireccion = $row['id_direccion'];

		return $configuracion;
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
	 * @return ConfiguracionMySql 
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
<?php
/**
 * Class that operate on table 'configuracion'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-12-27 22:08
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
		$sql = 'INSERT INTO configuracion (email, username, password, servidor, puerto, id_direccion, nombre_empresa, empresa_cif, telefonos_contacto, email_contacto, facebook, twitter, vimeo, rss) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($configuracion->email);
		$sqlQuery->set($configuracion->username);
		$sqlQuery->set($configuracion->password);
		$sqlQuery->set($configuracion->servidor);
		$sqlQuery->setNumber($configuracion->puerto);
		$sqlQuery->setNumber($configuracion->idDireccion);
		$sqlQuery->set($configuracion->nombreEmpresa);
		$sqlQuery->set($configuracion->empresaCif);
		$sqlQuery->set($configuracion->telefonosContacto);
		$sqlQuery->set($configuracion->emailContacto);
		$sqlQuery->set($configuracion->facebook);
		$sqlQuery->set($configuracion->twitter);
		$sqlQuery->set($configuracion->vimeo);
		$sqlQuery->set($configuracion->rss);

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
		$sql = 'UPDATE configuracion SET email = ?, username = ?, password = ?, servidor = ?, puerto = ?, id_direccion = ?, nombre_empresa = ?, empresa_cif = ?, telefonos_contacto = ?, email_contacto = ?, facebook = ?, twitter = ?, vimeo = ?, rss = ? WHERE id_configuracion = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($configuracion->email);
		$sqlQuery->set($configuracion->username);
		$sqlQuery->set($configuracion->password);
		$sqlQuery->set($configuracion->servidor);
		$sqlQuery->setNumber($configuracion->puerto);
		$sqlQuery->setNumber($configuracion->idDireccion);
		$sqlQuery->set($configuracion->nombreEmpresa);
		$sqlQuery->set($configuracion->empresaCif);
		$sqlQuery->set($configuracion->telefonosContacto);
		$sqlQuery->set($configuracion->emailContacto);
		$sqlQuery->set($configuracion->facebook);
		$sqlQuery->set($configuracion->twitter);
		$sqlQuery->set($configuracion->vimeo);
		$sqlQuery->set($configuracion->rss);

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

	public function queryByNombreEmpresa($value){
		$sql = 'SELECT * FROM configuracion WHERE nombre_empresa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEmpresaCif($value){
		$sql = 'SELECT * FROM configuracion WHERE empresa_cif = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTelefonosContacto($value){
		$sql = 'SELECT * FROM configuracion WHERE telefonos_contacto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEmailContacto($value){
		$sql = 'SELECT * FROM configuracion WHERE email_contacto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFacebook($value){
		$sql = 'SELECT * FROM configuracion WHERE facebook = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTwitter($value){
		$sql = 'SELECT * FROM configuracion WHERE twitter = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByVimeo($value){
		$sql = 'SELECT * FROM configuracion WHERE vimeo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRss($value){
		$sql = 'SELECT * FROM configuracion WHERE rss = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
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

	public function deleteByNombreEmpresa($value){
		$sql = 'DELETE FROM configuracion WHERE nombre_empresa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEmpresaCif($value){
		$sql = 'DELETE FROM configuracion WHERE empresa_cif = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTelefonosContacto($value){
		$sql = 'DELETE FROM configuracion WHERE telefonos_contacto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEmailContacto($value){
		$sql = 'DELETE FROM configuracion WHERE email_contacto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFacebook($value){
		$sql = 'DELETE FROM configuracion WHERE facebook = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTwitter($value){
		$sql = 'DELETE FROM configuracion WHERE twitter = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByVimeo($value){
		$sql = 'DELETE FROM configuracion WHERE vimeo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRss($value){
		$sql = 'DELETE FROM configuracion WHERE rss = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
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
		$configuracion->nombreEmpresa = $row['nombre_empresa'];
		$configuracion->empresaCif = $row['empresa_cif'];
		$configuracion->telefonosContacto = $row['telefonos_contacto'];
		$configuracion->emailContacto = $row['email_contacto'];
		$configuracion->facebook = $row['facebook'];
		$configuracion->twitter = $row['twitter'];
		$configuracion->vimeo = $row['vimeo'];
		$configuracion->rss = $row['rss'];

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
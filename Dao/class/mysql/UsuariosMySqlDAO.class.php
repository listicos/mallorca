<?php
/**
 * Class that operate on table 'usuarios'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-10-01 15:39
 */
class UsuariosMySqlDAO implements UsuariosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return UsuariosMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM usuarios WHERE id_usuario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM usuarios';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM usuarios ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param usuario primary key
 	 */
	public function delete($id_usuario){
		$sql = 'DELETE FROM usuarios WHERE id_usuario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_usuario);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param UsuariosMySql usuario
 	 */
	public function insert($usuario){
		$sql = 'INSERT INTO usuarios (nombre, email, password, tiempo_creacion, ultima_modificacion, id_usuario_grupo, estatus, telefono, apellido_materno, apellido_paterno, facebook_id, facebook_username, telefono_alterno, id_cuenta, documento, id_direccion) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($usuario->nombre);
		$sqlQuery->set($usuario->email);
		$sqlQuery->set($usuario->password);
		$sqlQuery->set($usuario->tiempoCreacion);
		$sqlQuery->set($usuario->ultimaModificacion);
		$sqlQuery->setNumber($usuario->idUsuarioGrupo);
		$sqlQuery->set($usuario->estatus);
		$sqlQuery->set($usuario->telefono);
		$sqlQuery->set($usuario->apellidoMaterno);
		$sqlQuery->set($usuario->apellidoPaterno);
		$sqlQuery->set($usuario->facebookId);
		$sqlQuery->set($usuario->facebookUsername);
		$sqlQuery->set($usuario->telefonoAlterno);
		$sqlQuery->setNumber($usuario->idCuenta);
		$sqlQuery->set($usuario->documento);
		$sqlQuery->setNumber($usuario->idDireccion);

		$id = $this->executeInsert($sqlQuery);	
		$usuario->idUsuario = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param UsuariosMySql usuario
 	 */
	public function update($usuario){
		$sql = 'UPDATE usuarios SET nombre = ?, email = ?, password = ?, tiempo_creacion = ?, ultima_modificacion = ?, id_usuario_grupo = ?, estatus = ?, telefono = ?, apellido_materno = ?, apellido_paterno = ?, facebook_id = ?, facebook_username = ?, telefono_alterno = ?, id_cuenta = ?, documento = ?, id_direccion = ? WHERE id_usuario = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($usuario->nombre);
		$sqlQuery->set($usuario->email);
		$sqlQuery->set($usuario->password);
		$sqlQuery->set($usuario->tiempoCreacion);
		$sqlQuery->set($usuario->ultimaModificacion);
		$sqlQuery->setNumber($usuario->idUsuarioGrupo);
		$sqlQuery->set($usuario->estatus);
		$sqlQuery->set($usuario->telefono);
		$sqlQuery->set($usuario->apellidoMaterno);
		$sqlQuery->set($usuario->apellidoPaterno);
		$sqlQuery->set($usuario->facebookId);
		$sqlQuery->set($usuario->facebookUsername);
		$sqlQuery->set($usuario->telefonoAlterno);
		$sqlQuery->setNumber($usuario->idCuenta);
		$sqlQuery->set($usuario->documento);
		$sqlQuery->setNumber($usuario->idDireccion);

		$sqlQuery->setNumber($usuario->idUsuario);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM usuarios';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNombre($value){
		$sql = 'SELECT * FROM usuarios WHERE nombre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEmail($value){
		$sql = 'SELECT * FROM usuarios WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPassword($value){
		$sql = 'SELECT * FROM usuarios WHERE password = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTiempoCreacion($value){
		$sql = 'SELECT * FROM usuarios WHERE tiempo_creacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUltimaModificacion($value){
		$sql = 'SELECT * FROM usuarios WHERE ultima_modificacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdUsuarioGrupo($value){
		$sql = 'SELECT * FROM usuarios WHERE id_usuario_grupo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEstatus($value){
		$sql = 'SELECT * FROM usuarios WHERE estatus = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTelefono($value){
		$sql = 'SELECT * FROM usuarios WHERE telefono = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByApellidoMaterno($value){
		$sql = 'SELECT * FROM usuarios WHERE apellido_materno = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByApellidoPaterno($value){
		$sql = 'SELECT * FROM usuarios WHERE apellido_paterno = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFacebookId($value){
		$sql = 'SELECT * FROM usuarios WHERE facebook_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFacebookUsername($value){
		$sql = 'SELECT * FROM usuarios WHERE facebook_username = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTelefonoAlterno($value){
		$sql = 'SELECT * FROM usuarios WHERE telefono_alterno = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdCuenta($value){
		$sql = 'SELECT * FROM usuarios WHERE id_cuenta = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDocumento($value){
		$sql = 'SELECT * FROM usuarios WHERE documento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdDireccion($value){
		$sql = 'SELECT * FROM usuarios WHERE id_direccion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNombre($value){
		$sql = 'DELETE FROM usuarios WHERE nombre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEmail($value){
		$sql = 'DELETE FROM usuarios WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPassword($value){
		$sql = 'DELETE FROM usuarios WHERE password = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTiempoCreacion($value){
		$sql = 'DELETE FROM usuarios WHERE tiempo_creacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUltimaModificacion($value){
		$sql = 'DELETE FROM usuarios WHERE ultima_modificacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdUsuarioGrupo($value){
		$sql = 'DELETE FROM usuarios WHERE id_usuario_grupo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEstatus($value){
		$sql = 'DELETE FROM usuarios WHERE estatus = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTelefono($value){
		$sql = 'DELETE FROM usuarios WHERE telefono = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByApellidoMaterno($value){
		$sql = 'DELETE FROM usuarios WHERE apellido_materno = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByApellidoPaterno($value){
		$sql = 'DELETE FROM usuarios WHERE apellido_paterno = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFacebookId($value){
		$sql = 'DELETE FROM usuarios WHERE facebook_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFacebookUsername($value){
		$sql = 'DELETE FROM usuarios WHERE facebook_username = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTelefonoAlterno($value){
		$sql = 'DELETE FROM usuarios WHERE telefono_alterno = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdCuenta($value){
		$sql = 'DELETE FROM usuarios WHERE id_cuenta = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDocumento($value){
		$sql = 'DELETE FROM usuarios WHERE documento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdDireccion($value){
		$sql = 'DELETE FROM usuarios WHERE id_direccion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return UsuariosMySql 
	 */
	protected function readRow($row){
		$usuario = new Usuario();
		
		$usuario->idUsuario = $row['id_usuario'];
		$usuario->nombre = $row['nombre'];
		$usuario->email = $row['email'];
		$usuario->password = $row['password'];
		$usuario->tiempoCreacion = $row['tiempo_creacion'];
		$usuario->ultimaModificacion = $row['ultima_modificacion'];
		$usuario->idUsuarioGrupo = $row['id_usuario_grupo'];
		$usuario->estatus = $row['estatus'];
		$usuario->telefono = $row['telefono'];
		$usuario->apellidoMaterno = $row['apellido_materno'];
		$usuario->apellidoPaterno = $row['apellido_paterno'];
		$usuario->facebookId = $row['facebook_id'];
		$usuario->facebookUsername = $row['facebook_username'];
		$usuario->telefonoAlterno = $row['telefono_alterno'];
		$usuario->idCuenta = $row['id_cuenta'];
		$usuario->documento = $row['documento'];
		$usuario->idDireccion = $row['id_direccion'];

		return $usuario;
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
	 * @return UsuariosMySql 
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
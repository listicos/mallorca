<?php
/**
 * Class that operate on table 'usuarios_registros'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-10-01 15:39
 */
class UsuariosRegistrosMySqlDAO implements UsuariosRegistrosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return UsuariosRegistrosMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM usuarios_registros WHERE id_usuario_registro = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM usuarios_registros';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM usuarios_registros ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param usuariosRegistro primary key
 	 */
	public function delete($id_usuario_registro){
		$sql = 'DELETE FROM usuarios_registros WHERE id_usuario_registro = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_usuario_registro);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param UsuariosRegistrosMySql usuariosRegistro
 	 */
	public function insert($usuariosRegistro){
		$sql = 'INSERT INTO usuarios_registros (id_usuario, tiempo_creacion, tipo, movimiento) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($usuariosRegistro->idUsuario);
		$sqlQuery->set($usuariosRegistro->tiempoCreacion);
		$sqlQuery->set($usuariosRegistro->tipo);
		$sqlQuery->set($usuariosRegistro->movimiento);

		$id = $this->executeInsert($sqlQuery);	
		$usuariosRegistro->idUsuarioRegistro = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param UsuariosRegistrosMySql usuariosRegistro
 	 */
	public function update($usuariosRegistro){
		$sql = 'UPDATE usuarios_registros SET id_usuario = ?, tiempo_creacion = ?, tipo = ?, movimiento = ? WHERE id_usuario_registro = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($usuariosRegistro->idUsuario);
		$sqlQuery->set($usuariosRegistro->tiempoCreacion);
		$sqlQuery->set($usuariosRegistro->tipo);
		$sqlQuery->set($usuariosRegistro->movimiento);

		$sqlQuery->setNumber($usuariosRegistro->idUsuarioRegistro);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM usuarios_registros';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIdUsuario($value){
		$sql = 'SELECT * FROM usuarios_registros WHERE id_usuario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTiempoCreacion($value){
		$sql = 'SELECT * FROM usuarios_registros WHERE tiempo_creacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTipo($value){
		$sql = 'SELECT * FROM usuarios_registros WHERE tipo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMovimiento($value){
		$sql = 'SELECT * FROM usuarios_registros WHERE movimiento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIdUsuario($value){
		$sql = 'DELETE FROM usuarios_registros WHERE id_usuario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTiempoCreacion($value){
		$sql = 'DELETE FROM usuarios_registros WHERE tiempo_creacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTipo($value){
		$sql = 'DELETE FROM usuarios_registros WHERE tipo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMovimiento($value){
		$sql = 'DELETE FROM usuarios_registros WHERE movimiento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return UsuariosRegistrosMySql 
	 */
	protected function readRow($row){
		$usuariosRegistro = new UsuariosRegistro();
		
		$usuariosRegistro->idUsuarioRegistro = $row['id_usuario_registro'];
		$usuariosRegistro->idUsuario = $row['id_usuario'];
		$usuariosRegistro->tiempoCreacion = $row['tiempo_creacion'];
		$usuariosRegistro->tipo = $row['tipo'];
		$usuariosRegistro->movimiento = $row['movimiento'];

		return $usuariosRegistro;
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
	 * @return UsuariosRegistrosMySql 
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
<?php
/**
 * Class that operate on table 'usuarios_grupos'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-10-18 16:11
 */
class UsuariosGruposMySqlDAO implements UsuariosGruposDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return UsuariosGruposMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM usuarios_grupos WHERE id_usuario_grupo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM usuarios_grupos';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM usuarios_grupos ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param usuariosGrupo primary key
 	 */
	public function delete($id_usuario_grupo){
		$sql = 'DELETE FROM usuarios_grupos WHERE id_usuario_grupo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_usuario_grupo);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param UsuariosGruposMySql usuariosGrupo
 	 */
	public function insert($usuariosGrupo){
		$sql = 'INSERT INTO usuarios_grupos (nombre) VALUES (?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($usuariosGrupo->nombre);

		$id = $this->executeInsert($sqlQuery);	
		$usuariosGrupo->idUsuarioGrupo = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param UsuariosGruposMySql usuariosGrupo
 	 */
	public function update($usuariosGrupo){
		$sql = 'UPDATE usuarios_grupos SET nombre = ? WHERE id_usuario_grupo = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($usuariosGrupo->nombre);

		$sqlQuery->setNumber($usuariosGrupo->idUsuarioGrupo);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM usuarios_grupos';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNombre($value){
		$sql = 'SELECT * FROM usuarios_grupos WHERE nombre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNombre($value){
		$sql = 'DELETE FROM usuarios_grupos WHERE nombre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return UsuariosGruposMySql 
	 */
	protected function readRow($row){
		$usuariosGrupo = new UsuariosGrupo();
		
		$usuariosGrupo->idUsuarioGrupo = $row['id_usuario_grupo'];
		$usuariosGrupo->nombre = $row['nombre'];

		return $usuariosGrupo;
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
	 * @return UsuariosGruposMySql 
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
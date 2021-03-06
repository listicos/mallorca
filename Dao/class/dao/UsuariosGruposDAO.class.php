<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-10-18 16:11
 */
interface UsuariosGruposDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return UsuariosGrupos 
	 */
	public function load($id);

	/**
	 * Get all records from table
	 */
	public function queryAll();
	
	/**
	 * Get all records from table ordered by field
	 * @Param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn);
	
	/**
 	 * Delete record from table
 	 * @param usuariosGrupo primary key
 	 */
	public function delete($id_usuario_grupo);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param UsuariosGrupos usuariosGrupo
 	 */
	public function insert($usuariosGrupo);
	
	/**
 	 * Update record in table
 	 *
 	 * @param UsuariosGrupos usuariosGrupo
 	 */
	public function update($usuariosGrupo);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNombre($value);


	public function deleteByNombre($value);


}
?>
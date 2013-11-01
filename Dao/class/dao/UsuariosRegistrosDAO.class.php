<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-10-18 16:11
 */
interface UsuariosRegistrosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return UsuariosRegistros 
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
 	 * @param usuariosRegistro primary key
 	 */
	public function delete($id_usuario_registro);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param UsuariosRegistros usuariosRegistro
 	 */
	public function insert($usuariosRegistro);
	
	/**
 	 * Update record in table
 	 *
 	 * @param UsuariosRegistros usuariosRegistro
 	 */
	public function update($usuariosRegistro);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdUsuario($value);

	public function queryByTiempoCreacion($value);

	public function queryByTipo($value);

	public function queryByMovimiento($value);


	public function deleteByIdUsuario($value);

	public function deleteByTiempoCreacion($value);

	public function deleteByTipo($value);

	public function deleteByMovimiento($value);


}
?>
<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-10-01 15:39
 */
interface UsuariosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Usuarios 
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
 	 * @param usuario primary key
 	 */
	public function delete($id_usuario);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Usuarios usuario
 	 */
	public function insert($usuario);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Usuarios usuario
 	 */
	public function update($usuario);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNombre($value);

	public function queryByEmail($value);

	public function queryByPassword($value);

	public function queryByTiempoCreacion($value);

	public function queryByUltimaModificacion($value);

	public function queryByIdUsuarioGrupo($value);

	public function queryByEstatus($value);

	public function queryByTelefono($value);

	public function queryByApellidoMaterno($value);

	public function queryByApellidoPaterno($value);

	public function queryByFacebookId($value);

	public function queryByFacebookUsername($value);

	public function queryByTelefonoAlterno($value);

	public function queryByIdCuenta($value);

	public function queryByDocumento($value);

	public function queryByIdDireccion($value);


	public function deleteByNombre($value);

	public function deleteByEmail($value);

	public function deleteByPassword($value);

	public function deleteByTiempoCreacion($value);

	public function deleteByUltimaModificacion($value);

	public function deleteByIdUsuarioGrupo($value);

	public function deleteByEstatus($value);

	public function deleteByTelefono($value);

	public function deleteByApellidoMaterno($value);

	public function deleteByApellidoPaterno($value);

	public function deleteByFacebookId($value);

	public function deleteByFacebookUsername($value);

	public function deleteByTelefonoAlterno($value);

	public function deleteByIdCuenta($value);

	public function deleteByDocumento($value);

	public function deleteByIdDireccion($value);


}
?>
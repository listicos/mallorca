<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-12-27 22:08
 */
interface ConfiguracionDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Configuracion 
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
 	 * @param configuracion primary key
 	 */
	public function delete($id_configuracion);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Configuracion configuracion
 	 */
	public function insert($configuracion);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Configuracion configuracion
 	 */
	public function update($configuracion);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByEmail($value);

	public function queryByUsername($value);

	public function queryByPassword($value);

	public function queryByServidor($value);

	public function queryByPuerto($value);

	public function queryByIdDireccion($value);

	public function queryByNombreEmpresa($value);

	public function queryByEmpresaCif($value);

	public function queryByTelefonosContacto($value);

	public function queryByEmailContacto($value);

	public function queryByFacebook($value);

	public function queryByTwitter($value);

	public function queryByVimeo($value);

	public function queryByRss($value);


	public function deleteByEmail($value);

	public function deleteByUsername($value);

	public function deleteByPassword($value);

	public function deleteByServidor($value);

	public function deleteByPuerto($value);

	public function deleteByIdDireccion($value);

	public function deleteByNombreEmpresa($value);

	public function deleteByEmpresaCif($value);

	public function deleteByTelefonosContacto($value);

	public function deleteByEmailContacto($value);

	public function deleteByFacebook($value);

	public function deleteByTwitter($value);

	public function deleteByVimeo($value);

	public function deleteByRss($value);


}
?>
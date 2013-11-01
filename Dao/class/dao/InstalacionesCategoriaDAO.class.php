<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-10-18 16:11
 */
interface InstalacionesCategoriaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return InstalacionesCategoria 
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
 	 * @param instalacionesCategoria primary key
 	 */
	public function delete($id_instalacion_categoria);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param InstalacionesCategoria instalacionesCategoria
 	 */
	public function insert($instalacionesCategoria);
	
	/**
 	 * Update record in table
 	 *
 	 * @param InstalacionesCategoria instalacionesCategoria
 	 */
	public function update($instalacionesCategoria);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNombre($value);


	public function deleteByNombre($value);


}
?>
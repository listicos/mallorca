<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-10-18 16:11
 */
interface InstalacionesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Instalaciones 
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
 	 * @param instalacione primary key
 	 */
	public function delete($id_instalacion);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Instalaciones instalacione
 	 */
	public function insert($instalacione);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Instalaciones instalacione
 	 */
	public function update($instalacione);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNombre($value);

	public function queryByIdInstalacionCategoria($value);


	public function deleteByNombre($value);

	public function deleteByIdInstalacionCategoria($value);


}
?>
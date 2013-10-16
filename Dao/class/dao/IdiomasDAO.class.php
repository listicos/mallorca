<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-10-01 15:39
 */
interface IdiomasDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Idiomas 
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
 	 * @param idioma primary key
 	 */
	public function delete($id_idioma);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Idiomas idioma
 	 */
	public function insert($idioma);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Idiomas idioma
 	 */
	public function update($idioma);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNombre($value);


	public function deleteByNombre($value);


}
?>
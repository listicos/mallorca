<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-12-15 22:06
 */
interface ComplejosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Complejos 
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
 	 * @param complejo primary key
 	 */
	public function delete($id_complejo);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Complejos complejo
 	 */
	public function insert($complejo);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Complejos complejo
 	 */
	public function update($complejo);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNombre($value);

	public function queryByDescripcion($value);


	public function deleteByNombre($value);

	public function deleteByDescripcion($value);


}
?>
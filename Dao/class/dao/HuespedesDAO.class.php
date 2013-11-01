<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-10-18 16:11
 */
interface HuespedesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Huespedes 
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
 	 * @param huespede primary key
 	 */
	public function delete($id_huesped);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Huespedes huespede
 	 */
	public function insert($huespede);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Huespedes huespede
 	 */
	public function update($huespede);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdUsuario($value);

	public function queryByIdDireccion($value);


	public function deleteByIdUsuario($value);

	public function deleteByIdDireccion($value);


}
?>
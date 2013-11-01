<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-10-18 16:11
 */
interface ProvinciasDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Provincias 
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
 	 * @param provincia primary key
 	 */
	public function delete($id_provincia);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Provincias provincia
 	 */
	public function insert($provincia);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Provincias provincia
 	 */
	public function update($provincia);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNombre($value);

	public function queryByCodigo($value);

	public function queryByIdPais($value);


	public function deleteByNombre($value);

	public function deleteByCodigo($value);

	public function deleteByIdPais($value);


}
?>
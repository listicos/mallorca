<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-10-18 16:11
 */
interface CiudadesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Ciudades 
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
 	 * @param ciudade primary key
 	 */
	public function delete($id_ciudad);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Ciudades ciudade
 	 */
	public function insert($ciudade);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Ciudades ciudade
 	 */
	public function update($ciudade);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNombre($value);

	public function queryByIdProvincia($value);

	public function queryByCodigo($value);


	public function deleteByNombre($value);

	public function deleteByIdProvincia($value);

	public function deleteByCodigo($value);


}
?>
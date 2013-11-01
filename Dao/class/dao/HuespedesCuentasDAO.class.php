<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-10-18 16:11
 */
interface HuespedesCuentasDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return HuespedesCuentas 
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
 	 * @param huespedesCuenta primary key
 	 */
	public function delete($id_huesped_cuenta);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param HuespedesCuentas huespedesCuenta
 	 */
	public function insert($huespedesCuenta);
	
	/**
 	 * Update record in table
 	 *
 	 * @param HuespedesCuentas huespedesCuenta
 	 */
	public function update($huespedesCuenta);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdHuesped($value);

	public function queryByIdCuenta($value);


	public function deleteByIdHuesped($value);

	public function deleteByIdCuenta($value);


}
?>
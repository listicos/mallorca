<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-10-18 16:11
 */
interface EmpresasCuentasDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return EmpresasCuentas 
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
 	 * @param empresasCuenta primary key
 	 */
	public function delete($id_empresa_cuenta);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param EmpresasCuentas empresasCuenta
 	 */
	public function insert($empresasCuenta);
	
	/**
 	 * Update record in table
 	 *
 	 * @param EmpresasCuentas empresasCuenta
 	 */
	public function update($empresasCuenta);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdEmpresa($value);

	public function queryByIdCuenta($value);


	public function deleteByIdEmpresa($value);

	public function deleteByIdCuenta($value);


}
?>
<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-10-18 16:11
 */
interface PagosTiposDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return PagosTipos 
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
 	 * @param pagosTipo primary key
 	 */
	public function delete($id_pago_tipo);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PagosTipos pagosTipo
 	 */
	public function insert($pagosTipo);
	
	/**
 	 * Update record in table
 	 *
 	 * @param PagosTipos pagosTipo
 	 */
	public function update($pagosTipo);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNombre($value);


	public function deleteByNombre($value);


}
?>
<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-10-01 15:39
 */
interface CondicionesCompraDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return CondicionesCompra 
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
 	 * @param condicionesCompra primary key
 	 */
	public function delete($id_condicion_compra);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CondicionesCompra condicionesCompra
 	 */
	public function insert($condicionesCompra);
	
	/**
 	 * Update record in table
 	 *
 	 * @param CondicionesCompra condicionesCompra
 	 */
	public function update($condicionesCompra);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdApartamento($value);

	public function queryByNombre($value);

	public function queryByDescripcion($value);


	public function deleteByIdApartamento($value);

	public function deleteByNombre($value);

	public function deleteByDescripcion($value);


}
?>
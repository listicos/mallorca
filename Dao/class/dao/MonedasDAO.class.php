<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-10-18 16:11
 */
interface MonedasDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Monedas 
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
 	 * @param moneda primary key
 	 */
	public function delete($id_moneda);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Monedas moneda
 	 */
	public function insert($moneda);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Monedas moneda
 	 */
	public function update($moneda);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNombre($value);

	public function queryBySimbolo($value);

	public function queryByCodigo($value);

	public function queryByTasaCambio($value);


	public function deleteByNombre($value);

	public function deleteBySimbolo($value);

	public function deleteByCodigo($value);

	public function deleteByTasaCambio($value);


}
?>
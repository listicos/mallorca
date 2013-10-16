<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-10-01 15:39
 */
interface ComplejosApartamentosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return ComplejosApartamentos 
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
 	 * @param complejosApartamento primary key
 	 */
	public function delete($id_complejo_apartamento);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ComplejosApartamentos complejosApartamento
 	 */
	public function insert($complejosApartamento);
	
	/**
 	 * Update record in table
 	 *
 	 * @param ComplejosApartamentos complejosApartamento
 	 */
	public function update($complejosApartamento);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdComplejo($value);

	public function queryByIdApartamento($value);


	public function deleteByIdComplejo($value);

	public function deleteByIdApartamento($value);


}
?>
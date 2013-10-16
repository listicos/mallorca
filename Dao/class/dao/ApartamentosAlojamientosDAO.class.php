<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-10-01 15:39
 */
interface ApartamentosAlojamientosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return ApartamentosAlojamientos 
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
 	 * @param apartamentosAlojamiento primary key
 	 */
	public function delete($id_apartamento_alojamiento);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ApartamentosAlojamientos apartamentosAlojamiento
 	 */
	public function insert($apartamentosAlojamiento);
	
	/**
 	 * Update record in table
 	 *
 	 * @param ApartamentosAlojamientos apartamentosAlojamiento
 	 */
	public function update($apartamentosAlojamiento);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdApartamento($value);

	public function queryByIdAlojamiento($value);


	public function deleteByIdApartamento($value);

	public function deleteByIdAlojamiento($value);


}
?>
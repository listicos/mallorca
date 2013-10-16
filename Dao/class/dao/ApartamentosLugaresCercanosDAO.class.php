<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-10-01 15:39
 */
interface ApartamentosLugaresCercanosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return ApartamentosLugaresCercanos 
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
 	 * @param apartamentosLugaresCercano primary key
 	 */
	public function delete($id_apartamento_lugar_cercano);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ApartamentosLugaresCercanos apartamentosLugaresCercano
 	 */
	public function insert($apartamentosLugaresCercano);
	
	/**
 	 * Update record in table
 	 *
 	 * @param ApartamentosLugaresCercanos apartamentosLugaresCercano
 	 */
	public function update($apartamentosLugaresCercano);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdApartamento($value);

	public function queryByIdLugarCercano($value);

	public function queryByValor($value);


	public function deleteByIdApartamento($value);

	public function deleteByIdLugarCercano($value);

	public function deleteByValor($value);


}
?>
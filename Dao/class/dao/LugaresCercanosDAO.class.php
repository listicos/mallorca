<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-10-01 15:39
 */
interface LugaresCercanosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return LugaresCercanos 
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
 	 * @param lugaresCercano primary key
 	 */
	public function delete($id_lugar_cercano);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param LugaresCercanos lugaresCercano
 	 */
	public function insert($lugaresCercano);
	
	/**
 	 * Update record in table
 	 *
 	 * @param LugaresCercanos lugaresCercano
 	 */
	public function update($lugaresCercano);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNombre($value);

	public function queryByMedida($value);

	public function queryByTipo($value);


	public function deleteByNombre($value);

	public function deleteByMedida($value);

	public function deleteByTipo($value);


}
?>
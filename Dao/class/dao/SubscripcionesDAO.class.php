<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-10-01 15:39
 */
interface SubscripcionesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Subscripciones 
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
 	 * @param subscripcione primary key
 	 */
	public function delete($id_subscripcion);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Subscripciones subscripcione
 	 */
	public function insert($subscripcione);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Subscripciones subscripcione
 	 */
	public function update($subscripcione);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByEmail($value);

	public function queryByEstatus($value);

	public function queryByTiempoCreacion($value);

	public function queryByUltimaModificacion($value);


	public function deleteByEmail($value);

	public function deleteByEstatus($value);

	public function deleteByTiempoCreacion($value);

	public function deleteByUltimaModificacion($value);


}
?>
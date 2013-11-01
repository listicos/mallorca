<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-10-18 16:11
 */
interface OpinionesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Opiniones 
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
 	 * @param opinione primary key
 	 */
	public function delete($id_opinion);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Opiniones opinione
 	 */
	public function insert($opinione);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Opiniones opinione
 	 */
	public function update($opinione);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByOpinion($value);

	public function queryByPuntuacion($value);

	public function queryByFechaCreacion($value);

	public function queryByUltimaActualizacion($value);

	public function queryByIdApartamento($value);

	public function queryByIdUsuario($value);

	public function queryByIdReservacion($value);


	public function deleteByOpinion($value);

	public function deleteByPuntuacion($value);

	public function deleteByFechaCreacion($value);

	public function deleteByUltimaActualizacion($value);

	public function deleteByIdApartamento($value);

	public function deleteByIdUsuario($value);

	public function deleteByIdReservacion($value);


}
?>
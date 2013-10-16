<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-10-01 15:39
 */
interface ApartamentosAdjuntosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return ApartamentosAdjuntos 
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
 	 * @param apartamentosAdjunto primary key
 	 */
	public function delete($id_apartamento_adjunto);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ApartamentosAdjuntos apartamentosAdjunto
 	 */
	public function insert($apartamentosAdjunto);
	
	/**
 	 * Update record in table
 	 *
 	 * @param ApartamentosAdjuntos apartamentosAdjunto
 	 */
	public function update($apartamentosAdjunto);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdApartamento($value);

	public function queryByIdAdjunto($value);


	public function deleteByIdApartamento($value);

	public function deleteByIdAdjunto($value);


}
?>
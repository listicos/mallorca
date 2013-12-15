<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-12-15 21:34
 */
interface ComplejosAdjuntosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return ComplejosAdjuntos 
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
 	 * @param complejosAdjunto primary key
 	 */
	public function delete($id_complejo_adjunto);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ComplejosAdjuntos complejosAdjunto
 	 */
	public function insert($complejosAdjunto);
	
	/**
 	 * Update record in table
 	 *
 	 * @param ComplejosAdjuntos complejosAdjunto
 	 */
	public function update($complejosAdjunto);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdComplejo($value);

	public function queryByIdAdjunto($value);


	public function deleteByIdComplejo($value);

	public function deleteByIdAdjunto($value);


}
?>
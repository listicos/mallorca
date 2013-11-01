<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-10-18 16:11
 */
interface AdjuntosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Adjuntos 
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
 	 * @param adjunto primary key
 	 */
	public function delete($id_adjunto);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Adjuntos adjunto
 	 */
	public function insert($adjunto);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Adjuntos adjunto
 	 */
	public function update($adjunto);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNombre($value);

	public function queryByRuta($value);

	public function queryByTipo($value);

	public function queryByExt($value);


	public function deleteByNombre($value);

	public function deleteByRuta($value);

	public function deleteByTipo($value);

	public function deleteByExt($value);


}
?>
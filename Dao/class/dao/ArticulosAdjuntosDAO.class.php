<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-10-01 15:39
 */
interface ArticulosAdjuntosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return ArticulosAdjuntos 
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
 	 * @param articulosAdjunto primary key
 	 */
	public function delete($id_articulo_adjunto);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ArticulosAdjuntos articulosAdjunto
 	 */
	public function insert($articulosAdjunto);
	
	/**
 	 * Update record in table
 	 *
 	 * @param ArticulosAdjuntos articulosAdjunto
 	 */
	public function update($articulosAdjunto);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdArticulo($value);

	public function queryByIdAdjunto($value);


	public function deleteByIdArticulo($value);

	public function deleteByIdAdjunto($value);


}
?>
<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-10-18 16:11
 */
interface ApartamentosArticulosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return ApartamentosArticulos 
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
 	 * @param apartamentosArticulo primary key
 	 */
	public function delete($id_apartamento_articulo);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ApartamentosArticulos apartamentosArticulo
 	 */
	public function insert($apartamentosArticulo);
	
	/**
 	 * Update record in table
 	 *
 	 * @param ApartamentosArticulos apartamentosArticulo
 	 */
	public function update($apartamentosArticulo);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdApartamento($value);

	public function queryByIdArticulo($value);


	public function deleteByIdApartamento($value);

	public function deleteByIdArticulo($value);


}
?>
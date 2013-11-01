<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-10-18 16:11
 */
interface ApartamentosInstalacionesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return ApartamentosInstalaciones 
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
 	 * @param apartamentosInstalacione primary key
 	 */
	public function delete($id_apartamento_instalacion);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ApartamentosInstalaciones apartamentosInstalacione
 	 */
	public function insert($apartamentosInstalacione);
	
	/**
 	 * Update record in table
 	 *
 	 * @param ApartamentosInstalaciones apartamentosInstalacione
 	 */
	public function update($apartamentosInstalacione);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdApartamento($value);

	public function queryByIdInstalacion($value);


	public function deleteByIdApartamento($value);

	public function deleteByIdInstalacion($value);


}
?>
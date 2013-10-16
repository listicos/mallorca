<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-10-01 15:39
 */
interface ApartamentosTiposDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return ApartamentosTipos 
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
 	 * @param apartamentosTipo primary key
 	 */
	public function delete($id_apartamentos_tipo);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ApartamentosTipos apartamentosTipo
 	 */
	public function insert($apartamentosTipo);
	
	/**
 	 * Update record in table
 	 *
 	 * @param ApartamentosTipos apartamentosTipo
 	 */
	public function update($apartamentosTipo);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNombre($value);


	public function deleteByNombre($value);


}
?>
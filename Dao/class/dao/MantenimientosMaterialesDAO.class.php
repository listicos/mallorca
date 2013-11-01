<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-10-18 16:11
 */
interface MantenimientosMaterialesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return MantenimientosMateriales 
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
 	 * @param mantenimientosMateriale primary key
 	 */
	public function delete($id_mantenimiento_marterial);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param MantenimientosMateriales mantenimientosMateriale
 	 */
	public function insert($mantenimientosMateriale);
	
	/**
 	 * Update record in table
 	 *
 	 * @param MantenimientosMateriales mantenimientosMateriale
 	 */
	public function update($mantenimientosMateriale);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByCantidad($value);

	public function queryByDescripcion($value);

	public function queryByIdMantenimiento($value);


	public function deleteByCantidad($value);

	public function deleteByDescripcion($value);

	public function deleteByIdMantenimiento($value);


}
?>
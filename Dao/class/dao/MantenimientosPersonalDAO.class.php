<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-10-18 16:11
 */
interface MantenimientosPersonalDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return MantenimientosPersonal 
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
 	 * @param mantenimientosPersonal primary key
 	 */
	public function delete($id_mantenimiento_personal);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param MantenimientosPersonal mantenimientosPersonal
 	 */
	public function insert($mantenimientosPersonal);
	
	/**
 	 * Update record in table
 	 *
 	 * @param MantenimientosPersonal mantenimientosPersonal
 	 */
	public function update($mantenimientosPersonal);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNombre($value);

	public function queryByFecha($value);

	public function queryByInicio($value);

	public function queryByFinal($value);

	public function queryByHoras($value);

	public function queryByEstatus($value);

	public function queryByIdMantenimiento($value);


	public function deleteByNombre($value);

	public function deleteByFecha($value);

	public function deleteByInicio($value);

	public function deleteByFinal($value);

	public function deleteByHoras($value);

	public function deleteByEstatus($value);

	public function deleteByIdMantenimiento($value);


}
?>
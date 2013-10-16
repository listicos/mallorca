<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-10-01 15:39
 */
interface ApartamentosDescripcionDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return ApartamentosDescripcion 
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
 	 * @param apartamentosDescripcion primary key
 	 */
	public function delete($id_apartamento_descripcion);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ApartamentosDescripcion apartamentosDescripcion
 	 */
	public function insert($apartamentosDescripcion);
	
	/**
 	 * Update record in table
 	 *
 	 * @param ApartamentosDescripcion apartamentosDescripcion
 	 */
	public function update($apartamentosDescripcion);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNombre($value);

	public function queryByDescripcionCorta($value);

	public function queryByDescripcionLarga($value);

	public function queryByDescripcionServicios($value);

	public function queryByDescripcionCondiciones($value);

	public function queryByNormas($value);

	public function queryByManual($value);

	public function queryByIdIdioma($value);


	public function deleteByNombre($value);

	public function deleteByDescripcionCorta($value);

	public function deleteByDescripcionLarga($value);

	public function deleteByDescripcionServicios($value);

	public function deleteByDescripcionCondiciones($value);

	public function deleteByNormas($value);

	public function deleteByManual($value);

	public function deleteByIdIdioma($value);


}
?>
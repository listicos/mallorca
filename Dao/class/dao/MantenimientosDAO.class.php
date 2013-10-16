<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-10-01 15:39
 */
interface MantenimientosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Mantenimientos 
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
 	 * @param mantenimiento primary key
 	 */
	public function delete($id_mantenimiento);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Mantenimientos mantenimiento
 	 */
	public function insert($mantenimiento);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Mantenimientos mantenimiento
 	 */
	public function update($mantenimiento);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdApartamento($value);

	public function queryByTiempoCreacion($value);

	public function queryByUltimaModificacion($value);

	public function queryByUbicacion($value);

	public function queryBySolicitante($value);

	public function queryByTrabajosSolicitados($value);

	public function queryByInformeTecnico($value);

	public function queryByObservaciones($value);

	public function queryByEstatus($value);

	public function queryByFechaCierre($value);

	public function queryByIdReservacion($value);


	public function deleteByIdApartamento($value);

	public function deleteByTiempoCreacion($value);

	public function deleteByUltimaModificacion($value);

	public function deleteByUbicacion($value);

	public function deleteBySolicitante($value);

	public function deleteByTrabajosSolicitados($value);

	public function deleteByInformeTecnico($value);

	public function deleteByObservaciones($value);

	public function deleteByEstatus($value);

	public function deleteByFechaCierre($value);

	public function deleteByIdReservacion($value);


}
?>
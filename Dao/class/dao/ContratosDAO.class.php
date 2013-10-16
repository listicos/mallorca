<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-10-01 15:39
 */
interface ContratosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Contratos 
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
 	 * @param contrato primary key
 	 */
	public function delete($id_contrato);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Contratos contrato
 	 */
	public function insert($contrato);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Contratos contrato
 	 */
	public function update($contrato);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNombre($value);

	public function queryByTiempoCreacion($value);

	public function queryByUltimaModificacion($value);

	public function queryByPrecio($value);

	public function queryByPorcentaje($value);

	public function queryByDescripcion($value);

	public function queryBySemanaGratis($value);

	public function queryByEspeciales($value);

	public function queryByReservasUltimoMinuto($value);

	public function queryByReservasAnticipadas($value);

	public function queryByAlquileresLargaEstancia($value);

	public function queryByFirmado($value);


	public function deleteByNombre($value);

	public function deleteByTiempoCreacion($value);

	public function deleteByUltimaModificacion($value);

	public function deleteByPrecio($value);

	public function deleteByPorcentaje($value);

	public function deleteByDescripcion($value);

	public function deleteBySemanaGratis($value);

	public function deleteByEspeciales($value);

	public function deleteByReservasUltimoMinuto($value);

	public function deleteByReservasAnticipadas($value);

	public function deleteByAlquileresLargaEstancia($value);

	public function deleteByFirmado($value);


}
?>
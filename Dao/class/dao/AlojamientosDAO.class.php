<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-10-01 15:39
 */
interface AlojamientosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Alojamientos 
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
 	 * @param alojamiento primary key
 	 */
	public function delete($id_alojamiento);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Alojamientos alojamiento
 	 */
	public function insert($alojamiento);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Alojamientos alojamiento
 	 */
	public function update($alojamiento);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNombre($value);

	public function queryByCodigo($value);

	public function queryByPaxMinimo($value);

	public function queryByPaxMaximo($value);

	public function queryByPaxBebeMaximo($value);

	public function queryByPaxNiniosMinimo($value);

	public function queryByPaxNiniosMaximo($value);

	public function queryByPaxAdultosMaximo($value);

	public function queryByPaxAdultosMinimo($value);


	public function deleteByNombre($value);

	public function deleteByCodigo($value);

	public function deleteByPaxMinimo($value);

	public function deleteByPaxMaximo($value);

	public function deleteByPaxBebeMaximo($value);

	public function deleteByPaxNiniosMinimo($value);

	public function deleteByPaxNiniosMaximo($value);

	public function deleteByPaxAdultosMaximo($value);

	public function deleteByPaxAdultosMinimo($value);


}
?>
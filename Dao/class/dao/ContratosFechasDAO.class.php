<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-10-01 15:39
 */
interface ContratosFechasDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return ContratosFechas 
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
 	 * @param contratosFecha primary key
 	 */
	public function delete($id_disponibilidad);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ContratosFechas contratosFecha
 	 */
	public function insert($contratosFecha);
	
	/**
 	 * Update record in table
 	 *
 	 * @param ContratosFechas contratosFecha
 	 */
	public function update($contratosFecha);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByFechaInicio($value);

	public function queryByFechaFinal($value);

	public function queryByPrecio($value);

	public function queryByAnotacion($value);

	public function queryByIdContrato($value);


	public function deleteByFechaInicio($value);

	public function deleteByFechaFinal($value);

	public function deleteByPrecio($value);

	public function deleteByAnotacion($value);

	public function deleteByIdContrato($value);


}
?>
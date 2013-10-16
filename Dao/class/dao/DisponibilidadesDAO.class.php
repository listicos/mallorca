<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-10-01 15:39
 */
interface DisponibilidadesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Disponibilidades 
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
 	 * @param disponibilidade primary key
 	 */
	public function delete($id_disponibilidad);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Disponibilidades disponibilidade
 	 */
	public function insert($disponibilidade);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Disponibilidades disponibilidade
 	 */
	public function update($disponibilidade);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByFechaInicio($value);

	public function queryByFechaFinal($value);

	public function queryByPrecio($value);

	public function queryByPrecioFinSemana($value);

	public function queryByEstatus($value);

	public function queryByIdApartamento($value);

	public function queryByAnotacion($value);

	public function queryByPrecioContrato($value);


	public function deleteByFechaInicio($value);

	public function deleteByFechaFinal($value);

	public function deleteByPrecio($value);

	public function deleteByPrecioFinSemana($value);

	public function deleteByEstatus($value);

	public function deleteByIdApartamento($value);

	public function deleteByAnotacion($value);

	public function deleteByPrecioContrato($value);


}
?>
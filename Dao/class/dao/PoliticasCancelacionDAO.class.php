<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-12-22 22:14
 */
interface PoliticasCancelacionDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return PoliticasCancelacion 
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
 	 * @param politicasCancelacion primary key
 	 */
	public function delete($id_politica_cancelacion);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PoliticasCancelacion politicasCancelacion
 	 */
	public function insert($politicasCancelacion);
	
	/**
 	 * Update record in table
 	 *
 	 * @param PoliticasCancelacion politicasCancelacion
 	 */
	public function update($politicasCancelacion);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNombre($value);

	public function queryByReembolsoDia($value);

	public function queryByComision($value);

	public function queryByReembolsoPorcentaje($value);

	public function queryByDescripcion($value);


	public function deleteByNombre($value);

	public function deleteByReembolsoDia($value);

	public function deleteByComision($value);

	public function deleteByReembolsoPorcentaje($value);

	public function deleteByDescripcion($value);


}
?>
<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-10-01 15:39
 */
interface ApartamentosPagosTiposDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return ApartamentosPagosTipos 
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
 	 * @param apartamentosPagosTipo primary key
 	 */
	public function delete($id_apartamento_pago_tipo);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ApartamentosPagosTipos apartamentosPagosTipo
 	 */
	public function insert($apartamentosPagosTipo);
	
	/**
 	 * Update record in table
 	 *
 	 * @param ApartamentosPagosTipos apartamentosPagosTipo
 	 */
	public function update($apartamentosPagosTipo);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdApartamento($value);

	public function queryByIdPagoTipo($value);


	public function deleteByIdApartamento($value);

	public function deleteByIdPagoTipo($value);


}
?>
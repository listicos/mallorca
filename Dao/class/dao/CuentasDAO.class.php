<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-10-01 15:39
 */
interface CuentasDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Cuentas 
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
 	 * @param cuenta primary key
 	 */
	public function delete($id_cuenta);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Cuentas cuenta
 	 */
	public function insert($cuenta);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Cuentas cuenta
 	 */
	public function update($cuenta);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIban($value);

	public function queryBySwif($value);

	public function queryByIdMoneda($value);

	public function queryByTitular($value);

	public function queryByCvv($value);

	public function queryByCD($value);

	public function queryByCA($value);

	public function queryByNumero($value);

	public function queryByTipoTarjeta($value);

	public function queryByCaducidadMes($value);

	public function queryByCaducidadAnio($value);

	public function queryByPaypal($value);

	public function queryByTipo($value);


	public function deleteByIban($value);

	public function deleteBySwif($value);

	public function deleteByIdMoneda($value);

	public function deleteByTitular($value);

	public function deleteByCvv($value);

	public function deleteByCD($value);

	public function deleteByCA($value);

	public function deleteByNumero($value);

	public function deleteByTipoTarjeta($value);

	public function deleteByCaducidadMes($value);

	public function deleteByCaducidadAnio($value);

	public function deleteByPaypal($value);

	public function deleteByTipo($value);


}
?>
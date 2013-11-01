<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-10-28 15:51
 */
interface ReservacionesPagosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return ReservacionesPagos 
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
 	 * @param reservacionesPago primary key
 	 */
	public function delete($id_reservacion_pago);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ReservacionesPagos reservacionesPago
 	 */
	public function insert($reservacionesPago);
	
	/**
 	 * Update record in table
 	 *
 	 * @param ReservacionesPagos reservacionesPago
 	 */
	public function update($reservacionesPago);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdReservacion($value);

	public function queryByFormaPago($value);

	public function queryByAutorizacion($value);

	public function queryByRequest($value);

	public function queryByImporte($value);

	public function queryByConcepto($value);

	public function queryByEstado($value);

	public function queryByTiempoCreacion($value);

	public function queryByUltimaModificacion($value);

	public function queryByOrigen($value);

	public function queryByValidada($value);

	public function queryByComentario($value);

	public function queryByTipo($value);

	public function queryByIdCuenta($value);


	public function deleteByIdReservacion($value);

	public function deleteByFormaPago($value);

	public function deleteByAutorizacion($value);

	public function deleteByRequest($value);

	public function deleteByImporte($value);

	public function deleteByConcepto($value);

	public function deleteByEstado($value);

	public function deleteByTiempoCreacion($value);

	public function deleteByUltimaModificacion($value);

	public function deleteByOrigen($value);

	public function deleteByValidada($value);

	public function deleteByComentario($value);

	public function deleteByTipo($value);

	public function deleteByIdCuenta($value);


}
?>
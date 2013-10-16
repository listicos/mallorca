<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-10-01 15:39
 */
interface ReservacionesArticulosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return ReservacionesArticulos 
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
 	 * @param reservacionesArticulo primary key
 	 */
	public function delete($id_reservacion_articulo);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ReservacionesArticulos reservacionesArticulo
 	 */
	public function insert($reservacionesArticulo);
	
	/**
 	 * Update record in table
 	 *
 	 * @param ReservacionesArticulos reservacionesArticulo
 	 */
	public function update($reservacionesArticulo);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdReservacion($value);

	public function queryByIdArticulo($value);

	public function queryByCantidad($value);

	public function queryByPrecio($value);


	public function deleteByIdReservacion($value);

	public function deleteByIdArticulo($value);

	public function deleteByCantidad($value);

	public function deleteByPrecio($value);


}
?>
<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-10-18 16:11
 */
interface DireccionesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Direcciones 
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
 	 * @param direccione primary key
 	 */
	public function delete($id_direccion);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Direcciones direccione
 	 */
	public function insert($direccione);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Direcciones direccione
 	 */
	public function update($direccione);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByCalle($value);

	public function queryByNumero($value);

	public function queryByProvincia($value);

	public function queryByCodigoPostal($value);

	public function queryByIdPais($value);

	public function queryByLat($value);

	public function queryByLon($value);

	public function queryByIdProvincia($value);

	public function queryByReferencia($value);


	public function deleteByCalle($value);

	public function deleteByNumero($value);

	public function deleteByProvincia($value);

	public function deleteByCodigoPostal($value);

	public function deleteByIdPais($value);

	public function deleteByLat($value);

	public function deleteByLon($value);

	public function deleteByIdProvincia($value);

	public function deleteByReferencia($value);


}
?>
<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-10-01 15:39
 */
interface PaisesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Paises 
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
 	 * @param paise primary key
 	 */
	public function delete($id_pais);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Paises paise
 	 */
	public function insert($paise);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Paises paise
 	 */
	public function update($paise);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByCodigo($value);

	public function queryByNombreCompleto($value);

	public function queryByIso3($value);

	public function queryByNombre($value);

	public function queryByNumero($value);


	public function deleteByCodigo($value);

	public function deleteByNombreCompleto($value);

	public function deleteByIso3($value);

	public function deleteByNombre($value);

	public function deleteByNumero($value);


}
?>
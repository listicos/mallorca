<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-10-01 15:39
 */
interface CanalesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Canales 
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
 	 * @param canale primary key
 	 */
	public function delete($id_canal);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Canales canale
 	 */
	public function insert($canale);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Canales canale
 	 */
	public function update($canale);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNombre($value);

	public function queryByComision($value);

	public function queryBySenia($value);


	public function deleteByNombre($value);

	public function deleteByComision($value);

	public function deleteBySenia($value);


}
?>
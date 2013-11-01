<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-10-18 16:11
 */
interface ApartamentosDocumentosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return ApartamentosDocumentos 
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
 	 * @param apartamentosDocumento primary key
 	 */
	public function delete($id_apartamento_documento);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ApartamentosDocumentos apartamentosDocumento
 	 */
	public function insert($apartamentosDocumento);
	
	/**
 	 * Update record in table
 	 *
 	 * @param ApartamentosDocumentos apartamentosDocumento
 	 */
	public function update($apartamentosDocumento);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdApartamento($value);

	public function queryByIdAdjunto($value);

	public function queryByTipo($value);


	public function deleteByIdApartamento($value);

	public function deleteByIdAdjunto($value);

	public function deleteByTipo($value);


}
?>
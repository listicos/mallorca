<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-10-01 15:39
 */
interface EmpresasDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Empresas 
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
 	 * @param empresa primary key
 	 */
	public function delete($id_empresa);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Empresas empresa
 	 */
	public function insert($empresa);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Empresas empresa
 	 */
	public function update($empresa);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNombre($value);

	public function queryByApellidoPaterno($value);

	public function queryByApellidoMaterno($value);

	public function queryByNombreFiscal($value);

	public function queryByCif($value);

	public function queryByIdDireccion($value);

	public function queryByTiempoCreacion($value);

	public function queryByUltimaModificacion($value);

	public function queryByEmail($value);

	public function queryByEmailFacturacion($value);

	public function queryByTelefono($value);

	public function queryByTelefonoAlterno($value);

	public function queryByIdDireccionFacturacion($value);


	public function deleteByNombre($value);

	public function deleteByApellidoPaterno($value);

	public function deleteByApellidoMaterno($value);

	public function deleteByNombreFiscal($value);

	public function deleteByCif($value);

	public function deleteByIdDireccion($value);

	public function deleteByTiempoCreacion($value);

	public function deleteByUltimaModificacion($value);

	public function deleteByEmail($value);

	public function deleteByEmailFacturacion($value);

	public function deleteByTelefono($value);

	public function deleteByTelefonoAlterno($value);

	public function deleteByIdDireccionFacturacion($value);


}
?>
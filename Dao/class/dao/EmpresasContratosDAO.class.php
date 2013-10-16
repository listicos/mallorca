<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-10-01 15:39
 */
interface EmpresasContratosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return EmpresasContratos 
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
 	 * @param empresasContrato primary key
 	 */
	public function delete($id_empresa_contrato);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param EmpresasContratos empresasContrato
 	 */
	public function insert($empresasContrato);
	
	/**
 	 * Update record in table
 	 *
 	 * @param EmpresasContratos empresasContrato
 	 */
	public function update($empresasContrato);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdEmpresa($value);

	public function queryByIdContrato($value);

	public function queryByFechaInicio($value);

	public function queryByFechaFin($value);

	public function queryByTiempoCreacion($value);

	public function queryByUltimaModificacion($value);


	public function deleteByIdEmpresa($value);

	public function deleteByIdContrato($value);

	public function deleteByFechaInicio($value);

	public function deleteByFechaFin($value);

	public function deleteByTiempoCreacion($value);

	public function deleteByUltimaModificacion($value);


}
?>
<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-10-18 16:11
 */
interface ArticulosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Articulos 
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
 	 * @param articulo primary key
 	 */
	public function delete($id_articulo);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Articulos articulo
 	 */
	public function insert($articulo);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Articulos articulo
 	 */
	public function update($articulo);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNombre($value);

	public function queryByCodigo($value);

	public function queryByIdArticuloTipo($value);

	public function queryByPrecioBase($value);

	public function queryByPorPersona($value);

	public function queryByConfigurarPor($value);

	public function queryByPaxMinimo($value);

	public function queryByPaxMaximo($value);

	public function queryByRegularStock($value);

	public function queryBySoloAdultos($value);

	public function queryBySoloNinios($value);

	public function queryByConsumoObligatorio($value);

	public function queryByEstablecerHorarios($value);

	public function queryByDescripcion($value);

	public function queryByIdIdioma($value);


	public function deleteByNombre($value);

	public function deleteByCodigo($value);

	public function deleteByIdArticuloTipo($value);

	public function deleteByPrecioBase($value);

	public function deleteByPorPersona($value);

	public function deleteByConfigurarPor($value);

	public function deleteByPaxMinimo($value);

	public function deleteByPaxMaximo($value);

	public function deleteByRegularStock($value);

	public function deleteBySoloAdultos($value);

	public function deleteBySoloNinios($value);

	public function deleteByConsumoObligatorio($value);

	public function deleteByEstablecerHorarios($value);

	public function deleteByDescripcion($value);

	public function deleteByIdIdioma($value);


}
?>
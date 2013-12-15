<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-12-15 17:38
 */
interface ApartamentosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Apartamentos 
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
 	 * @param apartamento primary key
 	 */
	public function delete($id_apartamento);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Apartamentos apartamento
 	 */
	public function insert($apartamento);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Apartamentos apartamento
 	 */
	public function update($apartamento);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdEmpresaContrato($value);

	public function queryByNombre($value);

	public function queryByIdApartamentosTipo($value);

	public function queryByIdDireccion($value);

	public function queryByIdMoneda($value);

	public function queryByHorarioEntrada($value);

	public function queryByHorarioSalida($value);

	public function queryByDescripcionCorta($value);

	public function queryByDescripcionLarga($value);

	public function queryByIdIdioma($value);

	public function queryByDescripcionServicios($value);

	public function queryByDescripcionCondiciones($value);

	public function queryByTiempoCreacion($value);

	public function queryByUltimaModificacion($value);

	public function queryByEstatus($value);

	public function queryByIdUsuario($value);

	public function queryByTarifaBase($value);

	public function queryByTarifaSemana($value);

	public function queryByTarifaMes($value);

	public function queryByEstadiaMaxima($value);

	public function queryByEstadiaMinima($value);

	public function queryByHuespedAdicionalApartir($value);

	public function queryByHuespedAdicionalCosto($value);

	public function queryByCostoLimpieza($value);

	public function queryByDepositoSeguridad($value);

	public function queryByPrecioFinSemana($value);

	public function queryByNormas($value);

	public function queryByTamanio($value);

	public function queryByCapacidadPersonas($value);

	public function queryByHabitaciones($value);

	public function queryByCamas($value);

	public function queryByTipoCama($value);

	public function queryByBanio($value);

	public function queryByMascotas($value);

	public function queryByManual($value);

	public function queryByCantidad($value);

	public function queryByCodigo($value);

	public function queryByIdPoliticaCancelacion($value);

	public function queryByIdApartamentoDescripcion($value);

	public function queryByClaveWifi($value);

	public function queryByIdComplejo($value);

	public function queryByVisitas($value);

	public function queryByTpv($value);


	public function deleteByIdEmpresaContrato($value);

	public function deleteByNombre($value);

	public function deleteByIdApartamentosTipo($value);

	public function deleteByIdDireccion($value);

	public function deleteByIdMoneda($value);

	public function deleteByHorarioEntrada($value);

	public function deleteByHorarioSalida($value);

	public function deleteByDescripcionCorta($value);

	public function deleteByDescripcionLarga($value);

	public function deleteByIdIdioma($value);

	public function deleteByDescripcionServicios($value);

	public function deleteByDescripcionCondiciones($value);

	public function deleteByTiempoCreacion($value);

	public function deleteByUltimaModificacion($value);

	public function deleteByEstatus($value);

	public function deleteByIdUsuario($value);

	public function deleteByTarifaBase($value);

	public function deleteByTarifaSemana($value);

	public function deleteByTarifaMes($value);

	public function deleteByEstadiaMaxima($value);

	public function deleteByEstadiaMinima($value);

	public function deleteByHuespedAdicionalApartir($value);

	public function deleteByHuespedAdicionalCosto($value);

	public function deleteByCostoLimpieza($value);

	public function deleteByDepositoSeguridad($value);

	public function deleteByPrecioFinSemana($value);

	public function deleteByNormas($value);

	public function deleteByTamanio($value);

	public function deleteByCapacidadPersonas($value);

	public function deleteByHabitaciones($value);

	public function deleteByCamas($value);

	public function deleteByTipoCama($value);

	public function deleteByBanio($value);

	public function deleteByMascotas($value);

	public function deleteByManual($value);

	public function deleteByCantidad($value);

	public function deleteByCodigo($value);

	public function deleteByIdPoliticaCancelacion($value);

	public function deleteByIdApartamentoDescripcion($value);

	public function deleteByClaveWifi($value);

	public function deleteByIdComplejo($value);

	public function deleteByVisitas($value);

	public function deleteByTpv($value);


}
?>
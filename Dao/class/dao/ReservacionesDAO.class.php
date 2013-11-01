<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-10-18 16:11
 */
interface ReservacionesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Reservaciones 
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
 	 * @param reservacione primary key
 	 */
	public function delete($id_reservacion);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Reservaciones reservacione
 	 */
	public function insert($reservacione);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Reservaciones reservacione
 	 */
	public function update($reservacione);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByTiempoCreacion($value);

	public function queryByUltimaModificacion($value);

	public function queryByIdApartamento($value);

	public function queryByFechaEntrada($value);

	public function queryByFechaSalida($value);

	public function queryByAdultos($value);

	public function queryByEstatus($value);

	public function queryByNinios($value);

	public function queryByBebes($value);

	public function queryByApartamento($value);

	public function queryByContrato($value);

	public function queryByAutorizacion($value);

	public function queryByRequest($value);

	public function queryByTotal($value);

	public function queryByObservaciones($value);

	public function queryByMotivoCancelacion($value);

	public function queryByNotificacion($value);

	public function queryByIdUsuario($value);

	public function queryByHoraEntrada($value);

	public function queryByHoraSalida($value);

	public function queryByIdCanal($value);

	public function queryByIdResponsableEntrada($value);

	public function queryByLugarEntrada($value);

	public function queryByLlavesEntregadas($value);

	public function queryByLlavesDevueltas($value);

	public function queryByIdResponsableSalida($value);

	public function queryByFianzaEstado($value);

	public function queryByRevisionSalidaComentarios($value);

	public function queryByParkingNumero($value);

	public function queryByParkingLlavesEntregadas($value);

	public function queryByParkingMandosEntregados($value);

	public function queryByParkingLlavesDevueltas($value);

	public function queryByParkingMandosDevueltos($value);


	public function deleteByTiempoCreacion($value);

	public function deleteByUltimaModificacion($value);

	public function deleteByIdApartamento($value);

	public function deleteByFechaEntrada($value);

	public function deleteByFechaSalida($value);

	public function deleteByAdultos($value);

	public function deleteByEstatus($value);

	public function deleteByNinios($value);

	public function deleteByBebes($value);

	public function deleteByApartamento($value);

	public function deleteByContrato($value);

	public function deleteByAutorizacion($value);

	public function deleteByRequest($value);

	public function deleteByTotal($value);

	public function deleteByObservaciones($value);

	public function deleteByMotivoCancelacion($value);

	public function deleteByNotificacion($value);

	public function deleteByIdUsuario($value);

	public function deleteByHoraEntrada($value);

	public function deleteByHoraSalida($value);

	public function deleteByIdCanal($value);

	public function deleteByIdResponsableEntrada($value);

	public function deleteByLugarEntrada($value);

	public function deleteByLlavesEntregadas($value);

	public function deleteByLlavesDevueltas($value);

	public function deleteByIdResponsableSalida($value);

	public function deleteByFianzaEstado($value);

	public function deleteByRevisionSalidaComentarios($value);

	public function deleteByParkingNumero($value);

	public function deleteByParkingLlavesEntregadas($value);

	public function deleteByParkingMandosEntregados($value);

	public function deleteByParkingLlavesDevueltas($value);

	public function deleteByParkingMandosDevueltos($value);


}
?>
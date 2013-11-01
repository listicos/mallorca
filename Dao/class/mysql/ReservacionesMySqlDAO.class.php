<?php
/**
 * Class that operate on table 'reservaciones'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-10-18 16:11
 */
class ReservacionesMySqlDAO implements ReservacionesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ReservacionesMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM reservaciones WHERE id_reservacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM reservaciones';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM reservaciones ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param reservacione primary key
 	 */
	public function delete($id_reservacion){
		$sql = 'DELETE FROM reservaciones WHERE id_reservacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_reservacion);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ReservacionesMySql reservacione
 	 */
	public function insert($reservacione){
		$sql = 'INSERT INTO reservaciones (tiempo_creacion, ultima_modificacion, id_apartamento, fecha_entrada, fecha_salida, adultos, estatus, ninios, bebes, apartamento, contrato, autorizacion, request, total, observaciones, motivo_cancelacion, notificacion, id_usuario, hora_entrada, hora_salida, id_canal, id_responsable_entrada, lugar_entrada, llaves_entregadas, llaves_devueltas, id_responsable_salida, fianza_estado, revision_salida_comentarios, parking_numero, parking_llaves_entregadas, parking_mandos_entregados, parking_llaves_devueltas, parking_mandos_devueltos) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($reservacione->tiempoCreacion);
		$sqlQuery->set($reservacione->ultimaModificacion);
		$sqlQuery->setNumber($reservacione->idApartamento);
		$sqlQuery->set($reservacione->fechaEntrada);
		$sqlQuery->set($reservacione->fechaSalida);
		$sqlQuery->setNumber($reservacione->adultos);
		$sqlQuery->set($reservacione->estatus);
		$sqlQuery->setNumber($reservacione->ninios);
		$sqlQuery->setNumber($reservacione->bebes);
		$sqlQuery->set($reservacione->apartamento);
		$sqlQuery->set($reservacione->contrato);
		$sqlQuery->set($reservacione->autorizacion);
		$sqlQuery->set($reservacione->request);
		$sqlQuery->set($reservacione->total);
		$sqlQuery->set($reservacione->observaciones);
		$sqlQuery->set($reservacione->motivoCancelacion);
		$sqlQuery->set($reservacione->notificacion);
		$sqlQuery->setNumber($reservacione->idUsuario);
		$sqlQuery->set($reservacione->horaEntrada);
		$sqlQuery->set($reservacione->horaSalida);
		$sqlQuery->setNumber($reservacione->idCanal);
		$sqlQuery->setNumber($reservacione->idResponsableEntrada);
		$sqlQuery->set($reservacione->lugarEntrada);
		$sqlQuery->setNumber($reservacione->llavesEntregadas);
		$sqlQuery->setNumber($reservacione->llavesDevueltas);
		$sqlQuery->setNumber($reservacione->idResponsableSalida);
		$sqlQuery->set($reservacione->fianzaEstado);
		$sqlQuery->set($reservacione->revisionSalidaComentarios);
		$sqlQuery->set($reservacione->parkingNumero);
		$sqlQuery->setNumber($reservacione->parkingLlavesEntregadas);
		$sqlQuery->setNumber($reservacione->parkingMandosEntregados);
		$sqlQuery->setNumber($reservacione->parkingLlavesDevueltas);
		$sqlQuery->setNumber($reservacione->parkingMandosDevueltos);

		$id = $this->executeInsert($sqlQuery);	
		$reservacione->idReservacion = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ReservacionesMySql reservacione
 	 */
	public function update($reservacione){
		$sql = 'UPDATE reservaciones SET tiempo_creacion = ?, ultima_modificacion = ?, id_apartamento = ?, fecha_entrada = ?, fecha_salida = ?, adultos = ?, estatus = ?, ninios = ?, bebes = ?, apartamento = ?, contrato = ?, autorizacion = ?, request = ?, total = ?, observaciones = ?, motivo_cancelacion = ?, notificacion = ?, id_usuario = ?, hora_entrada = ?, hora_salida = ?, id_canal = ?, id_responsable_entrada = ?, lugar_entrada = ?, llaves_entregadas = ?, llaves_devueltas = ?, id_responsable_salida = ?, fianza_estado = ?, revision_salida_comentarios = ?, parking_numero = ?, parking_llaves_entregadas = ?, parking_mandos_entregados = ?, parking_llaves_devueltas = ?, parking_mandos_devueltos = ? WHERE id_reservacion = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($reservacione->tiempoCreacion);
		$sqlQuery->set($reservacione->ultimaModificacion);
		$sqlQuery->setNumber($reservacione->idApartamento);
		$sqlQuery->set($reservacione->fechaEntrada);
		$sqlQuery->set($reservacione->fechaSalida);
		$sqlQuery->setNumber($reservacione->adultos);
		$sqlQuery->set($reservacione->estatus);
		$sqlQuery->setNumber($reservacione->ninios);
		$sqlQuery->setNumber($reservacione->bebes);
		$sqlQuery->set($reservacione->apartamento);
		$sqlQuery->set($reservacione->contrato);
		$sqlQuery->set($reservacione->autorizacion);
		$sqlQuery->set($reservacione->request);
		$sqlQuery->set($reservacione->total);
		$sqlQuery->set($reservacione->observaciones);
		$sqlQuery->set($reservacione->motivoCancelacion);
		$sqlQuery->set($reservacione->notificacion);
		$sqlQuery->setNumber($reservacione->idUsuario);
		$sqlQuery->set($reservacione->horaEntrada);
		$sqlQuery->set($reservacione->horaSalida);
		$sqlQuery->setNumber($reservacione->idCanal);
		$sqlQuery->setNumber($reservacione->idResponsableEntrada);
		$sqlQuery->set($reservacione->lugarEntrada);
		$sqlQuery->setNumber($reservacione->llavesEntregadas);
		$sqlQuery->setNumber($reservacione->llavesDevueltas);
		$sqlQuery->setNumber($reservacione->idResponsableSalida);
		$sqlQuery->set($reservacione->fianzaEstado);
		$sqlQuery->set($reservacione->revisionSalidaComentarios);
		$sqlQuery->set($reservacione->parkingNumero);
		$sqlQuery->setNumber($reservacione->parkingLlavesEntregadas);
		$sqlQuery->setNumber($reservacione->parkingMandosEntregados);
		$sqlQuery->setNumber($reservacione->parkingLlavesDevueltas);
		$sqlQuery->setNumber($reservacione->parkingMandosDevueltos);

		$sqlQuery->setNumber($reservacione->idReservacion);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM reservaciones';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByTiempoCreacion($value){
		$sql = 'SELECT * FROM reservaciones WHERE tiempo_creacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUltimaModificacion($value){
		$sql = 'SELECT * FROM reservaciones WHERE ultima_modificacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdApartamento($value){
		$sql = 'SELECT * FROM reservaciones WHERE id_apartamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFechaEntrada($value){
		$sql = 'SELECT * FROM reservaciones WHERE fecha_entrada = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFechaSalida($value){
		$sql = 'SELECT * FROM reservaciones WHERE fecha_salida = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAdultos($value){
		$sql = 'SELECT * FROM reservaciones WHERE adultos = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEstatus($value){
		$sql = 'SELECT * FROM reservaciones WHERE estatus = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNinios($value){
		$sql = 'SELECT * FROM reservaciones WHERE ninios = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByBebes($value){
		$sql = 'SELECT * FROM reservaciones WHERE bebes = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByApartamento($value){
		$sql = 'SELECT * FROM reservaciones WHERE apartamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByContrato($value){
		$sql = 'SELECT * FROM reservaciones WHERE contrato = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAutorizacion($value){
		$sql = 'SELECT * FROM reservaciones WHERE autorizacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRequest($value){
		$sql = 'SELECT * FROM reservaciones WHERE request = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTotal($value){
		$sql = 'SELECT * FROM reservaciones WHERE total = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByObservaciones($value){
		$sql = 'SELECT * FROM reservaciones WHERE observaciones = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMotivoCancelacion($value){
		$sql = 'SELECT * FROM reservaciones WHERE motivo_cancelacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNotificacion($value){
		$sql = 'SELECT * FROM reservaciones WHERE notificacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdUsuario($value){
		$sql = 'SELECT * FROM reservaciones WHERE id_usuario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByHoraEntrada($value){
		$sql = 'SELECT * FROM reservaciones WHERE hora_entrada = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByHoraSalida($value){
		$sql = 'SELECT * FROM reservaciones WHERE hora_salida = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdCanal($value){
		$sql = 'SELECT * FROM reservaciones WHERE id_canal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdResponsableEntrada($value){
		$sql = 'SELECT * FROM reservaciones WHERE id_responsable_entrada = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLugarEntrada($value){
		$sql = 'SELECT * FROM reservaciones WHERE lugar_entrada = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLlavesEntregadas($value){
		$sql = 'SELECT * FROM reservaciones WHERE llaves_entregadas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLlavesDevueltas($value){
		$sql = 'SELECT * FROM reservaciones WHERE llaves_devueltas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdResponsableSalida($value){
		$sql = 'SELECT * FROM reservaciones WHERE id_responsable_salida = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFianzaEstado($value){
		$sql = 'SELECT * FROM reservaciones WHERE fianza_estado = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRevisionSalidaComentarios($value){
		$sql = 'SELECT * FROM reservaciones WHERE revision_salida_comentarios = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByParkingNumero($value){
		$sql = 'SELECT * FROM reservaciones WHERE parking_numero = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByParkingLlavesEntregadas($value){
		$sql = 'SELECT * FROM reservaciones WHERE parking_llaves_entregadas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByParkingMandosEntregados($value){
		$sql = 'SELECT * FROM reservaciones WHERE parking_mandos_entregados = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByParkingLlavesDevueltas($value){
		$sql = 'SELECT * FROM reservaciones WHERE parking_llaves_devueltas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByParkingMandosDevueltos($value){
		$sql = 'SELECT * FROM reservaciones WHERE parking_mandos_devueltos = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByTiempoCreacion($value){
		$sql = 'DELETE FROM reservaciones WHERE tiempo_creacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUltimaModificacion($value){
		$sql = 'DELETE FROM reservaciones WHERE ultima_modificacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdApartamento($value){
		$sql = 'DELETE FROM reservaciones WHERE id_apartamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFechaEntrada($value){
		$sql = 'DELETE FROM reservaciones WHERE fecha_entrada = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFechaSalida($value){
		$sql = 'DELETE FROM reservaciones WHERE fecha_salida = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAdultos($value){
		$sql = 'DELETE FROM reservaciones WHERE adultos = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEstatus($value){
		$sql = 'DELETE FROM reservaciones WHERE estatus = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNinios($value){
		$sql = 'DELETE FROM reservaciones WHERE ninios = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBebes($value){
		$sql = 'DELETE FROM reservaciones WHERE bebes = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByApartamento($value){
		$sql = 'DELETE FROM reservaciones WHERE apartamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByContrato($value){
		$sql = 'DELETE FROM reservaciones WHERE contrato = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAutorizacion($value){
		$sql = 'DELETE FROM reservaciones WHERE autorizacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRequest($value){
		$sql = 'DELETE FROM reservaciones WHERE request = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTotal($value){
		$sql = 'DELETE FROM reservaciones WHERE total = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByObservaciones($value){
		$sql = 'DELETE FROM reservaciones WHERE observaciones = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMotivoCancelacion($value){
		$sql = 'DELETE FROM reservaciones WHERE motivo_cancelacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNotificacion($value){
		$sql = 'DELETE FROM reservaciones WHERE notificacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdUsuario($value){
		$sql = 'DELETE FROM reservaciones WHERE id_usuario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByHoraEntrada($value){
		$sql = 'DELETE FROM reservaciones WHERE hora_entrada = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByHoraSalida($value){
		$sql = 'DELETE FROM reservaciones WHERE hora_salida = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdCanal($value){
		$sql = 'DELETE FROM reservaciones WHERE id_canal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdResponsableEntrada($value){
		$sql = 'DELETE FROM reservaciones WHERE id_responsable_entrada = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLugarEntrada($value){
		$sql = 'DELETE FROM reservaciones WHERE lugar_entrada = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLlavesEntregadas($value){
		$sql = 'DELETE FROM reservaciones WHERE llaves_entregadas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLlavesDevueltas($value){
		$sql = 'DELETE FROM reservaciones WHERE llaves_devueltas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdResponsableSalida($value){
		$sql = 'DELETE FROM reservaciones WHERE id_responsable_salida = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFianzaEstado($value){
		$sql = 'DELETE FROM reservaciones WHERE fianza_estado = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRevisionSalidaComentarios($value){
		$sql = 'DELETE FROM reservaciones WHERE revision_salida_comentarios = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByParkingNumero($value){
		$sql = 'DELETE FROM reservaciones WHERE parking_numero = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByParkingLlavesEntregadas($value){
		$sql = 'DELETE FROM reservaciones WHERE parking_llaves_entregadas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByParkingMandosEntregados($value){
		$sql = 'DELETE FROM reservaciones WHERE parking_mandos_entregados = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByParkingLlavesDevueltas($value){
		$sql = 'DELETE FROM reservaciones WHERE parking_llaves_devueltas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByParkingMandosDevueltos($value){
		$sql = 'DELETE FROM reservaciones WHERE parking_mandos_devueltos = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ReservacionesMySql 
	 */
	protected function readRow($row){
		$reservacione = new Reservacione();
		
		$reservacione->idReservacion = $row['id_reservacion'];
		$reservacione->tiempoCreacion = $row['tiempo_creacion'];
		$reservacione->ultimaModificacion = $row['ultima_modificacion'];
		$reservacione->idApartamento = $row['id_apartamento'];
		$reservacione->fechaEntrada = $row['fecha_entrada'];
		$reservacione->fechaSalida = $row['fecha_salida'];
		$reservacione->adultos = $row['adultos'];
		$reservacione->estatus = $row['estatus'];
		$reservacione->ninios = $row['ninios'];
		$reservacione->bebes = $row['bebes'];
		$reservacione->apartamento = $row['apartamento'];
		$reservacione->contrato = $row['contrato'];
		$reservacione->autorizacion = $row['autorizacion'];
		$reservacione->request = $row['request'];
		$reservacione->total = $row['total'];
		$reservacione->observaciones = $row['observaciones'];
		$reservacione->motivoCancelacion = $row['motivo_cancelacion'];
		$reservacione->notificacion = $row['notificacion'];
		$reservacione->idUsuario = $row['id_usuario'];
		$reservacione->horaEntrada = $row['hora_entrada'];
		$reservacione->horaSalida = $row['hora_salida'];
		$reservacione->idCanal = $row['id_canal'];
		$reservacione->idResponsableEntrada = $row['id_responsable_entrada'];
		$reservacione->lugarEntrada = $row['lugar_entrada'];
		$reservacione->llavesEntregadas = $row['llaves_entregadas'];
		$reservacione->llavesDevueltas = $row['llaves_devueltas'];
		$reservacione->idResponsableSalida = $row['id_responsable_salida'];
		$reservacione->fianzaEstado = $row['fianza_estado'];
		$reservacione->revisionSalidaComentarios = $row['revision_salida_comentarios'];
		$reservacione->parkingNumero = $row['parking_numero'];
		$reservacione->parkingLlavesEntregadas = $row['parking_llaves_entregadas'];
		$reservacione->parkingMandosEntregados = $row['parking_mandos_entregados'];
		$reservacione->parkingLlavesDevueltas = $row['parking_llaves_devueltas'];
		$reservacione->parkingMandosDevueltos = $row['parking_mandos_devueltos'];

		return $reservacione;
	}
	
	protected function getList($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		$ret = array();
		for($i=0;$i<count($tab);$i++){
			$ret[$i] = $this->readRow($tab[$i]);
		}
		return $ret;
	}
	
	/**
	 * Get row
	 *
	 * @return ReservacionesMySql 
	 */
	protected function getRow($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		if(count($tab)==0){
			return null;
		}
		return $this->readRow($tab[0]);		
	}
	
	/**
	 * Execute sql query
	 */
	protected function execute($sqlQuery){
		return QueryExecutor::execute($sqlQuery);
	}
	
		
	/**
	 * Execute sql query
	 */
	protected function executeUpdate($sqlQuery){
		return QueryExecutor::executeUpdate($sqlQuery);
	}

	/**
	 * Query for one row and one column
	 */
	protected function querySingleResult($sqlQuery){
		return QueryExecutor::queryForString($sqlQuery);
	}

	/**
	 * Insert row to table
	 */
	protected function executeInsert($sqlQuery){
		return QueryExecutor::executeInsert($sqlQuery);
	}
}
?>
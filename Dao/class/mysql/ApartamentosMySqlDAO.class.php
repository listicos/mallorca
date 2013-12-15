<?php
/**
 * Class that operate on table 'apartamentos'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-12-15 17:38
 */
class ApartamentosMySqlDAO implements ApartamentosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ApartamentosMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM apartamentos WHERE id_apartamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM apartamentos';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM apartamentos ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param apartamento primary key
 	 */
	public function delete($id_apartamento){
		$sql = 'DELETE FROM apartamentos WHERE id_apartamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_apartamento);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ApartamentosMySql apartamento
 	 */
	public function insert($apartamento){
		$sql = 'INSERT INTO apartamentos (id_empresa_contrato, nombre, id_apartamentos_tipo, id_direccion, id_moneda, horario_entrada, horario_salida, descripcion_corta, descripcion_larga, id_idioma, descripcion_servicios, descripcion_condiciones, tiempo_creacion, ultima_modificacion, estatus, id_usuario, tarifa_base, tarifa_semana, tarifa_mes, estadia_maxima, estadia_minima, huesped_adicional_apartir, huesped_adicional_costo, costo_limpieza, deposito_seguridad, precio_fin_semana, normas, tamanio, capacidad_personas, habitaciones, camas, tipo_cama, banio, mascotas, manual, cantidad, codigo, id_politica_cancelacion, id_apartamento_descripcion, clave_wifi, id_complejo, visitas, tpv) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($apartamento->idEmpresaContrato);
		$sqlQuery->set($apartamento->nombre);
		$sqlQuery->setNumber($apartamento->idApartamentosTipo);
		$sqlQuery->setNumber($apartamento->idDireccion);
		$sqlQuery->setNumber($apartamento->idMoneda);
		$sqlQuery->set($apartamento->horarioEntrada);
		$sqlQuery->set($apartamento->horarioSalida);
		$sqlQuery->set($apartamento->descripcionCorta);
		$sqlQuery->set($apartamento->descripcionLarga);
		$sqlQuery->setNumber($apartamento->idIdioma);
		$sqlQuery->set($apartamento->descripcionServicios);
		$sqlQuery->set($apartamento->descripcionCondiciones);
		$sqlQuery->set($apartamento->tiempoCreacion);
		$sqlQuery->set($apartamento->ultimaModificacion);
		$sqlQuery->set($apartamento->estatus);
		$sqlQuery->setNumber($apartamento->idUsuario);
		$sqlQuery->set($apartamento->tarifaBase);
		$sqlQuery->set($apartamento->tarifaSemana);
		$sqlQuery->set($apartamento->tarifaMes);
		$sqlQuery->setNumber($apartamento->estadiaMaxima);
		$sqlQuery->setNumber($apartamento->estadiaMinima);
		$sqlQuery->setNumber($apartamento->huespedAdicionalApartir);
		$sqlQuery->set($apartamento->huespedAdicionalCosto);
		$sqlQuery->set($apartamento->costoLimpieza);
		$sqlQuery->set($apartamento->depositoSeguridad);
		$sqlQuery->set($apartamento->precioFinSemana);
		$sqlQuery->set($apartamento->normas);
		$sqlQuery->set($apartamento->tamanio);
		$sqlQuery->setNumber($apartamento->capacidadPersonas);
		$sqlQuery->setNumber($apartamento->habitaciones);
		$sqlQuery->setNumber($apartamento->camas);
		$sqlQuery->set($apartamento->tipoCama);
		$sqlQuery->set($apartamento->banio);
		$sqlQuery->setNumber($apartamento->mascotas);
		$sqlQuery->set($apartamento->manual);
		$sqlQuery->setNumber($apartamento->cantidad);
		$sqlQuery->set($apartamento->codigo);
		$sqlQuery->setNumber($apartamento->idPoliticaCancelacion);
		$sqlQuery->setNumber($apartamento->idApartamentoDescripcion);
		$sqlQuery->set($apartamento->claveWifi);
		$sqlQuery->setNumber($apartamento->idComplejo);
		$sqlQuery->setNumber($apartamento->visitas);
		$sqlQuery->set($apartamento->tpv);

		$id = $this->executeInsert($sqlQuery);	
		$apartamento->idApartamento = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ApartamentosMySql apartamento
 	 */
	public function update($apartamento){
		$sql = 'UPDATE apartamentos SET id_empresa_contrato = ?, nombre = ?, id_apartamentos_tipo = ?, id_direccion = ?, id_moneda = ?, horario_entrada = ?, horario_salida = ?, descripcion_corta = ?, descripcion_larga = ?, id_idioma = ?, descripcion_servicios = ?, descripcion_condiciones = ?, tiempo_creacion = ?, ultima_modificacion = ?, estatus = ?, id_usuario = ?, tarifa_base = ?, tarifa_semana = ?, tarifa_mes = ?, estadia_maxima = ?, estadia_minima = ?, huesped_adicional_apartir = ?, huesped_adicional_costo = ?, costo_limpieza = ?, deposito_seguridad = ?, precio_fin_semana = ?, normas = ?, tamanio = ?, capacidad_personas = ?, habitaciones = ?, camas = ?, tipo_cama = ?, banio = ?, mascotas = ?, manual = ?, cantidad = ?, codigo = ?, id_politica_cancelacion = ?, id_apartamento_descripcion = ?, clave_wifi = ?, id_complejo = ?, visitas = ?, tpv = ? WHERE id_apartamento = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($apartamento->idEmpresaContrato);
		$sqlQuery->set($apartamento->nombre);
		$sqlQuery->setNumber($apartamento->idApartamentosTipo);
		$sqlQuery->setNumber($apartamento->idDireccion);
		$sqlQuery->setNumber($apartamento->idMoneda);
		$sqlQuery->set($apartamento->horarioEntrada);
		$sqlQuery->set($apartamento->horarioSalida);
		$sqlQuery->set($apartamento->descripcionCorta);
		$sqlQuery->set($apartamento->descripcionLarga);
		$sqlQuery->setNumber($apartamento->idIdioma);
		$sqlQuery->set($apartamento->descripcionServicios);
		$sqlQuery->set($apartamento->descripcionCondiciones);
		$sqlQuery->set($apartamento->tiempoCreacion);
		$sqlQuery->set($apartamento->ultimaModificacion);
		$sqlQuery->set($apartamento->estatus);
		$sqlQuery->setNumber($apartamento->idUsuario);
		$sqlQuery->set($apartamento->tarifaBase);
		$sqlQuery->set($apartamento->tarifaSemana);
		$sqlQuery->set($apartamento->tarifaMes);
		$sqlQuery->setNumber($apartamento->estadiaMaxima);
		$sqlQuery->setNumber($apartamento->estadiaMinima);
		$sqlQuery->setNumber($apartamento->huespedAdicionalApartir);
		$sqlQuery->set($apartamento->huespedAdicionalCosto);
		$sqlQuery->set($apartamento->costoLimpieza);
		$sqlQuery->set($apartamento->depositoSeguridad);
		$sqlQuery->set($apartamento->precioFinSemana);
		$sqlQuery->set($apartamento->normas);
		$sqlQuery->set($apartamento->tamanio);
		$sqlQuery->setNumber($apartamento->capacidadPersonas);
		$sqlQuery->setNumber($apartamento->habitaciones);
		$sqlQuery->setNumber($apartamento->camas);
		$sqlQuery->set($apartamento->tipoCama);
		$sqlQuery->set($apartamento->banio);
		$sqlQuery->setNumber($apartamento->mascotas);
		$sqlQuery->set($apartamento->manual);
		$sqlQuery->setNumber($apartamento->cantidad);
		$sqlQuery->set($apartamento->codigo);
		$sqlQuery->setNumber($apartamento->idPoliticaCancelacion);
		$sqlQuery->setNumber($apartamento->idApartamentoDescripcion);
		$sqlQuery->set($apartamento->claveWifi);
		$sqlQuery->setNumber($apartamento->idComplejo);
		$sqlQuery->setNumber($apartamento->visitas);
		$sqlQuery->set($apartamento->tpv);

		$sqlQuery->setNumber($apartamento->idApartamento);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM apartamentos';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIdEmpresaContrato($value){
		$sql = 'SELECT * FROM apartamentos WHERE id_empresa_contrato = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNombre($value){
		$sql = 'SELECT * FROM apartamentos WHERE nombre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdApartamentosTipo($value){
		$sql = 'SELECT * FROM apartamentos WHERE id_apartamentos_tipo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdDireccion($value){
		$sql = 'SELECT * FROM apartamentos WHERE id_direccion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdMoneda($value){
		$sql = 'SELECT * FROM apartamentos WHERE id_moneda = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByHorarioEntrada($value){
		$sql = 'SELECT * FROM apartamentos WHERE horario_entrada = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByHorarioSalida($value){
		$sql = 'SELECT * FROM apartamentos WHERE horario_salida = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescripcionCorta($value){
		$sql = 'SELECT * FROM apartamentos WHERE descripcion_corta = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescripcionLarga($value){
		$sql = 'SELECT * FROM apartamentos WHERE descripcion_larga = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdIdioma($value){
		$sql = 'SELECT * FROM apartamentos WHERE id_idioma = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescripcionServicios($value){
		$sql = 'SELECT * FROM apartamentos WHERE descripcion_servicios = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescripcionCondiciones($value){
		$sql = 'SELECT * FROM apartamentos WHERE descripcion_condiciones = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTiempoCreacion($value){
		$sql = 'SELECT * FROM apartamentos WHERE tiempo_creacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUltimaModificacion($value){
		$sql = 'SELECT * FROM apartamentos WHERE ultima_modificacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEstatus($value){
		$sql = 'SELECT * FROM apartamentos WHERE estatus = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdUsuario($value){
		$sql = 'SELECT * FROM apartamentos WHERE id_usuario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTarifaBase($value){
		$sql = 'SELECT * FROM apartamentos WHERE tarifa_base = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTarifaSemana($value){
		$sql = 'SELECT * FROM apartamentos WHERE tarifa_semana = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTarifaMes($value){
		$sql = 'SELECT * FROM apartamentos WHERE tarifa_mes = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEstadiaMaxima($value){
		$sql = 'SELECT * FROM apartamentos WHERE estadia_maxima = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEstadiaMinima($value){
		$sql = 'SELECT * FROM apartamentos WHERE estadia_minima = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByHuespedAdicionalApartir($value){
		$sql = 'SELECT * FROM apartamentos WHERE huesped_adicional_apartir = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByHuespedAdicionalCosto($value){
		$sql = 'SELECT * FROM apartamentos WHERE huesped_adicional_costo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCostoLimpieza($value){
		$sql = 'SELECT * FROM apartamentos WHERE costo_limpieza = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDepositoSeguridad($value){
		$sql = 'SELECT * FROM apartamentos WHERE deposito_seguridad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPrecioFinSemana($value){
		$sql = 'SELECT * FROM apartamentos WHERE precio_fin_semana = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNormas($value){
		$sql = 'SELECT * FROM apartamentos WHERE normas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTamanio($value){
		$sql = 'SELECT * FROM apartamentos WHERE tamanio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCapacidadPersonas($value){
		$sql = 'SELECT * FROM apartamentos WHERE capacidad_personas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByHabitaciones($value){
		$sql = 'SELECT * FROM apartamentos WHERE habitaciones = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCamas($value){
		$sql = 'SELECT * FROM apartamentos WHERE camas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTipoCama($value){
		$sql = 'SELECT * FROM apartamentos WHERE tipo_cama = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByBanio($value){
		$sql = 'SELECT * FROM apartamentos WHERE banio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMascotas($value){
		$sql = 'SELECT * FROM apartamentos WHERE mascotas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByManual($value){
		$sql = 'SELECT * FROM apartamentos WHERE manual = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCantidad($value){
		$sql = 'SELECT * FROM apartamentos WHERE cantidad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCodigo($value){
		$sql = 'SELECT * FROM apartamentos WHERE codigo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdPoliticaCancelacion($value){
		$sql = 'SELECT * FROM apartamentos WHERE id_politica_cancelacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdApartamentoDescripcion($value){
		$sql = 'SELECT * FROM apartamentos WHERE id_apartamento_descripcion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByClaveWifi($value){
		$sql = 'SELECT * FROM apartamentos WHERE clave_wifi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdComplejo($value){
		$sql = 'SELECT * FROM apartamentos WHERE id_complejo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByVisitas($value){
		$sql = 'SELECT * FROM apartamentos WHERE visitas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTpv($value){
		$sql = 'SELECT * FROM apartamentos WHERE tpv = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIdEmpresaContrato($value){
		$sql = 'DELETE FROM apartamentos WHERE id_empresa_contrato = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNombre($value){
		$sql = 'DELETE FROM apartamentos WHERE nombre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdApartamentosTipo($value){
		$sql = 'DELETE FROM apartamentos WHERE id_apartamentos_tipo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdDireccion($value){
		$sql = 'DELETE FROM apartamentos WHERE id_direccion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdMoneda($value){
		$sql = 'DELETE FROM apartamentos WHERE id_moneda = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByHorarioEntrada($value){
		$sql = 'DELETE FROM apartamentos WHERE horario_entrada = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByHorarioSalida($value){
		$sql = 'DELETE FROM apartamentos WHERE horario_salida = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescripcionCorta($value){
		$sql = 'DELETE FROM apartamentos WHERE descripcion_corta = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescripcionLarga($value){
		$sql = 'DELETE FROM apartamentos WHERE descripcion_larga = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdIdioma($value){
		$sql = 'DELETE FROM apartamentos WHERE id_idioma = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescripcionServicios($value){
		$sql = 'DELETE FROM apartamentos WHERE descripcion_servicios = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescripcionCondiciones($value){
		$sql = 'DELETE FROM apartamentos WHERE descripcion_condiciones = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTiempoCreacion($value){
		$sql = 'DELETE FROM apartamentos WHERE tiempo_creacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUltimaModificacion($value){
		$sql = 'DELETE FROM apartamentos WHERE ultima_modificacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEstatus($value){
		$sql = 'DELETE FROM apartamentos WHERE estatus = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdUsuario($value){
		$sql = 'DELETE FROM apartamentos WHERE id_usuario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTarifaBase($value){
		$sql = 'DELETE FROM apartamentos WHERE tarifa_base = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTarifaSemana($value){
		$sql = 'DELETE FROM apartamentos WHERE tarifa_semana = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTarifaMes($value){
		$sql = 'DELETE FROM apartamentos WHERE tarifa_mes = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEstadiaMaxima($value){
		$sql = 'DELETE FROM apartamentos WHERE estadia_maxima = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEstadiaMinima($value){
		$sql = 'DELETE FROM apartamentos WHERE estadia_minima = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByHuespedAdicionalApartir($value){
		$sql = 'DELETE FROM apartamentos WHERE huesped_adicional_apartir = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByHuespedAdicionalCosto($value){
		$sql = 'DELETE FROM apartamentos WHERE huesped_adicional_costo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCostoLimpieza($value){
		$sql = 'DELETE FROM apartamentos WHERE costo_limpieza = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDepositoSeguridad($value){
		$sql = 'DELETE FROM apartamentos WHERE deposito_seguridad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPrecioFinSemana($value){
		$sql = 'DELETE FROM apartamentos WHERE precio_fin_semana = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNormas($value){
		$sql = 'DELETE FROM apartamentos WHERE normas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTamanio($value){
		$sql = 'DELETE FROM apartamentos WHERE tamanio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCapacidadPersonas($value){
		$sql = 'DELETE FROM apartamentos WHERE capacidad_personas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByHabitaciones($value){
		$sql = 'DELETE FROM apartamentos WHERE habitaciones = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCamas($value){
		$sql = 'DELETE FROM apartamentos WHERE camas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTipoCama($value){
		$sql = 'DELETE FROM apartamentos WHERE tipo_cama = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBanio($value){
		$sql = 'DELETE FROM apartamentos WHERE banio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMascotas($value){
		$sql = 'DELETE FROM apartamentos WHERE mascotas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByManual($value){
		$sql = 'DELETE FROM apartamentos WHERE manual = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCantidad($value){
		$sql = 'DELETE FROM apartamentos WHERE cantidad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCodigo($value){
		$sql = 'DELETE FROM apartamentos WHERE codigo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdPoliticaCancelacion($value){
		$sql = 'DELETE FROM apartamentos WHERE id_politica_cancelacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdApartamentoDescripcion($value){
		$sql = 'DELETE FROM apartamentos WHERE id_apartamento_descripcion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByClaveWifi($value){
		$sql = 'DELETE FROM apartamentos WHERE clave_wifi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdComplejo($value){
		$sql = 'DELETE FROM apartamentos WHERE id_complejo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByVisitas($value){
		$sql = 'DELETE FROM apartamentos WHERE visitas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTpv($value){
		$sql = 'DELETE FROM apartamentos WHERE tpv = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ApartamentosMySql 
	 */
	protected function readRow($row){
		$apartamento = new Apartamento();
		
		$apartamento->idApartamento = $row['id_apartamento'];
		$apartamento->idEmpresaContrato = $row['id_empresa_contrato'];
		$apartamento->nombre = $row['nombre'];
		$apartamento->idApartamentosTipo = $row['id_apartamentos_tipo'];
		$apartamento->idDireccion = $row['id_direccion'];
		$apartamento->idMoneda = $row['id_moneda'];
		$apartamento->horarioEntrada = $row['horario_entrada'];
		$apartamento->horarioSalida = $row['horario_salida'];
		$apartamento->descripcionCorta = $row['descripcion_corta'];
		$apartamento->descripcionLarga = $row['descripcion_larga'];
		$apartamento->idIdioma = $row['id_idioma'];
		$apartamento->descripcionServicios = $row['descripcion_servicios'];
		$apartamento->descripcionCondiciones = $row['descripcion_condiciones'];
		$apartamento->tiempoCreacion = $row['tiempo_creacion'];
		$apartamento->ultimaModificacion = $row['ultima_modificacion'];
		$apartamento->estatus = $row['estatus'];
		$apartamento->idUsuario = $row['id_usuario'];
		$apartamento->tarifaBase = $row['tarifa_base'];
		$apartamento->tarifaSemana = $row['tarifa_semana'];
		$apartamento->tarifaMes = $row['tarifa_mes'];
		$apartamento->estadiaMaxima = $row['estadia_maxima'];
		$apartamento->estadiaMinima = $row['estadia_minima'];
		$apartamento->huespedAdicionalApartir = $row['huesped_adicional_apartir'];
		$apartamento->huespedAdicionalCosto = $row['huesped_adicional_costo'];
		$apartamento->costoLimpieza = $row['costo_limpieza'];
		$apartamento->depositoSeguridad = $row['deposito_seguridad'];
		$apartamento->precioFinSemana = $row['precio_fin_semana'];
		$apartamento->normas = $row['normas'];
		$apartamento->tamanio = $row['tamanio'];
		$apartamento->capacidadPersonas = $row['capacidad_personas'];
		$apartamento->habitaciones = $row['habitaciones'];
		$apartamento->camas = $row['camas'];
		$apartamento->tipoCama = $row['tipo_cama'];
		$apartamento->banio = $row['banio'];
		$apartamento->mascotas = $row['mascotas'];
		$apartamento->manual = $row['manual'];
		$apartamento->cantidad = $row['cantidad'];
		$apartamento->codigo = $row['codigo'];
		$apartamento->idPoliticaCancelacion = $row['id_politica_cancelacion'];
		$apartamento->idApartamentoDescripcion = $row['id_apartamento_descripcion'];
		$apartamento->claveWifi = $row['clave_wifi'];
		$apartamento->idComplejo = $row['id_complejo'];
		$apartamento->visitas = $row['visitas'];
		$apartamento->tpv = $row['tpv'];

		return $apartamento;
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
	 * @return ApartamentosMySql 
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
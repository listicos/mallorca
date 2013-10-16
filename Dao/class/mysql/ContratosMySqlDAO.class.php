<?php
/**
 * Class that operate on table 'contratos'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-10-01 15:39
 */
class ContratosMySqlDAO implements ContratosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ContratosMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM contratos WHERE id_contrato = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM contratos';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM contratos ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param contrato primary key
 	 */
	public function delete($id_contrato){
		$sql = 'DELETE FROM contratos WHERE id_contrato = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_contrato);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ContratosMySql contrato
 	 */
	public function insert($contrato){
		$sql = 'INSERT INTO contratos (nombre, tiempo_creacion, ultima_modificacion, precio, porcentaje, descripcion, semana_gratis, especiales, reservas_ultimo_minuto, reservas_anticipadas, alquileres_larga_estancia, firmado) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($contrato->nombre);
		$sqlQuery->set($contrato->tiempoCreacion);
		$sqlQuery->set($contrato->ultimaModificacion);
		$sqlQuery->set($contrato->precio);
		$sqlQuery->set($contrato->porcentaje);
		$sqlQuery->set($contrato->descripcion);
		$sqlQuery->setNumber($contrato->semanaGratis);
		$sqlQuery->setNumber($contrato->especiales);
		$sqlQuery->setNumber($contrato->reservasUltimoMinuto);
		$sqlQuery->setNumber($contrato->reservasAnticipadas);
		$sqlQuery->setNumber($contrato->alquileresLargaEstancia);
		$sqlQuery->setNumber($contrato->firmado);

		$id = $this->executeInsert($sqlQuery);	
		$contrato->idContrato = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ContratosMySql contrato
 	 */
	public function update($contrato){
		$sql = 'UPDATE contratos SET nombre = ?, tiempo_creacion = ?, ultima_modificacion = ?, precio = ?, porcentaje = ?, descripcion = ?, semana_gratis = ?, especiales = ?, reservas_ultimo_minuto = ?, reservas_anticipadas = ?, alquileres_larga_estancia = ?, firmado = ? WHERE id_contrato = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($contrato->nombre);
		$sqlQuery->set($contrato->tiempoCreacion);
		$sqlQuery->set($contrato->ultimaModificacion);
		$sqlQuery->set($contrato->precio);
		$sqlQuery->set($contrato->porcentaje);
		$sqlQuery->set($contrato->descripcion);
		$sqlQuery->setNumber($contrato->semanaGratis);
		$sqlQuery->setNumber($contrato->especiales);
		$sqlQuery->setNumber($contrato->reservasUltimoMinuto);
		$sqlQuery->setNumber($contrato->reservasAnticipadas);
		$sqlQuery->setNumber($contrato->alquileresLargaEstancia);
		$sqlQuery->setNumber($contrato->firmado);

		$sqlQuery->setNumber($contrato->idContrato);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM contratos';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNombre($value){
		$sql = 'SELECT * FROM contratos WHERE nombre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTiempoCreacion($value){
		$sql = 'SELECT * FROM contratos WHERE tiempo_creacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUltimaModificacion($value){
		$sql = 'SELECT * FROM contratos WHERE ultima_modificacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPrecio($value){
		$sql = 'SELECT * FROM contratos WHERE precio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPorcentaje($value){
		$sql = 'SELECT * FROM contratos WHERE porcentaje = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescripcion($value){
		$sql = 'SELECT * FROM contratos WHERE descripcion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySemanaGratis($value){
		$sql = 'SELECT * FROM contratos WHERE semana_gratis = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEspeciales($value){
		$sql = 'SELECT * FROM contratos WHERE especiales = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByReservasUltimoMinuto($value){
		$sql = 'SELECT * FROM contratos WHERE reservas_ultimo_minuto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByReservasAnticipadas($value){
		$sql = 'SELECT * FROM contratos WHERE reservas_anticipadas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAlquileresLargaEstancia($value){
		$sql = 'SELECT * FROM contratos WHERE alquileres_larga_estancia = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFirmado($value){
		$sql = 'SELECT * FROM contratos WHERE firmado = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNombre($value){
		$sql = 'DELETE FROM contratos WHERE nombre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTiempoCreacion($value){
		$sql = 'DELETE FROM contratos WHERE tiempo_creacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUltimaModificacion($value){
		$sql = 'DELETE FROM contratos WHERE ultima_modificacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPrecio($value){
		$sql = 'DELETE FROM contratos WHERE precio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPorcentaje($value){
		$sql = 'DELETE FROM contratos WHERE porcentaje = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescripcion($value){
		$sql = 'DELETE FROM contratos WHERE descripcion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySemanaGratis($value){
		$sql = 'DELETE FROM contratos WHERE semana_gratis = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEspeciales($value){
		$sql = 'DELETE FROM contratos WHERE especiales = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByReservasUltimoMinuto($value){
		$sql = 'DELETE FROM contratos WHERE reservas_ultimo_minuto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByReservasAnticipadas($value){
		$sql = 'DELETE FROM contratos WHERE reservas_anticipadas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAlquileresLargaEstancia($value){
		$sql = 'DELETE FROM contratos WHERE alquileres_larga_estancia = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFirmado($value){
		$sql = 'DELETE FROM contratos WHERE firmado = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ContratosMySql 
	 */
	protected function readRow($row){
		$contrato = new Contrato();
		
		$contrato->idContrato = $row['id_contrato'];
		$contrato->nombre = $row['nombre'];
		$contrato->tiempoCreacion = $row['tiempo_creacion'];
		$contrato->ultimaModificacion = $row['ultima_modificacion'];
		$contrato->precio = $row['precio'];
		$contrato->porcentaje = $row['porcentaje'];
		$contrato->descripcion = $row['descripcion'];
		$contrato->semanaGratis = $row['semana_gratis'];
		$contrato->especiales = $row['especiales'];
		$contrato->reservasUltimoMinuto = $row['reservas_ultimo_minuto'];
		$contrato->reservasAnticipadas = $row['reservas_anticipadas'];
		$contrato->alquileresLargaEstancia = $row['alquileres_larga_estancia'];
		$contrato->firmado = $row['firmado'];

		return $contrato;
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
	 * @return ContratosMySql 
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
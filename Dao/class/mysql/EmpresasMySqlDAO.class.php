<?php
/**
 * Class that operate on table 'empresas'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-10-18 16:11
 */
class EmpresasMySqlDAO implements EmpresasDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return EmpresasMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM empresas WHERE id_empresa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM empresas';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM empresas ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param empresa primary key
 	 */
	public function delete($id_empresa){
		$sql = 'DELETE FROM empresas WHERE id_empresa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_empresa);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param EmpresasMySql empresa
 	 */
	public function insert($empresa){
		$sql = 'INSERT INTO empresas (nombre, apellido_paterno, apellido_materno, nombre_fiscal, cif, id_direccion, tiempo_creacion, ultima_modificacion, email, email_facturacion, telefono, telefono_alterno, id_direccion_facturacion) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($empresa->nombre);
		$sqlQuery->set($empresa->apellidoPaterno);
		$sqlQuery->set($empresa->apellidoMaterno);
		$sqlQuery->set($empresa->nombreFiscal);
		$sqlQuery->set($empresa->cif);
		$sqlQuery->setNumber($empresa->idDireccion);
		$sqlQuery->set($empresa->tiempoCreacion);
		$sqlQuery->set($empresa->ultimaModificacion);
		$sqlQuery->set($empresa->email);
		$sqlQuery->set($empresa->emailFacturacion);
		$sqlQuery->set($empresa->telefono);
		$sqlQuery->set($empresa->telefonoAlterno);
		$sqlQuery->setNumber($empresa->idDireccionFacturacion);

		$id = $this->executeInsert($sqlQuery);	
		$empresa->idEmpresa = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param EmpresasMySql empresa
 	 */
	public function update($empresa){
		$sql = 'UPDATE empresas SET nombre = ?, apellido_paterno = ?, apellido_materno = ?, nombre_fiscal = ?, cif = ?, id_direccion = ?, tiempo_creacion = ?, ultima_modificacion = ?, email = ?, email_facturacion = ?, telefono = ?, telefono_alterno = ?, id_direccion_facturacion = ? WHERE id_empresa = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($empresa->nombre);
		$sqlQuery->set($empresa->apellidoPaterno);
		$sqlQuery->set($empresa->apellidoMaterno);
		$sqlQuery->set($empresa->nombreFiscal);
		$sqlQuery->set($empresa->cif);
		$sqlQuery->setNumber($empresa->idDireccion);
		$sqlQuery->set($empresa->tiempoCreacion);
		$sqlQuery->set($empresa->ultimaModificacion);
		$sqlQuery->set($empresa->email);
		$sqlQuery->set($empresa->emailFacturacion);
		$sqlQuery->set($empresa->telefono);
		$sqlQuery->set($empresa->telefonoAlterno);
		$sqlQuery->setNumber($empresa->idDireccionFacturacion);

		$sqlQuery->setNumber($empresa->idEmpresa);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM empresas';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNombre($value){
		$sql = 'SELECT * FROM empresas WHERE nombre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByApellidoPaterno($value){
		$sql = 'SELECT * FROM empresas WHERE apellido_paterno = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByApellidoMaterno($value){
		$sql = 'SELECT * FROM empresas WHERE apellido_materno = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNombreFiscal($value){
		$sql = 'SELECT * FROM empresas WHERE nombre_fiscal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCif($value){
		$sql = 'SELECT * FROM empresas WHERE cif = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdDireccion($value){
		$sql = 'SELECT * FROM empresas WHERE id_direccion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTiempoCreacion($value){
		$sql = 'SELECT * FROM empresas WHERE tiempo_creacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUltimaModificacion($value){
		$sql = 'SELECT * FROM empresas WHERE ultima_modificacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEmail($value){
		$sql = 'SELECT * FROM empresas WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEmailFacturacion($value){
		$sql = 'SELECT * FROM empresas WHERE email_facturacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTelefono($value){
		$sql = 'SELECT * FROM empresas WHERE telefono = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTelefonoAlterno($value){
		$sql = 'SELECT * FROM empresas WHERE telefono_alterno = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdDireccionFacturacion($value){
		$sql = 'SELECT * FROM empresas WHERE id_direccion_facturacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNombre($value){
		$sql = 'DELETE FROM empresas WHERE nombre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByApellidoPaterno($value){
		$sql = 'DELETE FROM empresas WHERE apellido_paterno = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByApellidoMaterno($value){
		$sql = 'DELETE FROM empresas WHERE apellido_materno = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNombreFiscal($value){
		$sql = 'DELETE FROM empresas WHERE nombre_fiscal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCif($value){
		$sql = 'DELETE FROM empresas WHERE cif = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdDireccion($value){
		$sql = 'DELETE FROM empresas WHERE id_direccion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTiempoCreacion($value){
		$sql = 'DELETE FROM empresas WHERE tiempo_creacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUltimaModificacion($value){
		$sql = 'DELETE FROM empresas WHERE ultima_modificacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEmail($value){
		$sql = 'DELETE FROM empresas WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEmailFacturacion($value){
		$sql = 'DELETE FROM empresas WHERE email_facturacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTelefono($value){
		$sql = 'DELETE FROM empresas WHERE telefono = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTelefonoAlterno($value){
		$sql = 'DELETE FROM empresas WHERE telefono_alterno = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdDireccionFacturacion($value){
		$sql = 'DELETE FROM empresas WHERE id_direccion_facturacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return EmpresasMySql 
	 */
	protected function readRow($row){
		$empresa = new Empresa();
		
		$empresa->idEmpresa = $row['id_empresa'];
		$empresa->nombre = $row['nombre'];
		$empresa->apellidoPaterno = $row['apellido_paterno'];
		$empresa->apellidoMaterno = $row['apellido_materno'];
		$empresa->nombreFiscal = $row['nombre_fiscal'];
		$empresa->cif = $row['cif'];
		$empresa->idDireccion = $row['id_direccion'];
		$empresa->tiempoCreacion = $row['tiempo_creacion'];
		$empresa->ultimaModificacion = $row['ultima_modificacion'];
		$empresa->email = $row['email'];
		$empresa->emailFacturacion = $row['email_facturacion'];
		$empresa->telefono = $row['telefono'];
		$empresa->telefonoAlterno = $row['telefono_alterno'];
		$empresa->idDireccionFacturacion = $row['id_direccion_facturacion'];

		return $empresa;
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
	 * @return EmpresasMySql 
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
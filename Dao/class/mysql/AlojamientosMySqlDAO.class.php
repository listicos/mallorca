<?php
/**
 * Class that operate on table 'alojamientos'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-10-18 16:11
 */
class AlojamientosMySqlDAO implements AlojamientosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return AlojamientosMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM alojamientos WHERE id_alojamiento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM alojamientos';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM alojamientos ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param alojamiento primary key
 	 */
	public function delete($id_alojamiento){
		$sql = 'DELETE FROM alojamientos WHERE id_alojamiento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_alojamiento);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param AlojamientosMySql alojamiento
 	 */
	public function insert($alojamiento){
		$sql = 'INSERT INTO alojamientos (nombre, codigo, pax_minimo, pax_maximo, pax_bebe_maximo, pax_ninios_minimo, pax_ninios_maximo, pax_adultos_maximo, pax_adultos_minimo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($alojamiento->nombre);
		$sqlQuery->set($alojamiento->codigo);
		$sqlQuery->setNumber($alojamiento->paxMinimo);
		$sqlQuery->setNumber($alojamiento->paxMaximo);
		$sqlQuery->set($alojamiento->paxBebeMaximo);
		$sqlQuery->set($alojamiento->paxNiniosMinimo);
		$sqlQuery->set($alojamiento->paxNiniosMaximo);
		$sqlQuery->set($alojamiento->paxAdultosMaximo);
		$sqlQuery->set($alojamiento->paxAdultosMinimo);

		$id = $this->executeInsert($sqlQuery);	
		$alojamiento->idAlojamiento = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param AlojamientosMySql alojamiento
 	 */
	public function update($alojamiento){
		$sql = 'UPDATE alojamientos SET nombre = ?, codigo = ?, pax_minimo = ?, pax_maximo = ?, pax_bebe_maximo = ?, pax_ninios_minimo = ?, pax_ninios_maximo = ?, pax_adultos_maximo = ?, pax_adultos_minimo = ? WHERE id_alojamiento = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($alojamiento->nombre);
		$sqlQuery->set($alojamiento->codigo);
		$sqlQuery->setNumber($alojamiento->paxMinimo);
		$sqlQuery->setNumber($alojamiento->paxMaximo);
		$sqlQuery->set($alojamiento->paxBebeMaximo);
		$sqlQuery->set($alojamiento->paxNiniosMinimo);
		$sqlQuery->set($alojamiento->paxNiniosMaximo);
		$sqlQuery->set($alojamiento->paxAdultosMaximo);
		$sqlQuery->set($alojamiento->paxAdultosMinimo);

		$sqlQuery->setNumber($alojamiento->idAlojamiento);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM alojamientos';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNombre($value){
		$sql = 'SELECT * FROM alojamientos WHERE nombre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCodigo($value){
		$sql = 'SELECT * FROM alojamientos WHERE codigo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPaxMinimo($value){
		$sql = 'SELECT * FROM alojamientos WHERE pax_minimo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPaxMaximo($value){
		$sql = 'SELECT * FROM alojamientos WHERE pax_maximo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPaxBebeMaximo($value){
		$sql = 'SELECT * FROM alojamientos WHERE pax_bebe_maximo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPaxNiniosMinimo($value){
		$sql = 'SELECT * FROM alojamientos WHERE pax_ninios_minimo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPaxNiniosMaximo($value){
		$sql = 'SELECT * FROM alojamientos WHERE pax_ninios_maximo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPaxAdultosMaximo($value){
		$sql = 'SELECT * FROM alojamientos WHERE pax_adultos_maximo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPaxAdultosMinimo($value){
		$sql = 'SELECT * FROM alojamientos WHERE pax_adultos_minimo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNombre($value){
		$sql = 'DELETE FROM alojamientos WHERE nombre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCodigo($value){
		$sql = 'DELETE FROM alojamientos WHERE codigo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPaxMinimo($value){
		$sql = 'DELETE FROM alojamientos WHERE pax_minimo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPaxMaximo($value){
		$sql = 'DELETE FROM alojamientos WHERE pax_maximo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPaxBebeMaximo($value){
		$sql = 'DELETE FROM alojamientos WHERE pax_bebe_maximo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPaxNiniosMinimo($value){
		$sql = 'DELETE FROM alojamientos WHERE pax_ninios_minimo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPaxNiniosMaximo($value){
		$sql = 'DELETE FROM alojamientos WHERE pax_ninios_maximo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPaxAdultosMaximo($value){
		$sql = 'DELETE FROM alojamientos WHERE pax_adultos_maximo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPaxAdultosMinimo($value){
		$sql = 'DELETE FROM alojamientos WHERE pax_adultos_minimo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return AlojamientosMySql 
	 */
	protected function readRow($row){
		$alojamiento = new Alojamiento();
		
		$alojamiento->idAlojamiento = $row['id_alojamiento'];
		$alojamiento->nombre = $row['nombre'];
		$alojamiento->codigo = $row['codigo'];
		$alojamiento->paxMinimo = $row['pax_minimo'];
		$alojamiento->paxMaximo = $row['pax_maximo'];
		$alojamiento->paxBebeMaximo = $row['pax_bebe_maximo'];
		$alojamiento->paxNiniosMinimo = $row['pax_ninios_minimo'];
		$alojamiento->paxNiniosMaximo = $row['pax_ninios_maximo'];
		$alojamiento->paxAdultosMaximo = $row['pax_adultos_maximo'];
		$alojamiento->paxAdultosMinimo = $row['pax_adultos_minimo'];

		return $alojamiento;
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
	 * @return AlojamientosMySql 
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
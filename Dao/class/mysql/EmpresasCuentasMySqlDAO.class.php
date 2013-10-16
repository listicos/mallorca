<?php
/**
 * Class that operate on table 'empresas_cuentas'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-10-01 15:39
 */
class EmpresasCuentasMySqlDAO implements EmpresasCuentasDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return EmpresasCuentasMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM empresas_cuentas WHERE id_empresa_cuenta = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM empresas_cuentas';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM empresas_cuentas ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param empresasCuenta primary key
 	 */
	public function delete($id_empresa_cuenta){
		$sql = 'DELETE FROM empresas_cuentas WHERE id_empresa_cuenta = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_empresa_cuenta);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param EmpresasCuentasMySql empresasCuenta
 	 */
	public function insert($empresasCuenta){
		$sql = 'INSERT INTO empresas_cuentas (id_empresa, id_cuenta) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($empresasCuenta->idEmpresa);
		$sqlQuery->setNumber($empresasCuenta->idCuenta);

		$id = $this->executeInsert($sqlQuery);	
		$empresasCuenta->idEmpresaCuenta = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param EmpresasCuentasMySql empresasCuenta
 	 */
	public function update($empresasCuenta){
		$sql = 'UPDATE empresas_cuentas SET id_empresa = ?, id_cuenta = ? WHERE id_empresa_cuenta = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($empresasCuenta->idEmpresa);
		$sqlQuery->setNumber($empresasCuenta->idCuenta);

		$sqlQuery->setNumber($empresasCuenta->idEmpresaCuenta);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM empresas_cuentas';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIdEmpresa($value){
		$sql = 'SELECT * FROM empresas_cuentas WHERE id_empresa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdCuenta($value){
		$sql = 'SELECT * FROM empresas_cuentas WHERE id_cuenta = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIdEmpresa($value){
		$sql = 'DELETE FROM empresas_cuentas WHERE id_empresa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdCuenta($value){
		$sql = 'DELETE FROM empresas_cuentas WHERE id_cuenta = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return EmpresasCuentasMySql 
	 */
	protected function readRow($row){
		$empresasCuenta = new EmpresasCuenta();
		
		$empresasCuenta->idEmpresa = $row['id_empresa'];
		$empresasCuenta->idCuenta = $row['id_cuenta'];
		$empresasCuenta->idEmpresaCuenta = $row['id_empresa_cuenta'];

		return $empresasCuenta;
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
	 * @return EmpresasCuentasMySql 
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
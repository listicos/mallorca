<?php
/**
 * Class that operate on table 'huespedes_cuentas'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-10-01 15:39
 */
class HuespedesCuentasMySqlDAO implements HuespedesCuentasDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return HuespedesCuentasMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM huespedes_cuentas WHERE id_huesped_cuenta = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM huespedes_cuentas';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM huespedes_cuentas ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param huespedesCuenta primary key
 	 */
	public function delete($id_huesped_cuenta){
		$sql = 'DELETE FROM huespedes_cuentas WHERE id_huesped_cuenta = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_huesped_cuenta);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param HuespedesCuentasMySql huespedesCuenta
 	 */
	public function insert($huespedesCuenta){
		$sql = 'INSERT INTO huespedes_cuentas (id_huesped, id_cuenta) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($huespedesCuenta->idHuesped);
		$sqlQuery->setNumber($huespedesCuenta->idCuenta);

		$id = $this->executeInsert($sqlQuery);	
		$huespedesCuenta->idHuespedCuenta = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param HuespedesCuentasMySql huespedesCuenta
 	 */
	public function update($huespedesCuenta){
		$sql = 'UPDATE huespedes_cuentas SET id_huesped = ?, id_cuenta = ? WHERE id_huesped_cuenta = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($huespedesCuenta->idHuesped);
		$sqlQuery->setNumber($huespedesCuenta->idCuenta);

		$sqlQuery->setNumber($huespedesCuenta->idHuespedCuenta);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM huespedes_cuentas';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIdHuesped($value){
		$sql = 'SELECT * FROM huespedes_cuentas WHERE id_huesped = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdCuenta($value){
		$sql = 'SELECT * FROM huespedes_cuentas WHERE id_cuenta = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIdHuesped($value){
		$sql = 'DELETE FROM huespedes_cuentas WHERE id_huesped = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdCuenta($value){
		$sql = 'DELETE FROM huespedes_cuentas WHERE id_cuenta = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return HuespedesCuentasMySql 
	 */
	protected function readRow($row){
		$huespedesCuenta = new HuespedesCuenta();
		
		$huespedesCuenta->idHuesped = $row['id_huesped'];
		$huespedesCuenta->idCuenta = $row['id_cuenta'];
		$huespedesCuenta->idHuespedCuenta = $row['id_huesped_cuenta'];

		return $huespedesCuenta;
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
	 * @return HuespedesCuentasMySql 
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
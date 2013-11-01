<?php
/**
 * Class that operate on table 'cuentas'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-10-18 16:11
 */
class CuentasMySqlDAO implements CuentasDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return CuentasMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM cuentas WHERE id_cuenta = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM cuentas';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM cuentas ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param cuenta primary key
 	 */
	public function delete($id_cuenta){
		$sql = 'DELETE FROM cuentas WHERE id_cuenta = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_cuenta);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CuentasMySql cuenta
 	 */
	public function insert($cuenta){
		$sql = 'INSERT INTO cuentas (iban, swif, id_moneda, titular, cvv, c_d, c_a, numero, tipo_tarjeta, caducidad_mes, caducidad_anio, paypal, tipo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($cuenta->iban);
		$sqlQuery->set($cuenta->swif);
		$sqlQuery->setNumber($cuenta->idMoneda);
		$sqlQuery->set($cuenta->titular);
		$sqlQuery->set($cuenta->cvv);
		$sqlQuery->setNumber($cuenta->cD);
		$sqlQuery->setNumber($cuenta->cA);
		$sqlQuery->set($cuenta->numero);
		$sqlQuery->set($cuenta->tipoTarjeta);
		$sqlQuery->setNumber($cuenta->caducidadMes);
		$sqlQuery->setNumber($cuenta->caducidadAnio);
		$sqlQuery->set($cuenta->paypal);
		$sqlQuery->set($cuenta->tipo);

		$id = $this->executeInsert($sqlQuery);	
		$cuenta->idCuenta = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param CuentasMySql cuenta
 	 */
	public function update($cuenta){
		$sql = 'UPDATE cuentas SET iban = ?, swif = ?, id_moneda = ?, titular = ?, cvv = ?, c_d = ?, c_a = ?, numero = ?, tipo_tarjeta = ?, caducidad_mes = ?, caducidad_anio = ?, paypal = ?, tipo = ? WHERE id_cuenta = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($cuenta->iban);
		$sqlQuery->set($cuenta->swif);
		$sqlQuery->setNumber($cuenta->idMoneda);
		$sqlQuery->set($cuenta->titular);
		$sqlQuery->set($cuenta->cvv);
		$sqlQuery->setNumber($cuenta->cD);
		$sqlQuery->setNumber($cuenta->cA);
		$sqlQuery->set($cuenta->numero);
		$sqlQuery->set($cuenta->tipoTarjeta);
		$sqlQuery->setNumber($cuenta->caducidadMes);
		$sqlQuery->setNumber($cuenta->caducidadAnio);
		$sqlQuery->set($cuenta->paypal);
		$sqlQuery->set($cuenta->tipo);

		$sqlQuery->setNumber($cuenta->idCuenta);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM cuentas';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIban($value){
		$sql = 'SELECT * FROM cuentas WHERE iban = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySwif($value){
		$sql = 'SELECT * FROM cuentas WHERE swif = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdMoneda($value){
		$sql = 'SELECT * FROM cuentas WHERE id_moneda = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTitular($value){
		$sql = 'SELECT * FROM cuentas WHERE titular = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCvv($value){
		$sql = 'SELECT * FROM cuentas WHERE cvv = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCD($value){
		$sql = 'SELECT * FROM cuentas WHERE c_d = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCA($value){
		$sql = 'SELECT * FROM cuentas WHERE c_a = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNumero($value){
		$sql = 'SELECT * FROM cuentas WHERE numero = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTipoTarjeta($value){
		$sql = 'SELECT * FROM cuentas WHERE tipo_tarjeta = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCaducidadMes($value){
		$sql = 'SELECT * FROM cuentas WHERE caducidad_mes = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCaducidadAnio($value){
		$sql = 'SELECT * FROM cuentas WHERE caducidad_anio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPaypal($value){
		$sql = 'SELECT * FROM cuentas WHERE paypal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTipo($value){
		$sql = 'SELECT * FROM cuentas WHERE tipo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIban($value){
		$sql = 'DELETE FROM cuentas WHERE iban = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySwif($value){
		$sql = 'DELETE FROM cuentas WHERE swif = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdMoneda($value){
		$sql = 'DELETE FROM cuentas WHERE id_moneda = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTitular($value){
		$sql = 'DELETE FROM cuentas WHERE titular = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCvv($value){
		$sql = 'DELETE FROM cuentas WHERE cvv = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCD($value){
		$sql = 'DELETE FROM cuentas WHERE c_d = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCA($value){
		$sql = 'DELETE FROM cuentas WHERE c_a = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNumero($value){
		$sql = 'DELETE FROM cuentas WHERE numero = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTipoTarjeta($value){
		$sql = 'DELETE FROM cuentas WHERE tipo_tarjeta = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCaducidadMes($value){
		$sql = 'DELETE FROM cuentas WHERE caducidad_mes = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCaducidadAnio($value){
		$sql = 'DELETE FROM cuentas WHERE caducidad_anio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPaypal($value){
		$sql = 'DELETE FROM cuentas WHERE paypal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTipo($value){
		$sql = 'DELETE FROM cuentas WHERE tipo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return CuentasMySql 
	 */
	protected function readRow($row){
		$cuenta = new Cuenta();
		
		$cuenta->idCuenta = $row['id_cuenta'];
		$cuenta->iban = $row['iban'];
		$cuenta->swif = $row['swif'];
		$cuenta->idMoneda = $row['id_moneda'];
		$cuenta->titular = $row['titular'];
		$cuenta->cvv = $row['cvv'];
		$cuenta->cD = $row['c_d'];
		$cuenta->cA = $row['c_a'];
		$cuenta->numero = $row['numero'];
		$cuenta->tipoTarjeta = $row['tipo_tarjeta'];
		$cuenta->caducidadMes = $row['caducidad_mes'];
		$cuenta->caducidadAnio = $row['caducidad_anio'];
		$cuenta->paypal = $row['paypal'];
		$cuenta->tipo = $row['tipo'];

		return $cuenta;
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
	 * @return CuentasMySql 
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
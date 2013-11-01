<?php
/**
 * Class that operate on table 'apartamentos_pagos_tipos'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-10-18 16:11
 */
class ApartamentosPagosTiposMySqlDAO implements ApartamentosPagosTiposDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ApartamentosPagosTiposMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM apartamentos_pagos_tipos WHERE id_apartamento_pago_tipo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM apartamentos_pagos_tipos';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM apartamentos_pagos_tipos ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param apartamentosPagosTipo primary key
 	 */
	public function delete($id_apartamento_pago_tipo){
		$sql = 'DELETE FROM apartamentos_pagos_tipos WHERE id_apartamento_pago_tipo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_apartamento_pago_tipo);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ApartamentosPagosTiposMySql apartamentosPagosTipo
 	 */
	public function insert($apartamentosPagosTipo){
		$sql = 'INSERT INTO apartamentos_pagos_tipos (id_apartamento, id_pago_tipo) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($apartamentosPagosTipo->idApartamento);
		$sqlQuery->setNumber($apartamentosPagosTipo->idPagoTipo);

		$id = $this->executeInsert($sqlQuery);	
		$apartamentosPagosTipo->idApartamentoPagoTipo = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ApartamentosPagosTiposMySql apartamentosPagosTipo
 	 */
	public function update($apartamentosPagosTipo){
		$sql = 'UPDATE apartamentos_pagos_tipos SET id_apartamento = ?, id_pago_tipo = ? WHERE id_apartamento_pago_tipo = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($apartamentosPagosTipo->idApartamento);
		$sqlQuery->setNumber($apartamentosPagosTipo->idPagoTipo);

		$sqlQuery->setNumber($apartamentosPagosTipo->idApartamentoPagoTipo);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM apartamentos_pagos_tipos';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIdApartamento($value){
		$sql = 'SELECT * FROM apartamentos_pagos_tipos WHERE id_apartamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdPagoTipo($value){
		$sql = 'SELECT * FROM apartamentos_pagos_tipos WHERE id_pago_tipo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIdApartamento($value){
		$sql = 'DELETE FROM apartamentos_pagos_tipos WHERE id_apartamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdPagoTipo($value){
		$sql = 'DELETE FROM apartamentos_pagos_tipos WHERE id_pago_tipo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ApartamentosPagosTiposMySql 
	 */
	protected function readRow($row){
		$apartamentosPagosTipo = new ApartamentosPagosTipo();
		
		$apartamentosPagosTipo->idApartamento = $row['id_apartamento'];
		$apartamentosPagosTipo->idPagoTipo = $row['id_pago_tipo'];
		$apartamentosPagosTipo->idApartamentoPagoTipo = $row['id_apartamento_pago_tipo'];

		return $apartamentosPagosTipo;
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
	 * @return ApartamentosPagosTiposMySql 
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
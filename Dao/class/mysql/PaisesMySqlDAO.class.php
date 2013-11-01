<?php
/**
 * Class that operate on table 'paises'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-10-18 16:11
 */
class PaisesMySqlDAO implements PaisesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return PaisesMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM paises WHERE id_pais = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM paises';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM paises ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param paise primary key
 	 */
	public function delete($id_pais){
		$sql = 'DELETE FROM paises WHERE id_pais = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_pais);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PaisesMySql paise
 	 */
	public function insert($paise){
		$sql = 'INSERT INTO paises (codigo, nombre_completo, iso3, nombre, numero) VALUES (?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($paise->codigo);
		$sqlQuery->set($paise->nombreCompleto);
		$sqlQuery->set($paise->iso3);
		$sqlQuery->set($paise->nombre);
		$sqlQuery->set($paise->numero);

		$id = $this->executeInsert($sqlQuery);	
		$paise->idPais = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param PaisesMySql paise
 	 */
	public function update($paise){
		$sql = 'UPDATE paises SET codigo = ?, nombre_completo = ?, iso3 = ?, nombre = ?, numero = ? WHERE id_pais = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($paise->codigo);
		$sqlQuery->set($paise->nombreCompleto);
		$sqlQuery->set($paise->iso3);
		$sqlQuery->set($paise->nombre);
		$sqlQuery->set($paise->numero);

		$sqlQuery->setNumber($paise->idPais);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM paises';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByCodigo($value){
		$sql = 'SELECT * FROM paises WHERE codigo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNombreCompleto($value){
		$sql = 'SELECT * FROM paises WHERE nombre_completo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIso3($value){
		$sql = 'SELECT * FROM paises WHERE iso3 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNombre($value){
		$sql = 'SELECT * FROM paises WHERE nombre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNumero($value){
		$sql = 'SELECT * FROM paises WHERE numero = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByCodigo($value){
		$sql = 'DELETE FROM paises WHERE codigo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNombreCompleto($value){
		$sql = 'DELETE FROM paises WHERE nombre_completo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIso3($value){
		$sql = 'DELETE FROM paises WHERE iso3 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNombre($value){
		$sql = 'DELETE FROM paises WHERE nombre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNumero($value){
		$sql = 'DELETE FROM paises WHERE numero = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return PaisesMySql 
	 */
	protected function readRow($row){
		$paise = new Paise();
		
		$paise->idPais = $row['id_pais'];
		$paise->codigo = $row['codigo'];
		$paise->nombreCompleto = $row['nombre_completo'];
		$paise->iso3 = $row['iso3'];
		$paise->nombre = $row['nombre'];
		$paise->numero = $row['numero'];

		return $paise;
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
	 * @return PaisesMySql 
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
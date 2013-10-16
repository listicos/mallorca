<?php
/**
 * Class that operate on table 'disponbilidades'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-06-12 21:16
 */
class DisponbilidadesMySqlDAO implements DisponbilidadesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return DisponbilidadesMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM disponbilidades WHERE id_disponibilidad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM disponbilidades';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM disponbilidades ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param disponbilidade primary key
 	 */
	public function delete($id_disponibilidad){
		$sql = 'DELETE FROM disponbilidades WHERE id_disponibilidad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_disponibilidad);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param DisponbilidadesMySql disponbilidade
 	 */
	public function insert($disponbilidade){
		$sql = 'INSERT INTO disponbilidades (fecha_inicio, fecha_final, precio, precio_fin_semana, estatus, id_apartamento, anotacion) VALUES (?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($disponbilidade->fechaInicio);
		$sqlQuery->set($disponbilidade->fechaFinal);
		$sqlQuery->set($disponbilidade->precio);
		$sqlQuery->set($disponbilidade->precioFinSemana);
		$sqlQuery->set($disponbilidade->estatus);
		$sqlQuery->setNumber($disponbilidade->idApartamento);
		$sqlQuery->set($disponbilidade->anotacion);

		$id = $this->executeInsert($sqlQuery);	
		$disponbilidade->idDisponibilidad = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param DisponbilidadesMySql disponbilidade
 	 */
	public function update($disponbilidade){
		$sql = 'UPDATE disponbilidades SET fecha_inicio = ?, fecha_final = ?, precio = ?, precio_fin_semana = ?, estatus = ?, id_apartamento = ?, anotacion = ? WHERE id_disponibilidad = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($disponbilidade->fechaInicio);
		$sqlQuery->set($disponbilidade->fechaFinal);
		$sqlQuery->set($disponbilidade->precio);
		$sqlQuery->set($disponbilidade->precioFinSemana);
		$sqlQuery->set($disponbilidade->estatus);
		$sqlQuery->setNumber($disponbilidade->idApartamento);
		$sqlQuery->set($disponbilidade->anotacion);

		$sqlQuery->setNumber($disponbilidade->idDisponibilidad);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM disponbilidades';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByFechaInicio($value){
		$sql = 'SELECT * FROM disponbilidades WHERE fecha_inicio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFechaFinal($value){
		$sql = 'SELECT * FROM disponbilidades WHERE fecha_final = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPrecio($value){
		$sql = 'SELECT * FROM disponbilidades WHERE precio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPrecioFinSemana($value){
		$sql = 'SELECT * FROM disponbilidades WHERE precio_fin_semana = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEstatus($value){
		$sql = 'SELECT * FROM disponbilidades WHERE estatus = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdApartamento($value){
		$sql = 'SELECT * FROM disponbilidades WHERE id_apartamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAnotacion($value){
		$sql = 'SELECT * FROM disponbilidades WHERE anotacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByFechaInicio($value){
		$sql = 'DELETE FROM disponbilidades WHERE fecha_inicio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFechaFinal($value){
		$sql = 'DELETE FROM disponbilidades WHERE fecha_final = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPrecio($value){
		$sql = 'DELETE FROM disponbilidades WHERE precio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPrecioFinSemana($value){
		$sql = 'DELETE FROM disponbilidades WHERE precio_fin_semana = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEstatus($value){
		$sql = 'DELETE FROM disponbilidades WHERE estatus = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdApartamento($value){
		$sql = 'DELETE FROM disponbilidades WHERE id_apartamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAnotacion($value){
		$sql = 'DELETE FROM disponbilidades WHERE anotacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return DisponbilidadesMySql 
	 */
	protected function readRow($row){
		$disponbilidade = new Disponbilidade();
		
		$disponbilidade->idDisponibilidad = $row['id_disponibilidad'];
		$disponbilidade->fechaInicio = $row['fecha_inicio'];
		$disponbilidade->fechaFinal = $row['fecha_final'];
		$disponbilidade->precio = $row['precio'];
		$disponbilidade->precioFinSemana = $row['precio_fin_semana'];
		$disponbilidade->estatus = $row['estatus'];
		$disponbilidade->idApartamento = $row['id_apartamento'];
		$disponbilidade->anotacion = $row['anotacion'];

		return $disponbilidade;
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
	 * @return DisponbilidadesMySql 
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
<?php
/**
 * Class that operate on table 'disponibilidades'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-10-22 21:04
 */
class DisponibilidadesMySqlDAO implements DisponibilidadesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return DisponibilidadesMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM disponibilidades WHERE id_disponibilidad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM disponibilidades';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM disponibilidades ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param disponibilidade primary key
 	 */
	public function delete($id_disponibilidad){
		$sql = 'DELETE FROM disponibilidades WHERE id_disponibilidad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_disponibilidad);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param DisponibilidadesMySql disponibilidade
 	 */
	public function insert($disponibilidade){
		$sql = 'INSERT INTO disponibilidades (fecha_inicio, fecha_final, precio, precio_fin_semana, estatus, id_apartamento, anotacion, descuento, minimo_noches, precio_por_consumo, descuento_por_consumo, cupon_promocional, descuento_por_cupon) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($disponibilidade->fechaInicio);
		$sqlQuery->set($disponibilidade->fechaFinal);
		$sqlQuery->set($disponibilidade->precio);
		$sqlQuery->set($disponibilidade->precioFinSemana);
		$sqlQuery->set($disponibilidade->estatus);
		$sqlQuery->setNumber($disponibilidade->idApartamento);
		$sqlQuery->set($disponibilidade->anotacion);
		$sqlQuery->set($disponibilidade->descuento);
		$sqlQuery->setNumber($disponibilidade->minimoNoches);
		$sqlQuery->set($disponibilidade->precioPorConsumo);
		$sqlQuery->set($disponibilidade->descuentoPorConsumo);
		$sqlQuery->set($disponibilidade->cuponPromocional);
		$sqlQuery->set($disponibilidade->descuentoPorCupon);

		$id = $this->executeInsert($sqlQuery);	
		$disponibilidade->idDisponibilidad = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param DisponibilidadesMySql disponibilidade
 	 */
	public function update($disponibilidade){
		$sql = 'UPDATE disponibilidades SET fecha_inicio = ?, fecha_final = ?, precio = ?, precio_fin_semana = ?, estatus = ?, id_apartamento = ?, anotacion = ?, descuento = ?, minimo_noches = ?, precio_por_consumo = ?, descuento_por_consumo = ?, cupon_promocional = ?, descuento_por_cupon = ? WHERE id_disponibilidad = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($disponibilidade->fechaInicio);
		$sqlQuery->set($disponibilidade->fechaFinal);
		$sqlQuery->set($disponibilidade->precio);
		$sqlQuery->set($disponibilidade->precioFinSemana);
		$sqlQuery->set($disponibilidade->estatus);
		$sqlQuery->setNumber($disponibilidade->idApartamento);
		$sqlQuery->set($disponibilidade->anotacion);
		$sqlQuery->set($disponibilidade->descuento);
		$sqlQuery->setNumber($disponibilidade->minimoNoches);
		$sqlQuery->set($disponibilidade->precioPorConsumo);
		$sqlQuery->set($disponibilidade->descuentoPorConsumo);
		$sqlQuery->set($disponibilidade->cuponPromocional);
		$sqlQuery->set($disponibilidade->descuentoPorCupon);

		$sqlQuery->setNumber($disponibilidade->idDisponibilidad);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM disponibilidades';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByFechaInicio($value){
		$sql = 'SELECT * FROM disponibilidades WHERE fecha_inicio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFechaFinal($value){
		$sql = 'SELECT * FROM disponibilidades WHERE fecha_final = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPrecio($value){
		$sql = 'SELECT * FROM disponibilidades WHERE precio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPrecioFinSemana($value){
		$sql = 'SELECT * FROM disponibilidades WHERE precio_fin_semana = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEstatus($value){
		$sql = 'SELECT * FROM disponibilidades WHERE estatus = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdApartamento($value){
		$sql = 'SELECT * FROM disponibilidades WHERE id_apartamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAnotacion($value){
		$sql = 'SELECT * FROM disponibilidades WHERE anotacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescuento($value){
		$sql = 'SELECT * FROM disponibilidades WHERE descuento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMinimoNoches($value){
		$sql = 'SELECT * FROM disponibilidades WHERE minimo_noches = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPrecioPorConsumo($value){
		$sql = 'SELECT * FROM disponibilidades WHERE precio_por_consumo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescuentoPorConsumo($value){
		$sql = 'SELECT * FROM disponibilidades WHERE descuento_por_consumo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCuponPromocional($value){
		$sql = 'SELECT * FROM disponibilidades WHERE cupon_promocional = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescuentoPorCupon($value){
		$sql = 'SELECT * FROM disponibilidades WHERE descuento_por_cupon = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByFechaInicio($value){
		$sql = 'DELETE FROM disponibilidades WHERE fecha_inicio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFechaFinal($value){
		$sql = 'DELETE FROM disponibilidades WHERE fecha_final = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPrecio($value){
		$sql = 'DELETE FROM disponibilidades WHERE precio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPrecioFinSemana($value){
		$sql = 'DELETE FROM disponibilidades WHERE precio_fin_semana = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEstatus($value){
		$sql = 'DELETE FROM disponibilidades WHERE estatus = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdApartamento($value){
		$sql = 'DELETE FROM disponibilidades WHERE id_apartamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAnotacion($value){
		$sql = 'DELETE FROM disponibilidades WHERE anotacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescuento($value){
		$sql = 'DELETE FROM disponibilidades WHERE descuento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMinimoNoches($value){
		$sql = 'DELETE FROM disponibilidades WHERE minimo_noches = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPrecioPorConsumo($value){
		$sql = 'DELETE FROM disponibilidades WHERE precio_por_consumo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescuentoPorConsumo($value){
		$sql = 'DELETE FROM disponibilidades WHERE descuento_por_consumo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCuponPromocional($value){
		$sql = 'DELETE FROM disponibilidades WHERE cupon_promocional = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescuentoPorCupon($value){
		$sql = 'DELETE FROM disponibilidades WHERE descuento_por_cupon = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return DisponibilidadesMySql 
	 */
	protected function readRow($row){
		$disponibilidade = new Disponibilidade();
		
		$disponibilidade->idDisponibilidad = $row['id_disponibilidad'];
		$disponibilidade->fechaInicio = $row['fecha_inicio'];
		$disponibilidade->fechaFinal = $row['fecha_final'];
		$disponibilidade->precio = $row['precio'];
		$disponibilidade->precioFinSemana = $row['precio_fin_semana'];
		$disponibilidade->estatus = $row['estatus'];
		$disponibilidade->idApartamento = $row['id_apartamento'];
		$disponibilidade->anotacion = $row['anotacion'];
		$disponibilidade->descuento = $row['descuento'];
		$disponibilidade->minimoNoches = $row['minimo_noches'];
		$disponibilidade->precioPorConsumo = $row['precio_por_consumo'];
		$disponibilidade->descuentoPorConsumo = $row['descuento_por_consumo'];
		$disponibilidade->cuponPromocional = $row['cupon_promocional'];
		$disponibilidade->descuentoPorCupon = $row['descuento_por_cupon'];

		return $disponibilidade;
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
	 * @return DisponibilidadesMySql 
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
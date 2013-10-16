<?php
/**
 * Class that operate on table 'articulos'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-10-01 15:39
 */
class ArticulosMySqlDAO implements ArticulosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ArticulosMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM articulos WHERE id_articulo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM articulos';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM articulos ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param articulo primary key
 	 */
	public function delete($id_articulo){
		$sql = 'DELETE FROM articulos WHERE id_articulo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_articulo);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ArticulosMySql articulo
 	 */
	public function insert($articulo){
		$sql = 'INSERT INTO articulos (nombre, codigo, id_articulo_tipo, precio_base, por_persona, configurar_por, pax_minimo, pax_maximo, regular_stock, solo_adultos, solo_ninios, consumo_obligatorio, establecer_horarios, descripcion, id_idioma) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($articulo->nombre);
		$sqlQuery->set($articulo->codigo);
		$sqlQuery->setNumber($articulo->idArticuloTipo);
		$sqlQuery->set($articulo->precioBase);
		$sqlQuery->setNumber($articulo->porPersona);
		$sqlQuery->set($articulo->configurarPor);
		$sqlQuery->set($articulo->paxMinimo);
		$sqlQuery->set($articulo->paxMaximo);
		$sqlQuery->set($articulo->regularStock);
		$sqlQuery->setNumber($articulo->soloAdultos);
		$sqlQuery->setNumber($articulo->soloNinios);
		$sqlQuery->setNumber($articulo->consumoObligatorio);
		$sqlQuery->set($articulo->establecerHorarios);
		$sqlQuery->set($articulo->descripcion);
		$sqlQuery->setNumber($articulo->idIdioma);

		$id = $this->executeInsert($sqlQuery);	
		$articulo->idArticulo = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ArticulosMySql articulo
 	 */
	public function update($articulo){
		$sql = 'UPDATE articulos SET nombre = ?, codigo = ?, id_articulo_tipo = ?, precio_base = ?, por_persona = ?, configurar_por = ?, pax_minimo = ?, pax_maximo = ?, regular_stock = ?, solo_adultos = ?, solo_ninios = ?, consumo_obligatorio = ?, establecer_horarios = ?, descripcion = ?, id_idioma = ? WHERE id_articulo = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($articulo->nombre);
		$sqlQuery->set($articulo->codigo);
		$sqlQuery->setNumber($articulo->idArticuloTipo);
		$sqlQuery->set($articulo->precioBase);
		$sqlQuery->setNumber($articulo->porPersona);
		$sqlQuery->set($articulo->configurarPor);
		$sqlQuery->set($articulo->paxMinimo);
		$sqlQuery->set($articulo->paxMaximo);
		$sqlQuery->set($articulo->regularStock);
		$sqlQuery->setNumber($articulo->soloAdultos);
		$sqlQuery->setNumber($articulo->soloNinios);
		$sqlQuery->setNumber($articulo->consumoObligatorio);
		$sqlQuery->set($articulo->establecerHorarios);
		$sqlQuery->set($articulo->descripcion);
		$sqlQuery->setNumber($articulo->idIdioma);

		$sqlQuery->setNumber($articulo->idArticulo);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM articulos';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNombre($value){
		$sql = 'SELECT * FROM articulos WHERE nombre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCodigo($value){
		$sql = 'SELECT * FROM articulos WHERE codigo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdArticuloTipo($value){
		$sql = 'SELECT * FROM articulos WHERE id_articulo_tipo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPrecioBase($value){
		$sql = 'SELECT * FROM articulos WHERE precio_base = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPorPersona($value){
		$sql = 'SELECT * FROM articulos WHERE por_persona = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByConfigurarPor($value){
		$sql = 'SELECT * FROM articulos WHERE configurar_por = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPaxMinimo($value){
		$sql = 'SELECT * FROM articulos WHERE pax_minimo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPaxMaximo($value){
		$sql = 'SELECT * FROM articulos WHERE pax_maximo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRegularStock($value){
		$sql = 'SELECT * FROM articulos WHERE regular_stock = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySoloAdultos($value){
		$sql = 'SELECT * FROM articulos WHERE solo_adultos = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySoloNinios($value){
		$sql = 'SELECT * FROM articulos WHERE solo_ninios = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByConsumoObligatorio($value){
		$sql = 'SELECT * FROM articulos WHERE consumo_obligatorio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEstablecerHorarios($value){
		$sql = 'SELECT * FROM articulos WHERE establecer_horarios = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescripcion($value){
		$sql = 'SELECT * FROM articulos WHERE descripcion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdIdioma($value){
		$sql = 'SELECT * FROM articulos WHERE id_idioma = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNombre($value){
		$sql = 'DELETE FROM articulos WHERE nombre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCodigo($value){
		$sql = 'DELETE FROM articulos WHERE codigo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdArticuloTipo($value){
		$sql = 'DELETE FROM articulos WHERE id_articulo_tipo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPrecioBase($value){
		$sql = 'DELETE FROM articulos WHERE precio_base = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPorPersona($value){
		$sql = 'DELETE FROM articulos WHERE por_persona = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByConfigurarPor($value){
		$sql = 'DELETE FROM articulos WHERE configurar_por = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPaxMinimo($value){
		$sql = 'DELETE FROM articulos WHERE pax_minimo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPaxMaximo($value){
		$sql = 'DELETE FROM articulos WHERE pax_maximo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRegularStock($value){
		$sql = 'DELETE FROM articulos WHERE regular_stock = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySoloAdultos($value){
		$sql = 'DELETE FROM articulos WHERE solo_adultos = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySoloNinios($value){
		$sql = 'DELETE FROM articulos WHERE solo_ninios = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByConsumoObligatorio($value){
		$sql = 'DELETE FROM articulos WHERE consumo_obligatorio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEstablecerHorarios($value){
		$sql = 'DELETE FROM articulos WHERE establecer_horarios = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescripcion($value){
		$sql = 'DELETE FROM articulos WHERE descripcion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdIdioma($value){
		$sql = 'DELETE FROM articulos WHERE id_idioma = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ArticulosMySql 
	 */
	protected function readRow($row){
		$articulo = new Articulo();
		
		$articulo->idArticulo = $row['id_articulo'];
		$articulo->nombre = $row['nombre'];
		$articulo->codigo = $row['codigo'];
		$articulo->idArticuloTipo = $row['id_articulo_tipo'];
		$articulo->precioBase = $row['precio_base'];
		$articulo->porPersona = $row['por_persona'];
		$articulo->configurarPor = $row['configurar_por'];
		$articulo->paxMinimo = $row['pax_minimo'];
		$articulo->paxMaximo = $row['pax_maximo'];
		$articulo->regularStock = $row['regular_stock'];
		$articulo->soloAdultos = $row['solo_adultos'];
		$articulo->soloNinios = $row['solo_ninios'];
		$articulo->consumoObligatorio = $row['consumo_obligatorio'];
		$articulo->establecerHorarios = $row['establecer_horarios'];
		$articulo->descripcion = $row['descripcion'];
		$articulo->idIdioma = $row['id_idioma'];

		return $articulo;
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
	 * @return ArticulosMySql 
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
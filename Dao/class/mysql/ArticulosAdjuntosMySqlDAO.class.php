<?php
/**
 * Class that operate on table 'articulos_adjuntos'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-10-18 16:11
 */
class ArticulosAdjuntosMySqlDAO implements ArticulosAdjuntosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ArticulosAdjuntosMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM articulos_adjuntos WHERE id_articulo_adjunto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM articulos_adjuntos';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM articulos_adjuntos ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param articulosAdjunto primary key
 	 */
	public function delete($id_articulo_adjunto){
		$sql = 'DELETE FROM articulos_adjuntos WHERE id_articulo_adjunto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_articulo_adjunto);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ArticulosAdjuntosMySql articulosAdjunto
 	 */
	public function insert($articulosAdjunto){
		$sql = 'INSERT INTO articulos_adjuntos (id_articulo, id_adjunto) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($articulosAdjunto->idArticulo);
		$sqlQuery->setNumber($articulosAdjunto->idAdjunto);

		$id = $this->executeInsert($sqlQuery);	
		$articulosAdjunto->idArticuloAdjunto = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ArticulosAdjuntosMySql articulosAdjunto
 	 */
	public function update($articulosAdjunto){
		$sql = 'UPDATE articulos_adjuntos SET id_articulo = ?, id_adjunto = ? WHERE id_articulo_adjunto = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($articulosAdjunto->idArticulo);
		$sqlQuery->setNumber($articulosAdjunto->idAdjunto);

		$sqlQuery->setNumber($articulosAdjunto->idArticuloAdjunto);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM articulos_adjuntos';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIdArticulo($value){
		$sql = 'SELECT * FROM articulos_adjuntos WHERE id_articulo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdAdjunto($value){
		$sql = 'SELECT * FROM articulos_adjuntos WHERE id_adjunto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIdArticulo($value){
		$sql = 'DELETE FROM articulos_adjuntos WHERE id_articulo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdAdjunto($value){
		$sql = 'DELETE FROM articulos_adjuntos WHERE id_adjunto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ArticulosAdjuntosMySql 
	 */
	protected function readRow($row){
		$articulosAdjunto = new ArticulosAdjunto();
		
		$articulosAdjunto->idArticulo = $row['id_articulo'];
		$articulosAdjunto->idAdjunto = $row['id_adjunto'];
		$articulosAdjunto->idArticuloAdjunto = $row['id_articulo_adjunto'];

		return $articulosAdjunto;
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
	 * @return ArticulosAdjuntosMySql 
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
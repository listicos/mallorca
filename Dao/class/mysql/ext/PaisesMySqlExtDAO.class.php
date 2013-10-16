<?php
/**
 * Class that operate on table 'paises'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-05-28 00:05
 */
class PaisesMySqlExtDAO extends PaisesMySqlDAO{

	public function buscar($nombre_p){
		$sql = 'SELECT * FROM paises WHERE nombre_completo= ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($nombre_p);
		return $this->getRow($sqlQuery);
	}    
	
        
}
?>
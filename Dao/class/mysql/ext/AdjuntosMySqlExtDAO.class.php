<?php

/**
 * Class that operate on table 'adjuntos'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-05-28 00:05
 */
class AdjuntosMySqlExtDAO extends AdjuntosMySqlDAO {

    private $mysql;

    function __construct() {
        $this->mysql = new MySql();
    }

    function prepare($data, $idAdjunto = 0) {

        if ($idAdjunto != 0)
            $adjunto = $this->load($idAdjunto);
        else
            $adjunto = new Adjunto ();
        return $this->mysql->prepare($adjunto, $data);
    }
    
    public function queryByApartamentoId($value){
		$sql = 'SELECT * FROM adjuntos AS a inner join apartamentos_adjuntos AS aa ';
                $sql .= ' ON a.id_adjunto = aa.id_adjunto ';
                $sql .= ' WHERE aa.id_apartamento = ?';

		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

}

?>
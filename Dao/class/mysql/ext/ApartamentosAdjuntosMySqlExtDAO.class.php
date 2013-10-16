<?php

/**
 * Class that operate on table 'apartamentos_adjuntos'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-05-28 00:05
 */
class ApartamentosAdjuntosMySqlExtDAO extends ApartamentosAdjuntosMySqlDAO {

    private $mysql;

    function __construct() {
        $this->mysql = new MySql();
    }

    function prepare($data, $idApartamentoAdjunto = 0) {

        if ($idApartamentoAdjunto != 0)
            $apartamentoAdjunto  = $this->load($idApartamentoAdjunto);
        else
            $apartamentoAdjunto = new ApartamentosAdjunto();
        return $this->mysql->prepare($apartamentoAdjunto, $data);
    }
    
    function queryByIdApartamentoAndTipo($apartamento_id, $tipo) {
        $sql = 'SELECT * FROM apartamentos_adjuntos AS aa INNER JOIN adjuntos AS a ON a.id_adjunto = aa.id_adjunto WHERE id_apartamento = ? AND tipo = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->setNumber($apartamento_id);
        $sqlQuery->setString($tipo);
        return $this->getList($sqlQuery);
    }

}

?>
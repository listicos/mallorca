<?php
/**
 * Class that operate on table 'apartamentos_documentos'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-07-29 23:52
 */
class ApartamentosDocumentosMySqlExtDAO extends ApartamentosDocumentosMySqlDAO{

    
    private $mysql;

    function __construct() {
        $this->mysql = new MySql();
    }

    function prepare($data, $idApartamentoAdjunto = 0) {

        if ($idApartamentoAdjunto != 0)
            $apartamentoAdjunto  = $this->load($idApartamentoAdjunto);
        else
            $apartamentoAdjunto = new ApartamentosDocumento();
        return $this->mysql->prepare($apartamentoAdjunto, $data);
    }
    
    function queryByIdApartamentoAndTipo($apartamento_id, $tipo) {
        $sql = 'SELECT * FROM apartamentos_documentos AS aa INNER JOIN adjuntos AS a ON a.id_adjunto = aa.id_adjunto WHERE aa.id_apartamento = ? AND aa.tipo = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->setNumber($apartamento_id);
        $sqlQuery->setString($tipo);
        return $this->getList($sqlQuery);
    }
}
?>
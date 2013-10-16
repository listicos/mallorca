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

}

?>
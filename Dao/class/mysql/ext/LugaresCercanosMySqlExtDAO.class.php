<?php

/**
 * Class that operate on table 'lugares_cercanos'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-05-28 00:05
 */
class LugaresCercanosMySqlExtDAO extends LugaresCercanosMySqlDAO {

    private $mysql;

    function __construct() {
        $this->mysql = new MySql();
    }

    function prepare($data, $idLugaresCercanos = 0) {

        if ($idLugaresCercanos != 0)
            $lugaresCercanos = $this->load($idLugaresCercanos);
        else
            $lugaresCercanos = new LugaresCercano();
        return $this->mysql->prepare($lugaresCercanos, $data);
    }

}

?>
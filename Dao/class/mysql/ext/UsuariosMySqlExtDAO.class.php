<?php

/**
 * Class that operate on table 'usuarios'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-05-29 22:21
 */
class UsuariosMySqlExtDAO extends UsuariosMySqlDAO {

    private $mysql;

    function __construct() {
        $this->mysql = new MySql();
    }

    function prepare($data, $idUsuario = 0) {

        if ($idUsuario != 0)
            $usuario = $this->load($idUsuario);
        else
            $usuario = new Usuario();
        return $this->mysql->prepare($usuario, $data);
    }

    function queryBuscar($args) {
        $query = $args['query'];
        $sql = "SELECT distinct * FROM usuarios";
        $sql .= " WHERE email like '%" . $query . "%' OR nombre like '%" . $query . "%' OR apellido_paterno like '%" . $query . "%' OR apellido_materno like '%" . $query . "%' OR facebook_username like '%" . $query . "%'   ";
        $sql .= $this->mysql->limit($args);
        
        $sqlQuery = new SqlQuery($sql);

        return $this->getList($sqlQuery);
    }

    function queryBuscarFriends($idUsuario, $query, $literal = false, $args = false) {
        $sql = "SELECT distinct * FROM usuarios";
        if ($literal)
            $sql .= " WHERE (email like '" . $query . "%' OR first_name like '" . $query . "%' OR last_name like '" . $query . "%') AND id_customer = " . $idUsuario;
        else
            $sql .= " WHERE (email like '%" . $query . "%' OR first_name like '%" . $query . "%' OR last_name like '%" . $query . "%') AND id_customer = " . $idUsuario;
        $sql .= $this->mysql->limit($args);
        var_dump($sql);
        $sqlQuery = new SqlQuery($sql);

        return $this->getList($sqlQuery);
    }

    function queryByArgs($args) {
        $exclude = array("page", "limit");
        $sql = "SELECT c.* FROM usuarios c ";

        $sql .= $this->mysql->addFilters("c", $args, $exclude);
        $sql .= $this->mysql->limit($args);

        $sqlQuery = new SqlQuery($sql);

        return $this->getList($sqlQuery);
    }

    function getByEmail($email) {
        $sql = "SELECT c.* FROM usuarios c where TRIM(c.email)='" . trim($email) . "' ";
        $sqlQuery = new SqlQuery($sql);
        return $this->getRow($sqlQuery);
    }

    function queryFriends($args) {
        $exclude = array("page", "limit");
        $sql = "SELECT c.* FROM friends f INNER JOIN usuarios c ON f.id_customer_friend=c.id_customer AND f.id_customer=?";

        $sql .= $this->mysql->limit($args);

        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->setNumber($args["idUsuario"]);

        return $this->getList($sqlQuery);
    }

    function queryFriendsByName($idUsuario, $friendName) {

        $sql = "SELECT c.* FROM friends f INNER JOIN usuarios c ON f.id_customer_friend=c.id_customer AND f.id_customer=?";
        $sql.= " AND CONCAT(c.first_name,c.last_name) LIKE ?";
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->setNumber($idUsuario);
        $sqlQuery->set("%" . $friendName . "%");

        return $this->getList($sqlQuery);
    }

    function queryFriendsByQuery($idUsuario, $query) {

        $sql = "SELECT c.* FROM friends f INNER JOIN usuarios c ON f.id_customer_friend=c.id_customer AND f.id_customer=?";
        $sql.= " AND (email like '%" . $query . "%' OR first_name like '%" . $query . "%' OR last_name like '%" . $query . "%')";
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->setNumber($idUsuario);
        //echo $sqlQuery->getQuery();
        return $this->getList($sqlQuery);
    }

    function queryBuscarNonFriends($idUsuario, $args) {
        $query = $args['query'];

        $sql = "SELECT * FROM usuarios c\n"
                . " WHERE c.id_customer NOT IN \n"
                . " (SELECT f.id_customer_friend AS id_customer FROM friends f WHERE f.id_customer =" . $idUsuario . ") \n"
                . " AND (c.email like '%" . $query . "%' OR c.first_name like '%" . $query . "%' OR c.last_name like '%" . $query . "%')\n";

        $sql .= " AND c.id_customer !='" . $idUsuario . "'order by RAND()";

        $sql .= $this->mysql->limit($args);

        $sqlQuery = new SqlQuery($sql);
        return $this->getList($sqlQuery);
    }
    
    function searchByArguments($data) {
        $query = $data['query'];
        $type = $data['type'];
        $filter = $data['filter'];
        
        
        if (isset($filter) && $filter != '')
            $order_by = ' ORDER BY u.' . $filter . ' ' . $type;
        else
            $order_by = '';

        $sql = 'SELECT distinct u.id_usuario, u.nombre, u.apellido_paterno, u.email, u.telefono FROM usuarios AS u';
        $sql .= ' INNER JOIN huespedes AS h ON u.id_usuario = h.id_usuario';
        $sql .= " WHERE (u.nombre like '%" . $query . "%' OR u.apellido_paterno like '%" . $query . "%' OR u.apellido_materno like '%" . $query . "%' OR u.email like '%" . $query . "%' OR u.telefono like '%" . $query . "%' )";
        
        $sql .= $order_by;

        $sqlQuery = new SqlQuery($sql);
        
        
        return $this->getList($sqlQuery);
    }
    
    function querySearch($data) {
        $query = $data['query'];
        $type = $data['type'];
        $filter = $data['filter'];
        
        
        if (isset($filter) && $filter != '')
            $order_by = ' ORDER BY ' . $filter . ' ' . $type;
        else
            $order_by = '';

        $sql = 'SELECT distinct u.id_usuario, u.nombre, u.apellido_paterno, u.email, u.telefono, u.id_usuario_grupo FROM usuarios AS u';
        $sql .= ' INNER JOIN usuarios_grupos AS ug ON u.id_usuario_grupo = ug.id_usuario_grupo';
        $sql .= " WHERE (u.nombre like '%" . $query . "%' OR u.apellido_paterno like '%" . $query . "%' OR u.apellido_materno like '%" . $query . "%' OR u.email like '%" . $query . "%' OR u.telefono like '%" . $query . "%' )";
        
        $sql .= $order_by;
       
        $sqlQuery = new SqlQuery($sql);
        
        
        return $this->getList($sqlQuery);
    }

}

?>
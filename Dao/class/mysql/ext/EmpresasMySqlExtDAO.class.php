<?php

/**
 * Class that operate on table 'empresas'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-05-28 00:05
 */
class EmpresasMySqlExtDAO extends EmpresasMySqlDAO {

    private $mysql;

    function __construct() {
        $this->mysql = new MySql();
    }

    function prepare($data, $idEmpresa = 0) {

        if ($idEmpresa != 0)
            $empresa = $this->load($idEmpresa);
        else
            $empresa = new Empresa();
        return $this->mysql->prepare($empresa, $data);
    }

    public function queryNombreAndID() {
        $sql = 'SELECT id_empresa,nombre_fiscal FROM empresas WHERE 1';
        $sqlQuery = new SqlQuery($sql);
        return $this->execute($sqlQuery);
    }

    public function queryNombreIDByLike($value) {
        //$sql = 'SELECT id_empresa,nombre_fiscal FROM empresas WHERE nombre_fiscal LIKE "%%'. $value . '%%"';
        $sql = 'SELECT empresas.id_empresa,empresas.nombre_fiscal FROM empresas,direcciones WHERE empresas.id_direccion = direcciones.id_direccion AND (empresas.nombre_fiscal LIKE "%%' . $value . '%%" OR empresas.apellido_paterno LIKE "%%' . $value . '%%"OR empresas.apellido_materno LIKE "%%' . $value . '%%"OR empresas.nombre LIKE "%%' . $value . '%%"OR empresas.cif LIKE "%%' . $value . '%%"OR direcciones.calle LIKE "%%' . $value . '%%"OR direcciones.provincia LIKE "%%' . $value . '%%")';
        $sqlQuery = new SqlQuery($sql);
        return $this->execute($sqlQuery);
    }

    function searchByArguments($data) {
        $query = $data['query'];
        $type = $data['type'];
        $filter = $data['filter'];

        if (isset($filter) && $filter != '')
            $order_by = ' ORDER BY ' . $filter . ' ' . $type;
        else
            $order_by = '';

        $sql = 'SELECT * FROM empresas';
        $sql .= ' INNER JOIN direcciones AS d ON d.id_direccion = empresas.id_empresa';
        $sql .= " WHERE id_empresa like '%" . $query . "%' OR nombre like '%" . $query . "%' OR apellido_paterno like '%" . $query . "%' OR nombre_fiscal like '%" . $query . "%' OR cif like '%" . $query . "%' OR tiempo_creacion like '%" . $query . "%' OR ultima_modificacion like '%" . $query . "%' OR email like '%" . $query . "%' OR d.calle like '%" . $query . "%' OR d.provincia like '%" . $query . "%' OR d.numero like '%" . $query . "%' OR d.codigo_postal like '%" . $query . "%' OR d.referencia like '%" . $query . "%'";
        $sql .= $order_by;
        
        $sqlQuery = new SqlQuery($sql);

        return $this->getList($sqlQuery);
    }

}

?>
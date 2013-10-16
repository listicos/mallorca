<?php

/**
 * Class that operate on table 'apartamentos'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-05-28 00:05
 */
class ApartamentosMySqlExtDAO extends ApartamentosMySqlDAO {

    private $mysql;

    function __construct() {
        $this->mysql = new MySql();
    }

    function prepare($data, $idApartamento = 0) {

        if ($idApartamento != 0)
            $apartamento = $this->load($idApartamento);
        else
            $apartamento = new Apartamento();
        return $this->mysql->prepare($apartamento, $data);
    }

    public function queryByLatLonNear($lat, $lon) {
        $sql = 'SELECT DISTINCT apartamentos.id_apartamento,apartamentos.nombre,apartamentos.tarifa_base,direcciones.id_direccion,direcciones.calle,direcciones.provincia,direcciones.codigo_postal,direcciones.lat,direcciones.lon';
        $sql.= ' FROM apartamentos';
        $sql.= ' INNER JOIN direcciones ON ABS(direcciones.lat - ' . $lat . ') < 0.5 AND ABS(direcciones.lon - ' . $lon . ') < 0.5 AND direcciones.id_direccion = apartamentos.id_direccion';
        $sql.= ' INNER JOIN disponibilidades ON apartamentos.id_apartamento  = disponibilidades.id_apartamento WHERE precio > 0 LIMIT 5';
        $sqlQuery = new SqlQuery($sql);

        return $this->getList($sqlQuery);
    }

    public function queryApartamentosFilters($fechaInicio, $fechaFinal, $huespedes = false) {
        $sql = 'SELECT DISTINCT apartamentos.*';
        $sql.= ' FROM apartamentos';
        $sql.= " INNER JOIN disponibilidades ON apartamentos.id_apartamento  = disponibilidades.id_apartamento AND disponibilidades.estatus =  'disponible' WHERE 1";

        if ($fechaInicio && $fechaFinal && is_numeric($fechaInicio) && $fechaInicio < $fechaFinal) {
            for ($i = $fechaInicio; $i <= $fechaFinal; $i+=86400) {
                $sql .= " AND EXISTS (SELECT fecha_inicio FROM disponibilidades AS d WHERE apartamentos.id_apartamento = d.id_apartamento AND fecha_inicio = '" . date('Y-m-d H:i:s', $i) . "' )";
            }
        }

        if ($huespedes) {
            $sql .= " AND apartamentos.capacidad_personas >= " . $huespedes;
        }

        $sql .= ' ORDER BY precio ASC';

        $sqlQuery = new SqlQuery($sql);

        return $this->getList($sqlQuery);
    }

    function searchByArguments($data) {
        $query = $data['query'];
        $type = $data['type'];
        $filter = $data['filter'];
        
        if(isset($data['empresaId'])) $empresaId = $data['empresaId'];

        if (isset($filter) && $filter != '')
            $order_by = ' ORDER BY ' . $filter . ' ' . $type;
        else
            $order_by = '';

        $sql = 'SELECT apartamentos.* FROM apartamentos';
        $sql .= ' INNER JOIN direcciones AS d ON d.id_direccion = apartamentos.id_direccion';
        $sql .= ' INNER JOIN monedas AS m ON m.id_moneda = apartamentos.id_moneda';
        $sql .= ' INNER JOIN idiomas AS i ON i.id_idioma = apartamentos.id_idioma';
        
        if(isset($empresaId)) {
            $sql .= ' INNER JOIN empresas_contratos AS c ON c.id_empresa_contrato = apartamentos.id_empresa_contrato';
        }
        
        $sql .= " WHERE (id_apartamento like '%" . $query . "%' OR apartamentos.nombre like '%" . $query . "%' OR horario_entrada like '%" . $query . "%' OR horario_salida like '%" . $query . "%' OR descripcion_larga like '%" . $query . "%' OR estatus like '%" . $query . "%' OR normas like '%" . $query . "%' OR manual like '%" . $query . "%' OR d.calle like '%" . $query . "%' OR d.provincia like '%" . $query . "%' OR d.numero like '%" . $query . "%' OR d.codigo_postal like '%" . $query . "%' OR d.referencia like '%" . $query . "%' OR m.nombre like '%" . $query . "%' OR m.codigo like '%" . $query . "%' OR i.nombre like '%" . $query . "%')";
        
        if(isset($empresaId)) {
            $sql .= ' AND c.id_empresa=? ';
        }
        
        $sql .= $order_by;

        $sqlQuery = new SqlQuery($sql);
        
        if(isset($empresaId)) {
            $sqlQuery->setNumber($empresaId);
        }

        return $this->getList($sqlQuery);
    }
    
    public function queryByIdEmpresa($value){
        $sql = 'SELECT a.* FROM apartamentos AS a inner join empresas_contratos AS e ';
        $sql .= ' on a.id_empresa_contrato = e.id_empresa_contrato';
        $sql .= ' WHERE e.id_empresa = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->setNumber($value);
        return $this->getList($sqlQuery);
    }
    
    public function searchByNombre($value){
        $sql = 'SELECT * FROM apartamentos';
        $sql .= ' WHERE nombre like "%' . $value . '%"';
        
        $sqlQuery = new SqlQuery($sql);
        return $this->getList($sqlQuery);
    }

}

?>
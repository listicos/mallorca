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

    public function queryApartamentosFilters($fechaInicio, $fechaFinal, $huespedes = false, $instalaciones = array(), $tipos = array(), $alojamientos = array(), $start = 0, $limit = 10, $order = false, $bounds = array()) {
        $sql = 'SELECT DISTINCT a.*';
        $sql.= ' FROM apartamentos AS a';
        if(count($instalaciones)) {
            $sql .= " INNER JOIN apartamentos_instalaciones AS ai ON ai.id_apartamento = a.id_apartamento";
        }
        
        if(count($alojamientos)) {
            $sql .= " INNER JOIN apartamentos_alojamientos AS aa ON aa.id_apartamento = a.id_apartamento";
        }
        
        if(count($bounds) == 4) {
            $sql .= " INNER JOIN direcciones as dir ON a.id_direccion = dir.id_direccion ";
        }
        
        //if(($fechaInicio && is_numeric($fechaInicio)) || ($fechaFinal && is_numeric($fechaFinal)))
            $sql.= " LEFT JOIN disponibilidades AS d ON a.id_apartamento  = d.id_apartamento WHERE a.estatus <> 'inactivo' ";
        /*
        if ($fechaInicio && $fechaFinal && is_numeric($fechaInicio) && $fechaInicio < $fechaFinal) {
            for ($i = $fechaInicio; $i <= $fechaFinal; $i+=86400) {
                $sql .= " AND EXISTS (SELECT fecha_inicio FROM disponibilidades AS dd WHERE a.id_apartamento = dd.id_apartamento AND fecha_inicio = '" . date('Y-m-d H:i:s', $i) . "' AND dd.estatus = 'disponible')";
            }
        } else if ($fechaInicio && is_numeric($fechaInicio)) {
            $sql .= " AND EXISTS (SELECT fecha_inicio FROM disponibilidades AS dd WHERE a.id_apartamento = dd.id_apartamento AND fecha_inicio = '" . date('Y-m-d H:i:s', $fechaInicio) . "' AND dd.estatus = 'disponible')";
        } else if ($fechaFinal && is_numeric($fechaFinal)) {
            $sql .= " AND EXISTS (SELECT fecha_inicio FROM disponibilidades AS dd WHERE a.id_apartamento = dd.id_apartamento AND fecha_inicio = '" . date('Y-m-d H:i:s', $fechaFinal) . "' AND dd.estatus = 'disponible')";
        }*/
        
        if(count($alojamientos)) {
            $sql .= " AND ( ";
            foreach ($alojamientos as $key=>$alojamiento) {
                if($key) $sql .= " OR ";
                $sql .= " aa.id_alojamiento = " . $alojamiento;
                
            }
            $sql .= " ) ";
        }

        if ($huespedes) {
            $sql .= " AND a.capacidad_personas >= " . $huespedes;
        }
        
        if(count($instalaciones)) {
            foreach ($instalaciones as $ins)
                if(is_numeric($ins))
                    $sql .= " AND EXISTS (SELECT id_instalacion from apartamentos_instalaciones WHERE apartamentos_instalaciones.id_apartamento = a.id_apartamento AND apartamentos_instalaciones.id_instalacion = " . $ins . ") ";
        }
        
        if(count($tipos)) {
            foreach ($tipos as $key=>$tipo)
                if(is_numeric($tipo)) {
                    if(!$key)
                        $sql .= " AND ( ";
                    else 
                        $sql .= " OR ";
                    
                    $sql .= " a.id_apartamentos_tipo = " . $tipo;
                }
            $sql .= " ) ";
        }
        
        if(count($bounds) == 4) {
            $sql .= " AND dir.lat <= " . $bounds[0] . " AND dir.lat >=" .$bounds[2];
            $sql .= " AND dir.lon <= " . $bounds[1] . " AND dir.lon >=" .$bounds[3];
        }
        
        $sql .= ' ORDER BY ' . (($order) ? : 'precio ASC');
        if($limit) $sql .= ' limit ' . $start . " , " . $limit;
        
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
    
    public function queryByVisitasAsc($limit = 3) {
        $sql = 'SELECT distinct a.*, c.nombre AS complejo, at.nombre AS tipo FROM apartamentos AS a 
                LEFT JOIN complejos AS c ON c.id_complejo = a.id_complejo
                LEFT JOIN apartamentos_tipos AS at ON at.id_apartamentos_tipo = a.id_apartamentos_tipo
        WHERE a.estatus <> "inactivo" ORDER BY visitas DESC LIMIT 0, ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->setNumber($limit);
        $apartamentos = $this->execute($sqlQuery);
        $aps = array();

        if($apartamentos){
            foreach ($apartamentos as $k => $a) {
                $apartamento = $this->readRow($a);
                foreach ($a as $key => $value){
                    $apartamento->$key = $value;
                }
                $aps[] =  $apartamento;
            }
        }

        return $aps;
    }

    public function countApartamentosTipos($limit = 3) {
        $sql = 'SELECT distinct a.* FROM apartamentos AS a 
                LEFT JOIN complejos AS c ON c.id_complejo = a.id_complejo
                LEFT JOIN apartamentos_tipos AS at ON at.id_apartamentos_tipo = a.id_apartamentos_tipo
        WHERE a.estatus <> "inactivo" ORDER BY visitas DESC LIMIT 0, ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->setNumber($limit);
        $apartamentos = $this->execute($sqlQuery);
        $aps = array();

        if($apartamentos){
            foreach ($apartamentos as $k => $a) {
                $apartamento = $this->readRow($a);
                foreach ($a as $key => $value){
                    $apartamento->$key = $value;
                }
                $aps[] =  $apartamento;
            }
        }

        return $aps;
    }
    
    public function rangoPreciosByApartamentoANDFechas($idApartamento, $fechaInicio = 0, $fechaFinal = 0) {
        $sql = 'select min(d.precio - (d.precio * d.descuento / 100)), max(d.precio - (d.precio * d.descuento / 100))
                from disponibilidades as d
                inner join apartamentos as a
                on a.id_apartamento = d.id_apartamento
                where a.id_apartamento = ?
                and d.estatus = "disponible" ';
        if($fechaInicio) {
            $sql .= ' and UNIX_TIMESTAMP(d.fecha_inicio) >= UNIX_TIMESTAMP("' . date('Y-m-d', $fechaInicio) . '")';
            if($fechaFinal) {
                $sql .= ' and UNIX_TIMESTAMP(d.fecha_inicio) <= UNIX_TIMESTAMP("' . date('Y-m-d', $fechaFinal) . '")';
            }
        } else {
            $sql .= ' and UNIX_TIMESTAMP(d.fecha_inicio) >= UNIX_TIMESTAMP("' . date('Y-m-d') . '")';
        }
        
        
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->setNumber($idApartamento);
        $apartamentos = $this->execute($sqlQuery);
        return $apartamentos;
    }

}

?>
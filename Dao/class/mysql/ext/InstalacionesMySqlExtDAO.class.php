<?php
/**
 * Class that operate on table 'instalaciones'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-05-28 00:05
 */
class InstalacionesMySqlExtDAO extends InstalacionesMySqlDAO{

	
    public function queryApartamentosFilters($fechaInicio, $fechaFinal, $huespedes = false, $instalaciones = array(), $tipos = array(), $alojamientos = array(), $bounds = array()) {
        
        $sql.= 'SELECT DISTINCT a.id_apartamento';
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
        
        
        $sql.= " INNER JOIN disponibilidades AS d ON a.id_apartamento  = d.id_apartamento WHERE a.estatus <> 'inactivo'";

        if ($fechaInicio && $fechaFinal && is_numeric($fechaInicio) && $fechaInicio < $fechaFinal) {
            for ($i = $fechaInicio; $i <= $fechaFinal; $i+=86400) {
                $sql .= " AND EXISTS (SELECT fecha_inicio FROM disponibilidades AS dd WHERE a.id_apartamento = dd.id_apartamento AND fecha_inicio = '" . date('Y-m-d H:i:s', $i) . "' AND dd.estatus =  'disponible')";
            }
        } else if ($fechaInicio && is_numeric($fechaInicio)) {
            $sql .= " AND EXISTS (SELECT fecha_inicio FROM disponibilidades AS dd WHERE a.id_apartamento = dd.id_apartamento AND fecha_inicio = '" . date('Y-m-d H:i:s', $fechaInicio) . "' AND dd.estatus =  'disponible')";
        } else if ($fechaFinal && is_numeric($fechaFinal)) {
            $sql .= " AND EXISTS (SELECT fecha_inicio FROM disponibilidades AS dd WHERE a.id_apartamento = dd.id_apartamento AND fecha_inicio = '" . date('Y-m-d H:i:s', $fechaFinal) . "' AND dd.estatus =  'disponible')";
        }
        
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
        
        $sql .= ' ORDER BY precio ASC';
        
        $isql = ' select i.*, count(aa.id_apartamento) as apartamentos FROM instalaciones AS i';
        $isql .= ' INNER JOIN apartamentos_instalaciones AS aai ON i.id_instalacion = aai.id_instalacion';
        $isql .= ' INNER JOIN apartamentos AS aa ON aa.id_apartamento = aai.id_apartamento';
        $isql .= ' WHERE aa.id_apartamento IN (' . $sql . ') ';
        $isql .= ' group by i.id_instalacion';
        
        $sqlQuery = new SqlQuery($isql);

        return $this->getList($sqlQuery);
    }
    
    protected function readRow($row){
            $instalacione = new Instalacione();

            $instalacione->idInstalacion = $row['id_instalacion'];
            $instalacione->nombre = $row['nombre'];
            $instalacione->idInstalacionCategoria = $row['id_instalacion_categoria'];
            
            if(isset($row['apartamentos']))
                $instalacione->apartamentos = $row['apartamentos'];

            return $instalacione;
    }
}
?>
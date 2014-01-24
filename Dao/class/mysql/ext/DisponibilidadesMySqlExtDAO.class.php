<?php
/**
 * Class that operate on table 'disponibilidades'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-07-04 19:10
 */
class DisponibilidadesMySqlExtDAO extends DisponibilidadesMySqlDAO{

	private $mysql;

    function __construct() {
        $this->mysql = new MySql();
    }

    function prepare($data, $idDisponibilidad = 0) {

        if ($idDisponibilidad != 0)
            $Disponibilidad = $this->load($idDisponibilidad);
        else
            $Disponibilidad = new Disponibilidade();
        return $this->mysql->prepare($Disponibilidad, $data);
    }

    public function queryCalendario(){
    	$sql = 'SELECT fecha_inicio, id_apartamento FROM disponibilidades WHERE precio > 0 AND estatus = "disponible" ORDER BY fecha_inicio';
    	$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
    }

	public function queryByIdApartamentoFechas($idApartamento,$fechaInicio,$fechaFinal){
                
		$sql = 'SELECT DISTINCT * FROM disponibilidades WHERE id_apartamento = ? ';
		
		if($fechaFinal){
			$sql .= ' AND UNIX_TIMESTAMP(fecha_inicio) < UNIX_TIMESTAMP("'.$fechaFinal.'") ';
                }
                
                if($fechaInicio){
                        $sql .= ' AND UNIX_TIMESTAMP(fecha_final) >= UNIX_TIMESTAMP("'.$fechaInicio.'") ';
		}
		
		$sql .= ' ORDER BY fecha_inicio';
                
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idApartamento);
		
		return $this->getList($sqlQuery);
	}

	public function queryByIdApartamentoMenorPrecio($idApartamento, $limit = 1){
		$sql = 'SELECT * FROM disponibilidades WHERE id_apartamento = ? AND precio > 0 AND estatus = "disponible" ORDER BY precio ASC LIMIT 0, ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idApartamento);
		$sqlQuery->setNumber($limit);

		return $this->getRow($sqlQuery);
	}

	public function queryByIdApartamentoMinMaxPrecio($idApartamento,$fechaInicio,$fechaFinal){
		$sql = 'SELECT disponibilidades.*, MIN(precio) AS precioMinimo, MAX(precio) AS precioMaximo
		 		FROM disponibilidades WHERE id_apartamento = ? AND precio > 0 AND estatus = "disponible" ';
		
		if($fechaInicio){
            $sql .= ' AND UNIX_TIMESTAMP(fecha_final) >= '.$fechaInicio.' ';
		}
        
        if($fechaFinal){
			$sql .= ' AND UNIX_TIMESTAMP(fecha_inicio) <= '.$fechaFinal.' ';
        }

		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idApartamento);
		return $this->execute($sqlQuery);
	}
        
        public function deleteByIdApartamentoAndFechas($idApartamento,$fechaInicio,$fechaFinal){
                
		$sql = 'DELETE FROM disponibilidades WHERE id_apartamento = ? ';
		
		if($fechaInicio){
                        $sql .= ' AND UNIX_TIMESTAMP(fecha_final) >= '.$fechaInicio.' ';
		}
                
                if($fechaFinal){
			$sql .= ' AND UNIX_TIMESTAMP(fecha_inicio) <= '.$fechaFinal.' ';
                }
		
                
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idApartamento);
		
		return $this->executeUpdate($sqlQuery);
	}
        
        public function queryNoDisponiblesByApartamentoIdAndFechas($idApartamento, $fechaInicio, $fechaFinal) {
                $sql = 'SELECT DISTINCT * FROM disponibilidades WHERE id_apartamento = ? AND estatus = ? ';
		
		if($fechaFinal){
			$sql .= ' AND UNIX_TIMESTAMP(fecha_inicio) <= UNIX_TIMESTAMP("'.$fechaFinal.'") ';
                }
                
                if($fechaInicio){
                        $sql .= ' AND UNIX_TIMESTAMP(fecha_final) >= UNIX_TIMESTAMP("'.$fechaInicio.'") ';
		}
		
		$sql .= ' ORDER BY fecha_inicio';
                
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idApartamento);
		$sqlQuery->set('No disponible');
		return $this->getList($sqlQuery);
        }
        
        public function getByApartamentoFechasPrecioAsc($idApartamento, $fechaInicio, $fechaFinal) {
                $sql = 'SELECT * FROM disponibilidades WHERE id_apartamento = ? AND precio > 0';
		
		if($fechaFinal){
			$sql .= ' AND UNIX_TIMESTAMP(fecha_inicio) <= UNIX_TIMESTAMP("'.$fechaFinal.'") ';
                }
                
                if($fechaInicio){
                        $sql .= ' AND UNIX_TIMESTAMP(fecha_final) >= UNIX_TIMESTAMP("'.$fechaInicio.'") ';
		}
		
		$sql .= ' ORDER BY precio ASC';
                
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idApartamento);
		return $this->getList($sqlQuery);
        }
        
        public function queryByComplejoId($idComplejo, $mes = 0, $anio = 0) {
            $sql = 'select d.id_disponibilidad as idDisponibilidad, d.id_apartamento as idApartamento, d.precio as precio, d.descuento as descuento, d.estatus as estatus, a.nombre as nombre, d.fecha_inicio as fechaInicio from disponibilidades as d ';
            $sql .= ' inner join apartamentos as a on d.id_apartamento = a.id_apartamento ';
            $sql .= ' where a.id_complejo = ? ';
            if($mes) {
                
                $year = $anio ? : date('Y');
                $ini = date('Y-m-d', strtotime($year . '-'. $mes . '-01'));
                
                $end = date('Y-m-d', strtotime($year . '-'. $mes . '-' . cal_days_in_month(CAL_GREGORIAN, $mes, $year)));
                
                $sql .= ' and UNIX_TIMESTAMP(d.fecha_inicio) BETWEEN UNIX_TIMESTAMP("'.$ini.'") AND UNIX_TIMESTAMP("'.$end.'")';
            }
            $sql .= ' ORDER BY d.fecha_inicio ASC';
                            
            $sqlQuery = new SqlQuery($sql);
            $sqlQuery->setNumber($idComplejo);
            return $this->execute($sqlQuery);
        }

}
?>
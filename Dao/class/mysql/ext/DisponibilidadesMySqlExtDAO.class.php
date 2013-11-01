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
		$sql = 'SELECT DISTINCT * FROM disponibilidades WHERE id_apartamento = ? AND estatus = "disponible" AND precio > 0';
		
		if($fechaInicio && $fechaFinal){
			$sql .= ' AND UNIX_TIMESTAMP(fecha_inicio) <= UNIX_TIMESTAMP("'.$fechaFinal.'") ';
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

}
?>
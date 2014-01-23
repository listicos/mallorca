<?php
$action = $_POST["action"];
$result = array("msg" => "error", "data" => "Tu no tienes suficnetes permisos.");

if (strcmp($action, "getTarifas") == 0) {
    if (isset($_POST['idApartamento'])) {
    	$fechaInicio = $_POST['start'];
    	$fechaFin = $_POST['end'];

        $tarifas = getDisponibilidadByApartamentoFechasPro($_POST['idApartamento'],$fechaInicio, $fechaFin);
        $apartamento = getApartamento($_POST['idApartamento']);

        	$disponibilidades = array();
		    
		    if($fechaInicio && $fechaFin)
	    		$days = ($fechaFin - $fechaInicio)/(3600*24);

	    	for($i=0;$i<$days;$i++) {
	            $time = strtotime('+' . $i . ' days', $fechaInicio);
	            
	            $disponibilidades[$i]['start'] = date('Y-m-d', $time);
	        	$disponibilidades[$i]['end'] = date('Y-m-d', $time);
	        	
	        	$disponibilidades[$i]['textColor'] = '#FFF';
	        	$disponibilidades[$i]['borderColor'] = '#FFF';
	        	$disponibilidades[$i]['backgroundColor'] = '#35AA47';
	        	$precio = $apartamento->tarifaBase ? ('€ '.$apartamento->tarifaBase) : " € 0,00";

	        	if($tarifas){
		            foreach ($tarifas as $d) {                
		                if(date('Y-m-d', $time) == date('Y-m-d', strtotime($d->fechaInicio))) {
		                    $dispo = $d;
		                    if($d->precio){
		                    	if($d->estatus != 'disponible')
					        		$disponibilidades[$i]['backgroundColor'] = '#E02222';
		                    	$precio ='€ '.$d->precio;
		                    }
		                    break;
		                }
		                if($time < strtotime($d->fechaInicio))
		                    break;
		            }
		        }

	            $disponibilidades[$i]['title'] = $precio;
	        }
	        $result = $disponibilidades;
	    
        
    } else {
        $result = array("msg" => "error", "data" => "idApartamento es necesario.");
    }
}

if (strcmp($action, 'tarifasByComplejo') == 0) {
    $meses = array(
        'enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio',
        'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre'
    );
    $dias_semana = array(
        'lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado', 'domingo'
    );
    $idComplejo = $_POST['idComplejo'];
    $mes = $_POST['mes'];
    $tarifas = getTarifasByComplejoId($idComplejo, $mes);
    
    $smarty->assign('apartamentos', $tarifas);
    $smarty->assign('mes', $meses[$mes-1]);
    $smarty->assign('diasSemana', $dias_semana);
    $ultimoDia = cal_days_in_month(CAL_GREGORIAN, $mes, date('Y'));
    $smarty->assign('lastDay', $ultimoDia);
    $html = $smarty->fetch('complejo_tarifas.tpl');
    $result = array(
        'msg' => 'ok',
        'data' => $html
    );
}

echo json_encode($result);
?>

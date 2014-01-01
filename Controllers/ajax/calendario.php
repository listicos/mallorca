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

	        /*foreach ($tarifas as $key => $tarifa) {
	        	$disponibilidades[$key]['start'] = $tarifa->fechaInicio;
	        	$disponibilidades[$key]['end'] = $tarifa->fechaFinal;
	        	$precio = $tarifa->precio ? ('€ '.$tarifa->precio) : " € 0,00";
	        	
	        	$disponibilidades[$key]['title'] = $precio;

	        	if($tarifa->estatus == 'disponible'){
	        		$disponibilidades[$key]['backgroundColor'] = '#35AA47';
	        	}else{
	        		$disponibilidades[$key]['backgroundColor'] = '#E02222';
	        	}
	        	$disponibilidades[$key]['textColor'] = '#FFF';
	        	$disponibilidades[$key]['borderColor'] = '#FFF';
	        }*/
	        $result = $disponibilidades;
	    
        
    } else {
        $result = array("msg" => "error", "data" => "idApartamento es necesario.");
    }
}

echo json_encode($result);
?>

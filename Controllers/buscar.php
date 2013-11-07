<?php



$user_vars = Core_Util_Click::getUsersVars();

foreach ($user_vars as $u_k => $u_v) {
	$smarty->assign($u_k,$u_v);
}
/*
	$entrada = isset($_REQUEST['entrada']) ? $_REQUEST['entrada']:'';
	$salida = isset($_REQUEST['salida']) ? $_REQUEST['salida']:'';
	$huespedes = isset($_REQUEST['huespedes']) ? $_REQUEST['huespedes']:2;
	$provincia = isset($_REQUEST['provincia']) ? $_REQUEST['provincia']:'';
	$ciudad = isset($_REQUEST['ciudad']) ? $_REQUEST['ciudad']:'';
*/

$apartamentos = getApartamentosFilters(strtotime($user_vars['fechaInicio']),strtotime($user_vars['fechaFinal']),$user_vars['huespedes']);
$apartamentos_array = array();
$coords = array();

if($apartamentos){
        $minPrice = 99999999;
        $maxPrice = -99999999;
	foreach ($apartamentos as $akey => $apartamento) {
	    $apartamentos_array[$akey]['apartamento'] = $apartamento;
	    $apartamentosAdjuntos = getApartamentosAdjuntos($apartamento->idApartamento);

		if($apartamentosAdjuntos){
		    foreach ($apartamentosAdjuntos as $adkey => $apartamentoAdjunto) {
		        $adjunto = getAdjunto($apartamentoAdjunto->idAdjunto);
		        $apartamentos_array[$akey]['imagen'] = $adjunto;
		        break;
		    }
		}else{
			$apartamentos_array[$akey]['imagen'] = $imagen_default;
		}

		$base_disponibilidad = getDisponibilidadByApartamentoMenorPrecio($apartamento->idApartamento);

                
                
	        if($base_disponibilidad && is_numeric($base_disponibilidad->precio)){
                    $apartamento->tarifaBase = $base_disponibilidad->precio;
                    if($minPrice > $base_disponibilidad->precio) $minPrice = $base_disponibilidad->precio;
                    if($maxPrice < $base_disponibilidad->precio) $maxPrice = $base_disponibilidad->precio;
	            $precio_base = '€'.money_format('%i', $base_disponibilidad->precio) ;
	        }else{
	            $precio_base = 'No disponible';
	        }

                $apartamentos_array[$akey]['precio_base'] = $precio_base;
                
                

		$direccion = getDireccion($apartamento->idDireccion);
		$apartamentos_array[$akey]['direccion'] = $direccion;
		
		if($direccion){
			$coords[] = array('lat' => $direccion->lat,'lon' => $direccion->lon,'id' => $apartamento->idApartamento);
		}

		$opiniones = getOpinionesByApartamento($apartamento->idApartamento);
		$apartamentos_array[$akey]['opiniones'] = count($opiniones);	
	}
        
        $smarty->assign('minPrice',$minPrice);
        $smarty->assign('maxPrice',$maxPrice);
}

$dia_comienzo = date("m/d/y",mktime(0, 0, 0, date("m"), date("d")+1, date("y")));

$disponibilidades = getCalendario();
$disponibles = array();

foreach ($disponibilidades as $d) {
	$disponibles[] = date('Y-n-j',strtotime($d->fechaInicio));
}

$smarty->assign('disponibles',json_encode($disponibles));

/*
	$template->setAttribute('entrada',$entrada);
	$template->setAttribute('salida',$salida);
	$template->setAttribute('huespedes',$huespedes);
	$template->setAttribute('provincia',$provincia);
	$template->setAttribute('ciudad',$ciudad);
*/


$smarty->assign('coords',json_encode($coords));
$smarty->assign('apartamentos', $apartamentos_array);
$smarty->assign('dia_comienzo',$dia_comienzo);

$smarty->display('buscar.tpl');
?>
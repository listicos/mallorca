<?php 
$complejos = allFullComplejos();

$complejos_data = array();

if($complejos){
	foreach ($complejos as $a_k => $a) {
		$complejos_data[$a['id_complejo']]['nombre'] = $a['complejo'];
		$complejos_data[$a['id_complejo']]['descripcion'] = $a['descripcion'];
		$complejos_data[$a['id_complejo']]['lat'] = $a['lat'];
		$complejos_data[$a['id_complejo']]['lon'] = $a['lon'];
		$complejos_data[$a['id_complejo']]['adjuntos'][$a['id_adjunto']] = $a['ruta'];
		$complejos_data[$a['id_complejo']]['apartamentos'][$a['id_apartamento']]['nombre'] = $a['a_nombre'];
		$complejos_data[$a['id_complejo']]['apartamentos'][$a['id_apartamento']]['descripcion'] = json_decode($a['a_descripcion']);
	}
}

$smarty->assign('complejos',$complejos_data);
$smarty->display('complejos.tpl');
?>
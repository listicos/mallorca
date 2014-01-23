<?php 
$complejos = allFullComplejos();


$complejos_data = array();
$idComplejo = false;
if($complejos){
	foreach ($complejos as $a_k => $a) {
                if($idComplejo != $a['id_complejo']) {
                    $idComplejo = $a['id_complejo'];
                    $complejos_data[$a['id_complejo']]['id_complejo'] = $a['id_complejo'];
                    $complejos_data[$a['id_complejo']]['nombre'] = $a['complejo'];
                    $complejos_data[$a['id_complejo']]['descripcion'] = $a['descripcion'];
                    $complejos_data[$a['id_complejo']]['lat'] = $a['lat'];
                    $complejos_data[$a['id_complejo']]['lon'] = $a['lon'];
                    $precios = getRangoPreciosByComplejo($idComplejo);
                    $complejos_data[$a['id_complejo']]['min'] = $precios[0];
                    $complejos_data[$a['id_complejo']]['max'] = $precios[1];
                }
		$complejos_data[$a['id_complejo']]['adjuntos'][$a['ruta']] = $a['ruta'];
		$complejos_data[$a['id_complejo']]['apartamentos'][$a['id_apartamento']]['nombre'] = $a['a_nombre'];
		$complejos_data[$a['id_complejo']]['apartamentos'][$a['id_apartamento']]['descripcion'] = json_decode($a['a_descripcion']);
                $complejos_data[$a['id_complejo']]['apartamentos'][$a['id_apartamento']]['adjuntos'][$a['id_adjunto']] = $a['ruta'];
	}
}

$smarty->assign('page','agroturismo');
$smarty->assign('complejos',$complejos_data);
$smarty->display('complejos.tpl');
?>
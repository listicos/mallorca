<?php

$action = $_POST["action"];
$result = array("msg" => "error", "data" => "No tienes los permisos suficientes");

if(isset($_POST['dateStart']) && strlen(trim($_POST['dateStart'])) && isset($_POST['dateEnd']) && strlen(trim($_POST['dateEnd']))) {
    $fechaInicio = $_POST['dateStart'];
    $fecha = explode("-", $fechaInicio);
    $fechaInicio = $fecha[2] . "-" . $fecha[1] . "-" . $fecha[0];
    $_SESSION['fechaInicio'] = $fechaInicio;

    $fechaFinal = $_POST['dateEnd'];
    $fecha = explode("-", $fechaFinal);
    $fechaFinal = $fecha[2] . "-" . $fecha[1] . "-" . $fecha[0];
    $_SESSION['fechaFinal'] = $fechaFinal;
} else {
    $fechaFinal = null;
    unset($_SESSION['fechaFinal']);
    $fechaInicio = null;
    unset($_SESSION['fechaInicio']);
}

$huespedes = $_POST['huespedes'];

if(isset($_POST['start']))
    $start = $_POST['start'];
else
    $start = 0;

$_SESSION['huespedes'] = $huespedes;

if(isset($_POST['order']))
    $order = $_POST['order'];
else $order = false;

if(isset($_POST['bounds']) && is_array($_POST['bounds']) && count($_POST['bounds']) == 4) {
    $bounds = $_POST['bounds'];
}
else
    $bounds = array();

$complejos = getComplejosFilters($fechaInicio, $fechaFinal, $huespedes, $start, 100, $order, $bounds);

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



$smarty->assign('complejos', $complejos_data);
$html = $smarty->fetch('lista_complejos.tpl');

$result = array(
    'msg' => 'ok',
    'data' => $html
);


echo json_encode($result);
?>

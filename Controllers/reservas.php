<?php

$dias = array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");
$meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

$idApartamento = $_GET['id'];
$apartamento = getApartamento($idApartamento);

if($usuarioAuth = $usuario_core->getUsuario()) {
    $smarty->assign('usuarioAuth', $usuarioAuth);
}

$apartamentos_array = array();
$apartamentos_array['apartamento'] = $apartamento;

$apartamentos_array['apartamento_tipo'] = getApartamentosTipos($apartamento->idApartamentosTipo);

$apartamentosAdjuntos = getApartamentosAdjuntos($idApartamento);

if($apartamentosAdjuntos){
	foreach ($apartamentosAdjuntos as $adkey => $apartamentoAdjunto) {
	    $adjunto = getAdjunto($apartamentoAdjunto->idAdjunto);
	    $apartamentos_array['adjuntos'][$adkey] = $adjunto;
	}
}

//Articulos
$apartamentoArticulos = getArticulosByApartamento($idApartamento);
$articulos = array();

if($apartamentoArticulos)
{
	foreach ($apartamentoArticulos as $aa) {
		$articulos[] = getArticulo($aa->idArticulo);
	}
}
$apartamentos_array['articulos'] = $articulos;

$direccion = getDireccion($apartamento->idDireccion);
$direccion->paisNombre = getPais($direccion->idPais)->nombreCompleto;
$apartamentos_array['direccion'] = $direccion;

$unix_inicio = strtotime($_SESSION['fechaInicio']);
$unix_final = strtotime($_SESSION['fechaFinal']);

$precio = getTotalPrice($idApartamento,$unix_inicio ,$unix_final);
$fechas_reservacion = getByIdApartamentoFechas($idApartamento,$unix_inicio,$unix_final);

$noches = ($unix_final - $unix_inicio) / 86400;

foreach ($fechas_reservacion as $f) {
    $f->precio = '€'.money_format('%i', $f->precio);
    $f_i = strtotime($f->fechaInicio);
    $f->fechaInicio = date('d', $f_i) . ' de ' . $meses[date('n', $f_i) - 1] . ' ' . date('Y', $f_i);
}
if($precio && is_numeric($precio)){
    $menor_precio = money_format('€ %i', $precio) ;
}else{
    $menor_precio = 'No disponible';
}

$fecha_inicio = $dias[date('w', $unix_inicio)] . ' ' . date('d', $unix_inicio) . ' de ' . $meses[date('n', $unix_inicio) - 1] . ' ' . date('Y', $unix_inicio);
$fecha_final = $dias[date('w', $unix_final)] . ' ' . date('d', $unix_final) . ' de ' . $meses[date('n', $unix_final) - 1] . ' ' . date('Y', $unix_final);

$smarty->assign('entrada', $fecha_inicio);
$smarty->assign('salida', $fecha_final);
$smarty->assign('entrada_format', $_SESSION['fechaInicio']);
$smarty->assign('salida_format', $_SESSION['fechaFinal']);

$smarty->assign('huespedes', $_SESSION['huespedes']);
$smarty->assign('noches', $noches);
$smarty->assign('menor_precio',$menor_precio);
$smarty->assign('total_reserva',$precio);


$smarty->assign('apartamento', $apartamentos_array);
$smarty->assign('fechas_reservacion', $fechas_reservacion);

$smarty->assign('lat', $direccion->lat);
$smarty->assign('lon', $direccion->lon);

$smarty->display('reservas.tpl');




?>
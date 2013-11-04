<?php
$idApartamento = $_GET['id'];
$apartamento = getApartamento($idApartamento);

$apartamentos_array = array();
$apartamentos_array['apartamento'] = $apartamento;

$apartamentosAdjuntos = getApartamentosAdjuntos($idApartamento);
foreach ($apartamentosAdjuntos as $adkey => $apartamentoAdjunto) {
    $adjunto = getAdjunto($apartamentoAdjunto->idAdjunto);
    $apartamentos_array['adjuntos'][$adkey] = $adjunto;
}

$direccion = getDireccion($apartamento->idDireccion);
if($pais = getPais($direccion->idPais))
$direccion->paisNombre = $pais->nombreCompleto;
$apartamentos_array['direccion'] = $direccion;

$opiniones = getOpinionesByApartamento($idApartamento);
if (count($opiniones) > 0) {
    $total_puntuacion = 0;
    foreach ($opiniones as $opkey => $opinion) {
        $opiniones[$opkey]->fechaCreacion = date('d/m/Y', strtotime($opiniones[$opkey]->fechaCreacion));
        $total_puntuacion += floatval($opiniones[$opkey]->puntuacion);
    }

    $promedio = round($total_puntuacion / count($opiniones), 1, PHP_ROUND_HALF_UP);

    $apartamentos_array['opiniones'] = $opiniones;
    $apartamentos_array['promedio'] = $promedio;

    $last_opinion = $opiniones[(count($opiniones)) - 1];
    $user_last_opinion = getUsuario($last_opinion->idUsuario);

    $apartamentos_array['last_opinion']['opinion'] = $last_opinion->opinion;
    $apartamentos_array['last_opinion']['usuario'] = $user_last_opinion->nombre;

    $apartamentoTipo = getApartamentosTipos($apartamento->idApartamentosTipo);
    $apartamentos_array['tipo'] = $apartamentoTipo;

    $apartamentoAlojamiento = getApartamentoAlojamientoByAparatamento($idApartamento);
    $apartamentos_array['alojamiento'] = getAlojamiento($apartamentoAlojamiento[0]->idAlojamiento);
}

$instalaciones_array = array();
$instalaciones_list = getApartamentoInstalacionesByAparatamento($idApartamento);
foreach ($instalaciones_list as $ckey => $instalacio) {
    $instalaciones_array[$ckey] = getInstalacion($instalacio->idInstalacion);
}
$sugerencias = getApartamentosCercanos($direccion->lat, $direccion->lon);
$suge_counter = 0;

if ($sugerencias) {
    foreach ($sugerencias as $key => $suge) {
        if($suge->idApartamento == $idApartamento) {
            unset($sugerencias[$key]);
            continue;
        }

        $suge_counter++;
        $apartamentos_adjuntos = getApartamentosAdjuntos($suge->idApartamento);
        $dir_temp = getDireccion($suge->idDireccion);
        $distancia = Core_Util_General::distancia($direccion->lat.','.$direccion->lon, $dir_temp->lat.','.$dir_temp->lon);

        $base_disponibilidad = getDisponibilidadByApartamentoMenorPrecio($suge->idApartamento);

        if($base_disponibilidad && is_numeric($base_disponibilidad->precio)){
            $precio_base = '€'.money_format('%i', $base_disponibilidad->precio) ;
        }else{
            $precio_base = 'No disponible';
        }

        $sugerencias[$key]->precio_base = $precio_base;

        $adjunto = getAdjunto($apartamentos_adjuntos[0]->idAdjunto);

        $sugerencias[$key]->distancia = $distancia;
        
        if($adjunto && count($adjunto)>0){
            $sugerencias[$key]->adjuntoImg = $template_url . $adjunto->ruta;
        }else{
            $sugerencias[$key]->adjuntoImg = $template_url . '/imagen/apartamento.png';
        }
    }
}
if($suge_counter>0)
$apartamentos_array['sugerencias'] = $sugerencias;

$apartamentos_array['instalaciones'] = $instalaciones_array;

$precio = getTotalPrice($idApartamento,strtotime($_SESSION['fechaInicio']),strtotime($_SESSION['fechaFinal']));

if($precio && is_numeric($precio)){
    $menor_precio = '€'.money_format('%i', $precio) ;
}else{
    $menor_precio = 'No disponible';
}

$disponibilidades = getByIdApartamentoFechas($idApartamento);

$disponibles = array();

if($disponibilidades){
    foreach ($disponibilidades as $d) {
        $disponibles[] = date('Y-n-j',strtotime($d->fechaInicio));
    }
    $smarty->assign('disponibles',json_encode($disponibles));
}

$smarty->assign('entrada', $_SESSION['fechaInicio']);
$smarty->assign('salida', $_SESSION['fechaFinal']);
$smarty->assign('huespedes', $_SESSION['huespedes']);


$smarty->assign('menor_precio',$menor_precio);

$smarty->assign('apartamento', $apartamentos_array);
$smarty->assign('lat', $direccion->lat);
$smarty->assign('lon', $direccion->lon);

$smarty->display('apartamento.tpl');
?>
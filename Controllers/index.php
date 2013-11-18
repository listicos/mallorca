<?php

$apartamentos = getApartamentosMasVisitados(15);
$apartamentos_array = array();

$user_vars = Core_Util_Click::getUsersVars();
foreach ($user_vars as $u_k => $u_v) {
    $smarty->assign($u_k, $u_v);
}
$minPrice = 999999999;
$maxPrice = -999999999;

$categorias = getAllInstalacionesCategoria();
foreach ($categorias as $categoria) {
    $categoria->instalaciones = getInstalacionesByCategoria($categoria->idInstalacionCategoria);
    
    foreach ($categoria->instalaciones as $instalacion) {
        $instalacion->apartamentos = count(getApartamentosFilters(0, 0, 1, array($instalacion->idInstalacion)));
    }
}

$smarty->assign('categorias', $categorias);

$habitaciones = getTipoHabitaciones();
foreach ($habitaciones as $habitacion) {
    $habitacion->apartamentos = count(getApartamentosFilters(0, 0, 1, array(), array(), array($habitacion->idAlojamiento)));
}
$tipos_apartamento = getTiposApartamentos();

foreach ($tipos_apartamento as $tipoApto) {
    $tipoApto->apartamentos = count(getApartamentosFilters(0, 0, 1, array(), array($tipoApto->idApartamentosTipo)));
}

$smarty->assign('habitaciones', $habitaciones);
$smarty->assign('tiposApartamento', $tipos_apartamento);

if($apartamentos){
    foreach ($apartamentos as $akey => $apartamento) {
        $apartamento->tipo = getTipoApartamento($apartamento->idApartamentosTipo)->nombre;
        $apartamentos_array[$akey]['apartamento'] = $apartamento;
        $apartamentosAdjuntos = getApartamentosAdjuntos($apartamento->idApartamento);
        foreach ($apartamentosAdjuntos as $adkey => $apartamentoAdjunto) {
            $adjunto = getAdjunto($apartamentoAdjunto->idAdjunto);
            $apartamentos_array[$akey]['adjuntos'][$adkey] = $adjunto;
        }

        if ($apartamento->idDireccion)
            $apartamento->direccion = getDireccion($apartamento->idDireccion);
        $d = getDisponibilidadByApartamentoMenorPrecio($apartamento->idApartamento);
        if ($d)
            $apartamento->tarifaBase = $d->precio;
        if ($apartamento->tarifaBase > $maxPrice)
            $maxPrice = $apartamento->tarifaBase;
        if ($apartamento->tarifaBase < $minPrice)
            $minPrice = $apartamento->tarifaBase;

        $comments = getOpinionesByApartamento($apartamento->idApartamento);
        $apartamentos_array[$akey]['opiniones'] = $comments;

        $apto_disponibilidades = getDisponibilidadByApartamento($apartamento->idApartamento);
        $ds = array();
        foreach ($apto_disponibilidades as $dis) {
            array_push($ds, date('Y-n-j', strtotime($dis->fechaInicio)));
        }

        $apartamentos_array[$akey]['disponibilidades'] = json_encode($ds);
        
        $instalaciones_array = array();
        $instalaciones_list = getApartamentoInstalacionesByAparatamento($apartamento->idApartamento);
        foreach ($instalaciones_list as $ckey => $instalacio) {
            $instalaciones_array[$ckey] = getInstalacion($instalacio->idInstalacion);
        }
        $apartamentos_array[$akey]['instalaciones'] = $instalaciones_array;
    }
}
$dia_comienzo = date("d-m-Y", mktime(0, 0, 0, date("m"), date("d") + 1, date("y")));

$disponibilidades = getCalendario();
$disponibles = array();
if ($disponibilidades) {
    foreach ($disponibilidades as $d) {
        $disponibles[] = date('Y-n-j', strtotime($d->fechaInicio));
    }
}
$trash_text = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut a nisi et purus elementum fermentum a id quam. Curabitur iaculis lacinia massa, a semper arcu sollicitudin et.';
$smarty->assign('trash_text', $trash_text);

$smarty->assign('disponibles',json_encode($disponibles));
$smarty->assign('apartamentos', $apartamentos_array);
$smarty->assign('dia_comienzo', $dia_comienzo);
$smarty->assign('minPrice', $minPrice);
$smarty->assign('maxPrice', $maxPrice);
$smarty->display('home.tpl');
?>
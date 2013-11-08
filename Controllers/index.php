<?php

$apartamentos = getApartamentos();
$apartamentos_array = array();

$user_vars = Core_Util_Click::getUsersVars();
foreach ($user_vars as $u_k => $u_v) {
    $smarty->assign($u_k, $u_v);
}
$minPrice = 999999999;
$maxPrice = -999999999;



foreach ($apartamentos as $akey => $apartamento) {
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
}
$dia_comienzo = date("d-m-Y", mktime(0, 0, 0, date("m"), date("d") + 1, date("y")));

$disponibilidades = getCalendario();
$disponibles = array();
if ($disponibilidades) {
    foreach ($disponibilidades as $d) {
        $disponibles[] = date('Y-n-j', strtotime($d->fechaInicio));
    }
}
//$template->setJsVar('disponibles',json_encode($disponibles));
$smarty->assign('apartamentos', $apartamentos_array);
$smarty->assign('dia_comienzo', $dia_comienzo);
$smarty->assign('minPrice', $minPrice);
$smarty->assign('maxPrice', $maxPrice);
$smarty->display('home.tpl');
?>
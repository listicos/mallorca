<?php
$apartamentos = getApartamentos();
$apartamentos_array = array();

$user_vars = Core_Util_Click::getUsersVars();
foreach ($user_vars as $u_k => $u_v) {
	$smarty->assign($u_k,$u_v);
}

foreach ($apartamentos as $akey => $apartamento) {
    $apartamentos_array[$akey]['apartamento'] = $apartamento;
    $apartamentosAdjuntos = getApartamentosAdjuntos($apartamento->idApartamento);
    foreach ($apartamentosAdjuntos as $adkey => $apartamentoAdjunto) {
        $adjunto = getAdjunto($apartamentoAdjunto->idAdjunto);
        $apartamentos_array[$akey]['adjuntos'][$adkey] = $adjunto;
    }
}
$dia_comienzo = date("m/d/y",mktime(0, 0, 0, date("m"), date("d")+1, date("y")));

$disponibilidades = getCalendario();
$disponibles = array();
foreach ($disponibilidades as $d) {
	$disponibles[] = date('Y-n-j',strtotime($d->fechaInicio));
}
//$template->setJsVar('disponibles',json_encode($disponibles));
$smarty->assign('apartamentos', $apartamentos_array);
$smarty->assign('dia_comienzo',$dia_comienzo);
$smarty->display('home.tpl');
?>
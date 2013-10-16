<?php
require_once 'Logic/apartamentos.php';

$template = new Core_template();
$template->setView('faq.php');
$template->setJS('main.js');
$template->setJS('clickybooking.js');
$template->setTitle('Bienvenidos a Click & Booking');

$apartamentos = getApartamentos();
$apartamentos_array = array();

foreach ($apartamentos as $akey => $apartamento) {
    $apartamentos_array[$akey]['apartamento'] = $apartamento;
    $apartamentosAdjuntos = getApartamentosAdjuntos($apartamento->idApartamento);
    foreach ($apartamentosAdjuntos as $adkey => $apartamentoAdjunto) {
        $adjunto = getAdjunto($apartamentoAdjunto->idAdjunto);
        $apartamentos_array[$akey]['adjuntos'][$adkey] = $adjunto;
    }
}
//var_dump($apartamentos_array);
$template->setAttribute('apartamentos', $apartamentos_array);

echo $template->render();
?>
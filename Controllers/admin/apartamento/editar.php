<?php 
$usuario_core->validateUser();
$is_visible_sidebar = false;    


$usuario_core->validateUser();
$template = new Core_template('admin/template.php');
$template->setAttribute('is_visible_header', true);
$template->setAttribute('is_visible_sidebar', true);


$template->setView('admin/apartamento/editar.php');
$template->setCSS('viewApartamento.css');

$template->setJS('admin/viewApartamento.js');

$idApartamento = $_GET['id'];
$apartamento = getApartamento($idApartamento);

$template->setTitle($apartamento->nombre);

$apartamentos_array = array();
$apartamentos_array['apartamento'] = $apartamento;

$direccion = getDireccion($apartamento->idDireccion);
$direccion->paisNombre = getPais($direccion->idPais)->nombreCompleto;
$apartamentos_array['direccion'] = $direccion;

$apartamentosAdjuntos = getApartamentosAdjuntos($idApartamento);
foreach ($apartamentosAdjuntos as $adkey => $apartamentoAdjunto) {
    $adjunto = getAdjunto($apartamentoAdjunto->idAdjunto);
    $apartamentos_array['adjuntos'][$adkey] = $adjunto;
}

$paises = getPaises();
$monedas = getMonedas();
$tipos_pagos = getPagosTipos();
$idiomas = getIdiomas();
$contratos = getContratos();

$instalaciones_array = array();
$instalaciones_categorias = getAllInstalacionesCategoria();
foreach ($instalaciones_categorias as $ckey => $categoria) {
    $instalaciones_array[$ckey]['categoria'] = $categoria;
    $instalaciones = getInstalacionesByCategoria($categoria->idInstalacionCategoria);
    foreach ($instalaciones as $ikey => $instalacion) {
        $instalaciones_array[$ckey]['instalacion'][$ikey] = $instalacion;
    }
}

$template->setAttribute('paises', $paises);
$template->setAttribute('monedas', $monedas);
$template->setAttribute('tipos_pagos', $tipos_pagos);
$template->setAttribute('idiomas', $idiomas);
$template->setAttribute('instalaciones', $instalaciones_array);
$template->setAttribute('contratos', $contratos);
$template->setAttribute('apartamento', $apartamentos_array);

echo $template->render();
?>

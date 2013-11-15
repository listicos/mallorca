<?php

include_once 'Logic/politicas.php';

$usuario_core->validateUser();

AllowRoles("Administrador, Comercial, Socio, Mallorca");

$template = new Core_template('admin/template.php');
$template->setAttribute('is_visible_header', true);
$template->setAttribute('is_visible_sidebar', true);

$template->setTitle("Detalles del apartamento");
$template->setView('admin/apartamento/gestion.php');
$template->setJS('admin/dropzone.js');
$template->setJS('admin/gestion.js');
$template->setCSS('dropzone.css');

if (isset($_GET['id'])) {
    $idApartamento = $_GET['id'];
    $apartamento = getApartamento($idApartamento);

    $apartamentos_array = array();
    $apartamentos_array['apartamento'] = $apartamento;
    
    $apartamentos_array['moneda'] = getMoneda($apartamento->idMoneda);
    
    $array_instalaciones_id = array();
    $array_instalaciones = getApartamentoInstalacionesByAparatamento($idApartamento);
    foreach ($array_instalaciones as $a_instalacion) {
        array_push($array_instalaciones_id, $a_instalacion->idInstalacion);
    }
    $apartamentos_array['instalaciones'] = $array_instalaciones_id;

    $array_articulos_id = array();
    $array_articulos = getArticulosByApartamento($idApartamento);
    foreach ($array_articulos as $a_articulo) {
        array_push($array_articulos_id, $a_articulo->idArticulo);
    }
    $apartamentos_array['articulos'] = $array_articulos_id;
    
    $array_pagos_id = array();
    $array_pagos = getApartamentosPagosTipos($idApartamento);
    foreach ($array_pagos as $a_pago) {
        array_push($array_pagos_id, $a_pago->idPagoTipo);
    }
    $apartamentos_array['pagos'] = $array_pagos_id;
    
    $apartamentos_array['alojamiento'] = getApartamentoAlojamientoByAparatamento($idApartamento);

    $apartamentosAdjuntos = getApartamentosAdjuntos($idApartamento);
    foreach ($apartamentosAdjuntos as $adkey => $apartamentoAdjunto) {
        $adjunto = getAdjunto($apartamentoAdjunto->idAdjunto);
        $apartamentos_array['adjuntos'][$adkey] = $adjunto;
    }
    
    if(isset($apartamento->idEmpresaContrato)) {
        $empresa_contrato = getEmpresaContrato($apartamento->idEmpresaContrato);
        $contrato = getContrato($empresa_contrato->idContrato);
        
        $apartamentos_array['empresaContrato'] = $empresa_contrato;
        $apartamentos_array['contrato'] = $contrato;
        
    }

    $direccion = getDireccion($apartamento->idDireccion);
    $direccion->paisNombre = getPais($direccion->idPais)->nombreCompleto;
    $apartamentos_array['direccion'] = $direccion;
    
    $documentos = getDocumentosByApartamentoId($idApartamento);
    
    $template->setAttribute('documentos', $documentos);

    $template->setAttribute('apartamento', $apartamentos_array);
    $template->setAttribute('edit', true);
} else {
    $template->setAttribute('apartamento', 0);
    $template->setAttribute('edit', false);
}

$paises = getPaises();
$monedas = getMonedas();
$tipos_pagos = getPagosTipos();
$idiomas = getIdiomas();
$habitaciones = getTipoHabitaciones();
$tipos_apartamento = getTiposApartamentos();
$empresas = getEmpresas();
$articulos = getArticulos();
$politicas = getPoliticas();

$instalaciones_array = array();
$instalaciones_categorias = getAllInstalacionesCategoria();
foreach ($instalaciones_categorias as $ckey => $categoria) {
    $instalaciones_array[$ckey]['categoria'] = $categoria;
    $instalaciones = getInstalacionesByCategoria($categoria->idInstalacionCategoria);
    foreach ($instalaciones as $ikey => $instalacion) {
        $instalaciones_array[$ckey]['instalacion'][$ikey] = $instalacion;
    }
}

$complejos = AllComplejos();

$template->setAttribute('paises', $paises);
$template->setAttribute('empresas', $empresas);
$template->setAttribute('monedas', $monedas);
$template->setAttribute('tipos_pagos', $tipos_pagos);
$template->setAttribute('idiomas', $idiomas);
$template->setAttribute('instalaciones', $instalaciones_array);
$template->setAttribute('contratos', $contratos);
$template->setAttribute('habitaciones', $habitaciones);
$template->setAttribute('tiposApartamento', $tipos_apartamento);
$template->setAttribute('articulos', $articulos);
$template->setAttribute('politicas', $politicas);
$template->setAttribute('complejos', $complejos);

echo $template->render();
?>
<?php
$usuario_core->validateUser();
$template = new Core_template('admin/template.php');
$template->setAttribute('is_visible_header', true);
$template->setAttribute('is_visible_sidebar', true);

$template->setView('admin/apartamento/lista.php');
$template->setTitle("Apartamentos");
$apartamentos = getApartamentos();
$apartamentos_array = array();

foreach ($apartamentos as $key => $ap) {
    $apartamentos_array[$key]['apartamento'] = $ap;
    $apartamentos_array[$key]['direccion'] = getDireccion($ap->idDireccion);
    $empresaContrato = getEmpresaContrato($ap->idEmpresaContrato);
    $empresa = getEmpresa($empresaContrato->idEmpresa);
    $apartamentos_array[$key]['empresa'] = $empresa;
}
$template->setAttribute('apartamentos', $apartamentos_array);
echo $template->render();
?>
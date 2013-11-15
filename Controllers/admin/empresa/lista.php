<?php
$usuario_core->validateUser();

AllowRoles("Administrador, Socio, Mallorca");

$template = new Core_template('admin/template.php');

$template->setJS('admin/lista-empresa.js');

$empresas_query = getEmpresas();
$template->setAttribute('empresas_query', $empresas_query);

$template->setAttribute('is_visible_header', true);
$template->setAttribute('is_visible_sidebar', true);

$template->setView('admin/empresa/lista.php');
$template->setTitle("Propietarios");

echo $template->render();
?>
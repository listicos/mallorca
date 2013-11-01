<?php
$usuario_core->validateUser();

AllowRoles("Administrador, Socio");

$template = new Core_template('admin/template.php');
$template->setAttribute('is_visible_header', true);
$template->setAttribute('is_visible_sidebar', true);

$template->setJS('admin/lista-contrato.js');
$template->setView('admin/contrato/lista.php');
$template->setTitle("Contratos");

echo $template->render();
?>
<?php
$usuario_core->validateUser();

AllowRoles("Administrador, Socio");

$template = new Core_template('admin/template.php');
$template->setAttribute('is_visible_header', true);
$template->setAttribute('is_visible_sidebar', true);

$template->setCSS('calendario.css');
$template->setJS('admin/calendario.js');

$template->setTitle("Disponibilidad de apartamentos");

$template->setView('admin/calendario.php');

echo $template->render();
?>
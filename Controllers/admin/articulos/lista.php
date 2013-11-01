<?php
$usuario_core->validateUser();

AllowRoles("Administrador, Comercial, Socio");

$template = new Core_template('admin/template.php');
$template->setAttribute('is_visible_header', true);
$template->setAttribute('is_visible_sidebar', true);
$template->setView('admin/articulos/lista.php');
$template->setJS('admin/lista-articulos.js');
$template->setTitle("Artículos");
echo $template->render();
?>
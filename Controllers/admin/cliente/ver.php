<?php
$usuario_core->validateUser();

AllowRoles("Administrador, Comercial, Socio, Mallorca");

$template = new Core_template('admin/template.php');
$template->setAttribute('is_visible_header', true);
$template->setAttribute('is_visible_sidebar', true);
$template->setView('admin/clientes.php');
$template->setTitle("Clientes");
echo $template->render();
?>
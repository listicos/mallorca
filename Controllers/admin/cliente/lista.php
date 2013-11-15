<?php
$usuario_core->validateUser();

AllowRoles("Administrador, Comercial, Socio, Mallorca");

$template = new Core_template('admin/template.php');
$template->setAttribute('is_visible_header', true);
$template->setAttribute('is_visible_sidebar', true);
$template->setJS('admin/lista-clientes.js');
$template->setView('admin/cliente/lista.php');
$template->setTitle("Huéspedes");
echo $template->render();
?>
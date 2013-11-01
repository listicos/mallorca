<?php

$usuario_core->validateUser();

AllowRoles("Administrador, Comercial, Socio, Reserva");

$template = new Core_template('admin/template.php');
$template->setAttribute('is_visible_header', true);
$template->setAttribute('is_visible_sidebar', true);

$template->setJS('admin/lista-canales.js');
$template->setView('admin/canales/lista.php');
$template->setTitle("Canales");

echo $template->render();

?>

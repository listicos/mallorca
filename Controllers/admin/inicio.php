<?php

$usuario_core->validateUser();

AllowRoles("Administrador, Socio, Reserva, Mallorca");

$template = new Core_template('admin/template.php');
$template->setAttribute('is_visible_header', true);
$template->setAttribute('is_visible_sidebar', true);

$template->setJS('admin/inicio.js');

$template->setTitle("Inicio");

$template->setView('admin/inicio/lista.php');

echo $template->render();

?>

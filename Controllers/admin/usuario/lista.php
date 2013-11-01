<?php

$usuario_core->validateUser();

AllowRoles("Administrador");

$template = new Core_template('admin/template.php');
$template->setAttribute('is_visible_header', true);
$template->setAttribute('is_visible_sidebar', true);
$template->setJS('admin/lista-usuarios.js');
$template->setView('admin/usuario/lista.php');
$template->setTitle("Usuarios");
echo $template->render();
?>

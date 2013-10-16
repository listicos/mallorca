<?php
$usuario_core->validateUser();

$usuario = $usuario_core->getUsuario();

$template = new Core_template('admin/template.php');
$template->setAttribute('is_visible_header', true);
$template->setAttribute('is_visible_sidebar', true);

$template->setJS('admin/perfil.js');

$perfil_template = new Core_template('admin/perfil.php');
$perfil_template->setAttribute('usuario', $usuario);
$template->setView($perfil_template);


$template->setTitle('Perfil | ' . $usuario->nombre);


echo $template->render();
?>
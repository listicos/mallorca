<?php

$usuario_core->validateUser();

$usuario = $usuario_core->getUsuario();

$template = new Core_template();
$template->setView('opinar.php');
$template->setCSS('opinar.css');
$template->setJS('opinar.js');

$template->setTitle('Opinar | ' . $usuario->nombre);

$template->setAttribute('usuario', $usuario);

echo $template->render();
?>
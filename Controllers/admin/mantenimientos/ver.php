<?php

include_once 'Logic/mantenimiento.php';

$usuario_core->validateUser();

AllowRoles("Administrador, Socio");

$template = new Core_template('admin/template.php');
$template->setAttribute('is_visible_header', true);
$template->setAttribute('is_visible_sidebar', true);

if(isset($_GET['id'])) {
    $mantenimiento = getMantenimiento($_GET['id']);
    $template->setAttribute('mantenimiento', $mantenimiento);
}

$template->setView('admin/mantenimientos/ver.php');
$template->setCSS('mantenimientos.css');
$template->setJS('admin/ver-mantenimiento.js');
$template->setTitle("Mantenimientos");
echo $template->render();
?>
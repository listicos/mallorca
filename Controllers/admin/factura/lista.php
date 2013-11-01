<?php
$usuario_core->validateUser();

AllowRoles("Administrador");

$template = new Core_template('admin/template.php');

$template->setAttribute('is_visible_header', true);
$template->setAttribute('is_visible_sidebar', true);

if(isset($_GET['id']))
    $template->setAttribute ('empresaId', $_GET['id']);
if(isset($_GET['user']))
    $template->setAttribute ('usuarioId', $_GET['user']);

$template->setJS('admin/lista-factura.js');
$template->setCSS('lista-factura.css');

$template->setView('admin/factura/lista.php');
$template->setTitle("Facturas");

echo $template->render();
?>
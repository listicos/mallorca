<?php
$usuario_core->validateUser();

AllowRoles("Administrador");

$template = new Core_template('admin/template.php');
$template->setAttribute('is_visible_header', true);
$template->setAttribute('is_visible_sidebar', true);
$template->setView('admin/factura/ver.php');
$template->setCSS("facturas.css");
$template->setTitle("Factura");
echo $template->render();
?>
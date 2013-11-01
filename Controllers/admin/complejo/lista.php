<?php 
$usuario_core->validateUser();

AllowRoles("Administrador, Comercial, Socio");

$template = new Core_template('admin/template.php');

$template->setJS('admin/lista-complejos.js');


$template->setAttribute('is_visible_header', true);
$template->setAttribute('is_visible_sidebar', true);

$template->setView('admin/complejo/lista.php');
$template->setTitle("Complejos");

echo $template->render();

?>
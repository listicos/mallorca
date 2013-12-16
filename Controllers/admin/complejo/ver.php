<?php

$usuario_core->validateUser();
$template = new Core_template('admin/template.php');

$template->setJS('admin/dropzone.js');
$template->setCSS('dropzone.css');

AllowRoles("Administrador, Comercial, Socio, Mallorca");

$template->setAttribute('is_visible_header', true);
$template->setAttribute('is_visible_sidebar', true);
$template->setAttribute('template_url', $template_url);

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $complejo = getComplejoById($id);
    $template->setAttribute('complejo', $complejo);
}

$template->setView('admin/complejo/ver.php');
$template->setJS('admin/ver-complejo.js');
$template->setCSS('complejo.css');
$template->setJS('../ckeditor/ckeditor.js');
$template->setJS('../ckeditor/adapters/jquery.js');
$template->setCSS('ckeditor.css');
$template->setTitle("Gestión de complejos");



echo $template->render();
?>

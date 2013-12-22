<?php

include_once 'Logic/politicas.php';

$usuario_core->validateUser();

AllowRoles("Administrador, Socio, Mallorca");

$template = new Core_template('admin/template.php');
$template->setAttribute('is_visible_header', true);
$template->setAttribute('is_visible_sidebar', true);
$template->setCSS('ckeditor.css');
$template->setJS('../ckeditor/ckeditor.js');
$template->setJS('../ckeditor/adapters/jquery.js');

$idiomas = getIdiomas();
$template->setAttribute('idiomas', $idiomas);

if(isset($_GET['id'])) {
    $politica = getPolitica($_GET['id']);
    $template->setAttribute('politica', $politica);
}

$template->setView('admin/politicas/ver.php');
$template->setCSS('politicas.css');
$template->setJS('admin/ver-politica.js');
$template->setTitle("Agregar / Editar política de cancelación");
echo $template->render();
?>
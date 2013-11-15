<?php

$usuario_core->validateUser();
$template = new Core_template('admin/template.php');

AllowRoles("Administrador, Comercial, Socio, Mallorca");

$template->setAttribute('is_visible_header', true);
$template->setAttribute('is_visible_sidebar', true);

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $complejo = getComplejoById($id);
    $template->setAttribute('complejo', $complejo);
}

$template->setView('admin/complejo/ver.php');
$template->setJS('admin/ver-complejo.js');
$template->setTitle("Gestión de complejos");



echo $template->render();
?>

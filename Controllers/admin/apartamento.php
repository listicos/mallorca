<?php
$usuario_core->validateUser();
$template = new Core_template('admin/template.php');
$template->setAttribute('is_visible_header', true);
$template->setAttribute('is_visible_sidebar', true);

$template->setTitle("Gestión de opiniones ");
$template->setView('admin/opinion.php');

echo $template->render();
?>
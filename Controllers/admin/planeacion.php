<?php
$usuario_core->validateUser();
$template = new Core_template('admin/template.php');
$template->setAttribute('is_visible_header', true);
$template->setAttribute('is_visible_sidebar', true);

$template->setView('admin/planeacion.php');

$template->setJS('admin/planeacion.js');

$template->setTitle("Planeación");
echo $template->render();
?>
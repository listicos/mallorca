<?php
$usuario_core->validateUser();
$template = new Core_template('admin/template.php');
$template->setAttribute('is_visible_header', true);
$template->setAttribute('is_visible_sidebar', true);
$template->setView('admin/mantenimientos/lista.php');
$template->setJS('admin/lista-mantenimientos.js');
$template->setTitle("Mantenimientos");
echo $template->render();
?>
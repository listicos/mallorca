<?php
$template = new Core_template('admin/template.php');
$template->setAttribute('is_visible_header', true);
$template->setAttribute('is_visible_sidebar', true);

$template->setJS('admin/lista-opinion.js');
$template->setTitle("Opiniones");
$template->setView('admin/opinion/lista.php');

echo $template->render();
?>
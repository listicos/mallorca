<?php
$usuario_core->validateUser();
$template = new Core_template('admin/template.php');
$template->setAttribute('is_visible_header', true);
$template->setAttribute('is_visible_sidebar', true);
$template->setView('admin/politicas/lista.php');
$template->setJS('admin/lista-politicas.js');
$template->setTitle("Lista de políticas de cancelación");
echo $template->render();
?>
<?php
$template = new Core_template('admin/recuperarDatos.php');
$template->setAttribute('is_visible_header', true);
$template->setAttribute('is_visible_sidebar', true);

$template->setTitle("Recuperar datos");

//$template->setCSS('styles.css');

$template->setJS('main.js');
$template->setJS('testmain.js');
//$template->setTitle('Welcome custom');

echo $template->render();
?>
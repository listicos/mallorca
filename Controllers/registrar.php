<?php
$template = new Core_template();
$template->setView('registrar.php');
$template->setCSS('registrar.css');
$template->setJS('registrar.js');
$template->setTitle('Registrar | Click & Booking');

echo $template->render();
?>
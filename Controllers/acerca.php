<?php
$template = new Core_template();
$template->setView('acerca.php');
$template->setCSS('acerca.css');
$template->setTitle('Acerca | Click & Booking');

echo $template->render();
?>
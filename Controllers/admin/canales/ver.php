<?php

include_once 'Logic/canales.php';

$usuario_core->validateUser();

AllowRoles("Administrador, Comercial, Socio, Reserva");

$template = new Core_template('admin/template.php');

$template->setAttribute('is_visible_header', true);
$template->setAttribute('is_visible_sidebar', true);

$template->setView('admin/canales/ver.php');
$template->setJS('admin/gestion-canales.js');
$template->setTitle("Gestión de canales");


if (isset($_GET['id']) && is_numeric($_GET['id'])) {

    $canal = getCanal($_GET['id']);
    $template->setAttribute('canal', $canal);
    
}



echo $template->render();
?>

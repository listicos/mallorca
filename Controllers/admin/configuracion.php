<?php

$usuario_core->validateUser();

AllowRoles("Administrador, Mallorca");

$template = new Core_template('admin/template.php');
$template->setAttribute('is_visible_header', true);
$template->setAttribute('is_visible_sidebar', true);

$config = getConfiguracion();
$paises = getPaises();

$template->setTitle("Configuración");

$configView = new Core_template('admin/configuracion.php');
$configView->setAttribute ('configuracion', $config);
$configView->setAttribute ('paises', $paises);
$template->setView($configView);

$template->setJS('admin/configuracion.js');



echo $template->render();

?>

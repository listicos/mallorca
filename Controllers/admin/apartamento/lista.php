<?php
$usuario_core->validateUser();
$template = new Core_template('admin/template.php');
$template->setAttribute('is_visible_header', true);
$template->setAttribute('is_visible_sidebar', true);


if(isset($_GET['id'])) {
    $template->setAttribute('empresaId', $_GET['id']);
}

$template->setJS('admin/lista-apartamento.js');
$template->setView('admin/apartamento/lista.php');
$template->setTitle("Apartamentos");

echo $template->render();
?>
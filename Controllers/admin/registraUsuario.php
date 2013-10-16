<?php
$template = new Core_template('admin/template.php');
$template->setAttribute('is_visible_header', true);
$template->setAttribute('is_visible_sidebar', true);
$template->setTitle("Registro de usuario");
$template->setView('admin/registraUsuario.php');

$template->setJS('registra_usuario.js');
//$template->setJS('user_register.js');


echo $template->render();
?>

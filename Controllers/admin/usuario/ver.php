<?php

include_once 'Logic/usuario.php';

$usuario_core->validateUser();

AllowRoles("Administrador");

$template = new Core_template('admin/template.php');
$template->setAttribute('is_visible_header', true);
$template->setAttribute('is_visible_sidebar', true);

if(isset($_GET['id'])) {
    $usuario = getUsuario($_GET['id']);
    $template->setAttribute('usuario', $usuario);
}

$grupos = getUsuariosGrupos();
$template->setAttribute('grupos', $grupos);

$paises = getPaises();
$provincias = getProvincias();

$template->setAttribute('paises', $paises);
$template->setAttribute('provincias', $provincias);

$template->setView('admin/usuario/ver.php');
$template->setCSS('usuarios.css');
$template->setJS('admin/ver-usuario.js');
$template->setTitle("Usuarios");
echo $template->render();
?>
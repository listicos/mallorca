<?php
$usuario_core->validateUser();
$template = new Core_template('admin/template.php');
$template->setAttribute('is_visible_header', true);
$template->setAttribute('is_visible_sidebar', true);

if(isset($_GET['id'])) {
    $articulo = getArticulo($_GET['id']);
    $template->setAttribute('articulo', $articulo);
}

$idiomas = getIdiomas();
$tipos = getTiposArticulo();

$template->setAttribute('idiomas', $idiomas);
$template->setAttribute('tipos', $tipos);

$template->setView('admin/articulos/ver.php');
$template->setCSS('articulos.css');
$template->setJS('admin/ver-articulo.js');
$template->setTitle("Articulos");
echo $template->render();
?>
<?php
$usuario_core->validateUser();

AllowRoles("Administrador, Socio");

$template = new Core_template('admin/template.php');
$template->setAttribute('is_visible_header', true);
$template->setAttribute('is_visible_sidebar', true);
$template->setView('admin/contrato/gestion.php');
$template->setTitle("Detalle del contrato");
$template->setJS('admin/gestion-contratos.js');
$edit = false;
if(isset($_GET['id']) && is_numeric($_GET['id'])){
	$contrato = getContrato($_GET['id']);	
	$template->setAttribute('contrato', $contrato);
	$edit = true;
}
$template->setAttribute('edit',$edit);

echo $template->render();
?>
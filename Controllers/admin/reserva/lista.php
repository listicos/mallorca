<?php
$usuario_core->validateUser();

AllowRoles("Administrador, Socio, Reserva, Mallorca");

$template = new Core_template('admin/template.php');

$template->setAttribute('is_visible_header', true);
$template->setAttribute('is_visible_sidebar', true);

if(isset($_GET['id']))
    $template->setAttribute ('empresaId', $_GET['id']);
if(isset($_GET['user']))
    $template->setAttribute ('usuarioId', $_GET['user']);

/*$template->setJS('ckeditor/ckeditor.js');
$template->setJS('ckeditor/config.js');
$template->setJS('ckeditor/lang/es.js');
$template->setJS('ckeditor/styles.js');

$template->setJS('ckeditor/plugins/a11yhelp/dialogs/a11yhelp.js');
$template->setJS('ckeditor/plugins/about/dialogs/about.js');
$template->setJS('ckeditor/plugins/clipboard/dialogs/paste.js');
$template->setJS('ckeditor/plugins/dialog/dialogDefinition.js');
$template->setJS('ckeditor/plugins/image/dialogs/image.js');

$template->setJS('ckeditor/plugins/link/dialogs/link.js');
$template->setJS('ckeditor/plugins/dialogs/anchor.js');

$template->setJS('ckeditor/plugins/pastefromword/filter/default.js');
$template->setJS('ckeditor/plugins/scayt/dialogs/options.js');
$template->setJS('ckeditor/plugins/specialchar/dialogs/specialchar.js');
$template->setJS('ckeditor/plugins/table/dialogs/table.js');
$template->setJS('ckeditor/plugins/tabletools/dialogs/tableCell.js');*/

$template->setAttribute ('apartamentos', getApartamentos());

$template->setJS('admin/lista-reserva.js');

$template->setCSS('lista-reserva.css');

$template->setView('admin/reserva/lista.php');
$template->setTitle("Reservas");

echo $template->render();
?>
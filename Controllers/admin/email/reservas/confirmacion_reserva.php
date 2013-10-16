<?php
$usuario_core->validateUser();
$template = new Core_template('admin/email/reservas/confirmacion_reserva.php');
$template->setTitle("Confirmación");

echo $template->render();
?>
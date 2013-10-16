<?php
$usuario_core->validateUser();
$template = new Core_template('admin/email/reservas/modificacion_reserva.php');
$template->setTitle("Modificación");

echo $template->render();
?>
<?php
$usuario_core->validateUser();

AllowRoles("Administrador, Comercial, Socio, Mallorca");

header('Location:'.$base_url.'/admin-inicio');
?>
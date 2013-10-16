<?php

$usuario_core->validateUser();

$template = new Core_template('admin/template.php');
$template->setAttribute('is_visible_header', true);
$template->setAttribute('is_visible_sidebar', true);

$empresas = getEmpresas();
$template->setAttribute('empresas', $empresas);
if(count($empresas) > 0) {
    $empresa = $empresas[0];
    $apartamentos = getApartamentosByEmpresa($empresa->idEmpresa);
    $template->setAttribute('apartamentos', $apartamentos);
}

$usuarios = getClientes();

$template->setAttribute('usuarios', $usuarios);
$canales = getCanales();
$template->setAttribute('canales', $canales);

if(isset($_GET['id'])) {
    $reserva_id = $_GET['id'];
    $reserva = getReserva($reserva_id);
    
    $apartamento = getApartamento($reserva->idApartamento);
    $usuario = getUsuario($reserva->idUsuario);
    
    $template->setAttribute('reserva', $reserva);
    $template->setAttribute('apartamento', $apartamento);
    $template->setAttribute('usuario', $usuario);
}

$template->setTitle("Centro de reserva");
$template->setJS('admin/ver-reserva.js');
$template->setView('admin/reserva/ver.php');
$template->setCSS('reserva.css');

echo $template->render();
?>
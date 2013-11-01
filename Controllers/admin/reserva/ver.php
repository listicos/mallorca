<?php

$usuario_core->validateUser();

AllowRoles("Administrador, Socio, Reserva");

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
    
    $articulos = getArticulosListByApartamento($apartamento->idApartamento);
    $template->setAttribute('articulos', $articulos);
    
    $articulos_reserva = getArticulosByReserva($reserva_id);
    if(count($articulos_reserva) > 0) {
        $ar = array();
        foreach ($articulos_reserva as $a)
            $ar[$a->idArticulo] = $a->cantidad;
        $template->setAttribute('articulos_reserva', $ar);
    }
    
    if(!isset($ar)) $ar = array();
    
    $desglosedPrice = getTotalPriceComplete($apartamento->idApartamento,strtotime($reserva->fechaEntrada),strtotime($reserva->fechaSalida), $ar, $reserva->adultos);
    $template->setAttribute('precio_desglosado', $desglosedPrice);
}

$template->setTitle("Centro de reserva");
$template->setJS('admin/ver-reserva.js');
$template->setView('admin/reserva/ver.php');
$template->setCSS('reserva.css');

echo $template->render();
?>
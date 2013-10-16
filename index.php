<?php
session_start();
header('Content-Type: text/html; charset=UTF-8'); 
error_reporting(E_ERROR | E_WARNING | E_PARSE);
include('config.php');

include 'Core/Include.php';
require 'Lib/smarty/Smarty.class.php';

$smarty = new Smarty();
$smarty->debugging = false;
$smarty->caching = false;
$smarty->cache_lifetime = 120;
$smarty->assign("base_url",$base_url);
$smarty->assign("template_url",$template_url);
$smarty->assign("template_url_s",$template_url_s);

$controller = new Core_Controller();
$usuario_core = Core_Usuario::getInstance();
$usuario = $usuario_core->getUsuario();

include 'Dao/include_dao.php';
include './Logic/direcciones.php';
include './Logic/empresas.php';
include './Logic/usuario.php';
include './Logic/cuenta.php';
include './Logic/apartamentos.php';
include './Logic/contratos.php';
include './Logic/opiniones.php';
include './Logic/calendario.php';
include './Logic/reservas.php';
include './Logic/articulos.php';

$includes = $controller->getFileAction();
if (is_file($includes)) {
    include $includes;
} else {
    header('Location:' . $base_url);
}
setlocale(LC_MONETARY, 'nl_NL.UTF-8');

?>
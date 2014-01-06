<?php
session_start();
header('Content-Type: text/html; charset=UTF-8'); 
error_reporting(E_ERROR | E_WARNING | E_PARSE);
include('config.php');

include 'Core/Include.php';
require 'Lib/smarty/Smarty.class.php';



$controller = new Core_Controller();
$usuario_core = Core_Usuario::getInstance();
$usuario = $usuario_core->getUsuario();

include 'Dao/include_dao.php';
include 'Logic/direcciones.php';
include 'Logic/empresas.php';
include 'Logic/usuario.php';
include 'Logic/cuenta.php';
include 'Logic/apartamentos.php';
include 'Logic/contratos.php';
include 'Logic/opiniones.php';
include 'Logic/calendario.php';
include 'Logic/reservas.php';
include 'Logic/articulos.php';
include 'Logic/complejos.php';
include 'Logic/configuracion.php';

$includes = $controller->getFileAction();

if(substr_count($_SERVER['REQUEST_URI'], "/admin-") == 0) {

    $smarty = new Smarty();
    $smarty->debugging = false;
    $smarty->caching = false;
    $smarty->cache_lifetime = 120;
    $smarty->assign("base_url",$base_url);
    $smarty->assign("template_url",$template_url);
    $smarty->assign("template_url_s",$template_url_s);
    
    if(isset($_REQUEST['lang'])) {
        $_SESSION['lang'] = $_REQUEST['lang'];
        $lang_set = $_SESSION['lang'];
        
    }
    else {
        if (isset($_SESSION['lang'])) {
            $lang_set = $_SESSION['lang'];
            
        } else {
              $lang_set = "es";
        }
    }
    
    $smarty->assign('lang', $lang_set);
    $smarty->configLoad($lang_set . '.conf');
    
    $actual_url = getActualUrl();
    
    $smarty->assign('actual_url', $actual_url);
    
    $languages = getIdiomas();

    $smarty->assign('languages', $languages);
    $config = getConfiguracion();
$smarty->assign('config', $config);

}else{
    $grupo = ActiveRole();
    if($grupo=='Cliente')   header('Location:' . $base_url);
}

if (is_file($includes)) {
    include $includes;
} else {
    header('Location:' . $base_url);
}
setlocale(LC_MONETARY, 'nl_NL.UTF-8');
/*
function money_format($format, $number) 
{ 
    $regex  = '/%((?:[\^!\-]|\+|\(|\=.)*)([0-9]+)?'. 
              '(?:#([0-9]+))?(?:\.([0-9]+))?([in%])/'; 
    if (setlocale(LC_MONETARY, 0) == 'C') { 
        setlocale(LC_MONETARY, ''); 
    } 
    $locale = localeconv(); 
    preg_match_all($regex, $format, $matches, PREG_SET_ORDER); 
    foreach ($matches as $fmatch) { 
        $value = floatval($number); 
        $flags = array( 
            'fillchar'  => preg_match('/\=(.)/', $fmatch[1], $match) ? 
                           $match[1] : ' ', 
            'nogroup'   => preg_match('/\^/', $fmatch[1]) > 0, 
            'usesignal' => preg_match('/\+|\(/', $fmatch[1], $match) ? 
                           $match[0] : '+', 
            'nosimbol'  => preg_match('/\!/', $fmatch[1]) > 0, 
            'isleft'    => preg_match('/\-/', $fmatch[1]) > 0 
        ); 
        $width      = trim($fmatch[2]) ? (int)$fmatch[2] : 0; 
        $left       = trim($fmatch[3]) ? (int)$fmatch[3] : 0; 
        $right      = trim($fmatch[4]) ? (int)$fmatch[4] : $locale['int_frac_digits']; 
        $conversion = $fmatch[5]; 

        $positive = true; 
        if ($value < 0) { 
            $positive = false; 
            $value  *= -1; 
        } 
        $letter = $positive ? 'p' : 'n'; 

        $prefix = $suffix = $cprefix = $csuffix = $signal = ''; 

        $signal = $positive ? $locale['positive_sign'] : $locale['negative_sign']; 
        switch (true) { 
            case $locale["{$letter}_sign_posn"] == 1 && $flags['usesignal'] == '+': 
                $prefix = $signal; 
                break; 
            case $locale["{$letter}_sign_posn"] == 2 && $flags['usesignal'] == '+': 
                $suffix = $signal; 
                break; 
            case $locale["{$letter}_sign_posn"] == 3 && $flags['usesignal'] == '+': 
                $cprefix = $signal; 
                break; 
            case $locale["{$letter}_sign_posn"] == 4 && $flags['usesignal'] == '+': 
                $csuffix = $signal; 
                break; 
            case $flags['usesignal'] == '(': 
            case $locale["{$letter}_sign_posn"] == 0: 
                $prefix = '('; 
                $suffix = ')'; 
                break; 
        } 
        if (!$flags['nosimbol']) { 
            $currency = $cprefix . 
                        ($conversion == 'i' ? $locale['int_curr_symbol'] : $locale['currency_symbol']) . 
                        $csuffix; 
        } else { 
            $currency = ''; 
        } 
        $space  = $locale["{$letter}_sep_by_space"] ? ' ' : ''; 

        $value = number_format($value, $right, $locale['mon_decimal_point'], 
                 $flags['nogroup'] ? '' : $locale['mon_thousands_sep']); 
        $value = @explode($locale['mon_decimal_point'], $value); 

        $n = strlen($prefix) + strlen($currency) + strlen($value[0]); 
        if ($left > 0 && $left > $n) { 
            $value[0] = str_repeat($flags['fillchar'], $left - $n) . $value[0]; 
        } 
        $value = implode($locale['mon_decimal_point'], $value); 
        if ($locale["{$letter}_cs_precedes"]) { 
            $value = $prefix . $currency . $space . $value . $suffix; 
        } else { 
            $value = $prefix . $value . $space . $currency . $suffix; 
        } 
        if ($width > 0) { 
            $value = str_pad($value, $width, $flags['fillchar'], $flags['isleft'] ? 
                     STR_PAD_RIGHT : STR_PAD_LEFT); 
        } 

        $format = str_replace($fmatch[0], $value, $format); 
    } 
    return $format; 
}
*/
function hasRoles($roles) {
    $role = ActiveRole();
    
    $roles_arr = explode(",", str_replace(" ", "", $roles));
    
    if(in_array($role, $roles_arr)) {
        return true;
    }
    return false;
}

function ActiveRole() {
    $usuario_core = Core_Usuario::getInstance();

    if(!$usuario_core->validateUser())
        return false;
    
    $usuario = $usuario_core->getUsuario();
    
    $grupoUsuario = getUsuarioGrupo($usuario->idUsuarioGrupo);
    
    
    return $grupoUsuario->nombre;
}

function AllowRoles($roles) {
    $role = ActiveRole();
    
    $roles_arr = explode(",", str_replace(" ", "", $roles));
    
    GLOBAL $base_url;
    
    if(in_array($role, $roles_arr)) {
        return true;
    }
    //header('Location:' . $base_url . '/admin-inicio/');
}

function getActualUrl() {
    
    global $lang_set;
    
    $url = "http://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
    $url = str_replace("/lang:" . $lang_set, "", $url); 
    
    if(substr_count($_SERVER["REQUEST_URI"], "/") < 2 || (substr_count($_SERVER["REQUEST_URI"], "/") == 2 && $_SERVER["REQUEST_URI"][strlen($_SERVER["REQUEST_URI"]) - 1] == '/') && substr_count($_SERVER["REQUEST_URI"], '-') == 0) {
        $url .= $_SERVER["REQUEST_URI"][strlen($_SERVER["REQUEST_URI"]) - 1] == '/' ? 'index' : '/index';
    }
    return $url;
}

?>
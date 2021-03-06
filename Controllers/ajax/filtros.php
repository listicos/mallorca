<?php

$action = $_POST["action"];
$result = array("msg" => "error", "data" => "No tienes los permisos suficientes");



if(isset($_POST['dateStart']) && isset($_POST['dateEnd'])){
    
        if(isset($_POST['dateStart']) && strlen(trim($_POST['dateStart'])) && isset($_POST['dateEnd']) && strlen(trim($_POST['dateEnd']))) {
            $fechaInicio = $_POST['dateStart'];
            $fecha = explode("-", $fechaInicio);
            $fechaInicio = $fecha[2] . "-" . $fecha[1] . "-" . $fecha[0];
            $_SESSION['fechaInicio'] = $fechaInicio;
        
            $fechaFinal = $_POST['dateEnd'];
            $fecha = explode("-", $fechaFinal);
            $fechaFinal = $fecha[2] . "-" . $fecha[1] . "-" . $fecha[0];
            $_SESSION['fechaFinal'] = $fechaFinal;
        } else {
            $fechaFinal = null;
            unset($_SESSION['fechaFinal']);
            $fechaInicio = null;
            unset($_SESSION['fechaInicio']);
        }

        $huespedes = $_POST['huespedes'];

        if(isset($_POST['start']))
            $start = $_POST['start'];
        else
            $start = 0;
        
        $_SESSION['huespedes'] = $huespedes;
        
        if(isset($_POST['instalaciones']))
            $instalaciones = $_POST['instalaciones'];
        else $instalaciones = array();
        
        if(isset($_POST['tiposApartamento']))
            $tipos = $_POST['tiposApartamento'];
        else $tipos = array();
        
        if(isset($_POST['order']))
            $order = $_POST['order'];
        else $order = false;
        
        if(isset($_POST['alojamientos'])) 
            $alojamientos = $_POST['alojamientos'];
        else 
            $alojamientos = array();
        
        if(isset($_POST['bounds']) && is_array($_POST['bounds']) && count($_POST['bounds']) == 4) {
            $bounds = $_POST['bounds'];
        }
        else
            $bounds = array();

        $apartamentos = getApartamentosFilters($fechaInicio, $fechaFinal, $huespedes, $instalaciones, $tipos, $alojamientos, $start, 100, $order, $bounds);
        
        if(!is_null($fechaFinal) && !is_null($fechaInicio)){
            foreach ($apartamentos as $key => $a) {
                $apartamentos[$key]->total = getTotalPrice($a->idApartamento,  strtotime($fechaInicio), strtotime($fechaFinal), array(), $huespedes);    
            }
        }
        
        $smarty->assign('apartamentos', $apartamentos);
        $html = $smarty->fetch('lista_apartamentos.tpl');
        
        $smarty->assign('entrada', $_SESSION['fechaInicio']);
        $smarty->assign('salida', $_SESSION['fechaFinal']);
        $smarty->assign('huespedes', $_SESSION['huespedes']);
        
        $instalacionesFiltrosActualizados = getApartamentosInstalacionesFilters($fechaInicio, $fechaFinal, $huespedes, $instalaciones, $tipos, $alojamientos, $bounds);
        
        
        $filtrosTiposApto = getApartamentosTiposFilters($fechaInicio, $fechaFinal, $huespedes, $instalaciones, $tipos, $alojamientos, $bounds);
        /*
        $habitaciones = getTipoHabitaciones();
        foreach ($habitaciones as $habitacion) {
            $habitacion->apartamentos = count(getApartamentosFilters($fechaInicio, $fechaFinal, $huespedes, $instalaciones, $tipos, array($habitacion->idAlojamiento), 0, 0, false, $bounds, false));
        }*/

        $result['html'] = $html;
        $result['filtrosInstalaciones'] = $instalacionesFiltrosActualizados;
        $result['filtrosApartamentosTipos'] = $filtrosTiposApto;
        //$result['filtrosApartamentosTiposHabitacion'] = $habitaciones;
        $result['msg'] = 'ok';
        $result['data'] = 'Correcto';
} else {
    $result['msg'] = 'error';
    $result['data'] = 'No hay suficientes datos.';
}
    
echo json_encode($result);
?>

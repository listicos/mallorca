<?php

$action = $_POST["action"];
$result = array("msg" => "error", "data" => "No tienes los permisos suficientes");



if(isset($_POST['dateStart']) && isset($_POST['dateEnd'])){
        if(isset($_POST['dateStart']) && strlen(trim($_POST['dateStart']))) {
            $fechaInicio = $_POST['dateStart'];
            $fecha = explode("-", $fechaInicio);
            $fechaInicio = $fecha[2] . "-" . $fecha[1] . "-" . $fecha[0];
            $_SESSION['fechaInicio'] = $fechaInicio;
        } else {
            $fechaInicio = null;
            unset($_SESSION['fechaInicio']);
        }
        
        if(isset($_POST['dateEnd']) && strlen(trim($_POST['dateEnd']))) {
            $fechaFinal = $_POST['dateEnd'];
            $fecha = explode("-", $fechaFinal);
            $fechaFinal = $fecha[2] . "-" . $fecha[1] . "-" . $fecha[0];
            $_SESSION['fechaFinal'] = $fechaFinal;
        } else {
            $fechaFinal = null;
            unset($_SESSION['fechaFinal']);
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

        $apartamentos = getApartamentosFilters($fechaInicio, $fechaFinal, $huespedes, $instalaciones, $tipos, $alojamientos, $start, 10, $order);
        foreach ($apartamentos as $apto) {
            $apto->tipo = getTipoApartamento($apto->idApartamentosTipo)->nombre;
            if($apto->precioPorNoche) {
                $apto->precio_base_format = '€'.money_format('%i', $apto->precioPorNoche) ;
            } else {
                $apto->precio_base_format = 'No disponible';
            }

            $opiniones = getOpinionesByApartamento($apartamento->idApartamento);
            $apto->opiniones = count($opiniones);
            
            $apto_disponibilidades = getDisponibilidadByApartamento($apto->idApartamento);
            $ds = array();
            foreach ($apto_disponibilidades as $dis) {
                array_push($ds, date('Y-n-j', strtotime($dis->fechaInicio)));
            }

            $apto->disponibilidades = json_encode($ds);
        }
        
        $smarty->assign('apartamentos', $apartamentos);
        $html = $smarty->fetch('lista_apartamentos.tpl');

        $result['html'] = $html;
        $result['msg'] = 'ok';
        $result['data'] = 'Correcto';
} else {
    $result['msg'] = 'error';
    $result['data'] = 'No hay suficientes datos.';
}
    
echo json_encode($result);
?>

<?php

$action = $_POST["action"];
$result = array("msg" => "error", "data" => "No tienes los permisos suficientes");

if (strcmp($action, "buscar") == 0) {

    if(isset($_POST['dateStart']) && isset($_POST['dateEnd'])){
            
            $fechaInicio = $_POST['dateStart'];            
            $fechaFinal = $_POST['dateEnd'];
            
            $fecha = explode("-", $fechaInicio);
            $fechaInicio = $fecha[2] . "-" . $fecha[1] . "-" . $fecha[0];
            
            $fecha = explode("-", $fechaFinal);
            $fechaFinal = $fecha[2] . "-" . $fecha[1] . "-" . $fecha[0];
            
            $huespedes = $_POST['huespedes'];
            
            $_SESSION['fechaInicio'] = $fechaInicio;
            $_SESSION['fechaFinal'] = $fechaFinal;
            $_SESSION['huespedes'] = $huespedes;
            
            $apartamentos = getApartamentosFilters($fechaInicio, $fechaFinal, $huespedes);
            foreach ($apartamentos as $apto) {
                if($apto->precioPorNoche) {
                    $apto->precio_base_format = '€'.money_format('%i', $apto->precioPorNoche) ;
                } else {
                    $apto->precio_base_format = 'No disponible';
                }
                
                $opiniones = getOpinionesByApartamento($apartamento->idApartamento);
                $apto->opiniones = count($opiniones);
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
    } else {
        $result['msg'] = 'error';
        $result['data'] = 'No hay suficientes datos';
    }
echo json_encode($result);
?>

<?php
$action = $_POST["action"];
$result = array("msg" => "error", "data" => "No tienes los permisos suficientes");

if (strcmp($action, "getPrecio") == 0) {

    if(isset($_POST['idApartamento']) && isset($_POST['fechaInicio']) && strtotime($_POST['fechaInicio']) && isset($_POST['fechaFinal']) && strtotime($_POST['fechaFinal'])){
            $idApartamento = $_POST['idApartamento'];
            
            $fechaInicio = $_POST['fechaInicio'];            
            $fechaFinal = $_POST['fechaFinal'];
            
            $f = explode("-", $fechaInicio);
            $fechaInicio = $f[2] .'-'. $f[1] .'-'. $f[0];
            
            $f = explode("-", $fechaFinal);
            $fechaFinal = $f[2] .'-'. $f[1] .'-'. $f[0];
            
            
            $_SESSION['fechaInicio'] = $fechaInicio;
            $_SESSION['fechaFinal'] = $fechaFinal;
            $_SESSION['huespedes'] = $_POST['huespedes'];

            $total = getTotalPrice($idApartamento,strtotime($fechaInicio),strtotime($fechaFinal), array(), $_POST['huespedes']);
            
            if($total){
                $result['total'] = $total;
                $result['total_text'] = '€'.money_format('%i', $total);
            }else{
                $result['total'] = 0;
                $result['total_text'] = 'No disponible';
            }

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
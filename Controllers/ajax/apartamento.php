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
            $result['disponible'] = !noDisponible($idApartamento, $fechaInicio, $fechaFinal);
        } else{
            $result['total'] = 0;
            $result['total_text'] = 'No disponible';
        }

        $result['msg'] = 'ok';
        $result['data'] = 'Correcto';
    } else {
        $result['msg'] = 'error';
        $result['data'] = 'No hay suficientes datos.';
    }
} 

if (strcmp($action, "reservar") == 0) {
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
        
        $result['msg'] = 'ok';
    } else {
        $result['msg'] = 'error';
        $result['data'] = 'No hay suficientes datos.';
    }
}

if(strcmp($action, 'informacionMapa') == 0) {
    $id = $_POST['id'];
    $apartamento = getApartamento($id);
    $adjuntosA = getApartamentosAdjuntos($id);
    if($adjuntosA && count($adjuntosA)) {
        $adjuntos = array();
        foreach ($adjuntosA as $a) {
            $adjuntos[] = getAdjunto($a->idAdjunto);
        }
        $apartamento->adjuntos = $adjuntos;
    }
    $apartamento->direccion = getDireccion($apartamento->idDireccion);
    $smarty->assign('apartamento', $apartamento);
    $html = $smarty->fetch('informacionMapa.tpl');
    $result['msg'] = 'ok';
    $result['html'] = $html;
}

echo json_encode($result);
?>
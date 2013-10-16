<?php

include_once 'Logic/mantenimiento.php';

$usuario_core->validateUser();

$result = array('msg'=>'error', 'data'=>'');
$action = $_POST['action'];

if(strcmp($action, "updateMantenimiento") == 0) {
    
    $data = array(
        'idApartamento' => null,
        'solicitante' => null,
        'ubicacion' => null,
        'trabajosSolicitados' => null,
        'informeTecnico' => null,
        'observaciones' => null,
        'fechaCierre' => null
    );
    
    $keys = array_keys($data);
    
    foreach ($keys as $key) {
        if(isset($_POST[$key]))
            $data[$key] = $_POST[$key];
    }
    
    if($data['fechaCierre']) {
        $fecha = explode("/", $data['fechaCierre']);
        if(count($fecha) == 3) {
            $data['fechaCierre'] = $fecha[2] . "-" . $fecha[1] . "-" . $fecha[0];
        }
    }
    
    if(isset($_POST['mantenimientoId']))
        $idMantenimiento = $_POST['mantenimientoId'];
    
        
    $data_materiales = array();
    
    if(isset($_POST['materialId'])) {
        $materialesIds = $_POST['materialId'];
        $materialesDescripcion = $_POST['materialDescripcion'];
        $materialesCant = $_POST['materialCantidad'];
        foreach ($materialesIds as $matId) {
            
            if(isset($materialesDescripcion[$matId]) && isset($materialesCant[$matId])) {
                array_push($data_materiales, array(
                    'descripcion'=>$materialesDescripcion[$matId],
                    'cantidad' => $materialesCant[$matId]
                ));
            }
        }
    }
    
    $data_personal = array();
    
    if(isset($_POST['personalId'])) {
        $personalIds = $_POST['personalId'];
        $personalNombres = $_POST['personalNombre'];
        $personalFechas = $_POST['personalFecha'];
        $personalInicio = $_POST['horaInicio'];
        $personalFinal = $_POST['horaFinal'];
        $personalHoras = $_POST['personalHoras'];
        foreach ($personalIds as $p) {
            
            if(isset($personalNombres[$p]) && isset($personalFechas[$p]) &&
               isset($personalNombres[$p]) && isset($personalFechas[$p]) &&
               isset($personalHoras[$p])) {
                $fecha = explode("/", $personalFechas[$p]);
                $personalFechas[$p] = $fecha[2] . "-" . $fecha[1] . "-" . $fecha[0];
                array_push($data_personal, array(
                    'nombre' => $personalNombres[$p],
                    'fecha' => $personalFechas[$p],
                    'inicio' => $personalInicio[$p],
                    'final' => $personalFinal[$p],
                    'horas' => $personalHoras[$p]
                ));
            }
        }
    }
        
    if(isset($idMantenimiento)) {
        $idMantenimiento = updateMantenimiento($idMantenimiento, $data, $data_materiales, $data_personal);
    } else {
        $idMantenimiento = insertMantenimiento($data, $data_materiales, $data_personal);
    }
    
    if($idMantenimiento) {
        $result['msg'] = 'ok';
        $result['data'] = 'Se guardaron los cambios correctamente';
    } else 
        $result['data'] = 'No se guardaron los cambios';
    
}

echo json_encode($result);

?>

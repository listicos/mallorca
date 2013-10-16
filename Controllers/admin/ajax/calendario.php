<?php

$usuario_core->validateUser();
$action = $_POST["action"];
$result = array("msg" => "error", "data" => "Tu no tienes suficnetes permisos.");


if (strcmp($action, "agregar_tarifa") == 0) {
    $data_disponibilidad = array();
    if (isset($_POST['fechaInicio']) && isset($_POST['fechaFinal'])) {

        $fechaOriginalI = $_POST['fechaInicio'];
        $fechaOriginalF = $_POST['fechaFinal'];

        $fechaCortaI = date('Y-m-d', strtotime($fechaOriginalI));
        $fechaCortaF = date('Y-m-d', strtotime($fechaOriginalF));

        $fecha_i = strtotime($fechaOriginalI);
        $fecha_f = strtotime($fechaOriginalF);

        //$data_disponibilidad['fechaInicio'] = date('Y-m-d H:i:s', strtotime($_POST['fechaInicio']));
        //$data_disponibilidad['fechaFinal'] = date('Y-m-d H:i:s', strtotime($_POST['fechaFinal']));
        
        if(isset($_POST['estatus'])) $data_disponibilidad['estatus'] = $_POST['estatus'];
        
        $data_disponibilidad['idApartamento'] = $_POST['idApartamento'];
        
        if(isset($_POST['precio']) && $_POST['precio']!="")
            $data_disponibilidad['precio'] = $_POST['precio'];

        if(isset($_POST['precioContrato']))
            $data_disponibilidad['precioContrato'] = $_POST['precioContrato'];

        $data_disponibilidad['precioFinSemana'] = '0';
        $data_disponibilidad['anotacion'] = 'Tarifa';

        $disponibilidades = getDisponibilidadByApartamento($_POST['idApartamento']);

        for ($newFecha = $fecha_i; $newFecha <= $fecha_f; $newFecha+=86400) {
            $fecha_to_comp = date("Y-m-d", $newFecha);
            $time_temp = strtotime($fecha_to_comp);
            $is_set_date = false;
            foreach ($disponibilidades as $dkey => $dispo) {
                $fecha_disp = date("Y-m-d", strtotime($dispo->fechaInicio));
                $time_disp_temp = strtotime($fecha_disp);
                if ($time_temp == $time_disp_temp) {
                    //if($data_disponibilidad['estatus'] == 'disponible')
                        updateDisponibilidad($dispo->idDisponibilidad, $data_disponibilidad);
                   // else
                     //   updateDisponibilidad($dispo->idDisponibilidad, array('estatus' => $data_disponibilidad['estatus']));
                    
                    $is_set_date = true;
                }
            }
            if ($is_set_date == false) {
                $data_disponibilidad['fechaInicio'] = date("Y-m-d H:i:s", $newFecha);
                $data_disponibilidad['fechaFinal'] = date("Y-m-d H:i:s", $newFecha);
                insertDisponibilidad($data_disponibilidad);
            }else{
                $is_set_date = false;
            }
        }
        
        $result = array("msg" => "ok", "data" => "Tarifa agregada correctamente.");

    } else {
        $result = array("msg" => "error", "data" => "Datos incompletos.");
    }
}
if (strcmp($action, "agregar_tarifas") == 0) {
    $data_disponibilidad = array();
    if (isset($_POST['fechaInicio']) && isset($_POST['fechaFinal']) && isset($_POST['estatus'])) {

        $fechaOriginalI = $_POST['fechaInicio'];
        $fechaOriginalF = $_POST['fechaFinal'];

        $fechaCortaI = date('Y-m-d', strtotime($fechaOriginalI));
        $fechaCortaF = date('Y-m-d', strtotime($fechaOriginalF));

        $fecha_i = strtotime($fechaOriginalI);
        $fecha_f = strtotime($fechaOriginalF);
        $data_disponibilidad['estatus'] = $_POST['estatus'];
        if(isset($_POST['precio']))
            $data_disponibilidad['precio'] = $_POST['precio'];
        else 
            $data_disponibilidad['precio'] = 0;

        $data_disponibilidad['precioFinSemana'] = '0';
        $data_disponibilidad['anotacion'] = 'Tarifa';

        if(isset($_POST['idApartamentos'])){
            foreach ($_POST['idApartamentos'] as $idApartamento){
            $data_disponibilidad['idApartamento'] = $idApartamento;
            $disponibilidades = getDisponibilidadByApartamento($idApartamento);

            for ($newFecha = $fecha_i; $newFecha <= $fecha_f; $newFecha+=86400) {
                $fecha_to_comp = date("Y-m-d", $newFecha);
                $time_temp = strtotime($fecha_to_comp);
                $is_set_date = false;
                foreach ($disponibilidades as $dkey => $dispo) {
                    $fecha_disp = date("Y-m-d", strtotime($dispo->fechaInicio));
                    $time_disp_temp = strtotime($fecha_disp);
                    if ($time_temp == $time_disp_temp) {
                        updateDisponibilidad($dispo->idDisponibilidad, array('estatus' => $data_disponibilidad['estatus'], 'precio' => $data_disponibilidad['precio']));
                        $is_set_date = true;
                    }
                }
                if ($is_set_date == false) {
                    $data_disponibilidad['fechaInicio'] = date("Y-m-d H:i:s", $newFecha);
                    $data_disponibilidad['fechaFinal'] = date("Y-m-d H:i:s", $newFecha);
                    insertDisponibilidad($data_disponibilidad);
                }else{
                    $is_set_date = false;
                }
            }
        }
              $result = array("msg" => "ok", "data" => "Tarifa agregada correctamente.");
        }else{
            $result = array("msg" => "error", "data" => "Seleccione un apartamento y después una tarifa.");
        }
        
      

    } else {
        $result = array("msg" => "error", "data" => "Datos incompletos.");
    }
}


if (strcmp($action, "getTarifas") == 0) {
    if (isset($_POST['idApartamento'])) {
        $tarifas = getDisponibilidadByApartamento($_POST['idApartamento']);
        $result = array("msg" => "ok", "data" => "Tarifas obtenidas", "tarifas" => $tarifas);
    } else {
        $result = array("msg" => "error", "data" => "idApartamento es necesario.");
    }
}

echo json_encode($result);
?>
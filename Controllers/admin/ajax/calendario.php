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
        
        if(isset($_POST['precioContrato'])) {
            
            $data_disponibilidad['precioContrato'] = $_POST['precioContrato'];
            
            $data_disponibilidad['idApartamento'] = $_POST['idApartamento'];

            if($_POST['idApartamento'] == "" && isset($_POST['idApartamentos'])) {
                if(is_string($_POST['idApartamentos'])) {
                    $data_disponibilidad['idApartamento'] = $_POST['idApartamentos'];
                }
            }
            $idApartamento = $data_disponibilidad['idApartamento'];
            
            if(isset($_POST['precioContrato']))
                $data_disponibilidad['precioContrato'] = $_POST['precioContrato'];
            
            $apartamento = getApartamento($idApartamento);
            
            $contratoEmpresa = getEmpresaContrato($apartamento->idEmpresaContrato);
            
            for($i = $fecha_i; $i <= $fecha_f; $i += 86400) {
                $fechaContrato = getFechasContratosByApartamentoAndFecha($idApartamento, date("Y-m-d", $i));
                
                if($fechaContrato && count($fechaContrato) > 0) {
                     
                    $data = array(
                        'fechaInicio' => date("Y-m-d", $i),
                        'fechaFinal' => date("Y-m-d", $i),
                        'precio' => $data_disponibilidad['precioContrato']
                    );
                    updateFechasContratos($fechaContrato[0]->idDisponibilidad, $data);
                    if(count($fechaContrato) > 0)
                        for($j=2;$j < count($fechaContrato); $j++)
                            deleteFechasContratos($fechaContrato[$j]->idDisponibilidad);
                    
                } else {
                    $data = array(
                        'idApartamento' => $idApartamento,
                        'fechaInicio' => date("Y-m-d", $i),
                        'fechaFinal' => date("Y-m-d", $i),
                        'precio' => $data_disponibilidad['precioContrato'],
                        'idContrato' => $contratoEmpresa->idContrato
                    );
                    insertFechasContratos($data);
                }
            }
            
        } else {
        
            if(isset($_POST['estatus'])) $data_disponibilidad['estatus'] = $_POST['estatus'];

            if(isset($_POST['minimoNoches']))
                $data_disponibilidad['minimoNoches'] = $_POST['minimoNoches'];

            if(isset($_POST['precioPorConsumo']))
                $data_disponibilidad['precioPorConsumo'] = $_POST['precioPorConsumo'];

            if(isset($_POST['descuentoPorConsumo']))
                $data_disponibilidad['descuentoPorConsumo'] = $_POST['descuentoPorConsumo'];

            if(isset($_POST['cuponPromocional']))
                $data_disponibilidad['cuponPromocional'] = $_POST['cuponPromocional'];

            if(isset($_POST['descuentoPorCupon']))
                $data_disponibilidad['descuentoPorCupon'] = $_POST['descuentoPorCupon'];

            $data_disponibilidad['idApartamento'] = $_POST['idApartamento'];

            if($_POST['idApartamento'] == "" && isset($_POST['idApartamentos'])) {
                if(is_string($_POST['idApartamentos'])) {
                    $data_disponibilidad['idApartamento'] = $_POST['idApartamentos'];
                }
            }

            if(isset($_POST['precio']) && $_POST['precio']!="")
                $data_disponibilidad['precio'] = $_POST['precio'];

            

            if(isset($_POST['descuento']) && strlen(trim($_POST['descuento'])))
                $data_disponibilidad['descuento'] = $_POST['descuento'];
            else
                $data_disponibilidad['descuento'] = 0;

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
        
        if(isset($_POST['descuento']))
            $data_disponibilidad['descuento'] = $_POST['descuento'];
        
        if(isset($_POST['minimoNoches']))
            $data_disponibilidad['minimoNoches'] = $_POST['minimoNoches'];
        
        if(isset($_POST['precioPorConsumo']))
            $data_disponibilidad['precioPorConsumo'] = $_POST['precioPorConsumo'];
        
        if(isset($_POST['descuentoPorConsumo']))
            $data_disponibilidad['descuentoPorConsumo'] = $_POST['descuentoPorConsumo'];
        
        if(isset($_POST['cuponPromocional']))
            $data_disponibilidad['cuponPromocional'] = $_POST['cuponPromocional'];
        
        if(isset($_POST['descuentoPorCupon']))
            $data_disponibilidad['descuentoPorCupon'] = $_POST['descuentoPorCupon'];

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
                        updateDisponibilidad($dispo->idDisponibilidad, array(
                            'estatus' => $data_disponibilidad['estatus'], 
                            'precio' => $data_disponibilidad['precio'], 
                            'descuento' => $data_disponibilidad['descuento'],
                            
                            'minimoNoches' => $data_disponibilidad['minimoNoches'],
                            'precioPorConsumo' => $data_disponibilidad['precioPorConsumo'],
                            'descuentoPorConsumo' => $data_disponibilidad['descuentoPorConsumo'],
                            'cuponPromocional' => $data_disponibilidad['cuponPromocional'],
                            'descuentoPorCupon' => $data_disponibilidad['descuentoPorCupon']
                            )
                        );
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
        }
        else if (isset($_POST['idApartamento']) && strlen(trim($_POST['idApartamento'])) > 0) {
            $data_disponibilidad['idApartamento'] = $_POST['idApartamento'];
            $disponibilidades = getDisponibilidadByApartamento($idApartamento);

            for ($newFecha = $fecha_i; $newFecha <= $fecha_f; $newFecha+=86400) {
                $fecha_to_comp = date("Y-m-d", $newFecha);
                $time_temp = strtotime($fecha_to_comp);
                $is_set_date = false;
                foreach ($disponibilidades as $dkey => $dispo) {
                    $fecha_disp = date("Y-m-d", strtotime($dispo->fechaInicio));
                    $time_disp_temp = strtotime($fecha_disp);
                    if ($time_temp == $time_disp_temp) {
                        updateDisponibilidad($dispo->idDisponibilidad, array('estatus' => $data_disponibilidad['estatus'], 'precio' => $data_disponibilidad['precio'], 'descuento' => $data_disponibilidad['descuento']));
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
        }
        else{
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

if (strcmp($action, "generarCodigo") == 0) {
    $codigo = substr(md5(microtime()), 0, 10);
    
    $result['codigo'] = $codigo;
}

echo json_encode($result);
?>
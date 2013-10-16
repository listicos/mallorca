<?php

$usuario_core->validateUser();
$action = $_POST["action"];
$result = array("msg" => "error", "data" => "Tu no tienes suficientes permisos.");

if (strcmp($action, "searchByArgs") == 0) {
    if (isset($_POST['query'])) {
        $number_days = cal_days_in_month(CAL_GREGORIAN, $_POST['month'], $_POST['year']);
        $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
    
        $current_month = $meses[$_POST['month']-1];
        $current_date = $current_month.' del '.$_POST['year'];

        $limit = 20;
        if (isset($_POST['limit']))
            $limit = $_POST['limit'];

        $data = array('query' => $_POST['query'], 'type' => $_POST['type'], 'filter' => $_POST['filter'], 'limit' => $limit, 'page' => 0);
        if(isset($_POST['empresaId']))
            $data['empresaId'] = $_POST['empresaId'];
        $apartamentos = searchApartamentos($data);

        if ($apartamentos && count($apartamentos) > 0) {
            
            $apartamentos_array = array();
            foreach ($apartamentos as $key => $ap) {
                $apartamentos_array[$key]['apartamento'] = $ap;
                $apartamentos_array[$key]['direccion'] = getDireccion($ap->idDireccion);
                $empresaContrato = getEmpresaContrato($ap->idEmpresaContrato);
                $empresa = getEmpresa($empresaContrato->idEmpresa);
                $apartamentos_array[$key]['empresa'] = $empresa;

                $disponibilidades = getDisponibilidadByApartamento($ap->idApartamento);
                $disponibilidad_to_rend = array();
                
                 for ($i = 1;$i<=$number_days;$i++) {
                    $time = strtotime($i.'-'.$_POST['month'].'-'.$_POST['year']);
                    $estatus_render = 'sin_registro';
                    $precio = 'S/T';
                    foreach ($disponibilidades as $disponi) {
                        $unix_date = strtotime($disponi->fechaInicio);
                        $estatus = $disponi->estatus;
                        if($time==$unix_date){
                            if($estatus == 'no disponible')
                                $estatus = 'no_disponible';
                            $precio = money_format('€%i', $disponi->precio);
                            $estatus_render = $estatus;
                        }
                    }

                    $disponibilidad_to_rend[$i]['estatus']= $estatus_render;
                    $disponibilidad_to_rend[$i]['precio']= $precio;
                    
                }
                $apartamentos_array[$key]['disponibilidades'] = $disponibilidad_to_rend;
            }

            $template = new Core_template('admin/apartamento/calendario.php');
            
            $template->setAttribute('number_days', $number_days);
            $template->setAttribute('apartamentos', $apartamentos_array);
            $template->setAttribute('current_date', $current_date);
            $result = array("msg" => "ok", "data" => "Apartamentos encontradas.", 'html' => $template->getContent());
        } else {
            $result = array("msg" => "ok", "data" => "No se encontraron apartamentos.", 'html' => '<p class="no_results_found">No se encontraron apartamentos</p>');
        }
    } else {
        $result = array("msg" => "error", "data" => "No has selecionado tu orden.");
    }
}else if (strcmp($action, "getPrecio") == 0) {
    if(isset($_POST['idApartamento']) && is_numeric($_POST['idApartamento'])){
        if(isset($_POST['fechaInicio']) && strtotime($_POST['fechaInicio']) && isset($_POST['fechaFinal']) && strtotime($_POST['fechaFinal'])){
                $idApartamento = $_POST['idApartamento'];
                
                $fechaInicio = $_POST['fechaInicio'];            
                $fechaFinal = $_POST['fechaFinal'];
                
                $_SESSION['fechaInicio'] = $fechaInicio;
                $_SESSION['fechaFinal'] = $fechaFinal;
                $_SESSION['huespedes'] = $_POST['huespedes'];

                $total = getTotalPrice($idApartamento,strtotime($fechaInicio),strtotime($fechaFinal));
                
                if($total){
                    $result['total'] = $total;
                    $result['total_text'] = '<small>Subtotal:</small> €'.money_format('%i', $total);
                }else{
                    $result['total'] = 0;
                    $result['total_text'] = 'No disponible';
                }
                $result['msg'] = 'ok';
                $result['data'] = 'Correcto';
            } else {
                $result['msg'] = 'ok';
                $result['data'] = 'No hay suficientes datos.';
            }
        }else{
            $result['msg'] = 'error';
            $result['data'] = 'No ha seleccionado un apartamento.';
        }
    }

echo json_encode($result);
?>

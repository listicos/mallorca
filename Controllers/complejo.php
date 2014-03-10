<?php

if(isset($_GET['id'])) {
    $idComplejo = $_GET['id'];
    $complejo = fullComplejoById($idComplejo);
    
    $complejo_data = array();

    if($complejo){
            foreach ($complejo as $a_k => $a) {
                    $complejo_data['id_complejo'] = $a['id_complejo'];
                    $complejo_data['nombre'] = $a['complejo'];
                    $complejo_data['descripcion'] = $a['descripcion'];
                    
                    if($a['descripcion'] && strlen($a['descripcion']) > 2
                            && $a['descripcion'][0] == '{'
                            && $a['descripcion'][strlen($a['descripcion']) - 1] == '}') {
                        $descripcion = json_decode($a['descripcion']);
                        $complejo_data['descripciones'] = get_object_vars($descripcion);
                    } else {
                        $complejo_data['descripciones'] = array('es' => $a['descripcion']);
                    }
                    
                    $complejo_data['lat'] = $a['lat'];
                    $complejo_data['lon'] = $a['lon'];
                    $complejo_data['direccion'] = $a['direccion'];
                    $complejo_data['adjuntos'][$a['complejo_ruta']] = $a['complejo_ruta'];
                    $complejo_data['apartamentos'][$a['id_apartamento']]['id_apartamento'] = $a['id_apartamento'];
                    $complejo_data['apartamentos'][$a['id_apartamento']]['nombre'] = $a['a_nombre'];
                    $complejo_data['apartamentos'][$a['id_apartamento']]['descripcion'] = json_decode($a['a_descripcion']);
                    $complejo_data['apartamentos'][$a['id_apartamento']]['adjunto'] = $a['ruta'];
                    $complejo_data['apartamentos'][$a['id_apartamento']]['capacidad'] = $a['capacidad_personas'];
                    if(!isset($complejo_data['apartamentos'][$a['id_apartamento']]['precio_minimo'])) {
                        $rangoPrecios = getRangoPreciosByApartamento($a['id_apartamento'], date('Y-m-d'), 0);
                        
                        $complejo_data['apartamentos'][$a['id_apartamento']]['precio_minimo'] = $rangoPrecios[0];
                        $complejo_data['apartamentos'][$a['id_apartamento']]['precio_maximo'] = $rangoPrecios[1];
                    }
            }
    }
    
    
    
    $smarty->assign('complejo', $complejo_data);
    
}

$smarty->display('complejoFull.tpl');
?>

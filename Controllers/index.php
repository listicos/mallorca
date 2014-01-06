<?php

$apartamentos_array = array();

$user_vars = Core_Util_Click::getUsersVars();
foreach ($user_vars as $u_k => $u_v) {
    $smarty->assign($u_k, $u_v);
}
$minPrice = 999999999;
$maxPrice = -999999999;
$categorias = getAllInstalacionesCategoria();

$instalacionesFiltrosActualizados = getApartamentosInstalacionesFilters(0,0);
foreach ($categorias as $categoria) {
    $categoria->instalaciones = array();
    
    foreach ($instalacionesFiltrosActualizados as $instalacion) {
        if($instalacion->idInstalacionCategoria == $categoria->idInstalacionCategoria)
            array_push($categoria->instalaciones, $instalacion);
    }
}

$smarty->assign('categorias', $categorias);

/*Esto ya tiene tiempo que no se usa...
$habitaciones = getTipoHabitaciones();

foreach ($habitaciones as $habitacion) {
    $habitacion->apartamentos = count(getApartamentosFilters(0, 0, 1, array(), array(), array($habitacion->idAlojamiento), 0, 0));
}*/

$huespedes = isset($_SESSION['huespedes'])?$_SESSION['huespedes']:1;
$fechaInicio = isset($_SESSION['fechaInicio'])?$_SESSION['fechaInicio']:0;
$fechaFinal = isset($_SESSION['fechaFinal'])?$_SESSION['fechaFinal']:0;

$apartamentos = $apartamentos = getApartamentosFilters($fechaInicio, $fechaFinal, $huespedes);

$tipos_apartamento = getApartamentosTiposFilters($fechaInicio, $fechaFinal, $huespedes, array(), array(), array(), array());


$smarty->assign('tiposApartamento', $tipos_apartamento);

if($apartamentos){
    foreach ($apartamentos as $akey => $apartamento) {
        

        //Igual esto de los adjuntos se puede evitar mas consultas a la bd
        $apartamentos_array[$akey]['apartamento'] = $apartamento;
        $apartamentosAdjuntos = getAdjuntosByApartamentoId($apartamento->idApartamento);

        $apartamentos_array[$akey]['adjuntos'] = $apartamentosAdjuntos;
        

        if ($apartamento->idDireccion)
            $apartamento->direccion = getDireccion($apartamento->idDireccion);
        /*Esto es temporal, lo puse por que creo que es la forma correcta de proceder sin embargo falta pulirlo con otros calculos como lo del descuento, etc.*/
        /*$disponibilidad = getDisponibilidadByApartamentoMinMaxPrecio($apartamento->idApartamento, date('Y-m-d'), 0);
        
        if($disponibilidad){
            $apartamento->precioMinimo = $disponibilidad['precioMinimo'];
            $apartamento->precioMaximo = $disponibilidad['precioMaximo'];
        }*/

        $rangoPrecios = getRangoPreciosByApartamento($apartamento->idApartamento, date('Y-m-d'), 0);

        if($rangoPrecios) {
            $apartamento->precioMinimo = $rangoPrecios[0];
            $apartamento->precioMaximo = $rangoPrecios[1];
        }

        if(strtotime($fechaInicio) && strtotime($fechaFinal)){
            $apartamento->total = getTotalPrice($apartamento->idApartamento,  strtotime($fechaInicio), strtotime($fechaFinal), array(), $huespedes);
        }

        /*
        Esto se hacía 2 veces
        if($apartamento->idComplejo){
            $complejo = getComplejo($apartamento->idComplejo);
            $apartamentos_array[$akey]['complejo'] = $complejo;
        }*/
        /*
        $comments = getOpinionesByApartamento($apartamento->idApartamento);
        $apartamentos_array[$akey]['opiniones'] = $comments;

        $apto_disponibilidades = getDisponibilidadByApartamento($apartamento->idApartamento);
        $ds = array();
        foreach ($apto_disponibilidades as $dis) {
            array_push($ds, date('Y-n-j', strtotime($dis->fechaInicio)));
        }

        $apartamentos_array[$akey]['disponibilidades'] = json_encode($ds);
        */
        /*$instalaciones_array = array();
        $instalaciones_list = getApartamentoInstalacionesByAparatamento($apartamento->idApartamento);
        foreach ($instalaciones_list as $ckey => $instalacio) {
            $instalaciones_array[$ckey] = getInstalacion($instalacio->idInstalacion);
        }
        $apartamentos_array[$akey]['instalaciones'] = $instalaciones_array;*/
    }
}
$dia_comienzo = date("d-m-Y", mktime(0, 0, 0, date("m"), date("d") + 1, date("y")));
/*
$disponibilidades = getCalendario();
$disponibles = array();
if ($disponibilidades) {
    foreach ($disponibilidades as $d) {
        $disponibles[] = date('Y-n-j', strtotime($d->fechaInicio));
    }
}*/
$trash_text = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut a nisi et purus elementum fermentum a id quam. Curabitur iaculis lacinia massa, a semper arcu sollicitudin et.';
$smarty->assign('trash_text', $trash_text);

//$smarty->assign('disponibles',json_encode($disponibles));
$smarty->assign('apartamentos', $apartamentos_array);
$smarty->assign('dia_comienzo', $dia_comienzo);

$smarty->assign('fechaInicio',strtotime($fechaInicio));
$smarty->assign('fechaFinal', strtotime($fechaFinal));
$smarty->assign('huespedes',$huespedes);

$smarty->assign('minPrice', $minPrice);
$smarty->assign('maxPrice', $maxPrice);
$smarty->display('home.tpl');
?>
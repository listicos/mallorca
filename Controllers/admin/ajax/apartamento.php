<?php

$usuario_core->validateUser();
$action = $_POST["action"];
$result = array("msg" => "error", "data" => "You do not have sufficient permissions.");

if (strcmp($action, "insert") == 0) {

    $data_direc = array();
    $data_apartamento = array();

    if (isset($_POST['calle']))
        $data_direc['calle'] = $_POST['calle'];
    if (isset($_POST['numero']))
        $data_direc['numero'] = $_POST['numero'];
    if (isset($_POST['provincia']))
        $data_direc['provincia'] = $_POST['provincia'];
    if (isset($_POST['codigoPostal']))
        $data_direc['codigoPostal'] = $_POST['codigoPostal'];
    if (isset($_POST['idPais']))
        $data_direc['idPais'] = $_POST['idPais'];
    if (isset($_POST['lat']))
        $data_direc['lat'] = $_POST['lat'];
    if (isset($_POST['lon']))
        $data_direc['lon'] = $_POST['lon'];
    if (isset($_POST['referencia']))
        $data_direc['referencia'] = $_POST['referencia'];

    $data_direc['idProvincia'] = '1';

    $new_direccion_id = insertDireccion($data_direc);

    if ($new_direccion_id) {
        $data_apartamento['idDireccion'] = $new_direccion_id;
        
        $data_apartamento['idUsuario'] = '1';

        if (isset($_POST['nombre']))
            $data_apartamento['nombre'] = $_POST['nombre'];
        if(isset($_POST['idComplejo']) && strlen($_POST['idComplejo']))
            $data_apartamento['idComplejo'] = $_POST['idComplejo'];
        if($data_apartamento['idComplejo'] == '0')
            $data_apartamento['idComplejo'] = NULL;
        if (isset($_POST['idApartamentosTipo']))
            $data_apartamento['idApartamentosTipo'] = $_POST['idApartamentosTipo'];
        if (isset($_POST['capacidadPersonas']))
            $data_apartamento['capacidadPersonas'] = $_POST['capacidadPersonas'];
        if (isset($_POST['habitaciones']))
            $data_apartamento['habitaciones'] = $_POST['habitaciones'];
        if (isset($_POST['camas']))
            $data_apartamento['camas'] = $_POST['camas'];
        if (isset($_POST['tipoCama']))
            $data_apartamento['tipoCama'] = $_POST['tipoCama'];
        if (isset($_POST['banio']))
            $data_apartamento['banio'] = $_POST['banio'];
        if (isset($_POST['tamanio']))
            $data_apartamento['tamanio'] = $_POST['tamanio'];
        if (isset($_POST['normas']))
            $data_apartamento['normas'] = $_POST['normas'];
        if (isset($_POST['mascotas']))
            $data_apartamento['mascotas'] = $_POST['mascotas'];
        if (isset($_POST['claveWifi']))
            $data_apartamento['claveWifi'] = $_POST['claveWifi'];
        if(isset($_POST['idComplejo']) && strcmp(trim($_POST['idComplejo']), "0") != 0)
            $data_apartamento['idComplejo'] = $_POST['idComplejo'];
        else
            $data_apartamento['idComplejo'] = NULL;
        /* if (isset($_POST['horarioEntrada']))
          $data_apartamento['horarioEntrada'] = date('H:i:s', strtotime('12:00'));
          if (isset($_POST['horarioSalida']))
          $data_apartamento['horarioSalida'] = date('H:i:s', strtotime('12:00')); */
        /* if (isset($_POST['descripcionCorta']))
          $data_apartamento['descripcionCorta'] = $_POST['descripcionCorta']; */
        if (isset($_POST['descripcionLarga']))
            $data_apartamento['descripcionLarga'] = $_POST['descripcionLarga'];
        if (isset($_POST['idIdioma']))
            $data_apartamento['idIdioma'] = $_POST['idIdioma'];
        else
            $data_apartamento['idIdioma'] = '1';
        /* if (isset($_POST['descripcionServicios']))
          $data_apartamento['descripcionServicios'] = $_POST['descripcionServicios'];
          if (isset($_POST['descripcionCondiciones']))
          $data_apartamento['descripcionCondiciones'] = $_POST['descripcionCondiciones']; */
        if (isset($_POST['idMoneda']))
            $data_apartamento['idMoneda'] = $_POST['idMoneda'];
        if (isset($_POST['manual']))
            $data_apartamento['manual'] = $_POST['manual'];

        $data_apartamento['idContrato'] = '1';
        
        if (isset($_POST['idEmpresa']))
            $data_apartamento['idEmpresa'] = $_POST['idEmpresa'];
        
        if (isset($_POST['tpv']))
            $data_apartamento['tpv'] = $_POST['tpv'];
        else $data_apartamento['tpv'] = NULL;

        //if (isset($_POST['baseTarifa']))
        $data_apartamento['horarioEntrada'] = date('H:i:s', strtotime('15:00'));
        $data_apartamento['horarioSalida'] = date('H:i:s', strtotime('12:00'));
        $data_apartamento['descripcionCorta'] = '';
        $data_apartamento['tarifaBase'] = '0';
        $data_apartamento['tarifaSemana'] = '0';
        $data_apartamento['tarifaMes'] = '0';
        $data_apartamento['estadiaMaxima'] = '7';
        $data_apartamento['estadiaMinima'] = '1';
        $data_apartamento['huespedAdicionalApartir'] = '0';
        $data_apartamento['huespedAdicionalCosto'] = '0';
        $data_apartamento['costoLimpieza'] = '0';
        $data_apartamento['depositoSeguridad'] = '0';
        $data_apartamento['precioFinSemana'] = '0';

        $data_apartamento['tiempoCreacion'] = date('Y-m-d H:i:s');
        $data_apartamento['ultimaModificacion'] = date('Y-m-d H:i:s');
        $data_apartamento['status'] = 'activo';

        $new_apartamento_id = insertApartamento($data_apartamento);
        if ($new_apartamento_id) {

            if (isset($_POST['idInstalacion'])) {
                $idInstalaciones = $_POST['idInstalacion'];
                foreach ($idInstalaciones as $idInstalacion) {
                    insertApartamentoInstalacion(array('idApartamento' => $new_apartamento_id, 'idInstalacion' => $idInstalacion));
                }
            }

            if (isset($_POST['idAlojamiento'])) {
                insertApartamentosAlojamientos(array('idApartamento' => $new_apartamento_id, 'idAlojamiento' => $_POST['idAlojamiento']));
            }

            if (isset($_POST['idPagoTipo'])) {
                $idPagosTipos = $_POST['idPagoTipo'];
                foreach ($idPagosTipos as $idPagoTipo) {
                    insertApartamentoPagoTipo(array('idApartamento' => $new_apartamento_id, 'idPagoTipo' => $idPagoTipo));
                }
            }

            /* if (isset($_POST['nombresZonas'])) {
              $count_lugares = count($_POST['nombresZonas']);
              for ($i = 0; $i < $count_lugares; $i++) {
              $new_lugar_cercano_id = insertLugarCercano(array('nombre' => $_POST['nombresZonas'][$i], 'medida' => $_POST['medidasZonas'][$i], 'tipo' => 'global'));
              insertApartamentoLugarCercano(array('idLugarCercano' => $new_lugar_cercano_id, 'idApartamento' => $new_apartamento_id, 'valor' => $_POST['valorLugares'][$i]));
              }
              } */

            $result['msg'] = 'ok';
            $result['data'] = 'Su apartamento fue agregado correctamente.';
            $result['idApartamento'] = $new_apartamento_id;
        } else {
            $result['msg'] = 'error';
            $result['data'] = 'No se ha podido crear el apartamento.';
        }
    } else {
        $result['msg'] = 'error';
        $result['data'] = 'No se ha podido crear la dirección.';
    }
}
if (strcmp($action, "update") == 0) {

    $data_direc = array();
    $data_apartamento = array();

    if (isset($_POST['calle']))
        $data_direc['calle'] = $_POST['calle'];
    if (isset($_POST['numero']))
        $data_direc['numero'] = $_POST['numero'];
    if (isset($_POST['provincia']))
        $data_direc['provincia'] = $_POST['provincia'];
    if (isset($_POST['codigoPostal']))
        $data_direc['codigoPostal'] = $_POST['codigoPostal'];
    if (isset($_POST['idPais']))
        $data_direc['idPais'] = $_POST['idPais'];
    if (isset($_POST['lat']))
        $data_direc['lat'] = $_POST['lat'];
    if (isset($_POST['lon']))
        $data_direc['lon'] = $_POST['lon'];
    if (isset($_POST['referencia']))
        $data_direc['referencia'] = $_POST['referencia'];

    $data_direc['idProvincia'] = '1';

    $new_direccion = updateDireccion($_POST['idDireccion'], $data_direc);

    if ($new_direccion) {
        //$data_apartamento['idDireccion'] = $_POST['idDireccion'];
        //$data_apartamento['idEmpresa'] = '1';
        //$data_apartamento['idUsuario'] = '1';

        if (isset($_POST['nombre']))
            $data_apartamento['nombre'] = $_POST['nombre'];
        if(isset($_POST['idComplejo']))
            $data_apartamento['idComplejo'] = trim($_POST['idComplejo']);
        else $data_apartamento['idComplejo'] = NULL;
        
        if(!$data_apartamento['idComplejo'])
            $data_apartamento['idComplejo'] = NULL;
        if (isset($_POST['idApartamentosTipo']))
            $data_apartamento['idApartamentosTipo'] = $_POST['idApartamentosTipo'];
        if (isset($_POST['capacidadPersonas']))
            $data_apartamento['capacidadPersonas'] = $_POST['capacidadPersonas'];
        if (isset($_POST['habitaciones']))
            $data_apartamento['habitaciones'] = $_POST['habitaciones'];
        if (isset($_POST['camas']))
            $data_apartamento['camas'] = $_POST['camas'];
        if (isset($_POST['tipoCama']))
            $data_apartamento['tipoCama'] = $_POST['tipoCama'];
        if (isset($_POST['banio']))
            $data_apartamento['banio'] = $_POST['banio'];
        if (isset($_POST['tamanio']))
            $data_apartamento['tamanio'] = $_POST['tamanio'];
        if (isset($_POST['normas']))
            $data_apartamento['normas'] = $_POST['normas'];
        if (isset($_POST['mascotas']))
            $data_apartamento['mascotas'] = $_POST['mascotas'];
        if (isset($_POST['horarioEntrada']))
            $data_apartamento['horarioEntrada'] = date('H:i:s', strtotime('12:00'));
        if (isset($_POST['horarioSalida']))
            $data_apartamento['horarioSalida'] = date('H:i:s', strtotime('12:00'));
        if (isset($_POST['descripcionCorta']))
            $data_apartamento['descripcionCorta'] = $_POST['descripcionCorta'];
        if (isset($_POST['descripcionLarga']))
            $data_apartamento['descripcionLarga'] = $_POST['descripcionLarga'];
        if (isset($_POST['idIdioma']))
            $data_apartamento['idIdioma'] = $_POST['idIdioma'];
        if (isset($_POST['descripcionServicios']))
            $data_apartamento['descripcionServicios'] = $_POST['descripcionServicios'];
        if (isset($_POST['descripcionCondiciones']))
            $data_apartamento['descripcionCondiciones'] = $_POST['descripcionCondiciones'];
        if (isset($_POST['idMoneda']))
            $data_apartamento['idMoneda'] = $_POST['idMoneda'];
        if (isset($_POST['manual']))
            $data_apartamento['manual'] = $_POST['manual'];
        if (isset($_POST['descripcionCorta']))
            $data_apartamento['descripcionCorta'] = $_POST['descripcionCorta'];
        if (isset($_POST['tarifaBase']))
            $data_apartamento['tarifaBase'] = $_POST['tarifaBase'];
        if (isset($_POST['tarifaSemana']))
            $data_apartamento['tarifaSemana'] = $_POST['tarifaSemana'];
        if (isset($_POST['tarifaMes']))
            $data_apartamento['tarifaMes'] = $_POST['tarifaMes'];
        if (isset($_POST['estadiaMaxima']))
            $data_apartamento['estadiaMaxima'] = $_POST['estadiaMaxima'];
        if (isset($_POST['estadiaMinima']))
            $data_apartamento['estadiaMinima'] = $_POST['estadiaMinima'];
        if (isset($_POST['huespedAdicionalApartir']))
            $data_apartamento['huespedAdicionalApartir'] = $_POST['huespedAdicionalApartir'];
        if (isset($_POST['huespedAdicionalCosto']))
            $data_apartamento['huespedAdicionalCosto'] = $_POST['huespedAdicionalCosto'];
        if (isset($_POST['costoLimpieza']))
            $data_apartamento['costoLimpieza'] = $_POST['costoLimpieza'];
        if (isset($_POST['depositoSeguridad']))
            $data_apartamento['depositoSeguridad'] = $_POST['depositoSeguridad'];
        if (isset($_POST['depositoSeguridad']))
            $data_apartamento['precioFinSemana'] = $_POST['precioFinSemana'];
        if (isset($_POST['status']))
            $data_apartamento['status'] = $_POST['status'];
        if (isset($_POST['claveWifi']))
            $data_apartamento['claveWifi'] = $_POST['claveWifi'];
        if (isset($_POST['cantidad']))
            $data_apartamento['cantidad'] = $_POST['cantidad'];
        
        if (isset($_POST['idEmpresa']))
            $data_apartamento['idEmpresa'] = $_POST['idEmpresa'];
        
        if (isset($_POST['tpv']))
            $data_apartamento['tpv'] = $_POST['tpv'];
        else $data_apartamento['tpv'] = NULL;

        //$data_apartamento['idContrato'] = '1';

        $data_apartamento['ultimaModificacion'] = date('Y-m-d H:i:s');


        $new_apartamento = updateApartamento($_POST['idApartamento'], $data_apartamento);

        if ($new_apartamento) {

            if (isset($_POST['idInstalacion'])) {
                $idInstalaciones = $_POST['idInstalacion'];
                deleteAllInstalacionesByApartamento($_POST['idApartamento']);
                if (true) {
                    foreach ($idInstalaciones as $idInstalacion) {
                        insertApartamentoInstalacion(array('idApartamento' => $_POST['idApartamento'], 'idInstalacion' => $idInstalacion));
                    }
                }
            }

            if (isset($_POST['idArticulo'])) {
                $idArticuloes = $_POST['idArticulo'];
                deleteApartamentosArticulos($_POST['idApartamento']);
                foreach ($idArticuloes as $idArticulo) {
                    insertApartamentoArticulos(array('idApartamento' => $_POST['idApartamento'], 'idArticulo' => $idArticulo));
                }
                
            }

           
            
            if (isset($_POST['idAlojamiento'])) {
                deleteApartamentosAlojamientos($_POST['idApartamento']);
                if (true)
                    insertApartamentosAlojamientos(array('idApartamento' => $_POST['idApartamento'], 'idAlojamiento' => $_POST['idAlojamiento']));
            }

            if (isset($_POST['idPagoTipo'])) {
                $idPagosTipos = $_POST['idPagoTipo'];
                deleteAllApartamentosPagoTiposByApartamento($_POST['idApartamento']);
                foreach ($idPagosTipos as $idPagoTipo) {
                    insertApartamentoPagoTipo(array('idApartamento' => $_POST['idApartamento'], 'idPagoTipo' => $idPagoTipo));
                }
            }

            /* if (isset($_POST['nombresZonas'])) {
              $count_lugares = count($_POST['nombresZonas']);
              for ($i = 0; $i < $count_lugares; $i++) {
              $new_lugar_cercano_id = insertLugarCercano(array('nombre' => $_POST['nombresZonas'][$i], 'medida' => $_POST['medidasZonas'][$i], 'tipo' => 'global'));
              insertApartamentoLugarCercano(array('idLugarCercano' => $new_lugar_cercano_id, 'idApartamento' => $new_apartamento_id, 'valor' => $_POST['valorLugares'][$i]));
              }
              } */

            $result['msg'] = 'ok';
            $result['data'] = 'Sus cambios han sido guardado correctamente.';
            $result['idApartamento'] = $_POST['idApartamento'];
        } else {
            $result['msg'] = 'error';
            $result['data'] = 'No se ha podido crear el apartamento.';
        }
    } else {
        $result['msg'] = 'error';
        $result['data'] = 'No se ha podido crear la dirección.';
    }
}

if (strcmp($action, "getFotos") == 0) {
    if (isset($_POST['idApartamento'])) {
        $adjuntosApts = getApartamentosAdjuntos($_POST['idApartamento']);
        $sub_template = new Core_template('admin/apartamento/fotos.php');

        if ($adjuntosApts) {
            $adjuntos_array = array();
            foreach ($adjuntosApts as $key => $adjuntoApt) {
                $adjunto_temp = getAdjunto($adjuntoApt->idAdjunto);
                if(strcmp($adjunto_temp->tipo, "apartamento") != 0) continue;
                //$adjunto_temp->idApartamentoAdjunto = $adjuntoApt->idApartamentoAdjunto;
                //$$adjunto_temp->idApartamento = $adjuntoApt->idApartamento;
                $adjuntos_array[$key]['foto'] = $adjunto_temp;
                $adjuntos_array[$key]['apartamentoAdjunto'] = $adjuntoApt->idApartamentoAdjunto;
            }
            foreach ($adjuntos_array as $fkey => $foto) {
                $bytes = round(375000 / (pow(1024, 2)), 1);
                $adjuntos_array[$fkey]['foto']->size = $bytes;
            }
            $sub_template->setAttribute('fotos', $adjuntos_array);
            $result['msg'] = 'ok';
            $result['data'] = 'Fotos encontradas.';
            $result['html'] = $sub_template->getContent();
        } else {
            $result['msg'] = 'ok';
            $result['data'] = 'Apartamento no encontrado.';
            $result['html'] = 'not_found';
        }
    } else {
        $result['msg'] = 'error';
        $result['data'] = 'Apartamento no encontrado.';
    }
}

if (strcmp($action, "deleteFoto") == 0) {
    if (isset($_POST['idApartamentoAdjunto'])) {
        $idAdjunto = getApartamentoAdjunto($_POST['idApartamentoAdjunto'])->idAdjunto;
        if (deleteApartamentosAdjuntos($_POST['idApartamentoAdjunto'])) {
            if (deleteAdjunto($idAdjunto)) {
                unlink($template_dir . $_POST['ruta']);
                $result['msg'] = 'ok';
                $result['data'] = 'El archivo fue eliminado correctamente.';
            } else {
                $result['msg'] = 'error';
                $result['data'] = 'Adjunto no encontrado.';
            }
        } else {
            $result['msg'] = 'error';
            $result['data'] = 'Apartamento no encontrado.';
        }
    } else {
        $result['msg'] = 'error';
        $result['data'] = 'Apartamento o adjunto no encontrado.';
    }
}

if (strcmp($action, "updateContrato") == 0) {
    if (isset($_POST['idApartamento'])) {
        if (isset($_POST['idEmpresa'])) {
            $idApartamento = $_POST['idApartamento'];
            $empresaContrato = array(
                'idEmpresa' => NULL,
                'semanaGratis' => 0,
                'especiales' => 0,
                'reservasUltimoMinuto' => 0,
                'diasReservasUltimoMinuto' => 0,
                'porcientoReservasUltimoMinuto' => 0,
                'reservasAnticipadas' => 0,
                'mesesReservasAnticipadas' => 0,
                'porcientoReservasAnticipadas' => 0,
                'alquileresLargaEstancia' => 0,
                'diasLargaEstancia' => 0,
                'firmado' => 0,
                'porcientoLargaEstancia' => 0
            );
            
            foreach (array_keys($empresaContrato) as $k) {
                if(isset($_POST[$k]) && strlen($_POST[$k])>0) {
                    $empresaContrato[$k] = $_POST[$k];
                }
            }
            
            if (updateApartamentoContrato($idApartamento,$empresaContrato)) {
                $result['msg'] = 'ok';
                $result['data'] = 'El contrato fue agregado correctamente.';
            } else {
                $result['msg'] = 'error';
                $result['data'] = 'No fue posible agregar el contrato, inténtelo de nuevo.';
            }
        } else {
            $result['msg'] = 'error';
            $result['data'] = 'Empresa o contrato no encontrados.';
        }
    } else {
        $result['msg'] = 'error';
        $result['data'] = 'Apartamento no encontrado.';
    }
}

if (strcmp($action, "updateAvanzados") == 0) {
    $apartamentoId = $_POST['apartamentoId'];
    
    
    $data_avanzados = array(
        'costoLimpieza' => NULL,	
        'depositoSeguridad' => NULL,	
        'estadiaMaxima' => NULL,
        'estadiaMinima' => NULL,
        'horarioEntrada' => NULL,
        'horarioSalida' => NULL,
        'huespedAdicionalApartir' => NULL,
        'huespedAdicionalCosto' => NULL,
        'politicaCancelacion' => NULL,
        'precioFinSemana' => NULL,
        'idPoliticaCancelacion' => NULL
    );
    
    $valores_esperados = array_keys($data_avanzados);
    
    foreach ($valores_esperados as $valor) {
        if(isset($_POST[$valor]))
            $data_avanzados[$valor] = $_POST[$valor];
    }
    
    $data_avanzados['ultimaModificacion'] = date('Y-m-d H:i:s');
    
    $new_apartamento = updateApartamento($apartamentoId, $data_avanzados);
    
    if($new_apartamento) {
        $result['msg'] = 'ok';
        $result['data'] = 'Sus cambios han sido guardado correctamente.';
        $result['idApartamento'] = $_POST['idApartamento'];
    } else {
        $result['data'] = 'Sus cambios no han sido guardado correctamente.';
    }

}

echo json_encode($result);
?>

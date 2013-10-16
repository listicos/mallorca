<?php
$usuario_core->validateUser();
switch ($_POST["funcion_go"]) {
    case "agregarEmpresa":  
        $result = array("msg" => "error", "data" => "You do not have sufficient permissions.");
        $data_direc = array();
        $data_empresa = array();
        $data_cuenta = array();

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
            $data_direc['idProvincia'] = (int)1;

        $new_direccion_id = insertDireccion($data_direc);

        if ($new_direccion_id) {

            $data_empresa['idDireccion'] = $new_direccion_id;
            if (isset($_POST['nombre']))
                $data_empresa['nombre'] = $_POST['nombre'];
            if (isset($_POST['apellidoPaterno']))
                $data_empresa['apellidoPaterno'] = $_POST['apellidoPaterno'];
            if (isset($_POST['apellidoMaterno']))
                $data_empresa['apellidoMaterno'] = $_POST['apellidoMaterno'];
            if (isset($_POST['nombreFiscal']))
                $data_empresa['nombreFiscal'] = $_POST['nombreFiscal'];
            if (isset($_POST['cif']))
                $data_empresa['cif'] = $_POST['cif'];
            if (isset($_POST['tiempoCreacion']))
                $data_empresa['tiempoCreacion'] = date('Y-m-d H:i:s');
            if (isset($_POST['ultimaModificacion']))
                $data_empresa['ultimaModificacion'] = date('Y-m-d H:i:s');
            if (isset($_POST['email']))
                $data_empresa['email'] = $_POST['email'];              

            $new_empresa_id = insertEmpresa($data_empresa);
            if ($new_empresa_id) {
                $data_cuenta['idEmpresa'] = $new_empresa_id;
                if (isset($_POST['iban']))
                    $data_cuenta['iban'] = $_POST['iban'];
                if (isset($_POST['swif']))
                    $data_cuenta['swif'] = $_POST['swif'];
                if (isset($_POST['idMoneda']))
                    $data_cuenta['idMoneda'] = $_POST['idMoneda'];

                    $data_cuenta['titular'] = 1;
                    $data_cuenta['cvv'] = 1;
                    $data_cuenta['cD'] = 1;
                    $data_cuenta['cA'] = 1;
                    $data_cuenta['numero'] = 1;                   
                
                
                if (insertCuenta($data_cuenta)) {
                    $result['msg'] = 'ok';
                    $result['data'] = 'Su empresa fue agregada correctamente.';
                } else {
                    $result['msg'] = 'error';
                    $result['data'] = 'No se ha podido crear la cuenta.';
                }
            } else {
                $result['msg'] = 'error';
                $result['data'] = 'No se ha podido crear la empresa.';
            }
        } else {
            $result['msg'] = 'error';
            $result['data'] = 'No se ha podido crear la dirección.';
        }
        echo json_encode($result);
        break;
    case "obtenerInfo": 
        $multi_query = array();
        
        if (isset($_POST["id_empresaUpdate"]))
            $id_toUpdate = $_POST["id_empresaUpdate"];  
        
        $empresa_update = getEmpresa($id_toUpdate);
        
        if ($empresa_update)
        {
                    $direccion_update = getDireccion($empresa_update->idDireccion);
                    $multi_query['empresa'] = $empresa_update;

                $cuenta_update = getCuentaByEmpresaId($id_toUpdate); 

                if ($cuenta_update)
                {
                    $moneda_update = getMonedaById($cuenta_update[0]->idMoneda);  
                    $multi_query['cuenta'] = $cuenta_update;
                }
                if($direccion_update)
                {   $multi_query['direccion'] = $direccion_update;
                    $multi_query['pais'] = $direccion_update->idPais;
                }

                if($moneda_update)
                    $multi_query['moneda'] = $moneda_update->idMoneda;               
        }
        
        echo json_encode($multi_query);
        
        break;
        
    case "conseguirEmpresas":
        //$query_emp = getDatosEmpresa();
        $query_emp = getEmpresas();    
        echo json_encode($query_emp);
        break; 
    
    case "updateEmpresa":
//***************************************************************************************        
        $result_update = array("msg" => "error", "data" => "No tienes suficientes permisos.");
        $data_direc_update = array();
        $data_empresa_update = array();
        $data_cuenta_update = array();

        if (isset($_POST['calle']))
            $data_direc_update['calle'] = $_POST['calle'];
        if (isset($_POST['numero']))
            $data_direc_update['numero'] = $_POST['numero'];
        if (isset($_POST['provincia']))
            $data_direc_update['provincia'] = $_POST['provincia'];
        if (isset($_POST['codigoPostal']))
            $data_direc_update['codigoPostal'] = $_POST['codigoPostal'];
        if (isset($_POST['idPais']))
            $data_direc_update['idPais'] = (int)$_POST['idPais'];
        if (isset($_POST['lat']))
            $data_direc_update['lat'] = (int)$_POST['lat'];
        if (isset($_POST['lon']))
            $data_direc_update['lon'] = (int)$_POST['lon'];
        
        $data_direc_update['idProvincia'] = (int)1; 
        
        
        if (isset($_POST['id_direccion_update']))
            $id_direc = (int)$_POST['id_direccion_update'];
        if (isset($_POST['id_cuenta_update']))
            $id_cuent = (int)$_POST['id_cuenta_update'];  
        if (isset($_POST['id_empresa_update']))
            $id_emp = (int)$_POST['id_empresa_update'];          


        $update_direccion_id = updateDireccion($id_direc, $data_direc_update);

        if ($update_direccion_id) {

            $data_empresa_update['idDireccion'] = $id_direc;
            if (isset($_POST['nombre']))
                $data_empresa_update['nombre'] = $_POST['nombre'];
            if (isset($_POST['apellidoPaterno']))
                $data_empresa_update['apellidoPaterno'] = $_POST['apellidoPaterno'];
            if (isset($_POST['apellidoMaterno']))
                $data_empresa_update['apellidoMaterno'] = $_POST['apellidoMaterno'];
            if (isset($_POST['nombreFiscal']))
                $data_empresa_update['nombreFiscal'] = $_POST['nombreFiscal'];
            if (isset($_POST['cif']))
                $data_empresa_update['cif'] = $_POST['cif'];
            if (isset($_POST['tiempoCreacion']))
                $data_empresa_update['tiempoCreacion'] = date('Y-m-d H:i:s');
            if (isset($_POST['ultimaModificacion']))
                $data_empresa_update['ultimaModificacion'] = date('Y-m-d H:i:s');
            if (isset($_POST['email']))
                $data_empresa_update['email'] = $_POST['email'];            


            $update_empresa_id = updateEmpresa($id_emp, $data_empresa_update);
            
            if ($update_empresa_id) {
                $data_cuenta_update['idEmpresa'] = $id_emp;
                if (isset($_POST['iban']))
                    $data_cuenta_update['iban'] = $_POST['iban'];
                if (isset($_POST['swif']))
                    $data_cuenta_update['swif'] = $_POST['swif'];
                if (isset($_POST['idMoneda']))
                    $data_cuenta_update['idMoneda'] = $_POST['idMoneda'];

                    $data_cuenta_update['titular'] = 0;
                    $data_cuenta_update['cvv'] = 0;
                    $data_cuenta_update['cD'] = 0;
                    $data_cuenta_update['cA'] = 0;
                    $data_cuenta_update['numero'] = 0;      
                
                $update_cuenta_id = updateCuenta($id_cuent, $data_cuenta_update);                
              
                if ($update_cuenta_id) {
                    $result_update['msg'] = 'ok';
                    $result_update['data'] = 'Su empresa fue actualizada correctamente.';
                } else {
                    $result_update['msg'] = 'error';
                    $result_update['data'] = 'No se ha podido actualizar la cuenta.';
                }
            } else {
                $result_update['msg'] = 'error';
                $result_update['data'] = 'No se ha podido actualizar la empresa.';
            }
        } else {
            $result_update['msg'] = 'error';
            $result_update['data'] = 'No se ha podido actualizar la dirección.';
        }
        echo json_encode($result_update);         
        
//***************************************************************************************        
        
        break;      
        
    case "fillingData":
        if (isset($_POST['data_toSearch'])) {
            $dt = (string) $_POST['data_toSearch'];
            $query_datas = getDatosEmpresaAutocomplete($dt);
            echo json_encode($query_datas);
        }

        break;         
        
    case "borrar":
//********************  codigo borrar **************************************************************        
       /* $multi_query_delete = array("msg" => "error", "data" => "No tienes suficientes permisos.");
        if (isset($_POST["id_empresaDelete"])){
           $id_toDelete = $_POST["id_empresaDelete"]; 
           $empresa_delete_query = getEmpresa($id_toDelete);
        }
        
        if($empresa_delete_query){
            $direccion_delete_query = getDireccion((int)$empresa_delete_query->idDireccion);
            if($direccion_delete_query){
                $cuenta_delete_query = getCuentaByEmpresaId($id_toDelete);                 
                if ($cuenta_delete_query) {
                    $if_delete_direccion = deleteDireccion((int) $direccion_delete_query->idDireccion);
                    if ($if_delete_direccion) {
                        $if_delete_cuenta = deleteCuenta($id_toDelete);
                        if ($if_delete_cuenta) {
                            $if_delete_empresa = deleteEmpresa($id_toDelete);
                            if ($if_delete_empresa) {
                                $multi_query_delete['msg'] = 'ok';
                                $multi_query_delete['data'] = 'Su empresa fue eliminada correctamente.';
                            } else {
                                $multi_query_delete['msg'] = 'error';
                                $multi_query_delete['data'] = 'No se ha eliminar la empresa.';
                            };
                        } else {
                            $multi_query_delete['msg'] = 'error';
                            $multi_query_delete['data'] = 'No se ha eliminar la empresa.';
                        };
                    } else {
                        $multi_query_delete['msg'] = 'error';
                        $multi_query_delete['data'] = 'No se ha eliminar la empresa.';
                    };
                } else {
                    $multi_query_delete['msg'] = 'error';
                    $multi_query_delete['data'] = 'No se ha eliminar la empresa.';
                };                
            }
            else{
                $multi_query_delete['msg'] = 'error';
                $multi_query_delete['data'] = 'No se ha eliminar la empresa.';
            };
            
        };
        echo json_encode($multi_query_delete);*/        
 //********************  codigo borrar **************************************************************       
        //$empresa_delete_query = getEmpresa($id_toDelete);
        //$direccion_delete_query = getDireccion((int)$empresa_delete_query->idDireccion);
        //$cuenta_delete_query = getCuentaByEmpresaId($id_toDelete);         
       /* $direccionA_Borrar = (int)$direccion_delete_query->idDireccion;
        $if_delete_direccion = deleteDireccion((int)$direccionA_Borrar);        
        if ($if_delete_direccion) {
            $if_delete_cuenta = deleteCuenta((int) $id_toDelete);
            $if_delete_empresa = deleteEmpresa((int) $id_toDelete);
        };*/
        /*$if_delete_cuenta = deleteCuenta((int) $id_toDelete);
        $if_delete_empresa = deleteEmpresa((int) $id_toDelete); */       
       /* $multi_query_delete['msg'] = 'ok';
        $multi_query_delete['data'] = 'Su empresa fue actualizada correctamente.';*/               
        break;    
      
        
        
    default:
        break;
}
?>
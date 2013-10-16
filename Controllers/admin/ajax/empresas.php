<?php

$usuario_core->validateUser();
$action = $_POST["action"];
$result = array("msg" => "error", "data" => "You do not have sufficient permissions.");

if (strcmp($action, "insert") == 0) {
    $data_direc = array();
    $data_empresa = array();
    $data_cuenta = array();
    $data_usuario = array();

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
    $data_direc['idProvincia'] = (int) 1;

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
        if (isset($_POST['telefono']))
            $data_empresa['telefono'] = $_POST['telefono'];
        if (isset($_POST['telefonoAlterno']))
            $data_empresa['telefonoAlterno'] = $_POST['telefonoAlterno'];

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

            $cuenta_id = insertCuenta($data_cuenta);

            if (isset($_POST['nombre']))
                $data_usuario['nombre'] = $_POST['nombre'];
            if (isset($_POST['apellidoPaterno']))
                $data_usuario['apellidoPaterno'] = $_POST['apellidoPaterno'];
            if (isset($_POST['apellidoMaterno']))
                $data_usuario['apellidoMaterno'] = $_POST['apellidoMaterno'];
            if (isset($_POST['email']))
                $data_usuario['email'] = $_POST['email'];
            if (isset($_POST['password']))
                $data_usuario['password'] = $_POST['password'];
            if (isset($_POST['telefono']))
                $data_usuario['telefono'] = $_POST['telefono'];
            if (isset($_POST['telefonoAlterno']))
                $data_usuario['telefonoAlterno'] = $_POST['telefonoAlterno'];

            $data_usuario['idUsuarioGrupo'] = isset($_POST['idUsuarioGrupo']) ? $_POST['idUsuarioGrupo'] : 1;

            $data_usuario['tiempoCreacion'] = date('Y-m-d H:i:s');
            $data_usuario['ultimaModificacion'] = date('Y-m-d H:i:s');

            insertUsuario($data_usuario);


            if ($cuenta_id) {

                $empresa_cuenta_id = insertEmpresaCuenta(array('idEmpresa' => $new_empresa_id, 'idCuenta' => $cuenta_id));
                if ($empresa_cuenta_id) {
                    if (isset($_POST['contratosInsert'])) {
                        $news_contratos = array_filter($_POST['contratosInsert']);
                        foreach ($news_contratos as $nkey => $new_contrat) {
                            $data_empresa_contrato = array();
                            $data_empresa_contrato['idEmpresa'] = $new_empresa_id;
                            $data_empresa_contrato['idContrato'] = $new_contrat;
                            $data_empresa_contrato['fechaInicio'] = $_POST['fechaInicioInsert'][$nkey];
                            $data_empresa_contrato['fechaFin'] = $_POST['fechaFinalInsert'][$nkey];
                            $data_empresa_contrato['tiempoCreacion'] = date('Y-m-d H:i:s');
                            $data_empresa_contrato['ultimaModificacion'] = date('Y-m-d H:i:s');

                            insertEmpresaContrato($data_empresa_contrato);
                        }
                    }
                    $result['msg'] = 'ok';
                    $result['data'] = 'Su empresa fue agregada correctamente.';
                } else {
                    $result['msg'] = 'error';
                    $result['data'] = 'No se pudo agregar cuenta.';
                }
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
}

if (strcmp($action, "update") == 0) {
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
        $data_direc_update['idPais'] = (int) $_POST['idPais'];
    if (isset($_POST['lat']))
        $data_direc_update['lat'] = (int) $_POST['lat'];
    if (isset($_POST['lon']))
        $data_direc_update['lon'] = (int) $_POST['lon'];

    $data_direc_update['idProvincia'] = (int) 1;


    if (isset($_POST['id_direccion_update']))
        $id_direc = (int) $_POST['id_direccion_update'];
    if (isset($_POST['id_cuenta_update']))
        $id_cuent = (int) $_POST['id_cuenta_update'];
    if (isset($_POST['id_empresa_update']))
        $id_emp = (int) $_POST['id_empresa_update'];
     if (isset($_POST['id_usuario_update']))
        $id_usua = (int) $_POST['id_usuario_update'];

    if (isset($_POST['nombre']))
        $data_usuario['nombre'] = $_POST['nombre'];
    if (isset($_POST['apellidoPaterno']))
        $data_usuario['apellidoPaterno'] = $_POST['apellidoPaterno'];
    if (isset($_POST['apellidoMaterno']))
        $data_usuario['apellidoMaterno'] = $_POST['apellidoMaterno'];
    if (isset($_POST['email']))
        $data_usuario['email'] = $_POST['email'];
    if (isset($_POST['password']))
        $data_usuario['password'] = $_POST['password'];
    if (isset($_POST['telefono']))
        $data_usuario['telefono'] = $_POST['telefono'];
    if (isset($_POST['telefonoAlterno']))
        $data_usuario['telefonoAlterno'] = $_POST['telefonoAlterno'];

    $data_usuario['tiempoCreacion'] = date('Y-m-d H:i:s');
    $data_usuario['ultimaModificacion'] = date('Y-m-d H:i:s');

    updateUsuario($id_usua, $data_usuario);


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
        if (isset($_POST['telefono']))
            $data_direc_update['telefono'] = $_POST['telefono'];
        if (isset($_POST['telefonoAlterno']))
            $data_direc_update['telefonoAlterno'] = $_POST['telefonoAlterno'];
        if (isset($_POST['tiempoCreacion']))
            $data_empresa_update['tiempoCreacion'] = date('Y-m-d H:i:s');
        if (isset($_POST['ultimaModificacion']))
            $data_empresa_update['ultimaModificacion'] = date('Y-m-d H:i:s');
        if (isset($_POST['email']))
            $data_empresa_update['email'] = $_POST['email'];
        if (isset($_POST['telefono']))
            $data_empresa_update['telefono'] = $_POST['telefono'];
        if (isset($_POST['telefonoAlterno']))
            $data_empresa_update['telefonoAlterno'] = $_POST['telefonoAlterno'];



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

                if (isset($_POST['contratosInsert'])) {
                    $news_contratos = array_filter($_POST['contratosInsert']);
                    foreach ($news_contratos as $nkey => $new_contrat) {
                        $data_empresa_contrato = array();
                        $data_empresa_contrato['idEmpresa'] = $id_emp;
                        $data_empresa_contrato['idContrato'] = $new_contrat;
                        $data_empresa_contrato['fechaInicio'] = date('Y-m-d H:i:s', strtotime($_POST['fechaInicioInsert'][$nkey]));
                        $data_empresa_contrato['fechaFin'] = date('Y-m-d H:i:s', strtotime($_POST['fechaFinalInsert'][$nkey]));
                        $data_empresa_contrato['tiempoCreacion'] = date('Y-m-d H:i:s');
                        $data_empresa_contrato['ultimaModificacion'] = date('Y-m-d H:i:s');

                        insertEmpresaContrato($data_empresa_contrato);
                    }
                }
                if (isset($_POST['contratosUpdate'])) {

                    foreach ($_POST['contratosUpdate'] as $ckey => $new_contrato_id) {

                        $data_empresa_contrato = array();
                        $data_empresa_contrato['idEmpresa'] = $id_emp;
                        $data_empresa_contrato['idContrato'] = $new_contrato_id;
                        $data_empresa_contrato['fechaInicio'] = date('Y-m-d H:i:s', strtotime($_POST['fechaInicioUpdate'][$ckey]));
                        $data_empresa_contrato['fechaFin'] = date('Y-m-d H:i:s', strtotime($_POST['fechaFinalUpdate'][$ckey]));
                        $data_empresa_contrato['ultimaModificacion'] = date('Y-m-d H:i:s');

                        updateEmpresaContrato($ckey, $data_empresa_contrato);
                    }
                }

                $result['msg'] = 'ok';
                $result['data'] = 'Su empresa fue actualizada correctamente.';
            } else {
                $result['msg'] = 'error';
                $result['data'] = 'No se ha podido actualizar la cuenta.';
            }
        } else {
            $result['msg'] = 'error';
            $result['data'] = 'No se ha podido actualizar la empresa.';
        }
    } else {
        $result['msg'] = 'error';
        $result['data'] = 'No se ha podido actualizar la dirección.';
    }
}

echo json_encode($result);
?>